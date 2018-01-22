(function( $ ) {
	"use strict";


	$( document )
		.on( 'click.wooCart', '.cart-contents', cartClickHandler )
		.on( 'click.wooCart', '.site-header-cart__wrapper', cartWrapClickHandler )
		.on( 'click.wooCart', cartCloseHandler );

	function cartClickHandler() {
		$( '.site-header-cart__wrapper' ).toggleClass( 'open' );
	}

	function cartWrapClickHandler( event ) {
		event.stopPropagation();
	}

	function cartCloseHandler() {
		$( '.site-header-cart__wrapper' ).removeClass( 'open' );
	}

	$( '.tm-products-sale-end-date[data-countdown]' ).each( function() {
		var $this = $( this ),
			finalDate = $( this ).data( 'countdown' ),
			format = $( this ).data( 'format' );

		$this.countdown( finalDate, function( event ) {
			$this.html( event.strftime( format ) );
		} );
	} );


	function initQty() {
		var min = $input.attr( 'min' ),
			max = $input.attr( 'max' );

		if ( '' !== min ) {
			$input.removeAttr( 'readonly' );

			$( '.tm-qty-minus' ).on( 'click', qtyMinusClickHandler );
			$( '.tm-qty-plus' ).on( 'click', qtyPlusClickHandler );
		}
		else {
			$( '.tm-qty-minus, .tm-qty-plus' ).off( 'click' );
			$input.attr( 'readonly', 'readonly' );
		}
	}

	function qtyMinusClickHandler() {
		var min = $input.attr( 'min' );

		if ( $input.val() > min ) {
			$input.val( $input.val() - 1 );
		}
	}

	function qtyPlusClickHandler() {
		var max = $input.attr( 'max' );

		if ( typeof max === typeof undefined || $input.val() < max || '' === max ) {
			$input.val( parseInt( $input.val() ) + 1 );
		}
	}

	if ( $( 'input[type=number][name=quantity]' ).length ) {
		var $input = $( 'input[type=number][name=quantity]' ),
			$variationsForm = $( '.variations_form ' ),
			$singleVariation = $( '.single_variation', $variationsForm );

		$input.after( '<span class="tm-qty-minus"></span><span class="tm-qty-plus"></span>' );

		$singleVariation.on( 'show_variation', function( event, variation ) {
			initQty();
		} );

		$variationsForm.on( 'reset_data', function( event ) {
			$input.attr( 'min', '' ).val( '1' );
			initQty();
		} );

		initQty();
	}
})( jQuery );