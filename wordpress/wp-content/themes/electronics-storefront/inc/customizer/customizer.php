<?php
/**
 * Electronics Storefront Theme Customizer
 * @package Electronics Storefront
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('electronics_storefront_customize_register')) :

function electronics_storefront_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/global-color-setting.php';
	require get_template_directory() . '/inc/customizer/social-media.php';
	require get_template_directory() . '/inc/customizer/typography.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/homepage-content.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','electronics-storefront');
	$wp_customize->get_section( 'title_tagline' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'electronics_storefront_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'electronics_storefront_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'electronics-storefront' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'electronics-storefront' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'electronics-storefront' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'electronics-storefront' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Addons Panel.
	$wp_customize->add_panel( 'theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'electronics-storefront' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'electronics_storefront_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'electronics-storefront' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('logo_width_range',
	    array(
	        'default'           => $electronics_storefront_default['logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'electronics_storefront_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'electronics-storefront'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'electronics-storefront' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 200,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Electronics_Storefront_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Electronics_Storefront_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Electronics Storefront', 'electronics-storefront' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'electronics-storefront' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/electronics-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);
}

endif;
add_action( 'customize_register', 'electronics_storefront_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('electronics_storefront_customizer_scripts')) :

    function electronics_storefront_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('electronics-storefront-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('electronics-storefront-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('electronics_storefront_ajax_nonce');
        wp_localize_script( 
		    'electronics-storefront-customizer',
		    'electronics_storefront_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'electronics_storefront_customizer_scripts');
add_action('customize_controls_init', 'electronics_storefront_customizer_scripts');

function electronics_storefront_customize_preview_js() {
	wp_enqueue_script( 'electronics-storefront-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'electronics_storefront_customize_preview_js' );

if (!function_exists('electronics_storefront_customize_partial_blogname')) :
	function electronics_storefront_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('electronics_storefront_customize_partial_blogdescription')) :
	function electronics_storefront_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;