<?php
/**
*
* @package acp
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

/**
* @package acp
*/

class acp_ajaxlike_info
{
    function module()
    {
        return array(
            'filename'    => 'acp_ajaxlike',
            'title'        => 'ACP_MOD_TITLE',
            'version'    => '1.0.6',
            'modes'        => array(
                'config'		=> array(
            								'title' => 'ACP_AJAXLIKE_CONFIG_TITLE',
            								'auth' => 'acl_a_ajaxlike_mod',
            								'cat' => array('ACP_CAT_DOT_MODS')
            							),
            ),
        );
    }

    function install()
    {
    }

    function uninstall()
    {
    }
}
?>