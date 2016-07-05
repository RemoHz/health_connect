<?php

/**
 *	Posts Link Attributes Prev
 */
function medica_lite_posts_link_attributes_prev() {
    return 'class="left-navigation"';
}
add_filter('next_posts_link_attributes', 'medica_lite_posts_link_attributes_prev');

/**
 *	Posts Link Attributes Next
 */
function medica_lite_posts_link_attributes_next() {
    return 'class="right-navigation"';
}
add_filter('previous_posts_link_attributes', 'medica_lite_posts_link_attributes_next');

/**
 *	Posts Link Next Class
 */
function medica_lite_posts_link_next_class($format){
     $format = str_replace('href=', 'class="next-post" href=', $format);
     return $format;
}
add_filter('next_post_link', 'medica_lite_posts_link_next_class');

/**
 *	Posts Link Prev Class
 */
function medica_lite_posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="previous-post" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'medica_lite_posts_link_prev_class');

/**
 *	Comments
 */
if ( ! function_exists( 'medica_lite_comments' ) ) :

function medica_lite_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'medica-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'medica-lite' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment cf">
            <?php echo get_avatar( $comment, 120 ); ?>
            <div class="comment-entry">
                <div class="comment-entry-head">
                    <?php printf( __( '<span>%s</span>', 'medica-lite' ), sprintf( '%s', get_comment_author_link() ) ); ?> -
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-entry-head-date">
                        <time pubdate datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( __( '%1$s at %2$s', 'medica-lite' ), get_comment_date(), get_comment_time() ); ?>
                        </time>
                    </a><!--/a .comment-entry-head-date-->
                    <?php edit_comment_link( __( 'Edit', 'medica-lite' ), '- ' ); ?>
                </div><!--/div .comment-entry-head-->
                <div class="comment-entry-content">
                    <?php comment_text(); ?>
                </div><!--/div .comment-entry-content-->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="awaiting-moderation cf"><?php _e( 'Your comment is awaiting moderation.', 'medica-lite' ); ?></em><br />
                <?php endif; ?>
                <div class="coment-reply-link-div cf">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!--/div .coment-reply-link-div-->
            </div><!--/div .comment-entry-->
        </article><!--/article-->

    <?php
            break;
    endswitch;
}
endif;

/**
 *  Post Gallery
 */
add_filter('post_gallery', 'medica_lite_post_gallery', 10, 2);
function medica_lite_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';
    // Here's your actual output, you may customize it to your need
    $output = "<div id='custom-gallery gallery-". $post->ID ."' class='gallery galleryid-". $post->ID ." gallery-columns-". $columns ."'>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<dl class='gallery-item gallery-columns-". $columns ."'>";
        $output .= "<a href=\"{$img[0]}\" rel='post-". $post->ID ."' class=\"nivo-lightbox\" data-lightbox-gallery='". $post->ID ."' title='". $attachment->post_excerpt ."'>\n";
        $output .= "<div class='gallery-item-thumb'><img src=\"{$img[0]}\" alt='". $attachment->post_excerpt ."' /></div>\n";
        $output .= "<div class='wp-caption-text'>";
        $output .= $attachment->post_excerpt;
        $output .= "</div>";
        $output .= "</a>\n";
        $output .= "</dl>";
    }

    $output .= "</div>\n";

    return $output;
}

/**
 *  Excerpt Limit
 */
function excerpt_limit($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

/**
 *  Content Limit
 */
function content_limit($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

?>