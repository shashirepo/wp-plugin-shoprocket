<?php
if(!class_exists('wp_plugin_Shoprocket_Settings'))
{
	class wp_plugin_Shoprocket_Settings
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		} // END public function __construct
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('wp_plugin_Shoprocket-group', 'username');
        	register_setting('wp_plugin_Shoprocket-group', 'password');

        	// add your settings section
        	add_settings_section(
        	    'wp_plugin_Shoprocket-section', 
        	    'ShopRocket login credentials', 
        	    array(&$this, 'settings_section_wp_plugin_Shoprocket'), 
        	    'wp_plugin_Shoprocket'
        	);
        	
        	// add your setting's fields
            add_settings_field(
                'wp_plugin_Shoprocket-username', 
                'Username', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_Shoprocket', 
                'wp_plugin_Shoprocket-section',
                array(
                    'field' => 'username'
                )
            );
            add_settings_field(
                'wp_plugin_Shoprocket-password', 
                'Password', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_Shoprocket', 
                'wp_plugin_Shoprocket-section',
                array(
                    'field' => 'Password'
                )
            );
            // Possibly do additional admin_init tasks
        } // END public static function activate
        
        public function settings_section_wp_plugin_Shoprocket()
        {
            // Think of this as help text for the section.
            echo 'Please provide your username & password for ShopRocket activation';
        }
        
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)
        
        /**
         * add a menu
         */		
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'WP Plugin Template Settings', 
        	    'Shoprocket Settings', 
        	    'manage_options', 
        	    'wp_plugin_Shoprocket', 
        	    array(&$this, 'plugin_settings_page')
        	);
        } // END public function add_menu()
    
        /**
         * Menu Callback
         */		
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
	
        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class wp_plugin_Shoprocket_Settings
} // END if(!class_exists('wp_plugin_Shoprocket_Settings'))
