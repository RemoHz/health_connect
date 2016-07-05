<?php
function health_home_page_customizer( $wp_customize ) {

class health_Customize_slider_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add More Images or Slider Functionality Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

class health_Customize_faq_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add FAQ Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

class health_Customize_testimonial_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Teatimonial Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

class health_Customize_footer_callout_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Footer Callout Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}	

class health_Customize_blog_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add News/Blog Section Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}
	
/* Header Section */
	$wp_customize->add_panel( 'home_page_setting', array(
		'capability'     => 'edit_theme_options',
		'priority'   => 500,
		'title'      => __('Home Page Settings', 'health-center-lite'),
	) );

	
 
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Banner Image Settings','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );
	
	
	$wp_customize->add_setting( 'hc_lite_options[home_page_image]',array('default' => get_template_directory_uri().'/images/slide1.png',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',
	));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hc_lite_options[home_page_image]',
			array(
				'type'        => 'upload',
				'label' => 'Image Upload',
				'section' => 'example_section_one',
				'settings' =>'hc_lite_options[home_page_image]',
				'section' => 'slider_section_settings',
				
			)
		)
	);
	
	$wp_customize->add_setting( 'hc_lite_options[slider_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_slider_upgrade(
		$wp_customize,
		'hc_lite_options[slider_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'slider_section_settings',
				'settings'				=> 'hc_lite_options[slider_upgrade]',
			)
		)
	);
	
	$wp_customize->add_setting(
    'hc_pro_options[home_slider_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_pro_options[home_slider_enabled]',
    array(
        'label' => __('Enable Home Slider','health-center-lite'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
		'priority'   => 100,
		'description' => __('Enable slider on front page.','health-center-lite'),
    ));
	//Slider animation
	
	$wp_customize->add_setting(
    'hc_pro_options[animation]',
    array(
        'default' => __('slide','health-center-lite'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'hc_pro_options[animation]',
    array(
        'type' => 'select',
        'label' => __('Select slider Animation','health-center-lite'),
        'section' => 'slider_section_settings',
		'priority'   => 200,
		 'choices' => array('slide'=>__('slide', 'health-center-lite'), 'fade'=>__('fade', 'health-center-lite')),
		));
		
		
	 //Slider animation
	
	$wp_customize->add_setting(
    'hc_pro_options[slide_direction]',
    array(
        'default' => __('slide','health-center-lite'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'hc_pro_options[slide_direction]',
    array(
        'type' => 'select',
        'label' => __('Slide direction','health-center-lite'),
        'section' => 'slider_section_settings',
		'priority'   => 250,
		 'choices' => array('horizontal'=>__('horizontal', 'health-center-lite'), 'vertical'=>__('vertical', 'health-center-lite')),
		));	
		
	$wp_customize->add_setting(
    'hc_pro_options[animationSpeed]',
    array(
        'default' => __('1500','health-center-lite'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'hc_pro_options[animationSpeed]',
    array(
        'type' => 'select',
        'label' => __('Animation speed','health-center-lite'),
        'section' => 'slider_section_settings',
		'priority'   => 300,
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000' => '2.0','2500' => '2.5' ,'3000' =>'3.0' , '3500' => '3.5', '4000' => '4.0','4500' => '4.5' ,'5000' => '5.0' , '5500' => '5.5' )));	
		 
	// Slide show speed
	$wp_customize->add_setting(
    'hc_pro_options[slideshowSpeed]',
    array(
        'default' => __('2500','health-center-lite'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'hc_pro_options[slideshowSpeed]',
    array(
        'type' => 'select',
        'label' => __('Slideshow speed','health-center-lite'),
        'section' => 'slider_section_settings',
		'priority'   => 300,
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000' => '2.0','2500' => '2.5' ,'3000' =>'3.0' , '3500' => '3.5', '4000' => '4.0','4500' => '4.5' ,'5000' => '5.0' , '5500' => '5.5' )));	
	
	//Add Slider setting
	class WP_slider_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button" ><?php _e( 'Click Here To Add Slider', 'health-center-lite' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'slider',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_slider_Customize_Control( $wp_customize, 'slider', array(	
		'section' => 'slider_section_settings',
		'priority'   => 500,
    ))
);


//Service
$wp_customize->add_section( 'service_section_head' , array(
		'title'      => __('Service Setting ', 'health-center-lite'),
		'panel'  => 'home_page_setting',
   	) );

//Sarvice title
	$wp_customize->add_setting(
    'hc_lite_options[service_title]',
    array(
        'default' => __('Awesome Services','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_title]',
    array(
        'label' => __('Service Title','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[service_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_description]',
    array(
        'label' => __('Service Description','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);
	
	$wp_customize->add_setting(
		'hc_lite_options[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-wheelchair',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[service_one_icon]', array(
        'label'   => __('Service Icon One', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	

	$wp_customize->add_setting(
		'hc_lite_options[home_service_one_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_service_one_link]', array(
        'label'   => __('Home service one page and icon Link', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_service_one_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_service_one_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'service_section_head',
		)
	); 
	
	
	$wp_customize->add_setting(
    'hc_lite_options[service_one_title]',
    array(
        'default' => __('Medical Guidance','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_one_title]',
    array(
        'label' => __('Service One Title','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[service_one_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_one_description]',
    array(
        'label' => __('Service One Description','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);
	
//Service Two
	$wp_customize->add_setting(
		'hc_lite_options[service_two_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-medkit',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[service_two_icon]', array(
        'label'   => __('Service Icon Two', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	

	$wp_customize->add_setting(
		'hc_lite_options[home_service_two_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_service_two_link]', array(
        'label'   => __('Enter the Home Service Two icon and title link.', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_service_two_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_service_two_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'service_section_head',
		)
	); 
	
	
	$wp_customize->add_setting(
    'hc_lite_options[service_two_title]',
    array(
        'default' => __('Emergency Help','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_two_title]',
    array(
        'label' => __('Service Two Title','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[service_two_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_two_description]',
    array(
        'label' => __('Service Two Description','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

//Service three
$wp_customize->add_setting(
		'hc_lite_options[service_third_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-ambulance',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[service_third_icon]', array(
        'label'   => __('Service Icon Three', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	

	$wp_customize->add_setting(
		'hc_lite_options[home_service_third_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_service_third_link]', array(
        'label'   => __('Enter the Home Service Three icon and title link.', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_service_third_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_service_third_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'service_section_head',
		)
	); 
	
	
	$wp_customize->add_setting(
    'hc_lite_options[service_third_title]',
    array(
        'default' => __('Cardio Monitoring','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_third_title]',
    array(
        'label' => __('Service Three Title','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[service_third_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_third_description]',
    array(
        'label' => __('Service Three Description','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
//Service Four
$wp_customize->add_setting(
		'hc_lite_options[service_four_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-user-md',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[service_four_icon]', array(
        'label'   => __('Service Icon Four', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	

	$wp_customize->add_setting(
		'hc_lite_options[home_service_fourth_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_service_fourth_link]', array(
        'label'   => __('Enter the Home Service Four icon and title link.', 'health-center-lite'),
		'section' => 'service_section_head',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_service_fourth_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_service_fourth_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'service_section_head',
		)
	); 
	
	
	$wp_customize->add_setting(
    'hc_lite_options[service_four_title]',
    array(
        'default' => __('Medical Treatments','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_four_title]',
    array(
        'label' => __('Service Four Title','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'hc_lite_options[service_four_description]',
    array(
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[service_four_description]',
    array(
        'label' => __('Service Four Description','health-center-lite'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
		
	
class WP_service_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add more services, then upgrade to pro version','health-center-lite');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('webriti.com/healthcentre/', 'health-center-lite'));?>" target="_blank" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','health-center-lite' ); ?></a>
	 <div>
    <?php
    }
}

$wp_customize->add_setting(
    'service_pro',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'service_pro', array(	
		'label' => __('Discover Health center lite Pro','health-center-lite'),
        'section' => 'service_section_head',
		'setting' => 'service_pro',
    ))
);
		


//Portfolio setting
$wp_customize->add_section(
        'project_section_settings',
        array(
            'title' => __('Project Setting','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );

//Show and hide Project section
	$wp_customize->add_setting(
	'hc_lite_options[home_projects_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[home_projects_enabled]',
    array(
        'label' => __('Enable Home Project Section','health-center-lite'),
        'section' => 'project_section_settings',
        'type' => 'checkbox',
    )
	);
	

$wp_customize->add_setting(
    'hc_lite_options[project_heading_one]',
    array(
        'default' => __('Featured Portfolio Projects','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[project_heading_one]',array(
    'label'   => __('Project Section Heading','health-center-lite'),
    'section' => 'project_section_settings',
	 'type' => 'text',)  );	
	 
	//Project Description 
	 $wp_customize->add_setting(
    'hc_lite_options[project_tagline]',
    array(
        'default' => __('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'hc_lite_options[project_tagline]',array(
    'label'   => __('Project Section Tagline','health-center-lite'),
    'section' => 'project_section_settings',
	 'type' => 'text',)  );
	 
	 
	 //Project one image
	$wp_customize->add_setting( 'hc_lite_options[project_one_thumb]',array('default' => get_template_directory_uri().'/images/project_thumb1.png',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hc_lite_options[project_one_thumb]',
			array(
				'label' => 'Project One Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'hc_lite_options[project_one_thumb]',
				'section' => 'project_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	
	$wp_customize->add_setting(
	'hc_lite_options[project_one_title]', array(
        'default'        => __('Lorem Ipsum','health-center-lite'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_one_title]', array(
        'label'   => __('Project One Title', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'text',
    ));
	
	 //Project one Description
	$wp_customize->add_setting(
	'hc_lite_options[project_one_text]', array(
        'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_one_text]', array(
        'label'   => __('Project One Description', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'textarea',
    ));
	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_one_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_image_one_link]', array(
        'label'   => __('Home project one page image Link.', 'health-center-lite'),
		'section' => 'project_section_settings',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_one_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_image_one_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'project_section_settings',
		)
	); 
	
	//Project two
	//Project two image
	$wp_customize->add_setting( 'hc_lite_options[project_two_thumb]',array('default' => get_template_directory_uri().'/images/project_thumb2.png',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hc_lite_options[project_two_thumb]',
			array(
				'label' => 'Project Two Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'hc_lite_options[project_two_thumb]',
				'section' => 'project_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	$wp_customize->add_setting(
	'hc_lite_options[project_two_title]', array(
        'default'        => __('Postao je popularan','health-center-lite'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_two_title]', array(
        'label'   => __('Project Two Title', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'text',
    ));
	
	 
	 //Project Two Description
	$wp_customize->add_setting(
	'hc_lite_options[project_two_text]', array(
        'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_two_text]', array(
        'label'   => __('Project Two Description', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'textarea',
    ));
	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_two_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_image_two_link]', array(
        'label'   => __('Home project two page image Link.', 'health-center-lite'),
		'section' => 'project_section_settings',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_two_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_image_two_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'project_section_settings',
		)
	); 
	
	
	//Project three
	//Project three image
	$wp_customize->add_setting( 'hc_lite_options[project_three_thumb]',array('default' => get_template_directory_uri().'/images/project_thumb3.png',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hc_lite_options[project_three_thumb]',
			array(
				'label' => 'Project Three Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'hc_lite_options[project_three_thumb]',
				'section' => 'project_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	$wp_customize->add_setting(
	'hc_lite_options[project_three_title]', array(
        'default'        => __('kojekakve promjene s','health-center-lite'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_three_title]', array(
        'label'   => __('Project Three Title', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'text',
    ));
	
	 //Project one Description
	$wp_customize->add_setting(
	'hc_lite_options[project_three_text]', array(
        'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_three_text]', array(
        'label'   => __('Project Three Description', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'textarea',
    ));
	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_three_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_image_three_link]', array(
        'label'   => __('Home project three page image Link.', 'health-center-lite'),
		'section' => 'project_section_settings',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_three_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_image_three_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'project_section_settings',
		)
	); 
	
	//Project four
	//Project four image
	$wp_customize->add_setting( 'hc_lite_options[project_four_thumb]',array('default' => get_template_directory_uri().'/images/project_thumb4.png',
	'type' => 'option','sanitize_callback' => 'esc_url_raw',));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hc_lite_options[project_four_thumb]',
			array(
				'label' => 'Project Four Thumbnail',
				'section' => 'example_section_one',
				'settings' =>'hc_lite_options[project_four_thumb]',
				'section' => 'project_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	$wp_customize->add_setting(
	'hc_lite_options[project_four_title]', array(
        'default'        => __('kojekakve promjene s','health-center-lite'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_four_title]', array(
        'label'   => __('Project Four Title', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'text',
    ));
	
	
	
	 //Project one Description
	$wp_customize->add_setting(
	'hc_lite_options[project_four_text]', array(
        'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('hc_lite_options[project_four_text]', array(
        'label'   => __('Project Four Description', 'health-center-lite'),
        'section' => 'project_section_settings',
		'type' => 'textarea',
    ));
	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_four_link]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'hc_lite_options[home_image_four_link]', array(
        'label'   => __('Home project four page image Link.', 'health-center-lite'),
		'section' => 'project_section_settings',
        'type'    => 'text',
    ));	
	
	$wp_customize->add_setting(
		'hc_lite_options[home_image_four_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default'        => true,
		));

	$wp_customize->add_control(
		'hc_lite_options[home_image_four_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'project_section_settings',
		)
	); 
	
	class WP_project_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Want to add more projects and categorization than upgrade to pro','health-center-lite');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/healthcentre/', 'health-center-lite'));?>" target="_blank" class="service" id="review_pro"><?php _e( 'UPGRADE TO PRO','health-center-lite' ); ?></a>
	 <div>
    <?php
    }
}
	

$wp_customize->add_setting(
    'project',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_project_Customize_Control( $wp_customize, 'project', array(	
		'section' => 'project_section_settings',
    ))
);	

//Recent News setting
$wp_customize->add_section(
        'recent_news_settings',
        array(
            'title' => __('Recent News Setting','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );
	
$wp_customize->add_setting( 'hc_lite_options[blog_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_blog_upgrade(
		$wp_customize,
		'hc_lite_options[blog_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'recent_news_settings',
				'settings'				=> 'hc_lite_options[blog_upgrade]',
			)
		)
	);	
	
// //Project Title
	$wp_customize->add_setting(
    'hc_lite_options[hc_head_news]',
    array(
        'default' => __('Recent News','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[hc_head_news]',array(
    'label'   => __('Recent News Section Heading','health-center-lite'),
    'section' => 'recent_news_settings',
	 'type' => 'text',
	'input_attrs' => array('disabled'=>'disabled'),
	 )  );	

//FAQ setting
$wp_customize->add_section(
        'faq_setting',
        array(
            'title' => __('FAQ Setting','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );
	
$wp_customize->add_setting( 'hc_lite_options[faq_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_faq_upgrade(
		$wp_customize,
		'hc_lite_options[faq_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'faq_setting',
				'settings'				=> 'hc_lite_options[faq_upgrade]',
			)
		)
	);	
	
	//Faq Title
	$wp_customize->add_setting(
    'hc_pro_options[hc_head_faq]',
    array(
        'default' => __('Why Choose Us?','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_pro_options[hc_head_faq]',array(
    'label'   => __('FAQ Heading','health-center-lite'),
    'section' => 'faq_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled')
	 )  );	


//FAQ setting
	class WP_faq_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click Here To Add FAQ', 'health-center-lite' ); ?></a>
    <?php
    }
}

//Testimonial setting




$wp_customize->add_section(
        'testimonial_setting',
        array(
            'title' => __('Testimonial Setting','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );
	
$wp_customize->add_setting( 'hc_lite_options[testimonial_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_testimonial_upgrade(
		$wp_customize,
		'hc_lite_options[testimonial_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'testimonial_setting',
				'settings'				=> 'hc_lite_options[testimonial_upgrade]',
			)
		)
	);	

//Testimonial Title
	$wp_customize->add_setting(
    'hc_pro_options[hc_head_testimonial]',
    array(
        'default' => __('Testmonials','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_pro_options[hc_head_testimonial]',array(
    'label'   => __('Testmonial Heading','health-center-lite'),
    'section' => 'testimonial_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled'),)  );

//link
	class WP_testimonial_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="#" class="button"><?php _e( 'Click Here To add Testimonial', 'health-center-lite' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'testimonial',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_testimonial_Customize_Control( $wp_customize, 'testimonial', array(	
		'section' => 'testimonial_setting',
    ))
);

//Footer call-out setting
$wp_customize->add_section(
        'footer_callout_setting',
        array(
            'title' => __('Footer Call Out Area Setting','health-center-lite'),
            'description' => '',
			'panel'  => 'home_page_setting',)
    );
	
$wp_customize->add_setting( 'hc_lite_options[footer_callout_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_footer_callout_upgrade(
		$wp_customize,
		'hc_lite_options[footer_callout_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'footer_callout_setting',
				'settings'				=> 'hc_lite_options[footer_callout_upgrade]',
			)
		)
	);	

//Footer callout text
	$wp_customize->add_setting(
    'hc_lite_options[call_out_text]',
    array(
        'default' => __('We Care has a wide range of health care options, from health treatments to surgery procedures...!','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('hc_lite_options[call_out_text]',array(
    'label'   => __('Call Out Text','health-center-lite'),
    'section' => 'footer_callout_setting',
	 'type' => 'text',
	 'input_attrs' => array('disabled'=>'disabled')
	 )  );
	 
	 
	 $wp_customize ->add_setting (
	'hc_pro_options[call_out_button_text]',
	array( 
	'default' => __('Purshase Now!','health-center-lite'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'hc_pro_options[call_out_button_text]',
	array (  
	'label' => __('Call Out Button Text','health-center-lite'),
	'section' => 'footer_callout_setting',
	'type' => 'text',
	'input_attrs' => array('disabled'=>'disabled')
	) );
	
	
	$wp_customize ->add_setting (
	'hc_pro_options[call_out_button_link]',
	array( 
	'default' => __('#','health-center-lite'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'hc_pro_options[call_out_button_link]',
	array (  
	'label' => __('Call Out Button Link','health-center-lite'),
	'section' => 'footer_callout_setting',
	'type' => 'text',
	'input_attrs' => array('disabled'=>'disabled')
	) );

	$wp_customize->add_setting(
		'hc_pro_options[call_out_button_link_target]',
		array('capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'hc_pro_options[call_out_button_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link new tab/window','health-center-lite'),
			'section' => 'footer_callout_setting',
			'input_attrs' => array('disabled'=>'disabled')
		)
	);

	
	}
	add_action( 'customize_register', 'health_home_page_customizer' );
	?>