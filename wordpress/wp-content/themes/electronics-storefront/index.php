<?php
/**
 * The main template file
 * @package Electronics Storefront
 * @since 1.0.0
 */

get_header();
$electronics_storefront_default = electronics_storefront_get_default_theme_options();
$electronics_storefront_global_sidebar_layout = esc_html( get_theme_mod( 'electronics_storefront_global_sidebar_layout',$electronics_storefront_default['electronics_storefront_global_sidebar_layout'] ) );
$electronics_storefront_sidebar_column_class = 'column-order-2';
if ($electronics_storefront_global_sidebar_layout == 'right-sidebar') {
    $electronics_storefront_sidebar_column_class = 'column-order-1';
}

global $electronics_storefront_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($electronics_storefront_sidebar_column_class) ; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            electronics_storefront_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('electronics_storefront_posts_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();