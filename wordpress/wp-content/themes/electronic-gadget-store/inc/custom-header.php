<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

function electronic_gadget_store_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'electronic_gadget_store_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'electronic_gadget_store_header_style',
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header_img.png' ),
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header_img.png',
			'thumbnail_url' => '%s/assets/images/header_img.png',
			'description'   => __( 'Default Header Image', 'electronic-gadget-store' ),
		),
	) );
}
add_action( 'after_setup_theme', 'electronic_gadget_store_custom_header_setup' );

if ( ! function_exists( 'electronic_gadget_store_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'electronic_gadget_store_header_style' );
function electronic_gadget_store_header_style() {
    if ( get_header_image() ) :
    $electronic_gadget_store_custom_css = "
        .header-img, .external-div .box-image img, .single-page-img {
            background-image: url('".esc_url(get_header_image())."') !important;
            background-position: center top !important;
            height: 350px;
            background-size: cover !important;
            display: block;
        }
        .single-page-img, .external-div .box-image img, .single-page-img {
            background-image: url('".esc_url(get_header_image())."') !important;
            background-position: center top !important;
            background-size: cover !important;
            height: 350px;
            object-fit: cover;
        }
        @media (max-width: 1000px) {
            .header-img,
            .single-page-img, .external-div .box-image img{
                height: 200px;
            }
        }";
        wp_add_inline_style( 'electronic-gadget-store-style', $electronic_gadget_store_custom_css );
    endif;
}
endif;
