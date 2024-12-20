<?php
/**
 * Electronics Storefront functions and definitions
 * @package Electronics Storefront
 */

if ( ! function_exists( 'electronics_storefront_after_theme_support' ) ) :

	function electronics_storefront_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

        load_theme_textdomain( 'electronics-storefront', get_template_directory() . '/languages' );

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'electronics_storefront_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'electronics_storefront_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function electronics_storefront_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $electronics_storefront_theme_version = wp_get_theme()->get( 'Version' );
	$electronics_storefront_fonts_url = electronics_storefront_fonts_url();
    if( $electronics_storefront_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'electronics-storefront-google-fonts',
			wptt_get_webfont_url( $electronics_storefront_fonts_url ),
			array(),
			$electronics_storefront_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/lib/custom/css/owl.carousel.min.css');
	wp_enqueue_style( 'electronics-storefront-style', get_stylesheet_uri(), array(), $electronics_storefront_theme_version );

	wp_enqueue_style( 'electronics-storefront-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'electronics-storefront-style',$electronics_storefront_custom_css );

	$electronics_storefront_css = '';

	if ( get_header_image() ) :

		$electronics_storefront_css .=  '
			.main-header{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'electronics-storefront-style', $electronics_storefront_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'electronics-storefront-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/lib/custom/js/owl.carousel.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$electronics_storefront_posts_per_page = absint( get_option('posts_per_page') );
        $electronics_storefront_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $electronics_storefront_posts_args = array(
            'posts_per_page'        => $electronics_storefront_posts_per_page,
            'paged'                 => $electronics_storefront_c_paged,
        );
        $electronics_storefront_posts_qry = new WP_Query( $electronics_storefront_posts_args );
        $max = $electronics_storefront_posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $electronics_storefront_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $electronics_storefront_default = electronics_storefront_get_default_theme_options();
    $electronics_storefront_pagination_layout = get_theme_mod( 'electronics_storefront_pagination_layout',$electronics_storefront_default['electronics_storefront_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'electronics_storefront_register_styles',200 );

function electronics_storefront_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('electronics-storefront-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'electronics_storefront_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function electronics_storefront_menus() {

	$electronics_storefront_locations = array(
		'electronics-storefront-primary-menu'  => esc_html__( 'Primary Menu', 'electronics-storefront' ),
	);

	register_nav_menus( $electronics_storefront_locations );
}

add_action( 'init', 'electronics_storefront_menus' );

add_filter('loop_shop_columns', 'electronics_storefront_loop_columns');
if (!function_exists('electronics_storefront_loop_columns')) {
	function electronics_storefront_loop_columns() {
		$electronics_storefront_columns = get_theme_mod( 'electronics_storefront_per_columns', 3 );
		return $electronics_storefront_columns;
	}
}

add_filter( 'loop_shop_per_page', 'electronics_storefront_per_page', 20 );
function electronics_storefront_per_page( $electronics_storefront_cols ) {
  	$electronics_storefront_cols = get_theme_mod( 'electronics_storefront_product_per_page', 9 );
	return $electronics_storefront_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/TGM/tgm.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'ELECTRONICS_STOREFRONT_DOCS_PRO' ) ){
define('ELECTRONICS_STOREFRONT_DOCS_PRO',__('https://layout.omegathemes.com/steps/pro-electronics-storefront/','electronics-storefront'));
}
if (! defined( 'ELECTRONICS_STOREFRONT_BUY_NOW' ) ){
define('ELECTRONICS_STOREFRONT_BUY_NOW',__('https://www.omegathemes.com/products/electronics-wordpress-theme','electronics-storefront'));
}
if (! defined( 'ELECTRONICS_STOREFRONT_SUPPORT_FREE' ) ){
define('ELECTRONICS_STOREFRONT_SUPPORT_FREE',__('https://wordpress.org/support/theme/electronics-storefront/','electronics-storefront'));
}
if (! defined( 'ELECTRONICS_STOREFRONT_REVIEW_FREE' ) ){
define('ELECTRONICS_STOREFRONT_REVIEW_FREE',__('https://wordpress.org/support/theme/electronics-storefront/reviews/#new-post/','electronics-storefront'));
}
if (! defined( 'ELECTRONICS_STOREFRONT_DEMO_PRO' ) ){
define('ELECTRONICS_STOREFRONT_DEMO_PRO',__('https://layout.omegathemes.com/electronics-storefront/','electronics-storefront'));
}
if (! defined( 'ELECTRONICS_STOREFRONT_LITE_DOCS_PRO' ) ){
define('ELECTRONICS_STOREFRONT_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-electronics-storefront/','electronics-storefront'));
}

function electronics_storefront_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'electronics_storefront_remove_customize_register', 11 );

// Apply styles based on customizer settings

function electronics_storefront_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $electronics_storefront_footer_widget_background_color = get_theme_mod('electronics_storefront_footer_widget_background_color');
        if ($electronics_storefront_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($electronics_storefront_footer_widget_background_color) . '; }';
        }

        $electronics_storefront_footer_widget_background_image = get_theme_mod('electronics_storefront_footer_widget_background_image');
        if ($electronics_storefront_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($electronics_storefront_footer_widget_background_image) . '); }';
        }
        $electronics_storefront_copyright_font_size = get_theme_mod('electronics_storefront_copyright_font_size');
        if ($electronics_storefront_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($electronics_storefront_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'electronics_storefront_customizer_css');

function electronics_storefront_radio_sanitize(  $electronics_storefront_input, $electronics_storefront_setting  ) {
	$electronics_storefront_input = sanitize_key( $electronics_storefront_input );
	$electronics_storefront_choices = $electronics_storefront_setting->manager->get_control( $electronics_storefront_setting->id )->choices;
	return ( array_key_exists( $electronics_storefront_input, $electronics_storefront_choices ) ? $electronics_storefront_input : $electronics_storefront_setting->default );
}
require get_template_directory() . '/inc/general.php';