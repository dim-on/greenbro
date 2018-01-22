<?php
/**
 * Template part for style-2 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jardinier
 */

$search_visible        = get_theme_mod( 'header_search', jardinier_theme()->customizer->get_default( 'header_search' ) );
$header_woo_elements   = get_theme_mod( 'header_woo_elements', jardinier_theme()->customizer->get_default( 'header_woo_elements' ) );
?>
<div class="header-container_wrap container">

	<div class="header-row__flex">
		<div class="site-branding">
			<?php jardinier_header_logo() ?>
			<?php jardinier_site_description(); ?>
		</div>

		<div class="header-row__flex header-components__contact-button"><?php
			jardinier_contact_block( 'header' );
			jardinier_header_btn();
		?></div>
	</div>

	<div class="header-nav-wrapper">
		<?php jardinier_main_menu(); ?>

		<?php if ( $search_visible || $header_woo_elements ) : ?>
			<div class="header-components header-components__search-cart"><?php
				jardinier_header_search_toggle();
				jardinier_header_woo_cart();
			?></div>
		<?php endif; ?>

		<?php jardinier_header_search( '<div class="header-search">%s<span class="search-form__close"></span></div>' ); ?>
	</div>

</div>
