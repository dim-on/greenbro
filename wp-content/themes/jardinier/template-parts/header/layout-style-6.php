<?php
/**
 * Template part for style-6 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jardinier
 */

$header_contact_block_visibility = get_theme_mod( 'header_contact_block_visibility', jardinier_theme()->customizer->get_default( 'header_contact_block_visibility' ) );
$header_btn_visibility           = get_theme_mod( 'header_btn_visibility', jardinier_theme()->customizer->get_default( 'header_btn_visibility' ) );
$search_visible                  = get_theme_mod( 'header_search', jardinier_theme()->customizer->get_default( 'header_search' ) );
$header_woo_elements             = get_theme_mod( 'header_woo_elements', jardinier_theme()->customizer->get_default( 'header_woo_elements' ) );
?>
<div class="header-container_wrap container">
	<?php if ( $header_contact_block_visibility || $header_btn_visibility ) : ?>
		<div class="header-row__flex header-components__contact-button header-components__grid-elements"><?php
			jardinier_contact_block( 'header' );
			jardinier_header_btn();
		?></div>
	<?php endif; ?>

	<div class="header-container__flex-wrap">
		<div class="row row-sm-center">
			<div class="col-xs-12 col-sm-6 col-sm-push-3 col-lg-4 col-lg-push-4">
				<div class="site-branding">
					<?php jardinier_header_logo() ?>
					<?php jardinier_site_description(); ?>
				</div>
			</div>

			<?php if ( $search_visible || $header_woo_elements ) : ?>
				<div class="col-xs-12 col-sm-3 col-lg-4 col-sm-push-3 col-lg-push-4">
					<div class="header-components header-components__search-cart"><?php
						jardinier_header_search_toggle();
						jardinier_header_woo_cart();
					?></div>
				</div>
			<?php endif; ?>

		</div>
		<?php jardinier_main_menu(); ?>
		<?php jardinier_header_search( '<div class="header-search">%s<span class="search-form__close"></span></div>' ); ?>
	</div>
</div>
