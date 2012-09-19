<?php
/**
*
* @author eMosbat
* @package umil
* @copyright (c) 2008 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

$mod_name = 'AJAXLIKE_MOD';
$version_config_name = 'ajaxlike_version';
$language_file = 'mods/umil_ajaxlike';

$versions = array(

	'0.0.1'	=> array(
		// Lets add a config setting named ajaxlike_enable and set it to true
		'config_add' => array(
			array('ajaxlike_enable', true),
			array('ajaxlike_allow_unlike', true),
			array('ajaxlike_list_in_profile', true),
		),

		'permission_add' => array(
			array('a_ajaxlike_mod', true),
			array('f_ajaxlike_mod', false),
			array('u_ajaxlike_mod', true),
		),

		'permission_set' => array(
			// Global Role permissions
			array('ROLE_ADMIN_FULL', 'a_ajaxlike_mod'),
			array('ROLE_USER_FULL', 'u_ajaxlike_mod'),
			array('ROLE_FORUM_STANDARD', 'f_ajaxlike_mod'),
		),
		
		'custom'	=> 'ajaxlike_create_tables',

		
		/*
		'module_add' => array(
			// Add a main category
			array('acp', 0, 'ACP_CAT_DOT_MODS'),

			// First, lets add a new category named ACP_CAT_AJAXLIKE_MOD to ACP_CAT_DOT_MODS
			array('acp', 'ACP_CAT_DOT_MODS', 'ACP_CAT_AJAXLIKE_MOD'),

			// Now we will add the settings and features modes from the acp_board module to the ACP_CAT_AJAXLIKE_MOD category using the "automatic" method.
			array('acp', 'ACP_CAT_AJAXLIKE_MOD', array(
					'module_basename'		=> 'board',
					'modes'					=> array('settings', 'features'),
				),
			),

			// Now we will add the avatar mode from acp_board to the ACP_CAT_AJAXLIKE_MOD category using the "manual" method.
			array('acp', 'ACP_CAT_AJAXLIKE_MOD', array(
					'module_basename'	=> 'board',
					'module_langname'	=> 'ACP_AVATAR_SETTINGS',
					'module_mode'		=> 'avatar',
					'module_auth'		=> 'acl_a_board',
					'after'				=> 'ACP_BOARD_SETTINGS', // Will be placed after ACP_BOARD_SETTINGS in the category it is in (the one we just added above)
				),
			),
		),
		
		*/
	),

	// Version 1.0.0
	//'1.0.0' => array(
		// Nothing changed in this version.
	//),
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

function ajaxlike_create_tables($action, $version)
{
	global $db, $table_prefix, $umil;

	if ($action == 'install')
	{
		// Run this when uninstalling
		$umil->table_add('phpbb_likes', array(
					'COLUMNS'		=> array(
						'like_id'			=> array('INT:11', NULL, 'auto_increment'),
						'post_id'			=> array('UINT', NULL, ''),
						'topic_id'			=> array('UINT', NULL, ''),
						'poster_id'			=> array('UINT', NULL, ''),
						'user_id'			=> array('UINT', NULL, ''),
						'like_date'			=> array('INT:11', NULL, ''),
					),
					'PRIMARY_KEY'	=> 'like_id'
				));
	}

}

?>