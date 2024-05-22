<?php
/**
 * Custom Contact us Widget
 */

class Ecommerce_Landing_Page_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Ecommerce_Landing_Page_Contact_Widget', 
			__('VW Contact us', 'ecommerce-landing-page'),
			array( 'description' => __( 'Widget for contact us section in sidebar', 'ecommerce-landing-page' ), ) 
		);
	}
	
	public function widget( $ecommerce_landing_page_args, $ecommerce_landing_page_instance ) {
		?>
		<aside class="widget">
			<?php
			$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
			$ecommerce_landing_page_phone = isset( $ecommerce_landing_page_instance['phone'] ) ? $ecommerce_landing_page_instance['phone'] : '';
			$ecommerce_landing_page_email = isset( $ecommerce_landing_page_instance['email'] ) ? $ecommerce_landing_page_instance['email'] : '';
			$ecommerce_landing_page_address = isset( $ecommerce_landing_page_instance['address'] ) ? $ecommerce_landing_page_instance['address'] : '';
			$ecommerce_landing_page_timing = isset( $ecommerce_landing_page_instance['timing'] ) ? $ecommerce_landing_page_instance['timing'] : '';
			$ecommerce_landing_page_longitude = isset( $ecommerce_landing_page_instance['longitude'] ) ? $ecommerce_landing_page_instance['longitude'] : '';
			$ecommerce_landing_page_latitude = isset( $ecommerce_landing_page_instance['latitude'] ) ? $ecommerce_landing_page_instance['latitude'] : '';
			$ecommerce_landing_page_contact_form = isset( $ecommerce_landing_page_instance['contact_form'] ) ? $ecommerce_landing_page_instance['contact_form'] : '';

	        echo '<div class="custom-contact-us">';
	        if(!empty($ecommerce_landing_page_title) ){ ?><h3 class="custom_title"><?php echo esc_html($ecommerce_landing_page_title); ?></h3><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_phone) ){ ?><p><span class="custom_details"><?php esc_html_e('Phone Number: ','ecommerce-landing-page'); ?></span><span class="custom_desc"><?php echo esc_html($ecommerce_landing_page_phone); ?></span></p><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_email) ){ ?><p><span class="custom_details"><?php esc_html_e('Email ID: ','ecommerce-landing-page'); ?></span><span class="custom_desc"><?php echo esc_html($ecommerce_landing_page_email); ?></span></p><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_address) ){ ?><p><span class="custom_details"><?php esc_html_e('Address: ','ecommerce-landing-page'); ?></span><span class="custom_desc"><?php echo esc_html($ecommerce_landing_page_address); ?></span></p><?php } ?> 
		        <?php if(!empty($ecommerce_landing_page_timing) ){ ?><p><span class="custom_details"><?php esc_html_e('Opening Time: ','ecommerce-landing-page'); ?></span><span class="custom_desc"><?php echo esc_html($ecommerce_landing_page_timing); ?></span></p><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_longitude) ){ ?><embed width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_html($ecommerce_landing_page_longitude); ?>,<?php echo esc_html($ecommerce_landing_page_latitude); ?>&hl=es;z=14&amp;output=embed"></embed><?php } ?>
		        <?php if(!empty($ecommerce_landing_page_contact_form) ){ ?><?php echo do_shortcode($ecommerce_landing_page_contact_form); ?><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $ecommerce_landing_page_instance ) {

		$ecommerce_landing_page_title= ''; $ecommerce_landing_page_phone= ''; $ecommerce_landing_page_email = ''; $ecommerce_landing_page_address = ''; $ecommerce_landing_page_timing = ''; $ecommerce_landing_page_longitude = ''; $ecommerce_landing_page_latitude = ''; $ecommerce_landing_page_contact_form = ''; 
		
		$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
		$ecommerce_landing_page_phone = isset( $ecommerce_landing_page_instance['phone'] ) ? $ecommerce_landing_page_instance['phone'] : '';
		$ecommerce_landing_page_email = isset( $ecommerce_landing_page_instance['email'] ) ? $ecommerce_landing_page_instance['email'] : '';
		$ecommerce_landing_page_address = isset( $ecommerce_landing_page_instance['address'] ) ? $ecommerce_landing_page_instance['address'] : '';
		$ecommerce_landing_page_timing = isset( $ecommerce_landing_page_instance['timing'] ) ? $ecommerce_landing_page_instance['timing'] : '';
		$ecommerce_landing_page_longitude = isset( $ecommerce_landing_page_instance['longitude'] ) ? $ecommerce_landing_page_instance['longitude'] : '';
		$ecommerce_landing_page_latitude = isset( $ecommerce_landing_page_instance['latitude'] ) ? $ecommerce_landing_page_instance['latitude'] : '';
		$ecommerce_landing_page_contact_form = isset( $ecommerce_landing_page_instance['contact_form'] ) ? $ecommerce_landing_page_instance['contact_form'] : '';
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_title); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_timing); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_longitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_latitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('contact_form')); ?>"><?php esc_html_e('Contact Form Shortcode:','ecommerce-landing-page'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_contact_form); ?>">
    	</p>
		
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $ecommerce_landing_page_new_instance, $ecommerce_landing_page_old_instance ) {
		$ecommerce_landing_page_instance = array();	
		$ecommerce_landing_page_instance['title'] = (!empty($ecommerce_landing_page_new_instance['title']) ) ? strip_tags($ecommerce_landing_page_new_instance['title']) : '';
		$ecommerce_landing_page_instance['phone'] = (!empty($ecommerce_landing_page_new_instance['phone']) ) ? ecommerce_landing_page_sanitize_phone_number($ecommerce_landing_page_new_instance['phone']) : '';
		$ecommerce_landing_page_instance['email'] = (!empty($ecommerce_landing_page_new_instance['email']) ) ? sanitize_email($ecommerce_landing_page_new_instance['email']) : '';
		$ecommerce_landing_page_instance['address'] = (!empty($ecommerce_landing_page_new_instance['address']) ) ? strip_tags($ecommerce_landing_page_new_instance['address']) : '';
		$ecommerce_landing_page_instance['timing'] = (!empty($ecommerce_landing_page_new_instance['timing']) ) ? strip_tags($ecommerce_landing_page_new_instance['timing']) : '';
		$ecommerce_landing_page_instance['longitude'] = (!empty($ecommerce_landing_page_new_instance['longitude']) ) ? strip_tags($ecommerce_landing_page_new_instance['longitude']) : '';
		$ecommerce_landing_page_instance['latitude'] = (!empty($ecommerce_landing_page_new_instance['latitude']) ) ? strip_tags($ecommerce_landing_page_new_instance['latitude']) : '';
		$ecommerce_landing_page_instance['contact_form'] = (!empty($ecommerce_landing_page_new_instance['contact_form']) ) ? strip_tags($ecommerce_landing_page_new_instance['contact_form']) : '';
        
		return $ecommerce_landing_page_instance;
	}
}
// Register and load the widget
function ecommerce_landing_page_contact_custom_load_widget() {
	register_widget( 'Ecommerce_Landing_Page_Contact_Widget' );
}
add_action( 'widgets_init', 'ecommerce_landing_page_contact_custom_load_widget' );