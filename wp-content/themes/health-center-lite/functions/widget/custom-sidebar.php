<?php	
add_action( 'widgets_init', 'webriti_widgets_init');
function webriti_widgets_init() {
/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar', 'health-center-lite' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'health-center-lite' ),
		'before_widget' => '<div class="hc_sidebar_widget" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="hc_sidebar_widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'health-center-lite' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'health-center-lite' ),
		'before_widget' => '<div class="col-md-3 hc_footer_widget_column">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="hc_footer_widget_title">',
		'after_title' => '</h2>',
	) );
}	                     
?>