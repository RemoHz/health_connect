<?php

/**
 *	Require Once
 */
require_once( 'includes/custom-functions.php' );
require_once( 'includes/customizer.php' );
require_once( 'includes/tgm-plugin-activation/tgm-plugin-activation.php' );

/**
 *  WP Render Title
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function medica_lite_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'medica_lite_render_title' );
}

/**
 *  Medica Lite Setup
 */
if ( !function_exists( 'medica_lite_setup' ) ) {

    function medica_lite_setup() {

        // Post Thumbnails
        add_theme_support( "post-thumbnails" );

        // Automatic Feed Links
        add_theme_support( "automatic-feed-links" );

        // Title Tag
        add_theme_support( "title-tag" );

        // Custom Header
        $args_custom_header = array(
            'width'                 => '180',
            'height'                => '60',
            'flex-height'           => true,
            'header-text'           => true,
             'default-text-color'   => '42b3e5',
            'wp-head-callback'      => 'medica_header_style'
        );
        add_theme_support( "custom-header", $args_custom_header );

        // Custom Background
        $args_custom_background = array(
            'default-color'         => '#ffffff',
            'default-repeat'        => 'no-repeat',
            'default-attachment'    => 'fixed'
        );
        add_theme_support( "custom-background", $args_custom_background );

        // Load Plugin Textdomain
		load_theme_textdomain('medica-lite', get_template_directory() . '/languages'); 

        // Header Navigation
        $header_navigation_args = array(
            'header-navigation' => __( 'This menu will appear in header.', 'medica-lite' ),
        );
        register_nav_menus( $header_navigation_args );

        // Footer Navigation
        $footer_navigation_args = array(
            'footer-navigation' => __( 'This menu will appear in footer.', 'medica-lite' ),
        );
        register_nav_menus( $footer_navigation_args );

        // Add Editor Style
        add_editor_style();

    }

}
add_action( 'after_setup_theme', 'medica_lite_setup' );

/**
 *  Content Width
 */
if ( ! isset( $content_width ) ) $content_width = 634;

/**
 *	WP Enqueue Style
 */
function medica_lite_wp_enqueue_style() {

    wp_enqueue_style( 'medica-lite_style', get_stylesheet_uri(), array(), '1.3' );
    wp_enqueue_style( 'medica-lite_nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css', array(), '1.2.0' );
    wp_enqueue_style( 'medica-lite_font-family-raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900', array(), '1.0' );
    wp_enqueue_style( 'medica-lite_font-family-roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,900italic,900,700italic,700,500italic,500', array(), '1.0' );
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

}
add_action( 'wp_enqueue_scripts', 'medica_lite_wp_enqueue_style' );

/**
 *	WP Enqueue Scripts
 */
function medica_lite_wp_enqueue_scripts() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'medica-lite_nivo-lightbox.min', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array(), '1.2.0', false );
    wp_enqueue_script( 'medica-lite_html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.2', false );
    wp_enqueue_script( 'medica-lite_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'medica_lite_wp_enqueue_scripts' );

/**
 *  General Sidebar
 */
function medica_lite_general_sidebar() {

    $args = array(
        'id'            => 'general-sidebar',
        'name'          => __( 'General Sidebar', 'medica-lite' ),
        'description'   => __( 'Use this sidebar to display widgets in your website, including posts and pages.', 'medica-lite' ),
        'before_title'  => '<div class="title-widget">',
        'after_title'   => '</div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'medica_lite_general_sidebar' );

/**
 * Load only in IE as of WP 4.1
 */
function medica_lite_html5shiv( $tag, $handle, $src ) {
    if ( 'medica_lite_html5shiv' === $handle ) {
        $tag = "<!--[if lt IE 9]>\n";
        $tag .= "<script type='text/javascript' src='$src'></script>\n";
        $tag .= "<![endif]-->\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'medica_lite_html5shiv', 10, 3 );

function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove Logo */
        $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);


function medica_header_style() {

    $header_image = get_header_image();
    $text_color   = get_header_textcolor();

    ?>
    <style type="text/css" id="medica-header-css">
    <?php

        if ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
    ?>
        #header-top .header-left a.logo .logo-title {
            color: #<?php echo esc_attr( $text_color ); ?>;
        }
    <?php endif; ?>
    </style>

<?php

}