<?php

class SwpmSettings {

    private static $_this;
    private $settings;
    public $current_tab;
    private $tabs;

    private function __construct() {
        $this->settings = (array) get_option('swpm-settings');
    }

    public function init_config_hooks() {
        $page = filter_input(INPUT_GET, 'page');
//        if($page == 'simple_wp_membership_settings'){
        if (is_admin()) { // for frontend just load settings but dont try to render settings page.
            $tab = filter_input(INPUT_GET, 'tab');
            $tab = empty($tab) ? filter_input(INPUT_POST, 'tab') : $tab;
            $this->current_tab = empty($tab) ? 1 : $tab;
            $this->tabs = array(1 => SwpmUtils::_('General Settings'), 2 => SwpmUtils::_('Payment Settings'),
                3 => SwpmUtils::_('Email Settings'), 4 => SwpmUtils::_('Tools'), 5 => SwpmUtils::_('Advanced Settings'), 6 => SwpmUtils::_('Addons Settings'));
            add_action('swpm-draw-tab', array(&$this, 'draw_tabs'));
            $method = 'tab_' . $this->current_tab;
            if (method_exists($this, $method)) {
                $this->$method();
            }
        }
    }

    private function tab_1() {

        register_setting('swpm-settings-tab-1', 'swpm-settings', array(&$this, 'sanitize_tab_1'));

        //This settings section has no heading
        add_settings_section('swpm-general-post-submission-check', '', array(&$this, 'swpm_general_post_submit_check_callback'), 'simple_wp_membership_settings');

        add_settings_section('swpm-documentation', SwpmUtils::_('Plugin Documentation'), array(&$this, 'swpm_documentation_callback'), 'simple_wp_membership_settings');
        add_settings_section('general-settings', SwpmUtils::_('General Settings'), array(&$this, 'general_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('enable-free-membership', SwpmUtils::_('Enable Free Membership'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'enable-free-membership',
            'message' => SwpmUtils::_('Enable/disable registration for free membership level. When you enable this option, make sure to specify a free membership level ID in the field below.')));
        add_settings_field('free-membership-id', SwpmUtils::_('Free Membership Level ID'), array(&$this, 'textfield_small_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'free-membership-id',
            'message' => SwpmUtils::_('Assign free membership level ID')));
        add_settings_field('enable-moretag', SwpmUtils::_('Enable More Tag Protection'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'enable-moretag',
            'message' => SwpmUtils::_('Enables or disables "more" tag protection in the posts and pages. Anything after the More tag is protected. Anything before the more tag is teaser content.')));
        add_settings_field('hide-adminbar', SwpmUtils::_('Hide Adminbar'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'hide-adminbar',
            'message' => SwpmUtils::_('WordPress shows an admin toolbar to the logged in users of the site. Check this if you want to hide that admin toolbar in the frontend of your site.')));
        add_settings_field('show-adminbar-admin-only', SwpmUtils::_('Show Adminbar to Admin'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'show-adminbar-admin-only',
            'message' => SwpmUtils::_('Use this option if you want to show the admin toolbar to admin users only. The admin toolbar will be hidden for all other users.')));

        add_settings_field('default-account-status', SwpmUtils::_('Default Account Status'), array(&$this, 'selectbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'default-account-status',
            'options' => SwpmUtils::get_account_state_options(),
            'default' => 'active',
            'message' => SwpmUtils::_('Select the default account status for newly registered users. If you want to manually approve the members then you can set the status to "Pending".')));
        add_settings_field('allow-account-deletion', SwpmUtils::_('Allow Account Deletion'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'allow-account-deletion',
            'options' => SwpmUtils::get_account_state_options(),
            'message' => SwpmUtils::_('Allow users to delete their accounts.')));
        add_settings_field('delete-pending-account', SwpmUtils::_('Auto Delete Pending Account'), array(&$this, 'selectbox_callback'), 'simple_wp_membership_settings', 'general-settings', array('item' => 'delete-pending-account',
            'options' => array(0 => 'Do not delete', 1 => 'Older than 1 month', 2 => 'Older than 2 months'),
            'default' => '0',
            'message' => SwpmUtils::_('Select how long you want to keep "pending" account.')));
        /* 
        add_settings_field('protect-everything',  SwpmUtils::_('Protect Everything'),
            array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'general-settings',
            array('item' => 'protect-everything',
            'message'=>SwpmUtils::_('Check this box if you want to protect all posts/pages by default.'))); 
        */

        add_settings_section('pages-settings', SwpmUtils::_('Pages Settings'), array(&$this, 'pages_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('login-page-url', SwpmUtils::_('Login Page URL'), array(&$this, 'textfield_long_callback'), 'simple_wp_membership_settings', 'pages-settings', array('item' => 'login-page-url',
            'message' => ''));
        add_settings_field('registration-page-url', SwpmUtils::_('Registration Page URL'), array(&$this, 'textfield_long_callback'), 'simple_wp_membership_settings', 'pages-settings', array('item' => 'registration-page-url',
            'message' => ''));
        add_settings_field('join-us-page-url', SwpmUtils::_('Join Us Page URL'), array(&$this, 'textfield_long_callback'), 'simple_wp_membership_settings', 'pages-settings', array('item' => 'join-us-page-url',
            'message' => ''));
        add_settings_field('profile-page-url', SwpmUtils::_('Edit Profile Page URL'), array(&$this, 'textfield_long_callback'), 'simple_wp_membership_settings', 'pages-settings', array('item' => 'profile-page-url',
            'message' => ''));
        add_settings_field('reset-page-url', SwpmUtils::_('Password Reset Page URL'), array(&$this, 'textfield_long_callback'), 'simple_wp_membership_settings', 'pages-settings', array('item' => 'reset-page-url',
            'message' => ''));

        add_settings_section('debug-settings', SwpmUtils::_('Test & Debug Settings'), array(&$this, 'testndebug_settings_callback'), 'simple_wp_membership_settings');

        $debug_field_help_text = SwpmUtils::_('Check this option to enable debug logging.');
        $debug_field_help_text .= '<br />- View debug log file by clicking <a href="' . SIMPLE_WP_MEMBERSHIP_URL . '/log.txt" target="_blank">here</a>.';
        $debug_field_help_text .= '<br />- Reset debug log file by clicking <a href="admin.php?page=simple_wp_membership_settings&swmp_reset_log=1" target="_blank">here</a>.';
        add_settings_field('enable-debug', 'Enable Debug', array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'debug-settings', array('item' => 'enable-debug',
            'message' => $debug_field_help_text));
        add_settings_field('enable-sandbox-testing', SwpmUtils::_('Enable Sandbox Testing'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'debug-settings', array('item' => 'enable-sandbox-testing',
            'message' => SwpmUtils::_('Enable this option if you want to do sandbox payment testing.')));
    }

    private function tab_2() {

    }

    private function tab_3() {
        //Show settings updated message when it is updated
        if (isset($_REQUEST['settings-updated'])) {
            echo '<div id="message" class="updated fade"><p>' . SwpmUtils::_('Settings updated!') . '</p></div>';
        }
        
        register_setting('swpm-settings-tab-3', 'swpm-settings', array(&$this, 'sanitize_tab_3'));
        
        add_settings_section('email-misc-settings', SwpmUtils::_('Email Misc. Settings'), array(&$this, 'email_misc_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('email-misc-from', SwpmUtils::_('From Email Address'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'email-misc-settings', array('item' => 'email-from',
            'message' => 'This value will be used as the sender\'s address for the emails. Example value: Your Name &lt;sales@your-domain.com&gt;'));

        add_settings_section('reg-prompt-email-settings', SwpmUtils::_('Email Settings (Prompt to Complete Registration )'), array(&$this, 'reg_prompt_email_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('reg-prompt-complete-mail-subject', SwpmUtils::_('Email Subject'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'reg-prompt-email-settings', array('item' => 'reg-prompt-complete-mail-subject',
            'message' => ''));
        add_settings_field('reg-prompt-complete-mail-body', SwpmUtils::_('Email Body'), array(&$this, 'textarea_callback'), 'simple_wp_membership_settings', 'reg-prompt-email-settings', array('item' => 'reg-prompt-complete-mail-body',
            'message' => ''));

        add_settings_section('reg-email-settings', SwpmUtils::_('Email Settings (Registration Complete)'), array(&$this, 'reg_email_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('reg-complete-mail-subject', SwpmUtils::_('Email Subject'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'reg-email-settings', array('item' => 'reg-complete-mail-subject',
            'message' => ''));
        add_settings_field('reg-complete-mail-body', SwpmUtils::_('Email Body'), array(&$this, 'textarea_callback'), 'simple_wp_membership_settings', 'reg-email-settings', array('item' => 'reg-complete-mail-body',
            'message' => ''));
        add_settings_field('enable-admin-notification-after-reg', SwpmUtils::_('Send Notification to Admin'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'reg-email-settings', array('item' => 'enable-admin-notification-after-reg',
            'message' => SwpmUtils::_('Enable this option if you want the admin to receive a notification when a member registers.')));
        add_settings_field('admin-notification-email', SwpmUtils::_('Admin Email Address'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'reg-email-settings', array('item' => 'admin-notification-email',
            'message' => SwpmUtils::_('Enter the email address where you want the admin notification email to be sent to.')));
        add_settings_field('enable-notification-after-manual-user-add', SwpmUtils::_('Send Email to Member When Added via Admin Dashboard'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'reg-email-settings', array('item' => 'enable-notification-after-manual-user-add',
            'message' => ''));

        add_settings_section('reset-password-settings', SwpmUtils::_('Email Settings (Password Reset)'), array(&$this, 'reset_password_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('reset-mail-subject', SwpmUtils::_('Email Subject'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'reset-password-settings', array('item' => 'reset-mail-subject', 'message' => ''));
        add_settings_field('reset-mail-body', SwpmUtils::_('Email Body'), array(&$this, 'textarea_callback'), 'simple_wp_membership_settings', 'reset-password-settings', array('item' => 'reset-mail-body', 'message' => ''));


        add_settings_section('upgrade-email-settings', SwpmUtils::_(' Email Settings (Account Upgrade Notification)'), array(&$this, 'upgrade_email_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('upgrade-complete-mail-subject', SwpmUtils::_('Email Subject'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'upgrade-email-settings', array('item' => 'upgrade-complete-mail-subject', 'message' => ''));
        add_settings_field('upgrade-complete-mail-body', SwpmUtils::_('Email Body'), array(&$this, 'textarea_callback'), 'simple_wp_membership_settings', 'upgrade-email-settings', array('item' => 'upgrade-complete-mail-body', 'message' => ''));

        add_settings_section('bulk-activate-email-settings', SwpmUtils::_(' Email Settings (Bulk Account Activate Notification)'), array(&$this, 'bulk_activate_email_settings_callback'), 'simple_wp_membership_settings');
        add_settings_field('bulk-activate-notify-mail-subject', SwpmUtils::_('Email Subject'), array(&$this, 'textfield_callback'), 'simple_wp_membership_settings', 'bulk-activate-email-settings', array('item' => 'bulk-activate-notify-mail-subject', 'message' => ''));
        add_settings_field('bulk-activate-notify-mail-body', SwpmUtils::_('Email Body'), array(&$this, 'textarea_callback'), 'simple_wp_membership_settings', 'bulk-activate-email-settings', array('item' => 'bulk-activate-notify-mail-body', 'message' => ''));
        
    }

    private function tab_4() {

    }

    private function tab_5() {
        //Show settings updated message when it is updated
        if (isset($_REQUEST['settings-updated'])) {
            echo '<div id="message" class="updated fade"><p>' . SwpmUtils::_('Settings updated!') . '</p></div>';
        }
        
        register_setting('swpm-settings-tab-5', 'swpm-settings', array(&$this, 'sanitize_tab_5'));

        add_settings_section('advanced-settings', SwpmUtils::_('Advanced Settings'), array(&$this, 'advanced_settings_callback'), 'simple_wp_membership_settings');

        add_settings_field('enable-expired-account-login', SwpmUtils::_('Enable Expired Account Login'), array(&$this, 'checkbox_callback'), 'simple_wp_membership_settings', 'advanced-settings', array('item' => 'enable-expired-account-login',
            'message' => SwpmUtils::_("When enabled, expired members will be able to log into the system but won't be able to view any protected content. This allows them to easily renew their account by making another payment.")));
    }

    private function tab_6() {

    }

    public static function get_instance() {
        self::$_this = empty(self::$_this) ? new SwpmSettings() : self::$_this;
        return self::$_this;
    }

    public function selectbox_callback($args) {
        $item = $args['item'];
        $options = $args['options'];
        $default = $args['default'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $selected = esc_attr($this->get_value($item), $default);
        echo "<select name='swpm-settings[" . $item . "]' >";
        foreach ($options as $key => $value) {
            $is_selected = ($key == $selected) ? 'selected="selected"' : '';
            echo '<option ' . $is_selected . ' value="' . esc_attr($key) . '">' . esc_attr($value) . '</option>';
        }
        echo '</select>';
        echo '<br/><i>' . $msg . '</i>';
    }

    public function checkbox_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $is = esc_attr($this->get_value($item));
        echo "<input type='checkbox' $is name='swpm-settings[" . $item . "]' value=\"checked='checked'\" />";
        echo '<br/><i>' . $msg . '</i>';
    }

    public function textarea_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $text = esc_attr($this->get_value($item));
        echo "<textarea name='swpm-settings[" . $item . "]'  rows='6' cols='60' >" . $text . "</textarea>";
        echo '<br/><i>' . $msg . '</i>';
    }

    public function textfield_small_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-settings[" . $item . "]'  size='5' value='" . $text . "' />";
        echo '<br/><i>' . $msg . '</i>';
    }

    public function textfield_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-settings[" . $item . "]'  size='50' value='" . $text . "' />";
        echo '<br/><i>' . $msg . '</i>';
    }

    public function textfield_long_callback($args) {
        $item = $args['item'];
        $msg = isset($args['message']) ? $args['message'] : '';
        $text = esc_attr($this->get_value($item));
        echo "<input type='text' name='swpm-settings[" . $item . "]'  size='100' value='" . $text . "' />";
        echo '<br/><i>' . $msg . '</i>';
    }

    public function swpm_documentation_callback() {
        ?>
        <div style="background: none repeat scroll 0 0 #FFF6D5;border: 1px solid #D1B655;color: #3F2502;margin: 10px 0;padding: 5px 5px 5px 10px;text-shadow: 1px 1px #FFFFFF;">
            <p>Visit the
                <a target="_blank" href="https://simple-membership-plugin.com/">Simple Membership Plugin Site</a>
                to read setup and configuration documentation. Please <a href="https://wordpress.org/support/view/plugin-reviews/simple-membership?filter=5" target="_blank">give us a rating</a> if you like the plugin.
            </p>
        </div>
        <?php
    }

    public function swpm_general_post_submit_check_callback() {
        //Log file reset handler
        if (isset($_REQUEST['swmp_reset_log'])) {
            if (SwpmLog::reset_swmp_log_files()) {
                echo '<div id="message" class="updated fade"><p>Debug log files have been reset!</p></div>';
            } else {
                echo '<div id="message" class="updated fade"><p>Debug log files could not be reset!</p></div>';
            }
        }

        //Show settings updated message
        if (isset($_REQUEST['settings-updated'])) {
            echo '<div id="message" class="updated fade"><p>' . SwpmUtils::_('Settings updated!') . '</p></div>';
        }
    }

    public function general_settings_callback() {
        SwpmUtils::e('General Plugin Settings.');
    }

    public function pages_settings_callback() {
        SwpmUtils::e('Page Setup and URL Related settings.');
    }

    public function testndebug_settings_callback() {
        SwpmUtils::e('Testing and Debug Related Settings.');
    }

    public function reg_email_settings_callback() {
        SwpmUtils::e('This email will be sent to your users when they complete the registration and become a member.');
    }

    public function reset_password_settings_callback() {
        SwpmUtils::e('This email will be sent to your users when they use the password reset functionality.');
    }

    public function email_misc_settings_callback() {
        SwpmUtils::e('Settings in this section apply to all emails.');
    }

    public function upgrade_email_settings_callback() {
        SwpmUtils::e('This email will be sent to your users after account upgrade (when an existing member pays for a new membership level).');
    }

    public function bulk_activate_email_settings_callback() {
        SwpmUtils::e('This email will be sent to your members when you use the bulk account activate and notify action.');
    }
    
    public function reg_prompt_email_settings_callback() {
        SwpmUtils::e('This email will be sent to prompt users to complete registration after the payment.');
    }

    public function advanced_settings_callback() {
        SwpmUtils::e('This page allows you to configure some advanced features of the plugin.');
    }

    public function sanitize_tab_1($input) {
        if (empty($this->settings)) {
            $this->settings = (array) get_option('swpm-settings');
        }
        $output = $this->settings;
        //general settings block

        $output['hide-adminbar'] = isset($input['hide-adminbar']) ? esc_attr($input['hide-adminbar']) : "";
        $output['show-adminbar-admin-only'] = isset($input['show-adminbar-admin-only']) ? esc_attr($input['show-adminbar-admin-only']) : "";
        
        $output['protect-everything'] = isset($input['protect-everything']) ? esc_attr($input['protect-everything']) : "";
        $output['enable-free-membership'] = isset($input['enable-free-membership']) ? esc_attr($input['enable-free-membership']) : "";
        $output['enable-moretag'] = isset($input['enable-moretag']) ? esc_attr($input['enable-moretag']) : "";
        $output['enable-debug'] = isset($input['enable-debug']) ? esc_attr($input['enable-debug']) : "";
        $output['enable-sandbox-testing'] = isset($input['enable-sandbox-testing']) ? esc_attr($input['enable-sandbox-testing']) : "";
        $output['allow-account-deletion'] = isset($input['allow-account-deletion']) ? esc_attr($input['allow-account-deletion']) : "";

        $output['free-membership-id'] = ($input['free-membership-id'] != 1) ? absint($input['free-membership-id']) : '';
        $output['login-page-url'] = esc_url($input['login-page-url']);
        $output['registration-page-url'] = esc_url($input['registration-page-url']);
        $output['profile-page-url'] = esc_url($input['profile-page-url']);
        $output['reset-page-url'] = esc_url($input['reset-page-url']);
        $output['join-us-page-url'] = esc_url($input['join-us-page-url']);
        $output['default-account-status'] = esc_attr($input['default-account-status']);
        $output['delete-pending-account'] = isset($input['delete-pending-account']) ? esc_attr($input['delete-pending-account']) : 0;
        
        return $output;
    }

    public function sanitize_tab_3($input) {
        if (empty($this->settings)) {
            $this->settings = (array) get_option('swpm-settings');
        }
        $output = $this->settings;
        $output['reg-complete-mail-subject'] = sanitize_text_field($input['reg-complete-mail-subject']);
        $output['reg-complete-mail-body'] = wp_kses_data(force_balance_tags($input['reg-complete-mail-body']));

        $output['reset-mail-subject'] = sanitize_text_field($input['reset-mail-subject']);
        $output['reset-mail-body'] = wp_kses_data(force_balance_tags($input['reset-mail-body']));

        $output['upgrade-complete-mail-subject'] = sanitize_text_field($input['upgrade-complete-mail-subject']);
        $output['upgrade-complete-mail-body'] = wp_kses_data(force_balance_tags($input['upgrade-complete-mail-body']));

        $output['bulk-activate-notify-mail-subject'] = sanitize_text_field($input['bulk-activate-notify-mail-subject']);
        $output['bulk-activate-notify-mail-body'] = wp_kses_data(force_balance_tags($input['bulk-activate-notify-mail-body']));

        $output['reg-prompt-complete-mail-subject'] = sanitize_text_field($input['reg-prompt-complete-mail-subject']);
        $output['reg-prompt-complete-mail-body'] = wp_kses_data(force_balance_tags($input['reg-prompt-complete-mail-body']));
        $output['email-from'] = trim($input['email-from']);
        $output['enable-admin-notification-after-reg'] = isset($input['enable-admin-notification-after-reg']) ? esc_attr($input['enable-admin-notification-after-reg']) : "";
        $output['admin-notification-email'] = sanitize_email($input['admin-notification-email']);
        $output['enable-notification-after-manual-user-add'] = isset($input['enable-notification-after-manual-user-add']) ? esc_attr($input['enable-notification-after-manual-user-add']) : "";

        return $output;
    }

    public function sanitize_tab_5($input) {
        if (empty($this->settings)) {
            $this->settings = (array) get_option('swpm-settings');
        }
        $output = $this->settings;
        $output['enable-expired-account-login'] = isset($input['enable-expired-account-login']) ? esc_attr($input['enable-expired-account-login']) : "";

        return $output;
    }

    public function get_value($key, $default = "") {
        if (isset($this->settings[$key])) {
            return $this->settings[$key];
        }
        return $default;
    }

    public function set_value($key, $value) {
        $this->settings[$key] = $value;
        return $this;
    }

    public function save() {
        update_option('swpm-settings', $this->settings);
    }

    public function draw_tabs() {
        $current = $this->current_tab;
        ?>
        <h2 class="nav-tab-wrapper">
            <?php foreach ($this->tabs as $id => $label): ?>
                <a class="nav-tab <?php echo ($current == $id) ? 'nav-tab-active' : ''; ?>" href="admin.php?page=simple_wp_membership_settings&tab=<?php echo $id ?>"><?php echo $label ?></a>
            <?php endforeach; ?>
        </h2>
        <?php
    }

    public function get_login_link() {
        $login = $this->get_value('login-page-url');
        $joinus = $this->get_value('join-us-page-url');
        if (empty($login) || empty($joinus)) {
            return '<span style="color:red;">Simple Membership is not configured correctly.'
                    . 'Please contact <a href="mailto:' . get_option('admin_email') . '">Admin</a>';
        }
        return SwpmUtils::_('Please') . ' <a class="swpm-login-link" href="' . $login . '">' . SwpmUtils::_('Login') . '</a>. ' . SwpmUtils::_('Not a Member?') . ' <a href="' . $joinus . '">' . SwpmUtils::_('Join Us') . '</a>';
    }

}
