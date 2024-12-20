<?php
/**
 * The template for displaying all single posts
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

get_header(); ?>
	<?php $electronic_gadget_store_static_image= get_stylesheet_directory_uri() . '/assets/images/header_img.png'; ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="external-div">
	       
		</div>
	<?php endwhile; ?>
	<main id="tp_content" role="main">
		<div class="container">
			<div id="primary" class="content-area">
				<?php
		        $electronic_gadget_store_sidebar_single_post_layout = get_theme_mod( 'electronic_gadget_store_sidebar_single_post_layout','right');
		        if($electronic_gadget_store_sidebar_single_post_layout == 'left'){ ?>
			        <div class="row">
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			          	<div class="col-lg-8 col-md-8 singlepage-main">
			           		<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post');	?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'electronic-gadget-store' ),
							                  	'next_text'          => __( 'Next page', 'electronic-gadget-store' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'electronic-gadget-store' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			        </div>
			        <div class="clearfix"></div>
			    <?php }else if($electronic_gadget_store_sidebar_single_post_layout == 'right'){ ?>
			        <div class="row">
			          	<div class="col-lg-8 col-md-8 singlepage-main">	           
				            <?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post'); ?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'electronic-gadget-store' ),
							                  	'next_text'          => __( 'Next page', 'electronic-gadget-store' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'electronic-gadget-store' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			        </div>
			    <?php }else if($electronic_gadget_store_sidebar_single_post_layout == 'full'){ ?>
			        <div class="full">
			           <?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/single-post'); ?>

								<div class="navigation">
						          	<?php
						              	// Previous/next page navigation.
						              	the_posts_pagination( array(
						                  	'prev_text'          => __( 'Previous page', 'electronic-gadget-store' ),
						                  	'next_text'          => __( 'Next page', 'electronic-gadget-store' ),
						                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'electronic-gadget-store' ) . ' </span>',
						              	) );
						          	?>
						        </div>

							<?php endwhile; // End of the loop.
						?>
		          	</div>
			    <?php }else {?>
			    	<div class="row">
			          	<div class="col-lg-8 col-md-8 singlepage-main">	           
				            <?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post'); ?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'electronic-gadget-store' ),
							                  	'next_text'          => __( 'Next page', 'electronic-gadget-store' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'electronic-gadget-store' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			        </div>
			    <?php } ?>
			</div>
	   </div>
	</main>

<?php get_footer();