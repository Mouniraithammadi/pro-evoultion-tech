<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$electronic_gadget_store_number_of_footer_columns = get_theme_mod('electronic_gadget_store_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$electronic_gadget_store_col_lg_footer_class = 'col-lg-' . (12 / $electronic_gadget_store_number_of_footer_columns);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$electronic_gadget_store_col_md_footer_class = 'col-md-' . (12 / $electronic_gadget_store_number_of_footer_columns);
?>
<div class="container">
    <aside class="widget-area row" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'electronic-gadget-store' ); ?>">
        <div class="<?php echo esc_attr($electronic_gadget_store_col_lg_footer_class); ?> <?php echo esc_attr($electronic_gadget_store_col_md_footer_class); ?>">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <?php
        // Footer boxes 2 and onwards.
        for ($electronic_gadget_store_i = 2; $electronic_gadget_store_i <= $electronic_gadget_store_number_of_footer_columns; $electronic_gadget_store_i++) :
            if ($electronic_gadget_store_i <= $electronic_gadget_store_number_of_footer_columns) :
                ?>
               <div class="col-12 <?php echo esc_attr($electronic_gadget_store_col_lg_footer_class); ?> <?php echo esc_attr($electronic_gadget_store_col_md_footer_class); ?>">
                    <?php dynamic_sidebar('footer-' . $electronic_gadget_store_i); ?>
                </div><!-- .footer-one-box -->
                <?php
            endif;
        endfor;
        ?>
    </aside>
</div>