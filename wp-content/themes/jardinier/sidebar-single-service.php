<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jardinier
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( ! is_active_sidebar( 'single-service' ) || 'fullwidth' === $sidebar_position ) {
	return;
}
?>

<?php do_action( 'jardinier_render_widget_area', 'single-service' );
