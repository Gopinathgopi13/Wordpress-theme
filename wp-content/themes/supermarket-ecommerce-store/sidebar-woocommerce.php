<?php
/**
 * side bar template
 *
 * @package Supermarket Ecommerce Store
 */
?>
<?php if ( ! is_active_sidebar( 'supermarket-ecommerce-store-woocommerce-sidebar' ) ) {	return; } ?>
<div class="col-lg-3 pl-lg-3 my-5 order-0">
	<div class="sidebar">
		<?php dynamic_sidebar('supermarket-ecommerce-store-woocommerce-sidebar'); ?>
	</div>
</div>