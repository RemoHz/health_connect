<?php if ( post_password_required() ) : ?>
<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'health-center-lite' ); ?></p>
<?php return; endif; ?>
<?php if ( have_comments() ) : ?>
<div class="hc_comment_section">
  <div class="hc_comment_title">
    <h3><i class="fa fa-comments"></i><?php echo comments_number( 'No Comments','1 Comment','% Comments'); ?></h3>
  </div>
  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
  <?php endif;  ?>
  <?php wp_list_comments( array( 'callback' => 'webriit_hc_comment' ) ); ?>
</div>
<!-- comment_mn -->
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
<nav id="comment-nav-below">
  <h1 class="assistive-text"><?php _e( 'Comment navigation', 'health-center-lite' ); ?></h1>
  <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'health-center-lite' ) ); ?></div>
  <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'health-center-lite' ) ); ?></div>
</nav>
<?php endif;  ?>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
  _e("Comments Are Closed!!!",'health-center-lite'); ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be",'health-center-lite'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'health-center-lite'); ?></a> <?php _e("to post a comment",'health-center-lite'); ?></p>
<?php else : ?>
<div class="hc_comment_form_section">
  <?php  
    $fields=array(
    'author' => '<div class="hc_form_group"><label>'.__('Name','health-center-lite'),'<small>*</small></label><input class="hc_con_input_control" name="author" id="author" value="" type="text"/></div>',
    'email' => '<div class="hc_form_group"><label>'.__('Email','health-center-lite'),'<small>*<small></label><input class="hc_con_input_control" name="email" id="email" value=""   type="email" ></div>',
    'website' => '<div class="hc_form_group"><label>'.__('Website','health-center-lite'),'</label><input class="hc_con_input_control" name="website" id="website" value=""   type="text" ><br/></div>',
    );
    function my_fields($fields) { 
    return $fields;
    }
    add_filter('comment_form_default_fields','my_fields');
    $defaults = array(
    'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'=> '<div class="hc_form_group"><label>Comment</label>
    <textarea id="comments" rows="5" class="hc_con_textarea_control" name="comment" type="text"></textarea></div>',		
    'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'health-center-lite' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__(" Log out?",'health-center-lite').'</a>' . '</p>',
    'id_submit'=> 'hc_btn',
    'label_submit'=>__( 'Post Comment','health-center-lite'),
    'comment_notes_after'=> '',
    'title_reply'=> '<h2><i class="fa fa-mail-forward"></i>&nbsp;'.__( 'Leave a Reply','health-center-lite').'</h2>',
    'id_form'=> 'action'
    );
    comment_form($defaults); ?>						
</div>
<?php endif; ?>
<?php endif; ?>