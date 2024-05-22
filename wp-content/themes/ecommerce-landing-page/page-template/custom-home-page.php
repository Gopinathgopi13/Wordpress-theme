<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php if( get_theme_mod( 'ecommerce_landing_page_show_hide_banner',true) == 1) { ?>
    <section id="banner" class="position-relative wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 banner-main-text align-self-center">
            <div class="inner_carousel">
              <?php if(get_theme_mod('ecommerce_landing_page_tagline_title') != '') {?>
                <h1 class="mb-3"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_tagline_title')) ?></h1>
              <?php }?>
              <?php if(get_theme_mod('ecommerce_landing_page_designation_text') != '') {?>
                <p class="slider-para"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_designation_text')) ?></p>
              <?php }?>
              <?php if ( get_theme_mod('ecommerce_landing_page_banner_button_label','BUY NOW') != '' ) {?>
                <div class ="read-more mt-md-4 mt-0">
                  <a href="<?php echo esc_url(get_theme_mod('ecommerce_landing_page_top_button_url',false));?>"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_banner_button_label','BUY NOW'));?>
                    <span class="screen-reader-text"><?php esc_html_e( 'BUY NOW','ecommerce-landing-page');?></span>
                  </a>
                </div>
              <?php }?>
            </div>
            <!-- product cat -->
            <?php if( get_theme_mod( 'ecommerce_landing_page_show_hide_product',false) == 1) { ?>
              <?php if(get_theme_mod('ecommerce_landing_page_product_small_text') != '') {?>
                <p class="mt-5 product-small-text"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_product_small_text')) ?></p>
              <?php }?>
              <div class="slider-nav">
                <?php if ( class_exists( 'WooCommerce' ) ) {
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('ecommerce_landing_page_product_category'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                      <h2 class="slider-nav-title">
                        <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a>
                      </h2>
                    </div>
                  <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
              </div> 
            <?php }?>
              <!-- end -->
          </div>
          <div class="col-lg-6 col-md-6 col-12 text-center align-self-lg-center">
            <!-- product cat -->
            <?php if( get_theme_mod( 'ecommerce_landing_page_show_hide_product',false) == 1) { ?>
              <div class="banner-next position-relative">
                <div class="slider-for pt-4">
                  <?php if ( class_exists( 'WooCommerce' ) ) {
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('ecommerce_landing_page_product_category'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box-next">
                      <div class="slider-nav-box-inner-sec">
                        <div class="product-review-top">
                          <div class="d-flex gap-3 mb-3">
                              <p class="product-rating <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                            
                              <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_save', true) ) {?>
                                <div class="save-meta-fields">
                                  <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_save', true) ) {?>
                                    <span class="save-text"><?php echo esc_html(get_post_meta($post->ID,'ecommerce_landing_page_save',true)); ?></span>
                                  <?php }?>
                                </div>
                              <?php }?>
                          </div>
                          <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_orignal_price', true) ) {?>
                            <div class="orignal-price-meta-fields">
                              <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_orignal_price', true) ) {?>
                                <span class="review-text-count"><?php echo esc_html(get_post_meta($post->ID,'ecommerce_landing_page_orignal_price',true)); ?></span>
                              <?php }?>
                            </div>
                          <?php }?>
                        </div>
                        <div class="slider-nav-image-sec text-center">
                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                        </div>
                        <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_review_count', true) ) {?>
                          <div class="product-review">
                            <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_review', true) ) {?>
                              <div class="review-meta-fields mb-2">
                                <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_review', true) ) {?>
                                  <span class="review-text"><?php echo esc_html(get_post_meta($post->ID,'ecommerce_landing_page_review',true)); ?></span>
                                <?php }?>
                              </div>
                            <?php }?>
                            <span class="img-review-count">
                              <div class="review-count-meta-fields">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/view.png" alt="" />
                                <?php if( get_post_meta($post->ID, 'ecommerce_landing_page_review_count', true) ) {?>
                                  <span class="review-text-count"><?php echo esc_html(get_post_meta($post->ID,'ecommerce_landing_page_review_count',true)); ?></span>
                              </div>
                              <?php }?>
                            </span>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                  <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
                </div> 
              </div>
            <?php }?>
            <!-- end -->
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

<?php do_action( 'ecommerce_landing_page_after_slider' ); ?>

<!-- latest news and blog Section -->
  <?php if( get_theme_mod( 'ecommerce_landing_page_latest_news_blog_heading')|| get_theme_mod( 'ecommerce_landing_page_latest_news_blog_small_title') || get_theme_mod( 'ecommerce_landing_page_events_category')) { ?>
    <section id="latest-post-section" class="wow bounceInDown delay-1000 py-5" data-wow-duration="3s">
      <div class="container"> 
        <div class="latest-post-head">
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_heading') != '' ){ ?>
            <h2 class="heading-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_heading',''));?></h2>
          <?php }?>
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title') != '' ){ ?>
            <p class="small-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title',''));?></p>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $ecommerce_landing_page_catdata=  get_theme_mod('ecommerce_landing_page_events_category');
            if($ecommerce_landing_page_catdata){
            $page_query = new WP_Query(array( 'category_name' => esc_html($ecommerce_landing_page_catdata ,'ecommerce-landing-page'))); ?>         
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 pb-5">
                <div class="events-box position-relative">
                  <?php if(has_post_thumbnail()){
                   the_post_thumbnail(); ?>
                  <span class="event-date"><?php echo esc_html( get_the_date() ); ?></span>
                  <?php } ?>
                  <span class="event-location"><?php the_category(); ?></span>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                  <div class="author-comment d-flex gap-4 align-items-center">
                    <?php if( get_theme_mod( 'ecommerce_landing_page_blog_latest_post_author',true) == 1 || get_theme_mod( 'ecommerce_landing_page_blog_latest_post_comments',true) == 1 ) { ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_author',true)==1){ ?>
                        <span class="entry-author">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_author_icon','fas fa-user')); ?> me-2">
                          </i>
                          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?>
                            <span class="screen-reader-text"><?php the_author(); ?></span>
                          </a>
                        </span>
                      <?php } ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_comments',true)==1){ ?>
                        <span class="entry-comments">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_comments_icon','fas fa-comment')); ?> me-2" aria-hidden="true">
                          </i>
                          <?php comments_number( __('0 Comment', 'ecommerce-landing-page'), __('0 Comments', 'ecommerce-landing-page'), __('% Comments', 'ecommerce-landing-page') ); ?>
                        </span>
                      <?php } ?>

                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();}
          ?>
        </div>
      </div>
    </section>
  <?php }?>
<?php do_action( 'ecommerce_landing_page_after_latest_news_blog_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>