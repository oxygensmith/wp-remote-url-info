<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/oxygensmith
 * @since      1.0.0
 *
 * @package    Wp_Get_Remote_Url_Info
 * @subpackage Wp_Get_Remote_Url_Info/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Get_Remote_Url_Info
 * @subpackage Wp_Get_Remote_Url_Info/admin
 * @author     Rob Butz <rob@oxygensmith.ca>
 */
class Wp_Get_Remote_Url_Info_Admin {
	// = Toptal Save Admin in plugin tutorial
	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Get_Remote_Url_Info_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Get_Remote_Url_Info_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        if ( 'tools_page_get-remote-url-info-save' != $hook ) {
			return;
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-get-remote-url-info-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Get_Remote_Url_Info_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Get_Remote_Url_Info_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( 'tools_page_get-remote-url-info-save' != $hook ) {
			return;
		}
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-get-remote-url-info-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Register the settings page for the admin area.
	 *
	 * @since    0.1
	 */
	public function register_settings_page() {
		// Create our settings page as a submenu page.
		add_submenu_page(
			'tools.php',                             // parent slug
			__( 'Get Remote URL Info Options', 'get-remote-url-info-save' ), // page title
			__( 'Get Remote URL Info', 'get-remote-url-info-save' ), // menu title
			'manage_options',                        // capability
			'get-remote-url-info-save',              // menu_slug
			array( $this, 'display_settings_page' )  // callable function
		);
	}

	/**
 	* Display the settings page content for the page we have created.
 	*
 	* @since    1.0.0
 	*/
	public function display_settings_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wp-get-remote-url-info-admin-display.php';

	}

	/**
	 * Register the settings for our settings page.
	 *
	 * @since    0.1
	 */
	public function register_settings() {

		// Here we are going to register our setting.
		register_setting(
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings',
			array( $this, 'sandbox_register_setting' )
		);

		// Here we are going to add a section for our setting.
		add_settings_section(
			$this->plugin_name . '-settings-section',
			__( 'Settings', 'get-remote-url-info-save' ),
			array( $this, 'sandbox_add_settings_section' ),
			$this->plugin_name . '-settings'
		);

		// Here we are going to add fields to our section.
		add_settings_field(
			'post-types',
			__( 'Post Types', 'get-remote-url-info-save' ),
			array( $this, 'sandbox_add_settings_field_multiple_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'post-types',
				'description' => __( 'Save button will be added only to the checked post types.', 'get-remote-url-info-save' )
			)
		);
		
		// ...

	}

}
