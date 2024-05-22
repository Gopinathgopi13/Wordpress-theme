/**
 * UpSolution Element: Product List
 */
;( function( $ ) {
	"use strict";

	// Private variables that are used only in the context of this function, it is necessary to optimize the code.
	var _history = history;

	/**
	 * @type {String} The original URL to return after closing the popup.
	 */
	var _originalURL;

	/**
	 * @class WProductList - Functionality for the Product List element.
	 * @param {String} container The container.
	 * @param {{}} options The options.
	 */
	$us.WProductList = function( container, options ) {
		var self = this;

		// Private variables
		self.data = {
			paged: 1,
			max_num_pages: 1,
			pagination: 'none',
			ajaxUrl: $us.ajaxUrl,
			ajaxData: {
				us_ajax_list_pagination: 1,
			},
		};
		self.xhr; // XMLHttpRequests instance

		// Elements
		self.$container = $( container );
		self.$list = $( '.w-grid-list', container );
		self.$loadmore = $( '.g-loadmore', container );

		// Import element data
		var $node = $( '.w-product-list-json:first', container );
		if ( $node.is( '[onclick]' ) ) {
			$.extend( self.data, $node[0].onclick() || {} );
		}
		$node.remove();

		self.paginationType = $ush.toString( self.data.pagination );

		/**
		 * @var {{}} Bondable events.
		 */
		self._events = {
			addNextPage: self.addNextPage.bind( self ),
			loadProductInPopup: self._loadProductInPopup.bind( self ),
			navigationInPopup: self._navigationInPopup.bind( self ),
			openProductInPopup: self._openProductInPopup.bind( self ),
			closeProductInPopup: self.closeProductInPopup.bind( self ),
		};

		// Load products on button click or page scroll;
		if ( self.paginationType === 'load_on_btn' ) {
			self.$loadmore.on( 'mousedown', 'button', self._events.addNextPage );

		} else if ( self.paginationType === 'load_on_scroll' ) {
			$us.waypoints.add( self.$loadmore, /* offset */'-70%', self._events.addNextPage );
		}

		// Open products in popup
		if ( self.$container.hasClass( 'open_items_in_popup' ) ) {

			// Elements
			self.$popup = $( '.l-popup', container );
			self.$popupBox = $( '.l-popup-box', self.$popup );
			self.$popupPreloader = $( '.g-preloader', self.$popup );
			self.$popupFrame = $( '.l-popup-box-content-frame', self.$popup );
			self.$popupToPrev = $( '.l-popup-arrow.to_prev', self.$popup );
			self.$popupToNext = $( '.l-popup-arrow.to_next', self.$popup );

			$us.$body.append( self.$popup );

			// Events
			self.$list
				.on( 'click', '.w-grid-item:not(.custom-link) .w-grid-item-anchor', self._events.openProductInPopup );
			self.$popupFrame
				.on( 'load', self._events.loadProductInPopup );
			self.$popup
				.on( 'click', '.l-popup-arrow', self._events.navigationInPopup )
				.on( 'click', '.l-popup-closer, .l-popup-box', self._events.closeProductInPopup );
		}
	};

	var prototype = $us.WProductList.prototype;

	// Product List API
	$.extend( prototype, {

		/**
		 * Add next page to Product List.
		 *
		 * @event handler [optional]
		 */
		addNextPage: function() {
			var self = this;
			// If the request is in progress, then exit
			if ( ! $ush.isUndefined( self.xhr ) ) {
				return;
			}

			self.data.paged += 1;
			self.$loadmore.addClass( 'loading' );

			// Get request link and data
			var ajaxUrl = $ush.toString( self.data.ajaxUrl ),
				ajaxData = $ush.clone( self.data.ajaxData );

			if ( ajaxUrl.indexOf( '{num_page}' ) > -1 ) {
				ajaxUrl = ajaxUrl.replace( '{num_page}', self.data.paged );

			} else if ( ajaxData.template_vars ) {
				ajaxData.template_vars = JSON.stringify( ajaxData.template_vars ); // convert for `us_maybe_get_post_json()`
				ajaxData.paged = self.data.paged;
			}

			self.xhr = $.ajax( {
				type: 'post',
				url: ajaxUrl,
				cache: false,
				dataType: 'html',
				data: ajaxData,
				success: function( html ) {
					var $items = $( '.w-grid-list:first > *', html );
					if ( $items.length ) {
						self.$list.append( $items );
						// Initialize the animation handler for new items
						if ( self.$container.hasClass( 'with_css_animation' ) ) {
							new USAnimate( self.$list );
							$us.$window.trigger( 'scroll.waypoints' );
						}
						// Initialize links "Show More"
						$ush.timeout( function() {
							$( '[data-content-height]', $items ).usCollapsibleContent();
						}, 1 );
					}
					// After loading all products, disable pagination
					if ( ! $items.length || self.data.paged >= self.data.max_num_pages ) {
						self.$loadmore.addClass( 'hidden' );
						return
					}
					// Add point to load the next page
					if ( self.paginationType == 'load_on_scroll' ) {
						$us.waypoints.add( self.$loadmore, /* offset */'-70%', self.addNextPage.bind( self ) );
					}
					$us.$canvas.trigger( 'contentChange' );

					self.$loadmore.removeClass( 'loading' );
					delete self.xhr;
				},
				error: function() {
					self.$loadmore.removeClass( 'loading' );
					delete self.xhr;
				}
			} );
		}

	} );

	// Functionality for popup window
	$.extend( prototype, {

		/**
		 * Open product in popup.
		 *
		 * @event handler
		 * @param {Event} e The Event interface represents an event which takes place in the DOM.
		 */
		_openProductInPopup: function( e ) {
			var self = this;

			// If scripts are disabled on a given screen width, then exit
			if ( $us.$window.width() <= $us.canvasOptions.disableEffectsWidth ) {
				return;
			}

			e.stopPropagation();
			e.preventDefault();

			// Remember original page URL
			_originalURL = location.href;

			// Set product by index in the list
			self.setProductInPopup( $( e.target ).closest( '.w-grid-item' ).index() );

			// Show popup
			$us.$html.addClass( 'usoverlay_fixed' );
			self.$popup.addClass( 'active' );
			$ush.timeout( function() {
				self.$popupBox.addClass( 'show' );
			}, 25 );
		},

		/**
		 * Load product in popup.
		 *
		 * @event handler
		 */
		_loadProductInPopup: function() {
			var self = this;

			// Closing the product popup using escape
			function checkEscape( e ) {
				if ( $ush.toLowerCase( e.key ) === 'escape' && self.$popup.hasClass( 'active' ) ) {
					self.closeProductInPopup();
				}
			}
			self.$container.on( 'keyup', checkEscape );

			$( 'body', self.$popupFrame.contents() )
				.one( 'keyup.usCloseLightbox', checkEscape );
		},

		/**
		 * Navigation in the product popup.
		 *
		 * @event handler
		 * @param {Event} e The Event interface represents an event which takes place in the DOM.
		 */
		_navigationInPopup: function( e ) {
			this.setProductInPopup( $( e.target ).data( 'index' ) );
		},

		/**
		 * Set product by index in the list.
		 *
		 * @param {String} url The new value.
		 */
		setProductInPopup: function( index ) {
			var self = this;

			// Get current node and url
			var $node = $( '> *:eq(' + $ush.parseInt( index ) + ')', self.$list ),
				url = $ush.toString( $( '[href]:first', $node ).attr( 'href' ) );

			// If there is no href, then exit
			if ( ! url ) {
				console.error( 'No url to loaded product' );
				return;
			}

			// Gen prev / next node
			var $prev = $node.prev( ':not(.custom-link)' ),
				$next = $node.next( ':not(.custom-link)' );

			// Pagination controls switch
			self.$popupToPrev
				.data( 'index', $prev.index() )
				.attr( 'title', $( '.post_title', $prev ).text() )
				.toggleClass( 'hidden', ! $prev.length );
			self.$popupToNext
				.data( 'index', $next.index() )
				.attr( 'title', $( '.post_title', $next ).text() )
				.toggleClass( 'hidden', ! $next.length );

			// Load product by its index
			self.$popupPreloader.show();
			self.$popupFrame
				.attr( 'src', url + ( url.indexOf( '?' ) > -1 ? '&' : '?' ) + 'us_iframe=1' );

			// Set product link in URL
			_history.replaceState( /* state */null, /* unused */null, url );
		},

		/**
		 * Close product in popup.
		 *
		 * @event handler
		 */
		closeProductInPopup: function() {
			var self = this;
			self.$popupBox
				.removeClass( 'show' )
				.one( 'transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function() {
					self.$popup.removeClass( 'active' );
					self.$popupFrame.attr( 'src', 'about:blank' );
					self.$popupToPrev.addClass( 'hidden' );
					self.$popupToNext.addClass( 'hidden' );
					self.$popupPreloader.show();
					$us.$html.removeClass( 'usoverlay_fixed' );
				} );

			// Restore original URL
			if ( _originalURL ) {
				_history.replaceState( /* state */null, /* unused */null, _originalURL );
			}
		}
	} );

	$.fn.wProductList = function( options ) {
		return this.each( function() {
			$( this ).data( 'WProductList', new $us.WProductList( this, options ) );
		} );
	};

	// Init Product List
	$( '.w-grid.us_product_list' ).wProductList();

} )( jQuery );
