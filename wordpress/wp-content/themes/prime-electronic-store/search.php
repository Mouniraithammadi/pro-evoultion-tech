<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package prime_electronic_store
 */

get_header(); ?>
		<div id="primary" class="content-area <?php echo ( get_theme_mod( 'prime_electronic_store_sidebar_position', 'right' ) === 'no-sidebar' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Result', 'prime-electronic-store' ) ); ?></h1>

			<?php get_search_form(); ?>
				<P class="count"> <?php printf( esc_html__( 'Search Results for "%s"', 'prime-electronic-store' ), '<span>' . get_search_query() . '</span>' ); ?></p>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div>
<?php
get_sidebar();
get_footer();