<?php

/**
 * Plugin Name: StoreCustomizer
 * Version: 2.5.8
 * Plugin URI: https://kairaweb.com/wordpress-plugins/woocustomizer/
 * Description: A store editor plugin for editing all WooCommerce store and product pages, cart, checkout and user account pages, all within the WordPress Customizer
 * Author: Kaira
 * Author URI: https://kairaweb.com/
 * Requires at least: 5.0
 * Tested up to: 6.6
 * WC requires at least: 3.2
 * WC tested up to: 9.4
 * Text Domain: woocustomizer
 * Domain Path: /lang/
 * 
 *
 * @package WordPress
 * @author Kaira
 * @since 1.0.0
 */
define( 'WCD_PLUGIN_VERSION', '2.5.8' );
define( 'WCD_PLUGIN_URL', plugins_url( '', __FILE__ ) );
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'wcz_fs' ) ) {
    wcz_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'wcz_fs' ) ) {
        // Create a helper function for easy SDK access.
        function wcz_fs() {
            global $wcz_fs;
            if ( !isset( $wcz_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $wcz_fs = fs_dynamic_init( array(
                    'id'              => '4668',
                    'slug'            => 'woocustomizer',
                    'premium_slug'    => 'woocustomizer-pro',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_b12a9cb6205ed1d8256a177af56b4',
                    'is_premium'      => false,
                    'premium_suffix'  => 'Pro',
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                        'days'               => 14,
                        'is_require_payment' => true,
                    ),
                    'has_affiliation' => 'selected',
                    'menu'            => array(
                        'slug'        => 'wcz_settings',
                        'contact'     => false,
                        'support'     => false,
                        'affiliation' => false,
                        'parent'      => array(
                            'slug' => 'woocommerce',
                        ),
                    ),
                    'is_live'         => true,
                ) );
            }
            return $wcz_fs;
        }

        // Init Freemius.
        wcz_fs();
        // Signal that SDK was initiated.
        do_action( 'wcz_fs_loaded' );
    }
    // Load plugin class files.
    require_once 'includes/class-wcz.php';
    require_once 'includes/class-wcz-settings.php';
    // Load plugin libraries.
    require_once 'includes/class-wcz-admin-api.php';
    // Load Customizer Library files.
    require_once 'includes/customizer/customizer-options.php';
    require_once 'includes/customizer/customizer-library/customizer-library.php';
    require_once 'includes/customizer/styles.php';
    if ( WooCustomizer::wcz_is_plugin_active( 'woocommerce.php' ) ) {
        require_once 'includes/inc/woocommerce.php';
        // Declare Compatibility for HPOS
        add_action( 'before_woocommerce_init', function () {
            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
            }
        } );
    }
    // Excluded from Pro Version
    if ( !WooCustomizer::wcz_is_plugin_active( 'woocommerce.php' ) ) {
        // Admin notice for if WooCommerce is not active
        function wcz_no_woocommerce_notice() {
            ?>
            <div class="error">
                <p><?php 
            esc_html_e( 'StoreCustomizer requires the WooCommerce plugin to be active to work', 'woocustomizer' );
            ?></p>
            </div><?php 
        }

        add_action( 'admin_notices', 'wcz_no_woocommerce_notice' );
        return;
    }
    /**
     * Function to delete all StoreCustomizer data IF set
     */
    function wcz_fs_uninstall_cleanup(  $section  ) {
        global $wpdb;
        // Delete all data if setting to delete data is checked
        if ( 'on' == get_option( 'wcz_set_data_to_delete' ) ) {
            // Delete all Linkt db options.
            $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'wcz_%';" );
            $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'wcz-%';" );
            // Clear any cached data that has been removed.
            wp_cache_flush();
        }
    }

    if ( 'on' == get_option( 'wcz_set_data_to_delete' ) ) {
        wcz_fs()->add_action( 'after_uninstall', 'wcz_fs_uninstall_cleanup' );
    }
    /**
     * Returns the main instance of WooCustomizer to prevent the need to use globals.
     *
     * @since  1.0.0
     * @return object WooCustomizer
     */
    function woocustomizer() {
        $instance = WooCustomizer::instance( __FILE__, WCD_PLUGIN_VERSION );
        if ( is_null( $instance->settings ) ) {
            $instance->settings = WooCustomizer_Settings::instance( $instance );
        }
        return $instance;
    }

    woocustomizer();
}