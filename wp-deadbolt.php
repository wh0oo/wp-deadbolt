<?php
/*
Plugin Name: WP-Deadbolt 
Plugin URI: http://www.village-idiot.org/archives/2007/04/24/wp-deadbolt-3/
Description: Give yourself control of e-mail addresses that can be used when registering on your WordPress blog.
Version: 3.0
Author: whoo
Author URI: http://www.village-idiot.org

Changes:

01/09/07: Version 2.1

	Initial release for WordPress 2.1.

04/23/07: Version 3.0

	Changeover to MySQL integration. 
	All settings configurable via administration area.

*/
function deadbolt() {
		
		global $errors;
		$checkemail=$_POST['user_email'];
		global $wpdb;
		$table_name = $wpdb->prefix . "deadbolt";
		$sql = 'select ID, deadbolt from '.$table_name;
		$badmails = array();
		$results = $wpdb->get_results($sql );
		foreach( $results as $result )
		$badmails[] = $result->deadbolt;
		$pass = true;
		for (
		$i = 0, $n = sizeof($badmails), $badmail;
		$i < $n && $pass = (strpos($checkemail, $badmail = $badmails[$i]) === false);
		$i++
		) 
		{	}
		if ((get_option('deadbolt_option') == "white" && $pass) || (get_option('deadbolt_option') != "white" && !$pass ))
		{
		$errors['deadbolt'] = get_option('deadbolt_message');
		}
		}

// Install the necessary table.

	function deadbolt_install() {
		global $wpdb;
		$deadbolt_table_name = $wpdb->prefix . "deadbolt";
		if($wpdb->get_var("show tables like '$deadbolt_table_name'") != $deadbolt_table_name) {
		
		$sql = "
			CREATE TABLE " . $deadbolt_table_name . " (
			id int(11) unsigned NOT NULL AUTO_INCREMENT,
			deadbolt varchar(64) NOT NULL DEFAULT '',
			PRIMARY KEY (id)
			);";
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);
		}
// Default settings, user can change these via the admin area
		update_option('deadbolt_option', '');
		update_option('deadbolt_message', 'That domain is not allowed to register.');	
}
		
		
// Load the options page
	
	function deadbolt_optionsmenu() {
		if (function_exists('add_submenu_page')) {
		add_submenu_page('options-general.php', 'WP-Deadbolt', 'WP-Deadbolt', '8', 'deadbolt_options.php');
	}
}
// Hooks	
add_action('admin_menu', 'deadbolt_optionsmenu');
add_action('activate_wp-deadbolt.php', 'deadbolt_install');
add_action('register_post', 'deadbolt');

?>