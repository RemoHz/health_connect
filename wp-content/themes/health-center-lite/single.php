<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="hc_blog_detail_header_section">
        <?php the_post(); ?>
        <div class="hc_post_date">
          <span class="date"><?php echo the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
          <span class="year"><?php echo the_time('Y'); ?></span>
        </div>
        <div class="hc_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="hc_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
             <a href="<?php get_comment_link('ID'); ?>"><i class="fa fa-comments"></i><?php comments_popup_link( __( "Leave a comment", 'health-center-lite' ),__( "1 Comment", 'health-center-lite' ), __( "% Comments", 'health-center-lite' ),'name' ); ?></a>
            <?php if(get_the_tag_list() != '') { ?>
            <div class="hc_tags">
              <i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>					
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row hc_blog_wrapper">
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <div class="hc_blog_detail_section">
        <div class="hc_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive" ); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('', $defalt_arg); ?>
          </a>
          <?php endif; ?>				
        </div>
        <div class="hc_blog_post_content">
          <p><?php the_content( __( 'Read More' , 'health-center-lite' ) ); ?></p>
			<?php wp_link_pages( ); ?>
		</div>
      </div>
      <?php comments_template('',true); ?>
    </div>
    <?php get_sidebar();  ?>
  </div>
</div>
<?php get_footer(); ?>