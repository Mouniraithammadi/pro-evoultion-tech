<?php
/**
 * Custom Functions
 * @package Electronics Storefront
 * @since 1.0.0
 */

if( !function_exists('electronics_storefront_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $electronics_storefront_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $electronics_storefront_echo Echo or return the HTML.
     *
     * @return string $electronics_storefront_html Compiled HTML based on our arguments.
     */
    function electronics_storefront_site_logo( $electronics_storefront_args = array(), $electronics_storefront_echo = true ){
        $electronics_storefront_logo = get_custom_logo();
        $electronics_storefront_site_title = get_bloginfo('name');
        $electronics_storefront_contents = '';
        $electronics_storefront_classname = '';
        $electronics_storefront_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $electronics_storefront_args = wp_parse_args($electronics_storefront_args, $electronics_storefront_defaults);
        /**
         * Filters the arguments for `electronics_storefront_site_logo()`.
         *
         * @param array $electronics_storefront_args Parsed arguments.
         * @param array $electronics_storefront_defaults Function's default arguments.
         */
        $electronics_storefront_args = apply_filters('electronics_storefront_site_logo_args', $electronics_storefront_args, $electronics_storefront_defaults);
        if ( has_custom_logo() ) {
            $electronics_storefront_contents = sprintf($electronics_storefront_args['logo'], $electronics_storefront_logo, esc_html($electronics_storefront_site_title));
            $electronics_storefront_contents .= sprintf($electronics_storefront_args['title'], esc_url( get_home_url(null, '/') ), esc_html($electronics_storefront_site_title));
            $electronics_storefront_classname = $electronics_storefront_args['logo_class'];
        } else {
            $electronics_storefront_contents = sprintf($electronics_storefront_args['title'], esc_url( get_home_url(null, '/') ), esc_html($electronics_storefront_site_title));
            $electronics_storefront_classname = $electronics_storefront_args['title_class'];
        }
        $electronics_storefront_wrap = $electronics_storefront_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $electronics_storefront_wrap = 'home_wrap';
        $electronics_storefront_html = sprintf($electronics_storefront_args[$electronics_storefront_wrap], $electronics_storefront_classname, $electronics_storefront_contents);
        /**
         * Filters the arguments for `electronics_storefront_site_logo()`.
         *
         * @param string $electronics_storefront_html Compiled html based on our arguments.
         * @param array $electronics_storefront_args Parsed arguments.
         * @param string $electronics_storefront_classname Class name based on current view, home or single.
         * @param string $electronics_storefront_contents HTML for site title or logo.
         */
        $electronics_storefront_html = apply_filters('electronics_storefront_site_logo', $electronics_storefront_html, $electronics_storefront_args, $electronics_storefront_classname, $electronics_storefront_contents);
        if (!$electronics_storefront_echo) {
            return $electronics_storefront_html;
        }
        echo $electronics_storefront_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('electronics_storefront_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $electronics_storefront_echo Echo or return the html.
     *
     * @return string $electronics_storefront_html The HTML to display.
     */
    function electronics_storefront_site_description($electronics_storefront_echo = true){

        if ( get_theme_mod('electronics_storefront_display_header_text', false) == true ) :
        $electronics_storefront_description = get_bloginfo('description');
        if (!$electronics_storefront_description) {
            return;
        }
        $electronics_storefront_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $electronics_storefront_html = sprintf($electronics_storefront_wrapper, esc_html($electronics_storefront_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $electronics_storefront_html The HTML to display.
         * @param string $electronics_storefront_description Site description via `bloginfo()`.
         * @param string $electronics_storefront_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $electronics_storefront_html = apply_filters('electronics_storefront_site_description', $electronics_storefront_html, $electronics_storefront_description, $electronics_storefront_wrapper);
        if (!$electronics_storefront_echo) {
            return $electronics_storefront_html;
        }
        echo $electronics_storefront_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('electronics_storefront_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function electronics_storefront_posted_on( $electronics_storefront_icon = true, $electronics_storefront_animation_class = '' ){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        $electronics_storefront_post_date = absint( get_theme_mod( 'electronics_storefront_post_date',$electronics_storefront_default['electronics_storefront_post_date'] ) );

        if( $electronics_storefront_post_date ){

            $electronics_storefront_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $electronics_storefront_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $electronics_storefront_time_string = sprintf($electronics_storefront_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $electronics_storefront_year = get_the_date('Y');
            $electronics_storefront_month = get_the_date('m');
            $electronics_storefront_day = get_the_date('d');
            $electronics_storefront_link = get_day_link($electronics_storefront_year, $electronics_storefront_month, $electronics_storefront_day);

            $electronics_storefront_posted_on = '<a href="' . esc_url($electronics_storefront_link) . '" rel="bookmark">' . $electronics_storefront_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $electronics_storefront_animation_class ).'">';

            if( $electronics_storefront_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                electronics_storefront_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $electronics_storefront_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('electronics_storefront_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function electronics_storefront_posted_by( $electronics_storefront_icon = true, $electronics_storefront_animation_class = '' ){   

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        $electronics_storefront_post_author = absint( get_theme_mod( 'electronics_storefront_post_author',$electronics_storefront_default['electronics_storefront_post_author'] ) );

        if( $electronics_storefront_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $electronics_storefront_animation_class ).'">';

            if( $electronics_storefront_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                electronics_storefront_the_theme_svg('user');
                echo '</span>';
                
            }

            $electronics_storefront_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $electronics_storefront_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('electronics_storefront_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function electronics_storefront_posted_by_avatar( $electronics_storefront_date = false ){

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        $electronics_storefront_post_author = absint( get_theme_mod( 'electronics_storefront_post_author',$electronics_storefront_default['electronics_storefront_post_author'] ) );

        if( $electronics_storefront_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $electronics_storefront_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $electronics_storefront_byline . '</div>';

            if( $electronics_storefront_date ){
                electronics_storefront_posted_on($electronics_storefront_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('electronics_storefront_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function electronics_storefront_entry_footer( $electronics_storefront_cats = true, $electronics_storefront_tags = true, $electronics_storefront_edits = true){   

        $electronics_storefront_default = electronics_storefront_get_default_theme_options();
        $electronics_storefront_post_category = absint( get_theme_mod( 'electronics_storefront_post_category',$electronics_storefront_default['electronics_storefront_post_category'] ) );
        $electronics_storefront_post_tags = absint( get_theme_mod( 'electronics_storefront_post_tags',$electronics_storefront_default['electronics_storefront_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $electronics_storefront_cats && $electronics_storefront_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $electronics_storefront_categories = get_the_category();
                if ($electronics_storefront_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $electronics_storefront_categories as $electronics_storefront_category ){

                        $electronics_storefront_cat_name = $electronics_storefront_category->name;
                        $electronics_storefront_cat_slug = $electronics_storefront_category->slug;
                        $electronics_storefront_cat_url = get_category_link( $electronics_storefront_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $electronics_storefront_cat_slug ); ?>" href="<?php echo esc_url( $electronics_storefront_cat_url ); ?>" rel="category tag"><?php echo esc_html( $electronics_storefront_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $electronics_storefront_tags && $electronics_storefront_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $electronics_storefront_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'electronics-storefront'));
                if( $electronics_storefront_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($electronics_storefront_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $electronics_storefront_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'electronics-storefront'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('electronics_storefront_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function electronics_storefront_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $electronics_storefront_default_image = get_template_directory_uri() . '/assets/images/product2.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $electronics_storefront_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $electronics_storefront_featured_image = isset($electronics_storefront_featured_image[0]) ? $electronics_storefront_featured_image[0] : '';

                // Check if there's a featured image
                if ($electronics_storefront_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($electronics_storefront_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('electronics_storefront_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $electronics_storefront_comment Comment data.
     *
     * @return bool
     */
    function electronics_storefront_is_comment_by_post_author($electronics_storefront_comment = null){

        if (is_object($electronics_storefront_comment) && $electronics_storefront_comment->user_id > 0) {
            $electronics_storefront_user = get_userdata($electronics_storefront_comment->user_id);
            $post = get_post($electronics_storefront_comment->comment_post_ID);
            if (!empty($electronics_storefront_user) && !empty($post)) {
                return $electronics_storefront_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('electronics_storefront_breadcrumb') ) :

    /**
     * Electronics Storefront Breadcrumb
     */
    function electronics_storefront_breadcrumb($electronics_storefront_comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;