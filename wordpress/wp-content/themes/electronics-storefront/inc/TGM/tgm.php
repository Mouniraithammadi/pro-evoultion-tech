<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function electronics_storefront_register_recommended_plugins() {
	$plugins = array(	
		array(
			'name'             => __( 'WooCommerce', 'electronics-storefront' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),	
		array(
			'name'             => __( 'Google Language Translator', 'electronics-storefront' ),
			'slug'             => 'google-language-translator',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce Currency Switcher', 'electronics-storefront' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'electronics_storefront_register_recommended_plugins' );