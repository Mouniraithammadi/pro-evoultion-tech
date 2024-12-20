<?php
if ( get_theme_mod( 'title_heading', (class_exists( 'WooCommerce' ) ? 'full' : 'boxed' ) ) == 'full' ) {
	$sortable_layout = maybe_unserialize( get_theme_mod( 'header_layout', array( 'heading', 'search', 'woo_cart', 'woo_account' ) ) );
	?>
	<div class="site-header container-fluid">
		<div class="container" >
			<div class="heading-row" >
				<?php
				if ( !empty( $sortable_layout ) ) :
					foreach ( $sortable_layout as $checked_layout ) :
						switch ( $checked_layout ) {
							case 'heading' :
								if ( function_exists( 'futurio_storefront_header_logo_title' ) ) {
									futurio_storefront_header_logo_title();
								}
								break;
							case 'search' :
								if ( function_exists( 'futurio_storefront_header_search_area' ) ) {
									futurio_storefront_header_search_area();
								}
								break;
							case 'woo_cart' :
								if ( function_exists( 'futurio_storefront_header_cart' ) && class_exists( 'WooCommerce' ) ) {
									futurio_storefront_header_cart();
								}
								break;
							case 'woo_account' :
								if ( function_exists( 'futurio_storefront_my_account' ) && class_exists( 'WooCommerce' ) ) {
									futurio_storefront_my_account();
								}
								break;
								$i++;
						}
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
<?php } ?>