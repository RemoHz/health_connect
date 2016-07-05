<?php
$hc_lite_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'hc_lite_options', array() ), $hc_lite_options );
?>
<div class="container">	
		<div class="row">
		<div class="hc_portfolio_title">
			<?php if($current_options['project_heading_one']) { ?>
			<h1><?php echo $current_options['project_heading_one']; ?></h1>
			<?php } ?>
			<?php if($current_options['project_tagline']) { ?>
			<p><?php echo $current_options['project_tagline']; ?></p>
			<?php } ?>
		</div>
		</div>
		<div class="row">			
			<div class="col-md-3 hc_home_portfolio_area">
				<?php if($current_options['project_one_thumb']) { ?>
				<div class="hc_home_portfolio_showcase">
					<div class="hc_home_portfolio_showcase_media">
					<?php if($current_options['project_one_thumb']) { ?>
					  <a href="<?php echo $current_options['home_image_one_link']; ?>"<?php if($current_options['home_image_one_link_target'] =="on") { echo "target='_blank'"; } ?>>
					  <img alt="First Thumb" class="img-responsive" src="<?php echo $current_options['project_one_thumb']; ?>"></a>
					  <?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="hc_home_portfolio_caption">
				<?php if($current_options['project_one_title']) { ?>
				<h3><a href="<?php echo $current_options['home_image_one_link']; ?>"<?php if($current_options['home_image_one_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['project_one_title']; ?></a></h3>
				<?php } ?>
				<?php if($current_options['project_one_text']) { ?>
				<small><?php echo $current_options['project_one_text']; ?></small>	
				</div>
				<?php } ?>				
			</div>
			<div class="col-md-3 hc_home_portfolio_area">
				<?php if($current_options['project_two_thumb']) { ?>
				<div class="hc_home_portfolio_showcase">
					<div class="hc_home_portfolio_showcase_media">
					<?php if($current_options['project_two_thumb']) { ?>
					  <a href="<?php echo $current_options['home_image_two_link']; ?>"<?php if($current_options['home_image_two_link_target'] =="on") { echo "target='_blank'"; } ?>>
					  <img alt="Second Thumb" class="img-responsive" src="<?php echo $current_options['project_two_thumb']; ?>"></a>
					  <?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="hc_home_portfolio_caption">
				<?php if($current_options['project_two_title']) { ?>
				<h3><a href="<?php echo $current_options['home_image_two_link']; ?>"<?php if($current_options['home_image_two_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['project_two_title']; ?></a></h3>
				<?php } ?>
				<?php if($current_options['project_two_text']) { ?>
				<small><?php echo $current_options['project_two_text']; ?></small>	
				</div>
				<?php } ?>				
			</div>
			<div class="col-md-3 hc_home_portfolio_area">
				<?php if($current_options['project_three_thumb']) { ?>
				<div class="hc_home_portfolio_showcase">
					<div class="hc_home_portfolio_showcase_media">
					<?php if($current_options['project_three_thumb']) { ?>
					  <a href="<?php echo $current_options['home_image_three_link']; ?>"<?php if($current_options['home_image_three_link_target'] =="on") { echo "target='_blank'"; } ?>>
					  <img alt="Third Thumb" class="img-responsive" src="<?php echo $current_options['project_three_thumb']; ?>"></a>
					  <?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="hc_home_portfolio_caption">
				<?php if($current_options['project_three_title']) { ?>
				<h3><a href="<?php echo $current_options['home_image_three_link']; ?>"<?php if($current_options['home_image_three_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['project_three_title']; ?></a></h3>
				<?php } ?>
				<?php if($current_options['project_three_text']) { ?>
				<small><?php echo $current_options['project_three_text']; ?></small>	
				</div>
				<?php } ?>				
			</div>
			<div class="col-md-3 hc_home_portfolio_area">
				<?php if($current_options['project_four_thumb']) { ?>
				<div class="hc_home_portfolio_showcase">
					<div class="hc_home_portfolio_showcase_media">
					<?php if($current_options['project_four_thumb']) { ?>
					  <a href="<?php echo $current_options['home_image_four_link']; ?>"<?php if($current_options['home_image_four_link_target'] =="on") { echo "target='_blank'"; } ?>>
					  <img alt="Fourth Thumb" class="img-responsive" src="<?php echo $current_options['project_four_thumb']; ?>"></a>
					  <?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="hc_home_portfolio_caption">
				<?php if($current_options['project_four_title']) { ?>
				<h3><a href="<?php echo $current_options['home_image_four_link']; ?>"<?php if($current_options['home_image_four_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['project_four_title']; ?></a></h3>
				<?php } ?>
				<?php if($current_options['project_four_text']) { ?>
				<small><?php echo $current_options['project_four_text']; ?></small>	
				</div>
				<?php } ?>				
			</div>
			
		</div>
		<div class="row"><div class="hc_home_border"></div></div>
	</div>