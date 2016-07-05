/**
 *	jQuery Scripts
 */
jQuery(document).ready(function($) {

	// Masonry
	var $container = $('.gallery');

	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : 'dl.gallery-item'
		});
	});

	// Responsive Menu
	$('.openresponsivemenu').click(function() {
		$('.navigation-menu').toggleClass("responsivemenu cf");
	});

	// Nivo Lightbox
	$(document).ready(function(){
	    $('a.nivo-lightbox').nivoLightbox();
	});

	// Max height
	var driMaxHeight = function( className ) {

		arrayHeights = [];
		var maxHeight = '';

		jQuery( className ).each( function() {
	    	var height = jQuery( this ).height();
	    	arrayHeights.push( height );
	    	maxHeight = Math.max.apply( null, arrayHeights );
		});

		jQuery( className ).css( "height", maxHeight );

	};
	driMaxHeight( "#content #latest-news .news .info-news" );

});

/**
 *	Limit Menu
 */
var full_width = 0;

jQuery("nav ul:first > li").each(function( index ) {
	if((jQuery(this).width() + full_width) > 900) {
		jQuery(this).remove();
	}
	full_width = full_width + jQuery(this).width();
});