<?php
/*
Plugin Name: Simple Membership Google recaptcha
Version: v1.3
Plugin URI: https://simple-membership-plugin.com/simple-membership-and-google-recaptcha-integration/
Author: smp7, wp.insider
Author URI: https://simple-membership-plugin.com/
Description: This addon allows you to add Google reCAPTCHA to your membership registration form/page. 
*/

//Direct access to this file is not permitted
if (!defined('ABSPATH'))exit; //Exit if accessed directly

define('SWPM_CAPTCHA_VER', '1.3');
define('SWPM_CAPTCHA_SITE_HOME_URL', home_url());
define('SWPM_CAPTCHA_PATH', dirname(__FILE__) . '/');
define('SWPM_CAPTCHA_URL', plugins_url('', __FILE__));
define('SWPM_CAPTCHA_DIRNAME', dirname(plugin_basename(__FILE__)));
require_once ('classes/class.swpm-captcha.php');

add_action('plugins_loaded', "swpm_captcha_plugins_loaded");

function swpm_captcha_plugins_loaded() {
    new SwpmCaptcha();
}
