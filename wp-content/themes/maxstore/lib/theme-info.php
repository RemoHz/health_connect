<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'maxstore_add_theme_info_page');
function maxstore_add_theme_info_page() {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'maxstore' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		esc_html__( 'Theme Info', 'maxstore' ), 
		'edit_theme_options', 
		'maxstore', 
		'maxstore_display_theme_info_page'
	);
	
}


// Display Theme Info page
function maxstore_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'maxstore' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'maxstore' ); ?>:</strong>
				<a href="<?php echo esc_url( 'http://themes4wp.com/theme/maxstore' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'maxstore' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.themes4wp.com/maxstore/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'maxstore' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.themes4wp.com/documentation/category/maxstore/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'maxstore' ); ?></a>
				<a href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/maxstore?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'maxstore' ); ?></a>
				<a href="<?php echo esc_url( 'https://wordpress.org/plugins/kirki/' ); ?>" target="_blank"><?php esc_html_e( 'Kirki (Theme options toolkit)', 'maxstore' ); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">
		
			<h3><?php printf( esc_html__( 'Getting Started with %s', 'maxstore' ), $theme->get( 'Name' ) ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
						
					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'maxstore' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'maxstore' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'http://demo.themes4wp.com/documentation/category/maxstore/' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'maxstore' ), 'MaxStore' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'maxstore' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. First install Kirki Toolkit and than click on "Customize Theme" to open the Customizer now.', 'maxstore' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize Theme', 'maxstore' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Pro Version', 'maxstore' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'maxstore' ), 'MaxStore'); ?>
						</p>
						<ul>
            	<li><?php esc_html_e( 'Unlimited colors', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( '600+ Google fonts', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( 'Sticky menu', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( 'Shortcodes generator', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( 'More homepage blocks', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( 'Custom widgets', 'maxstore' ); ?></li>
            	<li><?php esc_html_e( 'And much more...', 'maxstore' ); ?></li>
            </ul>
						<p>
							<a href="<?php echo esc_url( 'http://themes4wp.com/product/maxstore-pro/' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'maxstore' ), 'MaxStore'); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'maxstore' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="http://themes4wp.com/" title="Themes4WP">Themes4WP</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/maxstore?filter=5" title="MaxStore Review">' . esc_html__( 'rate it', 'maxstore' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'maxstore_theme_info_page_css');
function maxstore_theme_info_page_css( $hook ) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_maxstore' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('maxstore-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');

}