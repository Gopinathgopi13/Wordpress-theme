<?php
/**
 * Ecommerce Landing Page Theme Customizer
 *
 * @package Ecommerce Landing Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function ecommerce_landing_page_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'ecommerce_landing_page_custom_controls' );

function ecommerce_landing_page_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'ecommerce_landing_page_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'ecommerce_landing_page_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'ecommerce-landing-page' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('ecommerce_landing_page_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_header_background_color', array(
		'label'    => esc_html__( 'Header Background Color', 'ecommerce-landing-page' ),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_header_img_position',array(
		'type' => 'select',
		'label' => esc_html__( 'Header Image Position', 'ecommerce-landing-page' ) ,
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'ecommerce-landing-page' ),
			'center top'   => esc_html__( 'Top', 'ecommerce-landing-page' ),
			'right top'   => esc_html__( 'Top Right', 'ecommerce-landing-page' ),
			'left center'   => esc_html__( 'Left', 'ecommerce-landing-page' ),
			'center center'   => esc_html__( 'Center', 'ecommerce-landing-page' ),
			'right center'   => esc_html__( 'Right', 'ecommerce-landing-page' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'ecommerce-landing-page' ),
			'center bottom'   => esc_html__( 'Bottom', 'ecommerce-landing-page' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'ecommerce-landing-page' ),
	),
	));

	//Menus Settings
	$wp_customize->add_section( 'ecommerce_landing_page_menu_section' , array(
    	'title' => __( 'Menus Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_panel_id',
		'priority' => 10,
	) );

	$wp_customize->add_setting('ecommerce_landing_page_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_navigation_menu_font_size',array(
		'label'	=> esc_html__( 'Menus Font Size', 'ecommerce-landing-page' ),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => esc_html__( 'Menus Font Weight', 'ecommerce-landing-page' ),
        'section' => 'ecommerce_landing_page_menu_section',
        'choices' => array(
        	'100' => __('100','ecommerce-landing-page'),
            '200' => __('200','ecommerce-landing-page'),
            '300' => __('300','ecommerce-landing-page'),
            '400' => __('400','ecommerce-landing-page'),
            '500' => __('500','ecommerce-landing-page'),
            '600' => __('600','ecommerce-landing-page'),
            '700' => __('700','ecommerce-landing-page'),
            '800' => __('800','ecommerce-landing-page'),
            '900' => __('900','ecommerce-landing-page'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('ecommerce_landing_page_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> esc_html__( 'Menus Text Transform', 'ecommerce-landing-page' ), 
		'choices' => array(
            'Uppercase' => __('Uppercase','ecommerce-landing-page'),
            'Capitalize' => __('Capitalize','ecommerce-landing-page'),
            'Lowercase' => __('Lowercase','ecommerce-landing-page'),
        ),
		'section'=> 'ecommerce_landing_page_menu_section',
	));

	$wp_customize->add_setting('ecommerce_landing_page_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_menus_item_style',array(
        'type' => 'select',
        'section' => 'ecommerce_landing_page_menu_section',
		'label'	=> esc_html__( 'Menu Item Hover Style', 'ecommerce-landing-page' ),
		'choices' => array(
            'None' => __('None','ecommerce-landing-page'),
            'Zoom In' => __('Zoom In','ecommerce-landing-page'),
        ),
	) );

	$wp_customize->add_setting('ecommerce_landing_page_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_header_menus_color', array(
		'label'    => esc_html__( 'Menu Color', 'ecommerce-landing-page' ), 
		'section'  => 'ecommerce_landing_page_menu_section',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_header_menus_hover_color', array(
		'label'    => esc_html__( 'Menu Item Hover Color', 'ecommerce-landing-page' ), 
		'section'  => 'ecommerce_landing_page_menu_section',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_header_submenus_color', array(
		'label'    => esc_html__( 'Sub Menus Color', 'ecommerce-landing-page' ),
		'section'  => 'ecommerce_landing_page_menu_section',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_header_submenus_hover_color', array(
		'label'    => esc_html__( 'Sub Menus Hover Color', 'ecommerce-landing-page' ),
		'section'  => 'ecommerce_landing_page_menu_section',
	)));

	//Topbar
	$wp_customize->add_section('ecommerce_landing_page_topbar_section' , array(
  		'title' => esc_html__( 'Topbar Section', 'ecommerce-landing-page' ), 
		'panel' => 'ecommerce_landing_page_panel_id',
		'priority' => 20,
	) );

	$wp_customize->add_setting('ecommerce_landing_page_topbar_myaccount_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_topbar_myaccount_icon',array(
		'label'	=> esc_html__( 'Add Myaccount Icon', 'ecommerce-landing-page' ), 
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_topbar_section',
		'setting'	=> 'ecommerce_landing_page_topbar_myaccount_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_cart_icon',array(
		'default'	=> 'fas fa-cart-plus',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_cart_icon',array(
		'label'	=>esc_html__( 'Add Cart Icon', 'ecommerce-landing-page' ),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_topbar_section',
		'setting'	=> 'ecommerce_landing_page_cart_icon',
		'type'		=> 'icon'
	)));

	//Banner section
  	$wp_customize->add_section('ecommerce_landing_page_banner',array(
		'title' => esc_html__( 'Banner Section', 'ecommerce-landing-page' ),
		'description' => "For more options of banner section </br><a class='go-pro-btn' target='_blank' href='". esc_url(ECOMMERCE_LANDING_PAGE_GO_PRO) ." '>GET PRO</a>",
		'priority'  => 30,
		'panel' => 'ecommerce_landing_page_panel_id',
	)); 

	$wp_customize->add_setting( 'ecommerce_landing_page_show_hide_banner',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ));
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_show_hide_banner',array(
      	'label' => esc_html__( 'Show / Hide Banner','ecommerce-landing-page' ),
      	'section' => 'ecommerce_landing_page_banner',
      	'priority' => 20,
    )));

	$wp_customize->add_setting('ecommerce_landing_page_banner_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_banner_background_color', array(
		'label'    => esc_html__( 'Banner Background Color', 'ecommerce-landing-page' ),
		'section'  => 'ecommerce_landing_page_banner',
		'priority' => 22,
	)));

   $wp_customize->add_setting('ecommerce_landing_page_tagline_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_landing_page_tagline_title',array(
		'label'	=> esc_html__( 'Banner Title', 'ecommerce-landing-page' ), 
		'section'	=> 'ecommerce_landing_page_banner',
		'type'		=> 'text',
		'priority' => 24,
		'input_attrs' => array(
	      'placeholder' => __( 'Enjoy Every Single Beat On Headphone', 'ecommerce-landing-page' ),
	    ),
	));

	 $wp_customize->add_setting('ecommerce_landing_page_designation_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_landing_page_designation_text',array(
		'label'	=>esc_html__( 'Banner Content', 'ecommerce-landing-page' ),
		'section'	=> 'ecommerce_landing_page_banner',
		'type'		=> 'text',
		'priority' => 26,
		'input_attrs' => array(
	      'placeholder' => __( 'Add text here', 'ecommerce-landing-page' ),
	    ),
	));

	$wp_customize->add_setting('ecommerce_landing_page_banner_button_label',array(
		'default' => esc_html__( '', 'ecommerce-landing-page' ),
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_banner_button_label',array(
		'label' => esc_html__( 'Button', 'ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_banner',
		'setting' => 'ecommerce_landing_page_banner_button_label',
		'type' => 'text',
		'priority' => 27,
		'input_attrs' => array(
	      'placeholder' => __( 'Add Button Text Here', 'ecommerce-landing-page' ),
	    ),
	));

	$wp_customize->add_setting('ecommerce_landing_page_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('ecommerce_landing_page_top_button_url',array(
		'label'	=> esc_html__( 'Add Button URL', 'ecommerce-landing-page' ), 
		'section'	=> 'ecommerce_landing_page_banner',
		'setting'	=> 'ecommerce_landing_page_top_button_url',
		'type'	=> 'url',
		'priority' => 28,
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_show_hide_product',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ));
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_show_hide_product',array(
      	'label' => esc_html__( 'Show / Hide Product','ecommerce-landing-page' ),
      	'section' => 'ecommerce_landing_page_banner'
    )));

   $wp_customize->add_setting('ecommerce_landing_page_product_small_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_landing_page_product_small_text',array(
		'label'	=> esc_html__( 'Product Title', 'ecommerce-landing-page' ),
		'section'	=> 'ecommerce_landing_page_banner',
		'type'		=> 'text'
	));
	
	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ecommerce_landing_page_product_category',array(
		'default'	=> esc_html__( 'Select', 'ecommerce-landing-page' ),
		'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices',
	));
	$wp_customize->add_control('ecommerce_landing_page_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => esc_html__( 'Select Popular Product Category', 'ecommerce-landing-page' ), 
		'section' => 'ecommerce_landing_page_banner',
	));

	//Ecommerce About Section
	$wp_customize->add_section('ecommerce_landing_page_about', array(
		'title'       => __('Ecommerce About Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_about_text',array(
		'description' => __('<p>1. More options for ecommerce about section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for ecommerce about section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_about',
		'type'=> 'hidden'
	));

	//  Latest News And Blog Section
	$wp_customize->add_section('ecommerce_landing_page_latest_news_blog_section',array(
		'title'	=> __('Latest News And Blog Section','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_panel_id',
		'description' => "For more options of latest news and blog section section </br><a class='go-pro-btn' target='_blank' href='". esc_url(ECOMMERCE_LANDING_PAGE_GO_PRO) ." '>GET PRO</a>",
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_latest_news_blog_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_latest_news_blog_heading', array(
		'label'    => __( 'Add Section Heading', 'ecommerce-landing-page' ),
		'input_attrs' => array(
            'placeholder' => __( 'Latest News & Blog', 'ecommerce-landing-page' ),
        ),
		'section'  => 'ecommerce_landing_page_latest_news_blog_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'ecommerce_landing_page_latest_news_blog_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_latest_news_blog_small_title', array(
		'label'    => __( 'Add Section Text', 'ecommerce-landing-page' ),
		'section'  => 'ecommerce_landing_page_latest_news_blog_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ecommerce_landing_page_events_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices',
	));
	$wp_customize->add_control('ecommerce_landing_page_events_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display events','ecommerce-landing-page'),
		'section' => 'ecommerce_landing_page_latest_news_blog_section',
	));

	$wp_customize->add_setting('ecommerce_landing_page_latest_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_latest_post_author_icon',array(
		'label'	=> __('Add Author Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_latest_news_blog_section',
		'setting'	=> 'ecommerce_landing_page_latest_post_author_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_blog_latest_post_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_latest_post_author',array(
		'label' => esc_html__( 'Show / Hide Author','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_latest_news_blog_section'
	)));

  	$wp_customize->add_setting('ecommerce_landing_page_latest_post_comments_icon',array(
		'default'	=> 'fas fa-comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_latest_post_comments_icon',array(
		'label'	=> __('Add Comments Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_latest_news_blog_section',
		'setting'	=> 'ecommerce_landing_page_latest_post_comments_icon',
		'type'		=> 'icon'
	)));

 	 $wp_customize->add_setting( 'ecommerce_landing_page_blog_latest_post_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
 	 ) );
  	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_latest_post_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_latest_news_blog_section'
  	)));

	//Eccomerce Flash Product Section
	$wp_customize->add_section('ecommerce_landing_page_eccomerce_flash_product', array(
		'title'       => __('Eccomerce Flash Product Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_eccomerce_flash_product_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_eccomerce_flash_product_text',array(
		'description' => __('<p>1. More options for eccomerce flash product section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for eccomerce flash product section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_eccomerce_flash_product',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_eccomerce_flash_product_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_eccomerce_flash_product_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_eccomerce_flash_product',
		'type'=> 'hidden'
	));

	//Ecommerce Feature Section
	$wp_customize->add_section('ecommerce_landing_page_ecommerce_feature', array(
		'title'       => __('Ecommerce Feature Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_ecommerce_feature_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_ecommerce_feature_text',array(
		'description' => __('<p>1. More options for ecommerce feature section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for ecommerce feature section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_ecommerce_feature',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_ecommerce_feature_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_ecommerce_feature_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_ecommerce_feature',
		'type'=> 'hidden'
	));


	//Our Headphone Section
	$wp_customize->add_section('ecommerce_landing_page_our_headphone', array(
		'title'       => __('Our Headphone Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_our_headphone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_our_headphone_text',array(
		'description' => __('<p>1. More options for our headphone section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our headphone section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_our_headphone',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_our_headphone_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_our_headphone_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_our_headphone',
		'type'=> 'hidden'
	));

	//Eccomerce Services Section
	$wp_customize->add_section('ecommerce_landing_page_eccomerce_services', array(
		'title'       => __('Eccomerce Services Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_eccomerce_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_eccomerce_services_text',array(
		'description' => __('<p>1. More options for eccomerce services section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for eccomerce services section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_eccomerce_services',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_eccomerce_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_eccomerce_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_eccomerce_services',
		'type'=> 'hidden'
	));

	//FAQ Section
	$wp_customize->add_section('ecommerce_landing_page_faq', array(
		'title'       => __('FAQ Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_faq_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_faq_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_faq',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_faq_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_faq_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_faq',
		'type'=> 'hidden'
	));

	//Ecommerce gallery Section
	$wp_customize->add_section('ecommerce_landing_page_gallery', array(
		'title'       => __('Ecommerce Gallery Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_gallery_text',array(
		'description' => __('<p>1. More options for ecommerce gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for ecommerce gallery section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_gallery',
		'type'=> 'hidden'
	));

	//Ecommerce testimonial Section
	$wp_customize->add_section('ecommerce_landing_page_testimonial', array(
		'title'       => __('Ecommerce Testimonial Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_testimonial_text',array(
		'description' => __('<p>1. More options for ecommerce testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for ecommerce testimonial section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_testimonial',
		'type'=> 'hidden'
	));

	//Blog Section
	$wp_customize->add_section('ecommerce_landing_page_blog', array(
		'title'       => __('Blog Section', 'ecommerce-landing-page'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','ecommerce-landing-page'),
		'priority'    => null,
		'panel'       => 'ecommerce_landing_page_panel_id',
	));

	$wp_customize->add_setting('ecommerce_landing_page_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('ecommerce_landing_page_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=ecommerce_landing_page_guide') ." '>More Info</a>",
		'section'=> 'ecommerce_landing_page_blog',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('ecommerce_landing_page_footer',array(
		'title'	=> esc_html__('Footer Settings','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_panel_id',
		'description' => "For more options of footer section </br><a class='go-pro-btn' target='_blank' href='". esc_url(ECOMMERCE_LANDING_PAGE_GO_PRO) ." '>GET PRO</a>",
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_footer_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_footer'
	)));

	// font size 
	$wp_customize->add_setting('ecommerce_landing_page_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','ecommerce-landing-page'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'ecommerce_landing_page_footer',
	));

	$wp_customize->add_setting('ecommerce_landing_page_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','ecommerce-landing-page'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'ecommerce_landing_page_footer',
	));

	// text trasform
	$wp_customize->add_setting('ecommerce_landing_page_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','ecommerce-landing-page'),
		'choices' => array(
      'Uppercase' => __('Uppercase','ecommerce-landing-page'),
      'Capitalize' => __('Capitalize','ecommerce-landing-page'),
      'Lowercase' => __('Lowercase','ecommerce-landing-page'),
    ),
		'section'=> 'ecommerce_landing_page_footer',
	));

	$wp_customize->add_setting('ecommerce_landing_page_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_footer',
        'choices' => array(
        	'100' => __('100','ecommerce-landing-page'),
            '200' => __('200','ecommerce-landing-page'),
            '300' => __('300','ecommerce-landing-page'),
            '400' => __('400','ecommerce-landing-page'),
            '500' => __('500','ecommerce-landing-page'),
            '600' => __('600','ecommerce-landing-page'),
            '700' => __('700','ecommerce-landing-page'),
            '800' => __('800','ecommerce-landing-page'),
            '900' => __('900','ecommerce-landing-page'),
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('ecommerce_landing_page_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_ecommerce_landing_page_footer_text',
	));

	$wp_customize->add_setting('ecommerce_landing_page_footer_template',array(
	  'default'	=> esc_html('ecommerce_landing_page-footer-one'),
	  'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_footer_template',array(
		'label'	=> esc_html__('Footer Style','ecommerce-landing-page'),
		'section'	=> 'ecommerce_landing_page_footer',
		'setting'	=> 'ecommerce_landing_page_footer_template',
		'type' => 'select',
		'choices' => array(
		    'ecommerce_landing_page-footer-one' => esc_html__('Style 1', 'ecommerce-landing-page'),
		    'ecommerce_landing_page-footer-two' => esc_html__('Style 2', 'ecommerce-landing-page'),
		    'ecommerce_landing_page-footer-three' => esc_html__('Style 3', 'ecommerce-landing-page'),
		    'ecommerce_landing_page-footer-four' => esc_html__('Style 4', 'ecommerce-landing-page'),
		    'ecommerce_landing_page-footer-five' => esc_html__('Style 5', 'ecommerce-landing-page'),
		    )
	));

	$wp_customize->add_setting('ecommerce_landing_page_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_footer_background_color', array(
		'label'    => __('Footer Background Color', 'ecommerce-landing-page'),
		'section'  => 'ecommerce_landing_page_footer',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'ecommerce_landing_page_footer_background_image',array(
      'label' => __('Footer Background Image','ecommerce-landing-page'),
      'section' => 'ecommerce_landing_page_footer'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','ecommerce-landing-page'),
		'section' => 'ecommerce_landing_page_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'ecommerce-landing-page' ),
			'center top'   => esc_html__( 'Top', 'ecommerce-landing-page' ),
			'right top'   => esc_html__( 'Top Right', 'ecommerce-landing-page' ),
			'left center'   => esc_html__( 'Left', 'ecommerce-landing-page' ),
			'center center'   => esc_html__( 'Center', 'ecommerce-landing-page' ),
			'right center'   => esc_html__( 'Right', 'ecommerce-landing-page' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'ecommerce-landing-page' ),
			'center bottom'   => esc_html__( 'Bottom', 'ecommerce-landing-page' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'ecommerce-landing-page' ),
		),
	));

  // Footer
  $wp_customize->add_setting('ecommerce_landing_page_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
  ));
  $wp_customize->add_control('ecommerce_landing_page_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','ecommerce-landing-page'),
    'choices' => array(
      'fixed' => __('fixed','ecommerce-landing-page'),
      'scroll' => __('scroll','ecommerce-landing-page'),
    ),
    'section'=> 'ecommerce_landing_page_footer',
  ));

  // footer padding
  $wp_customize->add_setting('ecommerce_landing_page_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('ecommerce_landing_page_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','ecommerce-landing-page'),
    'description' => __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
    'section'=> 'ecommerce_landing_page_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('ecommerce_landing_page_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
  ));
  $wp_customize->add_control('ecommerce_landing_page_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_footer',
    'choices' => array(
      'Left' => __('Left','ecommerce-landing-page'),
      'Center' => __('Center','ecommerce-landing-page'),
      'Right' => __('Right','ecommerce-landing-page')
    ),
  ) );

  $wp_customize->add_setting('ecommerce_landing_page_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
  ));
  $wp_customize->add_control('ecommerce_landing_page_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_footer',
    'choices' => array(
      'Left' => __('Left','ecommerce-landing-page'),
      'Center' => __('Center','ecommerce-landing-page'),
      'Right' => __('Right','ecommerce-landing-page')
    ),
  	) );

	$wp_customize->add_setting('ecommerce_landing_page_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_footer_text',array(
		'label'	=> esc_html__('Copyright Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_footer'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Image_Radio_Control($wp_customize, 'ecommerce_landing_page_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_footer',
        'settings' => 'ecommerce_landing_page_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting('ecommerce_landing_page_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'ecommerce-landing-page'),
		'section'  => 'ecommerce_landing_page_footer',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_copyright_font_size',array(
		'label' => __('Copyright Font Size','ecommerce-landing-page'),
		'description' => __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'ecommerce-landing-page' ),
		    ),
		'section'=> 'ecommerce_landing_page_footer',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'ecommerce_landing_page_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ));
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','ecommerce-landing-page' ),
      	'section' => 'ecommerce_landing_page_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('ecommerce_landing_page_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_ecommerce_landing_page_scroll_to_top_icon',
	));

    $wp_customize->add_setting('ecommerce_landing_page_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Image_Radio_Control($wp_customize, 'ecommerce_landing_page_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_footer',
        'settings' => 'ecommerce_landing_page_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

     $wp_customize->add_setting('ecommerce_landing_page_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser($wp_customize,'ecommerce_landing_page_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','ecommerce-landing-page'),
    'transport' => 'refresh',
    'section' => 'ecommerce_landing_page_footer',
    'setting' => 'ecommerce_landing_page_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('ecommerce_landing_page_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('ecommerce_landing_page_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','ecommerce-landing-page'),
    'description' => __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
    'section'=> 'ecommerce_landing_page_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('ecommerce_landing_page_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('ecommerce_landing_page_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','ecommerce-landing-page'),
    'description' => __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
    'section'=> 'ecommerce_landing_page_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('ecommerce_landing_page_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('ecommerce_landing_page_scroll_to_top_width',array(
    'label' => __('Icon Width','ecommerce-landing-page'),
    'description' => __('Enter a value in pixels Example:20px','ecommerce-landing-page'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
  ),
  'section'=> 'ecommerce_landing_page_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('ecommerce_landing_page_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('ecommerce_landing_page_scroll_to_top_height',array(
    'label' => __('Icon Height','ecommerce-landing-page'),
    'description' => __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
    'section'=> 'ecommerce_landing_page_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'ecommerce_landing_page_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'ecommerce_landing_page_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','ecommerce-landing-page' ),
    'section'     => 'ecommerce_landing_page_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

   	//Blog Post
	$wp_customize->add_panel( 'ecommerce_landing_page_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'ecommerce_landing_page_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('ecommerce_landing_page_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_ecommerce_landing_page_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('ecommerce_landing_page_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
  ));
  $wp_customize->add_control(new Ecommerce_Landing_Page_Image_Radio_Control($wp_customize, 'ecommerce_landing_page_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('ecommerce_landing_page_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','ecommerce-landing-page'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','ecommerce-landing-page'),
            'Right Sidebar' => esc_html__('Right Sidebar','ecommerce-landing-page'),
            'One Column' => esc_html__('One Column','ecommerce-landing-page'),
            'Grid Layout' => esc_html__('Grid Layout','ecommerce-landing-page')
        ),
	) );

 	$wp_customize->add_setting('ecommerce_landing_page_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','ecommerce-landing-page'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','ecommerce-landing-page'),
        'Right Sidebar' => esc_html__('Right Sidebar','ecommerce-landing-page'),
        'One Column' => esc_html__('One Column','ecommerce-landing-page'),
        'Grid Layout' => esc_html__('Grid Layout','ecommerce-landing-page')
        ),
	) );

	$wp_customize->add_setting('ecommerce_landing_page_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','ecommerce-landing-page'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','ecommerce-landing-page'),
        'Right Sidebar' => esc_html__('Right Sidebar','ecommerce-landing-page'),
        'One Column' => esc_html__('One Column','ecommerce-landing-page'),
        'Grid Layout' => esc_html__('Grid Layout','ecommerce-landing-page')
        ),
	) );

  	$wp_customize->add_setting('ecommerce_landing_page_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_post_settings',
		'setting'	=> 'ecommerce_landing_page_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'ecommerce_landing_page_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ));
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','ecommerce-landing-page' ),
    'section' => 'ecommerce_landing_page_post_settings'
  )));

	$wp_customize->add_setting('ecommerce_landing_page_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_post_settings',
		'setting'	=> 'ecommerce_landing_page_toggle_author_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_post_settings'
	)));

  	$wp_customize->add_setting('ecommerce_landing_page_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_post_settings',
		'setting'	=> 'ecommerce_landing_page_toggle_comments_icon',
		'type'		=> 'icon'
	)));

 	 $wp_customize->add_setting( 'ecommerce_landing_page_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ) );
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_post_settings'
  )));

  $wp_customize->add_setting('ecommerce_landing_page_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_post_settings',
		'setting'	=> 'ecommerce_landing_page_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'ecommerce_landing_page_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ) );
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_post_settings'
  )));

  $wp_customize->add_setting( 'ecommerce_landing_page_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_post_settings'
  )));

  $wp_customize->add_setting( 'ecommerce_landing_page_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'ecommerce_landing_page_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('ecommerce_landing_page_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','ecommerce-landing-page'),
		'section'	=> 'ecommerce_landing_page_post_settings',
		'choices' => array(
		'default' => __('Default','ecommerce-landing-page'),
		'custom' => __('Custom Image Size','ecommerce-landing-page'),
      ),
	));

	$wp_customize->add_setting('ecommerce_landing_page_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('ecommerce_landing_page_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'ecommerce-landing-page' ),),
		'section'=> 'ecommerce_landing_page_post_settings',
		'type'=> 'text',
		'active_callback' => 'ecommerce_landing_page_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('ecommerce_landing_page_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'ecommerce-landing-page' ),),
		'section'=> 'ecommerce_landing_page_post_settings',
		'type'=> 'text',
		'active_callback' => 'ecommerce_landing_page_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'ecommerce_landing_page_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_post_settings',
		'type'        => 'range',
		'settings'    => 'ecommerce_landing_page_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('ecommerce_landing_page_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','ecommerce-landing-page'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('ecommerce_landing_page_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','ecommerce-landing-page'),
        'Excerpt' => esc_html__('Excerpt','ecommerce-landing-page'),
        'No Content' => esc_html__('No Content','ecommerce-landing-page')
        ),
	) );

  $wp_customize->add_setting('ecommerce_landing_page_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','ecommerce-landing-page'),
        'Without Blocks' => __('Without Blocks','ecommerce-landing-page')
        ),
	) );

	$wp_customize->add_setting( 'ecommerce_landing_page_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ));
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_post_settings'
  )));

	$wp_customize->add_setting('ecommerce_landing_page_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
  ));
  $wp_customize->add_control( 'ecommerce_landing_page_blog_pagination_type', array(
    'section' => 'ecommerce_landing_page_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'ecommerce-landing-page' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'ecommerce-landing-page' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'ecommerce-landing-page' ),
  )));

    // Button Settings
	$wp_customize->add_section( 'ecommerce_landing_page_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('ecommerce_landing_page_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_ecommerce_landing_page_button_text',
	));

  $wp_customize->add_setting('ecommerce_landing_page_button_text',array(
		'default'=> esc_html__('Read More','ecommerce-landing-page'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_text',array(
		'label'	=> esc_html__('Add Button Text','ecommerce-landing-page'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('ecommerce_landing_page_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_font_size',array(
		'label'	=> __('Button Font Size','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'ecommerce_landing_page_button_settings',
	));


	$wp_customize->add_setting( 'ecommerce_landing_page_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('ecommerce_landing_page_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
		'section'=> 'ecommerce_landing_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'ecommerce-landing-page' ),
    ),
		'section'=> 'ecommerce_landing_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'ecommerce-landing-page' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'ecommerce_landing_page_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('ecommerce_landing_page_button_text_transform',array(
		'default'=> 'uppercase',
		'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','ecommerce-landing-page'),
		'choices' => array(
      'Uppercase' => __('Uppercase','ecommerce-landing-page'),
      'Capitalize' => __('Capitalize','ecommerce-landing-page'),
      'Lowercase' => __('Lowercase','ecommerce-landing-page'),
    ),
		'section'=> 'ecommerce_landing_page_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'ecommerce_landing_page_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('ecommerce_landing_page_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'ecommerce_landing_page_Customize_partial_ecommerce_landing_page_related_post_title',
	));

  $wp_customize->add_setting( 'ecommerce_landing_page_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ) );
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_related_post',array(
		'label' => esc_html__( 'Related Post','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_related_posts_settings'
  )));

  $wp_customize->add_setting('ecommerce_landing_page_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('ecommerce_landing_page_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'ecommerce_landing_page_sanitize_number_absint'
	));
	$wp_customize->add_control('ecommerce_landing_page_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'ecommerce_landing_page_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'ecommerce_landing_page_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('ecommerce_landing_page_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_single_blog_settings',
		'setting'	=> 'ecommerce_landing_page_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'ecommerce_landing_page_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	) );
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_postdate',array(
	   'label' => esc_html__( 'Show / Hide Date','ecommerce-landing-page' ),
	   'section' => 'ecommerce_landing_page_single_blog_settings'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_single_author_icon',array(
		'label'	=> __('Add Author Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_single_blog_settings',
		'setting'	=> 'ecommerce_landing_page_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'ecommerce_landing_page_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	) );
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','ecommerce-landing-page' ),
	    'section' => 'ecommerce_landing_page_single_blog_settings'
	)));

   	$wp_customize->add_setting('ecommerce_landing_page_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_single_blog_settings',
		'setting'	=> 'ecommerce_landing_page_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	) );
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','ecommerce-landing-page' ),
	    'section' => 'ecommerce_landing_page_single_blog_settings'
	)));

  	$wp_customize->add_setting('ecommerce_landing_page_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_single_time_icon',array(
		'label'	=> __('Add Time Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_single_blog_settings',
		'setting'	=> 'ecommerce_landing_page_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	) );
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','ecommerce-landing-page' ),
	    'section' => 'ecommerce_landing_page_single_blog_settings'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_single_blog_settings'
  )));

	$wp_customize->add_setting( 'ecommerce_landing_page_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'ecommerce_landing_page_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_single_blog_settings'
    )));

	$wp_customize->add_setting('ecommerce_landing_page_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','ecommerce-landing-page'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	));
	$wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','ecommerce-landing-page' ),
		  'section' => 'ecommerce_landing_page_single_blog_settings'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
   $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('ecommerce_landing_page_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','ecommerce-landing-page'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'ecommerce-landing-page' ),
    	),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','ecommerce-landing-page'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','ecommerce-landing-page'),
		'description'	=> __('Enter a value in %. Example:50%','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'ecommerce_landing_page_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('ecommerce_landing_page_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_grid_layout_settings',
		'setting'	=> 'ecommerce_landing_page_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ecommerce_landing_page_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
  ) );
  $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','ecommerce-landing-page' ),
    'section' => 'ecommerce_landing_page_grid_layout_settings'
  )));

	$wp_customize->add_setting('ecommerce_landing_page_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_grid_author_icon',array(
		'label'	=> __('Add Author Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_grid_layout_settings',
		'setting'	=> 'ecommerce_landing_page_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'ecommerce_landing_page_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_grid_layout_settings'
    )));

    $wp_customize->add_setting('ecommerce_landing_page_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_grid_layout_settings',
		'setting'	=> 'ecommerce_landing_page_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'ecommerce_landing_page_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_grid_layout_settings'
    )));

    $wp_customize->add_setting('ecommerce_landing_page_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_grid_time_icon',array(
		'label'	=> __('Add Time Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_grid_layout_settings',
		'setting'	=> 'ecommerce_landing_page_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'ecommerce_landing_page_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','ecommerce-landing-page' ),
		'section' => 'ecommerce_landing_page_grid_layout_settings'
    )));

 	$wp_customize->add_setting('ecommerce_landing_page_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','ecommerce-landing-page'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','ecommerce-landing-page'),
		'section'=> 'ecommerce_landing_page_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('ecommerce_landing_page_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','ecommerce-landing-page'),
    'section' => 'ecommerce_landing_page_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','ecommerce-landing-page'),
      'Without Blocks' => __('Without Blocks','ecommerce-landing-page')
      ),
	) );

  	$wp_customize->add_setting('ecommerce_landing_page_grid_button_text',array(
		'default'=> esc_html__('Read More','ecommerce-landing-page'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('ecommerce_landing_page_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','ecommerce-landing-page'),
            'Excerpt' => esc_html__('Excerpt','ecommerce-landing-page'),
            'No Content' => esc_html__('No Content','ecommerce-landing-page')
        ),
	) );

    $wp_customize->add_setting( 'ecommerce_landing_page_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'ecommerce_landing_page_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'ecommerce_landing_page_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'ecommerce-landing-page' ),
		'panel' => 'ecommerce_landing_page_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'ecommerce_landing_page_left_right', array(
    	'title' => esc_html__('General Settings', 'ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_other_parent_panel'
	) );

	$wp_customize->add_setting('ecommerce_landing_page_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Image_Radio_Control($wp_customize, 'ecommerce_landing_page_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','ecommerce-landing-page'),
        'description' => esc_html__('Here you can change the width layout of Website.','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('ecommerce_landing_page_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','ecommerce-landing-page'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','ecommerce-landing-page'),
            'Right_Sidebar' => esc_html__('Right Sidebar','ecommerce-landing-page'),
            'One_Column' => esc_html__('One Column','ecommerce-landing-page')
        ),
	) );
	
    // Pre-Loader
	$wp_customize->add_setting( 'ecommerce_landing_page_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','ecommerce-landing-page' ),
        'section' => 'ecommerce_landing_page_left_right'
    )));

	$wp_customize->add_setting('ecommerce_landing_page_preloader_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'ecommerce-landing-page'),
		'section'  => 'ecommerce_landing_page_left_right',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'ecommerce-landing-page'),
		'section'  => 'ecommerce_landing_page_left_right',
	)));

	$wp_customize->add_setting('ecommerce_landing_page_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'ecommerce_landing_page_preloader_bg_img',array(
        'label' => __('Preloader Background Image','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('ecommerce_landing_page_404_page',array(
		'title'	=> __('404 Page Settings','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_other_parent_panel',
	));

	$wp_customize->add_setting('ecommerce_landing_page_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_404_page_title',array(
		'label'	=> __('Add Title','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_404_page_content',array(
		'label'	=> __('Add Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_404_page_button_text',array(
		'label'	=> __('Add Button Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('ecommerce_landing_page_no_results_page',array(
		'title'	=> __('No Results Page Settings','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_other_parent_panel',
	));

	$wp_customize->add_setting('ecommerce_landing_page_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_no_results_page_title',array(
		'label'	=> __('Add Title','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_landing_page_no_results_page_content',array(
		'label'	=> __('Add Text','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('ecommerce_landing_page_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_other_parent_panel',
	));

	$wp_customize->add_setting('ecommerce_landing_page_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_social_icon_padding',array(
		'label'	=> __('Icon Padding','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_social_icon_width',array(
		'label'	=> __('Icon Width','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_social_icon_height',array(
		'label'	=> __('Icon Height','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('ecommerce_landing_page_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','ecommerce-landing-page'),
		'panel' => 'ecommerce_landing_page_other_parent_panel',
	));

    $wp_customize->add_setting( 'ecommerce_landing_page_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ));
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','ecommerce-landing-page' ),
      	'section' => 'ecommerce_landing_page_responsive_media'
    )));

    $wp_customize->add_setting('ecommerce_landing_page_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_responsive_media',
		'setting'	=> 'ecommerce_landing_page_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'ecommerce_landing_page_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','ecommerce-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'ecommerce_landing_page_responsive_media',
		'setting'	=> 'ecommerce_landing_page_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('ecommerce_landing_page_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_landing_page_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'ecommerce-landing-page'),
		'section'  => 'ecommerce_landing_page_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('ecommerce_landing_page_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'ecommerce-landing-page'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));


   $wp_customize->add_setting('ecommerce_landing_page_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ecommerce-landing-page'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-landing-page'),
        ),
	) );


   $wp_customize->add_setting('ecommerce_landing_page_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ecommerce-landing-page'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-landing-page'),
        ),
	) );

	//Products padding
	$wp_customize->add_setting('ecommerce_landing_page_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'ecommerce_landing_page_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'ecommerce_landing_page_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'ecommerce_landing_page_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('ecommerce_landing_page_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('ecommerce_landing_page_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_landing_page_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','ecommerce-landing-page'),
        'section' => 'ecommerce_landing_page_woocommerce_section',
        'choices' => array(
            'left' => __('Left','ecommerce-landing-page'),
            'right' => __('Right','ecommerce-landing-page'),
        ),
	) );

	$wp_customize->add_setting('ecommerce_landing_page_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('ecommerce_landing_page_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_landing_page_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','ecommerce-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','ecommerce-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'ecommerce-landing-page' ),
        ),
		'section'=> 'ecommerce_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'ecommerce_landing_page_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ecommerce_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'ecommerce_landing_page_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','ecommerce-landing-page' ),
		'section'     => 'ecommerce_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'ecommerce_landing_page_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'ecommerce_landing_page_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','ecommerce-landing-page' ),
        'section' => 'ecommerce_landing_page_woocommerce_section'
    )));


}

add_action( 'customize_register', 'ecommerce_landing_page_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ecommerce_Landing_Page_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ecommerce_Landing_Page_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Ecommerce_Landing_Page_Customize_Section_Pro( $manager,'ecommerce_landing_page_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'ECOMMERCE PRO', 'ecommerce-landing-page' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'ecommerce-landing-page' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/landing-page-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Ecommerce_Landing_Page_Customize_Section_Pro($manager,'ecommerce_landing_page_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'ecommerce-landing-page' ),
			'pro_text' => esc_html__( 'DOCS', 'ecommerce-landing-page' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-ecommerce-landing-page//'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ecommerce-landing-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ecommerce-landing-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ecommerce_Landing_Page_Customize::get_instance();
