<?php
/**
* Global Color Settings.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'electronics_storefront_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'electronics-storefront' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'electronics_storefront_global_color',
    array(
    'default'           => '#F76954',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'electronics_storefront_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'electronics-storefront' ),
        'section'    => 'electronics_storefront_global_color_setting',
        'settings'   => 'electronics_storefront_global_color',
    ) ) 
);