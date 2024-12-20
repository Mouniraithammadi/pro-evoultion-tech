<?php
/**
* Custom Functions.
*
* @package Electronics Storefront
*/

if( !function_exists( 'electronics_storefront_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function electronics_storefront_sanitize_sidebar_option( $electronics_storefront_input ){

        $electronics_storefront_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $electronics_storefront_input,$electronics_storefront_metabox_options ) ){

            return $electronics_storefront_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'electronics_storefront_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function electronics_storefront_sanitize_checkbox( $electronics_storefront_checked ) {

		return ( ( isset( $electronics_storefront_checked ) && true === $electronics_storefront_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'electronics_storefront_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function electronics_storefront_sanitize_select( $electronics_storefront_input, $electronics_storefront_setting ) {
        $electronics_storefront_input = sanitize_text_field( $electronics_storefront_input );
        $electronics_storefront_choices = $electronics_storefront_setting->manager->get_control( $electronics_storefront_setting->id )->choices;
        return ( array_key_exists( $electronics_storefront_input, $electronics_storefront_choices ) ? $electronics_storefront_input : $electronics_storefront_setting->default );
    }

endif;