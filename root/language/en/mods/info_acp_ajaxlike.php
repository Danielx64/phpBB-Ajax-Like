<?php
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_MOD_TITLE'							=> 'phpBB Ajax Like',
	'ACP_AJAXLIKE_CONFIG_TITLE'				=> 'Ajax Like Settings',
	'TITLE'									=> 'Ajax Like Settings',
	'LEGEND1'								=> 'General',
	'ACP_CONFIG_ENABLE'						=> 'Status',
	'ACP_CONFIG_GUEST'						=> 'Guest View',
	'ACP_CONFIG_GUEST_EXPLAIN'				=> 'Guest can view likes?',
	'ACP_CONFIG_LIST_PROFILE'				=> 'Show in Profiles',
	'ACP_CONFIG_LIST_PROFILE_EXPLAIN'		=> 'Show liked post in user profile?',
	'ACP_CONFIG_LIST_MAX'					=> 'Number of likes in profiles',
	'ACP_CONFIG_LIST_MAX_EXPLAIN'			=> '0 = default',
	'ACP_CONFIG_ALLOW_UNLIKE'				=> 'Allow Unlike',
	'ACP_CONFIG_ALLOW_UNLIKE_EXPLAIN'		=> 'allow users to unlike liked posts?',
	'ACP_CONFIG_NOTIFY'						=> 'Like Notification',
	'ACP_CONFIG_NOTIFY_EXPLAIN'				=> 'enable like notification?',
	'ACP_CONFIG_INTERVAL'					=> 'Notify interval',
	'ACP_CONFIG_INTERVAL_EXPLAIN'			=> 'check for new likes every n seconds.',
));
?>