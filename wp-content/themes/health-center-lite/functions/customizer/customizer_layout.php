<?php
//Pro Button
function health_layout_customizer( $wp_customize ) {

class health_Customize_layout_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Add Layout Manager Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}

class WP_layout_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
		
	$hc_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'hc_pro_options', array() ), $hc_pro_options );
	$data_enable = explode(",",$current_options['front_page_data']);
	$defaultenableddata=array('Service','Project','News','Testimonials','CallOut');
	$layout_disable=array_diff($defaultenableddata,$data_enable);

    ?>
 <h3><?php _e('Enable','health-center-lite'); ?></h3>
  <ul class="sortable customizer_layout" id="enable">
  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
  <?php } } ?>
  </ul>
  
  
 <h3>Disable</h3> 
 <ul class="sortable customizer_layout" id="disable">
 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
  <?php } } ?>
 </ul>
 <div class="section">
		<p> <b><?php _e('Slider section always top on the home page','health-center-lite'); ?></b></p>
		<p> <b><?php _e('Note:','health-center-lite'); ?> </b> <?php _e('By default all the section are enable on homepage. If you do not want to display any section just drag that section to the disabled box.','health-center-lite'); ?><p>
		</div>
<?php
    }
}
$wp_customize->add_section( 'health_layout_section' , array(
		'title'      => __('Theme Layout Manager', 'health-center-lite'),
		'priority'       => 1000,
   	) );
	
$wp_customize->add_setting( 'hc_lite_options[layout_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_layout_upgrade(
		$wp_customize,
		'hc_lite_options[layout_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'health_layout_section',
				'settings'				=> 'hc_lite_options[layout_upgrade]',
			)
		)
	);	

$wp_customize->add_setting(
    'hc_pro_options[layout_manager]',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		
    )	
);
$wp_customize->add_control( new WP_layout_Customize_Control( $wp_customize, 'hc_pro_options[layout_manager]', array(
		'label' => __('Discover health Pro','health-center-lite'),
        'section' => 'health_layout_section',
		'setting' => 'hc_pro_options[layout_manager]',
    ))
);

$wp_customize->add_setting(
    'hc_pro_options[front_page_data]',
    array(
        'default' =>'Service,Project,News,Testimonials,CallOut',
		'type'=>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_pro_options[front_page_data]',
    array(
        'label' => __('Enable','health-center-lite'),
        'section' => 'health_layout_section',
        'type' => 'text',
		));
		
	
$wp_customize->add_setting(
    'hc_pro_options[layout_textbox_disable]',
    array(
        'default' => __('','health-center-lite'),
		'type'=>'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	
);
$wp_customize->add_control(
    'hc_pro_options[layout_textbox_disable]',
    array(
        'label' => __('Disable','health-center-lite'),
        'section' => 'health_layout_section',
        'type' => 'text',
		));
}
add_action( 'customize_register', 'health_layout_customizer' );
?>