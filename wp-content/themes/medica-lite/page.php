		<?php
		/**
		 *  The template for displaying Page.
		 *
		 *  @package ThemeIsle.
		 */
		get_header();
		?>
			<div class="wide-nav">
				<div class="wrapper">
					<h3>
						<?php the_title(); ?>
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
								<?php
								if ( $featured_image ) { ?>
									<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="featured-image" />
								<?php }
								?>
								<div class="post-excerpt">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div><!--/div .post-excerpt-->
								<?php comments_template(); ?>
							</div><!--/div .post-->

						<?php }
					} else {
						echo __( 'No posts found', 'medica-lite' );
					}

					?>
				</div><!--/div #posts-->
				
			</div><!--/div .wrapper-->
		</section><!--/section #content-->
		<?php get_footer(); ?>