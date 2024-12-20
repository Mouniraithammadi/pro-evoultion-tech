<?php
/**
 * The current version of the theme.
 */
define( 'FUTURIO_STOREFRONT_VERSION', '1.0.1' );

add_action( 'after_setup_theme', 'futurio_storefront_setup' );

if ( !function_exists( 'futurio_storefront_setup' ) ) :

	/**
	 * Global functions
	 */
	function futurio_storefront_setup() {

		// Theme lang.
		load_theme_textdomain( 'futurio-storefront', get_template_directory() . '/languages' );

		// Add Title Tag Support.
		add_theme_support( 'title-tag' );

		// Register Menus.
		register_nav_menus(
		array(
			'main_menu'	 => esc_html__( 'Main Menu', 'futurio-storefront' ),
			'main_menu_home' => esc_html__( 'Homepage main menu', 'futurio-storefront' ),
		)
		);

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 300, true );
		if ( get_theme_mod( 'blog_single_image', 'default' ) == 'custom' ) {
			$sizes = get_theme_mod( 'blog_single_image_set' );
			add_image_size( 'futurio-storefront-single', absint( $sizes['width'] ), absint( $sizes['height'] ), true );
		} else {
			add_image_size( 'futurio-storefront-single', 1140, 641, true );
		}
		if ( get_theme_mod( 'blog_archive_image', 'default' ) == 'custom' ) {
			$size = get_theme_mod( 'blog_archive_image_set' );
			add_image_size( 'futurio-storefront-med', absint( $size['width'] ), absint( $size['height'] ), true );
		} else {
			add_image_size( 'futurio-storefront-med', 720, 405, true );
		}
		add_image_size( 'futurio-storefront-thumbnail', 160, 120, true );

		// Add Custom Background Support.
		add_theme_support( 'custom-background' );

		add_theme_support( 'custom-logo', array(
			'height'		 => 80,
			'width'			 => 200,
			'flex-height'	 => true,
			'flex-width'	 => true,
			'header-text'	 => array( 'site-title', 'site-description' ),
		) );

		// Adds RSS feed links to for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Set the default content width.
		$GLOBALS[ 'content_width' ] = 1240;

		add_theme_support( 'custom-header', apply_filters( 'futurio_storefront_custom_header_args', array(
			'width'				 => 2000,
			'height'			 => 550,
			'wp-head-callback'	 => 'futurio_storefront_header_style',
		) ) );

		// WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'html5', array( 'search-form' ) );
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/bootstrap.css', 'css/editor-style.css' ) );
	}

endif;

if ( !function_exists( 'futurio_storefront_header_style' ) ) :

	/**
	 * Styles the header image and text displayed on the blog.
	 */
	function futurio_storefront_header_style() {
		$header_image = get_header_image();
		// If no custom options for text are set, let's bail.
		if ( empty( $header_image ) && display_header_text() == true ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css" id="futurio-header-css">
		<?php
		// Has a Custom Header been added?
		if ( !empty( $header_image ) ) :
			?>
				.site-header {
					background-image: url(<?php header_image(); ?>);
					background-repeat: no-repeat;
					background-position: 50% 50%;
					-webkit-background-size: cover;
					-moz-background-size:    cover;
					-o-background-size:      cover;
					background-size:         cover;
				}
		<?php endif; ?>
		<?php
		// Has the text been hidden?
		if ( display_header_text() !== true ) :
			?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
		endif;
		?>	
		</style>
		<?php
	}

endif; // futurio_storefront_header_style

/**
 * Set Content Width
 */
function futurio_storefront_content_width() {

	$content_width = $GLOBALS['content_width'];

	if ( is_active_sidebar( 'futurio-storefront-sidebar' ) ) {
		$content_width = 923;
	} else {
		$content_width = 1240;
	}

	/**
	 * Filter content width of the theme.
	 */
	$GLOBALS['content_width'] = apply_filters( 'futurio_storefront_content_width', $content_width );
}

add_action( 'template_redirect', 'futurio_storefront_content_width', 0 );

/**
 * Enqueue Styles (normal style.css and bootstrap.css)
 */
function futurio_storefront_theme_stylesheets() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7' );
  wp_enqueue_style('hc-offcanvas-nav', get_template_directory_uri() . '/css/hc-offcanvas-nav.min.css', array(), FUTURIO_STOREFRONT_VERSION);
	// Theme stylesheet.
	wp_enqueue_style( 'futurio-stylesheet', get_stylesheet_uri(), array( 'bootstrap' ), FUTURIO_STOREFRONT_VERSION );
	// Load Font Awesome css.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
}

add_action( 'wp_enqueue_scripts', 'futurio_storefront_theme_stylesheets' );

/**
 * Register Bootstrap JS with jquery
 */
function futurio_storefront_theme_js() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script('hc-offcanvas-nav', get_template_directory_uri() . '/js/hc-offcanvas-nav.min.js', array('jquery'), FUTURIO_STOREFRONT_VERSION, true);
	wp_enqueue_script( 'futurio-theme-js', get_template_directory_uri() . '/js/customscript.js', array( 'jquery' ), FUTURIO_STOREFRONT_VERSION, true );
  
}

add_action( 'wp_enqueue_scripts', 'futurio_storefront_theme_js' );


/**
 * Register Custom Navigation Walker include custom menu widget to use walkerclass
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/wp_bootstrap_navwalker.php' );

/**
 * Dashboard info
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/dashboard.php' );

/**
 * Recommend plugin
 */
require_once( trailingslashit( get_template_directory() ) . 'lib/customizer-plugin-recommend.php' );

if ( !function_exists( 'futurio_storefront_is_extra_activated' ) ) {

	/**
	 * Query Futurio extra activation
	 */
	function futurio_storefront_is_extra_activated() {
		return defined( 'FUTURIO_EXTRA_CURRENT_VERSION' ) ? true : false;
	}

}
/**
 * Register TGM Plugin Activation
 */
if ( is_admin() ) {

	require_once( trailingslashit( get_template_directory() ) . 'lib/futurio-plugin-install.php' );
}
add_action( 'widgets_init', 'futurio_storefront_widgets_init' );

/**
 * Register the Sidebar(s)
 */
function futurio_storefront_widgets_init() {
	register_sidebar(
	array(
		'name'			 => esc_html__( 'Sidebar', 'futurio-storefront' ),
		'id'			 => 'futurio-storefront-sidebar',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
	);
	register_sidebar(
	array(
		'name'			 => esc_html__( 'Archive sidebar', 'futurio-storefront' ),
		'id'			 => 'futurio-storefront-archive-sidebar',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
	);
	register_sidebar(
	array(
		'name'			 => esc_html__( 'Menu Section', 'futurio-storefront' ),
		'id'			 => 'futurio-storefront-menu-area',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
	);
	register_sidebar(
	array(
		'name'			 => esc_html__( 'Footer Section', 'futurio-storefront' ),
		'id'			 => 'futurio-storefront-footer-area',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s col-md-3">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
	);
	register_sidebar(
  	array(
  		'name'			 => esc_html__( 'Header Section', 'futurio-storefront' ),
  		'id'			 => 'futurio-storefront-header-area',
  		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
  		'after_widget'	 => '</div>',
  		'before_title'	 => '<div class="widget-title"><h3>',
  		'after_title'	 => '</h3></div>',
  	) 
	);
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(
		array(
			'name'			 => esc_html__( 'WooCommerce Sidebar', 'futurio-storefront' ),
			'id'			 => 'futurio-storefront-woo-right-sidebar',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
		)
		);
		register_sidebar(
		array(
			'name'			 => esc_html__( 'WooCommerce archive sidebar', 'futurio-storefront' ),
			'id'			 => 'futurio-storefront-woo-archive-sidebar',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
		)
		);
	}
}

/**
 * Column width for content function
 */
function futurio_storefront_main_content_width_columns() {
	$columns = '12';
	if ( ( is_archive() || is_search() || is_404() ) && is_active_sidebar( 'futurio-storefront-archive-sidebar' ) ) {
		$columns = $columns - absint( get_theme_mod( 'sidebar_size', '3' ) );
	} elseif ( is_active_sidebar( 'futurio-storefront-sidebar' ) && futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar' ) {
		$columns = $columns - absint( get_theme_mod( 'sidebar_size', '3' ) );
	}
	echo absint( $columns );
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function futurio_storefront_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'futurio_storefront_pingback_header' );

if ( !function_exists( 'futurio_storefront_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function futurio_storefront_entry_footer() {

		// Get Categories for posts.
		$categories_list = get_the_category_list( ' ' );

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', ' ' );

		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( $categories_list || $tags_list || get_edit_post_link() ) {

			echo '<div class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if ( $categories_list || $tags_list ) {

					// Make sure there's more than one category before displaying.
					if ( $categories_list ) {
						echo '<div class="cat-links"><span class="space-right">' . esc_html__( 'Posted in', 'futurio-storefront' ) . '</span>' . wp_kses_data( $categories_list ) . '</div>';
					}

					if ( $tags_list ) {
						echo '<div class="tags-links"><span class="space-right">' . esc_html__( 'Tags', 'futurio-storefront' ) . '</span>' . wp_kses_data( $tags_list ) . '</div>';
					}
				}
			}

			edit_post_link();

			echo '</div>';
		}
	}

endif;

if ( !function_exists( 'futurio_storefront_construct_top_bar' ) ) :
	/**
	 * Build top bar
	 */
	
	function futurio_storefront_construct_top_bar() {
		$sortable_value = maybe_unserialize( get_theme_mod( 'top_bar_sort', array() ) );
		if ( !empty( $sortable_value ) ) {
			$count	 = ( 12 / count( $sortable_value ) );
			$i		 = 1;
			?>
			<div class="top-bar-section container-fluid">
				<div class="<?php echo esc_attr( get_theme_mod( 'top_bar_content_width', 'container' ) ); ?>">
					<div class="row">
						<?php
						foreach ( $sortable_value as $checked_value ) :
							switch ( $checked_value ) {
								case 'textarea_1' :
									?>
									<div id="<?php echo esc_attr( $checked_value ); ?>" class="top-bar-item col-sm-<?php echo absint( $count ); ?>">
										<?php echo wp_kses_post( do_shortcode( get_theme_mod( 'top_bar_textarea_one', '' ) ) ); ?>                 
									</div>
									<?php
									break;
								case 'textarea_2' :
									?>
									<div id="<?php echo esc_attr( $checked_value ); ?>" class="top-bar-item col-sm-<?php echo absint( $count ); ?>">
										<?php echo wp_kses_post( do_shortcode( get_theme_mod( 'top_bar_textarea_two', '' ) ) ); ?>                 
									</div>
									<?php
									break;
								case 'icons' :
									?>
									<div id="<?php echo esc_attr( $checked_value ); ?>" class="top-bar-item col-sm-<?php echo absint( $count ); ?>">
										<?php
										if ( function_exists( 'futurio_pro_social_links' ) ) {
											futurio_pro_social_links();
										} elseif ( function_exists( 'futurio_extra_social_links' ) ) {
											futurio_extra_social_links();
										}
										?>                 
									</div>
									<?php
								break;
								$i++;
							}
						endforeach;
						?>
					</div>
				</div>
			</div>	
			<?php
		}
	}

endif;

if ( !function_exists( 'futurio_storefront_generate_construct_footer' ) ) :
	/**
	 * Build footer
	 */
	add_action( 'futurio_storefront_generate_footer_credits', 'futurio_storefront_generate_construct_footer' );

	function futurio_storefront_generate_construct_footer() {
		?>
		<div class="footer-credits-text text-center">
			<?php
			/* translators: %1$s: Futurio Storefront name with futuriowp.com URL */
			printf( esc_html__( 'Theme: %1$s', 'futurio-storefront' ), '<a href="' . esc_url( 'https://futuriowp.com/' ) . '">Futurio</a>' );
			?>
		</div> 
		<?php
	}

endif;


if ( !function_exists( 'futurio_storefront_widget_date_comments' ) ) :

	/**
	 * Returns date for widgets.
	 */
	function futurio_storefront_widget_date_comments() { 
	?>
		<div class="content-date-comments">
		<?php if ( get_theme_mod( 'blog_archive_date', 'on' ) == 'on' || is_singular() ) { ?>
				<div class="date-meta">
					<?php echo esc_html(get_the_date()); ?>
				</div>
		<?php } ?>
		<?php if ( !comments_open() && get_theme_mod( 'blog_archive_comments', 'on' ) == 'on' || !comments_open() && is_singular() ) { ?>
			<div class="comments-meta comments-off">
				<?php esc_html_e( 'Off', 'futurio-storefront' ); ?>
				<i class="fa fa-comments-o"></i>
			</div>
		<?php } elseif ( comments_open() && get_theme_mod( 'blog_archive_comments', 'on' ) == 'on' || comments_open() && get_theme_mod( 'blog_archive_comments', 'on' ) == 'off' || is_singular() ) { ?>
			<div class="comments-meta coments-commented">
				<a href="<?php the_permalink(); ?>#comments" rel="nofollow" title="<?php esc_attr_e( 'Comment on ', 'futurio-storefront' ) . the_title_attribute(); ?>">
					<?php echo absint( get_comments_number() ); ?>
				</a>
				<i class="fa fa-comments-o"></i>
			</div>
		<?php } ?>
		</div>
		<?php
	}

endif;

if ( !function_exists( 'futurio_storefront_excerpt_length' ) ) :

	/**
	 * Excerpt limit.
	 */
	function futurio_storefront_excerpt_length( $length ) {
		if ( is_home() || (is_archive() && get_theme_mod('custom_blog_feed', '') == '' && !futurio_storefront_check_elementor()) ) { 
			return get_theme_mod( 'blog_archive_excerpt', '35' ); 
		} else { 
			return $length; 
		} 
	}

	add_filter( 'excerpt_length', 'futurio_storefront_excerpt_length', 999 );

endif;

if ( !function_exists( 'futurio_storefront_excerpt_more' ) ) :

	/**
	 * Excerpt more.
	 */
	function futurio_storefront_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'futurio_storefront_excerpt_more' );

endif;

if ( !function_exists( 'futurio_storefront_thumb_img' ) ) :

	/**
	 * Return featured image
	 */
	function futurio_storefront_thumb_img( $img = 'full', $col = '', $link = true ) {
		global $post;
		if ( ( has_post_thumbnail( $post->ID ) && $link == true ) ) {
			?>
			<div class="news-thumb <?php echo esc_attr( $col ); ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( $img ); ?>
				</a>
			</div><!-- .news-thumb -->
		<?php } elseif ( has_post_thumbnail( $post->ID ) ) { ?>
			<div class="news-thumb <?php echo esc_attr( $col ); ?>">
				<?php the_post_thumbnail( $img ); ?>
			</div><!-- .news-thumb -->
			<?php
		}
	}

endif;

if ( !function_exists( 'futurio_storefront_header_thumb_img' ) ) :

	/**
	 * Return header featured image
	 */
	function futurio_storefront_header_thumb_img( $img = 'full' ) {
		global $post;

		if ( is_404() ) {
			return;
		}

		if ( get_theme_mod( 'single_featured_image', 'full' ) == 'full' && has_post_thumbnail( $post->ID ) && futurio_storefront_get_meta( 'disable_featured_image' ) != 'disable' ) {
			?>	
			<div class="full-head-img container-fluid" style="background-image: url( <?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $img ) ) ?> )">
				<?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
					<?php futurio_storefront_header_title() ?>
				<?php } ?>
			</div>
			<?php
		} elseif ( get_theme_mod( 'single_featured_image', 'full' ) == 'full' && !has_post_thumbnail( $post->ID ) && futurio_storefront_get_meta( 'disable_featured_image' ) != 'disable' && futurio_storefront_get_meta( 'disable_title' ) != 'disable' ) {
			?>	
			<div class="full-head-img container-fluid">
				<?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
					<?php futurio_storefront_header_title() ?>
				<?php } ?>
			</div>
			<?php
		} elseif ( get_theme_mod( 'single_title_position', 'full' ) == 'full' && futurio_storefront_get_meta( 'disable_title' ) != 'disable' ) {
			?>	
			<div class="full-head-img container-fluid">
				<?php if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) { ?>
					<?php futurio_storefront_header_title() ?>
				<?php } ?>
			</div>
			<?php
		}
	}

endif;

/**
 * Subtitle for post and page
 */
if ( !function_exists( 'futurio_storefront_header_title' ) ) :

	function futurio_storefront_header_title() {
		global $post;
		if ( get_theme_mod( 'single_title_position', 'full' ) == 'full' ) {
			?>
			<?php if ( futurio_storefront_get_meta( 'disable_title' ) != 'disable' ) { ?>
				<h1 class="single-title container text-center">
					<?php echo esc_html( get_the_title( $post->ID ) ); ?>
				</h1>
				<?php if ( futurio_storefront_get_meta( 'subtitle' ) != '' ) { ?>
					<div class="single-subtitle container text-center">
						<?php echo esc_html( futurio_storefront_get_meta( 'subtitle', 'echo' ) ); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<?php
		}
	}

endif;

/**
 * Single previous next links
 */
if ( !function_exists( 'futurio_storefront_prev_next_links' ) ) :

	function futurio_storefront_prev_next_links() {
		the_post_navigation(
		array(
			'prev_text'	 => '<span class="screen-reader-text">' . __( 'Previous Post', 'futurio-storefront' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'futurio-storefront' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>%title</span>',
			'next_text'	 => '<span class="screen-reader-text">' . __( 'Next Post', 'futurio-storefront' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'futurio-storefront' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></span>',
		)
		);
	}

endif;

/**
 * Post author meta funciton
 */
if ( !function_exists( 'futurio_storefront_author_meta' ) ) :

	function futurio_storefront_author_meta() {
		?>
		<span class="author-meta">
			<span class="author-meta-by"><?php esc_html_e( 'By', 'futurio-storefront' ); ?></span>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
				<?php the_author(); ?>
			</a>
		</span>
		<?php
	}

endif;

/**
 * Post author funciton
 */
if ( !function_exists( 'futurio_storefront_author' ) ) :

	function futurio_storefront_author() {
		?>
		<div class="postauthor-container">			  
			<div class="postauthor-title">
				<h4 class="about">
					<?php esc_html_e('About The Author', 'futurio-storefront'); ?>
				</h4>
				<div class="">
					<span class="fn">
						<?php the_author_posts_link(); ?>
					</span>
				</div> 				
			</div>        	
			<div class="postauthor-content">	             						           
				<p>
					<?php the_author_meta('description') ?>
				</p>					
			</div>	 		
		</div>
		<?php
	}

endif;

if ( class_exists( 'WooCommerce' ) ) {

	if ( !function_exists( 'futurio_storefront_cart_link' ) ) {

		function futurio_storefront_cart_link() {
			?>	
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'futurio-storefront' ); ?>">
				<i class="fa fa-<?php echo esc_html( get_theme_mod( 'header_cart_icon', 'shopping-bag' ) ) ?>"><span class="count"><?php echo is_object( WC()->cart ) ? wp_kses_data( WC()->cart->get_cart_contents_count() ) : ''; ?></span></i>
				<?php do_action( 'futurio_storefront_cart' ); ?>
			</a>
			<?php
		}

	}

	if ( !function_exists( 'futurio_storefront_header_cart' ) ) {

		function futurio_storefront_header_cart() {
			?>
			<div class="menu-cart-hook" >
				<div class="menu-cart" >
					<?php futurio_storefront_cart_link(); ?>
					<ul class="site-header-cart menu list-unstyled text-center hidden-xs">
						<li>
							<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
						</li>
					</ul>
				</div>
			</div>
			<?php
		}

	}

	if ( !function_exists( 'futurio_storefront_header_add_to_cart_fragment' ) ) {
		add_filter( 'woocommerce_add_to_cart_fragments', 'futurio_storefront_header_add_to_cart_fragment' );

		function futurio_storefront_header_add_to_cart_fragment( $fragments ) {
			ob_start();

			futurio_storefront_cart_link();

			$fragments[ 'a.cart-contents' ] = ob_get_clean();

			return $fragments;
		}

	}

	if ( !function_exists( 'futurio_storefront_my_account' ) ) {

		function futurio_storefront_my_account() {
			?>
			<div class="menu-account-hook" >
				<div class="menu-account" >
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'My Account', 'futurio-storefront' ); ?>">
						<i class="fa fa-<?php echo esc_html( get_theme_mod( 'header_my_account_icon', 'user' ) ) ?>"></i>
						<?php do_action( 'futurio_storefront_account' ); ?>
					</a>
				</div>
			</div>
			<?php
		}

	}

	/**
	 * Column width for woocommerce content function
	 */
	function futurio_storefront_main_content_width_woo_columns() {

		$columns = '12';
		if ( ( ( function_exists('is_shop') && is_shop() ) || is_product_tag() || is_product_category() ) && is_active_sidebar( 'futurio-storefront-woo-archive-sidebar' ) ) {
			$columns = $columns - absint( get_theme_mod( 'sidebar_size', '3' ) );
		} elseif ( is_active_sidebar( 'futurio-storefront-woo-right-sidebar' ) && futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar'  ) {
			$columns = $columns - absint( get_theme_mod( 'sidebar_size', '3' ) );
		}

		echo absint( $columns );
	}
  
  // Load cart widget in header. Required since Woo 7.8
  function futurio_storefront_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
  add_action( 'wp_enqueue_scripts', 'futurio_storefront_wc_cart_fragments' );

}
if ( !function_exists( 'futurio_storefront_search' ) ) {

	function futurio_storefront_search() {
		?>
		<div class="top-search-icon">
			<div class="top-search-box">
				<?php if ( class_exists( 'WooCommerce' ) ) { 
					the_widget( 'WC_Widget_Product_Search', 'title=' );
				} else {
					get_search_form();
				} ?>
			</div>
			<button>
				<i class="fa fa-search"></i>
			</button>
		</div>
		<?php
	}

}

if ( !function_exists( 'futurio_storefront_menu_widget_area' ) ) {

	function futurio_storefront_menu_widget_area() {
		if ( is_active_sidebar( 'futurio-storefront-menu-area' ) ) { ?>
			<div class="offcanvas-sidebar-toggle">
				<button>
					<i class="fa fa-bars"></i>
				</button>
			</div>
		<?php }
	}

}

if ( !function_exists( 'futurio_storefront_menu_button' ) ) {

	function futurio_storefront_menu_button() {
		if ( get_theme_mod( 'menu_button_text', '' ) != '' ) { ?>
			<div class="menu-button">
				<a class="btn-default" href="<?php echo esc_url( get_theme_mod( 'menu_button_url', '' ) ); ?>">
					<?php echo esc_html( get_theme_mod( 'menu_button_text', '' ) ); ?>
				</a>
			</div>
		<?php }
	}

}


if ( !function_exists( 'futurio_storefront_header_logo_title' ) ) {

	function futurio_storefront_header_logo_title() { ?>
			<div class="site-heading" >
				<div class="full-heading">
					<div class="site-branding-logo">
						<?php the_custom_logo(); ?>
					</div>
					<div class="site-branding-text header-branding-text">
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>

						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description">
								<?php echo esc_html( $description ); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>	
			</div>

	<?php }
}
if ( !function_exists( 'futurio_storefront_header_search_area' ) ) {

	function futurio_storefront_header_search_area() { ?>
		<div class="header-widget-area">
			<?php if ( get_theme_mod( 'header_search_on_off', 1 ) == 1 ) { ?>
				<div class="menu-search-widget">
					<?php 
					if ( class_exists( 'WooCommerce' )) { 
						the_widget( 'WC_Widget_Product_Search', 'title=' ); 
					} else {
						get_search_form();
					} 
					?>
				</div>
			<?php }
			if ( is_active_sidebar( 'futurio-storefront-header-area' ) ) {
			?>
				<div class="site-heading-sidebar" >
					<?php dynamic_sidebar( 'futurio-storefront-header-area' ); ?>
				</div>
			<?php } ?>
		</div>
	<?php }
}

if ( !function_exists( 'futurio_storefront_menu_icons_inline' ) ) {

	function futurio_storefront_menu_icons_inline() {
		$sortable_menu = maybe_unserialize( get_theme_mod( 'main_menu_sort', array() ) ); 
		if ( !empty( $sortable_menu ) ) : ?>
				<?php
				foreach ( $sortable_menu as $checked_menu ) :
					switch ( $checked_menu ) {
						case 'woo_cart' :
							if ( function_exists( 'futurio_storefront_header_cart' ) && class_exists( 'WooCommerce' ) ) {
								futurio_storefront_header_cart(); 
							}
							break;
						case 'woo_account' :
							if ( function_exists( 'futurio_storefront_my_account' ) && class_exists( 'WooCommerce' ) ) { 
								futurio_storefront_my_account();
							}
							break;
						case 'search' :
							if ( function_exists( 'futurio_storefront_search' ) ) { 
								futurio_storefront_search();
							}
							break;
						case 'widget' :
							if ( function_exists( 'futurio_storefront_menu_widget_area' ) ) { 
								futurio_storefront_menu_widget_area();
							}
							break;
						case 'button' :
							if ( function_exists( 'futurio_storefront_menu_button' ) ) { 
								futurio_storefront_menu_button();
							}
							break;
					}
				endforeach;
				?>
		<?php endif;
	}

}

if ( !function_exists( 'futurio_storefront_menu_icons_limited' ) ) {

	function futurio_storefront_menu_icons_limited() {
		$sortable_menu = maybe_unserialize( get_theme_mod( 'main_menu_sort', array() ) ); 
		if ( !empty( $sortable_menu ) ) : ?>
				<?php
				foreach ( $sortable_menu as $checked_menu ) :
					switch ( $checked_menu ) {
						case 'search' :
							if ( function_exists( 'futurio_storefront_search' ) ) { 
								futurio_storefront_search();
							}
							break;
						case 'widget' :
							if ( function_exists( 'futurio_storefront_menu_widget_area' ) ) { 
								futurio_storefront_menu_widget_area();
							}
							break;
						case 'button' :
							if ( function_exists( 'futurio_storefront_menu_button' ) ) { 
								futurio_storefront_menu_button();
							}
							break;
					}
				endforeach;
				?>
		<?php endif;
	}

}

if ( !function_exists( 'futurio_storefront_breadcrumbs' ) ) {

	function futurio_storefront_breadcrumbs() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<div class="container-fluid head-bread" role="main"><div id="breadcrumbs" class="container text-left">', '</div></div>' ); // Yoast breadcrumbs support
		}
	}

}

if ( !function_exists( 'futurio_storefront_sidebar_position' ) ) {

	function futurio_storefront_sidebar_position( $src = '' ) {
		$position		 = '';
		$content_push	 = get_theme_mod( 'sidebar_size', '3' );
		$sidebar_pull	 = 12 - $content_push;
		if ( is_active_sidebar( 'futurio-storefront-sidebar' ) && futurio_storefront_get_meta( 'sidebar' ) != 'right' && futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar' ) {
			if ( $src == 'sidebar' && ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' || futurio_storefront_get_meta( 'sidebar' ) == 'left' ) ) {
				$position = 'col-md-pull-' . absint( $sidebar_pull );
				echo esc_html( $position );
			}
			if ( $src == 'content' && ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' || futurio_storefront_get_meta( 'sidebar' ) == 'left' ) ) {
				$position = 'col-md-push-' . absint( $content_push );
				echo esc_html( $position );
			}
		}
		if ( is_active_sidebar( 'futurio-storefront-woo-right-sidebar' ) && class_exists( 'WooCommerce' ) && futurio_storefront_get_meta( 'sidebar' ) != 'right' && futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar' ) {
			if ( $src == 'sidebar-woo' && ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' || futurio_storefront_get_meta( 'sidebar' ) == 'left' ) ) {
				$position = 'col-md-pull-' . absint( $sidebar_pull );
				echo esc_html( $position );
			}
			if ( $src == 'content-woo' && ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' || futurio_storefront_get_meta( 'sidebar' ) == 'left' ) ) {
				$position = 'col-md-push-' . absint( $content_push );
				echo esc_html( $position );
			}
		}
	}

}

if ( !function_exists( 'futurio_storefront_content_layout' ) ) :

	/**
	 * Content layout
	 */
	function futurio_storefront_content_layout() {
		if ( futurio_storefront_get_meta( 'content_layout' ) ) {
			if ( futurio_storefront_get_meta( 'content_layout' ) == 'fullwidth' ) {
				?>
				<div class="container-fluid main-container" role="main">
					<div class="page-area">
			<?php } elseif ( futurio_storefront_get_meta( 'content_layout' ) == 'fullwidth_builders' ) { ?>
				<div class="container-fluid main-container page-builders" role="main">
					<div class="page-area">		
			<?php } else { ?>
				<div class="container main-container" role="main">
					<div class="page-area">		
			<?php
			}
		} else {
	?>
	<div class="container main-container" role="main">
		<div class="page-area">
			<?php
		}
	}

endif;

if ( !function_exists( 'futurio_storefront_get_meta' ) ) :

	/**
	 * Meta
	 */
	function futurio_storefront_get_meta( $name = '', $output = '' ) {
	if ( is_singular() || ( function_exists('is_shop') && is_shop() ) ) {
			global $post;
			if( function_exists('is_shop') && is_shop() ) {
				$post_id = get_option( 'woocommerce_shop_page_id' );
			} else {
				$post_id = $post->ID;
			}
			$meta = get_post_meta( $post_id, 'futurio_meta_' . $name, true );
			if ( isset( $meta ) && $meta != '' ) {
				if ( $output == 'echo' ) {
					echo esc_html( $meta );
				} else {
					return $meta;
				}
			} else {
				return;
			}
		}
	}

endif;

function futurio_storefront_check_elementor() { 
	if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	}
	return false;
}

if ( !function_exists( 'futurio_storefront_generate_header' ) ) :

	/**
	 * Generate header
	 */
	function futurio_storefront_generate_header( $topnav = '', $header = '', $mainmenu = '', $thumbimg = '', $breadcrumbs = '', $openingdiv = '' ) {
		if ( futurio_storefront_get_meta( 'disable_top_bar' ) != 'disable' && $topnav ) {
			futurio_storefront_construct_top_bar();
		}
		if ( get_theme_mod( 'custom_header', '' ) != '' && futurio_storefront_check_elementor() ) {
			if ( futurio_storefront_get_meta( 'disable_elementor_header' ) != 'disable' ) {
				$elementor_section_ID = get_theme_mod( 'custom_header', '' );
				echo do_shortcode( '[elementor-template id="' . absint($elementor_section_ID) . '"]' );
			}
		} else {
			if ( futurio_storefront_get_meta( 'disable_header' ) != 'disable' && $header ) {
				get_template_part( 'template-parts/template-part', 'header' );
			}
			if ( futurio_storefront_get_meta( 'disable_main_menu' ) != 'disable' && $mainmenu ) {
				get_template_part( 'template-parts/template-part', 'mainmenu' );
			}
		}
		if ( $thumbimg ) {
			futurio_storefront_header_thumb_img();
		}
		if ( futurio_storefront_get_meta( 'disable_breadcrumbs' ) != 'disable' && $breadcrumbs ) {
			futurio_storefront_breadcrumbs();
		}
		if ( $openingdiv ) {
			futurio_storefront_content_layout();
		}
	}

endif;

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         */
        do_action( 'wp_body_open' );
    }
endif;

if ( !function_exists( 'futurio_storefront_site_content_div' ) ) :
    /**
     * Build footer
     */
    add_action( 'futurio_storefront_after_menu', 'futurio_storefront_site_content_div' );

    function futurio_storefront_site_content_div() {
            ?>
            <div id="site-content"></div>
            <?php
    }

endif;

/**
 * Include a skip to content link at the top of the page so that users can bypass the header.
 */
function futurio_storefront_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#site-content">' . esc_html__( 'Skip to the content', 'futurio-storefront' ) . '</a>';
}

add_action( 'wp_body_open', 'futurio_storefront_skip_link', 5 );

/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 */
function futurio_storefront_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}

add_action( 'wp_head', 'futurio_storefront_no_js_class' );

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'futurio_storefront_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'futurio_storefront_wrapper_end', 10);

function futurio_storefront_wrapper_start() {
	
	futurio_storefront_generate_header( true, true, true, false, false, true );
    ?>
    <div class="row">
		<article class="col-md-<?php futurio_storefront_main_content_width_woo_columns(); ?> <?php futurio_storefront_sidebar_position( 'content-woo' ) ?>">
			<div class="futurio-woo-content single-content">
    <?php
}

function futurio_storefront_wrapper_end() {
    ?>
			</div>	
		</article>
		<?php
		if ( futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar' ) {
			get_sidebar( 'woo' );
		}
		?>
	</div>
    <?php
}
