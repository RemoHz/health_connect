<?php

////////////////////////////////////////////////////////////////////
// Settig Theme-options
////////////////////////////////////////////////////////////////////
include_once( trailingslashit( get_template_directory() ) . '/lib/plugin-activation.php' );  
include_once( trailingslashit( get_template_directory() ) . '/lib/theme-config.php' );
include_once( trailingslashit( get_template_directory() ) . '/lib/metaboxes.php' );

add_action( 'after_setup_theme', 'maxstore_setup' ); 

if( !function_exists( 'maxstore_setup' ) ) :
function maxstore_setup() {
  // Theme lang
  load_theme_textdomain( 'maxstore', get_template_directory() . '/languages' );
  
  // Add Title Tag Support
  add_theme_support( 'title-tag' );
  
  // Register Menus
  register_nav_menus(
            array(
                'main_menu' => __( 'Main Menu', 'maxstore' ),
            )
  );
  
  
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size(300,300, true);
  add_image_size( 'maxstore-single', 848, 400, true );
  add_image_size( 'maxstore-home-top', 300, 300, true );
  
  add_theme_support( 'automatic-feed-links' );
  
  add_theme_support( 'woocommerce' );
  
  // Display a admin notices
  add_action('admin_notices', 'maxstore_admin_notice');
    function maxstore_admin_notice() {
        global $current_user;
            $user_id = $current_user->ID;
            /* Check that the user hasn't already clicked to ignore the message */
        if ( ! get_user_meta($user_id, 'maxstore_ignore_notice') ) {
            echo '<div class="updated notice-info point-notice" style="position:relative;"><p>'; 
            printf(__('Like MaxStore theme? You will <strong>LOVE MaxStore PRO</strong>! ','maxstore').'<a href="'.esc_url('http://themes4wp.com/product/maxstore-pro/').'" target="_blank">'.__('Click here for all the exciting features.','maxstore').'</a><a href="%1$s" class="dashicons dashicons-dismiss dashicons-dismiss-icon" style="position: absolute; top: 8px; right: 8px; color: #222; opacity: 0.4; text-decoration: none !important;"></a>', '?maxstore_notice_ignore=0');
            echo "</p></div>";
        }
  }

  add_action('admin_init', 'maxstore_notice_ignore');
    function maxstore_notice_ignore() {
        global $current_user;
            $user_id = $current_user->ID;
            /* If user clicks to ignore the notice, add that to their user meta */
            if ( isset($_GET['maxstore_notice_ignore']) && '0' == $_GET['maxstore_notice_ignore'] ) {
                add_user_meta($user_id, 'maxstore_ignore_notice', 'true', true);
        }
  }

  add_action( 'customize_controls_print_footer_scripts', 'maxstore_pro_banner' );
    function maxstore_pro_banner() {
        echo '<a href="'.esc_url('http://themes4wp.com/product/maxstore-pro/').'" id="pro-banner" style="display: none; margin-top: 10px; background: #192429;" target="_blank"><img src="'.get_template_directory_uri().'/img/maxstore-pro.jpg" /></a>';
        echo '<script type="text/javascript">jQuery(document).ready(function($) { $("#pro-banner").appendTo("#customize-info").css("display", "block"); });</script>';
  }
}
endif;


////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
    function maxstore_theme_stylesheets()
    {
        wp_enqueue_style('maxstore-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all' );
        wp_enqueue_style( 'maxstore-stylesheet', get_stylesheet_uri(), array(), '1', 'all' );
        // load Font Awesome css
	      wp_enqueue_style( 'maxstore-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false );
    }
    add_action('wp_enqueue_scripts', 'maxstore_theme_stylesheets');


////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
    function maxstore_theme_js()
    {
        wp_enqueue_script('maxstore-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js',array( 'jquery' ),true );
        wp_enqueue_script('maxstore-theme-js', get_template_directory_uri() . '/js/customscript.js',array( 'jquery' ),true );
    }
    add_action('wp_enqueue_scripts', 'maxstore_theme_js');


////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

    require_once('lib/wp_bootstrap_navwalker.php');
        
////////////////////////////////////////////////////////////////////
// Register Widgets
////////////////////////////////////////////////////////////////////
        
add_action( 'widgets_init', 'maxstore_widgets_init' );

function maxstore_widgets_init() {
        register_sidebar(
            array(
            'name' => __( 'Right Sidebar', 'maxstore' ),
            'id' => 'maxstore-right-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));

        register_sidebar(
            array(
            'name' => __( 'Left Sidebar', 'maxstore' ),
            'id' => 'maxstore-left-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar( 
            array(
            'name'            => __( 'Footer Section', 'maxstore' ),
            'id'              => 'maxstore-footer-area',
            'description'     => __( 'Content Footer Section', 'maxstore' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
              
}
////////////////////////////////////////////////////////////////////
// Register hook and action to set Main content area col-md- width based on sidebar declarations
////////////////////////////////////////////////////////////////////

add_action( 'maxstore_main_content_width_hook', 'maxstore_main_content_width_columns');

function maxstore_main_content_width_columns () {

    $columns = '12';

    if (get_theme_mod( 'rigth-sidebar-check', 1 ) != 0 ) {
        $columns = $columns - esc_attr(get_theme_mod( 'right-sidebar-size', 3 ));
    }

    if (get_theme_mod( 'left-sidebar-check', 0 ) != 0 ) {
        $columns = $columns - esc_attr(get_theme_mod( 'left-sidebar-size', 3 ));
    }

    echo $columns;
}

function maxstore_main_content_width() {
    do_action('maxstore_main_content_width_hook');
}

////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

if ( ! isset( $content_width ) ) $content_width = 800;

////////////////////////////////////////////////////////////////////
// Theme Info page
////////////////////////////////////////////////////////////////////

    if (is_admin()) {
    	require_once(trailingslashit( get_template_directory() ) . '/lib/theme-info.php');
    }
    
////////////////////////////////////////////////////////////////////
// Breadcrumbs
////////////////////////////////////////////////////////////////////
function maxstore_breadcrumb () {
	global $post, $wp_query;
	// schema link
	$home = __('Home', 'maxstore');
	$delimiter = ' &raquo; ';
	$homeLink = home_url();
	if (is_home() || is_front_page()) {
		// no need for breadcrumbs in homepage
	}
	else {
		echo '<div id="breadcrumbs" >';
		echo '<div class="breadcrumbs-inner text-right">';
		// main breadcrumbs lead to homepage
		echo '<span><a href="' . esc_url($homeLink) . '">' . '<i class="fa fa-home"></i><span>' . esc_attr($home) . '</span>' . '</a></span>' . $delimiter . ' ';
		// if blog page exists
		if (get_page_by_path('blog')) {
			if (!is_page('blog')) {
				echo '<span><a href="' . esc_url(get_permalink(get_page_by_path('blog'))) . '">' . '<span>' . _x( 'Blog', 'Breadcrumbs', 'maxstore' ).'</span></a></span>' . $delimiter . ' ';
			}
		}
		if (is_category()) {
			$thisCat = get_category(get_query_var('cat') , false);
			if ($thisCat->parent != 0) {
				$category_link = get_category_link($thisCat->parent);
				echo '<span><a href="' . esc_url($category_link) . '">' . '<span>' . esc_attr(get_cat_name($thisCat->parent)) . '</span>' . '</a></span>' . $delimiter . ' ';
			}
			$category_id = get_cat_ID(single_cat_title('', false));
			$category_link = get_category_link($category_id);
			echo '<span><a href="' . esc_url($category_link) . '">' . '<span>' . esc_attr(single_cat_title('', false)) . '</span>' . '</a></span>';
		}
		elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<span><a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '">' . '<span>' . esc_attr($post_type->labels->singular_name) . '</span>' . '</a></span>';
				echo ' ' . $delimiter . ' ' . get_the_title();
			}
			else {
				$category = get_the_category();
				if ($category) {
					foreach($category as $cat) {
						echo '<span><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . '<span>' . esc_attr($cat->name) . '</span>' . '</a></span>' . $delimiter . ' ';
					}
				}
				echo get_the_title();
			}
		}
		elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search()) {
			$post_type = get_post_type_object(get_post_type());
			echo $post_type->labels->singular_name;
		}
		elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			echo '<span><a href="' . esc_url(get_permalink($parent)) . '">' . '<span>' . esc_attr($parent->post_title) . '</span>' . '</a></span>';
			echo ' ' . $delimiter . ' ' . get_the_title();
		}
		elseif (is_page() && !$post->post_parent) {
			$get_post_slug = $post->post_name;
			$post_slug = str_replace('-', ' ', $get_post_slug);
			echo '<span><a href="' . esc_url(get_permalink()) . '">' . '<span>' . esc_attr(ucfirst($post_slug)) . '</span>' . '</a></span>';
		}
		elseif (is_page() && $post->post_parent) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<span><a href="' . esc_url(get_permalink($page->ID)) . '">' . '<span>' . esc_attr(get_the_title($page->ID)) . '</span>' . '</a></span>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
			}
			echo $delimiter . '<span><a href="' . esc_url(get_permalink()) . '">' . '<span>' . esc_attr(the_title_attribute('echo=0')) . '</span>' . '</a></span>';
		}
		elseif (is_tag()) {
			$tag_id = get_term_by('name', single_cat_title('', false) , 'post_tag');
			if ($tag_id) {
				$tag_link = get_tag_link($tag_id->term_id);
			}
			echo '<span><a href="' . esc_url($tag_link) . '">' . '<span>' . esc_attr(single_cat_title('', false)) . '</span>' . '</a></span>';
		}
		elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo '<span><a href="' . esc_url(get_author_posts_url($userdata->ID)) . '">' . '<span>' . esc_attr($userdata->display_name) . '</span>' . '</a></span>';
		}
		elseif (is_404()) {
			echo __('Error 404', 'maxstore');
		}
		elseif (is_search()) {
			echo __('Search results for ' , 'maxstore') . ' '  . get_search_query();
		}
		elseif (is_day()) {
			echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . esc_attr(get_the_time('Y')) . '</span>' . '</a></span>' . $delimiter . ' ';
			echo '<span><a href="' . esc_url(get_month_link(get_the_time('Y')) , get_the_time('m')) . '">' . '<span>' . esc_attr(get_the_time('F')) . '</span>' . '</a></span>' . $delimiter . ' ';
			echo '<span><a href="' . esc_url(get_day_link(get_the_time('Y')) , get_the_time('m') , get_the_time('d')) . '">' . '<span>' . esc_attr(get_the_time('d')) . '</span>' . '</a></span>';
		}
		elseif (is_month()) {
			echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . esc_attr(get_the_time('Y')) . '</span>' . '</a></span>' . $delimiter . ' ';
			echo '<span><a href="' . esc_url(get_month_link(get_the_time('Y') , get_the_time('m'))) . '">' . '<span>' . esc_attr(get_the_time('F')) . '</span>' . '</a></span>';
		}
		elseif (is_year()) {
			echo '<span><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . '<span>' . esc_attr(get_the_time('Y')) . '</span>' . '</a></span>';
		}
		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
			echo __('Page', 'maxstore') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
		}
		echo '</div></div>';
	}
}

////////////////////////////////////////////////////////////////////
// Display navigation to next/previous pages when applicable
////////////////////////////////////////////////////////////////////
if ( ! function_exists( 'maxstore_content_nav' ) ) :
function maxstore_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<div class="screen-reader-text"><?php _e( 'Post navigation', 'maxstore' ); ?></div>
		<div class="pager">

		<?php if ( is_single() ) : // navigation links for single posts ?>

			<div class="post-navigation row">
        	<div class="post-previous col-md-6"><?php previous_post_link( '%link', '<span class="meta-nav">'. __( 'Previous:', 'maxstore' ).'</span> %title' ); ?></div>
        	<div class="post-next col-md-6"><?php next_post_link( '%link', '<span class="meta-nav">'. __( 'Next:', 'maxstore' ).'</span> %title' ); ?></div>
      </div>

		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

			<?php if ( get_next_posts_link() ) : ?>
			<li class="nav-previous previous btn btn-default"><?php next_posts_link( __( 'Older posts', 'maxstore' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="nav-next next btn btn-default"><?php previous_posts_link( __( 'Newer posts', 'maxstore' ) ); ?></li>
			<?php endif; ?>

		<?php endif; ?>

		</div>
	</nav>
	<?php
}
endif; // content_nav

////////////////////////////////////////////////////////////////////
// Social links
////////////////////////////////////////////////////////////////////
if ( ! function_exists( 'maxstore_social_links' ) ) :
/**
 * This function is for social links display on header
 *
 * Get links through Theme Options
 */
function maxstore_social_links() {
   $twp_social_links = array( 'twp_social_facebook' 	=> __( 'Facebook', 'maxstore' ),
									'twp_social_twitter' 		=> __( 'Twitter', 'maxstore' ),
									'twp_social_google' 	=> __( 'Google-Plus' , 'maxstore' ),
									'twp_social_instagram' 	=> __( 'Instagram', 'maxstore' ),
									'twp_social_pin' 	=> __( 'Pinterest', 'maxstore' ),
									'twp_social_youtube' 		=> __( 'YouTube', 'maxstore' ),
									'twp_social_reddit' 	=> __( 'Reddit', 'maxstore' ),
							 	);
	?>
	<div class="social-links">
		<ul>
		<?php
			$i=0;
			$twp_links_output = '';
			foreach( $twp_social_links as $key => $value ) {
				$link = get_theme_mod( $key , '' );
				if ( !empty( $link ) ) {
					
					$twp_links_output .=
						'<li><a href="'.esc_url( $link ).'" target="_blank"><i class="fa fa-'.strtolower($value).'"></i></a></li>';
				}
				$i++;
			}
			echo $twp_links_output;
		?>
		</ul>
	</div><!-- .social-links -->
	<?php
}
endif;

////////////////////////////////////////////////////////////////////
// Pagination
////////////////////////////////////////////////////////////////////
function maxstore_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => __('&larr; Previous','maxstore' ),
        'next_text' => __('Next &rarr;','maxstore' ),
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="footer-pagination"><ul class="pagination">';
        foreach ($pages as $i => $page) {
            if ($current_page == 1 && $i == 0) {
                echo "<li class='active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='active'>$page</li>";
                } else {
                    echo "<li>$page</li>";
                }
            }
        }
        echo '</ul></div>';
    }
}

////////////////////////////////////////////////////////////////////
// WooCommerce section
////////////////////////////////////////////////////////////////////
if ( class_exists( 'WooCommerce' ) ) {

////////////////////////////////////////////////////////////////////
// WooCommerce header cart
////////////////////////////////////////////////////////////////////
  if ( ! function_exists( 'maxstore_cart_link' ) ) {
  	function maxstore_cart_link() {
  		?>	
  			<a class="cart-contents text-right" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'maxstore' ); ?>">
  				<i class="fa fa-shopping-cart"><span class="count"><?php echo WC()->cart->get_cart_contents_count();?></span></i><span class="amount-title hidden-sm hidden-xs"><?php echo _e( 'Cart ','maxstore' ); ?></span><span class="amount-cart"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> 
  			</a>
  		<?php
  	}
  }
  if ( ! function_exists( 'maxstore_head_wishlist' ) ) {
  	function maxstore_head_wishlist() {
  		if (function_exists('YITH_WCWL')) { 
            $wishlist_url = YITH_WCWL()->get_wishlist_url();
            ?>
            <div class="top-wishlist text-right">
              <a href="<?php echo esc_url($wishlist_url); ?>" title="Wishlist" data-toggle="tooltip">
                <i class="fa fa-heart"><div class="count"><span><?php echo yith_wcwl_count_products(); ?></span></div></i>
              </a>
            </div>
            <?php
            }
  	}
  }
  add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist' );
  add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'maxstore_head_wishlist' );
  
  if ( ! function_exists( 'maxstore_header_cart' ) ) {
  	function maxstore_header_cart() {
  		?>
  		<div class="header-cart text-right col-sm-3 col-xs-8">
  		  <div class="header-cart-inner">
          <?php maxstore_cart_link(); ?>
          <ul class="site-header-cart menu list-unstyled">
        		<li>
        			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
        		</li>
      		</ul>
        </div>
        <?php if ( get_theme_mod( 'wishlist-top-icon', 0 ) != 0)  { echo maxstore_head_wishlist(); }?>
  		</div>
  		<?php
  	}
  }
  if ( ! function_exists( 'maxstore_header_add_to_cart_fragment' ) ) {
    add_filter( 'woocommerce_add_to_cart_fragments', 'maxstore_header_add_to_cart_fragment' );
    function maxstore_header_add_to_cart_fragment( $fragments ) {
    	ob_start();
    	
      maxstore_cart_link();
    	
    	$fragments['a.cart-contents'] = ob_get_clean();
    	
    	return $fragments;
    }
  }
////////////////////////////////////////////////////////////////////
// Change number of products displayed per page
////////////////////////////////////////////////////////////////////  
  add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '. get_theme_mod( 'archive_number_products', 24 ) .';' ), 20 );
////////////////////////////////////////////////////////////////////
// Change number of products per row
////////////////////////////////////////////////////////////////////
  add_filter('loop_shop_columns', 'maxstore_loop_columns');
  if (!function_exists('maxstore_loop_columns')) {
  	function maxstore_loop_columns() {
  		return get_theme_mod( 'archive_number_columns', 4 ); 
  	}
  }
////////////////////////////////////////////////////////////////////
// Redefine wooCommerce related products
////////////////////////////////////////////////////////////////////  
  add_filter( 'woocommerce_output_related_products_args', 'maxstore_related_products_count' );
 
  function maxstore_related_products_count( $args ) {
       $rows = get_theme_mod( 'archive_number_columns', 4 );
       $args['posts_per_page'] = $rows;
       $args['columns'] = $rows;
   
       return $args;
  }
////////////////////////////////////////////////////////////////////
// Archive product wishlist button
////////////////////////////////////////////////////////////////////  
  function maxstore_wishlist_products() {
      if (function_exists('YITH_WCWL')) { 
      global $product;
      $url = add_query_arg( 'add_to_wishlist', $product->id );
      $id = $product->id;
      $wishlist_url = YITH_WCWL()->get_wishlist_url();
           ?>  
  		<div class="add-to-wishlist-custom text-center add-to-wishlist-<?php echo esc_attr($id); ?>">
        <div class="yith-wcwl-add-button show" style="display:block"> <a href="<?php echo esc_url($url); ?>" rel="nofollow" data-product-id="<?php echo esc_attr($id); ?>" data-product-type="simple" class="add_to_wishlist"><?php _e( 'Add to Wishlist', 'maxstore' ); ?></a><img src="<?php echo get_template_directory_uri().'/img/loading.gif'; ?>" class="ajax-loading" alt="loading" width="16" height="16"></div>
        <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback">Added!</span> <a href="<?php echo esc_url($wishlist_url); ?>"><?php _e( 'View Wishlist', 'maxstore' ); ?></a></div>
        <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"><?php _e( 'The product is already in the wishlist!', 'maxstore' ); ?></span> <a href="<?php echo esc_url($wishlist_url); ?>"><?php _e( 'Browse Wishlist', 'maxstore' ); ?></a></div>
        <div class="clear"></div>
        <div class="yith-wcwl-wishlistaddresponse"></div>
      </div>
  		<?php
  		}
  }
  add_action( 'woocommerce_before_shop_loop_item', 'maxstore_wishlist_products', 9 );
////////////////////////////////////////////////////////////////////
// Advanced search functionality
////////////////////////////////////////////////////////////////////

  function maxstore_advanced_search_query($query) {
  
      if($query->is_search()) {
          // category terms search.
          if (isset($_GET['category']) && !empty($_GET['category'])) {
              $query->set('tax_query', array(array(
                  'taxonomy' => 'product_cat',
                  'field' => 'slug',
                  'terms' => array($_GET['category']) )
              ));
          }    
          return $query;
      }
  }
  add_action('pre_get_posts', 'maxstore_advanced_search_query', 1000);  
}
////////////////////////////////////////////////////////////////////
// WooCommerce end
////////////////////////////////////////////////////////////////////
