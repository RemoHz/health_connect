<?php  get_header(); ?>
<!-- HC Page Header Section -->	
<div class="container">
  <div class="row">
    <div class="hc_page_header_area">
      <h1><?php if ( is_day() ) : ?>
        <?php  _e( "Daily Archives:", 'health-center-lite' ); echo (get_the_date()); ?>
        <?php elseif ( is_month() ) : ?>
        <?php  _e( "Monthly Archives:", 'health-center-lite' ); echo (get_the_date( 'F Y' )); ?>
        <?php elseif ( is_year() ) : ?>
        <?php  _e( "Yearly Archives:", 'health-center-lite' );  echo (get_the_date( 'Y' )); ?>
        <?php else : ?>
        <?php _e( "Blog Archives", 'health-center-lite' ); ?>
        <?php endif; ?>
      </h1>
    </div>
  </div>
</div>
<!-- HC Blog right Sidebar Section -->	
<div class="container">
  <div class="row hc_blog_wrapper">
    <!--Blog Content-->
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <?php if ( have_posts() ) : ?>
      <?php while(have_posts()): the_post(); ?>
      <div class="hc_blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="hc_post_date">
          <span class="date"><?php echo get_the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
          <span class="year"><?php echo the_time('Y'); ?></span>
        </div>
        <div class="hc_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="hc_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
            <a href="#"><i class="fa fa-comments"></i><?php comments_number( 'no comments','one comments','% comments' ); ?></a>
            <?php if(get_the_tag_list() !='' ) {?>
			<div class="hc_tags">
              <i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>		
            </div>
			<?php } ?>
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
    <?php get_sidebar();?>
  </div>
</div>
<?php get_footer(); ?>