<?php 
	$supermarketecommercestore_hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
	$supermarketecommercestore_breadcrumb_bg_img				= get_theme_mod('breadcrumb_bg_img');
	$supermarketecommercestore_breadcrumb_back_attach		= get_theme_mod('breadcrumb_back_attach','scroll');
	
if($supermarketecommercestore_hs_breadcrumb == '1') {	
?>	

	<!-- Slider Area -->   
	<?php if(!empty($supermarketecommercestore_breadcrumb_bg_img)): ?>
    <section class="slider-area breadcrumb-section" style="background: url(<?php echo esc_url($supermarketecommercestore_breadcrumb_bg_img); ?>) center center <?php echo esc_attr($supermarketecommercestore_breadcrumb_back_attach); ?>; background-repeat: no-repeat; background-size: cover;">
	<?php else: ?>
	 <section class="slider-area breadcrumb-section">
	 <?php endif; ?>
        <div class="container">
            <div class="about-banner-text">   
            	
				<h1><?php supermarketecommercestore_breadcrumb_title(); ?></h1>
				
				<ol class="breadcrumb-list">
					<?php supermarketecommercestore_breadcrumbs(); ?>
				</ol>



            </div>
        </div> 

    </section>
    <!-- End Slider Area -->
<?php }else{  ?>
	<section style="padding: 30px 0 30px;"></section>
<?php } ?>	