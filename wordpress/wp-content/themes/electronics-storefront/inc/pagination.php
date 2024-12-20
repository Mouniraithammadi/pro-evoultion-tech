<?php
/**
 *
 * Pagination Functions
 *
 * @package Electronics Storefront
 */

/**
 * Pagination for archive.
 */
function electronics_storefront_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $electronics_storefront_is_pagination_enabled = get_theme_mod( 'electronics_storefront_enable_pagination', true );

    // Check if pagination is enabled
    if ( $electronics_storefront_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $electronics_storefront_pagination_type = get_theme_mod( 'electronics_storefront_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $electronics_storefront_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'electronics-storefront' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'electronics-storefront' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'electronics-storefront' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'electronics-storefront' ),
                    'next_text' => __( 'Next &raquo;', 'electronics-storefront' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'electronics-storefront' ),
                )
            );
        endif;
    }
}
add_action( 'electronics_storefront_posts_pagination', 'electronics_storefront_render_posts_pagination', 10 );