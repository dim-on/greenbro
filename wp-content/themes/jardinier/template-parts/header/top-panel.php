<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jardinier
 */

// Don't show top panel if all elements are disabled.
if ( ! jardinier_is_top_panel_visible() ) {
	return;
}
?>

<div <?php echo jardinier_get_html_attr_class( array( 'top-panel' ), 'top_panel_bg' ); ?>>
	<div class="container">
		<div class="top-panel__container">
			<?php jardinier_top_message( '<div class="top-panel__message">%s</div>' ); ?>
			<?php jardinier_contact_block( 'header_top_panel' ); ?>

			<div class="top-panel__wrap-items">
				<div class="top-panel__menus">

					<?php jardinier_top_menu(); ?>
                    <?php
                        if (is_user_logged_in()) {
                            echo 'Hello, '. get_userdata( get_current_user_id() )->user_login;
                        }
                            jardinier_sign_up_link();
                            echo ' |';
                            jardinier_login_link();
                    ?>

					<?php jardinier_header_woo_currency_switcher(); ?>
					<?php jardinier_social_list( 'header' ); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
