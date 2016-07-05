<?php
function health_post_slug_customizer( $wp_customize ) {
class health_Customize_post_slug_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Post Slug Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

//Post type slug setting
$wp_customize->add_section(
        'post_slug_setting',
        array(
            'title' => __('Post Type Slug Setting','health-center-lite'),
            'description' => '',
			'priority'   => 700,
			)
    );
	
$wp_customize->add_setting( 'hc_lite_options[post_slug_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_post_slug_upgrade(
		$wp_customize,
		'hc_lite_options[post_slug_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'post_slug_setting',
				'settings'				=> 'hc_lite_options[post_slug_upgrade]',
			)
		)
	);	

//Slider Slug
	$wp_customize->add_setting(
    'hc_lite_options[hc_slider_slug]',
    array(
        'default' => __('health-center-litecenter_slider','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[hc_slider_slug]',array(
    'label'   => __('Slider Slug','health-center-lite'),
    'section' => 'post_slug_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),
	 )  );
	 
 //Service Slug
	$wp_customize->add_setting(
    'hc_lite_options[hc_service_slug]',
    array(
        'default' => __('health_service','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',));	
	$wp_customize->add_control('hc_lite_options[hc_service_slug]',array(
    'label'   => __('Service Slug','health-center-lite'),
    'section' => 'post_slug_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),
	 )  );

//Testimonial Slug
	$wp_customize->add_setting(
    'hc_lite_options[hc_testimonial_slug]',
    array(
        'default' => __('health_testimonial','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[hc_testimonial_slug]',array(
    'label'   => __('Testimonial Slug','health-center-lite'),
    'section' => 'post_slug_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),)  );

//Portfolio/Project Slug
$wp_customize->add_setting(
    'hc_lite_options[hc_portfolio_slug]',
    array(
        'default' => __('health_project','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[hc_portfolio_slug]',array(
    'label'   => __('Portfolio/Project Slug','health-center-lite'),
    'section' => 'post_slug_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),)  );	

//Portfolio/Project Slug
$wp_customize->add_setting(
    'hc_lite_options[hc_team_slug]',
    array(
        'default' => __('health_team','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[hc_team_slug]',array(
    'label'   => __('Our Team Slug','health-center-lite'),
    'section' => 'post_slug_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),)  );
	 }
	 add_action('customize_register','health_post_slug_customizer');