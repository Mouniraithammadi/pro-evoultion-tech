<?php if ( is_active_sidebar( 'futurio-storefront-woo-right-sidebar' ) || ( ( ( function_exists( 'is_shop' ) && is_shop() ) || is_product_tag() || is_product_category() ) && is_active_sidebar( 'futurio-storefront-woo-archive-sidebar' ) ) ) { ?>
	<aside id="sidebar" class="col-md-<?php echo absint( get_theme_mod( 'sidebar_size', '3' ) ) ?> <?php futurio_storefront_sidebar_position( 'sidebar-woo' ) ?>">
		<?php
		if ( ( ( function_exists( 'is_shop' ) && is_shop() ) || is_product_tag() || is_product_category() ) && is_active_sidebar( 'futurio-storefront-woo-archive-sidebar' ) ) {
			dynamic_sidebar( 'futurio-storefront-woo-archive-sidebar' );
		} else {
			dynamic_sidebar( 'futurio-storefront-woo-right-sidebar' );
		}
		?>
	</aside>
<?php } ?>
