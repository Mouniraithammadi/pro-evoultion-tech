<?php
/**
 * Custom page walker for this theme.
 *
 * @package Electronics Storefront
 */

if (!class_exists('Electronics_Storefront_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Electronics_Storefront_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $electronics_storefront_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $electronics_storefront_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $electronics_storefront_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$electronics_storefront_output, $electronics_storefront_depth = 0, $electronics_storefront_args = array() ) {
            $electronics_storefront_indent  = str_repeat( "\t", $electronics_storefront_depth );
            $electronics_storefront_output .= "$electronics_storefront_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$electronics_storefront_output, $page, $electronics_storefront_depth = 0, $electronics_storefront_args = array(), $current_page = 0)
        {

            if (isset($electronics_storefront_args['item_spacing']) && 'preserve' === $electronics_storefront_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($electronics_storefront_depth) {
                $electronics_storefront_indent = str_repeat($t, $electronics_storefront_depth);
            } else {
                $electronics_storefront_indent = '';
            }

            $electronics_storefront_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($electronics_storefront_args['pages_with_children'][$page->ID])) {
                $electronics_storefront_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $electronics_storefront_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $electronics_storefront_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $electronics_storefront_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $electronics_storefront_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $electronics_storefront_css_classes = implode(' ', apply_filters('page_css_class', $electronics_storefront_css_class, $page, $electronics_storefront_depth, $electronics_storefront_args, $current_page));
            $electronics_storefront_css_classes = $electronics_storefront_css_classes ? ' class="' . esc_attr($electronics_storefront_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'electronics-storefront'), $page->ID);
            }

            $electronics_storefront_args['link_before'] = empty($electronics_storefront_args['link_before']) ? '' : $electronics_storefront_args['link_before'];
            $electronics_storefront_args['link_after'] = empty($electronics_storefront_args['link_after']) ? '' : $electronics_storefront_args['link_after'];

            $electronics_storefront_atts = array();
            $electronics_storefront_atts['href'] = get_permalink($page->ID);
            $electronics_storefront_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $electronics_storefront_atts = apply_filters('page_menu_link_attributes', $electronics_storefront_atts, $page, $electronics_storefront_depth, $electronics_storefront_args, $current_page);

            $electronics_storefront_attributes = '';
            foreach ($electronics_storefront_atts as $attr => $electronics_storefront_value) {
                if (!empty($electronics_storefront_value)) {
                    $electronics_storefront_value = ('href' === $attr) ? esc_url($electronics_storefront_value) : esc_attr($electronics_storefront_value);
                    $electronics_storefront_attributes .= ' ' . $attr . '="' . $electronics_storefront_value . '"';
                }
            }

            $electronics_storefront_args['list_item_before'] = '';
            $electronics_storefront_args['list_item_after'] = '';
            $electronics_storefront_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($electronics_storefront_args['show_toggles']) && true === $electronics_storefront_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $electronics_storefront_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($electronics_storefront_args['show_sub_menu_icons']) && true === $electronics_storefront_args['show_sub_menu_icons']) {
                if (isset($electronics_storefront_args['pages_with_children'][$page->ID])) {
                    $electronics_storefront_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($electronics_storefront_args['show_toggles']) && true === $electronics_storefront_args['show_toggles']) {
                if (isset($electronics_storefront_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $electronics_storefront_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'electronics-storefront' ) . '</span>' . electronics_storefront_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($electronics_storefront_args['show_toggles']) && true === $electronics_storefront_args['show_toggles']) {

                $electronics_storefront_output .= $electronics_storefront_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $electronics_storefront_css_classes,
                        '<div class="submenu-wrapper">',
                        $electronics_storefront_args['list_item_before'],
                        $electronics_storefront_attributes,
                        $electronics_storefront_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $electronics_storefront_args['link_after'],
                        $electronics_storefront_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $electronics_storefront_output .= $electronics_storefront_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $electronics_storefront_css_classes,
                        $electronics_storefront_args['list_item_before'],
                        $electronics_storefront_attributes,
                        $electronics_storefront_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $electronics_storefront_args['icon_rennder'],
                        $electronics_storefront_args['link_after'],
                        $electronics_storefront_args['list_item_after']
                    );

            }

            if (!empty($electronics_storefront_args['show_date'])) {
                if ('modified' === $electronics_storefront_args['show_date']) {
                    $electronics_storefront_time = $page->post_modified;
                } else {
                    $electronics_storefront_time = $page->post_date;
                }

                $electronics_storefront_date_format = empty($electronics_storefront_args['date_format']) ? '' : $electronics_storefront_args['date_format'];
                $electronics_storefront_output .= ' ' . mysql2date($electronics_storefront_date_format, $electronics_storefront_time);
            }
        }
    }
}