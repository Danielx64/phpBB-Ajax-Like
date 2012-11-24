<?php
class acp_ajaxlike_info
{
    function module()
    {
        return array(
            'filename'    => 'acp_ajaxlike',
            'title'        => 'ACP_MOD_TITLE',
            'version'    => '1.0.0',
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