<?php
/**
 * Register Product Post Type
 *
 * @link https://code.tutsplus.com/tutorials/a-guide-to-wordpress-custom-post-types-creation-display-and-meta-boxes--wp-27645
 * @since 1.0.0
 */
function joe_stwp_register_product_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'shopify-to-wordpress' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'shopify-to-wordpress' ),
		'menu_name'             => __( 'Products', 'shopify-to-wordpress' ),
		'name_admin_bar'        => __( 'Products', 'shopify-to-wordpress' ),
		'archives'              => __( 'Product Archives', 'shopify-to-wordpress' ),
		'parent_item_colon'     => __( 'Parent Item:', 'shopify-to-wordpress' ),
		'all_items'             => __( 'All Products', 'shopify-to-wordpress' ),
		'view_item'             => __( 'View', 'shopify-to-wordpress' ),
		'add_new_item'          => __( 'Add New', 'shopify-to-wordpress' ),
		'add_new'               => __( 'Add New', 'shopify-to-wordpress' ),
		'edit_item'             => __( 'Edit', 'shopify-to-wordpress' ),
		'update_item'           => __( 'Update', 'shopify-to-wordpress' ),
		'search_items'          => __( 'Search Products', 'shopify-to-wordpress' ),
		'not_found'             => __( 'No products found.', 'shopify-to-wordpress' ),
		'not_found_in_trash'    => __( 'No products found in Trash.', 'shopify-to-wordpress' ),
		'featured_image'        => __( 'Featured Image', 'shopify-to-wordpress' ),
		'set_featured_image'    => __( 'Set featured image', 'shopify-to-wordpress' ),
		'remove_featured_image' => __( 'Remove featured image', 'shopify-to-wordpress' ),
		'use_featured_image'    => __( 'Use as featured image', 'shopify-to-wordpress' ),
		'insert_into_item'      => __( 'Insert into product', 'shopify-to-wordpress' ),
		'uploaded_to_this_item' => __( 'Uploaded to this product', 'shopify-to-wordpress' ),
		'items_list'            => __( 'Products list', 'shopify-to-wordpress' ),
		'items_list_navigation' => __( 'Products list navigation', 'shopify-to-wordpress' ),
		'filter_items_list'     => __( 'Filter products list', 'shopify-to-wordpress' ),
	);
	$rewrite = array(
		'slug'                  => 'product',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'               => __( 'Product', 'shopify-to-wordpress' ),
		'description'         => __( 'Product post type', 'shopify-to-wordpress' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => current_user_can( 'edit_pages' ) ? true : false,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => current_user_can( 'edit_pages' ) ? true : false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-products',
		'can_export'          => true,
		'has_archive'         => 'shop',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'shopify_product', $args );

}
add_action( 'init', 'joe_stwp_register_product_post_type', 0 );
?>