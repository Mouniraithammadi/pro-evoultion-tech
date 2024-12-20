<?php
/**
 * Default Values.
 *
 * @package Electronics Storefront
 */

if ( ! function_exists( 'electronics_storefront_get_default_theme_options' ) ) :
	function electronics_storefront_get_default_theme_options() {

		$electronics_storefront_defaults = array();
		
        // Options.
        $electronics_storefront_defaults['logo_width_range']                                              = 300;
	$electronics_storefront_defaults['electronics_storefront_global_sidebar_layout']	               = 'right-sidebar';
        $electronics_storefront_defaults['electronics_storefront_header_layout_phone_number']                = esc_html__( '+(0321)7528659', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_email_id']                    = esc_html__( 'support@example.com', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_electronics_storefront_header_layout_text']    = esc_html__( 'Express Deilivery and free returns within 30 days', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_enable_translator']           = 1;
        $electronics_storefront_defaults['electronics_storefront_header_layout_wishlist']                    = esc_url( '#', 'electronics-storefront' );;
        $electronics_storefront_defaults['electronics_storefront_theme_pagination_options_alignment']                         = 'Center';
        $electronics_storefront_defaults['electronics_storefront_theme_breadcrumb_options_alignment']                         = 'Left';
        $electronics_storefront_defaults['electronics_storefront_pagination_layout']                         = 'numeric';
        $electronics_storefront_defaults['electronics_storefront_menu_text_transform']                         = 'capitalize';
        $electronics_storefront_defaults['electronics_storefront_single_page_content_alignment']                 = 'left';
        $electronics_storefront_defaults['electronics_storefront_footer_column_layout'] 		       = 3;
        $electronics_storefront_defaults['electronics_storefront_menu_font_size']                = 14;
        $electronics_storefront_defaults['electronics_storefront_copyright_font_size']                = 16;
        $electronics_storefront_defaults['electronics_storefront_breadcrumb_font_size']                 = 16;
        $electronics_storefront_defaults['electronics_storefront_theme_loader']                                         = 0;
        $electronics_storefront_defaults['electronics_storefront_theme_breadcrumb_enable']                 = 1;
        $electronics_storefront_defaults['electronics_storefront_single_post_content_alignment']                 = 'left';
        $electronics_storefront_defaults['electronics_storefront_excerpt_limit']                 = 10;
        $electronics_storefront_defaults['electronics_storefront_per_columns']                = 3;
        $electronics_storefront_defaults['electronics_storefront_product_per_page']                = 9;
        $electronics_storefront_defaults['electronics_storefront_footer_copyright_text'] 		       = esc_html__( 'All rights reserved.', 'electronics-storefront' );
        $electronics_storefront_defaults['twp_navigation_type']              			       = 'theme-normal-navigation';
        $electronics_storefront_defaults['electronics_storefront_post_author']                	       = 1;
        $electronics_storefront_defaults['electronics_storefront_post_date']                		       = 1;
        $electronics_storefront_defaults['electronics_storefront_post_category']                	       = 1;
        $electronics_storefront_defaults['electronics_storefront_post_tags']                		       = 1;
        $electronics_storefront_defaults['electronics_storefront_floating_next_previous_nav']                = 1;
        $electronics_storefront_defaults['electronics_storefront_header_banner']               	       = 1;
        $electronics_storefront_defaults['electronics_storefront_sticky']                                    = 0;
        $electronics_storefront_defaults['electronics_storefront_display_footer']            = 0;
        $electronics_storefront_defaults['electronics_storefront_footer_widget_title_alignment']                 = 'left'; 
        $electronics_storefront_defaults['electronics_storefront_show_hide_related_product']          = 1;
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_image']            = 1;
        $electronics_storefront_defaults['electronics_storefront_background_color']                          = '#fff';
        $electronics_storefront_defaults['electronics_storefront_product_section_title']                     = esc_html__( 'Trending On This Week', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_product_counter_date']                      = esc_html__( 'December 20 2025', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_slider_section_title']                      = esc_html__( 'UP TO 30% OFF TODAY', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_global_color']                                   = '#F76954';
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_category']          = 1;
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_sticky_post']       = 1;
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_title']             = 1;
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_content']           = 1;
        $electronics_storefront_defaults['electronics_storefront_display_archive_post_button']            = 1;

        $electronics_storefront_defaults['electronics_storefront_enable_to_the_top']                      = 1;
        $electronics_storefront_defaults['electronics_storefront_to_the_top_text']                      = esc_html__( 'To The Top', 'electronics-storefront' );

        // Social Icon
        $electronics_storefront_defaults['electronics_storefront_header_layout_facebook_link']              = esc_url( '#', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_twitter_link']               = esc_url( '#', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_pintrest_link']              = esc_url( '#', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_instagram_link']             = esc_url( '#', 'electronics-storefront' );
        $electronics_storefront_defaults['electronics_storefront_header_layout_youtube_link']               = esc_url( '#', 'electronics-storefront' );

	// Pass through filter.
	$electronics_storefront_defaults = apply_filters( 'electronics_storefront_filter_default_theme_options', $electronics_storefront_defaults );

		return $electronics_storefront_defaults;
	}
endif;
