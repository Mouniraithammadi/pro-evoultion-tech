<?php
/**
 * Electronic Gadget Store functions and definitions
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

function electronic_gadget_store_setup() {

	load_theme_textdomain( 'electronic-gadget-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'electronic-gadget-store-featured-image', 2000, 1200, true );
	add_image_size( 'electronic-gadget-store-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'electronic-gadget-store' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', electronic_gadget_store_fonts_url() ) );
}
add_action( 'after_setup_theme', 'electronic_gadget_store_setup' );

/**
 * Register custom fonts.
 */
function electronic_gadget_store_fonts_url(){
	$electronic_gadget_store_font_url = '';
	$electronic_gadget_store_font_family = array();
	$electronic_gadget_store_font_family[] = 'Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$electronic_gadget_store_font_family[] = 'Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Roboto:wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$electronic_gadget_store_font_family[] = 'Fira Sans Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Jura:ital,wght@300;400;500;600;700';
	$electronic_gadget_store_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Bad Script';
	$electronic_gadget_store_font_family[] = 'Bebas Neue';
	$electronic_gadget_store_font_family[] = 'Fjalla One';
	$electronic_gadget_store_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Alex Brush';
	$electronic_gadget_store_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Playball';
	$electronic_gadget_store_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Julius Sans One';
	$electronic_gadget_store_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Slabo 13px';
	$electronic_gadget_store_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$electronic_gadget_store_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$electronic_gadget_store_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$electronic_gadget_store_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$electronic_gadget_store_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$electronic_gadget_store_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$electronic_gadget_store_font_family[] = 'Padauk:wght@400;700';
	$electronic_gadget_store_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$electronic_gadget_store_font_family[] = 'Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900';
	$electronic_gadget_store_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$electronic_gadget_store_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$electronic_gadget_store_font_family[] = 'Pacifico';
	$electronic_gadget_store_font_family[] = 'Indie Flower';
	$electronic_gadget_store_font_family[] = 'VT323';
	$electronic_gadget_store_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$electronic_gadget_store_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$electronic_gadget_store_font_family[] = 'Fjalla One';
	$electronic_gadget_store_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Oxygen:wght@300;400;700';
	$electronic_gadget_store_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Lobster';
	$electronic_gadget_store_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$electronic_gadget_store_font_family[] = 'Anton';
	$electronic_gadget_store_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$electronic_gadget_store_font_family[] = 'Bree Serif';
	$electronic_gadget_store_font_family[] = 'Gloria Hallelujah';
	$electronic_gadget_store_font_family[] = 'Abril Fatface';
	$electronic_gadget_store_font_family[] = 'Varela Round';
	$electronic_gadget_store_font_family[] = 'Vampiro One';
	$electronic_gadget_store_font_family[] = 'Shadows Into Light';
	$electronic_gadget_store_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$electronic_gadget_store_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Francois One';
	$electronic_gadget_store_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$electronic_gadget_store_font_family[] = 'Patua One';
	$electronic_gadget_store_font_family[] = 'Acme';
	$electronic_gadget_store_font_family[] = 'Satisfy';
	$electronic_gadget_store_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Architects Daughter';
	$electronic_gadget_store_font_family[] = 'Russo One';
	$electronic_gadget_store_font_family[] = 'Monda:wght@400;700';
	$electronic_gadget_store_font_family[] = 'Righteous';
	$electronic_gadget_store_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Hammersmith One';
	$electronic_gadget_store_font_family[] = 'Courgette';
	$electronic_gadget_store_font_family[] = 'Permanent Marke';
	$electronic_gadget_store_font_family[] = 'Cherry Swash:wght@400;700';
	$electronic_gadget_store_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$electronic_gadget_store_font_family[] = 'Poiret One';
	$electronic_gadget_store_font_family[] = 'BenchNine:wght@300;400;700';
	$electronic_gadget_store_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Handlee';
	$electronic_gadget_store_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$electronic_gadget_store_font_family[] = 'Alfa Slab One';
	$electronic_gadget_store_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Cookie';
	$electronic_gadget_store_font_family[] = 'Chewy';
	$electronic_gadget_store_font_family[] = 'Great Vibes';
	$electronic_gadget_store_font_family[] = 'Coming Soon';
	$electronic_gadget_store_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Days One';
	$electronic_gadget_store_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Shrikhand';
	$electronic_gadget_store_font_family[] = 'Tangerine:wght@400;700';
	$electronic_gadget_store_font_family[] = 'IM Fell English SC';
	$electronic_gadget_store_font_family[] = 'Boogaloo';
	$electronic_gadget_store_font_family[] = 'Bangers';
	$electronic_gadget_store_font_family[] = 'Fredoka One';
	$electronic_gadget_store_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$electronic_gadget_store_font_family[] = 'Shadows Into Light Two';
	$electronic_gadget_store_font_family[] = 'Marck Script';
	$electronic_gadget_store_font_family[] = 'Sacramento';
	$electronic_gadget_store_font_family[] = 'Unica One';
	$electronic_gadget_store_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$electronic_gadget_store_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_gadget_store_font_family[] = 'DM Serif Display:ital@0;1';
	$electronic_gadget_store_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	
	$electronic_gadget_store_query_args = array(
		'family'	=> rawurlencode(implode('|',$electronic_gadget_store_font_family)),
	);
	$electronic_gadget_store_font_url = add_query_arg($electronic_gadget_store_query_args,'//fonts.googleapis.com/css');
	return $electronic_gadget_store_font_url;
	$contents = wptt_get_webelectronic_gadget_store_font_url( esc_url_raw( $fonts_url ) );
}

/**
 * Register widget area.
 */
function electronic_gadget_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'electronic-gadget-store' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'electronic-gadget-store' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'electronic-gadget-store' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'electronic-gadget-store' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s py-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'electronic-gadget-store' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s py-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'electronic-gadget-store' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s py-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'electronic-gadget-store' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-gadget-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s py-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'electronic_gadget_store_widgets_init' );

// Category count 
function electronic_gadget_store_display_post_category_count() {
    $electronic_gadget_store_category = get_the_category();
    $electronic_gadget_store_category_count = ($electronic_gadget_store_category) ? count($electronic_gadget_store_category) : 0;
    $electronic_gadget_store_category_text = ($electronic_gadget_store_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $electronic_gadget_store_category_count . ' ' . $electronic_gadget_store_category_text;
}

//post tag
function electronic_gadget_store_custom_tags_filter($electronic_gadget_store_tag_list) {
    // Replace the comma (,) with an empty string
    $electronic_gadget_store_tag_list = str_replace(', ', '', $electronic_gadget_store_tag_list);

    return $electronic_gadget_store_tag_list;
}
add_filter('the_tags', 'electronic_gadget_store_custom_tags_filter');

function electronic_gadget_store_custom_output_tags() {
    $electronic_gadget_store_tags = get_the_tags();

    if ($electronic_gadget_store_tags) {
        $electronic_gadget_store_tags_output = '<div class="post_tag">Tags: ';
        $electronic_gadget_store_first_tag = reset($electronic_gadget_store_tags);
        foreach ($electronic_gadget_store_tags as $tag) {
            $electronic_gadget_store_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $electronic_gadget_store_first_tag) {
                $electronic_gadget_store_tags_output .= ' ';
            }
        }
        $electronic_gadget_store_tags_output .= '</div>';
        echo $electronic_gadget_store_tags_output;
    }
}

/**
 * Enqueue scripts and styles.
 */
function electronic_gadget_store_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'electronic-gadget-store-fonts', electronic_gadget_store_fonts_url(), array(), null );

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'electronic-gadget-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'electronic-gadget-store-style',$electronic_gadget_store_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'electronic-gadget-store-style',$electronic_gadget_store_tp_theme_css );
	wp_style_add_data('electronic-gadget-store-style', 'rtl', 'replace');
	
	// Theme block stylesheet.
	wp_enqueue_style( 'electronic-gadget-store-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'electronic-gadget-store-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );
	
	wp_enqueue_script( 'electronic-gadget-store-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/electronic-gadget-store-custom.js', array('jquery'), true);

	wp_enqueue_script( 'electronic-gadget-store-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	$electronic_gadget_store_body_font_family = get_theme_mod('electronic_gadget_store_body_font_family', '');

	$electronic_gadget_store_heading_font_family = get_theme_mod('electronic_gadget_store_heading_font_family', '');

	$electronic_gadget_store_menu_font_family = get_theme_mod('electronic_gadget_store_menu_font_family', '');

	$electronic_gadget_store_tp_theme_css = '
		body{
		    font-family: '.esc_html($electronic_gadget_store_body_font_family).';
		}
		.more-btn a{
		    font-family: '.esc_html($electronic_gadget_store_body_font_family).';
		}
		h1{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		h2{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		h3{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		h4{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		h5{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		h6{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		#theme-sidebar .wp-block-search .wp-block-search__label{
		    font-family: '.esc_html($electronic_gadget_store_heading_font_family).';
		}
		.menubar,.main-navigation a{
		    font-family: '.esc_html($electronic_gadget_store_menu_font_family).';
		}
	';
	wp_add_inline_style('electronic-gadget-store-style', $electronic_gadget_store_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'electronic_gadget_store_scripts' );

/*radio button sanitization*/
function electronic_gadget_store_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function electronic_gadget_store_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

function electronic_gadget_store_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'electronic_gadget_store_loop_columns');
if (!function_exists('electronic_gadget_store_loop_columns')) {
	function electronic_gadget_store_loop_columns() {
		$electronic_gadget_store_columns = get_theme_mod( 'electronic_gadget_store_per_columns', 3 );
		return $electronic_gadget_store_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'electronic_gadget_store_per_page', 20 );
function electronic_gadget_store_per_page( $electronic_gadget_store_cols ) {
  	$electronic_gadget_store_cols = get_theme_mod( 'electronic_gadget_store_product_per_page', 9 );
	return $electronic_gadget_store_cols;
}

function electronic_gadget_store_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function electronic_gadget_store_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}


function electronic_gadget_store_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function electronic_gadget_store_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function electronic_gadget_store_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function electronic_gadget_store_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','electronic_gadget_store_front_page_template' );

/**
 * Logo Custamization.
 */

function electronic_gadget_store_logo_width(){

	$electronic_gadget_store_logo_width   = get_theme_mod( 'electronic_gadget_store_logo_width', 50 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $electronic_gadget_store_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}
add_action( 'wp_head', 'electronic_gadget_store_logo_width' );

// footer link
define('ELECTRONIC_GADGET_STORE_CREDIT',__('https://www.themespride.com/products/free-gadget-store-wordpress-theme','electronic-gadget-store') );
if ( ! function_exists( 'electronic_gadget_store_credit' ) ) {
	function electronic_gadget_store_credit(){
		echo "<a href=".esc_url(ELECTRONIC_GADGET_STORE_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('electronic_gadget_store_footer_text',__('Electronic Gadget Store WordPress Theme','electronic-gadget-store')))."</a>";
	}
}

//Admin Enqueue for Admin
function electronic_gadget_store_admin_enqueue_scripts(){
	wp_enqueue_style('electronic-gadget-store-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_register_script( 'electronic-gadget-store-admin-script', get_template_directory_uri() . '/assets/js/electronic-gadget-store-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'electronic-gadget-store-admin-script',
		'electronic_gadget_store',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('electronic_gadget_store_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('electronic-gadget-store-admin-script');

    wp_localize_script( 'electronic-gadget-store-admin-script', 'electronic_gadget_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'electronic_gadget_store_admin_enqueue_scripts' );

// get started
add_action( 'wp_ajax_electronic_gadget_store_dismissed_notice_handler', 'electronic_gadget_store_ajax_notice_handler' );

function electronic_gadget_store_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'electronic_gadget_store_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function electronic_gadget_store_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="electronic-gadget-store-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="electronic-gadget-store-getting-started-notice clearfix">
            <div class="electronic-gadget-store-theme-notice-content">
                <h2 class="electronic-gadget-store-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'electronic-gadget-store' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'electronic-gadget-store')) ?></p>

                <a class="electronic-gadget-store-btn-get-started button button-primary button-hero electronic-gadget-store-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=electronic-gadget-store-about' )); ?>" ><?php esc_html_e( 'Begin Installation - Import Demo', 'electronic-gadget-store' ) ?></a><span class="electronic-gadget-store-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

}
add_action( 'admin_notices', 'electronic_gadget_store_activation_notice' );

add_action('after_switch_theme', 'electronic_gadget_store_setup_options');
function electronic_gadget_store_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );


/**
 * TGM Recommendation
 */
require get_parent_theme_file_path( '/inc/TGM/tgm.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );