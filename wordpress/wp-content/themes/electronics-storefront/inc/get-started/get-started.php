<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function electronics_storefront_menu()
{
  add_theme_page(__('Omega Options', 'electronics-storefront'), __('Omega Options', 'electronics-storefront'), 'edit_theme_options', 'electronics-storefront-theme', 'electronics_storefront_page');
}
add_action('admin_menu', 'electronics_storefront_menu');


// Add Getstart admin notice
function electronics_storefront_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'electronics_storefront_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_electronics-storefront-theme' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Thank You for installing Electronics Storefront Theme!', 'electronics-storefront') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=electronics-storefront-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'electronics-storefront'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(ELECTRONICS_STOREFRONT_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'electronics-storefront'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(ELECTRONICS_STOREFRONT_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'electronics-storefront'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(ELECTRONICS_STOREFRONT_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'electronics-storefront'); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?electronics_storefront_admin_notice=1"><?php esc_html_e( 'Dismiss', 'electronics-storefront' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'electronics_storefront_admin_notice' );

if ( ! function_exists( 'electronics_storefront_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function electronics_storefront_update_admin_notice() {
    if ( isset( $_GET['electronics_storefront_admin_notice'] ) && $_GET['electronics_storefront_admin_notice'] == '1' ) {
        update_option( 'electronics_storefront_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'electronics_storefront_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'electronics_storefront_getstart_setup_options' );
function electronics_storefront_getstart_setup_options() {
    update_option( 'electronics_storefront_admin_notice', false );
}

/**
 * Enqueue styles for the help page.
 */
function electronics_storefront_admin_scripts($hook)
{
	wp_enqueue_style('electronics-storefront-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'electronics_storefront_admin_scripts');

/**
 * Add the theme page
 */
function electronics_storefront_page(){
$electronics_storefront_user = wp_get_current_user();
$electronics_storefront_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="electronics-storefront-panel header">
    <div class="electronics-storefront-logo">
      <span></span>
      <h2><?php echo esc_html( $electronics_storefront_theme ); ?></h2>
    </div>
    <p>
      <?php
            $electronics_storefront_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $electronics_storefront_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'electronics-storefront'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="electronics-storefront-panel">
        <div class="electronics-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'electronics-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( ELECTRONICS_STOREFRONT_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'electronics-storefront'); ?></a>
        </div>
      </div>
      <div class="electronics-storefront-panel">
        <div class="electronics-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'electronics-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( ELECTRONICS_STOREFRONT_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'electronics-storefront'); ?></a>
        </div>
      </div>
       <div class="electronics-storefront-panel"><div class="electronics-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'electronics-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( ELECTRONICS_STOREFRONT_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'electronics-storefront'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p><strong><?php esc_html_e('Premium Features Include:', 'electronics-storefront'); ?></strong></p>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'electronics-storefront'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'electronics-storefront'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'electronics-storefront'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'electronics-storefront'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( ELECTRONICS_STOREFRONT_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'electronics-storefront'); ?></a>
        </div>
      </div>
      <div class="electronics-storefront-panel">
        <div class="electronics-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'electronics-storefront'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( ELECTRONICS_STOREFRONT_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'electronics-storefront'); ?></a>
        </div>
        <div class="electronics-storefront-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'electronics-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( ELECTRONICS_STOREFRONT_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'electronics-storefront'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}