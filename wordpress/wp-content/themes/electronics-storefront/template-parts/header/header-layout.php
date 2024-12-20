<?php
/**
 * Header Layout
 * @package Electronics Storefront
 */

$electronics_storefront_default = electronics_storefront_get_default_theme_options();

$electronics_storefront_header_layout_phone_number = esc_html( get_theme_mod( 'electronics_storefront_header_layout_phone_number',
$electronics_storefront_default['electronics_storefront_header_layout_phone_number'] ) );

$electronics_storefront_header_layout_email_id = esc_html( get_theme_mod( 'electronics_storefront_header_layout_email_id',
$electronics_storefront_default['electronics_storefront_header_layout_email_id'] ) );

$electronics_storefront_header_layout_wishlist = esc_html( get_theme_mod( 'electronics_storefront_header_layout_wishlist',
$electronics_storefront_default['electronics_storefront_header_layout_wishlist'] ) );

$electronics_storefront_header_layout_text = esc_html( get_theme_mod( 'electronics_storefront_electronics_storefront_header_layout_text',
$electronics_storefront_default['electronics_storefront_electronics_storefront_header_layout_text'] ) );

$electronics_storefront_header_layout_facebook_link = esc_url( get_theme_mod( 'electronics_storefront_header_layout_facebook_link',
$electronics_storefront_default['electronics_storefront_header_layout_facebook_link'] ) );

$electronics_storefront_header_layout_twitter_link = esc_url( get_theme_mod( 'electronics_storefront_header_layout_twitter_link',
$electronics_storefront_default['electronics_storefront_header_layout_twitter_link'] ) );

$electronics_storefront_header_layout_pintrest_link = esc_url( get_theme_mod( 'electronics_storefront_header_layout_pintrest_link',
$electronics_storefront_default['electronics_storefront_header_layout_pintrest_link'] ) );

$electronics_storefront_header_layout_instagram_link = esc_url( get_theme_mod( 'electronics_storefront_header_layout_instagram_link',
$electronics_storefront_default['electronics_storefront_header_layout_instagram_link'] ) );

$electronics_storefront_header_layout_youtube_link = esc_url( get_theme_mod( 'electronics_storefront_header_layout_youtube_link',
$electronics_storefront_default['electronics_storefront_header_layout_youtube_link'] ) );

$electronics_storefront_header_layout_enable_translator = esc_html( get_theme_mod( 'electronics_storefront_header_layout_enable_translator',
$electronics_storefront_default['electronics_storefront_header_layout_enable_translator'] ) );

$electronics_storefront_sticky = get_theme_mod('electronics_storefront_sticky');
$electronics_storefront_data_sticky = "false";
if ($electronics_storefront_sticky) {
$electronics_storefront_data_sticky = "true";
}
global $wp_customize;

?>
<div class="main-header">
    <section id="top-header">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-right">
                <?php if( $electronics_storefront_header_layout_text ){ ?>
                   <span class="top-text"><?php echo esc_html( $electronics_storefront_header_layout_text ); ?></span>
                <?php } ?>
            </div>
            <div class="theme-header-areas header-areas-right top-header-box">
                <div class="social-area">
                    <?php if( $electronics_storefront_header_layout_facebook_link || $electronics_storefront_header_layout_twitter_link || $electronics_storefront_header_layout_pintrest_link || $electronics_storefront_header_layout_instagram_link || $electronics_storefront_header_layout_youtube_link ){ ?>
                        <span><?php esc_html_e('follow Us -','electronics-storefront') ?></span>
                        <?php if( $electronics_storefront_header_layout_facebook_link ){ ?>
                           <a href="<?php echo esc_url( $electronics_storefront_header_layout_facebook_link ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg></a>
                        <?php } ?>
                        <?php if( $electronics_storefront_header_layout_twitter_link ){ ?>
                           <a href="<?php echo esc_url( $electronics_storefront_header_layout_twitter_link ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg></a>
                        <?php } ?>
                        <?php if( $electronics_storefront_header_layout_pintrest_link ){ ?>
                           <a href="<?php echo esc_url( $electronics_storefront_header_layout_pintrest_link ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"/></svg></a>
                        <?php } ?>
                        <?php if( $electronics_storefront_header_layout_instagram_link ){ ?>
                           <a href="<?php echo esc_url( $electronics_storefront_header_layout_instagram_link ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                        <?php } ?>
                        <?php if( $electronics_storefront_header_layout_youtube_link ){ ?>
                           <a href="<?php echo esc_url( $electronics_storefront_header_layout_youtube_link ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc. --><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg></a>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php if(class_exists('WOOCS')){ ?>
                    <span class="currency">
                        <?php echo do_shortcode('[woocs]');?>
                    </span>
                <?php }?>
                <?php if( $electronics_storefront_header_layout_enable_translator ){ ?>
                    <?php echo do_shortcode('[google-translator]'); ?>
                <?php } ?>
            </div>
        </div>
        <hr>
    </section>
    <section id="middle-header">
        <div class="wrapper header-wrapper header-box">
            <div class="header-titles">
                <?php
                    electronics_storefront_site_logo();
                    electronics_storefront_site_description();
                ?>
            </div>
            <div class="main-box-header theme-header-areas header-areas-right">
                <div class="theme-header-areas header-areas-right search-box">
                   <div class="header-search">
                        <?php if(class_exists('woocommerce')){ ?>
                            <?php get_product_search_form(); ?>
                        <?php }?>
                   </div>
                </div>
                <div class="theme-header-areas header-areas-left suport-box">
                    <?php if( $electronics_storefront_header_layout_phone_number || $electronics_storefront_header_layout_email_id ){ ?>
                        <span class="call-header">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M192 208c0-17.7-14.3-32-32-32h-16c-35.4 0-64 28.7-64 64v48c0 35.4 28.7 64 64 64h16c17.7 0 32-14.3 32-32V208zm176 144c35.4 0 64-28.7 64-64v-48c0-35.4-28.7-64-64-64h-16c-17.7 0-32 14.3-32 32v112c0 17.7 14.3 32 32 32h16zM256 0C113.2 0 4.6 118.8 0 256v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16v-16c0-114.7 93.3-208 208-208s208 93.3 208 208h-.1c.1 2.4 .1 165.7 .1 165.7 0 23.4-18.9 42.3-42.3 42.3H320c0-26.5-21.5-48-48-48h-32c-26.5 0-48 21.5-48 48s21.5 48 48 48h181.7c49.9 0 90.3-40.4 90.3-90.3V256C507.4 118.8 398.8 0 256 0z"/></svg>
                            <span class="contact-box">
                                <span><?php echo esc_html( 'Support : ' ); ?><a href="tell:<?php echo esc_attr( $electronics_storefront_header_layout_phone_number ); ?>"><?php echo esc_html( $electronics_storefront_header_layout_phone_number ); ?></a>
                                </span>
                                <span>
                                    <?php echo esc_html( 'E-mail : ' ); ?><a href="mailto:<?php echo esc_attr( $electronics_storefront_header_layout_email_id ); ?>"><?php echo esc_html( $electronics_storefront_header_layout_email_id ); ?></a> 
                                </span>
                            </span>
                        </span>
                    <?php } ?>
                </div>
                <div class="theme-header-areas header-areas-left account-box">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','electronics-storefront'); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg></a>
                        <?php }
                        else { ?>
                            <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','electronics-storefront'); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg></a>
                        <?php } ?>
                    <?php }?>
                    <?php if( $electronics_storefront_header_layout_wishlist ){ ?>
                        <span class="wishlist">
                            <a href="<?php echo esc_html( $electronics_storefront_header_layout_wishlist ); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
                            </a>
                        </span>
                    <?php } ?>
                    <?php if(class_exists('woocommerce')){ ?>
                        <span class="cart_no">
                            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','electronics-storefront' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M528.1 301.3l47.3-208C578.8 78.3 567.4 64 552 64H159.2l-9.2-44.8C147.8 8 137.9 0 126.5 0H24C10.7 0 0 10.7 0 24v16c0 13.3 10.7 24 24 24h69.9l70.2 343.4C147.3 417.1 136 435.2 136 456c0 30.9 25.1 56 56 56s56-25.1 56-56c0-15.7-6.4-29.8-16.8-40h209.6C430.4 426.2 424 440.3 424 456c0 30.9 25.1 56 56 56s56-25.1 56-56c0-22.2-12.9-41.3-31.6-50.4l5.5-24.3c3.4-15-8-29.3-23.4-29.3H218.1l-6.5-32h293.1c11.2 0 20.9-7.8 23.4-18.7z"/></svg></a>
                            <span class="cart-value"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>

                        </span>
                        <span class="cart-price"><?php echo get_woocommerce_currency_symbol() . wp_kses_data( WC()->cart->cart_contents_total );?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
        <hr>
    </section>
    <section id="center-header" class="header-navbar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($electronics_storefront_data_sticky); ?>">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="product-category-area">
                        <button class="product-btn"><?php esc_html_e('All Category','electronics-storefront'); ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg></button>
                        <div class="product-cat">
                            <?php
                                $args = array(
                                    'orderby'    => 'title',
                                    'order'      => 'ASC',
                                    'hide_empty' => 0,
                                    'parent'  => 0
                                );
                                $product_categories = get_terms( 'product_cat', $args );
                                $count = count($product_categories);
                                if ( $count > 0 ){
                                    foreach ( $product_categories as $product_category ) {
                                    $product_cat_id   = $product_category->term_id;
                                    $cat_link = get_category_link( $product_cat_id );
                                    if ($product_category->category_parent == 0) { ?>
                                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                                <?php
                            }
                            echo esc_html( $product_category->name ); ?></a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M285.5 273L91.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9L188.5 256 34.5 101.3c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L285.5 239c9.4 9.4 9.4 24.6 0 33.9z"/></svg></li>
                            <?php } } ?>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="theme-header-areas header-areas-right">
                <div class="site-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'electronics-storefront'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('electronics-storefront-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'electronics-storefront-primary-menu',
                                    )
                                );
                            } else {
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker' => new Electronics_Storefront_Walker_Page(),
                                    )
                                );
                            } ?>
                        </ul>
                    </nav>
                </div>
                <div class="navbar-controls twp-hide-js">
                    <button type="button" class="navbar-control navbar-control-offcanvas">
                        <span class="navbar-control-trigger" tabindex="-1">
                            <?php electronics_storefront_the_theme_svg('menu'); ?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>