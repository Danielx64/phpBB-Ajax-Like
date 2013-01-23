<?php
/**
*
* @package phpBB3
* @copyright (c) 2013 emosbat.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

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
	'INSTALL_AJAXLIKE_MOD'				=> 'نصب phpBB Ajax Like Mod',
	'INSTALL_AJAXLIKE_MOD_CONFIRM'		=> 'آیا برای نصب phpBB Ajax Like Mod اطمینان دارید؟',

	'AJAXLIKE_MOD'						=> 'phpBB Ajax Like Mod',

	'UNINSTALL_AJAXLIKE_MOD'			=> 'حذف phpBB Ajax Like Mod',
	'UNINSTALL_AJAXLIKE_MOD_CONFIRM'	=> 'آیا قصد حذف phpBB Ajax Like Mod را دارید؟  کلیه تنظیمات حذف می شوند!!',
	'UPDATE_AJAXLIKE_MOD'				=> 'ارتقا phpBB Ajax Like Mod',
	'UPDATE_AJAXLIKE_MOD_CONFIRM'		=> 'آیا آماده ارتقا phpBB Ajax Like Mod هستید؟',
));

?>