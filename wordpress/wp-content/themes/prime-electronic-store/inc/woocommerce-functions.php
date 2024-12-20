<?php
/**
 * prime electronic store woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package prime_electronic_store
 */

/**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'prime_electronic_store_wc_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'prime_electronic_store_wc_wrapper_end', 10 );
add_action( 'after_setup_theme', 'prime_electronic_store_woocommerce_support' );
add_action( 'prime_electronic_store_wo_sidebar', 'prime_electronic_store_wc_sidebar_cb' );
add_action( 'widgets_init', 'prime_electronic_store_wc_widgets_init' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

/**
 * Declare Woocommerce Support
*/
function prime_electronic_store_woocommerce_support() {
    global $woocommerce;
    
    add_theme_support( 'woocommerce' );
    
    if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}

/**
 * Woocommerce Sidebar
*/
function prime_electronic_store_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'prime-electronic-store' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'prime-electronic-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function prime_electronic_store_wc_wrapper(){    
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
    <?php
}

/**
 * After Content
 * Closes the wrapping divs
*/
function prime_electronic_store_wc_wrapper_end(){
    ?>
        </main>
    </div>
    <?php
    if( is_active_sidebar( 'shop-sidebar' ) );
    do_action( 'prime_electronic_store_wo_sidebar' );
}

/**
 * Callback function for Shop sidebar
*/
function prime_electronic_store_wc_sidebar_cb(){
    if( is_active_sidebar( 'shop-sidebar' ) ){
        echo '<div class="sidebar"><aside id="secondary" class="widget-area" role="complementary">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside></div>'; 
    } else { ?>
        <aside id="secondary" class="widget-area" role="complementary">
            <!-- Search -->
            <aside id="search" class="widget widget_search" aria-label="<?php esc_attr_e( 'firstsidebar', 'prime-electronic-store' ); ?>">
                <h2 class="widget-title"><?php esc_html_e('Search', 'prime-electronic-store'); ?></h2>
                <form  method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <label>
                        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'prime-electronic-store'); ?></span>
                        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'prime-electronic-store'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                    </label>
                    <button type="submit" class="search-submit"></button>
                </form>
            </aside>
            <!-- Archive -->
            <aside id="archive" class="widget widget_archive" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'prime-electronic-store' ); ?>">
                <h2 class="widget-title"><?php esc_html_e('Archive List', 'prime-electronic-store'); ?></h2>
                <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
            </aside>
            <!-- Recent Posts -->
            <aside id="recent-posts" class="widget widget_recent_posts" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'prime-electronic-store' ); ?>">
                <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'prime-electronic-store'); ?></h2>
                <ul>
                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 5,
                    );
                    $prime_electronic_store_recent_posts = new WP_Query($args);

                    while ($prime_electronic_store_recent_posts->have_posts()) : $prime_electronic_store_recent_posts->the_post();
                    ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </aside>
            <!-- Categories -->
            <aside id="categories" class="widget widget_categories" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'prime-electronic-store' ); ?>">
                <h2 class="widget-title"><?php esc_html_e('Categories', 'prime-electronic-store'); ?></h2>
                <ul>
                    <?php
                    $args = array(
                        'title_li' => '',
                    );
                    wp_list_categories($args);
                    ?>
                </ul>
            </aside>
        </aside>
    <?php }
}