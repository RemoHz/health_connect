<?php
  // code for comment
  if ( ! function_exists( 'webriit_hc_comment' ) ) :
  function webriit_hc_comment( $comment, $args, $depth ) 
  {
  	$GLOBALS['comment'] = $comment;
  	//get theme data
  	global $comment_data;
  	//translations
  	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','health-center-lite'); ?>	
<div class="media hc_comment_box">
  <a class="pull_left_comment">
  <?php echo get_avatar($comment,$size = '60'); ?>
  </a>
  <div class="media-body">
    <div class="hc_comment_detail">
      <h4 class="hc_comment_detail_title"><?php the_author(); ?><span><?php comment_date('F j, Y'); ?>&nbsp;<?php _e('at','health-center-lite'); ?>&nbsp;<?php comment_time('g:i a'); ?></span></h4>
      <p><?php comment_text(); ?></p>
      <div class="reply"><i class="fa fa-mail-forward"></i>&nbsp;<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'health-center-lite' ); ?></em>
      <br/>
      <?php endif; ?>			
    </div>
  </div>
</div>
<?php
  }
  endif;
  add_filter('get_avatar','hc_add_gravatar_class');
  function hc_add_gravatar_class($class) {
      $class = str_replace("class='avatar", "class='comment_img", $class);
      return $class;
  }
  ?>