<?php
/**
 * The base template for displaying 404 pages (not found).
 *
 * @package Jardinier
 */
?>
<?php get_header( jardinier_template_base() ); ?>

	<?php jardinier_site_breadcrumbs(); ?>

	<div <?php jardinier_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php jardinier_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include jardinier_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

	</div><!-- .site-content_wrap -->

<?php get_footer( jardinier_template_base() ); ?>
