<?php

$electronics_storefront_custom_css = "";

	$electronics_storefront_theme_pagination_options_alignment = get_theme_mod('electronics_storefront_theme_pagination_options_alignment', 'Center');
	if ($electronics_storefront_theme_pagination_options_alignment == 'Center') {
		$electronics_storefront_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$electronics_storefront_custom_css .= 'justify-content: center;margin: 0 auto;';
		$electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_theme_pagination_options_alignment == 'Right') {
		$electronics_storefront_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$electronics_storefront_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_theme_pagination_options_alignment == 'Left') {
		$electronics_storefront_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$electronics_storefront_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_theme_breadcrumb_enable = get_theme_mod('electronics_storefront_theme_breadcrumb_enable',true);
    if($electronics_storefront_theme_breadcrumb_enable != true){
        $electronics_storefront_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $electronics_storefront_custom_css .='display: none;';
        $electronics_storefront_custom_css .='}';
    }

	$electronics_storefront_theme_breadcrumb_options_alignment = get_theme_mod('electronics_storefront_theme_breadcrumb_options_alignment', 'Left');
	if ($electronics_storefront_theme_breadcrumb_options_alignment == 'Center') {
	    $electronics_storefront_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $electronics_storefront_custom_css .= 'text-align: center !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_theme_breadcrumb_options_alignment == 'Right') {
	    $electronics_storefront_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $electronics_storefront_custom_css .= 'text-align: Right !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_theme_breadcrumb_options_alignment == 'Left') {
	    $electronics_storefront_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $electronics_storefront_custom_css .= 'text-align: Left !important;';
	    $electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_single_page_content_alignment = get_theme_mod('electronics_storefront_single_page_content_alignment', 'left');
	if ($electronics_storefront_single_page_content_alignment == 'left') {
	    $electronics_storefront_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $electronics_storefront_custom_css .= 'text-align: left !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_single_page_content_alignment == 'center') {
	    $electronics_storefront_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $electronics_storefront_custom_css .= 'text-align: center !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_single_page_content_alignment == 'right') {
	    $electronics_storefront_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $electronics_storefront_custom_css .= 'text-align: right !important;';
	    $electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_single_post_content_alignment = get_theme_mod('electronics_storefront_single_post_content_alignment', 'left');
	if ($electronics_storefront_single_post_content_alignment == 'left') {
	    $electronics_storefront_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $electronics_storefront_custom_css .= 'text-align: left !important;justify-content: left;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_single_post_content_alignment == 'center') {
	    $electronics_storefront_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $electronics_storefront_custom_css .= 'text-align: center !important;justify-content: center;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_single_post_content_alignment == 'right') {
	    $electronics_storefront_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $electronics_storefront_custom_css .= 'text-align: right !important;justify-content: right;';
	    $electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_menu_text_transform = get_theme_mod('electronics_storefront_menu_text_transform', 'Capitalize');
	if ($electronics_storefront_menu_text_transform == 'Capitalize') {
	    $electronics_storefront_custom_css .= '.site-navigation .primary-menu > li a{';
	    $electronics_storefront_custom_css .= 'text-transform: Capitalize !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_menu_text_transform == 'uppercase') {
	    $electronics_storefront_custom_css .= '.site-navigation .primary-menu > li a{';
	    $electronics_storefront_custom_css .= 'text-transform: uppercase !important;';
	    $electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_menu_text_transform == 'lowercase') {
	    $electronics_storefront_custom_css .= '.site-navigation .primary-menu > li a{';
	    $electronics_storefront_custom_css .= 'text-transform: lowercase !important;';
	    $electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_footer_widget_title_alignment = get_theme_mod('electronics_storefront_footer_widget_title_alignment', 'left');
	if ($electronics_storefront_footer_widget_title_alignment == 'left') {
		$electronics_storefront_custom_css .= 'h2.widget-title{';
		$electronics_storefront_custom_css .= 'text-align: left !important;';
		$electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_footer_widget_title_alignment == 'center') {
		$electronics_storefront_custom_css .= 'h2.widget-title{';
		$electronics_storefront_custom_css .= 'text-align: center !important;';
		$electronics_storefront_custom_css .= '}';
	} else if ($electronics_storefront_footer_widget_title_alignment == 'right') {
		$electronics_storefront_custom_css .= 'h2.widget-title{';
		$electronics_storefront_custom_css .= 'text-align: right !important;';
		$electronics_storefront_custom_css .= '}';
	}

	$electronics_storefront_show_hide_related_product = get_theme_mod('electronics_storefront_show_hide_related_product',true);
	if($electronics_storefront_show_hide_related_product != true){
		$electronics_storefront_custom_css .='.related.products{';
		$electronics_storefront_custom_css .='display: none;';
		$electronics_storefront_custom_css .='}';
	}

	/*-------------------- Global First Color -------------------*/

	$electronics_storefront_global_color = get_theme_mod('electronics_storefront_global_color', '#F76954'); // Add a fallback if the color isn't set

	if ($electronics_storefront_global_color) {
		$electronics_storefront_custom_css .= ':root {';
		$electronics_storefront_custom_css .= '--global-color: ' . esc_attr($electronics_storefront_global_color) . ';';
		$electronics_storefront_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$electronics_storefront_content_typography_font = get_theme_mod('electronics_storefront_content_typography_font', 'roboto'); // Add a fallback if the color isn't set

	if ($electronics_storefront_content_typography_font) {
		$electronics_storefront_custom_css .= ':root {';
		$electronics_storefront_custom_css .= '--font-main: ' . esc_attr($electronics_storefront_content_typography_font) . ';';
		$electronics_storefront_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$electronics_storefront_heading_typography_font = get_theme_mod('electronics_storefront_heading_typography_font', 'outfit'); // Add a fallback if the color isn't set

	if ($electronics_storefront_heading_typography_font) {
		$electronics_storefront_custom_css .= ':root {';
		$electronics_storefront_custom_css .= '--font-head: ' . esc_attr($electronics_storefront_heading_typography_font) . ';';
		$electronics_storefront_custom_css .= '}';
	}