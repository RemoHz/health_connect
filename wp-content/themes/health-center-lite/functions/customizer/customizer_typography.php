<?php 

function health_typography_customizer( $wp_customize ) {

class health_Customize_typography_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        <h3><?php _e('Want To Use Fonts Typography Then','health-center-lite'); ?><a href="<?php echo esc_url( 'http://webriti.com/healthcentre/' ); ?>" target="_blank"><?php _e(' Upgrade To Pro','health-center-lite'); ?> </a>  
		<?php
		}
	}
	
$wp_customize->add_panel( 'health-center-lite_typography_setting', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography Settings', 'health-center-lite'),
	) );

// Enble / Disable typography section
$wp_customize->add_section( 'health-center-lite_typography_section' , array(
		'title'      => __('Typhography Enable / Disable', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 0,
   	) );
	
$wp_customize->add_setting( 'hc_lite_options[typography_upgrade]', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new health_Customize_typography_upgrade(
		$wp_customize,
		'hc_lite_options[typography_upgrade]',
			array(
				'label'					=> __('Health Center Lite Upgrade','health-center-lite'),
				'section'				=> 'health-center-lite_typography_section',
				'settings'				=> 'hc_lite_options[typography_upgrade]',
			)
		)
	);	
$wp_customize->add_setting(
    'hc_lite_options[enable_custom_typography]',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[enable_custom_typography]', array(
		'label' => __('Enable Custom Typography','health-center-lite'),
        'section' => 'health-center-lite_typography_section',
		'setting' => 'hc_lite_options[enable_custom_typography]',
		'type'    =>  'checkbox'
    ));	
	
$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$font_family = array('RobotoRegular'=>'RobotoRegular','RobotoLight'=>'RobotoLight','RobotoBold'=>'RobotoBold','Raleway-Medium'=>'Raleway-Medium','Arial, sans-serif'=>'Arial','Georgia, serif'=>'Georgia','Times New Roman, serif'=>'Times New Roman','Tahoma, Geneva, Verdana, sans-serif'=>'Tahoma','Palatino, Palatino Linotype, serif'=>'Palatino','Helvetica Neue, Helvetica, sans-serif'=>'Helvetica*','Calibri, Candara, Segoe, Optima, sans-serif'=>'Calibri*','Myriad Pro, Myriad, sans-serif'=>'Myriad Pro*','Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif'=>'Lucida','Arial Black, sans-serif'=>'Arial Black','Gill Sans, Gill Sans MT, Calibri, sans-serif'=>'Gill Sans*','Geneva, Tahoma, Verdana, sans-serif'=>'Geneva*','Impact, Charcoal, sans-serif'=>'Impact','Courier, Courier New, monospace'=>'Courier','Abel'=>'Abel','Abril Fatface'=>'Abril Fatface','Aclonica'=>'Aclonica','Actor'=>'Actor','Adamina'=>'Adamina','Aldrich'=>'Aldrich','Alice'=>'Alice','Alike'=>'Alike','Alike Angular'=>'Alike Angular','Allan'=>'Allan','Allerta'=>'Allerta','Allerta Stencil'=>'Allerta Stencil','Amaranth'=>'Amaranth','Amatic SC'=>'Amatic SC','Andada'=>'Andada','Andika'=>'Andika','Annie Use Your Telescope'=>'Annie Use Your Telescope','Anonymous Pro'=>'Anonymous Pro','Antic'=>'Antic','Anton'=>'Anton','Architects Daughter'=>'Architects Daughter','Arimo'=>'Arimo','Artifika'=>'Artifika','Arvo'=>'Arvo','Asset'=>'Asset','Astloch'=>'Astloch','Atomic Age'=>'Atomic Age','Aubrey'=>'Aubrey','Bangers'=>'Bangers','Bentham'=>'Bentham','Bevan'=>'Bevan','Bigshot One'=>'Bigshot One','Black Ops One'=>'Black Ops One','Bowlby One'=>'Bowlby One','Bowlby One SC'=>'Bowlby One SC','Brawler'=>'Brawler','Butcherman Caps'=>'Butcherman Caps','Cabin'=>'Cabin','Cabin Sketch'=>'Cabin Sketch','Cabin Sketch'=>'Cabin Sketch','Calligraffitti'=>'Calligraffitti','Candal'=>'Candal','Cantarell'=>'Cantarell','Cardo'=>'Cardo','Carme'=>'Carme','Carter One'=>'Carter One','Caudex'=>'Caudex','Cedarville Cursive'=>'Cedarville Cursive','Changa One'=>'Changa One','Cherry Cream Soda'=>'Cherry Cream Soda','Chewy'=>'Chewy','Chivo'=>'Chivo','Coda'=>'Coda','Comfortaa'=>'Comfortaa','Coming Soon'=>'Coming Soon','Contrail One'=>'Contrail One','Copse'=>'Copse','Corben'=>'Corben','Corben'=>'Corben','Cousine'=>'Cousine','Coustard'=>'Coustard','Covered By Your Grace'=>'Covered By Your Grace','Crafty Girls'=>'Crafty Girls','Creepster Caps'=>'Creepster Caps','Crimson Text'=>'Crimson Text','Crushed'=>'Crushed','Cuprum'=>'Cuprum','Damion'=>'Damion','Dancing Script'=>'Dancing Script','Dawning of a New Day'=>'Dawning of a New Day','Days One'=>'Days One','Delius'=>'Delius','Delius Swash Caps'=>'Delius Swash Caps','Delius Unicase'=>'Delius Unicase','Didact Gothic'=>'Didact Gothic','Dorsa'=>'Dorsa','Droid Sans'=>'Droid Sans','Droid Sans Mono'=>'Droid Sans Mono','Droid Serif'=>'Droid Serif','EB Garamond'=>'EB Garamond','Eater Caps'=>'Eater Caps','Expletus Sans'=>'Expletus Sans','Fanwood Text'=>'Fanwood Text','Federant'=>'Federant','Federo'=>'Federo','Fontdiner Swanky'=>'Fontdiner Swanky','Forum'=>'Forum','Francois One'=>'Francois One','Gentium Book Basic'=>'Gentium Book Basic','Geo'=>'Geo','Geostar'=>'Geostar','Geostar Fill'=>'Geostar Fill','Give You Glory'=>'Give You Glory','Gloria Hallelujah'=>'Gloria Hallelujah','Goblin One'=>'Goblin One','Gochi Hand'=>'Gochi Hand','Goudy Bookletter 1911'=>'Goudy Bookletter 1911','Gravitas One'=>'Gravitas One','Gruppo'=>'Gruppo','Hammersmith One'=>'Hammersmith One','Holtwood One SC'=>'Holtwood One SC','Homemade Apple'=>'Homemade Apple','IM Fell DW Pica'=>'IM Fell DW Pica','IM Fell English'=>'IM Fell English','IM Fell English SC'=>'IM Fell English SC','Inconsolata'=>'Inconsolata','Indie Flower'=>'Indie Flower','Irish Grover'=>'Irish Grover','Irish Growler'=>'Irish Growler','Istok Web'=>'Istok Web','Jockey One'=>'Jockey One','Josefin Sans'=>'Josefin Sans','Josefin Slab'=>'Josefin Slab','Judson'=>'Judson','Julee'=>'Julee','Jura'=>'Jura','Just Another Hand'=>'Just Another Hand','Just Me Again Down Here'=>'Just Me Again Down Here','Kameron'=>'Kameron','Kelly Slab'=>'Kelly Slab','Kenia'=>'Kenia','Kranky'=>'Kranky','Kreon'=>'Kreon','Kristi'=>'Kristi','La Belle Aurore'=>'La Belle Aurore','Lato'=>'Lato','League Script'=>'League Script','Leckerli One'=>'Leckerli One','Lekton'=>'Lekton','Limelight'=>'Limelight','Linden Hill'=>'Linden Hill','Lobster'=>'Lobster','Lobster Two'=>'Lobster Two','Lora'=>'Lora','Love Ya Like A Sister'=>'Love Ya Like A Sister','Loved by the King'=>'Loved by the King','Luckiest Guy'=>'LuckiestGuy','Maiden Orange'=>'Maiden Orange');

$font_style = array('normal'=>'Normal','italic'=>'Italic');
	
	
// General typography section
$wp_customize->add_section( 'health-center-lite_general_typography' , array(
		'title'      => __('General Typography', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 1,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[general_typography_fontsize]',
    array(
        'default'           =>  13,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[general_typography_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_general_typography',
		'setting' => 'hc_lite_options[general_typography_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[general_typography_fontfamily]',
    array(
        'default'           =>  'Helvetica Neue,Helvetica,Arial,sans-serif',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[general_typography_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_general_typography',
		'setting' => 'hc_lite_options[general_typography_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[general_typography_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[general_typography_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_general_typography',
		'setting' => 'hc_lite_options[general_typography_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));


// Menus typography section
$wp_customize->add_section( 'health-center-lite_menus_typography' , array(
		'title'      => __('Menus Typography', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 2,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[menu_title_fontsize]',
    array(
        'default'           =>  18,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[menu_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_menus_typography',
		'setting' => 'hc_lite_options[menu_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[menu_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[menu_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_menus_typography',
		'setting' => 'hc_lite_options[menu_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[menu_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[menu_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_menus_typography',
		'setting' => 'hc_lite_options[menu_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));


// Post and page title typography section
$wp_customize->add_section( 'health-center-lite_post_page_title_typography' , array(
		'title'      => __('Post / Page Typography', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 3,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[post_title_fontsize]',
    array(
        'default'           =>  26,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[post_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_post_page_title_typography',
		'setting' => 'hc_lite_options[post_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[post_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[post_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_post_page_title_typography',
		'setting' => 'hc_lite_options[post_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[post_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[post_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_post_page_title_typography',
		'setting' => 'hc_lite_options[post_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));

// Service typography section
$wp_customize->add_section( 'health-center-lite_service_typography' , array(
		'title'      => __('Service Title Typography', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 4,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[service_title_fontsize]',
    array(
        'default'           =>  26,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[service_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_service_typography',
		'setting' => 'hc_lite_options[service_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[service_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[service_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_service_typography',
		'setting' => 'hc_lite_options[service_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[service_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[service_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_service_typography',
		'setting' => 'hc_lite_options[service_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));

// Portfolio title typography section
$wp_customize->add_section( 'health-center-lite_portfolio_typography' , array(
		'title'      => __('Portfolio Title Typography', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 5,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[portfolio_title_fontsize]',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[portfolio_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_portfolio_typography',
		'setting' => 'hc_lite_options[portfolio_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[portfolio_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[portfolio_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_portfolio_typography',
		'setting' => 'hc_lite_options[portfolio_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[portfolio_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[portfolio_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_portfolio_typography',
		'setting' => 'hc_lite_options[portfolio_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));


// Widget heading title typography section
$wp_customize->add_section( 'health-center-lite_widget_title_typography' , array(
		'title'      => __('Widget Heading Title', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 6,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[widget_title_fontsize]',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[widget_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_widget_title_typography',
		'setting' => 'hc_lite_options[widget_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[widget_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[widget_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_widget_title_typography',
		'setting' => 'hc_lite_options[widget_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[widget_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[widget_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_widget_title_typography',
		'setting' => 'hc_lite_options[widget_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));

// Call Out Area title typography section
$wp_customize->add_section( 'health-center-lite_site_intro_typography' , array(
		'title'      => __('Call Out Area Title', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 7,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_title_fontsize]',
    array(
        'default'           =>  34,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_title_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_site_intro_typography',
		'setting' => 'hc_lite_options[calloutarea_title_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_title_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_title_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_site_intro_typography',
		'setting' => 'hc_lite_options[calloutarea_title_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_title_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_title_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_site_intro_typography',
		'setting' => 'hc_lite_options[calloutarea_title_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));

// Call Out Area description typography section
$wp_customize->add_section( 'health-center-lite_callout_desc_typography' , array(
		'title'      => __('Call Out Area Description', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 8,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_description_fontsize]',
    array(
        'default'           =>  15,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_description_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_callout_desc_typography',
		'setting' => 'hc_lite_options[calloutarea_description_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_description_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_description_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_callout_desc_typography',
		'setting' => 'hc_lite_options[calloutarea_description_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_description_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_description_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_callout_desc_typography',
		'setting' => 'hc_lite_options[calloutarea_description_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));

// Call Out Area button typography section
$wp_customize->add_section( 'health-center-lite_callout_button_typography' , array(
		'title'      => __('Call Out Area Button', 'health-center-lite'),
		'panel' => 'health-center-lite_typography_setting',
		'priority'       => 9,
   	) );	
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_purches_fontsize]',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_purches_fontsize]', array(
		'label' => __('Font Size','health-center-lite'),
        'section' => 'health-center-lite_callout_button_typography',
		'setting' => 'hc_lite_options[calloutarea_purches_fontsize]',
		'type'    =>  'select',
		'choices'=>$font_size,
		'description'=>'(Pixels)'
    ));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_purches_fontfamily]',
    array(
        'default'           =>  'RobotoRegular',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_purches_fontfamily]', array(
		'label' => __('Font Family','health-center-lite'),
        'section' => 'health-center-lite_callout_button_typography',
		'setting' => 'hc_lite_options[calloutarea_purches_fontfamily]',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'hc_lite_options[calloutarea_purches_fontstyle]',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
		'type'              =>  'option'
    )	
);
$wp_customize->add_control('hc_lite_options[calloutarea_purches_fontstyle]', array(
		'label' => __('Font Style','health-center-lite'),
        'section' => 'health-center-lite_callout_button_typography',
		'setting' => 'hc_lite_options[calloutarea_purches_fontstyle]',
		'type'    =>  'select',
		'choices'=>$font_style,
));
}
add_action( 'customize_register', 'health_typography_customizer' );
?>