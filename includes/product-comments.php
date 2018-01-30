<?php
/**
 * Disable comments on products.
 * @since 1.0.0
 */
function joe_stwp_product_close_comments( $post_content, $post ) {
    if( $post->post_type )
    switch( $post->post_type ) {
        case 'shopify_product':
            $post->comment_status = 'closed';
        break;
    }
    return $post_content;
}
add_filter( 'default_content', 'joe_stwp_product_close_comments', 10, 2 );
?>