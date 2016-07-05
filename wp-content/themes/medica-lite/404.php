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
						<?php
						if ( get_theme_mod( 'medica_lite_404_title', '404 ERROR' ) ) {
							echo esc_attr( get_theme_mod( 'medica_lite_404_title', 'Page Not Found' ) );
						}
						?>
					</h3><!--/h3-->
				</div><!--/div .wrapper-->
			</div><!--/div .wide-nav-->
		</header><!--/header-->
		<section id="content">
			<div class="wrapper cf">
				<div id="posts">
					<div class="post">
						<h3 class="post-title">
							<?php
							if ( get_theme_mod( 'medica_lite_404_subtitle', 'The page does not exist' ) ) {
								echo esc_attr( get_theme_mod( 'medica_lite_404_subtitle', 'The page does not exist' ) );
							}
							?>
						</h3><!--/h3 .post-title-->
						<div class="post-excerpt">
							<?php
							if ( get_theme_mod( 'medica_lite_404_entry', 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'medica-lite' ) .'">'. __( 'home page', 'medica-lite' ) .'</a>.' ) ) {
								echo htmlspecialchars_decode( get_theme_mod( 'medica_lite_404_entry', 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'medica-lite' ) .'">'. __( 'home page', 'medica-lite' ) .'</a>.' ) );
							}
							?>
						</div><!--/div .post-excerpt-->
					</div><!--/div .post-->
				</div><!--/div #posts-->
				
			</div><!--/div .wrapper-->
		</section><!--/section #content-->
		<?php get_footer(); ?>