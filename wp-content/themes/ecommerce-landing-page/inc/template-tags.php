<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Ecommerce Landing Page 
 */

if ( ! function_exists( 'ecommerce_landing_page_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function ecommerce_landing_page_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'ecommerce_landing_page_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function ecommerce_landing_page_categorized_blog() {
	if ( false === ( $ecommerce_landing_page_all_the_cool_cats = get_transient( 'ecommerce_landing_page_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$ecommerce_landing_page_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$ecommerce_landing_page_all_the_cool_cats = count( $ecommerce_landing_page_all_the_cool_cats );

		set_transient( 'ecommerce_landing_page_all_the_cool_cats', $ecommerce_landing_page_all_the_cool_cats );
	}

	if ( '1' != $ecommerce_landing_page_all_the_cool_cats ) {
		// This blog has more than 1 category so ecommerce_landing_page_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so ecommerce_landing_page_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'ecommerce_landing_page_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since ecommerce-landing-page
 */
function ecommerce_landing_page_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in ecommerce_landing_page_categorized_blog
 */
function ecommerce_landing_page_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'ecommerce_landing_page_all_the_cool_cats' );
}
add_action( 'edit_category', 'ecommerce_landing_page_category_transient_flusher' );
add_action( 'save_post',     'ecommerce_landing_page_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'ecommerce_landing_page_my_admin_bar_css') );
function ecommerce_landing_page_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}
/**
 * Posts pagination.
 */
if ( ! function_exists( 'ecommerce_landing_page_blog_posts_pagination' ) ) {
	function ecommerce_landing_page_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'ecommerce_landing_page_blog_pagination_type', 'blog-page-numbers' );
		if ( $pagination_type == 'blog-page-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}


/*-- Custom metafield for product--*/
function ecommerce_landing_page_custom_job_field() {
  	add_meta_box( 'bn_meta', __( 'Ecommerce Landing Page Meta Fields', 'ecommerce-landing-page' ), 'ecommerce_landing_page_meta_technology_callback', 'product', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'ecommerce_landing_page_custom_job_field');
}

function ecommerce_landing_page_meta_technology_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'ecommerce_landing_page_technology_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$ecommerce_landing_page_review = get_post_meta( $post->ID, 'ecommerce_landing_page_review', true );
  	$ecommerce_landing_page_review_count = get_post_meta( $post->ID, 'ecommerce_landing_page_review_count', true );
  	$ecommerce_landing_page_save = get_post_meta( $post->ID, 'ecommerce_landing_page_save', true );
  	$ecommerce_landing_page_orignal_price = get_post_meta( $post->ID, 'ecommerce_landing_page_orignal_price', true );
  	?>

  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
	      		<tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Review Text :', 'ecommerce-landing-page' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="ecommerce_landing_page_review" id="ecommerce_landing_page_review" value="<?php echo esc_attr($ecommerce_landing_page_review); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Review Count :', 'ecommerce-landing-page' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="ecommerce_landing_page_review_count" id="ecommerce_landing_page_review_count" value="<?php echo esc_attr($ecommerce_landing_page_review_count); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Discount Text :', 'ecommerce-landing-page' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="ecommerce_landing_page_save" id="ecommerce_landing_page_save" value="<?php echo esc_attr($ecommerce_landing_page_save); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Orignal Price Text:', 'ecommerce-landing-page' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="ecommerce_landing_page_orignal_price" id="ecommerce_landing_page_orignal_price" value="<?php echo esc_attr($ecommerce_landing_page_orignal_price); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function ecommerce_landing_page_save( $post_id ) {
  	if (!isset($_POST['ecommerce_landing_page_technology_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['ecommerce_landing_page_technology_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'ecommerce_landing_page_review' ] ) ) {
    	update_post_meta( $post_id, 'ecommerce_landing_page_review', strip_tags( wp_unslash( $_POST[ 'ecommerce_landing_page_review' ]) ) );
  	}
  	if( isset( $_POST[ 'ecommerce_landing_page_review_count' ] ) ) {
    	update_post_meta( $post_id, 'ecommerce_landing_page_review_count', strip_tags( wp_unslash( $_POST[ 'ecommerce_landing_page_review_count' ]) ) );
  	}
  	if( isset( $_POST[ 'ecommerce_landing_page_save' ] ) ) {
    	update_post_meta( $post_id, 'ecommerce_landing_page_save', strip_tags( wp_unslash( $_POST[ 'ecommerce_landing_page_save' ]) ) );
  	}
  	if( isset( $_POST[ 'ecommerce_landing_page_orignal_price' ] ) ) {
    	update_post_meta( $post_id, 'ecommerce_landing_page_orignal_price', strip_tags( wp_unslash( $_POST[ 'ecommerce_landing_page_orignal_price' ]) ) );
  	}
}
add_action( 'save_post', 'ecommerce_landing_page_save' );