<?php
/**
 *  The template for displaying Header.
 *
 *  @package ThemeIsle.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<script type="text/javascript"> //<![CDATA[ 
		var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
		document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
		//]]>
		</script>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<div class="wide-header">
				<div class="wrapper cf">
					<div id="header-top" class="cf">
						<div class="header-left cf">
							<a class="logo" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>">
								<?php
								if ( get_header_image() != NULL ) {
									echo '<img src="'. esc_url( get_header_image() ) .'" width="'. get_custom_header()->width .'" height="'. get_custom_header()->height .'" title="'. get_bloginfo( 'name' ) .'" alt="'. get_bloginfo( 'name' ) .'" />';
								} else {

									/* echo '<div class="logo-title">';
									echo get_bloginfo( 'name' );
									echo '</div><!--/.logo-title-->';
									echo '<div class="logo-description">';
									echo get_bloginfo( 'description' );
									echo '</div>'; */
									
									echo '<img src="https://www.health-connect.site/logo.png">';
								}
								
								?>
							</a><!--/a .logo-->
							<div class="header-contact">
								<?php
								/*if ( get_theme_mod( 'medica_lite_general_contactinfo_telephonetitle', 'Telephone' ) ) {
									echo esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_telephonetitle', 'Telephone' ) ) . '<br />';
								} else {
									echo '<br />';
								} */

								if (is_user_logged_in ()){
									$user=wp_get_current_user();
									$name=$user->display_name;
									
									// Hidden previous login button
									//echo '<label style="font-size:14px;">Welcome, '.$name.'!</label><br>';
									//echo '<a style="font-size:14px;margin-top:5px;" href="./logout"><button style="width:70px;background:#42b3e5;color:#FFF;">Log Out</button></a>';
								}
								else{
									// Button Customize
									echo '<a style="font-size:14px;width:70px;" href="https://www.health-connect.site/login/"><button onmouseover="this.style.background=\'#208fbf\'" onmouseout="this.style.background=\'#42b3e5\';" style="width:70px;background:#42b3e5;color:#FFF;text-decoration:none;border:none;">Log In</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
									echo '<a style="font-size:14px;margin-top:5px;width:70px;" href="https://www.health-connect.site/membership-registration/"><button onmouseover="this.style.background=\'#208fbf\'" onmouseout="this.style.background=\'#42b3e5\';" style="width:70px;background:#42b3e5;color:#FFF;text-decoration:none;border:none;">Register</button></a><br>'; 
								}

								/* if ( get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) {
									echo '<a href="tel:'. esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) ) .'" title="'. esc_attr( get_theme_mod( 'medica_lite_general_contactinfo_telephonetitle', 'Telephone' ) ) .'"><i class="icon-phone"></i> '. get_theme_mod( 'medica_lite_general_contactinfo_telephonenumber', '+1 223 456 23' ) .'</a>';
								} else {
									echo '<div style="margin-top: 24px;"></div>';
								} */
								?>
								<ul class="cf">
									<?php
									if ( get_theme_mod( 'medica_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) {
										echo '<li class="header-facebook-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) .'" title="'. __( 'Facebook', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) {
										echo '<li class="header-twitter-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) .'" title="'. __( 'Twitter', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) {
										echo '<li class="header-youtube-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) .'" title="'. __( 'Tumblr', 'medica-lite' ) .'" target="_blank"></a></li>';
									}

									if ( get_theme_mod( 'medica_lite_general_socialslink_linkedinlink', 'http://www.linkedin.com' ) ) {
										echo '<li class="header-linkedin-icon"><a href="'. esc_url( get_theme_mod( 'medica_lite_general_socialslink_linkedinlink', 'http://www.linkedin.com' ) ) .'" title="'. __( 'Instagram', 'medica-lite' ) .'" target="_blank"></a></li>';
									}
									echo '<li class="header-fliker-icon"><a href="https://www.flickr.com/photos/142164998@N08/" title="Flickr" target="_blank"></a></li>';
									echo '<li class="header-pin-icon"><a href="https://au.pinterest.com/healthconnect20/" title="Pinterest" target="_blank"></a></li>';
									?>
								</ul>
							</div><!--/div .header-contact-->
						</div><!--/div .header-left-->
					</div><!--/div #header-top-->
					<nav class="navigation">
						<div class="openresponsivemenu">
						</div><!--/.openresponsivemenu-->
						<div class="navigation-menu">
							<?php
							wp_nav_menu( array(
									'theme_location'	=> 'header-navigation',
									'container'			=> '',
									'container_class'	=> ''
								)
							);
							
						
							?>
						</div><!--/.navigation-menu-->
						</div>
					</nav><!--/.navigation-->
				</div><!--/div .wrapper-->
			</div><!--/div .wide-header-->