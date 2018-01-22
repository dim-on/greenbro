<?php
/**
 * TM-Wizard configuration.
 *
 * @var array
 *
 * @package Jardinier
 */

$plugins = array(
	'cherry-data-importer' => array(
		'name'   => esc_html__( 'Cherry Data Importer', 'jardinier' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
		'access' => 'skins',
	),
	'cherry-projects' => array(
		'name'   => esc_html__( 'Cherry Projects', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-popups' => array(
		'name'   => esc_html__( 'Cherry PopUps', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-team-members' => array(
		'name'   => esc_html__( 'Cherry Team Members', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-testi' => array(
		'name'   => esc_html__( 'Cherry Testimonials', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-search' => array(
		'name'   => esc_html__( 'Cherry Search', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-services-list' => array(
		'name'   => esc_html__( 'Cherry Services List', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-socialize' => array(
		'name'   => esc_html__( 'Cherry Socialize', 'jardinier' ),
		'access' => 'skins',
	),
	'cherry-trending-posts' => array(
		'name'   => esc_html__( 'Cherry Trending Posts', 'jardinier' ),
		'access' => 'skins',
	),
	'booked' => array(
		'name'   => esc_html__( 'Booked Appointments', 'jardinier' ),
		'source' => 'local',
		'path'   => JARDINIER_THEME_DIR . '/assets/includes/plugins/booked.zip',
		'access' => 'skins',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements addon For Elementor', 'jardinier' ),
		'source' => 'local',
		'path'   => JARDINIER_THEME_DIR . '/assets/includes/plugins/jet-elements.zip',
		'access' => 'skins',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'jardinier' ),
		'access' => 'skins',
	),
	'tm-mega-menu' => array(
		'name'   => esc_html__( 'TM Mega Menu', 'jardinier' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/tm-mega-menu.zip',
		'access' => 'skins',
	),
	'tm-photo-gallery' => array(
		'name'   => esc_html__( 'TM Photo Gallery', 'jardinier' ),
		'access' => 'skins',
	),
	'tm-timeline' => array(
		'name'   => esc_html__( 'TM Timeline', 'jardinier' ),
		'access' => 'skins',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'jardinier' ),
		'access' => 'skins',
	),
	'simple-file-downloader' => array(
		'name'   => esc_html__( 'Simple File Downloader', 'jardinier' ),
		'access' => 'skins',
	),
	'shortcode-widget' => array(
		'name'   => esc_html__( 'Shortcode Widget', 'jardinier' ),
		'access' => 'skins',
	),
	'woocommerce' => array(
		'name'   => esc_html__( 'Woocommerce', 'jardinier' ),
		'access' => 'skins',
	),
	'tm-woocommerce-ajax-filters' => array(
		'name'   => esc_html__( 'TM Woocommerce Ajax Filters', 'jardinier' ),
		'source' => 'local',
		'path'   => JARDINIER_THEME_DIR . '/assets/includes/plugins/tm-woocommerce-ajax-filters.zip',
		'access' => 'skins',
	),
	'tm-woocommerce-compare-wishlist' => array(
		'name'   => esc_html__( 'TM Woocommerce Compare Wishlist', 'jardinier' ),
		'access' => 'skins',
	),
	'tm-woocommerce-package' => array(
		'name'   => esc_html__( 'TM Woocommerce Package', 'jardinier' ),
		'access' => 'skins',
	),
	'tm-woocommerce-quick-view' => array(
		'name'   => esc_html__( 'TM WooCommerce Quick View', 'jardinier' ),
		'source' => 'local',
		'path'   => JARDINIER_THEME_DIR . '/assets/includes/plugins/tm-woocommerce-quick-view.zip',
		'access' => 'skins',
	),
	'woocommerce-social-media-share-buttons' => array(
		'name'   => esc_html__( 'Woocommerce Social Media Share Buttons', 'jardinier' ),
		'access' => 'skins',
	),
	'smart-slider-3' => array(
		'name'   => esc_html__( 'Smart Slider 3', 'jardinier' ),
		'access' => 'skins',
	),
	'wordpress-social-login' => array(
		'name'   => esc_html__( 'WordPress Social Login', 'jardinier' ),
		'access' => 'skins',
	),	 
);

/**
 * Skins configuration.
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'cherry-data-importer',
		'elementor',
		'jet-elements',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'booked',
				'cherry-projects',
				'cherry-popups',
				'cherry-search',
				'cherry-services-list',
				'cherry-sidebars',
				'cherry-socialize',
				'cherry-team-members',
				'cherry-testi',
				'cherry-trending-posts',
				'tm-mega-menu',
				'tm-photo-gallery',
				'tm-timeline',
				'contact-form-7',
				'simple-file-downloader',
				'smart-slider-3',
				'shortcode-widget',
				'woocommerce',
				'tm-woocommerce-ajax-filters',
				'tm-woocommerce-compare-wishlist',
				'tm-woocommerce-package',
				'woocommerce-social-media-share-buttons',
				'tm-woocommerce-quick-view',
				'wordpress-social-login',
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp2.template-help.com/wptheme/jardinier/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default-thumb.png',
			'name'  => esc_html__( 'Jardinier', 'jardinier' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Jardinier', 'jardinier' ),
);
