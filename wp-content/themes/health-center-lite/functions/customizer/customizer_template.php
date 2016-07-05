<?php
function health_template_customizer( $wp_customize ) {

class health_Customize_about_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add Team Section and About Us Template Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}	
	
class health_Customize_contact_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add Contact Page,Contact Details Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

class health_Customize_map_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want to add Google Map Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}
//Template panel 
	$wp_customize->add_panel( 'health-center-lite_template', array(
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template Settings', 'health-center-lite'),
	) );
	
	
// add section to manage About us tPage
	$wp_customize->add_section(
        'about_us_setting',
        array(
            'title' => __('About Page Setting','health-center-lite'),
			'panel'  => 'health-center-lite_template',
			'priority'   => 100,
			
			)
    );

$wp_customize->add_setting( 'hc_lite_options[about_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_about_upgrade(
		$wp_customize,
		'hc_lite_options[about_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'about_us_setting',
				'settings'				=> 'hc_lite_options[about_upgrade]',
			)
		)
	);	
	
// About us page Temm heading one
	$wp_customize->add_setting(
		'hc_lite_options[hc_head_one_team]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Meet Our','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_head_one_team]',
		array(
			'type' => 'text',
			'label' => __('About Us Page Team Heading One','health-center-lite'),
			'section' => 'about_us_setting',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
//About Us Page Team Heading Two
	$wp_customize->add_setting(
		'hc_lite_options[hc_head_two_team]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Great Team','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_head_two_team]',
		array(
			'type' => 'text',
			'label' => __('About Us Page Team Heading Two','health-center-lite'),
			'section' => 'about_us_setting',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
// About Us Page Team Tag line
	$wp_customize->add_setting(
		'hc_lite_options[hc_head_team_tagline]',
		array('capability'  => 'edit_theme_options',
		'default' => __('We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',		
		'type' => 'option',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_head_team_tagline]',
		array(
			'type' => 'text',
			'label' => __('About Us Page Team Tag line','health-center-lite'),
			'section' => 'about_us_setting',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	
//Add Team setting
	class WP_team_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click Here To Team Member', 'health-center-lite' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'team',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_team_Customize_Control( $wp_customize, 'team', array(	
		'section' => 'about_us_setting',
		'priority'   => 500,
    ))
);	
	

	
	// Conatct Google map
	$wp_customize->add_section(
        'contact_page_map',
        array(
            'title' => __('Google Maps','health-center-lite'),
			'panel'  => 'health-center-lite_template',
			'priority'   => 100,
			
			)
    );
	
	$wp_customize->add_setting( 'hc_lite_options[google_map_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_map_upgrade(
		$wp_customize,
		'hc_lite_options[google_map_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'contact_page_map',
				'settings'				=> 'hc_lite_options[google_map_upgrade]',
			)
		)
	);
	
	
	// Contact Office time:
	$wp_customize->add_setting(
		'hc_lite_options[contact_google_map_enabled]',
		array('capability'  => 'edit_theme_options',
		'default' => true, 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
		));

	$wp_customize->add_control(
		'hc_lite_options[contact_google_map_enabled]',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Google Map in contact page','health-center-lite'),
			'section' => 'contact_page_map',
		)
	);
	
	//Google map URL
	
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_google_map_url]',
		array('capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => __('https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538','health-center-lite'), 
		'type' => 'option',
		
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_google_map_url]',
		array(
			'type' => 'text',
			'label' => __('Google Map URL:','health-center-lite'),
			'section' => 'contact_page_map',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	 
	//Conatct Page
	$wp_customize->add_section(
        'contact_page',
        array(
            'title' => __('Contact Page Setting','health-center-lite'),
			'panel'  => 'health-center-lite_template',
			'priority'   => 100,
			
			)
    );
	
	$wp_customize->add_setting( 'hc_lite_options[contact_page_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_contact_upgrade(
		$wp_customize,
		'hc_lite_options[contact_page_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'contact_page',
				'settings'				=> 'hc_lite_options[contact_page_upgrade]',
			)
		)
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[hc_get_in_touch_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[hc_get_in_touch_enabled]',
    array(
        'label' => __('Enable Get in touch in contact page.','health-center-lite'),
        'section' => 'contact_page',
        'type' => 'checkbox',
    ));
	
	// Conatct send message heading
	$wp_customize->add_setting(
		'hc_lite_options[hc_send_usmessage]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Send Us a Message','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_send_usmessage]',
		array(
			'type' => 'text',
			'label' => __('Send Us a Message','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	// Conatct Get in Touch Text:
	$wp_customize->add_setting(
		'hc_lite_options[hc_get_in_touch]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Get in Touch','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_get_in_touch]',
		array(
			'type' => 'text',
			'label' => __('Get in Touch Text:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);	
	
	
	// Conatct address one
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_address]',
		array('capability'  => 'edit_theme_options',
		'default' => __('25, Lorem Lis Street','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_address]',
		array(
			'type' => 'text',
			'label' => __('Contact Address Line One:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	// Conatct address two
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_address_two]',
		array('capability'  => 'edit_theme_options',
		'default' => __('Dhanmandi California, US','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_address_two]',
		array(
			'type' => 'text',
			'label' => __('Contact Address Line Two:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	
	// Contact Phone Number:
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_phone_number]',
		array('capability'  => 'edit_theme_options',
		'default' => __('420-300-3850','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_phone_number]',
		array(
			'type' => 'text',
			'label' => __('Contact Phone Number:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	
	// Contact Fax Number:
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_fax_number]',
		array('capability'  => 'edit_theme_options',
		'default' => __('800 123 3456','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_fax_number]',
		array(
			'type' => 'text',
			'label' => __('Contact Fax Number:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	// Conatct Email
	$wp_customize->add_setting(
		'hc_lite_options[hc_contact_email]',
		array('capability'  => 'edit_theme_options',
		'default' => __('themes@webriti.com','health-center-lite'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'hc_lite_options[hc_contact_email]',
		array(
			'type' => 'text',
			'label' => __('Contact Email:','health-center-lite'),
			'section' => 'contact_page',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);
	
	}
	add_action( 'customize_register', 'health_template_customizer' );
	?>