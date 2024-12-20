<?php
/**
* Header Banner Options.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();
$electronics_storefront_post_category_list = electronics_storefront_post_category_list();

$wp_customize->add_section( 'electronics_storefront_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'electronics-storefront' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('electronics_storefront_display_header_text',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('electronics_storefront_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'electronics-storefront'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('electronics_storefront_header_banner',
    array(
        'default' => $electronics_storefront_default['electronics_storefront_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('electronics_storefront_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'electronics-storefront'),
        'section' => 'electronics_storefront_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'electronics_storefront_slider_section_title',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_slider_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_slider_section_title',
    array(
    'label'    => esc_html__( 'Slider Title', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'electronics_storefront_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_select',
    )
);
$wp_customize->add_control( 'electronics_storefront_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'electronics-storefront' ),
    'section'     => 'electronics_storefront_header_banner_setting',
    'type'        => 'select',
    'choices'     => $electronics_storefront_post_category_list,
    )
);

// Product Settings

$wp_customize->add_section( 'product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'electronics-storefront' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting( 'electronics_storefront_product_section_title',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_product_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_product_section_title',
    array(
    'label'    => esc_html__( 'Product Title', 'electronics-storefront' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'electronics_storefront_product_counter_date',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_product_counter_date'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_product_counter_date',
    array(
    'label'    => esc_html__( 'CountDown Date', 'electronics-storefront' ),
    'description'       => esc_html__( 'Ex:-December 20 2025 In this way you need to put date to show coundown', 'electronics-storefront' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);



$electronics_storefront_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($electronics_storefront_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('electronics_storefront_featured_product_category',array(
    'default'   => 'select',
    'sanitize_callback' => 'electronics_storefront_sanitize_select',
));
$wp_customize->add_control('electronics_storefront_featured_product_category',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Select category to display products ','electronics-storefront'),
    'section' => 'product_column_setting',
));