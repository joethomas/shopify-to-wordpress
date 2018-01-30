<?php
/*
	Plugin Name: Shopify to WordPress
	Description: Embed your Shopify products directly onto the page with shortcodes. Also, you get a new Products custom post type with associated meta boxes and taxonomies.
	Plugin URI: https://github.com/joethomas/shopify-to-wordpress
	Version: 1.2.0
	Author: Joe Thomas
	Author URI: https://github.com/joethomas
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: shopify-to-wordpress
	Domain Path: /languages/

	GitHub Plugin URI: https://github.com/joethomas/shopify-to-wordpress
	GitHub Branch: master
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;


/* Global Variables & Constants
==============================================================================*/

/**
 * Define the constants for use within the plugin
 */

// Plugin
function joe_stwp_get_plugin_data_version() {
	$plugin = get_plugin_data( __FILE__, false, false );

	define( 'JOE_STWP_VER', $plugin['Version'] );
	define( 'JOE_STWP_TEXTDOMAIN', $plugin['TextDomain'] );
	define( 'JOE_STWP_NAME', $plugin['Name'] );
}
add_action( 'init', 'joe_stwp_get_plugin_data_version' );

define( 'JOE_STWP_PREFIX', 'shopify-to-wordpress' );


/* Bootstrap
==============================================================================*/

require_once( 'includes/product-comments.php' ); // controls comments on Product CPT
require_once( 'includes/product-cpt.php' ); // controls Product CPT
require_once( 'includes/product-taxonomies.php' ); // controls Product CPT taxonomies
require_once( 'includes/shortcodes.php' ); // controls plugin shortcodes
require_once( 'includes/updates.php' ); // controls plugin updates
