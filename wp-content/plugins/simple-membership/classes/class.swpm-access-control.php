<?php
class SwpmAccessControl {
    private $lastError;
    private $moretags;
    private static $_this;
    private function __construct(){
        $this->lastError = '';
        $this->moretags  = array();
    }
    public static function get_instance(){
        self::$_this = empty(self::$_this)? new SwpmAccessControl():self::$_this;
        return self::$_this;
    }

    public function can_i_read_post($id){
        $this->lastError = '';
        global $post;
        $auth = SwpmAuth::get_instance();
        $protect_everything = SwpmSettings::get_instance()->get_value('protect-everything');
        if(!empty($protect_everything)){ 
            $error_msg = SwpmUtils::_( 'You need to login to view this content. ' ) . SwpmSettings::get_instance()->get_login_link();
            $this->lastError = apply_filters('swpm_not_logged_in_post_msg', $error_msg);
            return false;                       
        }
        $protected = SwpmProtection::get_instance();
        if (!$protected->is_protected($id)){ return true;}        
        if(!$auth->is_logged_in()){
            $error_msg = SwpmUtils::_( 'You need to login to view this content. ' ) . SwpmSettings::get_instance()->get_login_link();
            $this->lastError = apply_filters('swpm_not_logged_in_post_msg', $error_msg);
            return false;            
        }

        if ($auth->is_expired_account()){
            $error_msg = '<div class="swpm-account-expired-msg swpm-yellow-box">'.SwpmUtils::_('Your account has expired. Please renew your account to gain access to this content.').'</div>';
            $this->lastError = apply_filters('swpm_account_expired_msg', $error_msg);
            return false;                        
        }
        $protect_older_posts = apply_filters('swpm_should_protect_older_post', false, $id);
        if ($protect_older_posts){
            $this->lastError = apply_filters ('swpm_restricted_post_msg_older_post', 
                    SwpmUtils::_('This content can only be viewed by members who joined on or before ' . SwpmUtils::get_formatted_date_according_to_wp_settings($post->post_date) ));
            return false;
        }
        $perms = SwpmPermission::get_instance($auth->get('membership_level'));
        if($perms->is_permitted($id)) {return true;}
        $this->lastError = apply_filters ('swpm_restricted_post_msg', '<div class="swpm-no-access-msg">'.SwpmUtils::_('This content is not permitted for your membership level.').'</div>') ;
        return false;
    }
    public function can_i_read_comment($id){
        $this->lastError = '';
        $protected = SwpmProtection::get_instance();
        if (!$protected->is_protected_comment($id)){ return true;}
        $auth = SwpmAuth::get_instance();
        if(!$auth->is_logged_in()){
            $this->lastError = apply_filters('swpm_not_logged_in_comment_msg', SwpmUtils::_("You need to login to view this content. ")
                    . SwpmSettings::get_instance()->get_login_link());
            return false;            
        }
        if ($auth->is_expired_account()){
            $error_msg = '<div class="swpm-account-expired-msg swpm-yellow-box">'.SwpmUtils::_('Your account has expired. Please renew your account to gain access to this content.').'</div>';
            $this->lastError = apply_filters('swpm_account_expired_msg', $error_msg);
            return false;                        
        }        
        $perms = SwpmPermission::get_instance($auth->get('membership_level'));
        if($perms->is_permitted_comment($id)) {return true; }
        $this->lastError = apply_filters ('swpm_restricted_comment_msg', '<div class="swpm-no-access-msg">'.SwpmUtils::_("This content is not permitted for your membership level.").'</div>' );
        return false;
    }
    public function why(){
        return $this->lastError;
    }
    public function filter_post($id,$content){
        if(SwpmUtils::is_first_click_free($content)) {return $content;}
        if(in_array($id, $this->moretags)) {return $content; }
        if($this->can_i_read_post($id)) {return $content; } 
        
        $moretag = SwpmSettings::get_instance()->get_value('enable-moretag');
        if (empty($moretag)){
            return $this->lastError;
        }
        $post = get_post($id);
        $post_segments = explode( '<!--more-->', $post->post_content);

        if (count($post_segments) >= 2){
            if (SwpmAuth::get_instance()->is_logged_in()){
                $error_msg = '<div class="swpm-margin-top-10">' . SwpmUtils::_(" The rest of the content is not permitted for your membership level.") . '</div>';
                $this->lastError = apply_filters ('swpm_restricted_more_tag_msg', $error_msg);
            }
            else {
                $error_msg = '<div class="swpm-margin-top-10">' . SwpmUtils::_("You need to login to view the rest of the content. ") . SwpmSettings::get_instance()->get_login_link() . '</div>';
                $this->lastError = apply_filters('swpm_not_logged_in_more_tag_msg', $error_msg);
            }
            return do_shortcode($post_segments[0]) . $this->lastError;
        }

        return $this->lastError;
    }
    public function filter_comment($parent_post_id,$content){
        if($this->can_i_read_post($parent_post_id)) { return $content; }
        return $this->lastError;
    }
    public function filter_post_with_moretag($id, $more_link, $more_link_text){
        if (SwpmUtils::is_first_click_free($content)) {return $content;}
        $this->moretags[] = $id;
        if($this->can_i_read_post($id)) {
            return $more_link;
        }
        $msg = '<div class="swpm-margin-top-10">'.SwpmUtils::_("You need to login to view the rest of the content. ") . SwpmSettings::get_instance()->get_login_link(). '</div>';
        return apply_filters('swpm_not_logged_in_more_tag_msg', $msg);
    }
}
