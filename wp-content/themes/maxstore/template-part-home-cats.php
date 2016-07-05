<?php
      $first_img  = get_post_meta( get_the_ID(), 'maxstore_first_image', true );
      $first_img_title  = get_post_meta( get_the_ID(), 'maxstore_first_img_title', true );
      $first_img_desc  = get_post_meta( get_the_ID(), 'maxstore_first_img_desc', true );
      $first_img_button  = get_post_meta( get_the_ID(), 'maxstore_first_img_button', true );
      $first_img_button_url  = get_post_meta( get_the_ID(), 'maxstore_first_img_button_url', true );
      $second_cat  = get_post_meta( get_the_ID(), 'maxstore_second_cat', true );
    ?>    
  <?php if ($first_img != '' && $second_cat != '') : ?> 
    <div class="top-area row no-gutter">       
      <div class="topfirst-img col-sm-6">     
        <div class="top-grid-img">
         <img width="600" height="600" src="<?php echo esc_url($first_img); ?>" title="<?php echo esc_attr($first_img_title); ?>" alt="<?php echo esc_attr($first_img_desc); ?>"> 
        </div>
        <div class="top-grid-heading">
          <?php if ($first_img_title != '') { ?>
            <h2>
             <?php echo esc_attr($first_img_title); ?>
            </h2>
          <?php } ?>  
          <?php if ($first_img_desc != '') { ?>
            <p>
             <?php echo esc_attr($first_img_desc); ?>
            </p>
          <?php } ?> 
          <?php if ($first_img_button_url != '' && $first_img_button != '') { ?>
            <p>                                      
              <div class="btn btn-primary btn-md outline"><a href="<?php echo esc_url($first_img_button_url); ?>"><?php echo esc_attr($first_img_button);?></a></div>                                  
            </p>
          <?php } ?>   
        </div>    
      </div>
       
      <div class="topsecond-img col-sm-6">
        <?php 
        	$term = get_term_by( 'id', $second_cat, 'product_cat');;
        	$term_name = $term->name;
        	$term_id = $term->term_id;
        	$term_slug = $term->slug;
        	$desc = $term->description;
        	$terms = get_terms( $term_slug );
        	$category_link = get_term_link( $term );
        	$thumb_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
          $term_img = wp_get_attachment_image( $thumb_id, 'maxstore-home-top' );
        ?>
        <div class="top-grid-cat col-xs-6">
          <a href="<?php echo esc_url($category_link); ?>"> 
          <div class="top-grid-img">
            <?php if ($term_img) echo $term_img; else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
          </div>
          <div class="top-grid-heading">
            <h2>
             <?php if ($term_name) echo esc_attr($term_name); ?>
            </h2>
            <p>
             <?php if ($desc) echo substr($desc, 0, 30), '...'; ?>
            </p>
          </div>
          </a> 
         </div>
         <div class="top-grid-products">
           <ul class="products list-unstyled">
              <?php
                  $args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'product_cat' => $term_slug );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                          <li class="product-cats col-xs-6">    
                              <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                  <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                                  <div class="top-grid-img">  
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'maxstore-home-top'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                                  </div>
                                  <div class="top-grid-heading">
                                    <h2><?php the_title(); ?></h2>
                                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                                  </div>                    
                              </a>
                          </li>
          
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
          </ul><!--/.products--> 
        </div>    
      </div>   
    </div>
  <?php endif; ?>
