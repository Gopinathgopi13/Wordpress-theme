<?php
/**
 * @package Ecommerce Landing Page 
 * Setup the WordPress core custom header feature.
 *
 * @uses ecommerce_landing_page_header_style()
*/
function ecommerce_landing_page_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ecommerce_landing_page_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'ecommerce_landing_page_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'ecommerce_landing_page_custom_header_setup' );

if ( ! function_exists( 'ecommerce_landing_page_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see ecommerce_landing_page_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'ecommerce_landing_page_header_style' );

function ecommerce_landing_page_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page .home-page-header, .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'ecommerce-landing-page-basic-style', $custom_css );
	endif;
}
endif;