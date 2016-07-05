<?php
// Footer copyright section 
	function health_copyright_customizer( $wp_customize ) {
	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => __('Footer Customizations','health-center-lite'),
            'priority' => 900,
        )
    );
	$wp_customize->add_setting(
    'hc_lite_options[footer_customizations]',
    array(
        'default' => __('@ 2014 health-center-lite Center. All Rights Reserved. Powered by','health-center-lite'),
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_lite_options[footer_customizations]',
    array(
        'label' => __('footer customizations text','health-center-lite'),
        'section' => 'copyright_section_one',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
		
    ));
	
//Created By text
$wp_customize->add_setting(
    'hc_lite_options[created_by_text]',
    array(
        'default' => __('Created by','health-center-lite'),
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_lite_options[created_by_text]',
    array(
        'label' => __('Created By text','health-center-lite'),
        'section' => 'copyright_section_one',
        'type' => 'text',
    ));

//Created By Webriti text
$wp_customize->add_setting(
    'hc_lite_options[created_by_webriti_text]',
    array(
        'default' => __('Webriti','health-center-lite'),
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_lite_options[created_by_webriti_text]',
    array(
        'label' => __('Created By text','health-center-lite'),
        'section' => 'copyright_section_one',
        'type' => 'text',
    ));	
	
//Created By Webriti text
$wp_customize->add_setting(
    'hc_lite_options[created_by_link]',
    array(
        'default' => __('http://www.webriti.com','health-center-lite'),
		'type' =>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_lite_options[created_by_link]',
    array(
        'label' => __('Created By Link','health-center-lite'),
        'section' => 'copyright_section_one',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    ));		
}
add_action( 'customize_register', 'health_copyright_customizer' );
?>