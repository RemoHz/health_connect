<?php get_header(); ?>
<!-- HC Page Header Section -->	
<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : ?>
    <div class="hc_page_header_area">
      <h1><?php printf( __( 'Tag Archives: %s', 'health-center-lite' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
      <?php if ( tag_description() ) : ?>
      <div class="archive-meta"><?php echo tag_description(); ?></div>
      <?php endif; ?>				
    </div>
    <?php endif; ?>
  </div>
</div>
<!-- /HC Page Header Section -->
<!-- HC Blog right Sidebar Section -->	
<div class="container">
  <div class="row hc_blog_wrapper">
    <!--Blog Content-->
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <?php if ( have_posts() ): ?>
      <?php while(have_posts()): the_post(); ?>
      <div class="hc_blog_section"  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="hc_post_date">
          <span class="date"><?php echo get_the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
          <span class="year"><?php echo the_time('Y');?></span>
        </div>
        <div class="hc_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="hc_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
            <a href="#"><i class="fa fa-comments"></i><?php comments_number( 'no comments', 'one comments', '% comments' ); ?></a>
            <div class="hc_tags">
              <i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>		
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <div class="hc_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive" ); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('health_center-blog_detail', $defalt_arg); ?>
          </a>
          <?php endif; ?>				
        </div>
        <div class="hc_blog_post_content">
          <p><?php the_excerpt(); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="hc_blog_pagination">
        <div class="hc_blog_pagi">
          <?php previous_posts_link(); ?>
          <?php next_posts_link(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>