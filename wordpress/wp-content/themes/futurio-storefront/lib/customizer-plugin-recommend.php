<?php
/**
 * Futurio Storefront Theme Customizer
 *
 * @package Futurio
 */

/*
 * Notifications in customizer
 */
require get_template_directory() . '/lib/customizer/customizer-notice/class-customizer-notice.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

require get_template_directory() . '/lib/customizer/plugin-install/class-plugin-install-helper.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

$config_customizer = array(
	'recommended_plugins' => array( 
		'futurio-extra' => array(
			'recommended' => true,
			/* translators: %s: Plugin name string */
			'description' => sprintf( esc_html__( 'To take full advantage of all the features this theme has to offer, please install and activate the %s plugin.', 'futurio-storefront' ), '<strong>Futurio Extra</strong>' ),
		),
	),
	/* translators: %s: Theme name */
  'recommended_plugins_title' => sprintf( esc_html__( 'Thank you for installing %s.', 'futurio-storefront' ), 'Futurio Storefront' ),
	'install_button_label'      => esc_html__( 'Install now', 'futurio-storefront' ),
	'activate_button_label'     => esc_html__( 'Activate', 'futurio-storefront' ),
);
Futurio_Storefront_Customizer_Notice::init( apply_filters( 'futurio_storefront_customizer_notice_array', $config_customizer ) );