<?php
/**
 * Template part for displaying slider section.
 *
 * @package electronic_gadget_store
 */

$electronic_gadget_store_static_image = get_stylesheet_directory_uri() . '/assets/images/header_img.png';
$electronic_gadget_store_slider_arrows = get_theme_mod('electronic_gadget_store_slider_arrows', 'true');

if ($electronic_gadget_store_slider_arrows) : ?>
    <section id="slider">
        <div class="container-fluid">
            <?php 
            $electronic_gadget_store_slide_pages = array();
            $electronic_gadget_store_mod = absint(get_theme_mod('electronic_gadget_store_slider_page'));
            if ($electronic_gadget_store_mod !== 0) {
                $electronic_gadget_store_slide_pages[] = $electronic_gadget_store_mod;
            }

            if (!empty($electronic_gadget_store_slide_pages)) :
                $electronic_gadget_store_args = array(
                    'post_type'      => 'page',
                    'post__in'       => $electronic_gadget_store_slide_pages,
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                );
                $electronic_gadget_store_query = new WP_Query($electronic_gadget_store_args);

                if ($electronic_gadget_store_query->have_posts()) :
                    while ($electronic_gadget_store_query->have_posts()) : $electronic_gadget_store_query->the_post(); ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12 slider-content-col align-self-center">
                                    <div class="carousel-caption">
                                        <div class="inner_carousel pe-lg-5">
                                            <h1 class="mt-md-2 mb-3">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h1>
                                            <p class="slide-content"><?php echo esc_html(wp_trim_words(get_the_content(), 25)); ?></p>

                                            <?php 
                                            $electronic_gadget_store_slider_short_heading = get_theme_mod('electronic_gadget_store_slider_short_heading', '');
                                            if (!empty($electronic_gadget_store_slider_short_heading)) : ?>
                                                <p class="slidetop-text text-uppercase mb-md-2 mt-md-0 mb-1">
                                                    <?php echo esc_html($electronic_gadget_store_slider_short_heading); ?>
                                                </p>
                                            <?php endif; ?>

                                            <div class="product-details">
                                                <?php 
                                                $electronic_gadget_store_device_price = get_theme_mod('electronic_gadget_store_device_price', '');
                                                if (!empty($electronic_gadget_store_device_price)) : ?>
                                                    <i class="fas fa-tag me-2"></i>
                                                    <span class="device_price me-3 text-uppercase">
                                                        <?php echo esc_html($electronic_gadget_store_device_price); ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php 
                                                $electronic_gadget_store_delivery_price = get_theme_mod('electronic_gadget_store_delivery_price', '');
                                                if (!empty($electronic_gadget_store_delivery_price)) : ?>
                                                    <i class="fas fa-truck me-2"></i>
                                                    <span class="device_delivery me-3 text-uppercase">
                                                        <?php echo esc_html($electronic_gadget_store_delivery_price); ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php 
                                                $electronic_gadget_store_device_warranty = get_theme_mod('electronic_gadget_store_device_warranty', '');
                                                if (!empty($electronic_gadget_store_device_warranty)) : ?>
                                                    <i class="fas fa-shopping-bag me-2"></i>
                                                    <span class="device_warranty text-uppercase">
                                                        <?php echo esc_html($electronic_gadget_store_device_warranty); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="more-btn my-4">
                                                <a class="btn-1" href="<?php the_permalink(); ?>">
                                                    <?php esc_html_e('Shop Now', 'electronic-gadget-store'); ?>
                                                </a>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 align-self-center my-md-0 my-2">
                                                    <div class="contact">
                                                        <?php if (get_theme_mod('electronic_gadget_store_mail_text') || get_theme_mod('electronic_gadget_store_mail')) : ?>
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-4 col-3 align-self-center text-end">
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                                <div class="col-lg-10 col-md-8 col-9 align-self-center contact-col">
                                                                    <p class="infotext text-capitalize text-start m-0"><?php echo esc_html(get_theme_mod('electronic_gadget_store_mail_text', '')); ?></p>
                                                                    <p class="mb-0 contact-content text-start">
                                                                        <a href="mailto:<?php echo esc_html(get_theme_mod('electronic_gadget_store_mail', '')); ?>">
                                                                            <?php echo esc_html(get_theme_mod('electronic_gadget_store_mail', '')); ?>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 align-self-center my-md-0 my-2">
                                                    <div class="contact call">
                                                        <?php if (get_theme_mod('electronic_gadget_store_call_text') || get_theme_mod('electronic_gadget_store_call')) : ?>
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-4 col-3 align-self-center text-end">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                                <div class="col-lg-10 col-md-8 col-9 align-self-center text-start contact-col call">
                                                                    <p class="infotext text-capitalize m-0"><?php echo esc_html(get_theme_mod('electronic_gadget_store_call_text', '')); ?></p>
                                                                    <p class="mb-0 contact-content">
                                                                        <a href="tel:<?php echo esc_html(get_theme_mod('electronic_gadget_store_call', '')); ?>">
                                                                            <?php echo esc_html(get_theme_mod('electronic_gadget_store_call', '')); ?>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-12 slider-img-col p-md-0">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', array('alt' => esc_attr(get_the_title()))); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($electronic_gadget_store_static_image); ?>" alt="<?php esc_attr_e('Slider Image', 'electronic-gadget-store'); ?>" />
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-2 col-md-2 col-12 slider-imgcol p-md-0">
                                    <?php if (get_theme_mod('electronic_gadget_store_banner_slider')) : ?>
                                        <img src="<?php echo esc_url(get_theme_mod('electronic_gadget_store_banner_slider')); ?>" alt="<?php esc_attr_e('Banner Image', 'electronic-gadget-store'); ?>" />
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-2 col-md-2 col-12 abt-col ps-md-0">
                                    <div class="inner-abt ps-3 py-md-2 py-3">
                                        <?php 
                                        $electronic_gadget_store_abt_heading = get_theme_mod('electronic_gadget_store_abt_heading', '');
                                        if (!empty($electronic_gadget_store_abt_heading)) : ?>
                                            <h2 class="text-md-end text-center">
                                                <?php echo esc_html($electronic_gadget_store_abt_heading); ?>
                                            </h2>
                                        <?php endif; ?>

                                        <?php 
                                        for ($electronic_gadget_store_i = 1; $electronic_gadget_store_i <= 5; $electronic_gadget_store_i++) :
                                            $electronic_gadget_store_tab_heading = get_theme_mod('electronic_gadget_store_tab_heading' . $electronic_gadget_store_i);
                                            if ($electronic_gadget_store_tab_heading) : ?>
                                                <div class="tab-details d-flex align-items-center justify-content-md-end justify-content-center">
                                                    <p class="m-0 about-content"><i class="fas fa-circle me-2"></i><?php echo esc_html($electronic_gadget_store_tab_heading); ?></p>
                                                </div>
                                            <?php endif;
                                        endfor; ?>
                                    </div>

                                    <div class="about-block">
                                        <div class="thumbnail">
                                            <?php if (get_theme_mod('electronic_gadget_store_abt_img')) : ?>
                                                <img src="<?php echo esc_url(get_theme_mod('electronic_gadget_store_abt_img')); ?>" alt="<?php esc_attr_e('About Image', 'electronic-gadget-store'); ?>" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <?php
    $electronic_gadget_store_slider_offer_text = get_theme_mod('electronic_gadget_store_slider_offer_text', '');
    $electronic_gadget_store_product_btn_text1 = get_theme_mod('electronic_gadget_store_product_btn_text1', 'View Collection');
    $electronic_gadget_store_product_btn_link1 = get_theme_mod('electronic_gadget_store_product_btn_link1');

    if (!empty($electronic_gadget_store_slider_offer_text) || !empty($electronic_gadget_store_product_btn_link1)) : ?>
        <div class="slider-below">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-7 align-self-center">
                        <?php if (!empty($electronic_gadget_store_slider_offer_text)) : ?>
                            <p class="slideoffer-text my-3">
                                <?php echo esc_html($electronic_gadget_store_slider_offer_text); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-5 align-self-center text-center">
                        <?php if (!empty($electronic_gadget_store_product_btn_text1) && !empty($electronic_gadget_store_product_btn_link1)) : ?>
                            <a class="slider-btn2" href="<?php echo esc_url($electronic_gadget_store_product_btn_link1); ?>">
                                <?php echo esc_html($electronic_gadget_store_product_btn_text1); ?>
                                <span class="screen-reader-text"><?php echo esc_html($electronic_gadget_store_product_btn_text1); ?></span>
                                <i class="fas fa-arrow-right ms-3"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 col-md-5 align-self-center">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>
