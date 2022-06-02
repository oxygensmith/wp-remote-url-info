<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/oxygensmith
 * @since      1.0.0
 *
 * @package    Wp_Get_Remote_Url_Info
 * @subpackage Wp_Get_Remote_Url_Info/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Get_Remote_Url_Info
 * @subpackage Wp_Get_Remote_Url_Info/includes
 * @author     Rob Butz <rob@oxygensmith.ca>
 */
class Wp_Get_Remote_Url_Info_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-get-remote-url-info',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
