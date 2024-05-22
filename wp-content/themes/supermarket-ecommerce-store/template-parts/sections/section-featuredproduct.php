<div id="featurepsec">

<div class="<?php if(esc_attr(get_theme_mod('featuredproduct_section_width','Box Width')) == 'Full Width'){ ?>container-fluid pd-0 <?php } elseif(esc_attr(get_theme_mod('featuredproduct_section_width','Box Width')) == 'Box Width'){ ?> container <?php }?>">
<section id="featuredproduct-product-section" class="ht-section">
	
		<div class="featuredproduct-posts-box">
		<?php
			$featuredproduct_heading = get_theme_mod('featuredproduct_heading', 'Featured Product');

		?> 
			<div class="row justify-content-center">
				<div class="section-title">
					<?php if($featuredproduct_heading){ ?>	
						<div class="section-subtitle inner-area-title">
							<?php 
								$tph_image = get_theme_mod('tph_image');
								if(!empty($tph_image)){
									echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($tph_image).'" class="img-responsive secondry-bg-img" />';
								}else{
									echo '<img src="'.get_template_directory_uri().'/assets/images/tp-heading.png" class="img-responsive" />';
								}

							?><h2> <?php echo ($featuredproduct_heading);  ?></h2>
						</div>
					<?php }?>
				</div>
			</div> 

			<div class="row">  
				<?php
				if(function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')){
					$meta_query   = WC()->query->get_meta_query();
					$tax_query   = WC()->query->get_tax_query();
					$tax_query[] = array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
						'operator' => 'IN',
					);
					$args = array(
						'post_type'   =>  'product',
						'stock'       =>  1,
						'posts_per_page' => 8, 
						'orderby'     =>  'date',
						'order'       =>  'DESC',
						'meta_query'  =>  $meta_query,
						'tax_query'   => $tax_query,
					);
					$loop = new WP_Query( $args );
					if($loop->post_count > 0){
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
				<div class=" col-lg-2 col-md-3 col-sm-6 product-bx ">  
					<div class="product-grid ">
						<!-- <div class="probg"></div> -->
						<div class="product-image">
							<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if (has_post_thumbnail( $loop->post->ID )) 
								echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
								else
									echo '<img class="pic-1" src="'.get_template_directory_uri().'/assets/images/default.png" alt="Placeholder" />'; ?>
								
							</a>
						</div>
						<div class="productcontent-wrap">
							<?php
								$productbutton = get_theme_mod('product_txt', 'Add to cart'); 
							?>

							<div class="pcontent">
								
								<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">	
									<h3><?php the_title(); ?></h3>
								</a>
								<p><!-- </?php
                                if (has_excerpt()) {
                                    echo get_the_excerpt();
                                } else {
                                    echo get_the_content(4);
                                }
                                ?>     -->   

                                <?php echo wp_trim_words( get_the_content(), 5 ); ?>

                            </p> 
								<span class="price"><?php echo $product->get_price_html(); ?></span>
								<?php if( get_theme_mod('product_button_display','show' ) == 'show') :
									?>	
									<div class="sec-btn">
									<li class="readmore">
										<a href="#" class="more-button">Read More</a>
									</li>
									<li class="add-to-cart">
										<a href="<?php echo esc_url(get_permalink()); ?>" class="more-button"><span></span><?php echo ($productbutton );  ?>
										<!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
									</a>
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
	
	<div class="clearfix"></div>
</section>
</div>
</div>