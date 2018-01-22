<?php
/**
 * The template for displaying the style-3 footer layout.
 *
 * @package Jardinier
 */
?>

<div <?php jardinier_footer_container_class(); ?>>
	<div class="site-info container-wide">
		<div class="site-info-wrap">
			<div class="site-info-block"><?php
				jardinier_footer_logo();
				jardinier_footer_copyright();
			?></div>
			<?php jardinier_footer_menu(); ?>
			<div class="site-info-block"><?php
				jardinier_contact_block( 'footer' );
				jardinier_social_list( 'footer' );
			?></div>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
