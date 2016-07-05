			<?php
			/**
			 *  The template for displaying Page Contact.
			 *
			 *  @package ThemeIsle.
			 *
			 *	Template Name: Contact
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
			  	<div id="contact-content" class="cf">

			  		<?php
			  		if ( get_theme_mod( 'medica_lite_general_contactinfo_mapcode' ) ) { ?>

			  			<div id="map-city">
			  				<?php echo htmlspecialchars_decode( get_theme_mod( 'medica_lite_general_contactinfo_mapcode' ) ); ?>
			  			</div><!--/#map-city-->

			  			<?php
				  		if ( get_theme_mod( 'medica_lite_general_contactinfo_addresstitle', 'Address' ) || get_theme_mod( 'medica_lite_general_contactinfo_addressentry', 'Northwest Valley<br /> 35th Ave. at Northern<br /> 7805 N 35th Ave<br /> Phoenix, AZ 85051' ) || get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) { ?>

				  			<div id="contact-information" class="cf">
					  			<?php
					  			if ( get_theme_mod( 'medica_lite_general_contactinfo_addresstitle', 'Address' ) ) {
					  				echo '<div class="title">'. esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_addresstitle', 'Address' ) ) .'</div>';
					  			}

					  			if ( get_theme_mod( 'medica_lite_general_contactinfo_addressentry', 'Northwest Valley<br /> 35th Ave. at Northern<br /> 7805 N 35th Ave<br /> Phoenix, AZ 85051' ) ) {
					  				echo '<span>'. get_theme_mod( 'medica_lite_general_contactinfo_addressentry', 'Northwest Valley<br /> 35th Ave. at Northern<br /> 7805 N 35th Ave<br /> Phoenix, AZ 85051' ) .'</span>';
					  			}

					  			if ( get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) {
									echo '<a href="tel:'. esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) .'"><i class="icon-phone"></i> '. esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) .'</a>';
								}
					  			?>
								<ul class="cf">
									<?php
									if ( get_theme_mod( 'medica_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) {
										echo '<li class="contact-facebook-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) .'" title="'. __( 'Facebook', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) {
										echo '<li class="contact-twitter-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) .'" title="'. __( 'Twitter', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) {
										echo '<li class="contact-youtube-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) .'" title="'. __( 'YouTube', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_linkedinlink', 'http://www.linkedin.com' ) ) {
										echo '<li class="contact-linkedin-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_linkedinlink', 'http://www.linkedin.com' ) ) .'" title="'. __( 'LinkedIn', 'medica-lite' ) .'" target="_blank"></a></li>';
									}
									?>
								</ul>
					  		</div> <!-- /div contact-information -->

				  		<?php }

			  		}
			  		?>
			  	<div class="cf"></div>
			  	<?php
			  	if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); ?>

							<div class="contact-content">
								<?php the_content(); ?>
							</div><!--/.contact-content-->

							<?php }
					} else {
						echo __( 'No posts found', 'medica-lite' );
					}
			  	?>
			  	</div> <!-- /div #contact-content -->
			</div><!--/div .wrapper-->
		</section><!--/section #content-->
		<?php get_footer(); ?>