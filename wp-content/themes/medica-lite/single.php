		<?php
		/**
		 *  The template for displaying Single.
		 *
		 *  @package ThemeIsle.
		 */
		get_header();
		?>
			<div class="wide-nav">
				<div class="wrapper">
					<h3>
						<?php _e( 'Blog', 'medica-lite' ); ?>
					</h3><!--/h3-->
				</div><!--/div .wrapper-->
			</div><!--/div .wide-nav-->
		</header><!--/header-->
		<section id="content">
			<div class="wrapper cf">
				<div id="posts">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

							<div class="post">
								<h3 class="post-title">
									<?php the_title(); ?>
								</h3><!--/h3 .post-title-->
								<div class="post-meta">
									<span>
										<?php echo get_the_date(); ?> <?php _e( '- Posted by:', 'medica-lite' ); ?> <a href="" title="<?php the_author(); ?>"><?php the_author_posts_link(); ?></a> <?php _e( '- In category:', 'medica-lite' ); ?> <?php the_category(', '); ?> <?php _e( '-', 'medica-lite' ); ?> <a href="#comments-template" title="<?php comments_number( __('No responses','medica-lite'), __('One comment','medica-lite'), __('% comments','medica-lite') ); ?>"><?php comments_number( __('No responses','medica-lite'), __('One comment','medica-lite'), __('% comments','medica-lite') ); ?></a>
									</span><!--/span-->
								</div><!--/div .post-meta-->
								<?php
								if ( $featured_image ) { ?>
									<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="featured-image" />
								<?php }
								?>
								<div class="post-excerpt">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div><!--/div .post-excerpt-->
								<?php
									wp_link_pages( array(
										'before'      => '<div class="post-links"><span class="post-links-title">' . __( 'Pages:', 'medica-lite' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
								<div class="post-tags">
									<?php the_tags('<span>'.__('Tags:','medica-lite').'</span> '); ?>
								</div><!--/div .post-tags-->
								<div class="single-navigation cf">
									<?php next_post_link('%link', 'Next Post', true); ?>
									<?php previous_post_link('%link', 'Previous Post', true); ?>
								</div><!--/div .single-navigation .cf-->
								<?php comments_template(); ?>
							</div><!--/div .post-->

						<?php }
					} else {
						echo __( 'No posts found', 'medica-lite' );
					}

					?>
				</div><!--/div #posts-->
				<?php get_sidebar(); ?>
			</div><!--/div .wrapper-->
		</section><!--/section #content-->
		<?php get_footer(); ?>