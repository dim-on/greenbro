<?php
/**
 * The base template.
 *
 * @package Jardinier
 */
?>
<?php get_header( jardinier_template_base() ); ?>

	<?php jardinier_site_breadcrumbs(); ?>

	<?php jardinier_single_post_full_width_section(); ?>

	<?php do_action( 'jardinier_render_widget_area', 'full-width-header-area' ); ?>

	<div <?php jardinier_content_wrap_class(); ?>>

		<?php do_action( 'jardinier_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php jardinier_primary_content_class(); ?>>

				<?php do_action( 'jardinier_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include jardinier_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'jardinier_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

		<?php do_action( 'jardinier_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .site-content_wrap -->

	<?php do_action( 'jardinier_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( jardinier_template_base() ); ?>
