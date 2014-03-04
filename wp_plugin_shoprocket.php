<?php
/*
Plugin Name: Shoprocket
Plugin URI: https://github.com/ClickHereMedia/Shoprocket
Description: Here goes description
Version: 1.0
Author: Shashikant Vaishnav
Author URI: http://www.clickheremedia.co.uk
License: GPL2
*/
/*
Copyright 2014  Shashikant Vaishnav  (email : shashikantvaishnaw@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('WP_Plugin_Shoprocket'))
{
	class WP_Plugin_Shoprocket
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			$wp_plugin_Shoprocket_Settings = new wp_plugin_Shoprocket_Settings();

			// Register custom post types
			require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
			$Post_Type_Template = new Post_Type_Template();

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate

		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=wp_plugin_Shoprocket">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}


	} // END class wp_plugin_Shoprocket
} // END if(!class_exists('wp_plugin_Shoprocket'))

if(class_exists('WP_Plugin_Shoprocket'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('WP_Plugin_Shoprocket', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Plugin_Shoprocket', 'deactivate'));

	// instantiate the plugin class
	$wp_plugin_Shoprocket = new WP_Plugin_Shoprocket();

}
