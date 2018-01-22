<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Jardinier
 */

$footer_logo_visibility    = get_theme_mod( 'footer_logo_visibility', jardinier_theme()->customizer->get_default( 'footer_logo_visibility' ) );
$footer_menu_visibility    = get_theme_mod( 'footer_menu_visibility', jardinier_theme()->customizer->get_default( 'footer_menu_visibility' ) );
?>

<div <?php jardinier_footer_container_class(); ?>>

	<?php if ( $footer_logo_visibility || $footer_menu_visibility ) { ?>
		<div class="site-info container site-info-first-row">
			<div class="site-info-wrap">
				<div class="site-info-block"><?php
					jardinier_footer_logo();
				?></div>
				<?php jardinier_footer_menu(); ?>
			</div>
		</div><!-- .site-info-first-row -->
	<?php } ?>

	<div class="site-info container site-info-second-row">
		<div class="site-info-wrap">
			<div class="site-info-block"><?php
				jardinier_footer_copyright();
				jardinier_contact_block( 'footer' );
			?></div>
			<?php jardinier_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info-second-row -->

</div><!-- .container -->
