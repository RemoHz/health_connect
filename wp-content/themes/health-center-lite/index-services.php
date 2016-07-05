<?php 
$hc_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'hc_lite_options', array() ), $hc_lite_options ); ?>
	
	<!-- HC Service Section -->
	<div class="container" id="service_section">	
	<div class="row">
		<div class="hc_service_title">
			<?php if($current_options['service_title']!='') { ?>
			<h1><?php echo $current_options['service_title']; ?></h1>
			<?php } ?>
			<?php if($current_options['service_description']!='') { ?>
			<p><?php echo $current_options['service_description']; ?>.</p>
			<?php } ?>		
		</div>
	</div>	
	<div class="row">	
		<div class="col-md-3 hc_service_area">
			
			<?php if($current_options['home_service_one_link']!='') { ?>
			<a href="<?php echo $current_options['home_service_one_link']; ?>"<?php if($current_options['home_service_one_link_target'] =="on") { echo "target='_blank'"; } ?> >
			<i class="fa <?php echo $current_options['service_one_icon']; ?>"></i></a>
			<?php } ?>
			<?php if($current_options['service_one_title']!='') { ?>
			<h2><a href="<?php echo $current_options['home_service_one_link']; ?>"<?php if($current_options['home_service_one_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_one_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_one_description']!='') { ?>
			<p><?php echo $current_options['service_one_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['home_service_two_link']!='') { ?>
			<a href="<?php echo $current_options['home_service_two_link']; ?>"<?php if($current_options['home_service_two_link_target'] =="on") { echo "target='_blank'"; } ?> >
			<i class="fa <?php echo $current_options['service_two_icon']; ?>"></i></a>
			<?php } ?>
			<?php if($current_options['service_two_title']!='') { ?>
			<h2><a href="<?php echo $current_options['home_service_two_link']; ?>"<?php if($current_options['home_service_two_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_two_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_two_description']!='') { ?>
			<p><?php echo $current_options['service_two_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['home_service_third_link']!='') { ?>
			<a href="<?php echo $current_options['home_service_third_link']; ?>"<?php if($current_options['home_service_third_link_target'] =="on") { echo "target='_blank'"; } ?> >
			<i class="fa <?php echo $current_options['service_third_icon']; ?>"></i></a>
			<?php } ?>
			<?php if($current_options['service_third_title']!='') { ?>
			<h2><a href="<?php echo $current_options['home_service_third_link']; ?>"<?php if($current_options['home_service_third_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_third_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_third_description']!='') { ?>
			<p><?php echo $current_options['service_third_description']; ?> </p>
			<?php } ?>
		</div>	
		<div class="col-md-3 hc_service_area">
			<?php if($current_options['home_service_fourth_link']!='') { ?>
			<a href="<?php echo $current_options['home_service_fourth_link']; ?>"<?php if($current_options['home_service_fourth_link_target'] =="on") { echo "target='_blank'"; } ?> >
			<i class="fa <?php echo $current_options['service_four_icon']; ?>"></i></a>
			<?php } ?>
			<?php if($current_options['service_four_title']!='') { ?>
			<h2><a href="<?php echo $current_options['home_service_fourth_link']; ?>"<?php if($current_options['home_service_fourth_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_four_title']; ?></a></h2>
			<?php } ?>
			<?php if($current_options['service_four_description']!='') { ?>
			<p><?php echo $current_options['service_four_description']; ?> </p>
			<?php } ?>
		</div>	
		
	</div>
	<div class="row"><div class="hc_home_border"></div></div>	
	</div>
	