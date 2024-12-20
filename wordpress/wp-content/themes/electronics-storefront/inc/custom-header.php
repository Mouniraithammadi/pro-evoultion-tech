<?php
/**
 * Sample implementation of the Custom Header feature
 * @package Electronics Storefront
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses electronics_storefront_header_style()
 */
function electronics_storefront_custom_header_setup()
{
    add_theme_support('custom-header',
        apply_filters('electronics_storefront_custom_header_args', array(
            'default-image' => '',
            'default-text-color' => '000000',
            'width' => 1920,
            'height' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'wp-head-callback' => 'electronics_storefront_header_style',
        )));
}

add_action('after_setup_theme', 'electronics_storefront_custom_header_setup');

if (!function_exists('electronics_storefront_header_style')) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see electronics_storefront_custom_header_setup().
     */
    function electronics_storefront_header_style()
    {
        $electronics_storefront_header_text_color = get_header_textcolor();

        if (get_theme_support('custom-header', 'default-text-color') === $electronics_storefront_header_text_color) {
            return;
        }

        ?>
        <style type="text/css">
            <?php
                if ( 'blank' == $electronics_storefront_header_text_color ) :
            ?>
            .header-titles .custom-logo-name,
            .site-description {
                display: none;
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php
                else :
            ?>
            .header-titles .custom-logo-name:not(:hover):not(:focus),
            .site-description {
                color: #<?php echo esc_attr( $electronics_storefront_header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;