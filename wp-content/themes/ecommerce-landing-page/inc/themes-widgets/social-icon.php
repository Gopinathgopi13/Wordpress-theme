<?php
/**
 * Custom Social Widget
 */

class Ecommerce_Landing_Page_Social_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'Ecommerce_Landing_Page_Social_Widget',
			__('VW Social Icon', 'ecommerce-landing-page'),
			array( 'description' => __( 'Widget for Social icons section', 'ecommerce-landing-page' ), ) 
		);
	}

	public function widget( $ecommerce_landing_page_args, $ecommerce_landing_page_instance ) { ?>
		<div class="widget">
			<?php
			$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
			$ecommerce_landing_page_facebook = isset( $ecommerce_landing_page_instance['facebook'] ) ? $ecommerce_landing_page_instance['facebook'] : '';
			$ecommerce_landing_page_instagram = isset( $ecommerce_landing_page_instance['instagram'] ) ? $ecommerce_landing_page_instance['instagram'] : '';
			$ecommerce_landing_page_twitter = isset( $ecommerce_landing_page_instance['twitter'] ) ? $ecommerce_landing_page_instance['twitter'] : '';
			$ecommerce_landing_page_linkedin = isset( $ecommerce_landing_page_instance['linkedin'] ) ? $ecommerce_landing_page_instance['linkedin'] : '';
			$ecommerce_landing_page_pinterest = isset( $ecommerce_landing_page_instance['pinterest'] ) ? $ecommerce_landing_page_instance['pinterest'] : '';
			$ecommerce_landing_page_tumblr = isset( $ecommerce_landing_page_instance['tumblr'] ) ? $ecommerce_landing_page_instance['tumblr'] : '';
			$ecommerce_landing_page_youtube = isset( $ecommerce_landing_page_instance['youtube'] ) ? $ecommerce_landing_page_instance['youtube'] : '';

	        echo '<div class="custom-social-icons">';
	        if(!empty($ecommerce_landing_page_title) ){ ?><h3 class="custom_title"><?php echo esc_html($ecommerce_landing_page_title); ?></h3><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_facebook) ){ ?><a class="custom_facebook fff" href="<?php echo esc_url($ecommerce_landing_page_facebook); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_twitter) ){ ?><a class="custom_twitter" href="<?php echo esc_url($ecommerce_landing_page_twitter); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_linkedin) ){ ?><a class="custom_linkedin" href="<?php echo esc_url($ecommerce_landing_page_linkedin); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_pinterest) ){ ?><a class="custom_pinterest" href="<?php echo esc_url($ecommerce_landing_page_pinterest); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_tumblr) ){ ?><a class="custom_tumblr" href="<?php echo esc_url($ecommerce_landing_page_tumblr); ?>"><i class="fab fa-tumblr"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_instagram) ){ ?><a class="custom_instagram" href="<?php echo esc_url($ecommerce_landing_page_instagram); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php if(!empty($ecommerce_landing_page_youtube) ){ ?><a class="custom_youtube" href="<?php echo esc_url($ecommerce_landing_page_youtube); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','ecommerce-landing-page' );?></span></a><?php } ?>
	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	// Widget Backend 
	public function form( $ecommerce_landing_page_instance ) {

		$ecommerce_landing_page_title= ''; $ecommerce_landing_page_facebook = ''; $ecommerce_landing_page_twitter = ''; $ecommerce_landing_page_linkedin = '';  $ecommerce_landing_page_pinterest = '';$ecommerce_landing_page_tumblr = ''; $ecommerce_landing_page_instagram = ''; $ecommerce_landing_page_youtube = ''; 

		$ecommerce_landing_page_title = isset( $ecommerce_landing_page_instance['title'] ) ? $ecommerce_landing_page_instance['title'] : '';
		$ecommerce_landing_page_facebook = isset( $ecommerce_landing_page_instance['facebook'] ) ? $ecommerce_landing_page_instance['facebook'] : '';
		$ecommerce_landing_page_instagram = isset( $ecommerce_landing_page_instance['instagram'] ) ? $ecommerce_landing_page_instance['instagram'] : '';
		$ecommerce_landing_page_twitter = isset( $ecommerce_landing_page_instance['twitter'] ) ? $ecommerce_landing_page_instance['twitter'] : '';
		$ecommerce_landing_page_linkedin = isset( $ecommerce_landing_page_instance['linkedin'] ) ? $ecommerce_landing_page_instance['linkedin'] : '';
		$ecommerce_landing_page_pinterest = isset( $ecommerce_landing_page_instance['pinterest'] ) ? $ecommerce_landing_page_instance['pinterest'] : '';
		$ecommerce_landing_page_tumblr = isset( $ecommerce_landing_page_instance['tumblr'] ) ? $ecommerce_landing_page_instance['tumblr'] : '';
		$ecommerce_landing_page_youtube = isset( $ecommerce_landing_page_instance['youtube'] ) ? $ecommerce_landing_page_instance['youtube'] : '';
		?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','ecommerce-landing-page'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_title); ?>">
    	</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_linkedin); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_pinterest); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_tumblr); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:','ecommerce-landing-page'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($ecommerce_landing_page_youtube); ?>">
		</p>
		<?php 
	}
	
	public function update( $ecommerce_landing_page_new_instance, $ecommerce_landing_page_old_instance ) {
		$ecommerce_landing_page_instance = array();
		$ecommerce_landing_page_instance['title'] = (!empty($ecommerce_landing_page_new_instance['title']) ) ? strip_tags($ecommerce_landing_page_new_instance['title']) : '';	
        $ecommerce_landing_page_instance['facebook'] = (!empty($ecommerce_landing_page_new_instance['facebook']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['facebook']) : '';
        $ecommerce_landing_page_instance['twitter'] = (!empty($ecommerce_landing_page_new_instance['twitter']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['twitter']) : '';
        $ecommerce_landing_page_instance['instagram'] = (!empty($ecommerce_landing_page_new_instance['instagram']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['instagram']) : '';
        $ecommerce_landing_page_instance['linkedin'] = (!empty($ecommerce_landing_page_new_instance['linkedin']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['linkedin']) : '';
        $ecommerce_landing_page_instance['pinterest'] = (!empty($ecommerce_landing_page_new_instance['pinterest']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['pinterest']) : '';
        $ecommerce_landing_page_instance['tumblr'] = (!empty($ecommerce_landing_page_new_instance['tumblr']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['tumblr']) : '';
     	$ecommerce_landing_page_instance['youtube'] = (!empty($ecommerce_landing_page_new_instance['youtube']) ) ? esc_url_raw($ecommerce_landing_page_new_instance['youtube']) : '';
     	
		return $ecommerce_landing_page_instance;
	}
}

function ecommerce_landing_page_custom_load_widget() {
	register_widget( 'Ecommerce_Landing_Page_Social_Widget' );
}
add_action( 'widgets_init', 'ecommerce_landing_page_custom_load_widget' );