<?php
function health_theme_color_customizer( $wp_customize ) {

class health_Customize_theme_color_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Predefined Background Color and Create Your Own Skin Color Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Predefined Background Color Skins</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked="checked"'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-patterns/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  }
       }

}
class WP_back_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Predefined Default Background</h3>';
		  $name = '_customize-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				
				<img <?php if($this->value() == $key){ echo 'class="background_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-patterns/<?php echo esc_attr( $key ); ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
            <?php
		  }
       }

}
/* Header Section */
	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Theme Color Schemes Settings ', 'health-center-lite'),
		'priority'   => 200,
   	) );
	
	$wp_customize->add_setting( 'hc_lite_options[theme_color_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_theme_color_upgrade(
		$wp_customize,
		'hc_lite_options[theme_color_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'header_image',
				'settings'				=> 'hc_lite_options[theme_color_upgrade]',
			)
		)
	);	
	
	$wp_customize->add_setting(
	'hc_lite_options[hc_stylesheet]', array(
        'default'        => 'default.css',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'hc_lite_options[hc_stylesheet]',
	array(
        'label'   => __('Predefined Colors', 'health-center-lite'),
        'section' => 'header_image',
		'type' => 'radio',
		'choices' => array(
			'default.css' => 'default.png',
            'red.css' => 'red.png',
            'green.css' => 'green.png',
			'pink.css'=>'pink.png',
			'blue.css' => 'blue.png',
			'orange.css'=>'orange.png',
			'cofy.css' => 'cofy.png',
			'golden.css' => 'golden.png'
    )
	
	)));
	
	
	$wp_customize->add_setting(
    'hc_lite_options[link_color_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'hc_lite_options[link_color_enable]',
    array(
        'label' => __('Skin Color Enable','health-center-lite'),
        'section' => 'header_image',
        'type' => 'checkbox',
    )
	);
	
	
	$wp_customize->add_setting(
	'hc_lite_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#31A3DD',
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'hc_lite_options[link_color]', 
	array(
		'label'      => __( 'Skin Color', 'health-center-lite' ),
		'section'    => 'header_image',
		'settings'   => 'hc_lite_options[link_color]',
	) ) );
	
	$wp_customize->add_setting(
	'hc_lite_options[hc_back_image]', array(
	'default' => 'bg_img1.png',  
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_back_Customize_Control($wp_customize,'hc_lite_options[hc_back_image]',
	array(
        'label'   => __('Predefined Default Background', 'health-center-lite'),
        'section' => 'header_image',
		'priority'   => 160,
		'type' => 'radio',
		'choices' => array(
			'bg_img1.png' => 'Pattern 0',
            'bg_img2.png' => 'Pattern 1',
            'bg_img3.png' => 'Pattern 2',
            'bg_img4.png' => 'Pattern 3',
			'bg_img5.png' => 'Pattern 4',
			'bg_img6.png' => 'Pattern 5',
			'bg_img7.png' => 'Pattern 6',
			'bg_img8.png' => 'Pattern 7',
    )
	
	)));	
	}
	add_action( 'customize_register', 'health_theme_color_customizer' );
	?>