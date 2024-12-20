<?php
/**
 * Custom Functions.
 *
 * @package Electronics Storefront
 */

if( !function_exists( 'electronics_storefront_fonts_url' ) ) :

    //Google Fonts URL
    function electronics_storefront_fonts_url(){

        $electronics_storefront_font_families = array(
            'Outfit:wght@100..900',
            'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        );

        $electronics_storefront_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $electronics_storefront_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($electronics_storefront_fonts_url);

    }

endif;

if ( ! function_exists( 'electronics_storefront_sub_menu_toggle_button' ) ) :

    function electronics_storefront_sub_menu_toggle_button( $electronics_storefront_args, $electronics_storefront_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $electronics_storefront_args->theme_location == 'electronics-storefront-primary-menu' && isset( $electronics_storefront_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $electronics_storefront_args->before = '<div class="submenu-wrapper">';
            $electronics_storefront_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $electronics_storefront_item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $electronics_storefront_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $electronics_storefront_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'electronics-storefront' ) . '</span>' . electronics_storefront_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $electronics_storefront_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $electronics_storefront_args->theme_location == 'electronics-storefront-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $electronics_storefront_item->classes ) ) {

                $electronics_storefront_args->before = '<div class="link-icon-wrapper">';
                $electronics_storefront_args->after  = electronics_storefront_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $electronics_storefront_args->before = '';
                $electronics_storefront_args->after  = '';

            }

        }

        return $electronics_storefront_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'electronics_storefront_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'electronics_storefront_the_theme_svg' ) ):
    
    function electronics_storefront_the_theme_svg( $electronics_storefront_svg_name, $electronics_storefront_return = false ) {

        if( $electronics_storefront_return ){

            return electronics_storefront_get_theme_svg( $electronics_storefront_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in electronics_storefront_get_theme_svg();.

        }else{

            echo electronics_storefront_get_theme_svg( $electronics_storefront_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in electronics_storefront_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'electronics_storefront_get_theme_svg' ) ):

    function electronics_storefront_get_theme_svg( $electronics_storefront_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $electronics_storefront_svg = wp_kses(
            Electronics_Storefront_SVG_Icons::get_svg( $electronics_storefront_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $electronics_storefront_svg ) {
            return false;
        }
        return $electronics_storefront_svg;

    }

endif;

if( !function_exists( 'electronics_storefront_post_category_list' ) ) :

    // Post Category List.
    function electronics_storefront_post_category_list( $electronics_storefront_select_cat = true ){

        $electronics_storefront_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $electronics_storefront_post_cat_cat_array = array();
        if( $electronics_storefront_select_cat ){

            $electronics_storefront_post_cat_cat_array[''] = esc_html__( '-- Select Category --','electronics-storefront' );

        }

        foreach ( $electronics_storefront_post_cat_lists as $electronics_storefront_post_cat_list ) {

            $electronics_storefront_post_cat_cat_array[$electronics_storefront_post_cat_list->slug] = $electronics_storefront_post_cat_list->name;

        }

        return $electronics_storefront_post_cat_cat_array;
    }

endif;

if( !function_exists('electronics_storefront_single_post_navigation') ):

    function electronics_storefront_single_post_navigation(){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        $electronics_storefront_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $electronics_storefront_current_id = '';
        $article_wrap_class = '';
        global $post;
        $electronics_storefront_current_id = $post->ID;
        if( $electronics_storefront_twp_navigation_type == '' || $electronics_storefront_twp_navigation_type == 'global-layout' ){
            $electronics_storefront_twp_navigation_type = get_theme_mod('twp_navigation_type', $electronics_storefront_default['twp_navigation_type']);
        }

        if( $electronics_storefront_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $electronics_storefront_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . electronics_storefront_the_theme_svg('arrow-left',$electronics_storefront_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'electronics-storefront') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . electronics_storefront_the_theme_svg('arrow-right',$electronics_storefront_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'electronics-storefront') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $electronics_storefront_next_post = get_next_post();
                if( isset( $electronics_storefront_next_post->ID ) ){

                    $electronics_storefront_next_post_id = $electronics_storefront_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $electronics_storefront_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'electronics_storefront_navigation_action','electronics_storefront_single_post_navigation',30 );

if( !function_exists('electronics_storefront_content_offcanvas') ):

    // Offcanvas Contents
    function electronics_storefront_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'electronics-storefront'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'electronics-storefront'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('electronics-storefront-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'electronics-storefront-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Electronics_Storefront_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'electronics_storefront_before_footer_content_action','electronics_storefront_content_offcanvas',30 );

if( !function_exists('electronics_storefront_footer_content_widget') ):

    function electronics_storefront_footer_content_widget(){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        
            $electronics_storefront_footer_column_layout = absint(get_theme_mod('electronics_storefront_footer_column_layout', $electronics_storefront_default['electronics_storefront_footer_column_layout']));
            $electronics_storefront_footer_sidebar_class = 12;
            if($electronics_storefront_footer_column_layout == 2) {
                $electronics_storefront_footer_sidebar_class = 6;
            }
            if($electronics_storefront_footer_column_layout == 3) {
                $electronics_storefront_footer_sidebar_class = 4;
            }
            ?>
           
            <?php if ( get_theme_mod('electronics_storefront_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $electronics_storefront_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($electronics_storefront_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('electronics-storefront-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php

    }

endif;

add_action( 'electronics_storefront_footer_content_action','electronics_storefront_footer_content_widget',10 );

if( !function_exists('electronics_storefront_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function electronics_storefront_footer_content_info(){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $electronics_storefront_footer_copyright_text = wp_kses_post( get_theme_mod( 'electronics_storefront_footer_copyright_text', $electronics_storefront_default['electronics_storefront_footer_copyright_text'] ) );
                                    echo esc_html( $electronics_storefront_footer_copyright_text );
                                    echo '<br>';
                                     echo esc_html__('Theme: ', 'electronics-storefront') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-ecommerce-storefront-wordpress-theme') . '" title="' . esc_attr__('Electronics Storefront', 'electronics-storefront') . '" target="_blank"><span>' . esc_html__('Electronics Storefront', 'electronics-storefront') . '</span></a>' . esc_html__(' By ', 'electronics-storefront') . '  <span>' . esc_html__('OMEGA ', 'electronics-storefront') . '</span>';
                                    echo esc_html__('Powered by ', 'electronics-storefront') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'electronics-storefront') . '" target="_blank"><span>' . esc_html__('WordPress.', 'electronics-storefront') . '</span></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('electronics_storefront_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $electronics_storefront_to_the_top_text = get_theme_mod( 'electronics_storefront_to_the_top_text', __( 'To the Top', 'electronics-storefront' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $electronics_storefront_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'electronics_storefront_footer_content_action','electronics_storefront_footer_content_info',20 );


if( !function_exists( 'electronics_storefront_main_slider' ) ) :

    function electronics_storefront_main_slider(){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();

        $electronics_storefront_slider_section_title = esc_html( get_theme_mod( 'electronics_storefront_slider_section_title',
        $electronics_storefront_default['electronics_storefront_slider_section_title'] ) );

        $electronics_storefront_header_banner = get_theme_mod( 'electronics_storefront_header_banner', $electronics_storefront_default['electronics_storefront_header_banner'] );
        $electronics_storefront_header_banner_cat = get_theme_mod( 'electronics_storefront_header_banner_cat' );

        if( $electronics_storefront_header_banner ){

            $electronics_storefront_rtl = '';
            if( is_rtl() ){
                $electronics_storefront_rtl = 'dir="rtl"';
            }

            $electronics_storefront_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $electronics_storefront_header_banner_cat ) ) );

            if( $electronics_storefront_banner_query->have_posts() ): ?>

                <div class="theme-custom-block theme-banner-block">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $electronics_storefront_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $electronics_storefront_banner_query->have_posts() ):
                            $electronics_storefront_banner_query->the_post();
                            $electronics_storefront_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        $default_image = get_template_directory_uri() . '/assets/images/slider.png'; // Replace with the actual path to your default image
                                        $electronics_storefront_featured_image = isset( $electronics_storefront_featured_image[0] ) ? $electronics_storefront_featured_image[0] : $default_image;?>
                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($electronics_storefront_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php electronics_storefront_post_format_icon(); ?>
                                        </div>
                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <?php if( $electronics_storefront_slider_section_title ){ ?>
                                                        <h3><?php echo esc_html( $electronics_storefront_slider_section_title ); ?></h3>
                                                    <?php } ?>
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>
                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                        the_excerpt();

                                                    } else {

                                                        echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                    <?php echo esc_html__('Shop Now', 'electronics-storefront'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            <?php
            wp_reset_postdata();
            endif;
        }
    }

endif;


if( !function_exists( 'electronics_storefront_product_section' ) ) :

    function electronics_storefront_product_section(){ 

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();

        $electronics_storefront_product_section_title = esc_html( get_theme_mod( 'electronics_storefront_product_section_title',
        $electronics_storefront_default['electronics_storefront_product_section_title'] ) );

        $electronics_storefront_product_counter_date = esc_html( get_theme_mod( 'electronics_storefront_product_counter_date',
        $electronics_storefront_default['electronics_storefront_product_counter_date'] ) );

        $electronics_storefront_catData = get_theme_mod('electronics_storefront_featured_product_category','');
          
        if ( class_exists( 'WooCommerce' ) ) {
            $electronics_storefront_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $electronics_storefront_catData,
                'order' => 'ASC'
            ); ?>
        
            <div class="theme-product-block">
                <div class="wrapper">
                    <div class="shop-heading">
                        <?php if( $electronics_storefront_product_section_title ){ ?>
                            <h3><?php echo esc_html( $electronics_storefront_product_section_title ); ?></h3>
                        <?php } ?>
                        <?php if( $electronics_storefront_product_counter_date ){ ?>
                            <p id="timer" class="countdown2">
                                <input type="hidden" class="date2" value="<?php echo esc_html( $electronics_storefront_product_counter_date ); ?>">
                            </p>
                        <?php } ?>
                    </div>
                    <div class="owl-carousel" role="listbox">
                        <?php 
                        $electronics_storefront_loop = new WP_Query( $electronics_storefront_args );
                        if ( $electronics_storefront_loop->have_posts() ) :
                            while ( $electronics_storefront_loop->have_posts() ) : $electronics_storefront_loop->the_post(); 
                                global $product; 
                                $product_id = $product->get_id(); // Get product ID dynamically
                        ?>
                            <div class="grid-product">
                                <figure>
                                    <?php if (has_post_thumbnail( $electronics_storefront_loop->post->ID )) echo get_the_post_thumbnail($electronics_storefront_loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                                    <div class="product-cart">
                                        <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart( $electronics_storefront_loop->post, $product ); } ?>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $electronics_storefront_loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; 
                            wp_reset_postdata();
                        else : 
                            // Display fallback static products when no WooCommerce products are found
                        ?>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product1.png' ); ?>" alt="<?php echo esc_attr( 'Sample Product 1' ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" class="button"><?php esc_html_e( 'Add to Cart', 'electronics-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( 'Product Name Here 1', 'electronics-storefront'  ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00', 'electronics-storefront'  ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product2.png' ); ?>" alt="<?php echo esc_attr( 'Product Name Here 2' ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" class="button"><?php esc_html_e( 'Add to Cart', 'electronics-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( 'Product Name Here 2', 'electronics-storefront'  ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00', 'electronics-storefront'  ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product3.png' ); ?>" alt="<?php echo esc_attr( 'Product Name Here 3' ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" class="button"><?php esc_html_e( 'Add to Cart', 'electronics-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( 'Product Name Here 3', 'electronics-storefront'  ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00', 'electronics-storefront'  ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/product4.png' ); ?>" alt="<?php echo esc_attr( 'Product Name Here 4' ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" class="button"><?php esc_html_e( 'Add to Cart', 'electronics-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( 'Product Name Here 4', 'electronics-storefront'  ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00', 'electronics-storefront'  ); ?></p>
                                </div>
                            </div>

                        <?php 
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    <?php }

endif;

if (!function_exists('electronics_storefront_post_format_icon')):

    // Post Format Icon.
    function electronics_storefront_post_format_icon() {

        $electronics_storefront_format = get_post_format(get_the_ID()) ?: 'standard';
        $electronics_storefront_icon = '';
        $electronics_storefront_title = '';
        if( $electronics_storefront_format == 'video' ){
            $electronics_storefront_icon = electronics_storefront_get_theme_svg( 'video' );
            $electronics_storefront_title = esc_html__('Video','electronics-storefront');
        }elseif( $electronics_storefront_format == 'audio' ){
            $electronics_storefront_icon = electronics_storefront_get_theme_svg( 'audio' );
            $electronics_storefront_title = esc_html__('Audio','electronics-storefront');
        }elseif( $electronics_storefront_format == 'gallery' ){
            $electronics_storefront_icon = electronics_storefront_get_theme_svg( 'gallery' );
            $electronics_storefront_title = esc_html__('Gallery','electronics-storefront');
        }elseif( $electronics_storefront_format == 'quote' ){
            $electronics_storefront_icon = electronics_storefront_get_theme_svg( 'quote' );
            $electronics_storefront_title = esc_html__('Quote','electronics-storefront');
        }elseif( $electronics_storefront_format == 'image' ){
            $electronics_storefront_icon = electronics_storefront_get_theme_svg( 'image' );
            $electronics_storefront_title = esc_html__('Image','electronics-storefront');
        }
        
        if (!empty($electronics_storefront_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo electronics_storefront_svg_escape($electronics_storefront_icon); ?></span>
                <?php if( $electronics_storefront_title ){ echo '<span class="post-format-label">'.esc_html( $electronics_storefront_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'electronics_storefront_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $electronics_storefront_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function electronics_storefront_svg_escape( $electronics_storefront_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $electronics_storefront_svg = wp_kses(
            $electronics_storefront_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $electronics_storefront_svg ) {
            return false;
        }

        return $electronics_storefront_svg;

    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function electronics_storefront_sanitize_sidebar_option_meta( $electronics_storefront_input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $electronics_storefront_input,$metabox_options ) ){

            return $electronics_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function electronics_storefront_sanitize_pagination_meta( $electronics_storefront_input ){

        $electronics_storefront_metabox_options = array( 'Center','Right','Left');
        if( in_array( $electronics_storefront_input,$electronics_storefront_metabox_options ) ){

            return $electronics_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function electronics_storefront_sanitize_menu_transform( $electronics_storefront_input ){

        $electronics_storefront_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $electronics_storefront_input,$electronics_storefront_metabox_options ) ){

            return $electronics_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function electronics_storefront_sanitize_page_content_alignment( $electronics_storefront_input ){

        $electronics_storefront_metabox_options = array( 'left','center','right');
        if( in_array( $electronics_storefront_input,$electronics_storefront_metabox_options ) ){

            return $electronics_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function electronics_storefront_sanitize_footer_widget_title_alignment( $electronics_storefront_input ){

        $electronics_storefront_metabox_options = array( 'left','center','right');
        if( in_array( $electronics_storefront_input,$electronics_storefront_metabox_options ) ){

            return $electronics_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'electronics_storefront_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $electronics_storefront_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function electronics_storefront_sanitize_pagination_type( $electronics_storefront_input ) {
        // Define valid options for the pagination type.
        $electronics_storefront_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $electronics_storefront_input, $electronics_storefront_valid_options, true ) ) {
            return $electronics_storefront_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('electronics_storefront_sanitize_enable_pagination') ) :
    function electronics_storefront_sanitize_enable_pagination( $electronics_storefront_input ) {
        return (bool) $electronics_storefront_input;
    }
endif;