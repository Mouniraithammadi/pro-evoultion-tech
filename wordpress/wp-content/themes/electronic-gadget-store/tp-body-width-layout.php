<?php

	$electronic_gadget_store_tp_theme_css = "";

$electronic_gadget_store_theme_lay = get_theme_mod( 'electronic_gadget_store_tp_body_layout_settings','Full');
if($electronic_gadget_store_theme_lay == 'Container'){
$electronic_gadget_store_tp_theme_css .='body{';
	$electronic_gadget_store_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$electronic_gadget_store_tp_theme_css .='}';
$electronic_gadget_store_tp_theme_css .='@media screen and (max-width:575px){';
		$electronic_gadget_store_tp_theme_css .='body{';
			$electronic_gadget_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$electronic_gadget_store_tp_theme_css .='} }';
$electronic_gadget_store_tp_theme_css .='.page-template-front-page .menubar{';
	$electronic_gadget_store_tp_theme_css .='position: static;';
$electronic_gadget_store_tp_theme_css .='}';
$electronic_gadget_store_tp_theme_css .='.scrolled{';
	$electronic_gadget_store_tp_theme_css .='width: auto; left:0; right:0;';
$electronic_gadget_store_tp_theme_css .='}';
}else if($electronic_gadget_store_theme_lay == 'Container Fluid'){
$electronic_gadget_store_tp_theme_css .='body{';
	$electronic_gadget_store_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$electronic_gadget_store_tp_theme_css .='}';
$electronic_gadget_store_tp_theme_css .='@media screen and (max-width:575px){';
		$electronic_gadget_store_tp_theme_css .='body{';
			$electronic_gadget_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$electronic_gadget_store_tp_theme_css .='} }';
$electronic_gadget_store_tp_theme_css .='.page-template-front-page .menubar{';
	$electronic_gadget_store_tp_theme_css .='width: 99%';
$electronic_gadget_store_tp_theme_css .='}';		
$electronic_gadget_store_tp_theme_css .='.scrolled{';
	$electronic_gadget_store_tp_theme_css .='width: auto; left:0; right:0;';
$electronic_gadget_store_tp_theme_css .='}';
}else if($electronic_gadget_store_theme_lay == 'Full'){
$electronic_gadget_store_tp_theme_css .='body{';
	$electronic_gadget_store_tp_theme_css .='max-width: 100%;';
$electronic_gadget_store_tp_theme_css .='}';
}

$electronic_gadget_store_scroll_position = get_theme_mod( 'electronic_gadget_store_scroll_top_position','Right');
if($electronic_gadget_store_scroll_position == 'Right'){
$electronic_gadget_store_tp_theme_css .='#return-to-top{';
    $electronic_gadget_store_tp_theme_css .='right: 20px;';
$electronic_gadget_store_tp_theme_css .='}';
}else if($electronic_gadget_store_scroll_position == 'Left'){
$electronic_gadget_store_tp_theme_css .='#return-to-top{';
    $electronic_gadget_store_tp_theme_css .='left: 20px;';
$electronic_gadget_store_tp_theme_css .='}';
}else if($electronic_gadget_store_scroll_position == 'Center'){
$electronic_gadget_store_tp_theme_css .='#return-to-top{';
    $electronic_gadget_store_tp_theme_css .='right: 50%;left: 50%;';
$electronic_gadget_store_tp_theme_css .='}';
}

    
//Social icon Font size
$electronic_gadget_store_social_icon_fontsize = get_theme_mod('electronic_gadget_store_social_icon_fontsize');
	$electronic_gadget_store_tp_theme_css .='.media-links a i{';
$electronic_gadget_store_tp_theme_css .='font-size: '.esc_attr($electronic_gadget_store_social_icon_fontsize).'px;';
$electronic_gadget_store_tp_theme_css .='}';

// site title font size option
$electronic_gadget_store_site_title_font_size = get_theme_mod('electronic_gadget_store_site_title_font_size', 30);{
$electronic_gadget_store_tp_theme_css .='.logo h1 , .logo p a{';
	$electronic_gadget_store_tp_theme_css .='font-size: '.esc_attr($electronic_gadget_store_site_title_font_size).'px;';
$electronic_gadget_store_tp_theme_css .='}';
}

//site tagline font size option
$electronic_gadget_store_site_tagline_font_size = get_theme_mod('electronic_gadget_store_site_tagline_font_size', 15);{
$electronic_gadget_store_tp_theme_css .='.logo p{';
	$electronic_gadget_store_tp_theme_css .='font-size: '.esc_attr($electronic_gadget_store_site_tagline_font_size).'px;';
$electronic_gadget_store_tp_theme_css .='}';
}

// related post
$electronic_gadget_store_related_post_mob = get_theme_mod('electronic_gadget_store_related_post_mob', true);
$electronic_gadget_store_related_post = get_theme_mod('electronic_gadget_store_remove_related_post', true);
$electronic_gadget_store_tp_theme_css .= '.related-post-block {';
if ($electronic_gadget_store_related_post == false) {
    $electronic_gadget_store_tp_theme_css .= 'display: none;';
}
$electronic_gadget_store_tp_theme_css .= '}';
$electronic_gadget_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($electronic_gadget_store_related_post == false || $electronic_gadget_store_related_post_mob == false) {
    $electronic_gadget_store_tp_theme_css .= '.related-post-block { display: none; }';
}
$electronic_gadget_store_tp_theme_css .= '}';

//return to header mobile				
$electronic_gadget_store_return_to_header_mob = get_theme_mod('electronic_gadget_store_return_to_header_mob', true);
$electronic_gadget_store_return_to_header = get_theme_mod('electronic_gadget_store_return_to_header', true);
$electronic_gadget_store_tp_theme_css .= '.return-to-header{';
if ($electronic_gadget_store_return_to_header == false) {
    $electronic_gadget_store_tp_theme_css .= 'display: none;';
}
$electronic_gadget_store_tp_theme_css .= '}';
$electronic_gadget_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($electronic_gadget_store_return_to_header == false || $electronic_gadget_store_return_to_header_mob == false) {
    $electronic_gadget_store_tp_theme_css .= '.return-to-header{ display: none; }';
}
$electronic_gadget_store_tp_theme_css .= '}';


//footer image
$electronic_gadget_store_footer_widget_image = get_theme_mod('electronic_gadget_store_footer_widget_image');
if($electronic_gadget_store_footer_widget_image != false){
$electronic_gadget_store_tp_theme_css .='#footer{';
	$electronic_gadget_store_tp_theme_css .='background: url('.esc_attr($electronic_gadget_store_footer_widget_image).');';
$electronic_gadget_store_tp_theme_css .='}';
}

// related product
$electronic_gadget_store_related_product = get_theme_mod('electronic_gadget_store_related_product',true);
if($electronic_gadget_store_related_product == false){
$electronic_gadget_store_tp_theme_css .='.related.products{';
	$electronic_gadget_store_tp_theme_css .='display: none;';
$electronic_gadget_store_tp_theme_css .='}';
}

//menu font size
$electronic_gadget_store_menu_font_size = get_theme_mod('electronic_gadget_store_menu_font_size', '');{
$electronic_gadget_store_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$electronic_gadget_store_tp_theme_css .='font-size: '.esc_attr($electronic_gadget_store_menu_font_size).'px;';
$electronic_gadget_store_tp_theme_css .='}';
}

// menu text tranform
$electronic_gadget_store_menu_text_tranform = get_theme_mod( 'electronic_gadget_store_menu_text_tranform','');
if($electronic_gadget_store_menu_text_tranform == 'Uppercase'){
$electronic_gadget_store_tp_theme_css .='.main-navigation a {';
	$electronic_gadget_store_tp_theme_css .='text-transform: uppercase;';
$electronic_gadget_store_tp_theme_css .='}';
}else if($electronic_gadget_store_menu_text_tranform == 'Lowercase'){
$electronic_gadget_store_tp_theme_css .='.main-navigation a {';
	$electronic_gadget_store_tp_theme_css .='text-transform: lowercase;';
$electronic_gadget_store_tp_theme_css .='}';
}
else if($electronic_gadget_store_menu_text_tranform == 'Capitalize'){
$electronic_gadget_store_tp_theme_css .='.main-navigation a {';
	$electronic_gadget_store_tp_theme_css .='text-transform: capitalize;';
$electronic_gadget_store_tp_theme_css .='}';
}

// patient
// Retrieve the customer review setting from the theme customization options.
$electronic_gadget_store_customer_review = get_theme_mod('electronic_gadget_store_customer_review', '');

// Check if the customer review is empty.
if (empty($electronic_gadget_store_customer_review)) {
    // Initialize the CSS variable if not already done.
    if (!isset($electronic_gadget_store_tp_theme_css)) {
        $electronic_gadget_store_tp_theme_css = '';
    }
    
    // Append the necessary CSS to remove padding, border, and border-radius when the review is empty.
    $electronic_gadget_store_tp_theme_css .= '.customzer-rating {';
    $electronic_gadget_store_tp_theme_css .= 'padding: 0; border: 0; border-radius: 0;';
    $electronic_gadget_store_tp_theme_css .= '}';
    // Append the necessary CSS to remove padding, border, and border-radius when the review is empty.
    $electronic_gadget_store_tp_theme_css .= '.half-width-border-top::before{';
    $electronic_gadget_store_tp_theme_css .= 'right:0; top:-40px;';
    $electronic_gadget_store_tp_theme_css .= '}';
}