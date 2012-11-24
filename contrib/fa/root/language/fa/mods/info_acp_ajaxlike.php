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
	'ACP_AJAXLIKE_CONFIG_TITLE'				=> 'تنظیمات Ajax Like',
	'TITLE'									=> 'تنظیمات Ajax Like',
	'LEGEND1'								=> 'عمومی',
	'ACP_CONFIG_ENABLE'						=> 'وضعیت',
	'ACP_CONFIG_GUEST'						=> 'مشاهده میهمان',
	'ACP_CONFIG_GUEST_EXPLAIN'				=> 'لایک ها برای میهمانان قابل مشاهده باشد؟',
	'ACP_CONFIG_LIST_PROFILE'				=> 'نمایش در پروفایل ها',
	'ACP_CONFIG_LIST_PROFILE_EXPLAIN'		=> 'نمایش پست های لایک شده در پروفایل ها؟',
	'ACP_CONFIG_LIST_MAX'					=> 'تعداد لایک ها در پروفایل',
	'ACP_CONFIG_LIST_MAX_EXPLAIN'			=> '0 = پیش فرض',
	'ACP_CONFIG_ALLOW_UNLIKE'				=> 'اجازه آنلایک',
	'ACP_CONFIG_ALLOW_UNLIKE_EXPLAIN'		=> 'اجازه به کاربران برای آنلایک کردن پست؟',
	'ACP_CONFIG_NOTIFY'						=> 'یادآور لایک',
	'ACP_CONFIG_NOTIFY_EXPLAIN'				=> 'فعال بودن یادآور لایک؟',
	'ACP_CONFIG_INTERVAL'					=> 'وقفه میان یادآوری',
	'ACP_CONFIG_INTERVAL_EXPLAIN'			=> 'بررسی لایک جدید در هر n ثانیه.',
));
?>