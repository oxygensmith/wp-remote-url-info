<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/oxygensmith
 * @since      1.0.0
 *
 * @package    Wp_Get_Remote_Url_Info
 * @subpackage Wp_Get_Remote_Url_Info/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wrap">
	<form method="post" action="options.php">
		<?php
			settings_fields( 'get-remote-url-info-settings' );
			do_settings_sections( 'get-remote-url-info-save-settings' );
			submit_button();
		?>
	</form>
</div>