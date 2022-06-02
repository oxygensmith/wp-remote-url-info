<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/oxygensmith
 * @since             0.1
 * @package           Wp_Get_Remote_Url_Info
 *
 * @wordpress-plugin
 * Plugin Name:       Get Remote URL Info
 * Plugin URI:        https://github.com/oxygensmith/wp-remote-url-info
 * Description:       Custom fieldtype and mass updating to store info about remote URLs (such as a page title).
 * Version:           0.1
 * Author:            Rob Butz
 * Author URI:        https://github.com/oxygensmith
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-get-remote-url-info
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_GET_REMOTE_URL_INFO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-get-remote-url-info-activator.php
 */
function activate_wp_get_remote_url_info() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-get-remote-url-info-activator.php';
	Wp_Get_Remote_Url_Info_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-get-remote-url-info-deactivator.php
 */
function deactivate_wp_get_remote_url_info() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-get-remote-url-info-deactivator.php';
	Wp_Get_Remote_Url_Info_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_get_remote_url_info' );
register_deactivation_hook( __FILE__, 'deactivate_wp_get_remote_url_info' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-get-remote-url-info.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_get_remote_url_info() {

	$plugin = new Wp_Get_Remote_Url_Info();
	$plugin->run();

}
run_wp_get_remote_url_info();
