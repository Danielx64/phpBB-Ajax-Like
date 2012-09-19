<?php
/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function ajaxlike_post_content($post_id,$topic_id,$forum_id)
{
	global $user, $config;
	$user->setup('viewtopic');
	
	$likes_data = fetch_topic_likes($post_id);
	
	$total_likes = (isset($likes_data[0][$post_id]) ? $likes_data[0][$post_id]  : 0);
	$post_likes = (isset($likes_data[0][$post_id]) ? $likes_data[0][$post_id] - (in_array($post_id, $likes_data[1]) ? 1 : 0) : 0);
	$you_liked = (in_array($post_id, $likes_data[1]) ? true : false);
	$like_list =build_like_list(isset($likes_data[2][$post_id]) ? $likes_data[2][$post_id]  : false);
	
	$html = "";
	
	if($total_likes > 0)
	{
	
			//$html='<div class="ajaxlike_container" id="ajaxlike_content'.$post_id.'">';

				if($you_liked)
				{
						if($config['ajaxlike_allow_unlike']){
							$html.='<a href="#" onclick="ajaxlike_unlike('.$post_id.','.$topic_id.','.$forum_id.'); return false;" class="ajaxlike_link ajaxlike_unlike_button">'.$user->lang['AL_UNLIKE_TEXT'].'</a> &middot; '.$user->lang['AL_YOU_TEXT'].' ';
						}
						
						if($post_likes > 0)
						{
							$html.=$user->lang['AL_AND_TEXT'].' <a href="#" onclick="ajaxlike_fulllistbox('.$post_id.','.$topic_id.','.$forum_id.',\''.$user->lang['AL_LIKE_AT_TEXT'].'\'); return false;" class="ajaxlike_link ajaxlike_tooltip" id="ajaxlike_tooltip'.$post_id.'" ';
							
							if($like_list!==false)
							{
								$html.=' title="'.$like_list.'"';
							}
							
							$html.='>'.$post_likes.' ';
							
							if($post_likes > 1)
							{
								$html.=$user->lang['AL_OTHERS_TEXT'];
							} else {
								$html.=$user->lang['AL_OTHER_TEXT'];
							}
							
							$html.='</a> ';
						}
						
						$html.=$user->lang['AL_LIKE_POST_TEXT'];
				
				} else {
					
					$html.='<a href="#" onclick="ajaxlike_like('.$post_id.','.$topic_id.','.$forum_id.'); return false;" class="ajaxlike_link ajaxlike_like_button">'.$user->lang['AL_LIKE_TEXT'].'</a> &middot; <a href="#" onclick="ajaxlike_fulllistbox('.$post_id.','.$topic_id.','.$forum_id.',\''.$user->lang['AL_LIKE_AT_TEXT'].'\'); return false;" class="ajaxlike_link ajaxlike_tooltip" id="ajaxlike_tooltip'.$post_id.'" ';
					
					if($like_list!==false){
						
						$html.='title="'.$like_list.'"';
						
					}
					
					if($total_likes == 1)
					{
						$html.='>'.$like_list.'</a> '.$user->lang['AL_LIKE_POST_TEXT'];
					} else {
						$html.='>'.$total_likes.' '.$user->lang['AL_PEOPLE_TEXT'].'</a> '.$user->lang['AL_LIKE_POST_TEXT'];
					}
					
				}
				
				//$html.='</div>';
	} else {
	
		$html.='<a href="#" onclick="ajaxlike_like('.$post_id.','.$topic_id.','.$forum_id.'); return false;" class="ajaxlike_link ajaxlike_like_button">'.$user->lang['AL_LIKE_TEXT'].'</a>';
	
	}
	
	return $html;
}

function fetch_topic_likes($post_id = 0)
{
	global $post_list, $topic_id, $template, $user, $db, $phpEx;

	include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
	
	
	$sql = 'SELECT COUNT(like_id) as num_likes, post_id
		FROM ' . LIKES_TABLE . '
		WHERE topic_id = '.$topic_id.' AND post_id IN ('.($post_id == 0 ? implode(",", $post_list) : $post_id).') GROUP BY post_id';
	$result = $db->sql_query($sql);
	
	$likes_array = array();
	$last_likes = array();
	
	while($row = $db->sql_fetchrow($result))
	{
		
		$likes_array[$row['post_id']] = $row['num_likes'];
		
		if($row['num_likes']>0)
		{
			
			$sql = 'SELECT user_id
				FROM ' . LIKES_TABLE . '
				WHERE post_id = '.$row['post_id'];
			$result2 = $db->sql_query_limit($sql, 15);
			
			$usernames = array();
			$user_ids = array();
			
			while($row2 = $db->sql_fetchrow($result2))
			{
				$user_ids[] = $row2['user_id'];
			}
			
			$db->sql_freeresult($result2);
			
			user_get_id_name($user_ids, $usernames);
			
			foreach($usernames as $uid => $uname)
			{
				if($uid!=$user->data['user_id'])
				{
					$last_likes[$row['post_id']][] = array(
						'uid' => $uid,
						'username' => $uname
					);
				}
			}
			
			
			unset($user_ids);
			unset($usernames);
		}
		
	}
	
	$db->sql_freeresult($result);
	
	$sql = 'SELECT post_id
		FROM ' . LIKES_TABLE . '
		WHERE topic_id = '.$topic_id.' AND user_id = '.$user->data['user_id'];
	$result = $db->sql_query($sql);
	
	$user_likes = array();
	
	while($row = $db->sql_fetchrow($result))
	{
		$user_likes[] = $row['post_id'];
	}
	
	$db->sql_freeresult($result);
	
	return array($likes_array, $user_likes, $last_likes);

}

function build_like_list($likelist)
{
	$htmllist = "";
	$count_list = 0;
	
	if(is_array($likelist))
	{
		foreach($likelist as $key => $val)
		{
			$htmllist.= ($count_list > 0 ? '<br />' : '') . htmlentities($val['username']);
			$count_list++;
		}
	}
	
	return $htmllist;
}

function get_fulllist($post_id)
{

	global $db, $user, $phpEx;
	
	include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
	include_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
	include_once($phpbb_root_path . 'includes/functions_content.' . $phpEx);
	
	$user->setup('viewtopic');
	
			$sql = 'SELECT l_table.user_id, l_table.like_date, u_table.username, u_table.user_avatar, u_table.user_avatar_type, u_table.user_avatar_width, u_table.user_avatar_height, u_table.user_colour 
				FROM ' . LIKES_TABLE . ' as l_table INNER JOIN ' . USERS_TABLE . ' as u_table ON u_table.user_id = l_table.user_id 
				WHERE l_table.post_id = '.$post_id.' ORDER BY l_table.like_date DESC';
			
			$result = $db->sql_query($sql);
			
			while($row = $db->sql_fetchrow($result))
			{
					 $fulllist[]= array(
				 		'uid' 			=> $row['user_id'],
						'username' 		=> $row['username'],
						'date' 			=> $user->format_date($row['like_date']),
						'avatar' 		=> htmlentities(get_user_avatar($row['user_avatar'], $row['user_avatar_type'], $row['user_avatar_width'], $row['user_avatar_height'])),
						'username_full'	=> htmlentities(get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']))
				 	 );
			}

			$db->sql_freeresult($result);
			
			return json_encode($fulllist);
}

function ajaxlike_like_post($post_id)
{

	global $db, $user;
	
	$sql = 'SELECT like_id 
		FROM ' . LIKES_TABLE . '
		WHERE post_id = '.$post_id.' AND user_id = '.$user->data['user_id'];
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	if(!$row)
	{

		$sql = 'SELECT poster_id, topic_id, forum_id 
			FROM ' . POSTS_TABLE . '
			WHERE poster_id <> '.$user->data['user_id'].' AND post_id = '.$post_id;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		
		if($row)
		{
			$sql = 'INSERT INTO ' . LIKES_TABLE . ' ' . $db->sql_build_array('INSERT', array(
					'user_id'		=> (int) $user->data['user_id'],
					'post_id'		=> (int) $post_id,
					'topic_id'		=> (int) $row['topic_id'],
					'poster_id'		=> (int) $row['poster_id'],
					'like_date'		=> (int) time()
				)
			);
			$db->sql_query($sql);
		}
	
		return ajaxlike_post_content($post_id,$row['topic_id'],$row['forum_id']);
	
	}
	
	return "Invalid request!";
}

function ajaxlike_unlike_post($post_id)
{

	global $db, $user;

	$sql = 'SELECT poster_id, topic_id, forum_id 
		FROM ' . POSTS_TABLE . '
		WHERE poster_id <> '.$user->data['user_id'].' AND post_id = '.$post_id;
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	if($row)
	{
		
		$sql = 'DELETE FROM ' . LIKES_TABLE . '
			WHERE post_id = '.$post_id.' AND user_id = '.$user->data['user_id'];
		$db->sql_query($sql);
		
		return ajaxlike_post_content($post_id,$row['topic_id'],$row['forum_id']);
	}
	
	return "Invalid request!";
}

if (!function_exists('json_encode')) {
    function json_encode($data) {
         switch ($type = gettype($data)) {
             case 'NULL':
                 return 'null';
             case 'boolean':
                 return ($data ? 'true' : 'false');
             case 'integer':
             case 'double':
             case 'float':
                 return $data;
             case 'string':
                 return '"' . addslashes($data) . '"';
             case 'object':
                 $data = get_object_vars($data);
             case 'array':
                 $output_index_count = 0;
                 $output_indexed = array();
                 $output_associative = array();
                 foreach ($data as $key => $value) {
                     $output_indexed[] = json_encode($value);
                     $output_associative[] = json_encode($key) . ':' . json_encode($value);
                     if ($output_index_count !== NULL && $output_index_count++ !== $key) {
                         $output_index_count = NULL;
                     }
                 }
                 if ($output_index_count !== NULL) {
                     return '[' . implode(',', $output_indexed) . ']';
                 } else {
                     return '{' . implode(',', $output_associative) . '}';
                 }
             default:
                 return ''; // Not supported
         }
     }
}

function get_user_liked($user_id)
{
	global $db;
	
	$sql = 'SELECT COUNT(like_id) as like_count 
		FROM ' . LIKES_TABLE . '
		WHERE poster_id = '.$user_id;
	$result = $db->sql_query($sql);
	$like_count = (int) $db->sql_fetchfield('like_count');
	$db->sql_freeresult($result);
	
	return $like_count;
}

function get_user_likes($user_id)
{
	global $db;
	
	$sql = 'SELECT COUNT(like_id) as like_count 
		FROM ' . LIKES_TABLE . '
		WHERE user_id = '.$user_id;
	$result = $db->sql_query($sql);
	$like_count = (int) $db->sql_fetchfield('like_count');
	$db->sql_freeresult($result);
	
	return $like_count;
}

?>