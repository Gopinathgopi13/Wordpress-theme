<?php
function supermarketecommercestore_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'supermarketecommercestore_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '646464',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'supermarketecommercestore_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'supermarketecommercestore_custom_header_setup' );

if ( ! function_exists( 'supermarketecommercestore_header_style' ) ) :

function supermarketecommercestore_header_style() {
	$header_text_color = get_header_textcolor();

	$featuredproduct_disable_section = esc_attr(get_theme_mod('featuredproduct_disable_section','YES'));
	$recentproduct_disable_section = esc_attr(get_theme_mod('recentproduct_disable_section','YES'));


	?>
	<style type="text/css">


		<?php 
		
		?>


		header.site-header .site-title {
			color: <?php echo esc_attr(get_theme_mod('topheader_sitetitlecol')); ?>;

		}

		header.site-header .site-logo a {
			text-decoration-color: <?php echo esc_attr(get_theme_mod('topheader_sitetitlecol')); ?> !important;
		}

		p.site-description {
			color: <?php echo esc_attr(get_theme_mod('topheader_taglinecol')); ?>;
		}
		


		
	
		header .tophead {
			background: <?php echo esc_attr(get_theme_mod('header_topheadbgcolor')); ?>;
		}

		.main-header .navbar .navbar-menu ul li a, .main-header .navbar .navbar-menu ul li.dropdown>a::after {
			color: <?php echo esc_attr(get_theme_mod('header_menuscolor')); ?>;
		}

		.main-header .navbar .navbar-nav > li:hover a, .main-header .navbar .navbar-nav > li.focus a, .main-header .navbar .navbar-nav > li.active a, .main-header .navbar .navbar-nav > li a.active,.main-header .navbar .navbar-menu ul li:hover.dropdown>a::after {
			color: <?php echo esc_attr(get_theme_mod('header_menushovercolor')); ?>;
		}

		.main-header .navbar .navbar-menu ul li.dropdown .sub-menu a:not(.remove) {
			color: <?php echo esc_attr(get_theme_mod('header_submenutextcolor')); ?>;
		}

		.main-header .navbar .navbar-menu ul li.dropdown .sub-menu a {
			background: <?php echo esc_attr(get_theme_mod('header_submenusbgcolor')); ?>;
		}

		.main-header .navbar .navbar-menu ul li.dropdown .sub-menu a:not(.remove) {
			border-left-color: <?php echo esc_attr(get_theme_mod('header_submenusbordercolor')); ?>;
		}

		.main-header .navbar .navbar-menu ul li.dropdown .sub-menu li:hover a {
			background: <?php echo esc_attr(get_theme_mod('header_submenusbghovercolor')); ?> !important;
		}

		.main-header .navbar .navbar-menu ul li.dropdown .sub-menu li:hover a {
			color: <?php echo esc_attr(get_theme_mod('header_submenustxthovercolor')); ?> !important;
		}

		header .socialicons a i {
			color: <?php echo esc_attr(get_theme_mod('header_topheadiconscolor')); ?> !important;
		}

		header .socialicons a i {
			background: <?php echo esc_attr(get_theme_mod('header_topheadiconsbgcolor')); ?> !important;
		}

		header a.signin {
			color: <?php echo esc_attr(get_theme_mod('header_topheadsignincolor')); ?> !important;
		}

		header a.signup {
			border-color: <?php echo esc_attr(get_theme_mod('header_topheadregistercolor')); ?> !important;
		}
		header a.signup {
			color: <?php echo esc_attr(get_theme_mod('header_topheadregistercolor')); ?> !important;
		}
		header .search-box input[type="search"] {
			color: <?php echo esc_attr(get_theme_mod('header_bottomheadsearchtextcolor')); ?> !important;
		}
		header .search-box input[type="search"] {
			border-color: <?php echo esc_attr(get_theme_mod('header_bottomheadsearchtextcolor')); ?> !important;
		}
		header .search-box input[type="search"]::placeholder {
			color: <?php echo esc_attr(get_theme_mod('header_bottomheadsearchtextcolor')); ?> !important;
		}

		header .search-box i.fa.fa-search {
			color: <?php echo esc_attr(get_theme_mod('header_bottomheadsearchiconcolor')); ?> !important;
		}

		header .search-box input[type="submit"] {
			background: <?php echo esc_attr(get_theme_mod('header_bottomheadsearchiconbgcolor')); ?> !important;
		}

		header a.h-cart {
			color: <?php echo esc_attr(get_theme_mod('header_bottomheadcartcolor')); ?> !important;
		}
		header a.h-cart span {
			background: <?php echo esc_attr(get_theme_mod('header_bottomheadcartcolor')); ?> !important;
		}

		header a.h-cart {
			background: <?php echo esc_attr(get_theme_mod('header_bottomheadcartbgcolor')); ?> !important;
		}
		header a.h-cart span {
			color: <?php echo esc_attr(get_theme_mod('header_bottomheadcartbgcolor')); ?> !important;
		}

		header .myacc i, header .myacc a {
			color: <?php echo esc_attr(get_theme_mod('header_btntextcolor')); ?> !important;
		}

		header .myacc {
			background: <?php echo esc_attr(get_theme_mod('header_btnbgcolor1')); ?> !important;
		}


		
	




		.hero-style .slide-title h2 {
			color: <?php echo esc_attr(get_theme_mod('slider_titlecolor')); ?> !important;
		}


		.hero-style .slide-text p {
			color: <?php echo esc_attr(get_theme_mod('slider_descriptioncolor')); ?>;
		}

		.hero-style a.ReadMore {
			color: <?php echo esc_attr(get_theme_mod('slider_btntxt1color')); ?> !important;
		}

		.hero-style a.ReadMore {
			background: <?php echo esc_attr(get_theme_mod('slider_btnbg1color')); ?> !important;
		}

		.hero-style a.ReadMore:hover {
			color: <?php echo esc_attr(get_theme_mod('slider_btntxthovercolor')); ?> !important;
		}




		#featuredproduct-product-section .section-title h2 {
			color: <?php echo esc_attr(get_theme_mod('featuredproduct_titlecolor')); ?> !important;
		}

		#featuredproduct-product-section .pcontent h3 {
			color: <?php echo esc_attr(get_theme_mod('featuredproduct_producttitlecolor')); ?> !important;
		}
		
		#featuredproduct-product-section .pcontent .price,
		#featuredproduct-product-section .pcontent .price span{
			color: <?php echo esc_attr(get_theme_mod('featuredproduct_pricecolor')); ?> !important;
		}

		#featuredproduct-product-section .readmore a {
			border-color: <?php echo esc_attr(get_theme_mod('featuredproduct_button1color')); ?> !important;
			color: <?php echo esc_attr(get_theme_mod('featuredproduct_button1color')); ?> !important;
		}

		#featuredproduct-product-section .add-to-cart a {
			background: <?php echo esc_attr(get_theme_mod('featuredproduct_button2color')); ?> !important;
		}

		#featuredproduct-product-section .add-to-cart a {
			color: <?php echo esc_attr(get_theme_mod('featuredproduct_button2textcolor')); ?> !important;
		}

		#featurepsec {
			padding-top: <?php echo esc_attr(get_theme_mod('featuredproduct_top_padding')); ?>em;
			padding-bottom: <?php echo esc_attr(get_theme_mod('featuredproduct_bottom_padding')); ?>em;
		}




		#newproducts-section .section-title h2 {
			color: <?php echo esc_attr(get_theme_mod('recentproduct_titlecolor')); ?> !important;
		}

		#newproducts-section .pcontent h3 {
			color: <?php echo esc_attr(get_theme_mod('recentproduct_headingcolor')); ?> !important;
		}

		#newproducts-section .woocommerce-Price-amount ins, #newproducts-section .woocommerce-Price-amount.amount, #newproducts-section .price {
			color: <?php echo esc_attr(get_theme_mod('recentproduct_pricecolor')); ?> !important;
		}

		#newproducts-section .readmore a {
			border-color: <?php echo esc_attr(get_theme_mod('recentproduct_btn1color')); ?> !important;
			color: <?php echo esc_attr(get_theme_mod('recentproduct_btn1color')); ?> !important;
		}

		#newproducts-section .add-to-cart a {
			background: <?php echo esc_attr(get_theme_mod('recentproduct_btn2color')); ?> !important;
		}

		#newproducts-section .add-to-cart a {
			color: <?php echo esc_attr(get_theme_mod('recentproduct_btn2textcolor')); ?> !important;
		}







		.copy-right p,.copy-right p a {
			color: <?php echo esc_attr(get_theme_mod('footer_copyrightcolor')); ?>;
		}

		.copy-right {
			background: <?php echo esc_attr(get_theme_mod('footer_copyrightbgcolor')); ?>;
		}

		.footer-area {
			background: <?php echo esc_attr(get_theme_mod('footer_bgcolor')); ?>;
		}

		.footer-area .widget_text, .footer-area .widget_text p, .wp-block-latest-comments__comment-excerpt p, .wp-block-latest-comments__comment-date, .has-avatars .wp-block-latest-comments__comment .wp-block-latest-comments__comment-excerpt, .has-avatars .wp-block-latest-comments__comment .wp-block-latest-comments__comment-meta,.footer-area .widget_block h1, .footer-area .widget_block h2, .footer-area .widget_block h3, .footer-area .widget_block h4, .footer-area .widget_block h5, .footer-area .widget_block h6,.footer-area .footer-widget .widget:not(.widget_social_widget):not(.widget_tag_cloud) li a {
			color: <?php echo esc_attr(get_theme_mod('footer_textcolor')); ?>;
		}

		.footer-area li:before, .page-template-home-template .footer-area li:before, .page .footer-area li:before, .single .footer-area li:before {
			color: <?php echo esc_attr(get_theme_mod('footer_iconcolor')); ?>;
		}

		
	<?php  ?>


	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		else :
	?>
		h4.site-title{
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>



	<?php
        if ($featuredproduct_disable_section == 1):
	?>
		#featuredproduct-product-section {
			display: none;
		}
	<?php
		else :
	?>
		#featuredproduct-product-section {
			display: block;
		}
	<?php endif; ?>

	<?php
        if ($recentproduct_disable_section == 1):
	?>
		#newproducts-section {
			display: none;
		}
	<?php
		else :
	?>
		#newproducts-section {
			display: block;
		}
	<?php endif; ?>
	



	</style>
	<?php
}
endif;
