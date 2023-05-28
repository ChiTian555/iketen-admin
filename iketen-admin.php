<?php

/*
Plugin Name: iketen-admin
Plugin URI: https://www.omin.co.jp/plugin
Description: 編集者以上、管理者未満
Version: 1.0
Author: iketen
Author URI: https://www.omin.co.jp/
*/

function add_roles_on_plugin_activation() {
	
    $result = get_role( 'administrator' )->capabilities;
    $result = array_replace($result, array('list_users'=>false));
    add_role( 'pre-admin', '準管理者', $result );
    update_option( 'custom_roles_version', 1 );
    
}

function iketen_admin_deactivation() {
    remove_role( 'pre-admin' );
}

register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );
register_deactivation_hook( __FILE__, 'iketen_admin_deactivation' );