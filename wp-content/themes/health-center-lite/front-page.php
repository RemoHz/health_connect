<?php
	$hc_lite_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'hc_lite_options', array() ), $hc_lite_options );
	if (  $current_options['front_page'] != true ) {
  		get_template_part('index');
  		}
  	else {
	get_header();
	get_template_part('index', 'slider');
	?>
	<div class="row"><div class="hc_home_border"></div></div>
	<?php 
	/****** get index service  ********/
  	get_template_part('index', 'services') ;
	
	/****** get index Projects  ********/
  	get_template_part('index', 'projects') ;
	get_footer();
	}	
	?>