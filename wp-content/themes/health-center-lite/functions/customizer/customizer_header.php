<?php
function health_header_customizer( $wp_customize ) {

class health_Customize_google_analytics_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Google Analytics Code Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}
/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 300,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'health-center-lite'),
	) );
	
	
	/* Front page option */
    $wp_customize->add_section( 'front_page_setting' , array(
      'title'       => __( 'Front Page Setting', 'health-center-lite' ),
      'priority'    => 50,
     'panel'  => 'header_options',
    ) );
    
    $wp_customize->add_setting('hc_lite_options[front_page]', array(
	  'default' => true,
      'sanitize_callback' => 'esc_url_raw',
	   'capability'     => 'edit_theme_options',
	   'type' => 'option',
	   'sanitize_callback' => 'sanitize_text_field',	   
    ) );
	
	$wp_customize->add_control(
    'hc_lite_options[front_page]',
    array(
       'type' => 'checkbox',
        'label' => __('Enable / Disable Front Page','health-center-lite'),
        'section' => 'front_page_setting',
    )
	);
    
   
	
	
	
	/* favicon option */
    $wp_customize->add_section( 'health-center-lite_favicon' , array(
      'title'       => __( 'Site favicon', 'health-center-lite' ),
      'priority'    => 300,
      'description' => __( 'Upload a favicon', 'health-center-lite' ),
	  'panel'  => 'header_options',
    ) );
    
    $wp_customize->add_setting('hc_lite_options[upload_image_favicon]', array(
      'sanitize_callback' => 'esc_url_raw',
	   'capability'     => 'edit_theme_options',
	   'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',	   
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hc_lite_options[upload_image_favicon]', array(
      'label'    => __( 'Choose your favicon (ideal width and height is 16x16 or 32x32)', 'health-center-lite' ),
      'section'  => 'health-center-lite_favicon',
    ) ) );
	
//Header logo setting
	$wp_customize->add_section( 'header_logo' , array(
		'title'      => __('Header Logo setting', 'health-center-lite'),
		'panel'  => 'header_options',
		'priority'   => 300,
   	) );
	$wp_customize->add_setting(
		'hc_lite_options[upload_image_logo]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
		
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'hc_lite_options[upload_image_logo]',
			   array(
				   'label'          => __( 'Upload a 150x150 for Logo Image', 'health-center-lite' ),
				   'section'        => 'header_logo',
				   'priority'   => 50,
			   )
		   )
	);
	
	//Enable/Disable logo text
	$wp_customize->add_setting(
    'hc_lite_options[hc_texttitle]',array(
	'default'    => true,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'hc_lite_options[hc_texttitle]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Text Logo','health-center-lite'),
        'section' => 'header_logo',
		'priority'   => 100,
    )
	);
	
	
	//Logo width
	
	$wp_customize->add_setting(
    'hc_lite_options[width]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 150,
	'type' => 'option',
	
	));

	$wp_customize->add_control(
    'hc_lite_options[width]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Width','health-center-lite'),
        'section' => 'header_logo',
		'priority'   => 400,
    )
	);
	
	//Logo Height
	$wp_customize->add_setting(
    'hc_lite_options[height]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 50,
	'type'=>'option',
	
	));

	$wp_customize->add_control(
    'hc_lite_options[height]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Height','health-center-lite'),
        'section' => 'header_logo',
		'priority'   =>410,
    )
	);
	
	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom css', 'health-center-lite'),
		'panel'  => 'header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
	'hc_lite_options[webrit_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'hc_lite_options[webrit_custom_css]', array(
        'label'   => __('Custom css snippet:', 'health-center-lite'),
        'section' => 'custom_css',
        'type' => 'textarea',
    )); 

	$wp_customize->add_section(
        'header_contact_setting',
        array(
            'title' => 'Hedaer Contact Detail Setting ',
           'priority'    => 400,
			'panel' => 'header_options',
        )
    );
	
	// Contact Email
	$wp_customize->add_setting(
    'hc_lite_options[hc_contact_email]',
    array(
        'default' => 'themes@webriti.com ',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[hc_contact_email]',
    array(
        'label' => __('Contact Email','health-center-lite'),
        'section' => 'header_contact_setting',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[hc_contact_phone_number]',
    array(
        'default' => '+420-300-3850',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[hc_contact_phone_number]',
    array(
        'label' => __('Contact Mobile Number','health-center-lite'),
        'section' => 'header_contact_setting',
        'type' => 'text',
    )
	);
	
	
	$wp_customize->add_section(
        'footer_google_analytics',
        array(
            'title' => 'Google Analytics Setting ',
           'priority'    => 500,
			'panel' => 'header_options',
        )
    );
	
	$wp_customize->add_setting( 'hc_lite_options[google_analytics_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_google_analytics_upgrade(
		$wp_customize,
		'hc_lite_options[google_analytics_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'footer_google_analytics',
				'settings'				=> 'hc_lite_options[google_analytics_upgrade]',
			)
		)
	);
	
	// Google Anlytics
	$wp_customize->add_setting(
    'hc_lite_options[google_analytics]',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[google_analytics]',
    array(
        'label' => __('Google Analytics','health-center-lite'),
        'section' => 'footer_google_analytics',
        'type' => 'text',
		'input_attrs' => array('disabled'=>'disabled')
    )
	);
	
	}
	add_action( 'customize_register', 'health_header_customizer' );
	?>