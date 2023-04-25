<?php
		global $wpdb;
	   	$table1_name = $wpdb->prefix . "deadbolt";
		

		if (isset($_POST['update'])) 
			{
			if( $emails = $_POST['domains'] )
				{
				$wpdb->query( "DELETE FROM $table1_name WHERE 1=1" );
				$emails = explode( "\n", $emails );
				foreach( $emails as $email )
					{
					if( $email = trim( $email ))
						{
						$wpdb->query( "INSERT INTO $table1_name SET deadbolt = '" . mysql_real_escape_string( $email ) . "'" );
						}
					}
			$deadbolt_option = $_POST['deadbolt_option'];
			update_option('deadbolt_option', $deadbolt_option);
			$deadbolt_message = $_POST['deadbolt_message'];
			update_option('deadbolt_message', $deadbolt_message);
			}
?>
<div id="message" class="updated fade"><p><strong>Options Updated!</strong></p></div>
<?php
} 
?>


<div class=wrap>
  	<form method="post" width='1' >
<h2>WP-Deadbolt Options</h2>
<p class="submit"><input type="submit" name="update" value="Update Options" /></p>
		
<fieldset class="options">
<legend>Whitelisting Option</legend>
<p><em>WP-Deadbolt allows you to control the e-mail addresses that may be used during the registration process, by blacklisting or whitelisting domains.</em><br />
<strong>By default, WP-Deadbolt blacklists domains from registering.</strong> If you wish to use whitelisting, you can do so by checking the box below.</p>
<p><input name="deadbolt_option" value="white" type="checkbox" id="deadbolt_option" <?php if(get_option('deadbolt_option') == 'white') { echo 'checked="checked"'; } ?> /><label for="deadbolt_option"><?php _e('I would like to use whitelisting.'); ?></label></p>
</fieldset>
<fieldset class="options">
<legend>Personalize the Message</legend>
<p><em>What would you like to display to people that are not allowed to register?</em><br /> (Keep in mind that the default WordPress login area is rather small; you don't have a lot of space for long strings of text)</p>
 <textarea name='deadbolt_message' cols='40' rows='2'><?php echo get_option('deadbolt_message'); ?></textarea>
</fieldset>
<fieldset class="options">
 <legend>Deadbolted Domains</legend>
	<p><em>Add domains that you wish to deadbolt here.</em>
<br />If you are using blacklisting, the domains added below will <strong>not</strong> be allowed to be used during registration.<br />
If you are using  whitelisting, the domains added below will <strong>only</strong> be allowed to be used during registration.<br />
The proper syntax is <code>google.com</code> or <code>google</code><br />
Put each domain on it's own line. Do not use wildcard characters.</p>
	<textarea name='domains' cols='40' rows='10'><?php
	$sql = "SELECT deadbolt FROM $table1_name"; $deadbolts = $wpdb->get_results($sql ); foreach( $deadbolts as $deadbolt  ) {echo $deadbolt->deadbolt . "\n";} ?></textarea>
</fieldset>
	<p class="submit"><input type="submit" name="update" value="Update Options" /></p>
  	</form>
	</div>
