<?php
/**
* Header Options.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'electronics_storefront_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'electronics-storefront' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'electronics_storefront_header_layout_phone_number',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'electronics_storefront_header_layout_email_id',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_header_layout_email_id'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_header_layout_email_id',
    array(
    'label'    => esc_html__( 'Header Email Address', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'electronics_storefront_electronics_storefront_header_layout_text',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_electronics_storefront_header_layout_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_electronics_storefront_header_layout_text',
    array(
    'label'    => esc_html__( 'Header Discount Text', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('electronics_storefront_menu_font_size',
    array(
        'default'           => $electronics_storefront_default['electronics_storefront_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_number_range',
    )
);
$wp_customize->add_control('electronics_storefront_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'electronics-storefront'),
        'section'     => 'electronics_storefront_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);


$wp_customize->add_setting( 'electronics_storefront_menu_text_transform',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'electronics_storefront_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'electronics-storefront' ),
    'section'     => 'electronics_storefront_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'electronics-storefront' ),
        'uppercase'  => esc_html__( 'Uppercase', 'electronics-storefront' ),
        'lowercase'    => esc_html__( 'Lowercase', 'electronics-storefront' ),
        ),
    )
);


$wp_customize->add_setting('electronics_storefront_sticky',
    array(
        'default' => $electronics_storefront_default['electronics_storefront_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('electronics_storefront_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'electronics-storefront'),
        'section' => 'electronics_storefront_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('electronics_storefront_header_layout_enable_translator',
    array(
        'default' => $electronics_storefront_default['electronics_storefront_header_layout_enable_translator'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('electronics_storefront_header_layout_enable_translator',
    array(
        'label' => esc_html__('Enable Translater', 'electronics-storefront'),
        'section' => 'electronics_storefront_button_header_setting',
        'type' => 'checkbox',
    )
);

