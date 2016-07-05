<?php
/**
 * Kirki Advanced Customizer
 * @package maxstore
 */

// Early exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
  /* Register Kirki config */
  Kirki::add_config( 'maxstore_settings', array(
    'capability'    => 'edit_theme_options',
    'option_type' => 'theme_mod',
  ) );
  
	/**
	 * Add sections
	 */
	Kirki::add_section( 'sidebar_section', array(
		'title'       => __( 'Sidebars', 'maxstore' ),
		'priority'    => 10,
		'description' => __( 'Sidebar layouts.', 'maxstore' ),
	) );

	Kirki::add_section( 'layout_section', array(
		'title'       => __( 'Main styling', 'maxstore' ),
		'priority'    => 10,
		'description' => __( 'Define theme layout', 'maxstore' ),
	) );
  
	Kirki::add_section( 'top_bar_section', array(
		'title'       => __( 'Top Bar', 'maxstore' ),
		'priority'    => 10,
		'description' => __( 'Top bar text', 'maxstore' ),
	) );
	
	Kirki::add_section( 'search_bar_section', array(
		'title'       => __( 'Search Bar & Social', 'maxstore' ),
		'priority'    => 10,
		'description' => __( 'Search and social icons', 'maxstore' ),
	) );
	
	Kirki::add_section( 'site_bg_section', array(
		'title'       => __( 'Site Background', 'maxstore' ),
		'priority'    => 10,
	) );
	
	Kirki::add_section( 'colors_section', array(
		'title'       => __( 'Colors', 'maxstore' ),
		'priority'    => 10,
	) );
	
  if ( class_exists( 'WooCommerce' ) ) {	
    Kirki::add_section( 'woo_section', array(
  		'title'       => __( 'WooCommerce', 'maxstore' ),
  		'priority'    => 10,
  	) );
  }
  Kirki::add_section( 'links_section', array(
		'title'       => __( 'Theme Important Links', 'maxstore' ),
		'priority'    => 190,
	) );

  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'switch',
  	'settings'    => 'rigth-sidebar-check',
  	'label'       => __( 'Right Sidebar', 'maxstore' ),
  	'description' => __( 'Enable the Right Sidebar', 'maxstore' ),
  	'section'     => 'sidebar_section',
  	'default'     => 1,
  	'priority'    => 10,
	) );

	Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'right-sidebar-size',
		'label'       => __( 'Right Sidebar Size', 'maxstore' ),
		'section'     => 'sidebar_section',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => array(
			'1' => '1',
      '2' => '2',
      '3' => '3',
      '4' => '4',
		),
	) );
	
	Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'switch',
  	'settings'    => 'left-sidebar-check',
  	'label'       => __( 'Left Sidebar', 'maxstore' ),
  	'description' => __( 'Enable the Left Sidebar', 'maxstore' ),
  	'section'     => 'sidebar_section',
  	'default'     => 0,
  	'priority'    => 10,
	) );

	Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'left-sidebar-size',
		'label'       => __( 'Left Sidebar Size', 'maxstore' ),
		'section'     => 'sidebar_section',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => array(
			'1' => '1',
      '2' => '2',
      '3' => '3',
      '4' => '4',
		),
	) );
  

  Kirki::add_field( 'maxstore_settings', array(
	  'type'        => 'image',
    'settings'     => 'header-logo',
    'label'       => __( 'Logo', 'maxstore' ),
    'description' => __( 'Upload your logo', 'maxstore' ),
    'section'     => 'layout_section',
    'default'     => '',
    'priority'    => 10,
	) );


  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'textarea',
		'settings'    => 'infobox-text-left',
		'label'       => __( 'Top bar left', 'maxstore' ),
		'description' => __( 'Top bar left text area', 'maxstore' ),
		'help'        => __( 'You can add custom text. Only text allowed!', 'maxstore' ),
		'section'     => 'top_bar_section',
		'sanitize_callback' => 'wp_kses_post',
		'default'     => '',
		'priority'    => 10,
	) );
	Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'textarea',
		'settings'    => 'infobox-text-right',
		'label'       => __( 'Top bar right', 'maxstore' ),
		'description' => __( 'Top bar right text area', 'maxstore' ),
		'help'        => __( 'You can add custom text. Only text allowed!', 'maxstore' ),
		'section'     => 'top_bar_section',
		'sanitize_callback' => 'wp_kses_post',
		'default'     => '',
		'priority'    => 10,
	) );     

  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'switch',
  	'settings'    => 'search-bar-check',
  	'label'       => __( 'Search bar', 'maxstore' ),
  	'description' => __( 'Enable search bar with social icons', 'maxstore' ),
  	'section'     => 'search_bar_section',
  	'default'     => 0,
  	'priority'    => 10,
	) );
  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'switch',
  	'settings'    => 'maxstore_socials',
  	'label'       => __( 'Social Icons', 'maxstore' ),
  	'description' => __( 'Enable or Disable the social icons', 'maxstore' ),
  	'section'     => 'search_bar_section',
  	'default'     => 0,
  	'priority'    => 10,
  	'required'  => array(
        array(
            'setting'  => 'search-bar-check',
            'operator' => '==',
            'value'    => 1,
        ),
    )
	) );   
  $s_social_links = array(
    'twp_social_facebook' 	=> __( 'Facebook', 'maxstore' ),
		'twp_social_twitter' 		=> __( 'Twitter', 'maxstore' ),
		'twp_social_google' 	=> __( 'Google-Plus' , 'maxstore' ),
		'twp_social_instagram' 	=> __( 'Instagram', 'maxstore' ),
		'twp_social_pin' 	=> __( 'Pinterest', 'maxstore' ),
		'twp_social_youtube' 		=> __( 'YouTube', 'maxstore' ),
		'twp_social_reddit' 	=> __( 'Reddit', 'maxstore' ),
  );

  foreach ( $s_social_links as $keys => $values ) {                
  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'text',
		'settings'    => $keys,
		'label'       => $values,
		'description' => sprintf( __( 'Insert your custom link to show the %s icon.', 'maxstore' ), $values ),
		'help'        => __( 'Leave blank to hide icon.', 'maxstore' ),
		'section'     => 'search_bar_section',
		'default'     => '',
		'priority'    => 10,
		'required'  => array(
        array(
            'setting'  => 'search-bar-check',
            'operator' => '==',
            'value'    => 1,
        ),
    )
	) );
  }    

  Kirki::add_field( 'maxstore_settings', array(
  'type'        => 'color',
	'settings'    => 'color_site_title',
	'label'       => __( 'Site title color', 'maxstore' ),
	'help'        => __( 'Site title text color, if not defined logo.', 'maxstore' ),
	'section'     => 'colors_section',
	'default'     => '#222',
	'priority'    => 10,
	'output'      => array(
		array(
			'element'  => '.rsrc-header-text a',
			'property' => 'color',
			'units'    => ' !important',
		),
	),
  ) );
  Kirki::add_field( 'maxstore_settings', array(
  'type'        => 'color',
	'settings'    => 'color_site_desc',
	'label'       => __( 'Site description color', 'maxstore' ),
	'help'        => __( 'Site description text color, if not defined logo.', 'maxstore' ),
	'section'     => 'colors_section',
	'default'     => '#B6B6B6',
	'priority'    => 10,
	'output'      => array(
		array(
			'element'  => 'h2.site-desc, h3.site-desc',
			'property' => 'color',
		),
	),
  ) );    
  
  if (function_exists('YITH_WCWL')) {
  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'switch',
  	'settings'    => 'wishlist-top-icon',
  	'label'       => __( 'Header Wishlist icon', 'maxstore' ),
  	'description' => __( 'Enable or disable heart icon with counter in header', 'maxstore' ),
  	'section'     => 'woo_section',
  	'default'     => 0,
  	'priority'    => 10,
	) );
	}
  Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'slider',
  	'settings'    => 'archive_number_products',
  	'label'       => __( 'Number of products', 'maxstore' ),
  	'description' => __( 'Change number of products displayed per page in archive(shop) page.', 'maxstore' ),
  	'section'     => 'woo_section',
  	'default'     => 24,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 2,
        'max'  => 60,
        'step' => 1
    ),
  ) );
    Kirki::add_field( 'maxstore_settings', array(
		'type'        => 'slider',
  	'settings'    => 'archive_number_columns',
  	'label'       => __( 'Number of products per row', 'maxstore' ),
  	'description' => __( 'Change the number of product columns per row in archive(shop) page.', 'maxstore' ),
  	'section'     => 'woo_section',
  	'default'     => 4,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 2,
        'max'  => 5,
        'step' => 1
    ),
  ) );
    

  Kirki::add_field( 'maxstore_settings', array(
  	'type'        => 'background',
  	'settings'    => 'background_site',
  	'label'       => __( 'Background', 'maxstore' ),
   	'section'     => 'site_bg_section',
  	'default'     => array(
  		'color'    => '#fff',
  		'image'    => '',
  		'repeat'   => 'no-repeat',
  		'size'     => 'cover',
  		'attach'   => 'fixed',
  		'position' => 'center-top',
  		'opacity'  => 100,
  	),
  	'priority'    => 10,
  	'output'      => 'body',
  ) );
  $theme_links = array(
               'documentation' => array(
               'link' => esc_url('http://demo.themes4wp.com/documentation/category/maxstore/'),
               'text' => __('Documentation', 'maxstore'),
               'settings'    => 'theme-docs',
            ),
               'support' => array(
               'link' => esc_url('http://support.themes4wp.com/'),
               'text' => __('Support', 'maxstore'),
               'settings'    => 'theme-support',
            ),
               'demo' => array(
               'link' => esc_url('http://demo.themes4wp.com/maxstore/'),
               'text' => __('View Demo', 'maxstore'),
               'settings'    => 'theme-demo',
            ),
            'rating' => array(
               'link' => esc_url('https://wordpress.org/support/view/theme-reviews/maxstore?filter=5'),
               'text' => __('Rate This Theme', 'maxstore'),
               'settings'    => 'theme-rate',
            )
         );
         
    foreach ($theme_links as $theme_link) {
         Kirki::add_field( 'maxstore_settings', array(
            'type'        => 'custom',
            'settings'    => $theme_link['settings'],
            'section'     => 'links_section',
            'default'     => '<div style="padding: 10px; text-align: center; font-size: 22px; font-weight: bold;"><a target="_blank" href="' . $theme_link['link'] . '" >' . esc_attr($theme_link['text']) . ' </a></div>',
            'priority'    => 10,
          ) );    
    }  
  

function maxstore_configuration() {

  $config['logo_image']   = get_template_directory_uri() . '/img/site-logo.png';
  $config['color_back']   = '#192429';
  $config['color_accent'] = '#F4C700';
  $config['width']        = '25%';

  return $config;
}

add_filter( 'kirki/config', 'maxstore_configuration' );

function maxstore_configuration_i18n( $config ) {

    $strings = array(
        'background-color' => __( 'Background Color', 'maxstore' ),
        'background-image' => __( 'Background Image', 'maxstore' ),
        'no-repeat' => __( 'No Repeat', 'maxstore' ),
        'repeat-all' => __( 'Repeat All', 'maxstore' ),
        'repeat-x' => __( 'Repeat Horizontally', 'maxstore' ),
        'repeat-y' => __( 'Repeat Vertically', 'maxstore' ),
        'inherit' => __( 'Inherit', 'maxstore' ),
        'background-repeat' => __( 'Background Repeat', 'maxstore' ),
        'cover' => __( 'Cover', 'maxstore' ),
        'contain' => __( 'Contain', 'maxstore' ),
        'background-size' => __( 'Background Size', 'maxstore' ),
        'fixed' => __( 'Fixed', 'maxstore' ),
        'scroll' => __( 'Scroll', 'maxstore' ),
        'background-attachment' => __( 'Background Attachment', 'maxstore' ),
        'left-top' => __( 'Left Top', 'maxstore' ),
        'left-center' => __( 'Left Center', 'maxstore' ),
        'left-bottom' => __( 'Left Bottom', 'maxstore' ),
        'right-top' => __( 'Right Top', 'maxstore' ),
        'right-center' => __( 'Right Center', 'maxstore' ),
        'right-bottom' => __( 'Right Bottom', 'maxstore' ),
        'center-top' => __( 'Center Top', 'maxstore' ),
        'center-center' => __( 'Center Center', 'maxstore' ),
        'center-bottom' => __( 'Center Bottom', 'maxstore' ),
        'background-position' => __( 'Background Position', 'maxstore' ),
        'background-opacity' => __( 'Background Opacity', 'maxstore' ),
        'ON' => __( 'ON', 'maxstore' ),
        'OFF' => __( 'OFF', 'maxstore' ),
        'all' => __( 'All', 'maxstore' ),
        'cyrillic' => __( 'Cyrillic', 'maxstore' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'maxstore' ),
        'devanagari' => __( 'Devanagari', 'maxstore' ),
        'greek' => __( 'Greek', 'maxstore' ),
        'greek-ext' => __( 'Greek Extended', 'maxstore' ),
        'khmer' => __( 'Khmer', 'maxstore' ),
        'latin' => __( 'Latin', 'maxstore' ),
        'latin-ext' => __( 'Latin Extended', 'maxstore' ),
        'vietnamese' => __( 'Vietnamese', 'maxstore' ),
        'serif' => _x( 'Serif', 'font style', 'maxstore' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'maxstore' ),
        'monospace' => _x( 'Monospace', 'font style', 'maxstore' ),
    );

    $config['i18n'] = $strings;

    return $config;

}
add_filter( 'kirki/config', 'maxstore_configuration_i18n' );

/**
 * Add custom CSS styles
 */
function maxstore_enqueue_header_css() {

    $columns = get_theme_mod( 'archive_number_columns', 4 );

    if ($columns == '2') {
    $css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 48.05%}}';
    } elseif ($columns == '3') {
    $css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 30.75%;}}';
    } elseif ($columns == '5') {
    $css = '@media only screen and (min-width: 769px) {.archive .rsrc-content .woocommerce ul.products li.product{width: 16.95%;}}';
    } else {
    $css = '';
    }
    wp_add_inline_style( 'kirki-styles-maxstore_settings', $css );

}
add_action( 'wp_enqueue_scripts', 'maxstore_enqueue_header_css', 999 );
