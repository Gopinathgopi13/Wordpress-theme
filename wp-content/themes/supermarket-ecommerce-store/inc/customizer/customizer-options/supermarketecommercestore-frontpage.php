<?php
function supermarketecommercestore_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarketecommercestore_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'supermarket-ecommerce-store' ),
		)
	);
	


	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'supermarket-ecommerce-store' ),
			'priority' => 1,
			'panel' => 'supermarketecommercestore_frontpage_sections',
		)
	);


	$wp_customize->add_setting('supermarketecommercestore_reset_slider_settings',array(
	  'sanitize_callback'   => 'sanitize_text_field'
	));
	$wp_customize->add_control(new supermarketecommercestore_Reset_Custom_Control($wp_customize, 'supermarketecommercestore_reset_slider_settings',array(
	  'type' => 'reset_control',
	   'priority' => 1,
	  'label' => __('Reset Slider Settings', 'supermarket-ecommerce-store'),
	  'description' => 'supermarket_ecommerce_store_slider_reset_settings',
	  'section' => 'slider_setting'
	)));
	

	$wp_customize->add_setting('supermarketecommercestore_slider_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supermarketecommercestore_Tab_Control($wp_customize, 'supermarketecommercestore_slider_tabs', array(
	   'section' => 'slider_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'supermarket-ecommerce-store'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
				'category_head',
				'category1',
				'category2',
				'category3',
				'category4',
				'category5',
				'category6',
				'slider_head',
            	'slider1',
            	'slider2',
            	'slider3',
            	'slider4',
            	'slider5',
            	'slider6',
				'supermarketecommercestore_sr_image',
				'supermarketecommercestore_sliderighttitle',
				'supermarketecommercestore_sliderightext',
				'supermarketecommercestore_sliderightaboveoffText',
				'supermarketecommercestore_sliderightaboveoffText2',
				'supermarketecommercestore_rightBelowImage_image',
				'supermarketecommercestore_sliderightbelowbotitle'
            ),
            'active' => true,
         ), 
	      array(
            'name' => esc_html__('Style', 'supermarket-ecommerce-store'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'slider_titlecolor',
                'slider_descriptioncolor',
                'slider_btntxt1color',
                'slider_btnbg1color',
				'slider_btntxthovercolor'

            ),
     	)
	    
    	),
	))); 


	

	// General Tab

	// Category Head
	$wp_customize->add_setting(
		'category_head',
		array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'supermarketecommercestore_sanitize_text',
			'priority'  => 1,
		)
	);

	$wp_customize->add_control(
	'category_head',
		array(
			'type' => 'hidden',
			'label' => __('Category','supermarket-ecommerce-store'),
			'description'   => esc_html__( 'Select the Product category that will show in slider. If no category is set to product that category is not show in dropdown.', 'supermarket-ecommerce-store' ),
			'section' => 'slider_setting',
		)
	);

	
	// category 1
	$wp_customize->add_setting( 'category1', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category1', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 1', 'supermarket-ecommerce-store' ),
	) ) );

	// category 2
	$wp_customize->add_setting( 'category2', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category2', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 2', 'supermarket-ecommerce-store' ),
	) ) );

	// category 3
	$wp_customize->add_setting( 'category3', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category3', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 3', 'supermarket-ecommerce-store' ),
	) ) );

	// category 4
	$wp_customize->add_setting( 'category4', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category4', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 4', 'supermarket-ecommerce-store' ),
	) ) );

	// category 5
	$wp_customize->add_setting( 'category5', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category5', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 5', 'supermarket-ecommerce-store' ),
	) ) );

	// category 6
	$wp_customize->add_setting( 'category6', array(
		'default'           => 0,
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new My_Dropdown_Category_Control( $wp_customize, 'category6', array(
		'section'       => 'slider_setting',
		'label'         => esc_html__( 'Category 6', 'supermarket-ecommerce-store' ),
	) ) );


	// Slider Head
	$wp_customize->add_setting(
		'slider_head',
		array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'supermarketecommercestore_sanitize_text',
			'priority'  => 1,
		)
	);

	$wp_customize->add_control(
	'slider_head',
		array(
			'type' => 'hidden',
			'label' => __('Slider','supermarket-ecommerce-store'),
			'description'   => esc_html__( 'Select the Product Slider that will show in slider.', 'supermarket-ecommerce-store' ),
			'section' => 'slider_setting',
		)
	);

	// Slider 1
	$wp_customize->add_setting( 
    	'slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider1',
		array(
		    'label'   		=> __('Slider 1','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		



	// Slider 2
	$wp_customize->add_setting(
    	'slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider2',
		array(
		    'label'   		=> __('Slider 2','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'slider3',
		array(
		    'label'   		=> __('Slider 3','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 4
	$wp_customize->add_setting(
    	'slider4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'slider4',
		array(
		    'label'   		=> __('Slider 4','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);



	// Slider 5
	$wp_customize->add_setting(
    	'slider5',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'slider5',
		array(
		    'label'   		=> __('Slider 5','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// Slider 6
	$wp_customize->add_setting(
    	'slider6',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'slider6',
		array(
		    'label'   		=> __('Slider 6','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);


	// slider sliderightbelowbo banner 1 image
	$wp_customize->add_setting(
    	'supermarketecommercestore_sr_image',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'supermarketecommercestore_sr_image',
	        array(
			    'label'   		=> __('Banner Image','supermarket-ecommerce-store'),
	            'section' => 'slider_setting',
	            'settings' => 'supermarketecommercestore_sr_image'
	        )
	    )
	);

	// slider sliderighttitle
	$slidersliderighttitle = esc_html__('FRUIT MARKET', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'supermarketecommercestore_sliderighttitle',
    	array(
			'default' => $slidersliderighttitle,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'supermarketecommercestore_sliderighttitle',
		array(
		    'label'   		=> __('Banner Title','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// slider sliderighttext
	$slidersliderighttext = esc_html__('WELLCOME TO', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'supermarketecommercestore_sliderightext',
    	array(
			'default' => $slidersliderighttext,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'supermarketecommercestore_sliderightext',
		array(
		    'label'   		=> __('Banner Text','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// slider sliderightaboveoffText
	$slidersliderightaboveoffText = esc_html__('10% OFF', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'supermarketecommercestore_sliderightaboveoffText',
    	array(
			'default' => $slidersliderightaboveoffText,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'supermarketecommercestore_sliderightaboveoffText',
		array(
		    'label'   		=> __('Banner Offer Text','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// slider sliderightaboveoffText2
	$slidersliderightaboveoffText2 = esc_html__('SHOP NOW', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'supermarketecommercestore_sliderightaboveoffText2',
    	array(
			'default' => $slidersliderightaboveoffText2,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'supermarketecommercestore_sliderightaboveoffText2',
		array(
		    'label'   		=> __('Banner Offer Text 2','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// slider sliderightbelowbo image
	$wp_customize->add_setting(
    	'supermarketecommercestore_rightBelowImage_image',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'supermarketecommercestore_rightBelowImage_image',
	        array(
			    'label'   		=> __('Banner 2 Image','supermarket-ecommerce-store'),
	            'section' => 'slider_setting',
	            'settings' => 'supermarketecommercestore_rightBelowImage_image'
	        )
	    )
	);

	// slider sliderightbelowbotitle
	$slidersliderightbelowbotitle = esc_html__('SUPER MARKET', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'supermarketecommercestore_sliderightbelowbotitle',
    	array(
			'default' => $slidersliderightbelowbotitle,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'supermarketecommercestore_sliderightbelowbotitle',
		array(
		    'label'   		=> __('Banner 2 Text','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);


	// Style setting

	// slider title Color
	$slidertitlecolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'slider_titlecolor',
    	array(
			'default' => $slidertitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_titlecolor',
		array(
		    'label'   		=> __('Title Color','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// slider description Color
	$sliderdescriptioncolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'slider_descriptioncolor',
    	array(
			'default' => $sliderdescriptioncolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_descriptioncolor',
		array(
		    'label'   		=> __('Description Color','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btntxt1 Color
	$sliderbtntxt1color = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'slider_btntxt1color',
    	array(
			'default' => $sliderbtntxt1color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btntxt1color',
		array(
		    'label'   		=> __('Button Text Color','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btnbg1 Color
	$sliderbtnbg1color = esc_html__('#FEB805', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'slider_btnbg1color',
    	array(
			'default' => $sliderbtnbg1color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btnbg1color',
		array(
		    'label'   		=> __('Button BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	

	// slider btntxthover Color
	$sliderbtntxthovercolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'slider_btntxthovercolor',
    	array(
			'default' => $sliderbtntxthovercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btntxthovercolor',
		array(
		    'label'   		=> __('Button Text Hover Color','supermarket-ecommerce-store'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);




	/*=========================================
	featuredproduct Section
	=========================================*/
	$wp_customize->add_section(
		'featuredproduct_setting', array(
			'title' => esc_html__( 'Featured Product Section', 'supermarket-ecommerce-store' ),
			'priority' => 1,
			'panel' => 'supermarketecommercestore_frontpage_sections',
		)
	);


	$wp_customize->add_setting('supermarketecommercestore_reset_featuredproduct_settings',array(
	  'sanitize_callback'   => 'sanitize_text_field'
	));
	$wp_customize->add_control(new supermarketecommercestore_Reset_Custom_Control($wp_customize, 'supermarketecommercestore_reset_featuredproduct_settings',array(
	  'type' => 'reset_control',
	   'priority' => 1,
	  'label' => __('Reset Featured Settings', 'supermarket-ecommerce-store'),
	  'description' => 'supermarket_ecommerce_store_featuredproduct_reset_settings',
	  'section' => 'featuredproduct_setting'
	)));
	

	$wp_customize->add_setting('supermarketecommercestore_featuredproduct_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supermarketecommercestore_Tab_Control($wp_customize, 'supermarketecommercestore_featuredproduct_tabs', array(
	   'section' => 'featuredproduct_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'supermarket-ecommerce-store'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
				'featuredproduct_disable_section',
				'featuredproduct_heading',
            ),
            'active' => true,
         ), 
	      array(
            'name' => esc_html__('Style', 'supermarket-ecommerce-store'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'featuredproduct_titlecolor',
				'featuredproduct_producttitlecolor',
				'featuredproduct_pricecolor',
				'featuredproduct_button1color',
				'featuredproduct_button2color',
				'featuredproduct_button2textcolor'

            ),
     	),
		 array(
		   'name' => esc_html__('Layout', 'supermarket-ecommerce-store'),
		   'icon' => 'dashicons dashicons-layout',
		   'fields' => array(
			   'featuredproduct_section_width',
			   'featuredproduct_padding',
			   'featuredproduct_top_padding',
			   'featuredproduct_bottom_padding',
		   ),
		)
	),
	))); 


	

	// General Tab

	// hide show featuredproduct section
	$wp_customize->add_setting(
        'featuredproduct_disable_section',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    ); 
    $wp_customize->add_control(
        new supermarketecommercestore_Toggle_Switch_Custom_Control(
            $wp_customize,
            'featuredproduct_disable_section',
            array(
                'settings'      => 'featuredproduct_disable_section',
                'section'       => 'featuredproduct_setting',
                'label'         => __( 'Disable Section', 'supermarket-ecommerce-store' ),
                'on_off_label'  => array(
                    'on' => __( 'Yes', 'supermarket-ecommerce-store' ),
                    'off' => __( 'No', 'supermarket-ecommerce-store' )
                ),
            )
        )
    );

	
	// featuredproduct featuredproductighttitle
	$featuredproductheading = esc_html__('Featured Product', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_heading',
    	array(
			'default' => $featuredproductheading,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_heading',
		array(
		    'label'   		=> __('Heading','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	

	// Style setting

	// featuredproduct title Color
	$featuredproducttitlecolor = esc_html__('#000', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_titlecolor',
    	array(
			'default' => $featuredproducttitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_titlecolor',
		array(
		    'label'   		=> __('Title Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// featuredproduct producttitle Color
	$featuredproductproducttitlecolor = esc_html__('#000', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_producttitlecolor',
    	array(
			'default' => $featuredproductproducttitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_producttitlecolor',
		array(
		    'label'   		=> __('Product Name Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// featuredproduct price Color
	$featuredproductpricecolor = esc_html__('#000', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_pricecolor',
    	array(
			'default' => $featuredproductpricecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_pricecolor',
		array(
		    'label'   		=> __('Price Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// featuredproduct button1 Color
	$featuredproductbutton1color = esc_html__('#535455', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_button1color',
    	array(
			'default' => $featuredproductbutton1color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_button1color',
		array(
		    'label'   		=> __('Button 1 Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// featuredproduct button2 Color
	$featuredproductbutton2color = esc_html__('#FEB805', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_button2color',
    	array(
			'default' => $featuredproductbutton2color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_button2color',
		array(
		    'label'   		=> __('Button 2 Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// featuredproduct button2text Color
	$featuredproductbutton2textcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'featuredproduct_button2textcolor',
    	array(
			'default' => $featuredproductbutton2textcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'featuredproduct_button2textcolor',
		array(
		    'label'   		=> __('Button 2 Text Color','supermarket-ecommerce-store'),
		    'section'		=> 'featuredproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// featuredproduct layout setting

	$wp_customize->add_setting('featuredproduct_section_width',array(
        'default' => 'Box Width',
        'sanitize_callback' => 'supermarketecommercestore_sanitize_choices',
    ));
    $wp_customize->add_control('featuredproduct_section_width',array(
        'type' => 'select',
        'label' => __('Section Width','supermarket-ecommerce-store'),
        'choices' => array (
            'Box Width' => __('Box Width','supermarket-ecommerce-store'),
            'Full Width' => __('Full Width','supermarket-ecommerce-store')
        ),
        'section' => 'featuredproduct_setting',
    ));


    // featuredproduct section padding 
	$wp_customize->add_setting('featuredproduct_padding',array(
      'sanitize_callback'   => 'esc_html'
    ));
    $wp_customize->add_control('featuredproduct_padding',array(
      'label' => __('Section Padding','supermarket-ecommerce-store'),
      'section' => 'featuredproduct_setting'
    ));

    $wp_customize->add_setting('featuredproduct_top_padding',array(
        'default' => '5',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('featuredproduct_top_padding',array(
	    'type' => 'number',
	    'label' => __('Top','supermarket-ecommerce-store'),
	    'section' => 'featuredproduct_setting',
    ));

 	$wp_customize->add_setting('featuredproduct_bottom_padding',array(
        'default' => '2',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('featuredproduct_bottom_padding',array(
	    'type' => 'number',
	    'label' => __('Bottom','supermarket-ecommerce-store'),
	    'section' => 'featuredproduct_setting',
    ));



	/*=========================================
	recentproduct Section
	=========================================*/
	$wp_customize->add_section(
		'recentproduct_setting', array(
			'title' => esc_html__( 'Recent Product Section', 'supermarket-ecommerce-store' ),
			'priority' => 1,
			'panel' => 'supermarketecommercestore_frontpage_sections',
		)
	);


	$wp_customize->add_setting('supermarketecommercestore_reset_recentproduct_settings',array(
	  'sanitize_callback'   => 'sanitize_text_field'
	));
	$wp_customize->add_control(new supermarketecommercestore_Reset_Custom_Control($wp_customize, 'supermarketecommercestore_reset_recentproduct_settings',array(
	  'type' => 'reset_control',
	   'priority' => 1,
	  'label' => __('Reset Recent Product Settings', 'supermarket-ecommerce-store'),
	  'description' => 'supermarket_ecommerce_store_recentproduct_reset_settings',
	  'section' => 'recentproduct_setting'
	)));
	

	$wp_customize->add_setting('supermarketecommercestore_recentproduct_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supermarketecommercestore_Tab_Control($wp_customize, 'supermarketecommercestore_recentproduct_tabs', array(
	   'section' => 'recentproduct_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'supermarket-ecommerce-store'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
				'recentproduct_disable_section',
				'newproducts_heading',
            ),
            'active' => true,
         ), 
	      array(
            'name' => esc_html__('Style', 'supermarket-ecommerce-store'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'recentproduct_titlecolor',
				'recentproduct_headingcolor',
				'recentproduct_pricecolor',
				'recentproduct_btn1color',
				'recentproduct_btn2color',
				'recentproduct_btn2textcolor'

            ),
     	)),
	))); 


	

	// General Tab

	// hide show recentproduct section
	$wp_customize->add_setting(
        'recentproduct_disable_section',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    ); 
    $wp_customize->add_control(
        new supermarketecommercestore_Toggle_Switch_Custom_Control(
            $wp_customize,
            'recentproduct_disable_section',
            array(
                'settings'      => 'recentproduct_disable_section',
                'section'       => 'recentproduct_setting',
                'label'         => __( 'Disable Section', 'supermarket-ecommerce-store' ),
                'on_off_label'  => array(
                    'on' => __( 'Yes', 'supermarket-ecommerce-store' ),
                    'off' => __( 'No', 'supermarket-ecommerce-store' )
                ),
            )
        )
    );

	// recentproduct recentproductighttitle
	$recentproductheading = esc_html__('Recent Products', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'newproducts_heading',
    	array(
			'default' => $recentproductheading,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'newproducts_heading',
		array(
		    'label'   		=> __('Heading','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	

	// Style setting

	// recentproduct title Color
	$recentproducttitlecolor = esc_html__('#000', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_titlecolor',
    	array(
			'default' => $recentproducttitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_titlecolor',
		array(
		    'label'   		=> __('Title Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// recentproduct heading Color
	$recentproductheadingcolor = esc_html__('#6f6f6f', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_headingcolor',
    	array(
			'default' => $recentproductheadingcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_headingcolor',
		array(
		    'label'   		=> __('Product Heading Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// recentproduct price Color
	$recentproductpricecolor = esc_html__('#6f6f6f', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_pricecolor',
    	array(
			'default' => $recentproductpricecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_pricecolor',
		array(
		    'label'   		=> __('Price Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// recentproduct btn1 Color
	$recentproductbtn1color = esc_html__('#535455', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_btn1color',
    	array(
			'default' => $recentproductbtn1color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_btn1color',
		array(
		    'label'   		=> __('Button 1 Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// recentproduct btn2 Color
	$recentproductbtn2color = esc_html__('#FEB805', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_btn2color',
    	array(
			'default' => $recentproductbtn2color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_btn2color',
		array(
		    'label'   		=> __('Button 2 Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// recentproduct btn2text Color
	$recentproductbtn2textcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'recentproduct_btn2textcolor',
    	array(
			'default' => $recentproductbtn2textcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'recentproduct_btn2textcolor',
		array(
		    'label'   		=> __('Button 2 Text Color','supermarket-ecommerce-store'),
		    'section'		=> 'recentproduct_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

    

	$wp_customize->register_control_type('supermarketecommercestore_Tab_Control');

}

add_action( 'customize_register', 'supermarketecommercestore_blog_setting' );

// service selective refresh
function supermarketecommercestore_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'supermarketecommercestore_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'supermarketecommercestore_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'supermarketecommercestore_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'supermarketecommercestore_blog_section_partials' );

// blog_title
function supermarketecommercestore_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function supermarketecommercestore_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function supermarketecommercestore_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}


