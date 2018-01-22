<?php

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 * @param  array $settings Settings
 * @return array           Settings
 * @since  1.0.0
 */
function jardinier_cart_link() {

	?>
		<div class="cart-contents" title="<?php esc_html_e( 'View your shopping cart', 'jardinier' ); ?>">
			<i class="nc-icon-mini shopping_cart-modern"></i>
			<span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		</div>
	<?php
}

function jardinier_cart_link_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	jardinier_cart_link();
	$fragments['div.cart-contents'] = ob_get_clean();
	return $fragments;
}


/**
 * Show top currency switcher.
 *
 * @since  1.0.0
 * @param  string $format Output formatting.
 * @return void
 */
function jardinier_currency_switcher() {
	if ( shortcode_exists( 'woocs' ) ) {
		echo do_shortcode( '[woocs show_flags=0 width="70px" txt_type="code"]' );
	}
}
/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  jardinier_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
function jardinier_header_cart() {
	get_template_part( 'woocommerce/header-cart' );
}
