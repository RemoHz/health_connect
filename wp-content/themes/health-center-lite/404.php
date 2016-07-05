<?php get_header(); ?>
<!-- HC Page Header Section -->	
<div class="container">
  <div class="row">
    <div class="hc_page_header_area">
      <h1><?php _e('Error 404','health-center-lite'); ?></h1>
    </div>
  </div>
</div>
<!-- /HC Page Header Section -->
<!-- HC 404 Error Section -->	
<div class="container">
  <div class="row">
    <div class="col-md-12 hc_404_error_section">
      <div class="error_404">
        <h2><?php _e('Error 404','health-center-lite'); ?></h2>
        <h4><?php _e('Oops! Page not found','health-center-lite'); ?></h4>
        <p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','health-center-lite'); ?></p>
        <p><a href="<?php echo esc_html(site_url()); ?>" class="error_404_btn"><?php _e('Go to Homepage','health-center-lite'); ?></a></p>
      </div>
    </div>
  </div>
</div>
<!-- /HC 404 Error Section -->
<?php get_footer(); ?>