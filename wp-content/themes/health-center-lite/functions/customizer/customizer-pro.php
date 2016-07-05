<?php
//Pro Button

function health_pro_customizer( $wp_customize ) {
class WP_Pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-box">
       <a href="<?php echo esc_url( __('http://webriti.com/healthcentre/', 'health-center-lite'));?>" target="_blank" class="upgrade" id="review_pro"><?php _e( 'UPGRADE  TO PRO','health-center-lite' ); ?></a>
		
	</div>
    <?php
    }
}
$wp_customize->add_section( 'health_pro_section' , array(
		'title'      => __('UPGRADE  TO PRO VERSION', 'health-center-lite'),
		'priority'   => 1150,
   	) );

$wp_customize->add_setting(
    'upgrade_pro',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'label' => __('Discover Health center lite Pro','health-center-lite'),
        'section' => 'health_pro_section',
		'setting' => 'upgrade_pro',
    ))
);


class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo esc_url( __('https://wordpress.org/support/view/theme-reviews/health-center-lite#postform/', 'health-center-lite'));?>" target="_blank" class="review" id="review_pro"><?php _e( 'ADD YOUR REVIEW','health-center-lite' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'pro_Review',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'label' => __('Discover Health center lite Pro','health-center-lite'),
        'section' => 'health_pro_section',
		'setting' => 'pro_Review',
    ))
);

class WP_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
	 <a href="<?php echo esc_url( __('http://webriti.com/help/', 'health-center-lite'));?>" target="_blank" class="document" id="review_pro"><?php _e( 'DOCUMENTATION','health-center-lite' ); ?></a>
	 
	 <div>
	 <div class="pro-vesrion">
	 <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better. ','health-center-lite');?>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review',
    array(
        'default' => __('','health-center-lite'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_document_Customize_Control( $wp_customize, 'doc_Review', array(	
		'label' => __('Discover Health center lite Pro','health-center-lite'),
        'section' => 'health_pro_section',
		'setting' => 'doc_Review',
    ))
);

}
add_action( 'customize_register', 'health_pro_customizer' );
?>