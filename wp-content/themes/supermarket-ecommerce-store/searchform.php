<?php
/**
 * The template for displaying search form.
 *
 * @package     Supermarket Ecommerce Store
 * @since       0.1
 */
?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e('Search for:','supermarket-ecommerce-store'); ?></label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr('Search Products','supermarket-ecommerce-store'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr('Search for:','supermarket-ecommerce-store'); ?>" />
	<input type="submit" value="<?php echo esc_attr('Search','supermarket-ecommerce-store'); ?>" />
	<i class="fa fa-search" aria-hidden="true"></i>
	<input type="hidden" name="post_type" value="product" />
</form>