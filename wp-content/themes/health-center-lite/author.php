<?php get_header();?>
<!-- HC Page Header Section -->	
<div class="container">
  <div class="row">
    <div class="hc_page_header_area">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</div>
<!-- /HC Page Header Section -->
<!-- HC Blog right Sidebar Section -->	
<div class="container">
  <div class="row hc_blog_wrapper">
    <!--Blog Content-->
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <?php while(have_posts()): the_post(); ?>
      <div class="hc_blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="hc_post_date">
          <span class="date"><?php echo the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
          <span class="year"><?php echo the_time('Y'); ?></span>
        </div>
        <div class="hc_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="hc_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
            <a href="#"><i class="fa fa-comments"></i><?php comments_number( 'No Comments', 'one comments', '% comments' ); ?></a>
            <?php if(get_the_tag_list() != '') { ?>
            <div class="hc_tags">
              <i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>					
            </div>
            <?php }?>
          </div>
        </div>
        <div class="clear"></div>
        <div class="hc_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive"); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('health_center-blog_detail', $defalt_arg); ?>
          </a>
          <?php endif; ?>				
        </div>
        <div class="hc_blog_post_content">
          <p><?php the_content( __( 'Read More' , 'health-center-lite' ) ); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="hc_blog_pagination">
        <div class="hc_blog_pagi">
          <?php if ( get_next_posts_link() ) : ?>
          <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'health-center-lite' ) ); ?>
          <?php endif; ?>
          <?php if ( get_previous_posts_link() ) : ?>
          <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'health-center-lite' ) ); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>