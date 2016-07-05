jQuery(document).ready(function() {

	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/medica-lite" class="button" target="_blank">'+ medica_lite_buttons.review +'</a>' );
	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 5px auto 20px auto; display: block; text-align: center;" href="https://themeisle.com/documentation-medica-lite" class="button" target="_blank">'+ medica_lite_buttons.doc +'</a>' );
	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="https://themeisle.com/themes/medica/" class="button" target="_blank">'+ medica_lite_buttons.pro +'</a>' );

});