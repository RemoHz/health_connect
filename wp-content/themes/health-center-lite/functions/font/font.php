<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function health_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:300,400,600,700,800','Roboto:400,700','Raleway:400,600,700','italic');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function health_scripts_styles() {
    wp_enqueue_style( 'health-fonts', health_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'health_scripts_styles' );
?>