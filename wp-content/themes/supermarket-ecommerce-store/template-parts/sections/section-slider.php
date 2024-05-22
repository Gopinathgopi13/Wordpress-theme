<section id="slider-section" class="slider-area home-slider">
  <!-- <div class="slideinning"></div> -->
  <div class="container">
  <!-- start of hero --> 
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 ">
        <?php
          if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        ?>

        <div class=" s-lhs-bar">
        <?php
          $supermarketecommercestore_popular_cattitle = get_theme_mod('supermarketecommercestore_popular_cattitle', ' All Categories');
        ?>       
        <div class="popular-catt">
          <?php echo ($supermarketecommercestore_popular_cattitle);  ?>    
        </div>
        <div class="category">
          <div class="row mr-0">  
            <?php
            $args = array(
              'number'     => 0,
              'orderby'    => 'title',
              'order'      => 'ASC',
              'hide_empty' => false
            );
            $product_categories = get_terms( 'product_cat', $args );

            $count = count($product_categories);
            if ( $count > 0 ){
              foreach ( $product_categories as $product_category ) {

              if(function_exists('get_term_meta')){
                if( isset( $product_category->term_id ) ){
                  //show parent categories
                    $thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
                    }
                  // get the image URL for parent category
                    $image =   wp_get_attachment_url($thumbnail_id);
                  }else{
                    $image = esc_html(get_template_directory_uri()).'/assets/images/default.png';
                  }
                if( isset( $product_category->name ) ){
                echo '<div class="item cat-product hvr-float-shadow"> ';
                  echo '<div class="row"> ';
                    echo ' <div class="col-md-2"> ';

                      echo' <div class="pro-cat-img">   
                      <a href="' . get_term_link( $product_category ) . '" target="_blank" data-hover="' . $product_category->name . '" ><img src="'.$image.'" alt=""   />
                        <div class="p-olay"></div></a>
                      </div>  
                    </div>
                      ';

                  echo ' <div class="col-md-10"> ';
                    echo ' <div class="pro-cat-content"> ';
                      echo '<h5><a href="' . get_term_link( $product_category ) . '" target="_blank" data-hover="' . $product_category->name . '" >
                        <span> ' . $product_category->name . '</span>
                        </a>
                      </h5>';
                    echo'
                    </div>
                  </div>

                  </div>
                </div>';
              }
              }
            }?>
          </div>
          <div class="clearfix"></div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 pd-0">
          <div class="sl-top-bar">
          <?php
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
          ?>
              <div class="category">
                <li>
                    <?php for($c=1; $c<7; $c++) { ?>
                      <?php if( get_theme_mod('category'.$c,false)) { ?>
                        
                        <?php $getcategoryname = get_theme_mod('category'.$c,true) ?>
                          <?php
                            $category = get_term_by( 'id', $getcategoryname, 'product_cat' );

                            // get image
                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
                            $cat_image = wp_get_attachment_url( $thumbnail_id ); 

                            // get name
                            $cat_name = $category->name;

                          ?>
                        
                        <?php
                            echo '<div class="slider-category col-lg-2 col-md-2 col-sm-6 col-xs-12">';
                            echo '<a href="' . get_term_link( $category ) . '">';

                            echo '<img src="'.$cat_image.'" alt="'.$cat_name.'" />';
                            echo '<h1>'.$cat_name.'</h1>';
                            echo '</a>';
                            echo '</div>';

                        ?>
                          

                      <?php } ?>
                    <?php } ?>
                  </li>
              </div>
            <?php } ?>
            
          </div>
        <section class="hero-slider hero-style">
          <div class="supermarket_ecommerce_storeswiper-container">
            <div class="swiper-wrapper">
              <?php for($p=1; $p<6; $p++) { ?>
              <?php if( get_theme_mod('slider'.$p,false)) { ?>
              <?php $querycolumns = new WP_query('page_id='.get_theme_mod('slider'.$p,true)); ?>
              <?php while( $querycolumns->have_posts() ) : $querycolumns->the_post(); 
                $image = wp_get_attachment_image_src(get_post_thumbnail_id() , true); ?>
              <?php 
                if(has_post_thumbnail()){
                  $img = esc_url($image[0]);
                }
                if(empty($image)){
                  $img = get_template_directory_uri().'/assets/images/default.png';
                }

              ?>

              <div class="supermarket_ecommerce_storeswiper-slide">
                  <div class="supermarket_ecommerce_storeslide-inner slide-bg-image">
                      <!-- <div class="row md-0"> -->
                          <div class="sliderimg">
                            <img class="slide-mainimg slidershape1" src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>">
                            <div class="sliderinn-img"></div>
                          </div>
                          <div class="slidersvg2">              
                              <div class="slidercontent">
                                  <!-- <div class="s-oly"></div> -->
                                <div class="slide-title">
                                    <h2><?php the_title_attribute(); ?></h2>   
                                  </div>    
                                  <div class="slide-text" >
                                      <?php the_excerpt(); ?>
                                  </div>
                                <div class="slide-btns">
                                  <a class="ReadMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('READ MORE','supermarket-ecommerce-store'); ?></a>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                        <!-- </div> -->
                      <!-- </div> -->
                  </div>
              </div>
              <?php endwhile;
                wp_reset_postdata(); ?>
              <?php } } ?>
              <div class="clear"></div> 

            </div>
            <!-- swipper controls -->
              <div class="supermarket_ecommerce_storeswiper-pagination"></div>
              <div class="supermarket_ecommerce_storeswiper-button-next"><i class="fa fa-angle-right"></i></div>
              <div class="supermarket_ecommerce_storeswiper-button-prev"><i class="fa fa-angle-left"></i></div>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 ">
        <?php 

          $supermarketecommercestore_sr_image = get_theme_mod('supermarketecommercestore_sr_image'); 
          $supermarketecommercestore_sliderighttitle = get_theme_mod('supermarketecommercestore_sliderighttitle', 'FRUIT MARKET');
          $supermarketecommercestore_sliderightext = get_theme_mod('supermarketecommercestore_sliderightext', 'WELLCOME TO');
          $supermarketecommercestore_sliderightaboveoffText = get_theme_mod('supermarketecommercestore_sliderightaboveoffText', '10% OFF');
          $supermarketecommercestore_sliderightaboveoffText2 = get_theme_mod('supermarketecommercestore_sliderightaboveoffText2', 'SHOP NOW');
        

          $supermarketecommercestore_rightBelowImage_image = get_theme_mod('supermarketecommercestore_rightBelowImage_image'); 
          $supermarketecommercestore_sliderightbelowbotitle = get_theme_mod('supermarketecommercestore_sliderightbelowbotitle', 'SUPER MARKET'); 
        ?>


        <div class="supermarketecommercestore-slide-right-area">
            <div class="FirstimageBox">
                <div class="OFFBox"><p><?php echo ($supermarketecommercestore_sliderightaboveoffText);  ?></p></div>
                <?php if ($supermarketecommercestore_sliderightaboveoffText2 != '') { ?>
                  <div class="shopBox"><p><?php echo ($supermarketecommercestore_sliderightaboveoffText2);  ?></p></div>
                <?php } ?>
                <div class="sh-bx">
                  <div class="sh-bx-lay"></div>
                <?php 
                if(!empty($supermarketecommercestore_sr_image)){
                    echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($supermarketecommercestore_sr_image).'" class="peccular-aboutus-imgboxshape" />';
                }else{
                    echo '<img alt="aboutus us" class="sh-oly" src="'.get_template_directory_uri().'/assets/images/slideleftimg2.jpg" />';
                }
                ?>
                <!-- <div class="sh-oly"></div> -->
              </div>
            <div class="slide-right-overlay"></div>
            <div class="supermarketecommercestore-s-rightblock">
                <div class="supermarketecommercestore-sr-text">
                    <?php echo ($supermarketecommercestore_sliderightext);  ?>
                </div>
                <div class="clearfix"></div>
                <div class="supermarketecommercestore-sr-title">
                    <?php echo ($supermarketecommercestore_sliderighttitle);  ?>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 SecondBelowImageBox">
            <!-- <div class="row md-0"> -->
                <div class="belowImageBoxes ">
                    <?php 
                if(!empty($supermarketecommercestore_rightBelowImage_image)){
                    echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($supermarketecommercestore_rightBelowImage_image).'" class="peccular-aboutus-imgboxshape" />';
                }else{
                    echo '<img alt="aboutus us" src="'.get_template_directory_uri().'/assets/images/slideleftimg2.jpg" />';
                }
                ?>
                </div>
                

            <!-- </div> -->
            <?php if ($supermarketecommercestore_sliderightbelowbotitle != '') { ?>
              <div class="RightBelowBoxMaintitle"><h3><?php echo ($supermarketecommercestore_sliderightbelowbotitle);  ?></h3></div>
            <?php } ?>
          </div>

        </div>

      </div>
  </div>
    </div>
  
  <!-- end of hero slider -->
  </div>
</section>


