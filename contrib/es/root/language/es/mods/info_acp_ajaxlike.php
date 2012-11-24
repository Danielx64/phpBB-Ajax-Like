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
	'ACP_AJAXLIKE_CONFIG_TITLE'				=> 'Me gusta',
	'TITLE'									=> 'Configuración de ajax Like',
	'LEGEND1'								=> 'General',
	'ACP_CONFIG_ENABLE'						=> 'Estado',
	'ACP_CONFIG_GUEST'						=> 'Permitir invitados',
	'ACP_CONFIG_GUEST_EXPLAIN'				=> 'Permitir a los invitados ver "me gusta"?',
	'ACP_CONFIG_LIST_PROFILE'				=> 'Mostrar en perfiles',
	'ACP_CONFIG_LIST_PROFILE_EXPLAIN'		=> 'Mostrar los mensajes que han recibido me gusta en el perfil de usuario?',
	'ACP_CONFIG_LIST_MAX'					=> 'Número de mensajes a mostrar en el perfil',
	'ACP_CONFIG_LIST_MAX_EXPLAIN'			=> '0 = por defecto',
	'ACP_CONFIG_ALLOW_UNLIKE'				=> 'Habilitar "ya no me gusta"',
	'ACP_CONFIG_ALLOW_UNLIKE_EXPLAIN'		=> 'Permitir usar "ya no me gusta"?',
	'ACP_CONFIG_NOTIFY'						=> 'Notificaciones',
	'ACP_CONFIG_NOTIFY_EXPLAIN'				=> 'Habilitar notificationes al recibir un nuevo "me gusta"?',
	'ACP_CONFIG_INTERVAL'					=> 'Intervalo de las notificaciones',
	'ACP_CONFIG_INTERVAL_EXPLAIN'			=> '',
));
?>