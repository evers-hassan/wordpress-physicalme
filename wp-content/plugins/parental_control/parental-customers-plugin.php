<?php
/**
 * @package  Parental_customer
 */
/*
Plugin Name: Parental Customer
Plugin URI: http://hbvsoft.com/wp/plugins/parental_customer
Description: This plugin help parents to create their children accunts and control their access to this site cuntents by age.
Version: 1.0.7
Author: Hassan Bagheri Valoujerdi
Author URI: http://hbvsoft.com
License: GPLv2 or later
Text Domain: parental-customer-plugin
*/


// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Direct access is forbiden!' );

define( 'PCPC_TEXT_DOMAIN', 'parental-customer-plugin' );
define( 'PCPC_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'PCPC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Load plugin text domain for translations
add_action( 'plugins_loaded', function() {
	load_plugin_textdomain( PCPC_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
} );

/**
 * The code that runs during plugin activation
 */
function activate_parental_customers_plugin() {
	HBVSoft\Pcpc\Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_parental_customers_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_parental_customer_plugin() {
	HBVSoft\Pcpc\Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_parental_customer_plugin' );

/**
 * Initialize all the core classes of the plugin
 */

if ( class_exists( 'HBVSoft\Pcpc\\Inc\\Init' ) ) {
	HBVSoft\Pcpc\Inc\Init::register_services();
	HBVSoft\Pcpc\Inc\Init::create_user_roles();
	add_filter( 'admin_url', ['\\HBVSoft\\Pcpc\\Inc\\Init','pcpc_user_login_redirect'], 10, 2 );
}

// add_action('init', 'create_custom_user_roles');
