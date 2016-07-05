<?php 	/**Includes reqired resources here**/
   	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
   	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
   	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
   	define('WEBRITI_THEME_OPTIONS_PATH',WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
   	
   	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
   	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php' ); // for Custom Menus	
   	
   	require( WEBRITI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); //for comments
   	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php' ); //for widget register
	require_once('theme_setup_data.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_color.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_header.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_home_page.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_typography.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_post_slug.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_template.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_socila_link.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	
   	
   	
   	//content width
   	if ( ! isset( $content_width ) ) $content_width = 900;		
   	//wp title tag starts here
   	function hc_head( $title, $sep )
   	{	global $paged, $page;		
   		if ( is_feed() )
   			return $title;
   		// Add the site name.
   		$title .= get_bloginfo( 'name' );
   		// Add the site description for the home/front page.
   		$site_description = get_bloginfo( 'description' );
   		if ( $site_description && ( is_home() || is_front_page() ) )
   			$title = "$title $sep $site_description";
   		// Add a page number if necessary.
   		if ( $paged >= 2 || $page >= 2 )
   			$title = "$title $sep " . sprintf( _e( 'Page', 'health-center-lite' ), max( $paged, $page ) );
   		return $title;
   	}	
   	add_filter( 'wp_title', 'hc_head', 10,2 );
   	
   	add_action( 'after_setup_theme', 'hc_setup' ); 	
   	function hc_setup()
   	{	// Load text domain for translation-ready
   		load_theme_textdomain( 'health-center-lite', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );		
   		
   		add_theme_support( 'post-thumbnails' ); //supports featured image
   		// This theme uses wp_nav_menu() in one location.
   		register_nav_menu( 'primary', __( 'Primary Menu', 'health-center-lite' ) );
   		// theme support 	
   		$args = array('default-color' => '000000',);
   		add_theme_support( 'custom-background', $args  ); 
   		add_theme_support( 'automatic-feed-links'); 
   		
   		require_once('theme_setup_data.php');
   		function hc_custom_excerpt_length( $length ) {	return 50; }
   		add_filter( 'excerpt_length', 'hc_custom_excerpt_length', 999 );
   		
   		function hc_new_excerpt_more( $more ) {	return '';}
   		add_filter('excerpt_more', 'hc_new_excerpt_more');
   	}
   	/******** health-center-lite center js and cs *********/
   	function hc_scripts()
   	{	// Theme Css

		wp_enqueue_style('health-style', get_stylesheet_uri() );
		
   		wp_enqueue_style('health-center-lite-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
   		
		wp_enqueue_style('health-center-lite-font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');	
   		
		wp_enqueue_style('health-center-lite-bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
   		
		wp_enqueue_style('health-center-lite-font-awesome', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');	
   		
		wp_enqueue_script('health-center-lite-menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
   		
		wp_enqueue_script('health-center-lite-bootstrap_min', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');	
   	}
   	
   	add_action('wp_enqueue_scripts', 'hc_scripts');
   	if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
   	
   	// Read more tag to formatting in blog page 
   	function hc_content_more($more)
   	{  global $post;
   	   return ' <a href="' . get_permalink() . "#more-{$post->ID}\" class=\"hc_blog_btn\">Read More<i class='fa fa-long-arrow-right'></i></a>";
   	}   
   	add_filter( 'the_content_more_link', 'hc_content_more' );
	
add_action( 'admin_enqueue_scripts', 'admin_enqueue_script_function' );
function admin_enqueue_script_function()
{
wp_enqueue_style('health-drag-drop',WEBRITI_TEMPLATE_DIR_URI.'/css/drag-drop.css');
}

function health_custmizer_style()
 {
		wp_enqueue_style('health-customizer-css',WEBRITI_TEMPLATE_DIR_URI.'/css/cust-style.css');
}
add_action('customize_controls_print_styles','health_custmizer_style');


add_action('wp_head','head_enqueue_custom_css');
function head_enqueue_custom_css()
{
	$hc_lite_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'hc_lite_options', array() ), $hc_lite_options ); 
	if($current_options['webrit_custom_css']!='') {  ?>
	<style>
	<?php echo $current_options['webrit_custom_css']; ?>
	</style>
<?php } } ?>