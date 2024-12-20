<?php
/**
* Color Settings.
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

$wp_customize->add_setting( 'electronics_storefront_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'electronics_storefront_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'electronics-storefront' ),
        'section'    => 'colors',
        'settings'   => 'electronics_storefront_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'electronics_storefront_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'electronics_storefront_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'electronics-storefront' ),
        'section'    => 'colors',
        'settings'   => 'electronics_storefront_border_color',
    ) ) 
);