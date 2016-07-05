<div class="wrap">
    
    <h1><?php echo SwpmUtils::_('Simple WP Membership::Settings') ?></h1>

    <?php do_action("swpm-draw-tab"); ?>
    <form action="options.php" method="POST">
        <input type="hidden" name="tab" value="<?php echo $current_tab; ?>" />
        <?php settings_fields('swpm-settings-tab-' . $current_tab); ?>
        <?php do_settings_sections('simple_wp_membership_settings'); ?>
        <?php submit_button(); ?>
    </form>
</div>
