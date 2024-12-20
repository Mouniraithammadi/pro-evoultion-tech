<?php
/**
* Additional Woocommerce Settings.
*
* @package Electronics Storefront
*/

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'electronics_storefront_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'electronics-storefront' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'electronics_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting('electronics_storefront_per_columns',
	array(
	'default'           => $electronics_storefront_default['electronics_storefront_per_columns'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'electronics_storefront_sanitize_number_range',
	)
);
$wp_customize->add_control('electronics_storefront_per_columns',
	array(
	'label'       => esc_html__('Product Per Column', 'electronics-storefront'),
	'section'     => 'electronics_storefront_additional_woocommerce_options',
	'type'        => 'number',
	'input_attrs' => array(
	'min'   => 1,
	'max'   => 10,
	'step'   => 1,
	),
	)
);

$wp_customize->add_setting('electronics_storefront_product_per_page',
	array(
	'default'           => $electronics_storefront_default['electronics_storefront_product_per_page'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'electronics_storefront_sanitize_number_range',
	)
);
$wp_customize->add_control('electronics_storefront_product_per_page',
	array(
	'label'       => esc_html__('Product Per Page', 'electronics-storefront'),
	'section'     => 'electronics_storefront_additional_woocommerce_options',
	'type'        => 'number',
	'input_attrs' => array(
	'min'   => 1,
	'max'   => 15,
	'step'   => 1,
	),
	)
);

$wp_customize->add_setting('electronics_storefront_show_hide_related_product',
    array(
    'default' => $electronics_storefront_default['electronics_storefront_show_hide_related_product'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'electronics_storefront_sanitize_checkbox',
)
);
$wp_customize->add_control('electronics_storefront_show_hide_related_product',
    array(
        'label' => esc_html__('Enable Related Products', 'electronics-storefront'),
        'section' => 'electronics_storefront_additional_woocommerce_options',
        'type' => 'checkbox',
    )
);
