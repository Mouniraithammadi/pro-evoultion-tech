<?php
/**
* Layouts Settings.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'electronics_storefront_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'electronics-storefront' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'electronics_storefront_global_sidebar_layout',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'electronics_storefront_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'electronics-storefront' ),
    'section'     => 'electronics_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'electronics-storefront' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'electronics-storefront' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'electronics-storefront' ),
        ),
    )
);

$wp_customize->add_setting('electronics_storefront_page_sidebar_layout', array(
    'default'           => $electronics_storefront_default['electronics_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_sidebar_option',
));

$wp_customize->add_control('electronics_storefront_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'electronics-storefront'),
    'section'     => 'electronics_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'electronics-storefront'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'electronics-storefront'),
        'no-sidebar'    => esc_html__('No Sidebar', 'electronics-storefront'),
    ),
));

$wp_customize->add_setting('electronics_storefront_post_sidebar_layout', array(
    'default'           => $electronics_storefront_default['electronics_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_sidebar_option',
));

$wp_customize->add_control('electronics_storefront_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'electronics-storefront'),
    'section'     => 'electronics_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'electronics-storefront'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'electronics-storefront'),
        'no-sidebar'    => esc_html__('No Sidebar', 'electronics-storefront'),
    ),
));