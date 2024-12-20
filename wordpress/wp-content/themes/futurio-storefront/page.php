<?php
get_header();
futurio_storefront_generate_header( true, true, true, true, true, true );
?>

<!-- start content container -->
<div class="row">
    <article class="col-md-<?php futurio_storefront_main_content_width_columns(); ?> <?php futurio_storefront_sidebar_position( 'content' ) ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                          
				<div <?php post_class(); ?>>
					<?php
					if ( get_theme_mod( 'single_title_position', 'full' ) == 'inside' ) {
						if ( futurio_storefront_get_meta( 'disable_title' ) != 'disable' ) {
							?>
							<header>                              
								<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
								<time class="posted-on published" datetime="<?php the_time( 'Y-m-d' ); ?>"></time>                                                        
							</header>
							<?php
						}
					}
					if ( get_theme_mod( 'single_featured_image', 'full' ) == 'inside' ) {
						if ( futurio_storefront_get_meta( 'disable_featured_image' ) != 'disable' ) {
							futurio_storefront_thumb_img( 'futurio-storefront-single', '', false );
						}
					}
					?>
					<div class="futurio-content main-content-page">                            
						<div class="single-entry-summary">                              
							<?php
							do_action( 'futurio_storefront_before_content' );
							the_content();
							do_action( 'futurio_storefront_after_content' );
							?>
						</div>                               
						<?php
						wp_link_pages();
						comments_template();
						?>
					</div>
				</div>        
				<?php
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>    
    </article>       
	<?php
	if ( futurio_storefront_get_meta( 'sidebar' ) != 'no_sidebar' ) {
		if ( is_active_sidebar( 'futurio-storefront-sidebar' ) ) {
			get_sidebar();
		}
	}
	?>
</div>
<!-- end content container -->

<?php
get_footer();
