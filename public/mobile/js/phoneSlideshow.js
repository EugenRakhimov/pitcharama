/**
 * phoneSlideshow.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var phoneSlideshow = (function() {

	function init() {
		[].slice.call( document.querySelectorAll( '.ms-wrapper' ) ).forEach( function( el, i ) {
			var open = false;
			el.querySelector( 'button' ).addEventListener( 'click', changeView, false );
			var isFirstClick = true; 
			document.getElementById('aFrontPage').addEventListener( 'click', changeView, false );
			function changeView() {
				if( open ) {
					// classie.remove( el, 'ms-view-layers' );
				}
				else {
					classie.add( el, 'ms-view-layers' );
				}
				open = !open;
				
				if(isFirstClick){
					document.getElementById('aFrontPage').removeEventListener('click');
					isFirstClick = false; 
					// document.getElementById('aFrontPage').setAttribute('href', "#messaging");
					
					 
					
				}
				
				/*$('.ms-wrapper button:hover').css('background', 'none');
				$('.ms-wrapper button:active').css('-webkit-box-shadow', 'none');
				$('.ms-wrapper button:active').css('box-shadow', 'none');*/ 
				$('.ms-wrapper button').attr('disabled', 'disabled');
				$('.ms-wrapper button').fadeOut(1100);
			}
		} );
	}

	init();

})();