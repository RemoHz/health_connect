
  <div class="wrap">
    <h2><?php echo __( 'HTML Post Editor: Plugin Options', 'hpe' )?></h2>

    <form method="post" action="options.php" id="options_form">
      <?php settings_fields('hpe_options_group') ?>
      
      <?php 
        // get font size from the database or set default if no records yet
      
        $fontSize=$this->hpe_text_opt('font_size');
        if(!$fontSize) $fontSize='14px';
      ?>

      <p class="hpe-option">
        <label for="hpe_options[font_size]"><?php _e('Font Size','hpe') ?></label>&nbsp;
        <input type="text" id="hpe_options[font_size]" name="hpe_options[font_size]" value="<?php echo $fontSize ?>" autofocus />
      </p>
      
      <p class="hpe-option">
        <label for="editor_theme"><?php _e('Editor Theme','hpe') ?></label>&nbsp;
        <select id="editor_theme" name="hpe_options[editor_theme]">
          <option value="init">Select a theme</option>
        </select>
      </p>
      
      <p> <?php submit_button(); ?> </p>
    </form>
  </div>
  