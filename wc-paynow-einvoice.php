<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.paynow.com.tw/
 * @since             1.0.0
 * @package           Paynow_Einvoice
 *
 * @wordpress-plugin
 * Plugin Name:       PayNow (Taiwan) E-Invoice for WooCommerce
 * Plugin URI:        https://paynow.yangsheep.art
 * Description:       PayNow (Taiwan) E-Invoice for WooCommerce
 * Version:           3.0.0
 * Author:            PayNow
 * Author URI:        https://www.paynow.com.tw/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-paynow-einvoice
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PAYNOW_EINVOICE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PAYNOW_EINVOICE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PAYNOW_EINVOICE_BASENAME', plugin_basename( __FILE__ ) );
define( 'PAYNOW_EINVOICE_VERSION', '2.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-paynow-einvoice-activator.php
 */
function activate_paynow_einvoice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-paynow-einvoice-activator.php';
	Paynow_Einvoice_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-paynow-einvoice-deactivator.php
 */
function deactivate_paynow_einvoice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-paynow-einvoice-deactivator.php';
	Paynow_Einvoice_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_paynow_einvoice' );
register_deactivation_hook( __FILE__, 'deactivate_paynow_einvoice' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once PAYNOW_EINVOICE_PLUGIN_DIR . 'includes/class-paynow-einvoice.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_paynow_einvoice() {

	$plugin = new Paynow_Einvoice();
	$plugin->run();

}
run_paynow_einvoice();
