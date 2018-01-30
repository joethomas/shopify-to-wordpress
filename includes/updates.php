<?php
/**
 * Do not update plugin from WordPress repository
 *
 * @since 1.0.0
 */
function joe_stwp_do_not_update_plugin_wp_19067645( $r, $url ) {

	if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) ) {

		return $r; // Not a plugin update request. Bail immediately.

	}

	$plugins = unserialize( $r['body']['plugins'] );

	unset( $plugins->plugins[ plugin_basename( __FILE__ ) ] );
	unset( $plugins->active[ array_search( plugin_basename( __FILE__ ), $plugins->active ) ] );

	$r['body']['plugins'] = serialize( $plugins );

	return $r;

}
add_filter( 'http_request_args', 'joe_stwp_do_not_update_plugin_wp_19067645', 5, 2 );