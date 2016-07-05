<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<!-- start content container -->
<div class="row rsrc-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

    <div class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">
     <?php if ( have_posts() ) : ?>
     <?php maxstore_breadcrumb(); ?>
     <h1 class="page-title text-center">
					<?php
						if ( is_category() ) :
							single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'maxstore' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'maxstore' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'maxstore' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'maxstore' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'maxstore' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'maxstore');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'maxstore' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'maxstore' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'maxstore' );

						else :
							_e( 'Archives', 'maxstore' );

						endif;
					?>
				</h1>
    
     <?php while ( have_posts() ) : the_post(); 

            				/* Include the Post-Format-specific template for the content.
            				 * If you want to overload this in a child theme then include a file
            				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            				 */
      			        get_template_part( 'content', get_post_format() );
		

                endwhile; 
                
                    maxstore_pagination();
                     
                else: 

                    get_404_template(); 

           endif; ?>

   </div>

   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>

