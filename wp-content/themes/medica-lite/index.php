		<?php
		/**
		 *  The template for displaying Index.
		 *
		 *  @package ThemeIsle.
		 */
		get_header();
		?>
			<div class="wide-nav">
				<div class="wrapper">
					<h3><?php bloginfo( 'name' ); ?></h3>
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

							<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
								<h3 class="post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>
									</a><!--/a-->
								</h3><!--/h3 .post-title-->
								<div class="post-meta">
									<span>
										<?php echo get_the_date(); ?> <?php _e( '- Posted by:', 'medica-lite' ); ?> <a href="" title="<?php the_author(); ?>"><?php the_author_posts_link(); ?></a> <?php _e( '- In category:', 'medica-lite' ); ?> <?php the_category(', '); ?> <?php _e( '-', 'medica-lite' ); ?> <a href="#comments-template" title="<?php comments_number( __('No responses','medica-lite'), __('One comment','medica-lite'), __('% comments','medica-lite') ); ?>"><?php comments_number( __('No responses','medica-lite'), __('One comment','medica-lite'), __('% comments','medica-lite') ); ?></a>
									</span><!--/span-->
								</div><!--/div .post-meta-->

								<?php
								if ( $featured_image ) { ?>
									<img src="<?php echo esc_url( $featured_image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="featured-image" />
								<?php }
								?>

								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div><!--/div .post-excerpt-->
								<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read More', 'medica-lite' ); ?>" class="read-more">
									<span><?php _e( 'Read More', 'medica-lite' ); ?></span>
								</a><!--/a .read-more-->
							</div><!--/div .post-->

						<?php }
					} else {
						_e( 'No posts found', 'medica-lite' );
					}

					?>

					<div class="posts-navigation">
						<?php next_posts_link(esc_attr__( 'Prev', 'medica-lite' )); ?>
						<?php previous_posts_link(esc_attr__( 'Next', 'medica-lite' )); ?>
					</div><!--/div .posts-navigation-->
				</div><!--/div #posts-->
				<?php get_sidebar(); ?>
			</div><!--/div .wrapper-->
		</section><!--/section #content-->
		<?php get_footer(); ?>