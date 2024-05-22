<?php
/**
 * Custom About us Widget
 */

class Ecommerce_Landing_Page_About_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Ecommerce_Landing_Page_About_Widget',
			__('VW About us', 'ecommerce-landing-page'),
			array( 'description' => __( 'Widget for about us section in sidebar', 'ecommerce-landing-page' ), ) 
		);
	}
	
	public function widget( $ecommerce_landing_page_args, $ecommerce_landing_page_instance ) {
		?>
		<aside class="widget">
			<?php
			$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
			$ecommerce_landing_page_author = isset( $ecommerce_landing_page_instance['author'] ) ? $ecommerce_landing_page_instance['author'] : '';
			$ecommerce_landing_page_designation = isset( $ecommerce_landing_page_instance['designation'] ) ? $ecommerce_landing_page_instance['designation'] : '';
			$ecommerce_landing_page_description = isset( $ecommerce_landing_page_instance['description'] ) ? $ecommerce_landing_page_instance['description'] : '';
			$ecommerce_landing_page_read_more_url = isset( $ecommerce_landing_page_instance['read_more_url'] ) ? $ecommerce_landing_page_instance['read_more_url'] : '';
			$ecommerce_landing_page_read_more_text = isset( $ecommerce_landing_page_instance['read_more_text'] ) ? $ecommerce_landing_page_instance['read_more_text'] : '';
			$ecommerce_landing_page_upload_image = isset( $ecommerce_landing_page_instance['upload_image'] ) ? $ecommerce_landing_page_instance['upload_image'] : '';

	        echo '<div class="custom-about-us">';
	        if(!empty($ecommerce_landing_page_title) ){ ?><h3 class="custom_title"><?php echo esc_html($ecommerce_landing_page_title); ?></h3><?php } ?>
		        <?php if($ecommerce_landing_page_upload_image): ?>
	      			<img src="<?php echo esc_url($ecommerce_landing_page_upload_image); ?>" alt="">
				<?php endif; ?>
				<?php if(!empty($ecommerce_landing_page_author) ){ ?><p class="custom_author"><?php echo esc_html($ecommerce_landing_page_author); ?></p><?php } ?>
				<?php if(!empty($ecommerce_landing_page_designation) ){ ?><p class="custom_designation"><?php echo esc_html($ecommerce_landing_page_designation); ?></p><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_description) ){ ?><p class="custom_desc"><?php echo esc_html($ecommerce_landing_page_description); ?></p><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_read_more_url) ){ ?><div class="more-button"><a class="custom_read_more" href="<?php echo esc_url($ecommerce_landing_page_read_more_url); ?>"><?php if(!empty($ecommerce_landing_page_read_more_text) ){ ?><?php echo esc_html($ecommerce_landing_page_read_more_text); ?><?php } ?></a></div><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $ecommerce_landing_page_instance ) {	

		$ecommerce_landing_page_title= ''; $ecommerce_landing_page_author = ''; $ecommerce_landing_page_designation = ''; $ecommerce_landing_page_description= ''; $ecommerce_landing_page_read_more_text = ''; $ecommerce_landing_page_read_more_url = ''; $ecommerce_landing_page_upload_image = '';

		$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
		$ecommerce_landing_page_author = isset( $ecommerce_landing_page_instance['author'] ) ? $ecommerce_landing_page_instance['author'] : '';
		$ecommerce_landing_page_designation = isset( $ecommerce_landing_page_instance['designation'] ) ? $ecommerce_landing_page_instance['designation'] : '';
		$ecommerce_landing_page_description = isset( $ecommerce_landing_page_instance['description'] ) ? $ecommerce_landing_page_instance['description'] : '';
		$ecommerce_landing_page_read_more_url = isset( $ecommerce_landing_page_instance['read_more_url'] ) ? $ecommerce_landing_page_instance['read_more_url'] : '';
		$ecommerce_landing_page_read_more_text = isset( $ecommerce_landing_page_instance['read_more_text'] ) ? $ecommerce_landing_page_instance['read_more_text'] : '';
		$ecommerce_landing_page_upload_image = isset( $ecommerce_landing_page_instance['upload_image'] ) ? $ecommerce_landing_page_instance['upload_image'] : '';
	?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','ecommerce-landing-page'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_title); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','ecommerce-landing-page'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('designation')); ?>"><?php esc_html_e('Designation:','ecommerce-landing-page'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('designation')); ?>" name="<?php echo esc_attr($this->get_field_name('designation')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_designation); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','ecommerce-landing-page'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_read_more_url); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','ecommerce-landing-page'); ?></label>
		<?php
			if ( $ecommerce_landing_page_upload_image != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($ecommerce_landing_page_upload_image) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $ecommerce_landing_page_upload_image ); ?>" />
	   	</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $ecommerce_landing_page_new_instance, $ecommerce_landing_page_old_instance ) {
		$ecommerce_landing_page_instance = array();	
		$ecommerce_landing_page_instance['title'] = (!empty($ecommerce_landing_page_new_instance['title']) ) ? strip_tags($ecommerce_landing_page_new_instance['title']) : '';
		$ecommerce_landing_page_instance['author'] = ( ! empty( $ecommerce_landing_page_new_instance['author'] ) ) ? strip_tags($ecommerce_landing_page_new_instance['author']) : '';
		$ecommerce_landing_page_instance['designation'] = ( ! empty( $ecommerce_landing_page_new_instance['designation'] ) ) ? strip_tags($ecommerce_landing_page_new_instance['designation']) : '';
		$ecommerce_landing_page_instance['description'] = (!empty($ecommerce_landing_page_new_instance['description']) ) ? strip_tags($ecommerce_landing_page_new_instance['description']) : '';
        $ecommerce_landing_page_instance['read_more_text'] = (!empty($ecommerce_landing_page_new_instance['read_more_text']) ) ? strip_tags($ecommerce_landing_page_new_instance['read_more_text']) : '';
        $ecommerce_landing_page_instance['read_more_url'] = (!empty($ecommerce_landing_page_new_instance['read_more_url']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['read_more_url']) : '';
        $ecommerce_landing_page_instance['upload_image'] = ( ! empty( $ecommerce_landing_page_new_instance['upload_image'] ) ) ? strip_tags($ecommerce_landing_page_new_instance['upload_image']) : '';

		return $ecommerce_landing_page_instance;
	}
}
// Register and load the widget
function ecommerce_landing_page_about_custom_load_widget() {
	register_widget( 'Ecommerce_Landing_Page_About_Widget' );
}
add_action( 'widgets_init', 'ecommerce_landing_page_about_custom_load_widget' );