<?php
/**
 * Template part for displaying the services section
 *
 * @package Electronic_Gadget_Store
 * @subpackage electronic_gadget_store
 */

// Get setting to determine whether to display the section
$electronic_gadget_store_aboutus = get_theme_mod('electronic_gadget_store_our_products_show_hide_section', true);

if ($electronic_gadget_store_aboutus == '1') : ?>
<section id="product-section" class="my-5 mx-md-0 mx-3">
  <div class="container-fluid">
    <div class="product-main-head">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-7 text-md-start align-self-center">
          <?php
          // Heading for the section
          $electronic_gadget_store_our_products_heading_section = get_theme_mod('electronic_gadget_store_our_products_heading_section');
          if (!empty($electronic_gadget_store_our_products_heading_section)) : ?>
            <h2 class="product-heading">
              <?php echo esc_html(apply_filters('electronic_gadget_store_topheader', $electronic_gadget_store_our_products_heading_section)); ?>
            </h2>
          <?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-5 align-self-center text-end">
          <?php
          // "View All" button
          $electronic_gadget_store_product_btn_text = get_theme_mod('electronic_gadget_store_product_section_btn_text1', __('View All', 'electronic-gadget-store'));
          $electronic_gadget_store_product_btn_link = get_theme_mod('electronic_gadget_store_product_section_btn_link1');

          if (!empty($electronic_gadget_store_product_btn_text) && !empty($electronic_gadget_store_product_btn_link)) : ?>
            <a class="pe-2 slider-btn2" href="<?php echo esc_url($electronic_gadget_store_product_btn_link); ?>">
              <?php echo esc_html($electronic_gadget_store_product_btn_text); ?>
              <span class="screen-reader-text"><?php echo esc_html($electronic_gadget_store_product_btn_text); ?></span>
              <i class="fas fa-arrow-right ms-3" aria-hidden="true"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if (class_exists('WooCommerce')) : ?>
      <div class="row">
        <?php
        // Fetch and display products from selected category
        $electronic_gadget_store_selected_category = get_theme_mod('electronic_gadget_store_our_product_product_category');
        
        if (!empty($electronic_gadget_store_selected_category)) {
          $electronic_gadget_store_args = array(
            'post_type'      => 'product',
            'posts_per_page' => 50,
            'product_cat'    => $electronic_gadget_store_selected_category,
            'order'          => 'ASC'
          );
          
          $electronic_gadget_store_loop = new WP_Query($electronic_gadget_store_args);
          
          while ($electronic_gadget_store_loop->have_posts()) : $electronic_gadget_store_loop->the_post();
            global $product;
          ?>
            <div class="col-lg-3 col-md-4 mb-3">
              <div class="product-box p-3">
                <div class="product-image">
                  <?php echo woocommerce_get_product_thumbnail(); ?>
                </div>
                <div class="product-content text-start">
                  <h3 class="my-3">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
                  </h3>
                  <div class="product-rating">
                    <?php if ($product->is_type('simple')) : ?>
                      <?php woocommerce_template_loop_rating(); ?>
                    <?php endif; ?>
                  </div>
                  <p class="mb-2 product-price">
                    <?php echo $product->get_price_html() . ' <span class="tax-inclusion">' . esc_html__('(inclusive of all taxes)', 'electronic-gadget-store') . '</span>'; ?>
                  </p>
                  <div class="cart-button">
                    <?php if ($product->is_type('simple')) : ?>
                      <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                         class="button add_to_cart_button"
                         data-quantity="1"
                         data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                         data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                         aria-label="<?php echo esc_attr($product->add_to_cart_text()); ?>"
                         rel="nofollow">
                          <?php echo esc_html($product->add_to_cart_text()); ?>
                          <i class="fas fa-shopping-cart ps-2" aria-hidden="true"></i>
                      </a>
                    <?php endif; ?>
                  </div>
                  <div class="shop-now-button my-2">
                    <?php if ($product->is_type('simple')) : ?>
                      <a href="<?php echo esc_url(add_query_arg('add-to-cart', $product->get_id(), wc_get_cart_url())); ?>"
                         class="button shop_now_button"
                         data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                         aria-label="<?php echo esc_attr($product->add_to_cart_text()); ?>"
                         rel="nofollow">
                          <?php echo esc_html__('Shop Now', 'electronic-gadget-store'); ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php
          endwhile;
          wp_reset_postdata();
        }
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>