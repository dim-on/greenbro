<?php
/**
 * Menus configuration.
 *
 * @package Jardinier
 */

add_action( 'after_setup_theme', 'jardinier_register_menus', 5 );
/**
 * Register menus.
 */
function jardinier_register_menus() {

	register_nav_menus( array(
		'top'          => esc_html__( 'Top', 'jardinier' ),
		'main'         => esc_html__( 'Main', 'jardinier' ),
		'main_landing' => esc_html__( 'Landing Main', 'jardinier' ),
		'footer'       => esc_html__( 'Footer', 'jardinier' ),
		'social'       => esc_html__( 'Social', 'jardinier' ),
	) );
}
