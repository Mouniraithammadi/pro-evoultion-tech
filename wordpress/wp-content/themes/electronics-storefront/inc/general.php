<?php

function electronics_storefront_enqueue_fonts() {
    $electronics_storefront_default_font_content = 'roboto';
    $electronics_storefront_default_font_heading = 'outfit';

    $electronics_storefront_font_content = esc_attr(get_theme_mod('electronics_storefront_content_typography_font', $electronics_storefront_default_font_content));
    $electronics_storefront_font_heading = esc_attr(get_theme_mod('electronics_storefront_heading_typography_font', $electronics_storefront_default_font_heading));

    $electronics_storefront_css = '';

    // Always enqueue main font
    $electronics_storefront_css .= '
    :root {
        --font-main: ' . $electronics_storefront_font_content . ', ' . (in_array($electronics_storefront_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('electronics-storefront-style-font-general', get_template_directory_uri() . '/fonts/' . $electronics_storefront_font_content . '/font.css');

    // Always enqueue header font
    $electronics_storefront_css .= '
    :root {
        --font-head: ' . $electronics_storefront_font_heading . ', ' . (in_array($electronics_storefront_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('electronics-storefront-style-font-h', get_template_directory_uri() . '/fonts/' . $electronics_storefront_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('electronics-storefront-style-font-general', $electronics_storefront_css);
}
add_action('wp_enqueue_scripts', 'electronics_storefront_enqueue_fonts', 50);