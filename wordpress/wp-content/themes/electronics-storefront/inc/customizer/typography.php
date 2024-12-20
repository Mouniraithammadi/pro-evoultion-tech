<?php
/**
* Typography Settings.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'electronics_storefront_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'electronics-storefront' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

// -----------------  Font array
$electronics_storefront_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'electronics_storefront_content_typography_font', array(
    'default'           => 'roboto',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_radio_sanitize',
) );
$wp_customize->add_control( 'electronics_storefront_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_typography_setting',
    'settings' => 'electronics_storefront_content_typography_font',
    'choices'  => $electronics_storefront_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'electronics_storefront_heading_typography_font', array(
    'default'           => 'outfit',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_radio_sanitize',
) );
$wp_customize->add_control( 'electronics_storefront_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_typography_setting',
    'settings' => 'electronics_storefront_heading_typography_font',
    'choices'  => $electronics_storefront_fonts,
) );