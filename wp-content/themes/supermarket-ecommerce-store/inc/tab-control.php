<?php

/** Control Tab */
if (class_exists('WP_Customize_Control')) {

    class supermarketecommercestore_Tab_Control extends WP_Customize_Control {

        public $type = 'supermarketecommercestore-tab';
        public $buttons = '';

        public function __construct($manager, $id, $args = array()) {
            parent::__construct($manager, $id, $args);
        }

        public function to_json() {
            parent::to_json();
            $first = true;
            $formatted_buttons = array();
            $all_fields = array();
            foreach ($this->buttons as $button) {
                //$fields = array();
                $active = isset($button['active']) ? $button['active'] : false;
                if ($active && $first) {
                    $first = false;
                } elseif ($active && !$first) {
                    $active = false;
                }

                $formatted_buttons[] = array(
                    'name' => $button['name'],
                    'icon' => isset($button['icon']) ? $button['icon'] : '',
                    'fields' => $button['fields'],
                    'active' => $active,
                );
                $all_fields = array_merge($all_fields, $button['fields']);
            }
            $this->json['buttons'] = $formatted_buttons;
            $this->json['fields'] = $all_fields;
        }

        public function content_template() {
            ?>
            <div class="supermarketecommercestore-customizer-tab-wrap">
                <# if ( data.buttons ) { #>
                <div class="supermarketecommercestore-customizer-tabs">
                    <# for (tab in data.buttons) { #>
                    <a href="#" class="supermarketecommercestore-customizer-tab <# if ( data.buttons[tab].active ) { #> active <# } #>" data-tab="{{ tab }}">
                        <# if ( data.buttons[tab].icon ) { #> 
                        <span class="{{ data.buttons[tab].icon }}"></span>
                        <# } #>
                        {{ data.buttons[tab].name }}
                    </a>
                    <# } #>
                </div>
                <# } #>
            </div>
            <?php
        }
    }

    class supermarketecommercestore_Custom_Control extends WP_Customize_Control {
        public $type = 'slider_control';
        public function render_content() {
        ?>
            <div class="slider-custom-control">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> /><span class="slider-reset" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"><?php echo esc_html_e('Reset', 'supermarket-ecommerce-store'); ?></span>
            </div>
        <?php
        }
    }
    
    class supermarketecommercestore_Reset_Custom_Control extends WP_Customize_Control {
        public $type = 'reset_control';
        public function render_content() {
        ?>
            <div class="reset-custom-control">
                <span class="customize-reset-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="reset-button"><?php echo esc_html_e('Reset', 'supermarket-ecommerce-store'); ?></span>
            </div>
            <div id="myModal" class="modal kt-modal">
              <div class="modal-content">
                <span class="close">X</span>
                <h3><?php esc_html_e('Are you sure you want to reset setting? ', 'supermarket-ecommerce-store') ?></h3>
                <p><?php esc_html_e('Accept this setting will reset this section default values. All the content will be lost in this section.', 'supermarket-ecommerce-store') ?></p>
                <a href="javascript:location.reload();" class="refresh-btn" data-value="<?php echo esc_attr( $this->description ); ?>"><?php echo esc_html_e('OK', 'supermarket-ecommerce-store'); ?></a>
              </div>

            </div>
        <?php
        }
    }

    class supermarketecommercestore_Toggle_Switch_Custom_Control extends WP_Customize_Control {
        public $type = 'toogle_switch';
        public function render_content(){
        ?>
            <div class="toggle-switch-control">
                <div class="toggle-switch">
                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                    <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                        <span class="toggle-switch-inner"></span>
                        <span class="toggle-switch-btn"></span>
                    </label>
                </div>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
            </div>
        <?php
        }
    }

    class My_Dropdown_Category_Control extends WP_Customize_Control {

		public $type = 'dropdown-category';
	
		protected $dropdown_args = false;
	
		protected function render_content() {
			?><label><?php
	
			if ( ! empty( $this->label ) ) :
				?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
	
			if ( ! empty( $this->description ) ) :
				?><span class="description customize-control-description"><?php echo $this->description; ?></span><?php
			endif;
	
			$dropdown_args = wp_parse_args( $this->dropdown_args, array(
				'taxonomy'          => 'product_cat',
				'show_option_none'  => ' ',
				'selected'          => $this->value(),
				'show_option_all'   => '',
				'orderby'           => 'id',
				'order'             => 'ASC',
				'show_count'        => 1,
				'hide_empty'        => 1,
				'child_of'          => 0,
				'exclude'           => '',
				'hierarchical'      => 1,
				'depth'             => 0,
				'tab_index'         => 0,
				'hide_if_empty'     => false,
				'option_none_value' => 0,
				'value_field'       => 'term_id',
			) );
	
			$dropdown_args['echo'] = false;
	
			$dropdown = wp_dropdown_categories( $dropdown_args );
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			echo $dropdown;
	
			?></label><?php
	
		}
	}


}