<div class="container">
<section id="newproducts-section" class="ht-section">
<!-- </?php echo '<img class="newproducts-imgprint" src="'.get_template_directory_uri().'/assets/images/newproducts.png" />'; ?> -->
	
		<div class="newproducts-posts-box">
		<?php
			$newproducts_heading = get_theme_mod('newproducts_heading', 'Recent Products');
		?> 
			<div class="row justify-content-center">
				<div class="section-title">
				<?php if($newproducts_heading){ ?>	
					<div class="section-subtitle inner-area-title">
						<?php 
							$nph_image = get_theme_mod('nph_image');
							if(!empty($nph_image)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($nph_image).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img src="'.get_template_directory_uri().'/assets/images/np-heading.png" class="img-responsive" />';
							}

						?><h2><?php echo ($newproducts_heading);  ?></h2>	
					</div>
				<?php }?>
				</div>
			</div> 
			<div class=" wow zoomIn">
				<div class="row">  
					<?php
					if(function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')){
		    			$meta_query   = WC()->query->get_meta_query();
		    			$tax_query   = WC()->query->get_tax_query();
		    			
		    			$args = array(
		    				'post_type'   =>  'product',
		    				'stock'       =>  1,
		    				'posts_per_page' => 6, 
		    				'orderby'     =>  'date',
		    				'order'       =>  'DESC',
		    				'meta_query'  =>  $meta_query,
		    				'tax_query'   => $tax_query,
		    			);
						$loop = new WP_Query( $args );
						if($loop->post_count > 0){
							while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<div class="col-lg-2 col-md-3 col-sm-6 newproduct-bx">  
						<div class="product-grid ">
							<!-- <div class="probg"></div> -->
							<div class="default_product_display product_view_<?php echo get_permalink( $loop->post->ID ); ?>group">
	                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"/>
		                    <?php if (has_post_thumbnail( $loop->post->ID )){ ?>         
		                    <div class="product-image-thumb"> 
		                        <img class="newproducts-imgboxshape" src="<?php echo the_post_thumbnail_url( $loop->post->ID );?>"/>
		                    </div>
		                    <?php
		                    } else 
		                    {?>
		                    <div class="product-image-thumb">		                       
		                            <img class="newproducts-imgboxshape" src="<?php echo woocommerce_placeholder_img_src();?>"/>                  
		                   </div>
	                   		 <?php } ?>
	                </div>
							<div class="productcontent-wrap">
								<?php
									$productbutton = get_theme_mod('product_txt', 'Add to cart'); 
								?>
								<div class="pcontent">
									<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">	
										<h3><?php the_title(); ?></h3>
									</a>
									<span class="price"><?php echo $product->get_price_html(); ?></span>
									<?php if( get_theme_mod('product_button_display','show' ) == 'show') :
										?>	
										<div class="sec-btn">
											<li class="readmore">
												<a href="#" class="more-button">Read More</a>
											</li>
											<li class="add-to-cart">
												<a href="<?php echo esc_url(get_permalink()); ?>" class="more-button"><span></span><?php echo ($productbutton );  ?></a>
											</li>
										</div>

									<?php endif ?>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div> 
					<?php
						endwhile; 
							}else{ ?>
						<div class="alert alert-warning text-center">
							<strong>Sorry, no featured products to show.</strong>
						</div>
						<?php
								}
								?>
						<?php
					}?>
				</div> 
			</div>
		</div>
	
	<div class="clearfix"></div>
</section>
</div>