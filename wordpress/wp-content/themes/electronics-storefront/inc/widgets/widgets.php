<?php
/**
* Widget Functions.
*
* @package Electronics Storefront
*/

function electronics_storefront_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'electronics-storefront'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'electronics-storefront'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $electronics_storefront_default = electronics_storefront_get_default_theme_options();
    $electronics_storefront_footer_column_layout = absint( get_theme_mod( 'electronics_storefront_footer_column_layout',$electronics_storefront_default['electronics_storefront_footer_column_layout'] ) );

    for( $electronics_storefront_i = 0; $electronics_storefront_i < $electronics_storefront_footer_column_layout; $electronics_storefront_i++ ){
    	
    	if( $electronics_storefront_i == 0 ){ $electronics_storefront_count = esc_html__('One','electronics-storefront'); }
    	if( $electronics_storefront_i == 1 ){ $electronics_storefront_count = esc_html__('Two','electronics-storefront'); }
    	if( $electronics_storefront_i == 2 ){ $electronics_storefront_count = esc_html__('Three','electronics-storefront'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'electronics-storefront').$electronics_storefront_count,
	        'id' => 'electronics-storefront-footer-widget-'.$electronics_storefront_i,
	        'description' => esc_html__('Add widgets here.', 'electronics-storefront'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'electronics_storefront_widgets_init');