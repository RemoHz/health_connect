// menu dropdown link clickable
jQuery(document).ready(function( $ ){
 $('.navbar .dropdown > a, .dropdown-menu > li > a').click(function(){
            location.href = this.href;
        });
});

// scroll to top button
jQuery(document).ready(function( $ ){
   $("#back-top").hide();
  	$(function () {
  		$(window).scroll(function () {
  			if ($(this).scrollTop() > 100) {
  				$('#back-top').fadeIn();
  			} else {
  				$('#back-top').fadeOut();
  			}
  		});
  
  		// scroll body to 0px on click
  		$('#back-top a').click(function () {
  			$('body,html').animate({
  				scrollTop: 0
  			}, 800);
  			return false;
  		});
  	});
});
// sidebar height 100%
jQuery(document).ready(function( $ ){
   if($(window).width()>991){
    $(document).ready(function () {
        var column_height = $(".rsrc-main").height();
        var column_height1 = $(".rsrc-right, .rsrc-left").height();
        if (column_height >= column_height1) {
        column_height = column_height + "px";
        $(".rsrc-right, .rsrc-left").css("height",column_height);
        }
    });
    }
});
// Tooltip
jQuery(document).ready(function( $ ){
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
});
// Wishlist count ajax update
jQuery( document ).ready( function($){
    $('body').on( 'added_to_wishlist', function(){
        $('.top-wishlist .count').load( yith_wcwl_plugin_ajax_web_url + ' .top-wishlist span', {action: 'yith_wcwl_update_single_product_list'} );
    } );
} );
