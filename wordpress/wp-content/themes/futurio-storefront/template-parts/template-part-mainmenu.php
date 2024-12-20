<?php do_action( 'futurio_storefront_before_menu' ); ?> 
<div class="main-menu">
    <nav id="site-navigation" class="navbar navbar-default nav-pos-<?php echo esc_html( get_theme_mod( 'main_menu_float', 'left' ) ); ?>">     
        <div class="<?php echo esc_html( get_theme_mod( 'main_menu_content_width', 'container' ) ) ?>">   
			<?php if ( get_theme_mod( 'title_heading', (class_exists( 'WooCommerce' ) ? 'full' : 'boxed' ) ) == 'boxed' ) { ?>
				<div class="navbar-header">
					<div class="site-heading navbar-brand heading-menu" >
						<div class="site-branding-logo">
							<?php the_custom_logo(); ?>
						</div>
						<div class="site-branding-text">
							<?php if ( is_front_page() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>

							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								?>
								<p class="site-description">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif; ?>
						</div><!-- .site-branding-text -->
					</div>
				</div>
				<?php
			}
			if ( get_theme_mod( 'title_heading', (class_exists( 'WooCommerce' ) ? 'full' : 'boxed' ) ) == 'full' ) {
				?>
				<div class="shrink-heading"></div>
				<?php
			}
			if ( is_front_page() && has_nav_menu( 'main_menu_home' ) ) {
				$menu_loc = 'main_menu_home';
			} else {
				$menu_loc = 'main_menu';
			}
			wp_nav_menu( array(
				'theme_location'	 => $menu_loc,
				'depth'				 => 5,
				'container'			 => 'div',
				'container_id'		 => 'theme-menu',
				'container_class'	 => 'menu-container',
				'menu_class'		 => 'nav navbar-nav navbar-' . esc_html( get_theme_mod( 'main_menu_float', 'left' ) ),
				'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
				'walker'			 => new wp_bootstrap_navwalker(),
			) );
			do_action( 'futurio_storefront_menu' );
			?>
			<div class="icons-menu-right">
				<?php
				if ( get_theme_mod( 'title_heading', (class_exists( 'WooCommerce' ) ? 'full' : 'boxed' ) ) == 'boxed' ) {
					if ( function_exists( 'futurio_storefront_menu_icons_inline' ) ) {
						futurio_storefront_menu_icons_inline();
					}
				} else {
					if ( function_exists( 'futurio_storefront_menu_icons_limited' ) ) {
						futurio_storefront_menu_icons_limited();
					}
				}
				?>
			</div>
			<?php
			if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'main_menu' ) ) :
			elseif ( has_nav_menu( 'main_menu' ) || has_nav_menu( 'main_menu_home' ) ) :
				?>
				<div class="mobile-menu-button visible-xs" >
					<a href="#" id="main-menu-panel" class="toggle menu-panel open-panel" data-panel="main-menu-panel">
						<span></span>
					</a>
				</div> 
			<?php endif; ?>
        </div>
    </nav> 
</div>
<?php
do_action( 'futurio_storefront_after_menu' );
