<?php
/**
 * The sidebar containing the main widget area
 * @package Electronics Storefront
 */

$electronics_storefront_default = electronics_storefront_get_default_theme_options();
$post_id = get_the_ID(); // Get the post ID.

if ( is_page() ) {
    $electronics_storefront_global_sidebar_layout = esc_html( get_theme_mod( 'electronics_storefront_page_sidebar_layout', $electronics_storefront_default['electronics_storefront_global_sidebar_layout'] ) );
} elseif ( is_single() ) {
    $electronics_storefront_global_sidebar_layout = esc_html( get_theme_mod( 'electronics_storefront_post_sidebar_layout', $electronics_storefront_default['electronics_storefront_global_sidebar_layout'] ) );
} else {
    $electronics_storefront_global_sidebar_layout = esc_html( get_theme_mod( 'electronics_storefront_global_sidebar_layout', $electronics_storefront_default['electronics_storefront_global_sidebar_layout'] ) );
}

// Hide the sidebar if 'no-sidebar' is selected.
if ( !is_active_sidebar('sidebar-1') || $electronics_storefront_global_sidebar_layout === 'no-sidebar' ) {
    return;
}

$electronics_storefront_sidebar_column_class = $electronics_storefront_global_sidebar_layout === 'left-sidebar' ? 'column-order-1' : 'column-order-2';
?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $electronics_storefront_sidebar_column_class ); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>