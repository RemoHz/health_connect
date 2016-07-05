<?php
function theme_data_setup()
{	$project_img1 = WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb.png';
	$project_img2 = WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb.png';
	$project_img3 = WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb.png';
	$project_img4 = WEBRITI_TEMPLATE_DIR_URI .'/images/project_thumb.png';
	return $health_center_theme_options=array(
			//Static Front-Page
			'front_page' => true,
			//Logo and Fevicon header			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'150',
			'hc_texttitle'=>'on',
			'upload_image_favicon'=>'',
			'home_page_image' => WEBRITI_TEMPLATE_DIR_URI .'/images/slide1.png',
			//'home_service_enabled' => 'on',
			'service_title'=> __('Awesome Services','health-center-lite'),
			'service_description' =>__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.','health-center-lite'),
			
			'service_one_icon'=>'fa-wheelchair',
			'service_one_title'=>__('Medical Guidance','health-center-lite'),
			'service_one_description' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
			'home_service_one_link' => '#',
			'home_service_one_link_target' => "on",
			
			'service_two_icon'=>'fa-medkit',
			'service_two_title'=> __('Emergency Help','health-center-lite'),
			'service_two_description' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
			'home_service_two_link' => '#',
			'home_service_two_link_target' => "on",
			
			'service_third_icon'=>'fa-ambulance',
			'service_third_title'=>__('Cardio Monitoring','health-center-lite'),
			'service_third_description' => __('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
			'home_service_third_link' => '#',
			'home_service_third_link_target' => "on",
			
			'service_four_icon'=>'fa-user-md',
			'service_four_title'=> __('Medical Treatments','health-center-lite'),
			'service_four_description' =>__('Lorem ipsum dolor sit amet, consectetur adipricies sem Unlimited ColorsCras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis udin','health-center-lite'),
			'home_service_fourth_link' => '#',
			'home_service_fourth_link_target' => "on",
			//Projects Sections
			'home_projects_enabled' => 'on',
			'project_heading_one' => __('Featured Portfolio Projects','health-center-lite'),
			'project_tagline' => __('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','health-center-lite'),
			'project_one_thumb' => $project_img1,
			'project_one_title' => __('Lorem Ipsum','health-center-lite'),
			'project_one_text' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ','health-center-lite'),
			'home_image_one_link'=>"#",
			'home_image_one_link_target'=>true,
		
		    'project_two_thumb' => $project_img2,
			'project_two_title' => __('Postao je popularan','health-center-lite'),
			'project_two_text' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ','health-center-lite'),
			'home_image_two_link'=>"#",
			'home_image_two_link_target'=>true,
			
			'project_three_thumb' => $project_img3,
			'project_three_title' => __('kojekakve promjene s','health-center-lite'),
			'project_three_text' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ','health-center-lite'),
			'home_image_three_link'=>"#",
			'home_image_three_link_target'=>"on",
			
			'project_four_thumb' => $project_img4,
			'project_four_title' => __('kojekakve promjene s','health-center-lite'),
			'project_four_text' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ','health-center-lite'),
			'home_image_four_link'=>"#",
			'home_image_four_link_target'=>"on",
			
			'webrit_custom_css'=>'',			
			'footer_customizations' => __(' @ 2014 health-center-lite Center. All Rights Reserved. Powered by','health-center-lite'),
			'created_by_text' => __('Created by','health-center-lite'),
			'created_by_webriti_text' => __('Webriti','health-center-lite'),
			'created_by_link' => __('http://www.webriti.com','health-center-lite'),
			
			'front_page_data'=>'Service,Project,News,Testimonials,CallOut',
	);
}
?>