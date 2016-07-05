<?php
	$hc_lite_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'hc_lite_options', array() ), $hc_lite_options );
	if($current_options['home_page_image']!='') { 
	?>
	<div class="row">		
		<img style="height:450px; width:1200px;" src="<?php echo $current_options['home_page_image']; ?>" class="img-responsive" />
	</div>	
<?php } ?>