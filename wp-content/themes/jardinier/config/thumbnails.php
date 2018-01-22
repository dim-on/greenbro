<?php
/**
 * Thumbnails configuration.
 *
 * @package Jardinier
 */

add_action( 'after_setup_theme', 'jardinier_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function jardinier_register_image_sizes() {
	set_post_thumbnail_size( 360, 203, true );

	// Registers a new image sizes.
	add_image_size( 'jardinier-thumb-s', 150, 150, true );
	add_image_size( 'jardinier-thumb-m', 460, 460, true );
	add_image_size( 'jardinier-thumb-l', 660, 371, true );
	add_image_size( 'jardinier-thumb-l-2', 766, 203, true );
	add_image_size( 'jardinier-thumb-xl', 1160, 508, true );

	add_image_size( 'jardinier-thumb-masonry', 560, 9999 );

	add_image_size( 'jardinier-slider-thumb', 150, 86, true );

	add_image_size( 'jardinier-woo-cart-product-thumb', 104, 104, true );
	add_image_size( 'jardinier-thumb-listing-line-product', 260, 260, true );

	add_image_size( 'jardinier-thumb-78-78', 78, 78, true );
	add_image_size( 'jardinier-thumb-260-147', 260, 147, true );
	add_image_size( 'jardinier-thumb-260-195', 260, 195, true );
	add_image_size( 'jardinier-thumb-260-260', 260, 260, true );
	add_image_size( 'jardinier-thumb-360-270', 360, 270, true );
	add_image_size( 'jardinier-thumb-480-271', 480, 271, true );
	add_image_size( 'jardinier-thumb-480-360', 480, 360, true );
	add_image_size( 'jardinier-thumb-560-315', 560, 315, true );
	add_image_size( 'jardinier-thumb-660-495', 660, 495, true );
	add_image_size( 'jardinier-thumb-760-571', 760, 571, true );
}
