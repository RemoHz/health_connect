<?php
/**
 *  The template for displaying Sidebar.
 *
 *  @package ThemeIsle.
 */
?>
<aside id="sidebar-right">
<?php
if ( is_dynamic_sidebar( 'general-sidebar' ) ) {
	dynamic_sidebar( 'general-sidebar' );
} else if ( is_user_logged_in() ) {

	echo '<div class="widget">';
	_e( 'The sidebar is not active.', 'medica-lite' );
	echo '</div>';

} else {

	$widget_args = array(
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div><!--/.widget-->',
		'before_title'	=> '<div class="title-widget">',
		'after_title'	=> '</div><!--/.title-widget-->'
	);
	the_widget( 'WP_Widget_Recent_Posts', '', $widget_args );
	the_widget( 'WP_Widget_Pages', '', $widget_args );
	the_widget( 'WP_Widget_Categories', '', $widget_args );
	the_widget( 'WP_Widget_Meta', '', $widget_args );

}
?>
</aside><!--/aside #sidebar-right-->