<?php  
	$supermarketecommercestore_hs_blog 			= esc_attr(get_theme_mod('hs_blog','1'));
	$supermarketecommercestore_blog_title 		= esc_attr(get_theme_mod('blog_title'));
	$supermarketecommercestore_blog_subtitle		= esc_attr(get_theme_mod('blog_subtitle')); 
	$supermarketecommercestore_blog_description	= esc_attr(get_theme_mod('blog_description'));
	$supermarketecommercestore_blog_num			= esc_attr(get_theme_mod('blog_display_num','3'));
	if($supermarketecommercestore_hs_blog=='1'):
?>

<section id="blog-section" class="blog-area home-blog">

	<div class="container">
		<?php if(!empty($supermarketecommercestore_blog_title) || !empty($supermarketecommercestore_blog_subtitle) || !empty($supermarketecommercestore_blog_description)): ?>
			<div class="title">
				<?php if(!empty($supermarketecommercestore_blog_title)): ?>
					<h6><?php echo wp_kses_post($supermarketecommercestore_blog_title); ?></h6>
				<?php endif; ?>
				
				<?php if(!empty($supermarketecommercestore_blog_subtitle)): ?>
					<h2><?php echo wp_kses_post($supermarketecommercestore_blog_subtitle); ?></h2>
					<span class="shap"></span>
				<?php endif; ?>
				
				<?php if(!empty($supermarketecommercestore_blog_description)): ?>
					<p><?php echo wp_kses_post($supermarketecommercestore_blog_description); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?> 


		<div class="row">
			<?php 	
				$supermarketecommercestore_blogs_args = array( 'post_type' => 'post', 'posts_per_page' => $supermarketecommercestore_blog_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				$supermarketecommercestore_blog_wp_query = new WP_Query($supermarketecommercestore_blogs_args);
				if($supermarketecommercestore_blog_wp_query)
				{	
				while($supermarketecommercestore_blog_wp_query->have_posts()):$supermarketecommercestore_blog_wp_query->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-12 ">
					<div class="blogbx">
						
							
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<div class="blog-image" style="background-image: url('<?php echo esc_url($image[0]); ?>')">
									
									<div class="admin-cat-box">
								<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>	
									<li class="date"><?php echo get_the_date( 'j' ); ?> <?php echo get_the_date( 'M' ); ?> </li>
									<li class="month"><?php echo get_the_date( 'Y' ); ?></li>
								</div>
							</div>	

								</div>
							</a>
							<?php else: 
								$img = get_template_directory_uri().'/assets/images/default.png';
								?>
								<!-- <a href="<//?php echo esc_url( get_permalink() ); ?>">
									<div class="blog-image" style="background-image: url('<//?php echo esc_url($img); ?>')">
										

									</div>
								</a> -->
							<?php endif; ?>

							<div class="clearfix"></div>
							<div class="blog-content">
								
								<?php 
									if ( is_single() ) :
										
									the_title('<h6 class="post-title">', '</h6>' );
									
									else:
									
									the_title( sprintf( '<h6 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
									
									endif; 
									?> 
									<p>
								 		<?php echo wp_trim_words(get_the_content(), 35);	?>
								 	</p>
									
									<div class="box-admin">
										<ul class="comment-timing">
											<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Comments :','supermarket-ecommerce-store'); ?> <i class="fa fa-comment-o"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> </a> </li>
										</ul>
									</div>
				
							</div>
						<div class="clearfix"></div>
					</div>
				</div>

			<?php endwhile; 
				}
				wp_reset_postdata();
			?>
		</div>

	</div>

</section>
<?php endif; ?>