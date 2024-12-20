<?php
/**
 * The template for displaying the footer
 * @package Electronics Storefront
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked electronics_storefront_content_offcanvas - 30
*/

do_action('electronics_storefront_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked electronics_storefront_footer_content_widget - 10
     * @hooked electronics_storefront_footer_content_info - 20
    */

    do_action('electronics_storefront_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>