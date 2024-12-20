<aside id="sidebar" class="col-md-<?php echo absint( get_theme_mod( 'sidebar_size', '3' ) ) ?> <?php futurio_storefront_sidebar_position( 'sidebar' ) ?>">
	<?php
	if ( ( is_archive() || is_search() || is_home() ) && is_active_sidebar( 'futurio-storefront-archive-sidebar' ) ) {
		dynamic_sidebar( 'futurio-storefront-archive-sidebar' );
	} else {
		dynamic_sidebar( 'futurio-storefront-sidebar' );
	}
	?>
</aside>
