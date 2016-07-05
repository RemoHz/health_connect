<p class="post-meta">
  <span class="fa fa-clock-o"></span><time class="posted-on published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
  <span class="fa fa-user"></span><span class="author-link"><?php the_author_posts_link(); ?></span>
  <span class="fa fa-comment"></span> <span class="comments-meta"><?php comments_popup_link( '0', '1', '%', 'comments-link', 'Off' );?></span>
  <span class="fa fa-folder-open"></span>
  <?php 
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    if($categories){
      foreach($categories as $category) {
        echo '<span class="cat-meta"><a href="'.esc_url(get_category_link($category->term_id)).'" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'maxstore' ), $category->name ) ) . '">' . esc_attr($category->cat_name) . '</a>'.$separator.'</span>';
      }                                                                                                                
    }
  ?>
  <?php edit_post_link(__('Edit','maxstore'), '<span class="fa fa-pencil-square"></span>', ''); ?>
</p>