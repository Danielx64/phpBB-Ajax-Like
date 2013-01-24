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
	'ACP_AJAXLIKE_CONFIG_TITLE'						=> 'Paramètres Ajax Like',
	'ACP_AJAXLIKE_TITLE'							=> 'Paramètres Ajax Like',
	'ACP_AJAXLIKE_LEGEND1'							=> 'Général',
	'ACP_AJAXLIKE_CONFIG_ENABLE'					=> 'Statut',
	'ACP_AJAXLIKE_CONFIG_GUEST'						=> 'Permission des invités',
	'ACP_AJAXLIKE_CONFIG_GUEST_EXPLAIN'				=> 'Est-ce que les invités peuvent voir les "J’aime" ?',
	'ACP_AJAXLIKE_CONFIG_LIST_PROFILE'				=> 'Afficher dans le profil',
	'ACP_AJAXLIKE_CONFIG_LIST_PROFILE_EXPLAIN'		=> 'Afficher les "J’aime" dans le profil de l’utilisateur ?',
	'ACP_AJAXLIKE_CONFIG_LIST_MAX'					=> 'Nombre de "J’aime" dans les profils',
	'ACP_AJAXLIKE_CONFIG_LIST_MAX_EXPLAIN'			=> '0 = défaut',
	'ACP_AJAXLIKE_CONFIG_ALLOW_UNLIKE'				=> 'Autoriser le "Je n’aime plus"',
	'ACP_AJAXLIKE_CONFIG_ALLOW_UNLIKE_EXPLAIN'		=> 'Autoriser les utilisateurs à ne plus aimer leur "J’aime" ?',
	'ACP_AJAXLIKE_CONFIG_NOTIFY'					=> 'Notification de "J’aime"',
	'ACP_AJAXLIKE_CONFIG_NOTIFY_EXPLAIN'			=> 'Activer les notifications pour les "J’aime" ?',
	'ACP_AJAXLIKE_CONFIG_INTERVAL'					=> 'Intervalle de notification',
	'ACP_AJAXLIKE_CONFIG_INTERVAL_EXPLAIN'			=> 'Vérifier les nouveaux "J’aime" toutes les X secondes.',
));
?>