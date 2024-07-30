<?php
/*
Plugin Name: WPHex Master
Plugin URI: https://themeforest.net/user/ir-tech/portfolio
Description: Plugin to contain short codes and custom post types of the WPHex theme.
Author: Ir-Tech
Author URI:https://themeforest.net/user/ir-tech
Version: 1.0.1
Text Domain: bytesed-master
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'wphex_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'wphex_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'wphex_MASTER_SELF_PATH', 'wphex-master/wphex-master.php' );
define( 'wphex_MASTER_VERSION', '1.0.1' );
define( 'wphex_MASTER_INC', wphex_MASTER_ROOT_PATH .'/inc');
define( 'wphex_MASTER_LIB', wphex_MASTER_ROOT_PATH .'/lib');
define( 'wphex_MASTER_ELEMENTOR', wphex_MASTER_ROOT_PATH .'/elementor');
define( 'wphex_MASTER_DEMO_IMPORT', wphex_MASTER_ROOT_PATH .'/demo-data-import');
define( 'wphex_MASTER_ADMIN', wphex_MASTER_ROOT_PATH .'/admin');
define( 'wphex_MASTER_ADMIN_ASSETS', wphex_MASTER_ROOT_URL .'admin/assets');
define( 'wphex_MASTER_WP_WIDGETS', wphex_MASTER_ROOT_PATH .'/wp-widgets');
define( 'wphex_MASTER_ASSETS', wphex_MASTER_ROOT_URL .'assets/');
define( 'wphex_MASTER_CSS', wphex_MASTER_ASSETS .'css');
define( 'wphex_MASTER_JS', wphex_MASTER_ASSETS .'js');
define( 'wphex_MASTER_IMG', wphex_MASTER_ASSETS .'img');

//load wphex helpers functions
if (!function_exists('wphex')){
    require_once wphex_MASTER_LIB .'/codestar-framework/codestar-framework.php';
	require_once wphex_MASTER_INC .'/class-wphex-helper-functions.php';
	if (!function_exists('wphex')){
		function wphex(){
			return class_exists('wphex_Helper_Functions') ? new wphex_Helper_Functions() : false;
		}
	}
}
//load codester framework functions
if ( !wphex()->is_wphex_active()) {
	if ( file_exists( wphex_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once wphex_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( wphex_MASTER_ROOT_PATH . '/inc/class-wphex-master-init.php' ) ) {
	require_once wphex_MASTER_ROOT_PATH . '/inc/class-wphex-master-init.php';
}
