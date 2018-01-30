<?php

/**
 * Load styles and scripts.
 *
 * @since 1.1.0
 */
function joe_stwp_enqueue_scripts() {

	wp_register_script( 'shopify-product-init', plugin_dir_url( __FILE__ ) . 'js/shopify-product-init.js', array(), JOE_STWP_VER, true );

}
add_action( 'wp_enqueue_scripts', 'joe_stwp_enqueue_scripts' );

/**
 * Load the script asynchronously.
 * @since 1.1.0
 */
function joe_stwp_add_async_attribute( $tag, $handle ) {

	if ( 'shopify-product-init' !== $handle )
		return $tag;
	return str_replace( ' src', ' async="async" src', $tag );

}
//add_filter( 'script_loader_tag', 'joe_stwp_add_async_attribute', 10, 2 );


/**
 * Shortcode: Shopify Product Embed
 *
 * Usage: [shopify_product product_id="740884938795" image="false" title="true" price="true" description="true" alignment="center" iframe="true"]
 *
 * @since 1.1.0
 */
function joe_stwp_shortcode_shopify_product( $atts ) {

	/* Generate random 11-digit alphanumeric string for product-component id. */
	$character_array      = array_merge( range( 'a', 'z' ), range( 0, 9 ) );
	$id_length            = 11;
	$product_component_id = '';

	for( $i = 0; $i < $id_length; $i++ ) {
		$product_component_id .= $character_array[rand( 0, ( count( $character_array ) - 1 ) )];
    }

	$shopify_product_atts = shortcode_atts(
		array(
			'product_component_id' => $product_component_id,
			'product_id'           => '', // Find at end of URL in Shopify product edit
			'image'                => 'false', // Display image (true or false)
			'image_carousel'       => 'false', // Display image carousel
			'title'                => 'true', // Display title (true or false)
			'price'                => 'true', // Display price (true or false)
			'button_with_quantity' => 'true', // Display button with quantity (true or false)
			'button'               => 'false', // Display button (true or false)
			'quantity'             => 'false', // Display quantity field (true or false)
			'quantity_increment'   => 'false', // Display quantity increment button (true or false)
			'quantity_decrement'   => 'false', // Display quantity decrement button (true or false)
			'description'          => 'false', // Display description (true or false)
			'alignment'            => 'left', // Alignment of content (left, center, or right)
			'layout'               => 'vertical', // Display layout (vertical or horizontal)
			'iframe'               => 'true', // Render in iFrame (true or false)
			'button_text'          => 'ADD TO CART', // Button text
		),
		$atts
	);

	// Evaluate true and false for boolean values
	if ( $shopify_product_atts['image'] === 'false' ) {
		$shopify_product_atts['image'] = false; // just to be sure...
	} else {
		$shopify_product_atts['image'] = (bool)$shopify_product_atts['image'];
	}

	if ( $shopify_product_atts['image_carousel'] === 'false' ) {
		$shopify_product_atts['image_carousel'] = false; // just to be sure...
	} else {
		$shopify_product_atts['image_carousel'] = (bool)$shopify_product_atts['image_carousel'];
	}

	if ( $shopify_product_atts['title'] === 'false' ) {
		$shopify_product_atts['title'] = false; // just to be sure...
	} else {
		$shopify_product_atts['title'] = (bool)$shopify_product_atts['title'];
	}

	if ( $shopify_product_atts['price'] === 'false' ) {
		$shopify_product_atts['price'] = false; // just to be sure...
	} else {
		$shopify_product_atts['price'] = (bool)$shopify_product_atts['price'];
	}

	if ( $shopify_product_atts['button_with_quantity'] === 'false' ) {
		$shopify_product_atts['button_with_quantity'] = false; // just to be sure...
	} else {
		$shopify_product_atts['button_with_quantity'] = (bool)$shopify_product_atts['button_with_quantity'];
	}

	if ( $shopify_product_atts['button'] === 'false' ) {
		$shopify_product_atts['button'] = false; // just to be sure...
	} else {
		$shopify_product_atts['button'] = (bool)$shopify_product_atts['button'];
	}

	if ( $shopify_product_atts['quantity'] === 'false' ) {
		$shopify_product_atts['quantity'] = false; // just to be sure...
	} else {
		$shopify_product_atts['quantity'] = (bool)$shopify_product_atts['quantity'];
	}

	if ( $shopify_product_atts['quantity_increment'] === 'false' ) {
		$shopify_product_atts['quantity_increment'] = false; // just to be sure...
	} else {
		$shopify_product_atts['quantity_increment'] = (bool)$shopify_product_atts['quantity_increment'];
	}

	if ( $shopify_product_atts['quantity_decrement'] === 'false' ) {
		$shopify_product_atts['quantity_decrement'] = false; // just to be sure...
	} else {
		$shopify_product_atts['quantity_decrement'] = (bool)$shopify_product_atts['quantity_decrement'];
	}

	if ( $shopify_product_atts['description'] === 'false' ) {
		$shopify_product_atts['description'] = false; // just to be sure...
	} else {
		$shopify_product_atts['description'] = (bool)$shopify_product_atts['description'];
	}

	if ( $shopify_product_atts['iframe'] === 'false' ) {
		$shopify_product_atts['iframe'] = false; // just to be sure...
	} else {
		$shopify_product_atts['iframe'] = (bool)$shopify_product_atts['iframe'];
	}

	if ( '' !== $shopify_product_atts['product_id'] ) {

		wp_enqueue_script( 'shopify-product-init' );
		wp_localize_script( 'shopify-product-init', 'shopify_product_vars', $shopify_product_atts );

		$output = '<div id="product-component-' . $shopify_product_atts['product_component_id'] . '"></div>';

	} else {

		$output = 'Error: Please enter the product ID of the product you want to display.';

	}

	return $output;

}
add_shortcode( 'shopify_product', 'joe_stwp_shortcode_shopify_product' );