<?php
/**
* Footer Settings.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

$wp_customize->add_section( 'electronics_storefront_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'electronics-storefront' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting('electronics_storefront_display_footer',
    array(
    'default' => $electronics_storefront_default['electronics_storefront_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
)
);
$wp_customize->add_control('electronics_storefront_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'electronics-storefront'),
        'section' => 'electronics_storefront_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'electronics_storefront_footer_column_layout',
	array(
	'default'           => $electronics_storefront_default['electronics_storefront_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'electronics_storefront_sanitize_select',
	)
);
$wp_customize->add_control( 'electronics_storefront_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'electronics-storefront' ),
	'section'     => 'electronics_storefront_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'electronics-storefront' ),
		'2' => esc_html__( 'Two Column', 'electronics-storefront' ),
		'3' => esc_html__( 'Three Column', 'electronics-storefront' ),
	    ),
	)
);

$wp_customize->add_setting( 'electronics_storefront_footer_widget_title_alignment',
        array(
    'default'           => $electronics_storefront_default['electronics_storefront_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'electronics_storefront_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'electronics-storefront' ),
    'section'     => 'electronics_storefront_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'electronics-storefront' ),
        'center'  => esc_html__( 'Center', 'electronics-storefront' ),
        'right'    => esc_html__( 'Right', 'electronics-storefront' ),
        ),
    )
);

$wp_customize->add_setting( 'electronics_storefront_footer_copyright_text',
	array(
	'default'           => $electronics_storefront_default['electronics_storefront_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'electronics_storefront_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'electronics-storefront' ),
	'section'  => 'electronics_storefront_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('electronics_storefront_copyright_font_size',
    array(
        'default'           => $electronics_storefront_default['electronics_storefront_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_number_range',
    )
);
$wp_customize->add_control('electronics_storefront_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'electronics-storefront'),
        'section'     => 'electronics_storefront_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'electronics_storefront_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronics_storefront_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'electronics-storefront'),
    'description' => __('It will change the complete footer widget background color.', 'electronics-storefront'),
    'section' => 'electronics_storefront_footer_widget_area',
    'settings' => 'electronics_storefront_footer_widget_background_color',
)));

$wp_customize->add_setting('electronics_storefront_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'electronics_storefront_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','electronics-storefront'),
    'section' => 'electronics_storefront_footer_widget_area'
)));

$wp_customize->add_setting('electronics_storefront_enable_to_the_top',
    array(
        'default' => $electronics_storefront_default['electronics_storefront_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('electronics_storefront_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'electronics-storefront'),
        'section' => 'electronics_storefront_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'electronics_storefront_to_the_top_text',
    array(
    'default'           => $electronics_storefront_default['electronics_storefront_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'electronics_storefront_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'electronics-storefront' ),
    'section'  => 'electronics_storefront_footer_widget_area',
    'type'     => 'text',
    )
);