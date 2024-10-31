=== Plugin Mover ===
Contributors: theode
Tags: plugin,management,admin
Requires at least: 4.7
Tested up to: 5.6.1
Stable: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Easily move your plugins into another folder!

== Description ==

If too many plugins appear in the WordPress admin sometimes the question appear if there is a way to move them out of sight without deleting them.
This plugin is able to do this task.
Define a folder under Tools -> Plugin Mover and then go to plugins admin page and choose to move plugins to your defined folder.
Afterwards you can see them by ftp in the defined folder.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory of your site

OR

2. Upload the zip file through the `New Plugin` upload functionality

OR

3. Download through the plugin install functionality of WordPress.

4. Activate through the `Plugins` menu in WordPress


== Frequently Asked Questions ==


= Is there a way to set another folder as my plugin folder? =
Good question.
Go to wp-config.php and put in these
 
define( 'WP_PLUGIN_DIR', $_SERVER['DOCUMENT_ROOT'] . '/blog/wp-content/plugins' );

define( 'WP_PLUGIN_URL', 'http://example.com/blog/wp-content/plugins');



== Changelog ==

= 1.1 = update, bugfixes, future proof
= 1.0 = Public release

