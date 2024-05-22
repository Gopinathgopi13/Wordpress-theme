<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<!-- Header Area -->

	<?php 

		// header 
		$topheader_btntext = esc_attr(get_theme_mod('topheader_btntext','My Account'));
		$topheader_fblink = esc_attr(get_theme_mod('topheader_fblink','#'));
		$topheader_twitterlink = esc_attr(get_theme_mod('topheader_twitterlink','#'));
		$topheader_instalink = esc_attr(get_theme_mod('topheader_instalink','#'));
		$topheader_Linkedinlink = esc_attr(get_theme_mod('topheader_Linkedinlink','#'));

		$stickyheader = esc_attr(supermarketecommercestore_sticky_menu());
	?>

<div class="main">
    <header class="main-header site-header <?php echo esc_attr(supermarketecommercestore_sticky_menu()); ?>">
		<!-- <div class="container"> -->
			<div class="header-section">
				<div class="headfer-content">
					<div class="tophead">
						<div class="container">
							<div class="row mr-0">
								<div class="col-lg-8 col-md-12 col-sm-12 pd-0">
									<div class="menus">
										<nav class="navbar navbar-expand-lg navbaroffcanvase">
										<div class="navbar-menubar">
											<!-- Small Divice Menu-->
											<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','supermarket-ecommerce-store'); ?>"> 
												<i class="fa fa-bars"></i>
											</button>
											<div class="collapse navbar-collapse navbar-menu">
												<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','supermarket-ecommerce-store'); ?>"> 
													<i class="fa fa-times"></i>
												</button> 
												<?php 
													wp_nav_menu( 
														array(  
															'theme_location' => 'primary_menu',
															'container'  => '',
															'container_id'    => '',
															'menu_class' => 'navbar-nav main-nav',
																	'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
															'walker' => new WP_Bootstrap_Navwalker()
															) 
														);
												?>
												
											</div>
										</div>
										</nav>
									</div>
								</div>
								<div class="col-lg-2 col-md-12 col-sm-12 pd-0">
									<div class="socialicons">
										<a title="<?php esc_attr('facebook', 'supermarket-ecommerce-store'); ?>" target="_blank" href="<?php echo apply_filters('supermarketecommercestore_topheader', $topheader_fblink); ?>"><i class="fa fa-facebook"></i></a> 
										<a title="<?php esc_attr('twitter', 'supermarket-ecommerce-store'); ?>" target="_blank" href="<?php echo apply_filters('supermarketecommercestore_topheader', $topheader_twitterlink); ?>"><i class="fa fa-twitter"></i></a>
										<a title="<?php esc_attr('instagram', 'supermarket-ecommerce-store'); ?>" target="_blank" href="<?php echo apply_filters('supermarketecommercestore_topheader', $topheader_instalink); ?>"><i class="fa fa-instagram"></i></a>
										<a title="<?php esc_attr('linkedin', 'supermarket-ecommerce-store'); ?>" target="_blank" href="<?php echo apply_filters('supermarketecommercestore_topheader', $topheader_Linkedinlink); ?>"><i class="fa fa-linkedin-square"></i></a>
									</div>
								</div>
								<?php
								if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
									?>
									<div class="col-lg-2 col-md-12 col-sm-12 pd-0">
										<a class="signin" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
											<?php esc_html_e('Sign In','supermarket-ecommerce-store'); ?>
										</a>
										<a class="signup" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
											<?php esc_html_e('Register','supermarket-ecommerce-store'); ?>
										</a>			
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="bottomhead row mr-0">
							<div class="col-lg-3 col-md-3 col-sm-12 pd-0">
								<div class="site-logo">
									<?php
									if(has_custom_logo())
										{	
											the_custom_logo();
										}
										else { 
									?>
									<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">	
										<?php 
											echo esc_html(bloginfo('name'));
										?>
									</a>	
									<?php 						
										}
									?>
								</div>
								<div class="box-info">
									<?php
										$supermarketecommercestore_site_desc = get_bloginfo( 'description');
										if ($supermarketecommercestore_site_desc) : ?>
											<p class="site-description"><?php echo esc_html($supermarketecommercestore_site_desc); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-6 col-md-7 col-sm-12 pd-0 mid-sbar">
								<?php if(class_exists('woocommerce')){ ?>
									<div class="search-box">
										
										<?php //this prints out your search form 
										get_search_form(); ?>

										<div class="clearfix"></div>
									</div>
								<?php } ?>
							</div>
							<div class="col-lg-3 col-md-2 col-sm-12 pd-0 h-last-div">
								<div class="row mr-0">
								<?php
								if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
									?>
									<div class="col-md-6 col-lg-6 col-sm-12">
										<div class="h-cart">
											<a class="h-cart" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" >
												<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												<?php 
													
													$count = WC()->cart->cart_contents_count;
													$cart_url = wc_get_cart_url();
													if ( $count > 0 ) {
													?>
															<span><?php echo esc_html( $count ); ?></span>
													<?php 
													}
													else {
														?>
														<span><?php echo esc_html_e('0','supermarket-ecommerce-store'); ?></span>
														<?php 
													}
													
												?>
											</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-6 col-sm-12 pd-0 accbtn">
										<?php if ($topheader_btntext != '') { ?>
											<div class="myacc">
												<i class="fa fa-user" aria-hidden="true"></i>
												<a class="myaccount" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
													<?php echo apply_filters('supermarketecommercestore_topheader', $topheader_btntext); ?>
												</a>
											</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->

    </header>
	<div class="clearfix"></div>
</div>

