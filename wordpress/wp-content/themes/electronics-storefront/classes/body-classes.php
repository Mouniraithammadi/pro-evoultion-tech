<?php
/**
* Body Classes.
* @package Electronics Storefront
*/
 
 if (!function_exists('electronics_storefront_body_classes')) :

    function electronics_storefront_body_classes($electronics_storefront_classes) {
        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        global $post;
    
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $electronics_storefront_classes[] = 'hfeed';
        }
    
        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $electronics_storefront_classes[] = 'no-sidebar';
        }
    
        $electronics_storefront_global_sidebar_layout = esc_html(get_theme_mod('electronics_storefront_global_sidebar_layout', $electronics_storefront_default['electronics_storefront_global_sidebar_layout']));
        $electronics_storefront_page_sidebar_layout = esc_html(get_theme_mod('electronics_storefront_page_sidebar_layout', $electronics_storefront_global_sidebar_layout));
        $electronics_storefront_post_sidebar_layout = esc_html(get_theme_mod('electronics_storefront_post_sidebar_layout', $electronics_storefront_global_sidebar_layout));
    
        if (is_page()) {
            $electronics_storefront_classes[] = $electronics_storefront_page_sidebar_layout;
        } elseif (is_single()) {
            $electronics_storefront_classes[] = $electronics_storefront_post_sidebar_layout;
        } else {
            $electronics_storefront_classes[] = $electronics_storefront_global_sidebar_layout;
        }
    
        return $electronics_storefront_classes;
    }
    
endif;

add_filter('body_class', 'electronics_storefront_body_classes');