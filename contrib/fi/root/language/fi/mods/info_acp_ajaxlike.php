<?php
/**
*
* @package acp
* @copyright (c) 2013 emosbat.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

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
	'ACP_AJAXLIKE_MOD_TITLE'						=> 'phpBB Ajax Like',
	'ACP_AJAXLIKE_CONFIG_TITLE'						=> 'Ajax Like -asetukset',
	'ACP_AJAXLIKE_TITLE'							=> 'Ajax Like -asetukset',
	'ACP_AJAXLIKE_LEGEND1'							=> 'Yleistä',
	'ACP_AJAXLIKE_CONFIG_ENABLE'					=> 'Status',
	'ACP_AJAXLIKE_CONFIG_GUEST'						=> 'Vierasnäkymä',
	'ACP_AJAXLIKE_CONFIG_GUEST_EXPLAIN'				=> 'Voivatko kirjautumattomat nähdä tykkäykset',
	'ACP_AJAXLIKE_CONFIG_LIST_PROFILE'				=> 'Näytä omissa tiedoissa',
	'ACP_AJAXLIKE_CONFIG_LIST_PROFILE_EXPLAIN'		=> 'Näytä tykkäykset omissa tiedoissa',
	'ACP_AJAXLIKE_CONFIG_LIST_MAX'					=> 'Tykkäysten määrä omissa tiedoissa',
	'ACP_AJAXLIKE_CONFIG_LIST_MAX_EXPLAIN'			=> '0 = oletusarvo',
	'ACP_AJAXLIKE_CONFIG_ALLOW_UNLIKE'				=> 'Salli tykkäyksen peruuttaminen',
	'ACP_AJAXLIKE_CONFIG_ALLOW_UNLIKE_EXPLAIN'		=> 'Salli tykkäysten peruuttaminen?',
	'ACP_AJAXLIKE_CONFIG_NOTIFY'					=> 'Tykkäysilmoitus',
	'ACP_AJAXLIKE_CONFIG_NOTIFY_EXPLAIN'			=> 'Aseta tykkäysilmoitukset',
	'ACP_AJAXLIKE_CONFIG_INTERVAL'					=> 'Ilmoitusten aikaväli',
	'ACP_AJAXLIKE_CONFIG_INTERVAL_EXPLAIN'			=> 'Tarkista uudet tykkäykset joka näin mones sekunti.',
	'ACP_AJAXLIKE_CONFIG_ALTER_MODE'				=> 'Vaihtoehtoinen toimintapata',
	'ACP_AJAXLIKE_CONFIG_ALTER_MODE_EXPLAIN'		=> 'Jos sallittu, näyttää vain tykkääjien määrän (hyödyllinen joillekin kielille)',
));
?>
