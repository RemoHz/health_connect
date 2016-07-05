<?php
/**
 * @package HTML Post Editor
 * @version 1.0
 */
/*
Plugin Name: HTML Post Editor
Description: Adds HTML tab to the post editor which shows the raw source of the page and is highlighted with the Ace Editor
Version: 1.0.0
Author: mortalis
*/

class HTMLPostEditor {
	
	public function __construct() {
    add_action('admin_init', array($this,'hpe_options_init'));
    add_action('admin_menu', array($this,'hpe_add_options_page'));
    add_action('admin_enqueue_scripts', array($this,'hpe_scripts'));
  }
  
  /*
   * Registers plugins options to store them in the 'hpe_options' record of the wp_options table
   * Assign validation function for option fields
   */
  public function hpe_options_init(){
    register_setting('hpe_options_group', 'hpe_options', array($this,'hpe_options_validate'));
  }
  
  /*
   * Adds menu item under Settings
   * Assigns function which outputs the options page markup
   */
  public function hpe_add_options_page() {
    add_options_page('HTML Post Editor', 'HTML Post Editor', 'manage_options', 'html-post-editor', array($this,'hpe_options_do_page'));
  }
  
  /*
   * Outputs the options page markup
   */
  public function hpe_options_do_page() {
    include_once(plugin_dir_path(__FILE__).'options.php');
  }
  
  /*
   * Gets plugin options from the database
   * Creates inline script to pass the options to the 'options.js' and 'editor.js' scripts
   * Includes styles and scripts for options page and edit post page separately
   *
   * @param string $hook Identifies the current admin page
   */
  public function hpe_scripts($hook) {
    $hooks=array(
      'post.php',
      'post-new.php',
      'settings_page_html-post-editor',
    );
    
    if(in_array($hook, $hooks)){
      $font_size='14';
      $editor_theme='ace/theme/sublime';
      
      $hpe_options=get_option('hpe_options');
      if($hpe_options){
        $font_size=$hpe_options['font_size'];
        $editor_theme=$hpe_options['editor_theme'];
      }
      
      ?>
        <script>
          var ace_font_size='<?php echo $font_size; ?>';
          var ace_editor_theme='<?php echo $editor_theme; ?>';
        </script>
      <?php
    }
    
    if($hook=='settings_page_html-post-editor'){
      wp_enqueue_style('hpe-options' , plugins_url('css/options.css', __FILE__));
      wp_enqueue_script('ace_js_options', plugins_url('/ace-min/ace.js', __FILE__), '', '1.0', true);
      wp_enqueue_script('ace_themelist', plugins_url('/ace-min/ext-themelist.js', __FILE__), array('ace_js_options'), '1.0.0', true);
      wp_enqueue_script('hpe-options', plugins_url('js/options.js', __FILE__), array('ace_js_options'), '1.0.0', true);
    }
    
    if ($hook == 'post-new.php' || $hook == 'post.php') {
      wp_enqueue_style('ui-theme' , plugins_url('/css/jquery-ui.min.css', __FILE__));
      wp_enqueue_style('hpe-editor' , plugins_url('/css/editor.css', __FILE__));
      
      wp_enqueue_script('jquery-ui-resizable');
      
      wp_enqueue_script('emmet_js', plugins_url('/js/emmet.min.js', __FILE__), '', '1.0', true);
      wp_enqueue_script('beautify', plugins_url('/js/beautify-html.min.js', __FILE__), array('jquery'), '1.1', true);
      wp_enqueue_script('ace_theme', plugins_url('/js/theme-sublime.js', __FILE__), array('ace_js'), '1.0.0', true);
    
      wp_enqueue_script('ace_js', plugins_url('/ace-min/ace.js', __FILE__), '', '1.0', true);
      wp_enqueue_script('ace_emmet', plugins_url('/ace-min/ext-emmet.js', __FILE__), array('ace_js'), '1.0.0', true);
      
      wp_enqueue_script('html_editor', plugins_url('editor.min.js', __FILE__), array('ace_js'), '1.1', true);
    }
  }
  
  /*
   * Validates and sanitizes options page fields
   *
   * @param array $input Array of fields submitted with the options form
   * @return array Sanitized $input array
   */
  public function hpe_options_validate($input) {
    $input['font_size'] = sanitize_text_field($input['font_size']);
    $input['editor_theme'] = sanitize_text_field($input['editor_theme']);
    
    return $input;
  }

  /*
   * Sanitizes text options from the database
   *
   * @param string $name Option name
   * @return string Sanitized option value
   */
  public function hpe_text_opt($name){
    return sanitize_text_field($this->hpe_opt($name));
  }

  /*
   * Gets option value from the database by its name
   *
   * @param string $name Option name
   * @return string Option value or false if no option
   */
  public function hpe_opt($name){
    $options = get_option('hpe_options');
    if($options && isset($options[$name]))
      return $options[$name];
    return false;
  }
  
}

// Entry point

if (is_admin()){
  new HTMLPostEditor();
}
