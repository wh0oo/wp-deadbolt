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



Installation: 

1. 	Upload wp-deadbolt.php and deadbolt_options.php to your WordPress plugins directory.

2. 	Activate WP-Deadbolt (via the Plugin Management page) 

3. 	Navigate to Options --> WP-Deadbolt to make changes and add domains.


Usage:

	Many WordPress bloggers are seeing what can only be called "spam registrations". WP-Deadbolt allows you to combat 
	spam registrations by blocking certain domains from being used, using simple blacklisting techniques.

	For instance, let's say you kept getting registrations from someone using the domain cashette.com ...
	
	Simply add the domain, cashette.com to the list of deadbolted domains and no-one will be able to register on your 
	WordPress blog using an e-mail address that uses that domain.


	Conversely, many WordPress bloggers want to only allow registrations from specific domains. A good example of this
	might be a corporate blog, or an educational blog. WP-Deadbolt allows this to be done using simple whitelisting/

	For instance, let's you only want to allow registrations from acme.com ....

	Simply add the domain, acme.com to your list of deadbolted domains, and click on the whitelisting option and ONLY
	e-mail addresses using that domain will be allowed to register.


	More information on whitelisting and blacklisting is available here:
	
	http://en.wikipedia.org/wiki/Whitelist
	http://en.wikipedia.org/wiki/Blacklist


Shoutouts:

	I could not have done this without two people:

	Ben Lupton (balupton) @ http://www.balupton.com

	and 

	Paul Yabba (•ÂﬂﬂÂ) @ http://www.innervisions.org.uk/babbles

	My PHP skills only go so far.

	One bit of the options page was graciously borrowed from Web Professor's Registration Blacklist. 
	I could have changed it, but his code worked so well, I left it as is.

	


