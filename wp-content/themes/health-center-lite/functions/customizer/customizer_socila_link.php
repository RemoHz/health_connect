<?php
function health_social_link_customizer( $wp_customize ) {

class health_Customize_social_link_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Soical Media Links Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

//Header social Icon

	$wp_customize->add_section(
        'header_social_icon',
        array(
            'title' => 'Social Link Settings ',
           'priority'    => 500,
        )
    );
	

$wp_customize->add_setting( 'hc_lite_options[social_links_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_social_link_upgrade(
		$wp_customize,
		'hc_lite_options[social_links_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'header_social_icon',
				'settings'				=> 'hc_lite_options[social_links_upgrade]',
			)
		)
	);	

//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'hc_lite_options[header_social_media_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[header_social_media_enabled]',
    array(
        'label' => __('Enable social media on Header','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

//Show and hide Footer Social Icons
	$wp_customize->add_setting(
	'hc_lite_options[footer_social_media_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[footer_social_media_enabled]',
    array(
        'label' => __('Enable Social media in footer section.','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);	
	//Show and hide Contact Page Social Icons
	$wp_customize->add_setting(
	'hc_lite_options[social_media_in_contact_page_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[social_media_in_contact_page_enabled]',
    array(
        'label' => __('Enable social media in contact page','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);	

	// Facebook link
	$wp_customize->add_setting(
    'hc_lite_options[social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[social_media_facebook_link]',
    array(
        'label' => __('Facebook Links:','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'text',
		 'input_attrs' => array('disabled'=>'disabled'),
    )
	);

	//twitter link
	
	$wp_customize->add_setting(
    'hc_lite_options[social_media_twitter_link]',
    array(
        'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[social_media_twitter_link]',
    array(
        'label' => __('Twitter Link:','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'text',
		'input_attrs' => array('disabled'=>'disabled'),
    )
	);

	
	//Linkdin link
	
	$wp_customize->add_setting(
	'hc_lite_options[social_media_linkedin_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[social_media_linkedin_link]',
    array(
        'label' => __('Linkedin Links:','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'text',
		'input_attrs' => array('disabled'=>'disabled'),
    )
	);
	
	//Google plus
	
	$wp_customize->add_setting(
	'hc_lite_options[social_media_google_plus]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'hc_lite_options[social_media_google_plus]',
    array(
        'label' => __('Google Plus Links:','health-center-lite'),
        'section' => 'header_social_icon',
        'type' => 'text',
		'input_attrs' => array('disabled'=>'disabled'),
    )
	);
	}
	add_action( 'customize_register', 'health_social_link_customizer' );