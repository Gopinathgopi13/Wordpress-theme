<?php

	$ecommerce_landing_page_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$ecommerce_landing_page_first_color = get_theme_mod('ecommerce_landing_page_first_color');

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar .widget_block h3, #sidebar h2, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.bradcrumbs a, .post-categories li a,.bradcrumbs span,.wp-block-button__link,#sidebar .wp-block-tag-cloud a:hover,#footer .wp-block-tag-cloud a:hover,#footer-2,.read-more a,.compare-btn a, .compare-btn-banner a,.menu-section,.myaccount-icon i, .cart-no i,.events-box:hover span.event-date, .events-box:hover span.event-location,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.small-headphone:hover{';
			$ecommerce_landing_page_custom_css .='background: '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='#sidebar ul li::before,#footer-2,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale{';
			$ecommerce_landing_page_custom_css .='background: '.esc_attr($ecommerce_landing_page_first_color).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item,.main-navigation ul ul li a:hover,.main-navigation ul ul a:focus, .main-navigation ul ul a:hover,p.site-title a:hover, .logo h1 a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a,#best-product-section .product-box:hover .product-box-content h3 a,.events-box:hover h3 a,#today a, .wp-calendar-nav-prev a,rssSummary,#sidebar ul li:hover,.wp-block-latest-comments__comment-meta a,.sticky .post-main-box h2:before,.post-main-box:hover h3 a, #sidebar ul li a:hover, #footer li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-navigation a:hover, .post-navigation a:focus,.woocommerce-MyAccount-content a,.post-navigation span.meta-nav:hover, #content-vw a{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_first_color).' !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.home-page-header,.main-navigation ul ul,.slider-nav-image-sec,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale{';
			$ecommerce_landing_page_custom_css .='border-color: '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation ul ul{';
			$ecommerce_landing_page_custom_css .='border-bottom:2px solid '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_width_option','Full Width');
    if($ecommerce_landing_page_theme_lay == 'Boxed'){
		$ecommerce_landing_page_custom_css .='body{';
			$ecommerce_landing_page_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='right: 100px;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.row.outer-logo{';
			$ecommerce_landing_page_custom_css .='margin-left: 0px;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_theme_lay == 'Wide Width'){
		$ecommerce_landing_page_custom_css .='body{';
			$ecommerce_landing_page_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='right: 30px;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.row.outer-logo{';
			$ecommerce_landing_page_custom_css .='margin-left: 0px;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_theme_lay == 'Full Width'){
		$ecommerce_landing_page_custom_css .='body{';
			$ecommerce_landing_page_custom_css .='max-width: 100%;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$ecommerce_landing_page_resp_slider = get_theme_mod( 'ecommerce_landing_page_resp_slider_hide_show',false);
	if($ecommerce_landing_page_resp_slider == true && get_theme_mod( 'ecommerce_landing_page_slider_hide_show', false) == false){
    	$ecommerce_landing_page_custom_css .='#slider{';
			$ecommerce_landing_page_custom_css .='display:none;';
		$ecommerce_landing_page_custom_css .='} ';
	}
    if($ecommerce_landing_page_resp_slider == true){
    	$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_landing_page_custom_css .='#slider{';
			$ecommerce_landing_page_custom_css .='display:block;';
		$ecommerce_landing_page_custom_css .='} }';
	}else if($ecommerce_landing_page_resp_slider == false){
		$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_landing_page_custom_css .='#slider{';
			$ecommerce_landing_page_custom_css .='display:none;';
		$ecommerce_landing_page_custom_css .='} }';
		$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_landing_page_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$ecommerce_landing_page_custom_css .='margin-top: 45px;';
		$ecommerce_landing_page_custom_css .='} }';
	}

	$ecommerce_landing_page_resp_sidebar = get_theme_mod( 'ecommerce_landing_page_sidebar_hide_show',true);
    if($ecommerce_landing_page_resp_sidebar == true){
    	$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_landing_page_custom_css .='#sidebar{';
			$ecommerce_landing_page_custom_css .='display:block;';
		$ecommerce_landing_page_custom_css .='} }';
	}else if($ecommerce_landing_page_resp_sidebar == false){
		$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_landing_page_custom_css .='#sidebar{';
			$ecommerce_landing_page_custom_css .='display:none;';
		$ecommerce_landing_page_custom_css .='} }';
	}

	$ecommerce_landing_page_resp_scroll_top = get_theme_mod( 'ecommerce_landing_page_resp_scroll_top_hide_show',true);
	if($ecommerce_landing_page_resp_scroll_top == true && get_theme_mod( 'ecommerce_landing_page_hide_show_scroll',true) == false){
    	$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='visibility:hidden !important;';
		$ecommerce_landing_page_custom_css .='} ';
	}
    if($ecommerce_landing_page_resp_scroll_top == true){
    	$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='visibility:visible !important;';
		$ecommerce_landing_page_custom_css .='} }';
	}else if($ecommerce_landing_page_resp_scroll_top == false){
		$ecommerce_landing_page_custom_css .='@media screen and (max-width:575px){';
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='visibility:hidden !important;';
		$ecommerce_landing_page_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$ecommerce_landing_page_copyright_alingment = get_theme_mod('ecommerce_landing_page_copyright_alingment');
	if($ecommerce_landing_page_copyright_alingment != false){
		$ecommerce_landing_page_custom_css .='.copyright p{';
			$ecommerce_landing_page_custom_css .='text-align: '.esc_attr($ecommerce_landing_page_copyright_alingment).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$ecommerce_landing_page_preloader_bg_color = get_theme_mod('ecommerce_landing_page_preloader_bg_color');
	if($ecommerce_landing_page_preloader_bg_color != false){
		$ecommerce_landing_page_custom_css .='#preloader{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_preloader_bg_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_preloader_border_color = get_theme_mod('ecommerce_landing_page_preloader_border_color');
	if($ecommerce_landing_page_preloader_border_color != false){
		$ecommerce_landing_page_custom_css .='.loader-line{';
			$ecommerce_landing_page_custom_css .='border-color: '.esc_attr($ecommerce_landing_page_preloader_border_color).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_preloader_bg_img = get_theme_mod('ecommerce_landing_page_preloader_bg_img');
	if($ecommerce_landing_page_preloader_bg_img != false){
		$ecommerce_landing_page_custom_css .='#preloader{';
			$ecommerce_landing_page_custom_css .='background: url('.esc_attr($ecommerce_landing_page_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$ecommerce_landing_page_custom_css .='}';
	}

	// banner background img

	$ecommerce_landing_page_banner_background_color = get_theme_mod('ecommerce_landing_page_banner_background_color');
	if($ecommerce_landing_page_banner_background_color != false){
		$ecommerce_landing_page_custom_css .='#banner{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_banner_background_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------- Banner -----------------*/

	$ecommerce_landing_page_show_hide_banner = get_theme_mod('ecommerce_landing_page_show_hide_banner');
	if($ecommerce_landing_page_show_hide_banner == true){
		$ecommerce_landing_page_custom_css .='.page-template-custom-home-page .home-page-header{';
			$ecommerce_landing_page_custom_css .='position: static; border-bottom:2px solid #eb353c; padding: 30px 0;margin-top:0;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_copyright_background_color = get_theme_mod('ecommerce_landing_page_copyright_background_color');
	if($ecommerce_landing_page_copyright_background_color != false){
		$ecommerce_landing_page_custom_css .='#footer-2{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_copyright_background_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_background_color = get_theme_mod('ecommerce_landing_page_footer_background_color');
	if($ecommerce_landing_page_footer_background_color != false){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_footer_background_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_widgets_heading = get_theme_mod( 'ecommerce_landing_page_footer_widgets_heading','Left');
    if($ecommerce_landing_page_footer_widgets_heading == 'Left'){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$ecommerce_landing_page_custom_css .='text-align: left;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_footer_widgets_heading == 'Center'){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$ecommerce_landing_page_custom_css .='text-align: center;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_footer_widgets_heading == 'Right'){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$ecommerce_landing_page_custom_css .='text-align: right;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_widgets_content = get_theme_mod( 'ecommerce_landing_page_footer_widgets_content','Left');
    if($ecommerce_landing_page_footer_widgets_content == 'Left'){
		$ecommerce_landing_page_custom_css .='#footer .widget{';
		$ecommerce_landing_page_custom_css .='text-align: left;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_footer_widgets_content == 'Center'){
		$ecommerce_landing_page_custom_css .='#footer .widget{';
			$ecommerce_landing_page_custom_css .='text-align: center;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_footer_widgets_content == 'Right'){
		$ecommerce_landing_page_custom_css .='#footer .widget{';
			$ecommerce_landing_page_custom_css .='text-align: right;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_copyright_font_size = get_theme_mod('ecommerce_landing_page_copyright_font_size');
	if($ecommerce_landing_page_copyright_font_size != false){
		$ecommerce_landing_page_custom_css .='#footer-2 a, #footer-2 p{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_copyright_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_copyright_padding_top_bottom = get_theme_mod('ecommerce_landing_page_copyright_padding_top_bottom');
	if($ecommerce_landing_page_copyright_padding_top_bottom != false){
		$ecommerce_landing_page_custom_css .='#footer-2{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($ecommerce_landing_page_copyright_padding_top_bottom).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_padding = get_theme_mod('ecommerce_landing_page_footer_padding');
	if($ecommerce_landing_page_footer_padding != false){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='padding: '.esc_attr($ecommerce_landing_page_footer_padding).' 0;';
		$ecommerce_landing_page_custom_css .='}';
	}
	
	$ecommerce_landing_page_footer_background_image = get_theme_mod('ecommerce_landing_page_footer_background_image');
	if($ecommerce_landing_page_footer_background_image != false){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background: url('.esc_attr($ecommerce_landing_page_footer_background_image).');';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_img_footer','scroll');
	if($ecommerce_landing_page_theme_lay == 'fixed'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$ecommerce_landing_page_custom_css .='}';
	}elseif ($ecommerce_landing_page_theme_lay == 'scroll'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_img_position = get_theme_mod('ecommerce_landing_page_footer_img_position','center center');
	if($ecommerce_landing_page_footer_img_position != false){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background-position: '.esc_attr($ecommerce_landing_page_footer_img_position).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$ecommerce_landing_page_scroll_to_top_font_size = get_theme_mod('ecommerce_landing_page_scroll_to_top_font_size');
	if($ecommerce_landing_page_scroll_to_top_font_size != false){
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_scroll_to_top_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_scroll_to_top_padding = get_theme_mod('ecommerce_landing_page_scroll_to_top_padding');
	$ecommerce_landing_page_scroll_to_top_padding = get_theme_mod('ecommerce_landing_page_scroll_to_top_padding');
	if($ecommerce_landing_page_scroll_to_top_padding != false){
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_scroll_to_top_padding).';padding-bottom: '.esc_attr($ecommerce_landing_page_scroll_to_top_padding).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_scroll_to_top_width = get_theme_mod('ecommerce_landing_page_scroll_to_top_width');
	if($ecommerce_landing_page_scroll_to_top_width != false){
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='width: '.esc_attr($ecommerce_landing_page_scroll_to_top_width).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_scroll_to_top_height = get_theme_mod('ecommerce_landing_page_scroll_to_top_height');
	if($ecommerce_landing_page_scroll_to_top_height != false){
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='height: '.esc_attr($ecommerce_landing_page_scroll_to_top_height).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_scroll_to_top_border_radius = get_theme_mod('ecommerce_landing_page_scroll_to_top_border_radius');
	if($ecommerce_landing_page_scroll_to_top_border_radius != false){
		$ecommerce_landing_page_custom_css .='.scrollup i{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_scroll_to_top_border_radius).'px;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$ecommerce_landing_page_logo_padding = get_theme_mod('ecommerce_landing_page_logo_padding');
	if($ecommerce_landing_page_logo_padding != false){
		$ecommerce_landing_page_custom_css .='.logo{';
			$ecommerce_landing_page_custom_css .='padding: '.esc_attr($ecommerce_landing_page_logo_padding).' !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_logo_margin = get_theme_mod('ecommerce_landing_page_logo_margin');
	if($ecommerce_landing_page_logo_margin != false){
		$ecommerce_landing_page_custom_css .='.logo{';
			$ecommerce_landing_page_custom_css .='margin: '.esc_attr($ecommerce_landing_page_logo_margin).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	// Site title Font Size
	$ecommerce_landing_page_site_title_font_size = get_theme_mod('ecommerce_landing_page_site_title_font_size');
	if($ecommerce_landing_page_site_title_font_size != false){
		$ecommerce_landing_page_custom_css .='.logo p.site-title, .logo h1{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_site_title_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	// Site tagline Font Size
	$ecommerce_landing_page_site_tagline_font_size = get_theme_mod('ecommerce_landing_page_site_tagline_font_size');
	if($ecommerce_landing_page_site_tagline_font_size != false){
		$ecommerce_landing_page_custom_css .='.logo p.site-description{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_site_tagline_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_site_title_color = get_theme_mod('ecommerce_landing_page_site_title_color');
	if($ecommerce_landing_page_site_title_color != false){
		$ecommerce_landing_page_custom_css .='p.site-title a, .logo h1 a{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_site_title_color).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_site_tagline_color = get_theme_mod('ecommerce_landing_page_site_tagline_color');
	if($ecommerce_landing_page_site_tagline_color != false){
		$ecommerce_landing_page_custom_css .='.logo p.site-description{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_site_tagline_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_logo_width = get_theme_mod('ecommerce_landing_page_logo_width');
	if($ecommerce_landing_page_logo_width != false){
		$ecommerce_landing_page_custom_css .='.logo img{';
			$ecommerce_landing_page_custom_css .='width: '.esc_attr($ecommerce_landing_page_logo_width).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_logo_height = get_theme_mod('ecommerce_landing_page_logo_height');
	if($ecommerce_landing_page_logo_height != false){
		$ecommerce_landing_page_custom_css .='.logo img{';
			$ecommerce_landing_page_custom_css .='height: '.esc_attr($ecommerce_landing_page_logo_height).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	// Header Background Color
	$ecommerce_landing_page_header_background_color = get_theme_mod('ecommerce_landing_page_header_background_color');
	if($ecommerce_landing_page_header_background_color != false){
		$ecommerce_landing_page_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_header_background_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_header_img_position = get_theme_mod('ecommerce_landing_page_header_img_position','center top');
	if($ecommerce_landing_page_header_img_position != false){
		$ecommerce_landing_page_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$ecommerce_landing_page_custom_css .='background-position: '.esc_attr($ecommerce_landing_page_header_img_position).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_blog_layout_option','Default');
    if($ecommerce_landing_page_theme_lay == 'Default'){
		$ecommerce_landing_page_custom_css .='.post-main-box{';
			$ecommerce_landing_page_custom_css .='';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_theme_lay == 'Center'){
		$ecommerce_landing_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$ecommerce_landing_page_custom_css .='text-align:center;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.post-info{';
			$ecommerce_landing_page_custom_css .='margin-top:10px;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.post-info hr{';
			$ecommerce_landing_page_custom_css .='margin:15px auto;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_theme_lay == 'Left'){
		$ecommerce_landing_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$ecommerce_landing_page_custom_css .='text-align:Left;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.post-info hr{';
			$ecommerce_landing_page_custom_css .='margin-bottom:10px;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.post-main-box h2{';
			$ecommerce_landing_page_custom_css .='margin-top:10px;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='.service-text .more-btn{';
			$ecommerce_landing_page_custom_css .='display:inline-block;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$ecommerce_landing_page_blog_page_posts_settings = get_theme_mod( 'ecommerce_landing_page_blog_page_posts_settings','Into Blocks');
    if($ecommerce_landing_page_blog_page_posts_settings == 'Without Blocks'){
		$ecommerce_landing_page_custom_css .='.post-main-box{';
			$ecommerce_landing_page_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$ecommerce_landing_page_custom_css .='}';
	}

	// featured image dimention
	$ecommerce_landing_page_blog_post_featured_image_dimension = get_theme_mod('ecommerce_landing_page_blog_post_featured_image_dimension', 'default');
	$ecommerce_landing_page_blog_post_featured_image_custom_width = get_theme_mod('ecommerce_landing_page_blog_post_featured_image_custom_width',250);
	$ecommerce_landing_page_blog_post_featured_image_custom_height = get_theme_mod('ecommerce_landing_page_blog_post_featured_image_custom_height',250);
	if($ecommerce_landing_page_blog_post_featured_image_dimension == 'custom'){
		$ecommerce_landing_page_custom_css .='.post-main-box img{';
			$ecommerce_landing_page_custom_css .='width: '.esc_attr($ecommerce_landing_page_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($ecommerce_landing_page_blog_post_featured_image_custom_height).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$ecommerce_landing_page_featured_image_border_radius = get_theme_mod('ecommerce_landing_page_featured_image_border_radius', 0);
	if($ecommerce_landing_page_featured_image_border_radius != false){
		$ecommerce_landing_page_custom_css .='.box-image img, .feature-box img{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_featured_image_border_radius).'px;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_featured_image_box_shadow = get_theme_mod('ecommerce_landing_page_featured_image_box_shadow',0);
	if($ecommerce_landing_page_featured_image_box_shadow != false){
		$ecommerce_landing_page_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$ecommerce_landing_page_custom_css .='box-shadow: '.esc_attr($ecommerce_landing_page_featured_image_box_shadow).'px '.esc_attr($ecommerce_landing_page_featured_image_box_shadow).'px '.esc_attr($ecommerce_landing_page_featured_image_box_shadow).'px #cccccc;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$ecommerce_landing_page_button_letter_spacing = get_theme_mod('ecommerce_landing_page_button_letter_spacing',14);
	$ecommerce_landing_page_custom_css .='.post-main-box .more-btn{';
		$ecommerce_landing_page_custom_css .='letter-spacing: '.esc_attr($ecommerce_landing_page_button_letter_spacing).';';
	$ecommerce_landing_page_custom_css .='}';

	$ecommerce_landing_page_button_border_radius = get_theme_mod('ecommerce_landing_page_button_border_radius');
	if($ecommerce_landing_page_button_border_radius != false){
		$ecommerce_landing_page_custom_css .='.post-main-box .more-btn a{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_button_border_radius).'px !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_button_top_bottom_padding = get_theme_mod('ecommerce_landing_page_button_top_bottom_padding');
	$ecommerce_landing_page_button_left_right_padding = get_theme_mod('ecommerce_landing_page_button_left_right_padding');
	if($ecommerce_landing_page_button_top_bottom_padding != false || $ecommerce_landing_page_button_left_right_padding != false){
		$ecommerce_landing_page_custom_css .='.post-main-box .more-btn{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($ecommerce_landing_page_button_top_bottom_padding).'!important;padding-left: '.esc_attr($ecommerce_landing_page_button_left_right_padding).'!important;padding-right: '.esc_attr($ecommerce_landing_page_button_left_right_padding).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_button_font_size = get_theme_mod('ecommerce_landing_page_button_font_size',14);
	$ecommerce_landing_page_custom_css .='.post-main-box .more-btn a{';
		$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_button_font_size).';';
	$ecommerce_landing_page_custom_css .='}';

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_button_text_transform','Uppercase');
	if($ecommerce_landing_page_theme_lay == 'Capitalize'){
		$ecommerce_landing_page_custom_css .='.post-main-box .more-btn a{';
			$ecommerce_landing_page_custom_css .='text-transform:Capitalize;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Lowercase'){
		$ecommerce_landing_page_custom_css .='.post-main-box .more-btn a{';
			$ecommerce_landing_page_custom_css .='text-transform:Lowercase;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Uppercase'){
		$ecommerce_landing_page_custom_css .='.post-main-box .more-btn a{';
			$ecommerce_landing_page_custom_css .='text-transform:Uppercase;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$ecommerce_landing_page_single_blog_comment_button_text = get_theme_mod('ecommerce_landing_page_single_blog_comment_button_text', 'Post Comment');
	if($ecommerce_landing_page_single_blog_comment_button_text == ''){
		$ecommerce_landing_page_custom_css .='#comments p.form-submit {';
			$ecommerce_landing_page_custom_css .='display: none;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_comment_width = get_theme_mod('ecommerce_landing_page_single_blog_comment_width');
	if($ecommerce_landing_page_comment_width != false){
		$ecommerce_landing_page_custom_css .='#comments textarea{';
			$ecommerce_landing_page_custom_css .='width: '.esc_attr($ecommerce_landing_page_comment_width).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_single_blog_post_navigation_show_hide = get_theme_mod('ecommerce_landing_page_single_blog_post_navigation_show_hide',true);
	if($ecommerce_landing_page_single_blog_post_navigation_show_hide != true){
		$ecommerce_landing_page_custom_css .='.post-navigation{';
			$ecommerce_landing_page_custom_css .='display: none;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$ecommerce_landing_page_display_grid_posts_settings = get_theme_mod( 'ecommerce_landing_page_display_grid_posts_settings','Into Blocks');
    if($ecommerce_landing_page_display_grid_posts_settings == 'Without Blocks'){
		$ecommerce_landing_page_custom_css .='.grid-post-main-box{';
			$ecommerce_landing_page_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$ecommerce_landing_page_related_product_show_hide = get_theme_mod('ecommerce_landing_page_related_product_show_hide',true);
	if($ecommerce_landing_page_related_product_show_hide != true){
		$ecommerce_landing_page_custom_css .='.related.products{';
			$ecommerce_landing_page_custom_css .='display: none;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$ecommerce_landing_page_products_padding_top_bottom = get_theme_mod('ecommerce_landing_page_products_padding_top_bottom');
	if($ecommerce_landing_page_products_padding_top_bottom != false){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($ecommerce_landing_page_products_padding_top_bottom).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_padding_left_right = get_theme_mod('ecommerce_landing_page_products_padding_left_right');
	if($ecommerce_landing_page_products_padding_left_right != false){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$ecommerce_landing_page_custom_css .='padding-left: '.esc_attr($ecommerce_landing_page_products_padding_left_right).'!important; padding-right: '.esc_attr($ecommerce_landing_page_products_padding_left_right).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_box_shadow = get_theme_mod('ecommerce_landing_page_products_box_shadow');
	if($ecommerce_landing_page_products_box_shadow != false){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$ecommerce_landing_page_custom_css .='box-shadow: '.esc_attr($ecommerce_landing_page_products_box_shadow).'px '.esc_attr($ecommerce_landing_page_products_box_shadow).'px '.esc_attr($ecommerce_landing_page_products_box_shadow).'px #ddd;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_border_radius = get_theme_mod('ecommerce_landing_page_products_border_radius');
	if($ecommerce_landing_page_products_border_radius != false){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_products_border_radius).'px;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_btn_padding_top_bottom = get_theme_mod('ecommerce_landing_page_products_btn_padding_top_bottom');
	if($ecommerce_landing_page_products_btn_padding_top_bottom != false){
		$ecommerce_landing_page_custom_css .='.woocommerce a.button{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($ecommerce_landing_page_products_btn_padding_top_bottom).' !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_btn_padding_left_right = get_theme_mod('ecommerce_landing_page_products_btn_padding_left_right');
	if($ecommerce_landing_page_products_btn_padding_left_right != false){
		$ecommerce_landing_page_custom_css .='.woocommerce a.button{';
			$ecommerce_landing_page_custom_css .='padding-left: '.esc_attr($ecommerce_landing_page_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($ecommerce_landing_page_products_btn_padding_left_right).' !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_products_button_border_radius = get_theme_mod('ecommerce_landing_page_products_button_border_radius', 0);
	if($ecommerce_landing_page_products_button_border_radius != false){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_products_button_border_radius).'px !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_woocommerce_sale_position = get_theme_mod( 'ecommerce_landing_page_woocommerce_sale_position','right');
    if($ecommerce_landing_page_woocommerce_sale_position == 'left'){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product .onsale{';
			$ecommerce_landing_page_custom_css .='left: 12px !important; right: auto !important;';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_woocommerce_sale_position == 'right'){
		$ecommerce_landing_page_custom_css .='.woocommerce ul.products li.product .onsale{';
			$ecommerce_landing_page_custom_css .='left: auto!important; right: 14px !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_woocommerce_sale_font_size = get_theme_mod('ecommerce_landing_page_woocommerce_sale_font_size');
	if($ecommerce_landing_page_woocommerce_sale_font_size != false){
		$ecommerce_landing_page_custom_css .='.woocommerce span.onsale{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_woocommerce_sale_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_woocommerce_sale_padding_top_bottom = get_theme_mod('ecommerce_landing_page_woocommerce_sale_padding_top_bottom');
	if($ecommerce_landing_page_woocommerce_sale_padding_top_bottom != false){
		$ecommerce_landing_page_custom_css .='.woocommerce span.onsale{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($ecommerce_landing_page_woocommerce_sale_padding_top_bottom).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_woocommerce_sale_padding_left_right = get_theme_mod('ecommerce_landing_page_woocommerce_sale_padding_left_right');
	if($ecommerce_landing_page_woocommerce_sale_padding_left_right != false){
		$ecommerce_landing_page_custom_css .='.woocommerce span.onsale{';
			$ecommerce_landing_page_custom_css .='padding-left: '.esc_attr($ecommerce_landing_page_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($ecommerce_landing_page_woocommerce_sale_padding_left_right).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_woocommerce_sale_border_radius = get_theme_mod('ecommerce_landing_page_woocommerce_sale_border_radius', 0);
	if($ecommerce_landing_page_woocommerce_sale_border_radius != false){
		$ecommerce_landing_page_custom_css .='.woocommerce span.onsale{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_woocommerce_sale_border_radius).'px;';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$ecommerce_landing_page_social_icon_font_size = get_theme_mod('ecommerce_landing_page_social_icon_font_size');
	if($ecommerce_landing_page_social_icon_font_size != false){
		$ecommerce_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_social_icon_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_social_icon_padding = get_theme_mod('ecommerce_landing_page_social_icon_padding');
	if($ecommerce_landing_page_social_icon_padding != false){
		$ecommerce_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$ecommerce_landing_page_custom_css .='padding: '.esc_attr($ecommerce_landing_page_social_icon_padding).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_social_icon_width = get_theme_mod('ecommerce_landing_page_social_icon_width');
	if($ecommerce_landing_page_social_icon_width != false){
		$ecommerce_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$ecommerce_landing_page_custom_css .='width: '.esc_attr($ecommerce_landing_page_social_icon_width).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_social_icon_height = get_theme_mod('ecommerce_landing_page_social_icon_height');
	if($ecommerce_landing_page_social_icon_height != false){
		$ecommerce_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$ecommerce_landing_page_custom_css .='height: '.esc_attr($ecommerce_landing_page_social_icon_height).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_social_icon_border_radius = get_theme_mod('ecommerce_landing_page_social_icon_border_radius');
	if($ecommerce_landing_page_social_icon_border_radius != false){
		$ecommerce_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$ecommerce_landing_page_custom_css .='border-radius: '.esc_attr($ecommerce_landing_page_social_icon_border_radius).'px;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_resp_menu_toggle_btn_bg_color = get_theme_mod('ecommerce_landing_page_resp_menu_toggle_btn_bg_color');
	if($ecommerce_landing_page_resp_menu_toggle_btn_bg_color != false){
		$ecommerce_landing_page_custom_css .='.toggle-nav i{';
			$ecommerce_landing_page_custom_css .='background: '.esc_attr($ecommerce_landing_page_resp_menu_toggle_btn_bg_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_grid_featured_image_box_shadow = get_theme_mod('ecommerce_landing_page_grid_featured_image_box_shadow',0);
	if($ecommerce_landing_page_grid_featured_image_box_shadow != false){
		$ecommerce_landing_page_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$ecommerce_landing_page_custom_css .='box-shadow: '.esc_attr($ecommerce_landing_page_grid_featured_image_box_shadow).'px '.esc_attr($ecommerce_landing_page_grid_featured_image_box_shadow).'px '.esc_attr($ecommerce_landing_page_grid_featured_image_box_shadow).'px #cccccc;';
		$ecommerce_landing_page_custom_css .='}';
	}

	// menus
	$ecommerce_landing_page_topbar_padding_top_bottom = get_theme_mod('ecommerce_landing_page_topbar_padding_top_bottom');
	if($ecommerce_landing_page_topbar_padding_top_bottom != false){
		$ecommerce_landing_page_custom_css .='#topbar{';
			$ecommerce_landing_page_custom_css .='padding-top: '.esc_attr($ecommerce_landing_page_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($ecommerce_landing_page_topbar_padding_top_bottom).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_navigation_menu_font_size = get_theme_mod('ecommerce_landing_page_navigation_menu_font_size');
	if($ecommerce_landing_page_navigation_menu_font_size != false){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_navigation_menu_font_size).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_navigation_menu_font_weight = get_theme_mod('ecommerce_landing_page_navigation_menu_font_weight','600');
	if($ecommerce_landing_page_navigation_menu_font_weight != false){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='font-weight: '.esc_attr($ecommerce_landing_page_navigation_menu_font_weight).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_menu_text_transform','Capitalize');
	if($ecommerce_landing_page_theme_lay == 'Capitalize'){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='text-transform:Capitalize;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Lowercase'){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='text-transform:Lowercase;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Uppercase'){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='text-transform:Uppercase;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_header_menus_color = get_theme_mod('ecommerce_landing_page_header_menus_color');
	if($ecommerce_landing_page_header_menus_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_header_menus_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_header_menus_hover_color = get_theme_mod('ecommerce_landing_page_header_menus_hover_color');
	if($ecommerce_landing_page_header_menus_hover_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation a:hover{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_header_menus_hover_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_header_submenus_color = get_theme_mod('ecommerce_landing_page_header_submenus_color');
	if($ecommerce_landing_page_header_submenus_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation ul ul a{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_header_submenus_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_header_submenus_hover_color = get_theme_mod('ecommerce_landing_page_header_submenus_hover_color');
	if($ecommerce_landing_page_header_submenus_hover_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_header_submenus_hover_color).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_menus_item = get_theme_mod( 'ecommerce_landing_page_menus_item_style','None');
    if($ecommerce_landing_page_menus_item == 'None'){
		$ecommerce_landing_page_custom_css .='.main-navigation a{';
			$ecommerce_landing_page_custom_css .='';
		$ecommerce_landing_page_custom_css .='}';
	}else if($ecommerce_landing_page_menus_item == 'Zoom In'){
		$ecommerce_landing_page_custom_css .='.main-navigation a:hover{';
			$ecommerce_landing_page_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$ecommerce_landing_page_custom_css .='}';
	}


	/*---------------------------Footer Style -------------------*/

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_footer_template','ecommerce_landing_page-footer-one');
    if($ecommerce_landing_page_theme_lay == 'ecommerce_landing_page-footer-one'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='';
		$ecommerce_landing_page_custom_css .='}';

	}else if($ecommerce_landing_page_theme_lay == 'ecommerce_landing_page-footer-two'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$ecommerce_landing_page_custom_css .='color:#000;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer ul li::before{';
			$ecommerce_landing_page_custom_css .='background:#000;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$ecommerce_landing_page_custom_css .='border: 1px solid #000;';
		$ecommerce_landing_page_custom_css .='}';

	}else if($ecommerce_landing_page_theme_lay == 'ecommerce_landing_page-footer-three'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background: #232524;';
		$ecommerce_landing_page_custom_css .='}';
	}
	else if($ecommerce_landing_page_theme_lay == 'ecommerce_landing_page-footer-four'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background: #f7f7f7;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$ecommerce_landing_page_custom_css .='color:#000;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer ul li::before{';
			$ecommerce_landing_page_custom_css .='background:#000;';
		$ecommerce_landing_page_custom_css .='}';
		$ecommerce_landing_page_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$ecommerce_landing_page_custom_css .='border: 1px solid #000;';
		$ecommerce_landing_page_custom_css .='}';
	}
	else if($ecommerce_landing_page_theme_lay == 'ecommerce_landing_page-footer-five'){
		$ecommerce_landing_page_custom_css .='#footer{';
			$ecommerce_landing_page_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$ecommerce_landing_page_button_footer_heading_letter_spacing = get_theme_mod('ecommerce_landing_page_button_footer_heading_letter_spacing',1);
	$ecommerce_landing_page_custom_css .='#footer h3, #footer a.rsswidget{';
		$ecommerce_landing_page_custom_css .='letter-spacing: '.esc_attr($ecommerce_landing_page_button_footer_heading_letter_spacing).'px;';
	$ecommerce_landing_page_custom_css .='}';

	$ecommerce_landing_page_button_footer_font_size = get_theme_mod('ecommerce_landing_page_button_footer_font_size','30');
	$ecommerce_landing_page_custom_css .='#footer h3, #footer a.rsswidget{';
		$ecommerce_landing_page_custom_css .='font-size: '.esc_attr($ecommerce_landing_page_button_footer_font_size).'px;';
	$ecommerce_landing_page_custom_css .='}';

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_button_footer_text_transform','Capitalize');
	if($ecommerce_landing_page_theme_lay == 'Capitalize'){
		$ecommerce_landing_page_custom_css .='#footer h3{';
			$ecommerce_landing_page_custom_css .='text-transform:Capitalize;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Lowercase'){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer a.rsswidget{';
			$ecommerce_landing_page_custom_css .='text-transform:Lowercase;';
		$ecommerce_landing_page_custom_css .='}';
	}
	if($ecommerce_landing_page_theme_lay == 'Uppercase'){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer a.rsswidget{';
			$ecommerce_landing_page_custom_css .='text-transform:Uppercase;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_footer_heading_weight = get_theme_mod('ecommerce_landing_page_footer_heading_weight','600');
	if($ecommerce_landing_page_footer_heading_weight != false){
		$ecommerce_landing_page_custom_css .='#footer h3, #footer a.rsswidget{';
			$ecommerce_landing_page_custom_css .='font-weight: '.esc_attr($ecommerce_landing_page_footer_heading_weight).';';
		$ecommerce_landing_page_custom_css .='}';
	}
