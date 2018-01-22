<?php
/**
 * Default manifest file
 *
 * @var array
 *
 * @package Jardinier
 */

$settings = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => esc_html__( 'Jardinier', 'jardinier' ),
			'full'     => get_template_directory() . '/assets/demo-content/default-full.xml',
			'thumb'    => get_template_directory_uri() . '/assets/demo-content/default-thumb.png',
			'demo_url' => 'http://ld-wp2.template-help.com/wptheme/jardinier/',
		),

	),
	'import' => array(
		'chunk_size' => 3,
	),
	'slider' => array(
		'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
	),
	'export' => array(
		'options' => array(
			'woocommerce_default_country',
			'woocommerce_shop_page_id',
			'woocommerce_default_catalog_orderby',
			'shop_catalog_image_size',
			'shop_single_image_size',
			'shop_thumbnail_image_size',
			'woocommerce_cart_page_id',
			'woocommerce_checkout_page_id',
			'woocommerce_terms_page_id',
			'tm_woowishlist_page',
			'tm_woocompare_page',
			'tm_woocompare_enable',
			'tm_woocompare_show_in_catalog',
			'tm_woocompare_show_in_single',
			'tm_woocompare_compare_text',
			'tm_woocompare_remove_text',
			'tm_woocompare_page_btn_text',
			'tm_woocompare_show_in_catalog',
			'cherry_projects_options',
			'cherry_projects_options_default',
			'cherry_popups_options',
			'cherry_popups_options_default',
			'cherry-team',
			'cherry-team_default',
			'cherry-search',
			'cherry-search-default',
			'cherry-services',
			'cherry-services_default',
			'elementor_default_generic_fonts',
			'elementor_container_width',
			'elementor_cpt_support',
			'elementor_disable_color_schemes',
			'elementor_disable_typography_schemes',
			'elementor_css_print_method',
			'elementor_editor_break_lines',
			'elementor_global_image_lightbox',
			'tm-mega-menu-effect',
			'tm-mega-menu-duration',
			'tm-mega-menu-parent-container',
			'tm-mega-menu-location',
			'tm-mega-menu-mobile-trigger',
			'revslider-global-settings',
			'site_icon',
			'jet-elements-settings',
		),
		'tables' => array(
			'nextend2_image_storage',
			'nextend2_section_storage',
			'nextend2_smartslider3_generators',
			'nextend2_smartslider3_sliders',
			'nextend2_smartslider3_sliders_xref',
			'nextend2_smartslider3_slides',
			'woocommerce_attribute_taxonomies',
		),
	),
);
