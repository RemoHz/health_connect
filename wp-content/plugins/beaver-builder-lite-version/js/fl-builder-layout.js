(function($){

	if(typeof FLBuilderLayout != 'undefined') {
		return;
	}
	
	/**
	 * Helper class with generic logic for a builder layout.
	 *
	 * @class FLBuilderLayout
	 * @since 1.0
	 */
	FLBuilderLayout = {
		
		/**
		 * Initializes a builder layout.
		 *
		 * @since 1.0
		 * @method init
		 */ 
		init: function()
		{
			// Destroy existing layout events.
			FLBuilderLayout._destroy();
			
			// Init CSS classes.
			FLBuilderLayout._initClasses();
			
			// Init backgrounds.
			FLBuilderLayout._initBackgrounds();
			
			// Only init if the builder isn't active. 
			if ( 0 === $('.fl-builder-edit').length ) {
				
				// Init anchor links.
				FLBuilderLayout._initAnchorLinks();
				
				// Init the browser hash.
				FLBuilderLayout._initHash();
			
				// Init module animations.
				FLBuilderLayout._initModuleAnimations();
				
				// Init forms.
				FLBuilderLayout._initForms();
			}
		},
		
		/**
		 * Public method for refreshing Wookmark or MosaicFlow galleries
		 * within an element.
		 *
		 * @since 1.7.4
		 * @method refreshGalleries
		 */ 
		refreshGalleries: function( element )
		{
			var $element  = 'undefined' == typeof element ? $( 'body' ) : $( element ),
				mfContent = $element.find( '.fl-mosaicflow-content' ),
				wmContent = $element.find( '.fl-gallery' ),
				mfObject  = null;
			
			if ( mfContent ) {
				
				mfObject = mfContent.data( 'mosaicflow' );
				
				if ( mfObject ) {
					mfObject.columns = $( [] );
					mfObject.columnsHeights = [];
					mfContent.data( 'mosaicflow', mfObject );
					mfContent.mosaicflow( 'refill' );
				}
			}
			if ( wmContent ) {
				wmContent.trigger( 'refreshWookmark' );
			}
		},
		
		/**
		 * Unbinds builder layout events.
		 *
		 * @since 1.0
		 * @access private
		 * @method _destroy
		 */ 
		_destroy: function()
		{
			var win = $(window);
			
			win.off('scroll.fl-bg-parallax');
			win.off('resize.fl-bg-video');
		},
		
		/**
		 * Checks to see if the current device has touch enabled.
		 *
		 * @since 1.0
		 * @access private
		 * @method _isTouch
		 * @return {Boolean}
		 */ 
		_isTouch: function()
		{
			if(('ontouchstart' in window) || (window.DocumentTouch && document instanceof DocumentTouch)) {
				return true;
			}
			
			return false;
		},
		
		/**
		 * Checks to see if the current device is mobile.
		 *
		 * @since 1.7
		 * @access private
		 * @method _isMobile
		 * @return {Boolean}
		 */ 
		_isMobile: function()
		{
			return /Mobile|Android|Silk\/|Kindle|BlackBerry|Opera Mini|Opera Mobi|webOS/i.test( navigator.userAgent );
		},
		
		/**
		 * Initializes builder body classes.
		 *
		 * @since 1.0
		 * @access private
		 * @method _initClasses
		 */ 
		_initClasses: function()
		{
			var body = $( 'body' );
			
			// Don't add to archive pages.
			if ( body.hasClass( 'archive' ) ) {
				return;
			}
			
			// Add the builder body class.
			body.addClass('fl-builder');
			
			// Add the builder touch body class.
			if(FLBuilderLayout._isTouch()) {
				body.addClass('fl-builder-touch');
			}
			
			// Add the builder mobile body class.
			if(FLBuilderLayout._isMobile()) {
				body.addClass('fl-builder-mobile');
			}
		},
		
		/**
		 * Initializes builder node backgrounds that require
		 * additional JavaScript logic such as parallax.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _initBackgrounds
		 */ 
		_initBackgrounds: function()
		{
			var win = $(window);
			
			// Init parallax backgrounds.
			if($('.fl-row-bg-parallax').length > 0 && !FLBuilderLayout._isMobile()) {
				FLBuilderLayout._scrollParallaxBackgrounds();
				FLBuilderLayout._initParallaxBackgrounds();
				win.on('scroll.fl-bg-parallax', FLBuilderLayout._scrollParallaxBackgrounds);
			}
			
			// Init video backgrounds.
			if($('.fl-bg-video').length > 0) {
				FLBuilderLayout._initBgVideos();
				FLBuilderLayout._resizeBgVideos();
				win.on('resize.fl-bg-video', FLBuilderLayout._resizeBgVideos);
			}
		},
		
		/**
		 * Initializes all parallax backgrounds in a layout.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _initParallaxBackgrounds
		 */ 
		_initParallaxBackgrounds: function()
		{
			$('.fl-row-bg-parallax').each(FLBuilderLayout._initParallaxBackground);
		},
		
		/**
		 * Initializes a single parallax background.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _initParallaxBackgrounds
		 */ 
		_initParallaxBackground: function()
		{
			var row     = $(this),
				content = row.find('.fl-row-content-wrap'),
				src     = row.data('parallax-image'),
				loaded  = row.data('parallax-loaded'),
				img     = new Image();
			
			if(loaded) {
				return;
			}
			else if(typeof src != 'undefined') {
			 
				$(img).on('load', function() {
					content.css('background-image', 'url(' + src + ')');
					row.data('parallax-loaded', true);
				});
				
				img.src = src;
			}
		},
		
		/**
		 * Fires when the window is scrolled to adjust
		 * parallax backgrounds.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _scrollParallaxBackgrounds
		 */ 
		_scrollParallaxBackgrounds: function()
		{
			$('.fl-row-bg-parallax').each(FLBuilderLayout._scrollParallaxBackground);
		},
		
		/**
		 * Fires when the window is scrolled to adjust
		 * a single parallax background.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _scrollParallaxBackground
		 */ 
		_scrollParallaxBackground: function()
		{
			var win     = $(window),
				row     = $(this),
				content = row.find('.fl-row-content-wrap'),
				speed   = row.data('parallax-speed'),
				offset  = content.offset(),
				yPos    = -((win.scrollTop() - offset.top) / speed);
				
			content.css('background-position', 'center ' + yPos + 'px');
		},
		
		/**
		 * Initializes all video backgrounds.
		 *
		 * @since 1.6.3.3
		 * @access private
		 * @method _initBgVideos
		 */ 
		_initBgVideos: function()
		{
			$('.fl-bg-video').each(FLBuilderLayout._initBgVideo);
		},
		
		/**
		 * Initializes a video background.
		 *
		 * @since 1.6.3.3
		 * @access private
		 * @method _initBgVideo
		 */ 
		_initBgVideo: function()
		{
			var wrap 		= $( this ),
				width  		= wrap.data( 'width' ),
				height  	= wrap.data( 'height' ),
				mp4  		= wrap.data( 'mp4' ),
				mp4Type  	= wrap.data( 'mp4-type' ),
				webm  		= wrap.data( 'webm' ),
				webmType  	= wrap.data( 'webm-type' ),
				fallback  	= wrap.data( 'fallback' ),
				loaded  	= wrap.data( 'loaded' ),
				fallbackTag = '',
				videoTag	= null,
				mp4Tag    	= null,
				webmTag    	= null; 
			
			// Return if the video has been loaded for this row.
			if ( loaded ) {
				return;
			}
			// Append the video tag for non-mobile.
			else if ( ! FLBuilderLayout._isMobile() ) {
				
				videoTag  = $( '<video autoplay loop muted preload></video>' );
				
				// MP4 Source Tag
				if ( 'undefined' != typeof mp4 ) {
					
					mp4Tag = $( '<source />' );
					mp4Tag.attr( 'src', mp4 );
					mp4Tag.attr( 'type', mp4Type );
					
					if ( 'undefined' == typeof webm ) {
						mp4Tag.on( 'error', FLBuilderLayout._videoBgSourceError );
					}
					
					videoTag.append( mp4Tag );
				}
				
				// WebM Source Tag
				if ( 'undefined' != typeof webm ) {
					
					webmTag = $( '<source />' );
					webmTag.attr( 'src', webm );
					webmTag.attr( 'type', webmType );
					
					if ( 'undefined' != typeof mp4 ) {
						webmTag.on( 'error', FLBuilderLayout._videoBgSourceError );
					}
					
					videoTag.append( webmTag );
				}
				
				wrap.append( videoTag );
			}
			// Append the fallback tag for mobile.
			else if ( '' !== fallback ) {
				fallbackTag = $( '<div></div>' );
				fallbackTag.addClass( 'fl-bg-video-fallback' );
				fallbackTag.css( 'background-image', 'url(' + fallback + ')' );
				wrap.append( fallbackTag );
			}
			
			// Mark this video as loaded.
			wrap.data('loaded', true);
		},
		
		/**
		 * Fires when there is an error loading a video 
		 * background source and shows the fallback.
		 *
		 * @since 1.6.3.3
		 * @access private
		 * @method _videoBgSourceError
		 * @param {Object} e An event object.
		 */ 
		_videoBgSourceError: function( e )
		{
			var source 		= $( e.target ),
				wrap   		= source.closest( '.fl-bg-video' ),
				vid		    = wrap.find( 'video' ),
				fallback  	= wrap.data( 'fallback' ),
				fallbackTag = '';
				
			if ( '' !== fallback ) {
				fallbackTag = $( '<div></div>' );
				fallbackTag.addClass( 'fl-bg-video-fallback' );
				fallbackTag.css( 'background-image', 'url(' + fallback + ')' );
				wrap.append( fallbackTag );
				vid.remove();
			}
		},
		
		/**
		 * Fires when the window is resized to resize
		 * all video backgrounds.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _resizeBgVideos
		 */ 
		_resizeBgVideos: function()
		{
			$('.fl-bg-video').each( function() {
				
				FLBuilderLayout._resizeBgVideo.apply( this );
				
				if ( $( this ).parent().find( 'img' ).length > 0 ) {
					$( this ).parent().imagesLoaded( $.proxy( FLBuilderLayout._resizeBgVideo, this ) );
				}
			} );
		},
		
		/**
		 * Fires when the window is resized to resize
		 * a single video background.
		 *
		 * @since 1.1.4
		 * @access private
		 * @method _resizeBgVideo
		 */ 
		_resizeBgVideo: function()
		{
			if ( 0 === $( this ).find( 'video' ).length ) {
				return;
			}
			
			var wrap        = $(this),
				wrapHeight  = wrap.outerHeight(),
				wrapWidth   = wrap.outerWidth(),
				vid         = wrap.find('video'),
				vidHeight   = wrap.data('height'),
				vidWidth    = wrap.data('width'),
				newWidth    = wrapWidth,
				newHeight   = Math.round(vidHeight * wrapWidth/vidWidth),
				newLeft     = 0,
				newTop      = 0;
				
			if(vidHeight === '' || vidWidth === '') {
				
				vid.css({
					'left'      : '0px',
					'top'       : '0px',
					'width'     : newWidth + 'px'
				});
			}
			else {
				
				if(newHeight < wrapHeight) {
					newHeight   = wrapHeight;
					newWidth    = Math.round(vidWidth * wrapHeight/vidHeight);  
					newLeft     = -((newWidth - wrapWidth)/2);
				}
				else {
					newTop      = -((newHeight - wrapHeight)/2);
				}
				
				vid.css({
					'left'      : newLeft + 'px',
					'top'       : newTop + 'px',
					'height'    : newHeight + 'px',
					'width'     : newWidth + 'px'
				});
			}
		},
		
		/**
		 * Initializes module animations.
		 *
		 * @since 1.1.9
		 * @access private
		 * @method _initModuleAnimations
		 */ 
		_initModuleAnimations: function()
		{
			if(typeof jQuery.fn.waypoint !== 'undefined' && !FLBuilderLayout._isMobile()) {
				$('.fl-animation').waypoint({
					offset: '80%',
					handler: FLBuilderLayout._doModuleAnimation
				});
			}
		},
		
		/**
		 * Runs a module animation.
		 *
		 * @since 1.1.9
		 * @access private
		 * @method _doModuleAnimation
		 */ 
		_doModuleAnimation: function()
		{
			var module = $(this),
				delay  = parseFloat(module.data('animation-delay'));
			
			if(!isNaN(delay) && delay > 0) {
				setTimeout(function(){
					module.addClass('fl-animated');
				}, delay * 1000);
			}
			else {
				module.addClass('fl-animated');
			}
		},
		
		/**
		 * Opens a tab or accordion item if the browser hash is set
		 * to the ID of one on the page.
		 *
		 * @since 1.6.0
		 * @access private
		 * @method _initHash
		 */ 
		_initHash: function()
		{
			var hash 			= window.location.hash.replace( '#', '' ).split( '/' ).shift(),
				element 		= null,
				tabs			= null,
				responsiveLabel	= null,
				tabIndex		= null,
				label			= null;
			
			if ( '' !== hash ) {
				
				element = $( '#' + hash );
					
				if ( element.length > 0 ) {
					
					if ( element.hasClass( 'fl-accordion-item' ) ) {
						setTimeout( function() {
							element.find( '.fl-accordion-button' ).trigger( 'click' );
						}, 100 );
					}
					if ( element.hasClass( 'fl-tabs-panel' ) ) {
						
						setTimeout( function() {
							
							tabs 			= element.closest( '.fl-tabs' );
							responsiveLabel = element.find( '.fl-tabs-panel-label' );
							tabIndex 		= responsiveLabel.data( 'index' );
							label 			= tabs.find( '.fl-tabs-labels .fl-tabs-label[data-index=' + tabIndex + ']' );
						
							if ( responsiveLabel.is( ':visible' ) ) {
								responsiveLabel.trigger( 'click' );	
							}
							else {
								FLBuilderLayout._scrollToElement( label );
								label.trigger( 'click' );
							}
							
						}, 100 );
					}
				}
			}
		},
		
		/**
		 * Initializes all anchor links on the page for smooth scrolling.
		 *
		 * @since 1.4.9
		 * @access private
		 * @method _doModuleAnimation
		 */ 
		_initAnchorLinks: function()
		{
			$( 'a' ).each( FLBuilderLayout._initAnchorLink );
		},
		
		/**
		 * Initializes a single anchor link for smooth scrolling.
		 *
		 * @since 1.4.9
		 * @access private
		 * @method _doModuleAnimation
		 */ 
		_initAnchorLink: function()
		{
			var link    = $( this ),
				href    = link.attr( 'href' ),
				id      = null,
				element = null;
			
			if ( 'undefined' != typeof href && href.indexOf( '#' ) > -1 ) {
				
				try {
					
					id      = href.split( '#' ).pop();
					element = $( '#' + id );
					
					if ( element.length > 0 ) {
						if ( link.hasClass( 'fl-scroll-link' ) || element.hasClass( 'fl-row' ) || element.hasClass( 'fl-col' ) || element.hasClass( 'fl-module' ) ) {
							$( link ).on( 'click', FLBuilderLayout._scrollToElementOnLinkClick );
						}
						if ( element.hasClass( 'fl-accordion-item' ) ) {
							$( link ).on( 'click', FLBuilderLayout._scrollToAccordionOnLinkClick );
						}
						if ( element.hasClass( 'fl-tabs-panel' ) ) {
							$( link ).on( 'click', FLBuilderLayout._scrollToTabOnLinkClick );
						}
					}
				}
				catch( e ) {}
			}
		},
		
		/**
		 * Scrolls to an element when an anchor link is clicked.
		 *
		 * @since 1.4.9
		 * @access private
		 * @method _scrollToElementOnLinkClick
		 * @param {Object} e An event object.
		 * @param {Function} callback A function to call when the scroll is complete.
		 */ 
		_scrollToElementOnLinkClick: function( e, callback )
		{
			var element = $( '#' + $( this ).attr( 'href' ).split( '#' ).pop() );
				
			FLBuilderLayout._scrollToElement( element, callback );
				
			e.preventDefault();
		},
		
		/**
		 * Scrolls to an element.
		 *
		 * @since 1.6.4.5
		 * @access private
		 * @method _scrollToElement
		 * @param {Object} element The element to scroll to.
		 * @param {Function} callback A function to call when the scroll is complete.
		 */ 
		_scrollToElement: function( element, callback )
		{
			var config  = FLBuilderLayoutConfig.anchorLinkAnimations,
				dest    = 0,
				win     = $( window ),
				doc     = $( document );
				
			if ( element.length > 0 ) {
			
				if ( element.offset().top > doc.height() - win.height() ) {
					dest = doc.height() - win.height();
				} 
				else {
					dest = element.offset().top - config.offset;
				}
	
				$( 'html, body' ).animate( { scrollTop: dest }, config.duration, config.easing, function() {
					
					if ( 'undefined' != typeof callback ) {
						callback();
					}
					
					window.location.hash = element.attr( 'id' );
				} );
			}
		},
		
		/**
		 * Scrolls to an accordion item when a link is clicked.
		 *
		 * @since 1.5.9
		 * @access private
		 * @method _scrollToAccordionOnLinkClick
		 * @param {Object} e An event object.
		 */ 
		_scrollToAccordionOnLinkClick: function( e )
		{
			var element = $( '#' + $( this ).attr( 'href' ).split( '#' ).pop() );
				
			if ( element.length > 0 ) {
			
				var callback = function() {
					if ( element ) {
						element.find( '.fl-accordion-button' ).trigger( 'click' );	
						element = false;
					}
				};
				
				FLBuilderLayout._scrollToElementOnLinkClick.call( this, e, callback );
			}
		},
		
		/**
		 * Scrolls to a tab panel when a link is clicked.
		 *
		 * @since 1.5.9
		 * @access private
		 * @method _scrollToTabOnLinkClick
		 * @param {Object} e An event object.
		 */ 
		_scrollToTabOnLinkClick: function( e )
		{
			var element 		= $( '#' + $( this ).attr( 'href' ).split( '#' ).pop() ),
				tabs			= null,
				label   		= null,
				responsiveLabel = null;
				
			if ( element.length > 0 ) {
				
				tabs 			= element.closest( '.fl-tabs' );
				responsiveLabel = element.find( '.fl-tabs-panel-label' );
				tabIndex 		= responsiveLabel.data( 'index' );
				label 			= tabs.find( '.fl-tabs-labels .fl-tabs-label[data-index=' + tabIndex + ']' );
			
				if ( responsiveLabel.is( ':visible' ) ) {
					
					var callback = function() {
						if ( element ) {
							responsiveLabel.trigger( 'click' );	
							element = false;
						}
					};
					
					FLBuilderLayout._scrollToElementOnLinkClick.call( this, e, callback );
				}
				else {
					FLBuilderLayout._scrollToElement( label );
					label.trigger( 'click' );
				}
				
				e.preventDefault();
			}
		},
		
		/**
		 * Initializes all builder forms on a page.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _initForms
		 */ 
		_initForms: function()
		{
			if ( ! FLBuilderLayout._hasPlaceholderSupport ) {
				$( '.fl-form-field input' ).each( FLBuilderLayout._initFormFieldPlaceholderFallback );
			}
			
			$( '.fl-form-field input' ).on( 'focus', FLBuilderLayout._clearFormFieldError );
		},
		
		/**
		 * Checks to see if the current device has HTML5
		 * placeholder support.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _hasPlaceholderSupport
		 * @return {Boolean}
		 */ 
		_hasPlaceholderSupport: function()
		{
			var input = document.createElement( 'input' );
			
			return 'undefined' != input.placeholder;
		},
		
		/**
		 * Initializes the fallback for when placeholders aren't supported.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _initFormFieldPlaceholderFallback
		 */ 
		_initFormFieldPlaceholderFallback: function()
		{
			var field       = $( this ),
				val         = field.val(),
				placeholder = field.attr( 'placeholder' );
			
			if ( 'undefined' != placeholder && '' === val ) {
				field.val( placeholder );
				field.on( 'focus', FLBuilderLayout._hideFormFieldPlaceholderFallback );
				field.on( 'blur', FLBuilderLayout._showFormFieldPlaceholderFallback );
			}
		},
		
		/**
		 * Hides a fallback placeholder on focus.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _hideFormFieldPlaceholderFallback
		 */ 
		_hideFormFieldPlaceholderFallback: function()
		{
			var field       = $( this ),
				val         = field.val(),
				placeholder = field.attr( 'placeholder' );
			
			if ( val == placeholder ) {
				field.val( '' );
			}
		},
		
		/**
		 * Shows a fallback placeholder on blur.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _showFormFieldPlaceholderFallback
		 */ 
		_showFormFieldPlaceholderFallback: function()
		{
			var field       = $( this ),
				val         = field.val(),
				placeholder = field.attr( 'placeholder' );
			
			if ( '' === val ) {
				field.val( placeholder );
			}
		},
		
		/**
		 * Clears a form field error message.
		 *
		 * @since 1.5.4
		 * @access private
		 * @method _clearFormFieldError
		 */ 
		_clearFormFieldError: function()
		{
			var field = $( this );
			
			field.removeClass( 'fl-form-error' );
			field.siblings( '.fl-form-error-message' ).hide();
		}
	};

	/* Initializes the builder layout. */
	$(function(){
		FLBuilderLayout.init();
	});

})(jQuery);