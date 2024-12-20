<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div>
		<?php do_action('electronic_gadget_store_before_slider'); ?>
		<?php get_template_part('template-parts/home/slider'); ?>
		<?php do_action('electronic_gadget_store_after_slider'); ?>
	</div>
	<div>
		<?php get_template_part('template-parts/home/products'); ?>
		<?php do_action('electronic_gadget_store_after_products'); ?>
		<?php get_template_part('template-parts/home/home-content'); ?>
		<?php do_action('electronic_gadget_store_after_home_content'); ?>
	</div>
</main>

<?php get_footer(); ?>