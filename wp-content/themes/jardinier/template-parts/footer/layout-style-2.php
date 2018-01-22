<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package Jardinier
 */
?>

<div <?php jardinier_footer_container_class(); ?>>
	<div class="site-info container"><?php
		jardinier_footer_logo();
		jardinier_footer_menu();
		jardinier_contact_block( 'footer' );
		jardinier_social_list( 'footer' );
		jardinier_footer_copyright();
	?></div><!-- .site-info -->
</div><!-- .container -->
