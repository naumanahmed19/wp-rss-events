<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://nauman.dev
 * @since      1.0.0
 *
 * @package    Wp_Rss_Events
 * @subpackage Wp_Rss_Events/admin/partials
 */

?>
<div id="welcome-panel" class="welcome-panel">	
	<div class="welcome-panel-content">
		<h2>Import Data</h2>
		
		<div class="welcome-panel-column-container">
		<div class="welcome-panel-column">
				<div class="rss-event-loader">
					<img  src="<?php echo  get_site_url(); ?>/wp-admin/images/spinner.gif" />
				</div>
				<a class="button button-primary button-hero load-customize btn-rss-event-import" href="#">
					Import Events
				</a>
				<p class="hide-if-no-customize">	</p>
			</div>
		</div>
	</div>
</div>

