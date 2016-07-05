<?php
/**
 *	Customizer
 */
function medica_lite_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'refresh';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_color' )->transport = 'refresh';

    // Frontpage - Subheader - Right Image note
    class medica_lite_frontpage_subheader_rightimage_note extends WP_Customize_Control {
        public function render_content() {
        	echo '<label for="medica_lite_frontpage_subheader_backgroundimage-button"><span class="customize-control-title">'. __( 'Right Image:', 'medica-lite' ) .'</span></label>';
            echo __( 'This feature is available in the <a href="'. esc_url( __( 'https://themeisle.com/themes/medica/', 'medica-lite' ) ) .'" title="premium version" target="_blank">premium version</a>.', 'medica-lite' );
        }
    }

    // Frontpage - Contact Form 7 - Title note
    class medica_lite_frontpage_contactform7_title_note extends WP_Customize_Control {
        public function render_content() {
        	echo '<label for="medica_lite_frontpage_subheader_backgroundimage-button"><span class="customize-control-title">'. __( 'Title:', 'medica-lite' ) .'</span></label>';
            echo __( 'This feature is available in the <a href="'. esc_url( __( 'https://themeisle.com/themes/medica/', 'medica-lite' ) ) .'" title="premium version" target="_blank">premium version</a>.', 'medica-lite' );
        }
    }

    // Frontpage - Contact Form 7 - Shortcode note
    class medica_lite_frontpage_contactform7_shortcode_note extends WP_Customize_Control {
        public function render_content() {
        	echo '<label for="medica_lite_frontpage_subheader_backgroundimage-button"><span class="customize-control-title">'. __( 'Shortcode:', 'medica-lite' ) .'</span></label>';
            echo __( 'This feature is available in the <a href="'. esc_url( __( 'https://themeisle.com/themes/medica/', 'medica-lite' ) ) .'" title="premium version" target="_blank">premium version</a>.', 'medica-lite' );
        }
    }

    // Doctors Page note
    class medica_lite_doctorspage_note extends WP_Customize_Control {
        public function render_content() {
            echo __( 'This feature is available in the <a href="'. esc_url( __( 'https://themeisle.com/themes/medica/', 'medica-lite' ) ) .'" title="premium version" target="_blank">premium version</a>.', 'medica-lite' );
        }
    }

	/**
	 *	General Panel
	 */
	if ( class_exists( 'WP_Customize_Panel' ) ):
	 
		$wp_customize->add_panel( 'medica_lite_general_panel', array(
			'priority'          => 200,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'General', 'medica-lite' ),
			'description'       => __( 'General settings.', 'medica-lite' ),
		) );

		/**
		 *	Socials Link Section
		 */
		$wp_customize->add_section( 'medica_lite_general_socialslink_section', array(
			'priority'          => 1,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Socials Link', 'medica-lite' ),
			'description'       => __( 'Settings for socials link.', 'medica-lite' ),
			'panel'             => 'medica_lite_general_panel',
		) );

			// Facebook Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_facebooklink', array(
				'default'           => __( 'http://www.facebook.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_facebooklink', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_facebooklink',
				'label'     => __( 'Facebook Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Twitter Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_twitterlink', array(
				'default'           => __( 'http://www.twitter.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_twitterlink', array(
				'priority'  => 2,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_twitterlink',
				'label'     => __( 'Twitter Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// YouTube Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_youtubelink', array(
				'default'           => __( 'http://www.youtube.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_youtubelink', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_youtubelink',
				'label'     => __( 'YouTube Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// LinkedIn Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_linkedinlink', array(
				'default'           => __( 'http://www.linkedin.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_linkedinlink', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_linkedinlink',
				'label'     => __( 'LinkedIn Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Contact Info Section
		 */
		$wp_customize->add_section( 'medica_lite_general_contactinfo_section', array(
			'priority'          => 2,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Contact Info', 'medica-lite' ),
			'description'       => __( 'Settings for contact info.', 'medica-lite' ),
			'panel'             => 'medica_lite_general_panel',
		) );

			// Telephone Title
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_telephonetitle', array(
				'default'           => __( 'Telephone', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_telephonetitle', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_telephonetitle',
				'label'     => __( 'Telephone Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Telephone Number
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_telephonenumber', array(
				'default'           => __( '+1 223 456 23', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_telephonenumber', array(
				'priority'  => 2,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_telephonenumber',
				'label'     => __( 'Telephone Number:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Address Title
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_addresstitle', array(
				'default'           => __( 'Address', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_addresstitle', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_addresstitle',
				'label'     => __( 'Address Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Address Entry
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_addressentry', array(
				'default'           => __( 'Northwest Valley<br /> 35th Ave. at Northern<br /> 7805 N 35th Ave<br /> Phoenix, AZ 85051', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_addressentry', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_addressentry',
				'label'     => __( 'Address Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Map Code
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_mapcode', array(
				'sanitize_callback'	=> 'esc_textarea'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'medica_lite_general_contactinfo_mapcode', array(
			            'label' 	=> __( 'Map Code:', 'medica-lite' ),
			            'section' 	=> 'medica_lite_general_contactinfo_section',
			            'settings' 	=> 'medica_lite_general_contactinfo_mapcode',
			            'priority' 	=> 5
			        )
			    )
			);

		/**
		 *	Footer Section
		 */
		$wp_customize->add_section( 'medica_lite_general_footer_section', array(
			'priority'          => 3,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Footer', 'medica-lite' ),
			'description'       => __( 'Settings for footer.', 'medica-lite' ),
			'panel'             => 'medica_lite_general_panel',
		) );

			// About Us Title
			$wp_customize->add_setting( 'medica_lite_general_footer_aboutustitle', array(
				'default'           => __( 'About Us', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_aboutustitle', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_aboutustitle',
				'label'     => __( 'About Us Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// About Us Image
			$wp_customize->add_setting( 'medica_lite_general_footer_aboutusimage', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_general_footer_aboutusimage', array(
                'priority'  => 2,
                'label'     => __( 'About Us Image:', 'medica-lite' ),
                'section'   => 'medica_lite_general_footer_section',
                'settings'  => 'medica_lite_general_footer_aboutusimage',
            ) ) );

            // About Us Entry
            $wp_customize->add_setting( 'medica_lite_general_footer_aboutusentry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi. Ut vitae porttitor ante. Etiam vel porttitor eros, id malesuada elit. Vivamus non orci erat.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_aboutusentry', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_aboutusentry',
				'label'     => __( 'About Us Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Menu Title
			$wp_customize->add_setting( 'medica_lite_general_footer_menutitle', array(
				'default'           => __( 'Menu', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_menutitle', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_menutitle',
				'label'     => __( 'Menu Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Copyright Entry
			$wp_customize->add_setting( 'medica_lite_general_footer_copyrightentry', array(
				'sanitize_callback'	=> 'esc_textarea',
				'default'			=> 'Copyright'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'medica_lite_general_footer_copyrightentry', array(
			            'label' 	=> __( 'Copyright Entry:', 'medica-lite' ),
			            'section' 	=> 'medica_lite_general_footer_section',
			            'settings' 	=> 'medica_lite_general_footer_copyrightentry',
			            'priority' 	=> 5
			        )
			    )
			);
			
	else:

		/**
		 *	Socials Link Section
		 */
		$wp_customize->add_section( 'medica_lite_general_socialslink_section', array(
			'priority'          => 32,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Socials Link', 'medica-lite' ),
			'description'       => __( 'Settings for socials link.', 'medica-lite' )
		) );

			// Facebook Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_facebooklink', array(
				'default'           => __( 'http://www.facebook.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_facebooklink', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_facebooklink',
				'label'     => __( 'Facebook Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Twitter Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_twitterlink', array(
				'default'           => __( 'http://www.twitter.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_twitterlink', array(
				'priority'  => 2,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_twitterlink',
				'label'     => __( 'Twitter Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// YouTube Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_youtubelink', array(
				'default'           => __( 'http://www.youtube.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_youtubelink', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_youtubelink',
				'label'     => __( 'YouTube Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// LinkedIn Link
			$wp_customize->add_setting( 'medica_lite_general_socialslink_linkedinlink', array(
				'default'           => __( 'http://www.linkedin.com', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_general_socialslink_linkedinlink', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_socialslink_section',
				'settings'  => 'medica_lite_general_socialslink_linkedinlink',
				'label'     => __( 'LinkedIn Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Contact Info Section
		 */
		$wp_customize->add_section( 'medica_lite_general_contactinfo_section', array(
			'priority'          => 33,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Contact Info', 'medica-lite' ),
			'description'       => __( 'Settings for contact info.', 'medica-lite' )
		) );

			// Telephone Title
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_telephonetitle', array(
				'default'           => __( 'Telephone', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_telephonetitle', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_telephonetitle',
				'label'     => __( 'Telephone Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Telephone Number
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_telephonenumber', array(
				'default'           => __( '+1 223 456 23', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_telephonenumber', array(
				'priority'  => 2,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_telephonenumber',
				'label'     => __( 'Telephone Number:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Address Title
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_addresstitle', array(
				'default'           => __( 'Address', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_addresstitle', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_addresstitle',
				'label'     => __( 'Address Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Address Entry
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_addressentry', array(
				'default'           => __( 'Northwest Valley<br /> 35th Ave. at Northern<br /> 7805 N 35th Ave<br /> Phoenix, AZ 85051', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_contactinfo_addressentry', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_contactinfo_section',
				'settings'  => 'medica_lite_general_contactinfo_addressentry',
				'label'     => __( 'Address Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Map Code
			$wp_customize->add_setting( 'medica_lite_general_contactinfo_mapcode', array(
				'sanitize_callback'	=> 'esc_textarea'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'medica_lite_general_contactinfo_mapcode', array(
			            'label' 	=> __( 'Map Code:', 'medica-lite' ),
			            'section' 	=> 'medica_lite_general_contactinfo_section',
			            'settings' 	=> 'medica_lite_general_contactinfo_mapcode',
			            'priority' 	=> 5
			        )
			    )
			);

		/**
		 *	Footer Section
		 */
		$wp_customize->add_section( 'medica_lite_general_footer_section', array(
			'priority'          => 34,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Footer', 'medica-lite' ),
			'description'       => __( 'Settings for footer.', 'medica-lite' )
		) );

			// About Us Title
			$wp_customize->add_setting( 'medica_lite_general_footer_aboutustitle', array(
				'default'           => __( 'About Us', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_aboutustitle', array(
				'priority'  => 1,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_aboutustitle',
				'label'     => __( 'About Us Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// About Us Image
			$wp_customize->add_setting( 'medica_lite_general_footer_aboutusimage', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_general_footer_aboutusimage', array(
                'priority'  => 2,
                'label'     => __( 'About Us Image:', 'medica-lite' ),
                'section'   => 'medica_lite_general_footer_section',
                'settings'  => 'medica_lite_general_footer_aboutusimage',
            ) ) );

            // About Us Entry
            $wp_customize->add_setting( 'medica_lite_general_footer_aboutusentry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi. Ut vitae porttitor ante. Etiam vel porttitor eros, id malesuada elit. Vivamus non orci erat.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_aboutusentry', array(
				'priority'  => 3,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_aboutusentry',
				'label'     => __( 'About Us Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Menu Title
			$wp_customize->add_setting( 'medica_lite_general_footer_menutitle', array(
				'default'           => __( 'Menu', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_general_footer_menutitle', array(
				'priority'  => 4,
				'section'   => 'medica_lite_general_footer_section',
				'settings'  => 'medica_lite_general_footer_menutitle',
				'label'     => __( 'Menu Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Copyright Entry
			$wp_customize->add_setting( 'medica_lite_general_footer_copyrightentry', array(
				'sanitize_callback'	=> 'esc_textarea',
				'default'			=> 'Copyright'
			) );
			$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'medica_lite_general_footer_copyrightentry', array(
			            'label' 	=> __( 'Copyright Entry:', 'medica-lite' ),
			            'section' 	=> 'medica_lite_general_footer_section',
			            'settings' 	=> 'medica_lite_general_footer_copyrightentry',
			            'priority' 	=> 5
			        )
			    )
			);
	
	
	endif;
	
	if ( class_exists( 'WP_Customize_Panel' ) ):

	/**
	 *	Frontpage Panel
	 */
	$wp_customize->add_panel( 'medica_lite_frontpage_panel', array(
		'priority'          => 250,
		'capability'        => 'edit_theme_options',
		'theme_supports'    => '',
		'title'             => __( 'Frontpage', 'medica-lite' ),
		'description'       => __( 'Settings for frontpage.', 'medica-lite' ),
	) );

		/**
		 *	Subheader Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_subheader_section', array(
			'priority'          => 1,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Subheader', 'medica-lite' ),
			'description'       => __( 'Settings for subheader.', 'medica-lite' ),
			'panel'             => 'medica_lite_frontpage_panel',
		) );

			// Right Image
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_rightimage', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_subheader_rightimage_note ( $wp_customize,'medica_lite_frontpage_subheader_rightimage', array(
	        	'priority'	=> 1,
	            'section'  	=> 'medica_lite_frontpage_subheader_section'
	        ) ) );

			// Background Image
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_backgroundimage', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_subheader_backgroundimage', array(
                'priority'  => 2,
                'label'     => __( 'Background Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_subheader_section',
                'settings'  => 'medica_lite_frontpage_subheader_backgroundimage',
            ) ) );

            // Title
            $wp_customize->add_setting( 'medica_lite_frontpage_subheader_title', array(
				'default'           => __( 'Your Awesome Headline', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_title', array(
				'priority'  => 3,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_entry', array(
				'default'           => __( 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_entry', array(
				'priority'  => 4,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Button Text
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_buttontext', array(
				'default'           => __( 'Read More', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_buttontext', array(
				'priority'  => 5,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_buttontext',
				'label'     => __( 'Button Text:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Button Link
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_buttonlink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_buttonlink', array(
				'priority'  => 6,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_buttonlink',
				'label'     => __( 'Button Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Contact Form 7 Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_contactform7_section', array(
			'priority'          => 2,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Contact Form 7', 'medica-lite' ),
			'description'       => __( 'Settings for contact form 7.', 'medica-lite' ),
			'panel'             => 'medica_lite_frontpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_contactform7_title', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_contactform7_title_note ( $wp_customize,'medica_lite_frontpage_contactform7_title', array(
	        	'priority'	=> 1,
	            'section'  	=> 'medica_lite_frontpage_contactform7_section'
	        ) ) );

	        // Shortcode
	        $wp_customize->add_setting( 'medica_lite_frontpage_contactform7_shortcode', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_contactform7_shortcode_note ( $wp_customize,'medica_lite_frontpage_contactform7_shortcode', array(
	        	'priority'	=> 2,
	            'section'  	=> 'medica_lite_frontpage_contactform7_section'
	        ) ) );

		/**
		 *	Featured Article Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_featuredarticle_section', array(
			'priority'          => 3,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Featured Article', 'medica-lite' ),
			'description'       => __( 'Settings for featured article.', 'medica-lite' ),
			'panel'             => 'medica_lite_frontpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_title', array(
				'default'           => __( 'Featured Article', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_featuredarticle_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_featuredarticle_section',
				'settings'  => 'medica_lite_frontpage_featuredarticle_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_entry', array(
				'default'           => __( '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p><br /><p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p><br /><p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_featuredarticle_entry', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_featuredarticle_section',
				'settings'  => 'medica_lite_frontpage_featuredarticle_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Image
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_featuredarticle_image', array(
                'priority'  => 3,
                'label'     => __( 'Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_featuredarticle_section',
                'settings'  => 'medica_lite_frontpage_featuredarticle_image',
            ) ) );

        /**
         *	Features Section
         */
        $wp_customize->add_section( 'medica_lite_frontpage_features_section', array(
			'priority'          => 4,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Features', 'medica-lite' ),
			'description'       => __( 'Settings for features.', 'medica-lite' ),
			'panel'             => 'medica_lite_frontpage_panel',
		) );

			// Title
        	$wp_customize->add_setting( 'medica_lite_frontpage_features_title', array(
				'default'           => __( 'This is a free wordpress theme', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_entry', array(
				'default'           => __( 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_entry', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 1 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box1image', array(
                'priority'  => 3,
                'label'     => __( 'Box 1 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box1image',
            ) ) );

            // Box 1 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box1title', array(
				'default'           => __( 'Loreum', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1title', array(
				'priority'  => 4,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1title',
				'label'     => __( 'Box 1 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 1 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1titlelink', array(
				'priority'  => 5,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1titlelink',
				'label'     => __( 'Box 1 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 1 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1entry', array(
				'default'           => __( 'Test', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1entry', array(
				'priority'  => 6,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1entry',
				'label'     => __( 'Box 1 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 2 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box2image', array(
                'priority'  => 7,
                'label'     => __( 'Box 2 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box2image',
            ) ) );

            // Box 2 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box2title', array(
				'default'           => __( 'Dolor', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2title', array(
				'priority'  => 8,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2title',
				'label'     => __( 'Box 2 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 2 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2titlelink', array(
				'priority'  => 9,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2titlelink',
				'label'     => __( 'Box 2 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 2 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2entry', array(
				'priority'  => 10,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2entry',
				'label'     => __( 'Box 2 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 3 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box3image', array(
                'priority'  => 11,
                'label'     => __( 'Box 3 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box3image',
            ) ) );

            // Box 3 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box3title', array(
				'default'           => __( 'Lipsum', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3title', array(
				'priority'  => 12,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3title',
				'label'     => __( 'Box 3 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 3 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3titlelink', array(
				'priority'  => 13,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3titlelink',
				'label'     => __( 'Box 3 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 3 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3entry', array(
				'priority'  => 14,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3entry',
				'label'     => __( 'Box 3 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 4 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box4image', array(
                'priority'  => 15,
                'label'     => __( 'Box 4 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box4image',
            ) ) );

            // Box 4 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box4title', array(
				'default'           => __( 'Vivamus', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4title', array(
				'priority'  => 16,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4title',
				'label'     => __( 'Box 4 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 4 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4titlelink', array(
				'priority'  => 17,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4titlelink',
				'label'     => __( 'Box 4 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 4 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4entry', array(
				'priority'  => 18,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4entry',
				'label'     => __( 'Box 4 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Button Text
			$wp_customize->add_setting( 'medica_lite_frontpage_features_buttontext', array(
				'default'           => __( 'Buy Now', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_buttontext', array(
				'priority'  => 19,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_buttontext',
				'label'     => __( 'Button Text:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Button Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_buttonlink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_buttonlink', array(
				'priority'  => 20,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_buttonlink',
				'label'     => __( 'Button Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Latest News Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_latestnews_section', array(
			'priority'          => 5,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Latest News', 'medica-lite' ),
			'description'       => __( 'Settings for latest news.', 'medica-lite' ),
			'panel'             => 'medica_lite_frontpage_panel',
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_latestnews_title', array(
				'default'           => __( 'Latest News', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_latestnews_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_latestnews_section',
				'settings'  => 'medica_lite_frontpage_latestnews_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Hide
			$wp_customize->add_setting( 'medica_lite_frontpage_latestnews_hide', array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_latestnews_hide', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_latestnews_section',
				'settings'  => 'medica_lite_frontpage_latestnews_hide',
				'label'     => __( 'Hide this section?', 'mooveit_lite' ),
				'type'      => 'checkbox'
			) );
			
		else:

			/**
			 *	Subheader Section
			 */
			$wp_customize->add_section( 'medica_lite_frontpage_subheader_section', array(
				'priority'          => 35,
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '',
				'title'             => __( 'Frontpage Subheader', 'medica-lite' ),
				'description'       => __( 'Settings for subheader.', 'medica-lite' )
			) );

			// Right Image
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_rightimage', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_subheader_rightimage_note ( $wp_customize,'medica_lite_frontpage_subheader_rightimage', array(
	        	'priority'	=> 1,
	            'section'  	=> 'medica_lite_frontpage_subheader_section'
	        ) ) );

			// Background Image
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_backgroundimage', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_subheader_backgroundimage', array(
                'priority'  => 2,
                'label'     => __( 'Background Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_subheader_section',
                'settings'  => 'medica_lite_frontpage_subheader_backgroundimage',
            ) ) );

            // Title
            $wp_customize->add_setting( 'medica_lite_frontpage_subheader_title', array(
				'default'           => __( 'Your Awesome Headline', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_title', array(
				'priority'  => 3,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_entry', array(
				'default'           => __( 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_entry', array(
				'priority'  => 4,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Button Text
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_buttontext', array(
				'default'           => __( 'Read More', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_buttontext', array(
				'priority'  => 5,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_buttontext',
				'label'     => __( 'Button Text:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Button Link
			$wp_customize->add_setting( 'medica_lite_frontpage_subheader_buttonlink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_subheader_buttonlink', array(
				'priority'  => 6,
				'section'   => 'medica_lite_frontpage_subheader_section',
				'settings'  => 'medica_lite_frontpage_subheader_buttonlink',
				'label'     => __( 'Button Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Contact Form 7 Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_contactform7_section', array(
			'priority'          => 36,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Frontpage Contact Form 7', 'medica-lite' ),
			'description'       => __( 'Settings for contact form 7.', 'medica-lite' )
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_contactform7_title', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_contactform7_title_note ( $wp_customize,'medica_lite_frontpage_contactform7_title', array(
	        	'priority'	=> 1,
	            'section'  	=> 'medica_lite_frontpage_contactform7_section'
	        ) ) );

	        // Shortcode
	        $wp_customize->add_setting( 'medica_lite_frontpage_contactform7_shortcode', array(
	            'sanitize_callback'	=>  'medica_lite_sanitize_text'
	        ) );
	        $wp_customize->add_control( new medica_lite_frontpage_contactform7_shortcode_note ( $wp_customize,'medica_lite_frontpage_contactform7_shortcode', array(
	        	'priority'	=> 2,
	            'section'  	=> 'medica_lite_frontpage_contactform7_section'
	        ) ) );

		/**
		 *	Featured Article Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_featuredarticle_section', array(
			'priority'          => 37,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Frontpage Featured Article', 'medica-lite' ),
			'description'       => __( 'Settings for featured article.', 'medica-lite' )
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_title', array(
				'default'           => __( 'Featured Article', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_featuredarticle_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_featuredarticle_section',
				'settings'  => 'medica_lite_frontpage_featuredarticle_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_entry', array(
				'default'           => __( '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p><br /><p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p><br /><p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_featuredarticle_entry', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_featuredarticle_section',
				'settings'  => 'medica_lite_frontpage_featuredarticle_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Image
			$wp_customize->add_setting( 'medica_lite_frontpage_featuredarticle_image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_featuredarticle_image', array(
                'priority'  => 3,
                'label'     => __( 'Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_featuredarticle_section',
                'settings'  => 'medica_lite_frontpage_featuredarticle_image',
            ) ) );

        /**
         *	Features Section
         */
        $wp_customize->add_section( 'medica_lite_frontpage_features_section', array(
			'priority'          => 38,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Frontpage Features', 'medica-lite' ),
			'description'       => __( 'Settings for features.', 'medica-lite' )
		) );

			// Title
        	$wp_customize->add_setting( 'medica_lite_frontpage_features_title', array(
				'default'           => __( 'This is a free wordpress theme', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_entry', array(
				'default'           => __( 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_entry', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_entry',
				'label'     => __( 'Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 1 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box1image', array(
                'priority'  => 3,
                'label'     => __( 'Box 1 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box1image',
            ) ) );

            // Box 1 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box1title', array(
				'default'           => __( 'Loreum', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1title', array(
				'priority'  => 4,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1title',
				'label'     => __( 'Box 1 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 1 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1titlelink', array(
				'priority'  => 5,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1titlelink',
				'label'     => __( 'Box 1 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 1 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box1entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box1entry', array(
				'priority'  => 6,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box1entry',
				'label'     => __( 'Box 1 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 2 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box2image', array(
                'priority'  => 7,
                'label'     => __( 'Box 2 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box2image',
            ) ) );

            // Box 2 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box2title', array(
				'default'           => __( 'Dolor', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2title', array(
				'priority'  => 8,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2title',
				'label'     => __( 'Box 2 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 2 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2titlelink', array(
				'priority'  => 9,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2titlelink',
				'label'     => __( 'Box 2 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 2 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box2entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box2entry', array(
				'priority'  => 10,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box2entry',
				'label'     => __( 'Box 2 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 3 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box3image', array(
                'priority'  => 11,
                'label'     => __( 'Box 3 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box3image',
            ) ) );

            // Box 3 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box3title', array(
				'default'           => __( 'Lipsum', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3title', array(
				'priority'  => 12,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3title',
				'label'     => __( 'Box 3 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 3 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3titlelink', array(
				'priority'  => 13,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3titlelink',
				'label'     => __( 'Box 3 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 3 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box3entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box3entry', array(
				'priority'  => 14,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box3entry',
				'label'     => __( 'Box 3 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Box 4 Image
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4image', array(
                'sanitize_callback' => 'esc_url',
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh'
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medica_lite_frontpage_features_box4image', array(
                'priority'  => 15,
                'label'     => __( 'Box 4 Image:', 'medica-lite' ),
                'section'   => 'medica_lite_frontpage_features_section',
                'settings'  => 'medica_lite_frontpage_features_box4image',
            ) ) );

            // Box 4 Title
            $wp_customize->add_setting( 'medica_lite_frontpage_features_box4title', array(
				'default'           => __( 'Vivamus', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4title', array(
				'priority'  => 16,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4title',
				'label'     => __( 'Box 4 Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 4 Title Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4titlelink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4titlelink', array(
				'priority'  => 17,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4titlelink',
				'label'     => __( 'Box 4 Title Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Box 4 Entry
			$wp_customize->add_setting( 'medica_lite_frontpage_features_box4entry', array(
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, mauris nec consectetur interdum, sapien lacus ultricies felis, id iaculis est urna et mi.', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_box4entry', array(
				'priority'  => 18,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_box4entry',
				'label'     => __( 'Box 4 Entry:', 'medica-lite' ),
				'type'      => 'textarea'
			) );

			// Button Text
			$wp_customize->add_setting( 'medica_lite_frontpage_features_buttontext', array(
				'default'           => __( 'Buy Now', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_buttontext', array(
				'priority'  => 19,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_buttontext',
				'label'     => __( 'Button Text:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Button Link
			$wp_customize->add_setting( 'medica_lite_frontpage_features_buttonlink', array(
				'default'           => __( '#', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_features_buttonlink', array(
				'priority'  => 20,
				'section'   => 'medica_lite_frontpage_features_section',
				'settings'  => 'medica_lite_frontpage_features_buttonlink',
				'label'     => __( 'Button Link:', 'medica-lite' ),
				'type'      => 'text'
			) );

		/**
		 *	Latest News Section
		 */
		$wp_customize->add_section( 'medica_lite_frontpage_latestnews_section', array(
			'priority'          => 39,
			'capability'        => 'edit_theme_options',
			'theme_supports'    => '',
			'title'             => __( 'Latest News', 'medica-lite' ),
			'description'       => __( 'Settings for latest news.', 'medica-lite' )
		) );

			// Title
			$wp_customize->add_setting( 'medica_lite_frontpage_latestnews_title', array(
				'default'           => __( 'Latest News', 'medica-lite' ),
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_latestnews_title', array(
				'priority'  => 1,
				'section'   => 'medica_lite_frontpage_latestnews_section',
				'settings'  => 'medica_lite_frontpage_latestnews_title',
				'label'     => __( 'Title:', 'medica-lite' ),
				'type'      => 'text'
			) );

			// Hide
			$wp_customize->add_setting( 'medica_lite_frontpage_latestnews_hide', array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'medica_lite_sanitize_text',
			) );
			$wp_customize->add_control( 'medica_lite_frontpage_latestnews_hide', array(
				'priority'  => 2,
				'section'   => 'medica_lite_frontpage_latestnews_section',
				'settings'  => 'medica_lite_frontpage_latestnews_hide',
				'label'     => __( 'Hide this section?', 'mooveit_lite' ),
				'type'      => 'checkbox'
			) );
		
		endif;
			

	/**
	 *	Doctors Page Section
	 */
	$wp_customize->add_section( 'medica_lite_doctorspage_section', array(
		'priority'          => 300,
		'capability'        => 'edit_theme_options',
		'theme_supports'    => '',
		'title'             => __( 'Doctors Page', 'medica-lite' ),
		'description'       => __( 'Settings for doctors page.', 'medica-lite' ),
	) );

		// Note
		$wp_customize->add_setting( 'medica_lite_doctorspage_note', array(
			'sanitize_callback'	=>  'medica_lite_sanitize_text'
		) );
		$wp_customize->add_control( new medica_lite_doctorspage_note ( $wp_customize,'medica_lite_doctorspage_note', array(
			'priority'	=> 1,
			'section'  	=> 'medica_lite_doctorspage_section'
		) ) );

	/**
	 *	404
	 */
	$wp_customize->add_section( 'medica_lite_404_section', array(
		'priority'          => 350,
		'capability'        => 'edit_theme_options',
		'theme_supports'    => '',
		'title'             => __( '404', 'medica-lite' ),
		'description'       => __( 'Settings for 404.', 'medica-lite' ),
	) );

		// Title
		$wp_customize->add_setting( 'medica_lite_404_title', array(
			'default'           => __( '404 ERROR', 'medica-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'medica_lite_sanitize_text',
		) );
		$wp_customize->add_control( 'medica_lite_404_title', array(
			'priority'  => 1,
			'section'   => 'medica_lite_404_section',
			'settings'  => 'medica_lite_404_title',
			'label'     => __( 'Title:', 'medica-lite' ),
			'type'      => 'text'
		) );

		// Subtitle
		$wp_customize->add_setting( 'medica_lite_404_subtitle', array(
			'default'           => __( 'The page does not exist', 'medica-lite' ),
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'medica_lite_sanitize_text',
		) );
		$wp_customize->add_control( 'medica_lite_404_subtitle', array(
			'priority'  => 2,
			'section'   => 'medica_lite_404_section',
			'settings'  => 'medica_lite_404_subtitle',
			'label'     => __( 'Title:', 'medica-lite' ),
			'type'      => 'text'
		) );

		// Entry
		$wp_customize->add_setting( 'medica_lite_404_entry', array(
			'default'           => __( 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'medica-lite' ) .'">home page</a>.', 'medica-lite' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_textarea',
		) );
		$wp_customize->add_control( 'medica_lite_404_entry', array(
			'type'          => 'textarea',
			'priority'      => 3,
			'section'       => 'medica_lite_404_section',
			'settings'      => 'medica_lite_404_entry',
			 'label'         => __( 'Entry:', 'medica-lite' )
		) );

}
add_action( 'customize_register', 'medica_lite_customizer' );

/**
 *	Sanitize Text
 */
function medica_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

if( class_exists( 'WP_Customize_Control' ) ):
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	    public function render_content() { ?>

	        <label>
	        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        	<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>

	        <?php
	    }
	}
endif;

/**
 *	Registers
 */
function medica_lite_registers() {
	wp_register_script( 'medica_lite_customizer_script', get_template_directory_uri() . '/js/medica_lite_customizer.js', array("jquery"), '20120206', true  );
	wp_enqueue_script( 'medica_lite_customizer_script' );
	wp_localize_script( 'medica_lite_customizer_script', 'medica_lite_buttons', array(
		'doc'			=> __( 'Documentation', 'medica-lite' ),
		'pro'			=> __( 'View PRO Version', 'medica-lite' ),
		'review'			=> __( 'Leave a review ( it will help us )', 'medica-lite' )
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'medica_lite_registers' );

?>