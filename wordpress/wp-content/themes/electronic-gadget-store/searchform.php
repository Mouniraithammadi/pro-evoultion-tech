<?php
/**
 * Template for displaying search forms in Electronic Gadget Store
 *
 * @package Electronic Gadget Store
 * @subpackage electronic_gadget_store
 */
?>

<?php $electronic_gadget_store_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input type="search" id="<?php echo esc_attr( $electronic_gadget_store_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'electronic-gadget-store' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'electronic-gadget-store' ); ?></button>
</form>