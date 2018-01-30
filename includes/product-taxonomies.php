<?php
/**
 * Register Product Collection Taxonomy
 * @since 1.0.0
 */
function joe_stwp_register_product_taxonomy_collection() {

	$labels = array(
		'name'                       => _x( 'Product Collections', 'Taxonomy General Name', 'shopify-to-wordpress' ),
		'singular_name'              => _x( 'Collection', 'Taxonomy Singular Name', 'shopify-to-wordpress' ),
		'menu_name'                  => __( 'Collections', 'shopify-to-wordpress' ),
		'all_items'                  => __( 'All Collections', 'shopify-to-wordpress' ),
		'parent_item'                => __( 'Parent Item', 'shopify-to-wordpress' ),
		'parent_item_colon'          => __( 'Parent Item:', 'shopify-to-wordpress' ),
		'new_item_name'              => __( 'New Collection Name', 'shopify-to-wordpress' ),
		'add_new_item'               => __( 'Add New Collection', 'shopify-to-wordpress' ),
		'edit_item'                  => __( 'Edit Collection', 'shopify-to-wordpress' ),
		'update_item'                => __( 'Update Collection', 'shopify-to-wordpress' ),
		'separate_items_with_commas' => __( 'Separate collections with commas', 'shopify-to-wordpress' ),
		'search_items'               => __( 'Search Collections', 'shopify-to-wordpress' ),
		'add_or_remove_items'        => __( 'Add or remove collections', 'shopify-to-wordpress' ),
		'choose_from_most_used'      => __( 'Choose from the most used collections', 'shopify-to-wordpress' ),
		'not_found'                  => __( 'Not Found', 'shopify-to-wordpress' ),
	);
	$rewrite = array(
		'slug'                       => 'collection',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_collection', array( 'shopify_product' ), $args );

}
add_action( 'init', 'joe_stwp_register_product_taxonomy_collection', 0 );
?>