<?php
/*
 * Displays the header section with logo, site title, tagline, navigation, and contact information.
 */
?>
<div class="topbar my-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 align-self-center">
                <div class="top-button text-md-start text-center">
                    <?php 
                    $electronic_gadget_store_header_link_first = get_theme_mod('electronic_gadget_store_header_link_first');
                    $electronic_gadget_store_header_button_first = get_theme_mod('electronic_gadget_store_header_button_first', esc_html__('Newsletter', 'electronic-gadget-store'));
                    if ($electronic_gadget_store_header_link_first) : ?>
                        <span class="header-btn first">
                            <a href="<?php echo esc_url($electronic_gadget_store_header_link_first); ?>" class="book-appoin"><?php echo esc_html($electronic_gadget_store_header_button_first); ?></a>
                        </span>
                    <?php endif; ?>

                    <?php 
                    $electronic_gadget_store_header_link_sec = get_theme_mod('electronic_gadget_store_header_link_sec');
                    $electronic_gadget_store_header_button_sec = get_theme_mod('electronic_gadget_store_header_button_sec', esc_html__('Track Your Order', 'electronic-gadget-store'));
                    if ($electronic_gadget_store_header_link_sec) : ?>
                        <span class="header-btn sec">
                            <a href="<?php echo esc_url($electronic_gadget_store_header_link_sec); ?>" class="book-appoin"><?php echo esc_html($electronic_gadget_store_header_button_sec); ?></a>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 align-self-center">
                <div class="discount-text text-center">
                    <?php 
                    if ($electronic_gadget_store_discount_text_top = get_theme_mod('electronic_gadget_store_discount_text_top')) : ?>
                        <p class="discount-top m-md-0 my-2"><?php echo esc_html($electronic_gadget_store_discount_text_top); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 langauge-box align-self-center d-flex align-items-center justify-content-md-end justify-content-center">
                <span class="currency me-md-2 mb-md-0 mb-2">
                    <?php if (get_theme_mod('electronic_gadget_store_currency_switcher', false) && class_exists('WooCommerce')) : ?>
                        <div class="currency-box d-md-inline-block">
                            <?php echo wp_kses_post(do_shortcode('[woocommerce_currency_switcher_drop_down_box]')); ?>
                        </div>
                    <?php endif; ?>
                </span>
                <span class="translate-btn d-flex">
                    <?php if (get_theme_mod('electronic_gadget_store_cart_language_translator', false) && class_exists('GTranslate')) : ?>
                        <div class="translate-lang position-relative d-md-inline-block me-3">
                            <?php echo wp_kses_post(do_shortcode('[gtranslate]')); ?>
                        </div>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="headerbox my-lg-2 my-md-4">
    <div class="container-fluid header-main">
        <div class="row">
            <!-- Logo Section -->
            <div class="col-lg-2 col-md-3 col-12 logo-col align-self-center">
                <div class="logo text-center text-md-start">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>

                    <?php if (get_theme_mod('electronic_gadget_store_site_title', 1)) : ?>
                        <p class="text-capitalize mb-0">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </p>
                    <?php endif; ?>

                    <?php
                    $electronic_gadget_store_description = get_bloginfo('description', 'display');
                    if ($electronic_gadget_store_description || is_customize_preview()) :
                        if (get_theme_mod('electronic_gadget_store_site_tagline', 1)) :
                            ?>
                            <p class="site-description my-1 text-capitalize"><?php echo esc_html($electronic_gadget_store_description); ?></p>
                        <?php endif; 
                    endif;
                    ?>
                </div>
            </div>

            <!-- Category Button Section -->
            <div class="col-lg-2 col-md-3 col-12 align-self-center my-md-0 my-2">
                <?php if (class_exists('WooCommerce')) : ?>
                    <button class="category-btn text-md-start text-center" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <?php echo esc_html(get_theme_mod('electronic_gadget_store_category_text', __('All Categories', 'electronic-gadget-store'))); ?>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="category-dropdown">
                        <?php
                        $args = array(
                            'number'     => absint(get_theme_mod('electronic_gadget_store_product_category_number')),
                            'orderby'    => 'title',
                            'order'      => 'ASC',
                            'hide_empty' => 0,
                            'parent'     => 0,
                        );
                        $electronic_gadget_store_product_categories = get_terms('product_cat', $args);
                        if (!empty($electronic_gadget_store_product_categories)) {
                            foreach ($electronic_gadget_store_product_categories as $product_category) { ?>
                                <li class="drp_dwn_menu">
                                    <a href="<?php echo esc_url(get_term_link($product_category)); ?>">
                                        <?php echo esc_html($product_category->name); ?>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Navigation Section -->
            <div class="col-lg-5 col-md-1 col-12 align-self-center my-0 mx-auto p-0">
                <div class="main-navhead">
                    <div class="menubox">
                        <div class="menu-content">
                            <?php get_template_part('template-parts/navigation/site-nav'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Section -->
            <div class="col-lg-2 col-md-3 col-12 main-search align-self-center">
                <div class="product-search">
                    <div class="search_inner my-3 my-md-0">
                        <?php if (class_exists('WooCommerce')) : ?>
                            <?php get_product_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Header Icons Section -->
            <div class="col-lg-1 col-md-2 col-12 align-self-center mb-md-0 mb-3">
                <div class="header-details">
                    <p class="mb-0">
                        <?php if (class_exists('WooCommerce')): ?> 
                            <span class="product-cart text-center position-relative pe-2">
                                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Shopping cart', 'electronic-gadget-store'); ?>">
                                    <i class="fas fa-shopping-cart me-3" aria-hidden="true"></i>
                                </a>
                                <?php 
                                $electronic_gadget_store_cart_count = WC()->cart->get_cart_contents_count(); 
                                if ($electronic_gadget_store_cart_count > 0): ?>
                                    <span class="cart-count"><?php echo esc_html($electronic_gadget_store_cart_count); ?></span>
                                <?php endif; ?>
                            </span>
                        <?php endif; ?>
                    </p>
                    
                    <?php if ($electronic_gadget_store_like_option = get_theme_mod('electronic_gadget_store_like_option')): ?>
                        <p class="mb-0">
                            <a href="<?php echo esc_url($electronic_gadget_store_like_option); ?>">
                                <i class="far fa-heart me-3" aria-hidden="true"></i>
                            </a>
                        </p>
                    <?php endif; ?>

                    <p class="mb-0">
                        <?php if (class_exists('YITH_WCWL')): ?>
                            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                                <i class="fas fa-heart me-3" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </p>

                    <p class="mb-0">
                        <?php if (class_exists('WooCommerce')): ?>
                            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                <i class="<?php echo is_user_logged_in() ? 'fas' : 'far'; ?> fa-user" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>