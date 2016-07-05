<?php

/**
 * Description of SwpmCaptcha
 *
 */
class SwpmCaptcha {

    public function __construct() {
        if (class_exists('SimpleWpMembership')) {
            add_action('swpm_addon_settings_section', array(&$this, 'settings_ui'));
            add_action('swpm_addon_settings_save', array(&$this, 'settings_save'));
            add_filter('swpm_before_registration_submit_button', array($this, 'add_recaptcha_code'));
            add_filter('swpm_validate_registration_form_submission', array($this, 'validate_recaptcha_code'));
        }
    }

    public function settings_ui() {
        $settings = SwpmSettings::get_instance();
        $enable_captcha = $settings->get_value('swpm-addon-enable-captcha');
        $google_recaptcha_site_key = $settings->get_value('swpm-addon-google-recaptcha-site-key');
        $google_recaptcha_secret_key = $settings->get_value('swpm-addon-google-recaptcha-secret-key');
        require_once (SWPM_CAPTCHA_PATH . 'views/settings.php');
    }

    public function settings_save() {
        $message = array('succeeded' => true, 'message' => SwpmUtils::_('Updated! '));
        SwpmTransfer::get_instance()->set('status', $message);
        $enable_captcha = filter_input(INPUT_POST, 'swpm-addon-enable-captcha');
        $site_key = filter_input(INPUT_POST, 'swpm-addon-google-recaptcha-site-key');
        $secret_key = filter_input(INPUT_POST, 'swpm-addon-google-recaptcha-secret-key');
        $settings = SwpmSettings::get_instance();
        $settings->set_value('swpm-addon-enable-captcha', empty($enable_captcha) ? "" : $enable_captcha);
        $settings->set_value('swpm-addon-google-recaptcha-site-key', sanitize_text_field($site_key));
        $settings->set_value('swpm-addon-google-recaptcha-secret-key', sanitize_text_field($secret_key));
        $settings->save();
    }

    public function add_recaptcha_code($output) {        
        $settings = SwpmSettings::get_instance();
        $enabled = $settings->get_value('swpm-addon-enable-captcha');
        if (empty($enabled)) {
            return $output;
        }

        $captcha_css = '<style type="text/css">';
        $captcha_css .= '@media screen and (max-width: 375px) {
            .swpm_g_captcha{transform:scale(0.77);transform-origin:0;-webkit-transform:scale(0.77);-webkit-transform-origin:0 0;}
        }';//For small screen devices
        $captcha_css .= '</style>';
        
        $siteKey = $settings->get_value('swpm-addon-google-recaptcha-site-key');
        $output = '<div class="swpm-recaptcha-section" style="margin-bottom: 15px;">';
        $output .= $captcha_css;//Add the captcha specific CSS to the output
        $output .= '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
        $output .= '<div class="swpm_g_captcha">';        
        $output .= '<div class="g-recaptcha" data-sitekey="' . $siteKey . '"></div>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

    public function validate_recaptcha_code($output) {

        $settings = SwpmSettings::get_instance();
        $enabled = $settings->get_value('swpm-addon-enable-captcha');
        if (empty($enabled)) {
            return $output;
        }
        
        $output = '';
        // Was there a reCAPTCHA response?
        if (isset($_REQUEST["g-recaptcha-response"])) { //recaptcha option was checked/enabled
            require_once(SWPM_CAPTCHA_PATH . 'libs/autoload.php');
            $secret = $settings->get_value('swpm-addon-google-recaptcha-secret-key');
            
            //Initialize captcha object            
            $reCaptcha = new \ReCaptcha\ReCaptcha($secret);
            
            $resp = $reCaptcha->verify($_REQUEST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);
            if ($resp->isSuccess()){//valid reCAPTCHA response
                $output = '';
            }else{
                $output = 'captcha error';
            }
        }
        return $output;
    }

}
