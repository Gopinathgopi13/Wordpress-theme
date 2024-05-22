<?php
function supermarketecommercestore_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'supermarket-ecommerce-store'),
		) 
	);

	
	/*=========================================
	Supermarket Ecommerce Store Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','supermarket-ecommerce-store'),
			'panel'  		=> 'header_section',
		)
    );





    // top header Site Title Color
	$topheadersitetitlecol = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_sitetitlecol',
    	array(
			'default' => $topheadersitetitlecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'topheader_sitetitlecol',
		array(
		    'label'   		=> __('Site Title Color','supermarket-ecommerce-store'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// top header Tagline Color
	$topheadertaglinecol = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_taglinecol',
    	array(
			'default' => $topheadertaglinecol,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'topheader_taglinecol',
		array(
		    'label'   		=> __('Tagline Color','supermarket-ecommerce-store'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);
	
 
	/*=========================================
	Supermarket Ecommerce Store header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 5,
            'title' 		=> __('Header','supermarket-ecommerce-store'),
			'panel'  		=> 'header_section',
		)
    );	


    $wp_customize->add_setting('supermarketecommercestore_reset_header_settings',array(
	  'sanitize_callback'   => 'sanitize_text_field'
	));
	$wp_customize->add_control(new supermarketecommercestore_Reset_Custom_Control($wp_customize, 'supermarket_ecommerce_store_reset_header_settings',array(
	  'type' => 'reset_control',
	   'priority' => 1,
	  'label' => __('Reset Header Settings', 'supermarket-ecommerce-store'),
	  'description' => 'supermarket_ecommerce_store_header_reset_settings',
	  'section' => 'top_header'
	)));



    $wp_customize->add_setting('supermarketecommercestore_top_header_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new supermarketecommercestore_Tab_Control($wp_customize, 'supermarketecommercestore_top_header_tabs', array(
	   'section' => 'top_header',
	   'priority' => 1,
	   'buttons' => array(
	      array(
     		'name' => esc_html__('General', 'supermarket-ecommerce-store'),
 			'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
            	'hide_show_sticky',
            	'topheader_btntext',
				'topheader_fblink',
				'topheader_twitterlink',
				'topheader_instalink',
				'topheader_Linkedinlink'
            ),
            'active' => true,
         ),
	      array(
            'name' => esc_html__('Style', 'supermarket-ecommerce-store'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
				'header_topheadbgcolor',
            	'header_menuscolor',
            	'header_menushovercolor',
            	'header_submenusbgcolor',
            	'header_submenusbordercolor',
            	'header_submenutextcolor',
            	'header_submenusbghovercolor',
            	'header_submenustxthovercolor',
				'header_topheadiconscolor',
				'header_topheadiconsbgcolor',
				'header_topheadsignincolor',
				'header_topheadregistercolor',
				'header_bottomheadsearchtextcolor',
				'header_bottomheadsearchiconcolor',
				'header_bottomheadsearchiconbgcolor',
				'header_bottomheadcartcolor',
				'header_bottomheadcartbgcolor',
            	'header_btntextcolor',
            	'header_btnbgcolor1'
            ),
         )
	    
    	),
	)));


	// general setting

	// sticky header
	$wp_customize->add_setting( 'hide_show_sticky',array(
        'default' => false,
        'sanitize_callback' => 'supermarketecommercestore_switch_sanitization'
   	) );
   	$wp_customize->add_control( new supermarketecommercestore_Toggle_Switch_Custom_Control( $wp_customize, 'hide_show_sticky',array(
        'label' => __( 'Show Sticky Header','supermarket-ecommerce-store' ),
        'section' => 'top_header'
   	)));



	// topheader text 1
	$topheaderbtntext = esc_html__('My Account', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_btntext',
    	array(
			'default' => $topheaderbtntext,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_btntext',
		array(
		    'label'   		=> __('Button Text','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// topheader fblink
	$topheaderfblink = esc_html__('#', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_fblink',
    	array(
			'default' => $topheaderfblink,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_fblink',
		array(
		    'label'   		=> __('Facebook Link','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// topheader twitterlink
	$topheadertwitterlink = esc_html__('#', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_twitterlink',
    	array(
			'default' => $topheadertwitterlink,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_twitterlink',
		array(
		    'label'   		=> __('Twitter Link','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// topheader instalink
	$topheaderinstalink = esc_html__('#', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_instalink',
    	array(
			'default' => $topheaderinstalink,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_instalink',
		array(
		    'label'   		=> __('Instagram Link','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	// topheader Linkedinlink
	$topheaderLinkedinlink = esc_html__('#', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'topheader_Linkedinlink',
    	array(
			'default' => $topheaderLinkedinlink,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_Linkedinlink',
		array(
		    'label'   		=> __('Linkedin Link','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	


	// Style setting


	// header topheadbg Color
	$headertopheadbgcolor = esc_html__('#40434c', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_topheadbgcolor',
    	array(
			'default' => $headertopheadbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_topheadbgcolor',
		array(
		    'label'   		=> __('Top Header BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header menus Color
	$headermenuscolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_menuscolor',
    	array(
			'default' => $headermenuscolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_menuscolor',
		array(
		    'label'   		=> __('Menus Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header menushover Color
	$headermenushovercolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_menushovercolor',
    	array(
			'default' => $headermenushovercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_menushovercolor',
		array(
		    'label'   		=> __('Menus Hover Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	$headersubmenusbgcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_submenusbgcolor',
    	array(
			'default' => $headersubmenusbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_submenusbgcolor',
		array(
		    'label'   		=> __('SubMenus BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	$headersubmenusbordercolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_submenusbordercolor',
    	array(
			'default' => $headersubmenusbordercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_submenusbordercolor',
		array(
		    'label'   		=> __('SubMenus Border Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// header submenutext Color
	$headersubmenutextcolor = esc_html__('#000', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_submenutextcolor',
    	array(
			'default' => $headersubmenutextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_submenutextcolor',
		array(
		    'label'   		=> __('SubMenus Text Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header submenusbghover Color
	$headersubmenusbghovercolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_submenusbghovercolor',
    	array(
			'default' => $headersubmenusbghovercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_submenusbghovercolor',
		array(
		    'label'   		=> __('SubMenus BG Hover Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header submenustxthover Color
	$headersubmenustxthovercolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_submenustxthovercolor',
    	array(
			'default' => $headersubmenustxthovercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_submenustxthovercolor',
		array(
		    'label'   		=> __('SubMenus txt Hover Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header topheadicons Color
	$headertopheadiconscolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_topheadiconscolor',
    	array(
			'default' => $headertopheadiconscolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_topheadiconscolor',
		array(
		    'label'   		=> __('Icons Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header topheadiconsbg Color
	$headertopheadiconsbgcolor = esc_html__('#50505a', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_topheadiconsbgcolor',
    	array(
			'default' => $headertopheadiconsbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_topheadiconsbgcolor',
		array(
		    'label'   		=> __('Icons BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header topheadsignin Color
	$headertopheadsignincolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_topheadsignincolor',
    	array(
			'default' => $headertopheadsignincolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_topheadsignincolor',
		array(
		    'label'   		=> __('Sign In Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header topheadregister Color
	$headertopheadregistercolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_topheadregistercolor',
    	array(
			'default' => $headertopheadregistercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_topheadregistercolor',
		array(
		    'label'   		=> __('Register Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header bottomheadsearchtext Color
	$headerbottomheadsearchtextcolor = esc_html__('#7e7e7e', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_bottomheadsearchtextcolor',
    	array(
			'default' => $headerbottomheadsearchtextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_bottomheadsearchtextcolor',
		array(
		    'label'   		=> __('Search Text & Border Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header bottomheadsearchicon Color
	$headerbottomheadsearchiconcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_bottomheadsearchiconcolor',
    	array(
			'default' => $headerbottomheadsearchiconcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_bottomheadsearchiconcolor',
		array(
		    'label'   		=> __('Search Icon Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header bottomheadsearchiconbg Color
	$headerbottomheadsearchiconbgcolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_bottomheadsearchiconbgcolor',
    	array(
			'default' => $headerbottomheadsearchiconbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_bottomheadsearchiconbgcolor',
		array(
		    'label'   		=> __('Search Icon BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header bottomheadcart Color
	$headerbottomheadcartcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_bottomheadcartcolor',
    	array(
			'default' => $headerbottomheadcartcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_bottomheadcartcolor',
		array(
		    'label'   		=> __('Cart Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header bottomheadcartbg Color
	$headerbottomheadcartbgcolor = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_bottomheadcartbgcolor',
    	array(
			'default' => $headerbottomheadcartbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_bottomheadcartbgcolor',
		array(
		    'label'   		=> __('Cart BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);



	// header btntext Color
	$headerbtntextcolor = esc_html__('#fff', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_btntextcolor',
    	array(
			'default' => $headerbtntextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_btntextcolor',
		array(
		    'label'   		=> __('Button Text Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// header btnbg Color 1
	$headerbtnbgcolor1 = esc_html__('#0088fe', 'supermarket-ecommerce-store' );
	$wp_customize->add_setting(
    	'header_btnbgcolor1',
    	array(
			'default' => $headerbtnbgcolor1,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'header_btnbgcolor1',
		array(
		    'label'   		=> __('Button BG Color','supermarket-ecommerce-store'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	

	

	$wp_customize->register_control_type('supermarketecommercestore_Tab_Control');
	$wp_customize->register_panel_type( 'supermarketecommercestore_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'supermarketecommercestore_WP_Customize_Section' );

}
add_action( 'customize_register', 'supermarketecommercestore_header_settings' );



if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class supermarketecommercestore_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'supermarketecommercestore_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class supermarketecommercestore_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'supermarketecommercestore_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}






