<?php
/**
 * Jardinier functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jardinier
 */
if ( ! class_exists( 'Jardinier_Theme_Setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	class Jardinier_Theme_Setup {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * A reference to an instance of cherry framework core class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private $core = null;

		/**
		 * Holder for CSS layout scheme.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $layout = array();

		/**
		 * Holder for current customizer module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $customizer = null;

		/**
		 * Holder for current dynamic_css module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $dynamic_css = null;

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// Set the constants needed by the theme.
			add_action( 'after_setup_theme', array( $this, 'constants' ), -1 );

			// Load the installer core.
			add_action( 'after_setup_theme', require( trailingslashit( get_template_directory() ) . 'cherry-framework/setup.php' ), 0 );

			// Load the core functions/classes required by the rest of the theme.
			add_action( 'after_setup_theme', array( $this, 'get_core' ), 1 );

			// Language functions and translations setup.
			add_action( 'after_setup_theme', array( $this, 'l10n' ), 2 );

			// Handle theme supported features.
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 3 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 4 );

			// Initialization of modules.
			add_action( 'after_setup_theme', array( $this, 'init' ), 10 );

			// Load admin files.
			add_action( 'wp_loaded', array( $this, 'admin' ), 1 );

			// Enqueue admin assets.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 20 );

			// Denqueue duplicate assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'denqueue_assets' ), 30 );

			// Overrides the load textdomain function for the 'cherry-framework' domain.
			add_filter( 'override_load_textdomain', array( $this, 'override_load_textdomain' ), 5, 3 );
		}

		/**
		 * Defines the constant paths for use within the core and theme.
		 *
		 * @since 1.0.0
		 */
		public function constants() {
			global $content_width;

			/**
			 * Fires before definitions the constants.
			 *
			 * @since 1.0.0
			 */
			do_action( 'jardinier_constants_before' );

			$template  = get_template();
			$theme_obj = wp_get_theme( $template );

			/** Sets the theme version number. */
			define( 'JARDINIER_THEME_VERSION', $theme_obj->get( 'Version' ) );

			/** Sets the theme directory path. */
			define( 'JARDINIER_THEME_DIR', get_template_directory() );

			/** Sets the theme directory URI. */
			define( 'JARDINIER_THEME_URI', get_template_directory_uri() );

			/** Sets the path to the core framework directory. */
			defined( 'CHERRY_DIR' ) or define( 'CHERRY_DIR', trailingslashit( JARDINIER_THEME_DIR ) . 'cherry-framework' );

			/** Sets the path to the core framework directory URI. */
			defined( 'CHERRY_URI' ) or define( 'CHERRY_URI', trailingslashit( JARDINIER_THEME_URI ) . 'cherry-framework' );

			/** Sets the theme includes paths. */
			define( 'JARDINIER_THEME_CLASSES', trailingslashit( JARDINIER_THEME_DIR ) . 'inc/classes' );
			define( 'JARDINIER_THEME_WIDGETS', trailingslashit( JARDINIER_THEME_DIR ) . 'inc/widgets' );
			define( 'JARDINIER_THEME_EXT', trailingslashit( JARDINIER_THEME_DIR ) . 'inc/extensions' );

			/** Sets the theme assets URIs. */
			define( 'JARDINIER_THEME_CSS', trailingslashit( JARDINIER_THEME_URI ) . 'assets/css' );
			define( 'JARDINIER_THEME_JS', trailingslashit( JARDINIER_THEME_URI ) . 'assets/js' );

			// Sets the content width in pixels, based on the theme's design and stylesheet.
			if ( ! isset( $content_width ) ) {
				$content_width = 885;
			}
		}

		/**
		 * Loads the core functions. These files are needed before loading anything else in the
		 * theme because they have required functions for use.
		 *
		 * @since  1.0.0
		 */
		public function get_core() {
			/**
			 * Fires before loads the core theme functions.
			 *
			 * @since 1.0.0
			 */
			do_action( 'jardinier_core_before' );

			global $chery_core_version;

			if ( null !== $this->core ) {
				return $this->core;
			}

			if ( 0 < sizeof( $chery_core_version ) ) {
				$core_paths = array_values( $chery_core_version );

				require_once( $core_paths[0] );
			} else {
				die( 'Class Cherry_Core not found' );
			}

			$this->core = new Cherry_Core( array(
				'base_dir' => CHERRY_DIR,
				'base_url' => CHERRY_URI,
				'modules'  => array(
					'cherry-js-core' => array(
						'autoload' => true,
					),
					'cherry-ui-elements' => array(
						'autoload' => false,
					),
					'cherry-interface-builder' => array(
						'autoload' => false,
					),
					'cherry-utility' => array(
						'autoload' => true,
						'args'     => array(
							'meta_key' => array(
								'term_thumb' => 'cherry_terms_thumbnails',
							),
						),
					),
					'cherry-widget-factory' => array(
						'autoload' => true,
					),
					'cherry-post-formats-api' => array(
						'autoload' => true,
						'args'     => array(
							'rewrite_default_gallery' => true,
							'gallery_args' => array(
								'size'          => 'jardinier-thumb-l',
								'base_class'    => 'post-gallery',
								'container'     => '<div class="%2$s swiper-container" id="%4$s" %3$s><div class="swiper-wrapper">%1$s</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div>',
								'slide'         => '<figure class="%2$s swiper-slide">%1$s</figure>',
								'img_class'     => 'swiper-image',
								'slider_handle' => 'jquery-swiper',
								'slider'        => 'swiper',
								'slider_init'   => array(
									'loop'    => true,
									'buttons' => false,
									'arrows'  => true,
								),
								'popup'         => 'magnificPopup',
								'popup_handle'  => 'magnific-popup',
								'popup_init'    => array(
									'type' => 'image',
								),
							),
							'image_args' => array(
								'size'         => 'jardinier-thumb-l',
								'popup'        => 'magnificPopup',
								'popup_handle' => 'magnific-popup',
								'popup_init'   => array(
									'type' => 'image',
								),
							),
						),
					),
					'cherry-customizer' => array(
						'autoload' => false,
					),
					'cherry-dynamic-css' => array(
						'autoload' => false,
					),
					'cherry-google-fonts-loader' => array(
						'autoload' => false,
					),
					'cherry-term-meta' => array(
						'autoload' => false,
					),
					'cherry-post-meta' => array(
						'autoload' => false,
					),
					'cherry-breadcrumbs' => array(
						'autoload' => false,
					),
				),
			) );

			return $this->core;
		}

		/**
		 * Loads the theme translation file.
		 *
		 * @since 1.0.0
		 */
		public function l10n() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'jardinier', trailingslashit( JARDINIER_THEME_DIR ) . 'languages' );
		}

		/**
		 * Adds theme supported features.
		 *
		 * @since 1.0.0
		 */
		public function theme_support() {

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable HTML5 markup structure.
			add_theme_support( 'html5', array(
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
			) );

			// Enable default title tag.
			add_theme_support( 'title-tag' );

			// Enable post formats.
			add_theme_support( 'post-formats', array(
				'aside',
				'gallery',
				'image',
				'link',
				'quote',
				'video',
				'audio',
				'status',
			) );

			// Enable custom background.
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff',
			) );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Enable support Selective Refresh for widgets into customize.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Add support for mobile menu
			add_theme_support( 'tm-custom-mobile-menu' );

			// Allow copy custom sidebars into child theme on activation
			add_theme_support( 'cherry_migrate_sidebars' );
		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			/**
			 * Configurations.
			 */
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'config/layout.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'config/menus.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'config/sidebars.php';
			require_if_theme_supports( 'post-thumbnails', trailingslashit( JARDINIER_THEME_DIR ) . 'config/thumbnails.php' );

			/**
			 * Functions.
			 */
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/template-tags.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/template-menu.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/template-meta.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/template-comment.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/template-related-posts.php';

			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/extras.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/context.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/customizer.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/hooks.php';
			require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/register-plugins.php';

			/**
			 * Third party plugins hooks.
			 */
			if ( class_exists( 'WooCommerce' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/woocommerce-hooks.php';
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/woocommerce-functions.php';
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/woocommerce-template-tags.php';
			}

			if ( class_exists( 'Cherry_Projects' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/cherry-projects.php';
			}

			if ( class_exists( 'Cherry_Services_List' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/cherry-services-list.php';
			}

			if ( class_exists( 'Cherry_Team_Members' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/cherry-team-members.php';
			}

			if ( class_exists( 'Cherry_Trending_Posts' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/cherry-trending-posts.php';
			}

			if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/cherry-testi.php';
			}

			if ( class_exists( 'tm_mega_menu' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/tm-mega-menu.php';
			}

			if ( class_exists( 'Jet_Elements' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/jet-elements.php';
			}

			if ( class_exists( 'TM_Photo_Gallery' ) ) {
				require_once trailingslashit( JARDINIER_THEME_DIR ) . 'inc/plugins-hooks/tm-photo-gallery.php';
			}

			/**
			 * Widgets.
			 */
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'about/class-about-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'about-author/class-about-author-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'banner/class-banner-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'carousel/class-carousel-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'custom-posts/class-custom-posts-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'image-grid/class-image-grid-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'smart-slider/class-smart-slider-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'subscribe-follow/class-subscribe-follow-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'taxonomy-tiles/class-taxonomy-tiles-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'featured-posts-block/class-featured-posts-block-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'news-smart-box/class-news-smart-box-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'playlist-slider/class-playlist-slider-widget.php';
			require_once trailingslashit( JARDINIER_THEME_WIDGETS ) . 'contact-information/class-contact-information-widget.php';

			/**
			 * Classes.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( JARDINIER_THEME_CLASSES ) . 'class-wrapping.php';
			}

			require_once trailingslashit( JARDINIER_THEME_CLASSES ) . 'class-widget-area.php';
			require_once trailingslashit( JARDINIER_THEME_CLASSES ) . 'class-tgm-plugin-activation.php';

			/**
			 * Extensions.
			 */
			require_once trailingslashit( JARDINIER_THEME_EXT ) . 'woocommerce.php';
			require_once trailingslashit( JARDINIER_THEME_EXT ) . 'tm-mega-menu.php';
			require_once trailingslashit( JARDINIER_THEME_EXT ) . 'import.php';
			require_once trailingslashit( JARDINIER_THEME_EXT ) . 'elementor.php';
		}

		/**
		 * Run initialization of modules.
		 *
		 * @since 1.0.0
		 */
		public function init() {
			$this->customizer  = $this->get_core()->init_module( 'cherry-customizer', jardinier_get_customizer_options() );
			$this->dynamic_css = $this->get_core()->init_module( 'cherry-dynamic-css', jardinier_get_dynamic_css_options() );
			$this->get_core()->init_module( 'cherry-google-fonts-loader', jardinier_get_fonts_options() );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'category',
				'priority' => 10,
				'fields'   => array(
					'cherry_terms_thumbnails' => array(
						'type'                => 'media',
						'value'               => '',
						'multi_upload'        => false,
						'library_type'        => 'image',
						'upload_button_text'  => esc_html__( 'Set thumbnail', 'jardinier' ),
						'label'               => esc_html__( 'Category thumbnail', 'jardinier' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'post_tag',
				'priority' => 10,
				'fields'   => array(
					'cherry_terms_thumbnails' => array(
						'type'                => 'media',
						'value'               => '',
						'multi_upload'        => false,
						'library_type'        => 'image',
						'upload_button_text'  => esc_html__( 'Set thumbnail', 'jardinier' ),
						'label'               => esc_html__( 'Tag thumbnail', 'jardinier' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-post-meta', apply_filters( 'jardinier_page_settings_meta',  array(
				'id'            => 'page-settings',
				'title'         => esc_html__( 'Page settings', 'jardinier' ),
				'page'          => array( 'post', 'page', 'team', 'projects', 'cherry-services' ),
				'context'       => 'normal',
				'priority'      => 'high',
				'callback_args' => false,
				'fields'        => array(
					'tabs' => array(
						'element' => 'component',
						'type'    => 'component-tab-horizontal',
					),
					'layout_tab' => array(
						'element'     => 'settings',
						'parent'      => 'tabs',
						'title'       => esc_html__( 'Layout Options', 'jardinier' ),
					),
					'header_tab' => array(
						'element'     => 'settings',
						'parent'      => 'tabs',
						'title'       => esc_html__( 'Header Style', 'jardinier' ),
						'description' => esc_html__( 'Header style settings', 'jardinier' ),
					),
					'header_elements_tab' => array(
						'element'     => 'settings',
						'parent'      => 'tabs',
						'title'       => esc_html__( 'Header Elements', 'jardinier' ),
						'description' => esc_html__( 'Enable/Disable header elements', 'jardinier' ),
					),
					'breadcrumbs_tab' => array(
						'element'     => 'settings',
						'parent'      => 'tabs',
						'title'       => esc_html__( 'Breadcrumbs', 'jardinier' ),
						'description' => esc_html__( 'Breadcrumbs settings', 'jardinier' ),
					),
					'footer_tab' => array(
						'element'     => 'settings',
						'parent'      => 'tabs',
						'title'       => esc_html__( 'Footer Settings', 'jardinier' ),
						'description' => esc_html__( 'Footer settings', 'jardinier' ),
					),
					'jardinier_sidebar_position' => array(
						'type'          => 'radio',
						'parent'        => 'layout_tab',
						'title'         => esc_html__( 'Sidebar layout', 'jardinier' ),
						'description'   => esc_html__( 'Sidebar position global settings redefining. If you select inherit option, global setting will be applied for this layout', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit' => array(
								'label'   => esc_html__( 'Inherit', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'one-left-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on left side', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/page-layout-left-sidebar.svg',
							),
							'one-right-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on right side', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/page-layout-right-sidebar.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'No sidebar', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/page-layout-fullwidth.svg',
							),
						),
					),
					'jardinier_header_container_type' => array(
						'type'          => 'radio',
						'parent'        => 'layout_tab',
						'title'         => esc_html__( 'Header layout', 'jardinier' ),
						'description'   => esc_html__( 'Header layout global settings redefining. If you select inherit option, global setting will be applied for this layout', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit'   => array(
								'label'   => esc_html__( 'Inherit', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'boxed'     => array(
								'label'   => esc_html__( 'Boxed', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'Fullwidth', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
							),
						),
					),
					'jardinier_content_container_type' => array(
						'type'          => 'radio',
						'parent'        => 'layout_tab',
						'title'         => esc_html__( 'Content layout', 'jardinier' ),
						'description'   => esc_html__( 'Content layout global settings redefining. If you select inherit option, global setting will be applied for this layout', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit'   => array(
								'label'   => esc_html__( 'Inherit', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'boxed'     => array(
								'label'   => esc_html__( 'Boxed', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'Fullwidth', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
							),
						),
					),
					'jardinier_footer_container_type'  => array(
						'type'          => 'radio',
						'parent'        => 'layout_tab',
						'title'         => esc_html__( 'Footer layout', 'jardinier' ),
						'description'   => esc_html__( 'Footer layout global settings redefining. If you select inherit option, global setting will be applied for this layout', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit'   => array(
								'label'   => esc_html__( 'Inherit', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'boxed'     => array(
								'label'   => esc_html__( 'Boxed', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'Fullwidth', 'jardinier' ),
								'img_src' => trailingslashit( JARDINIER_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
							),
						),
					),
					'jardinier_header_layout_type' => array(
						'type'    => 'radio',
						'parent'  => 'header_tab',
						'title'   => esc_html__( 'Header Layout', 'jardinier' ),
						'value'   => 'inherit',
						'options' => jardinier_get_header_layout_pm_options(),
					),
					'jardinier_header_nav_panel_position' => array(
						'type'          => 'radio',
						'parent'        => 'header_tab',
						'title'         => esc_html__( 'Navigation section position', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => array(
								'label' => esc_html__( 'Inherit', 'jardinier' ),
							),
							'static'    => array(
								'label' => esc_html__( 'Static', 'jardinier' ),
							),
							'over'   => array(
								'label' => esc_html__( 'Over Content', 'jardinier' ),
							),
						),
						'master' => 'header_layout_type_style_5',
					),
					'jardinier_header_transparent_layout' => array(
						'type'          => 'radio',
						'parent'        => 'header_tab',
						'title'         => esc_html__( 'Header Overlay', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => array(
								'label' => esc_html__( 'Inherit', 'jardinier' ),
							),
							'true'    => array(
								'label' => esc_html__( 'Enable', 'jardinier' ),
							),
							'false'   => array(
								'label' => esc_html__( 'Disable', 'jardinier' ),
							),
						),
					),
					'jardinier_header_invert_color_scheme' => array(
						'type'          => 'radio',
						'parent'        => 'header_tab',
						'title'         => esc_html__( 'Invert Color Scheme', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => array(
								'label' => esc_html__( 'Inherit', 'jardinier' ),
							),
							'true'    => array(
								'label' => esc_html__( 'Enable', 'jardinier' ),
							),
							'false'   => array(
								'label' => esc_html__( 'Disable', 'jardinier' ),
							),
						),
					),
					'jardinier_top_panel_visibility' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Top panel', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_header_top_panel_contact_block_visibility' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Top Panel Contact Block', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_header_contact_block_visibility' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Header Contact Block', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_header_btn_visibility' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Header CTA button', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_header_search' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Header Search', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_header_menu_style' => array(
						'type'          => 'select',
						'parent'        => 'header_elements_tab',
						'title'         => esc_html__( 'Main menu style', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'style-1' => esc_html__( 'Style 1', 'jardinier' ),
							'style-2' => esc_html__( 'Style 2', 'jardinier' ),
						),
					),
					'jardinier_breadcrumbs_visibillity' => array(
						'type'          => 'radio',
						'parent'        => 'breadcrumbs_tab',
						'title'         => esc_html__( 'Breadcrumbs visibillity', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => array(
								'label' => esc_html__( 'Inherit', 'jardinier' ),
							),
							'true'    => array(
								'label' => esc_html__( 'Enable', 'jardinier' ),
							),
							'false'   => array(
								'label' => esc_html__( 'Disable', 'jardinier' ),
							),
						),
					),
					'jardinier_footer_layout_type' => array(
						'type'    => 'select',
						'parent'  => 'footer_tab',
						'title'   => esc_html__( 'Footer Layout', 'jardinier' ),
						'value'   => 'inherit',
						'options' => jardinier_get_footer_layout_pm_options(),
					),
					'jardinier_footer_widget_area_visibility' => array(
						'type'          => 'select',
						'parent'        => 'footer_tab',
						'title'         => esc_html__( 'Footer Widgets Area', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
					'jardinier_footer_contact_block_visibility' => array(
						'type'          => 'select',
						'parent'        => 'footer_tab',
						'title'         => esc_html__( 'Footer Contact Block', 'jardinier' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options' => array(
							'inherit' => esc_html__( 'Inherit', 'jardinier' ),
							'true'    => esc_html__( 'Enable', 'jardinier' ),
							'false'   => esc_html__( 'Disable', 'jardinier' ),
						),
					),
				),
			) ) );
		}

		/**
		 * Load admin files for the theme.
		 *
		 * @since 1.0.0
		 */
		public function admin() {

			// Check if in the WordPress admin.
			if ( ! is_admin() ) {
				return;
			}
		}

		/**
		 * Enqueue admin-specific assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_admin_assets( $hook ) {

			wp_enqueue_style( 'jardinier-admin-fix-style', JARDINIER_THEME_CSS . '/admin-fix.min.css', array(), JARDINIER_THEME_VERSION );

			$available_pages = array(
				'widgets.php',
			);

			if ( ! in_array( $hook, $available_pages ) ) {
				return;
			}

			wp_enqueue_style( 'jardinier-admin-style', JARDINIER_THEME_CSS . '/admin.min.css', array(), JARDINIER_THEME_VERSION );
		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {
			wp_register_script( 'jquery-slider-pro', JARDINIER_THEME_JS . '/min/jquery.slider-pro.min.js', array( 'jquery' ), '1.2.4', true );
			wp_register_script( 'jquery-swiper', JARDINIER_THEME_JS . '/min/swiper.jquery.min.js', array( 'jquery' ), '3.3.0', true );
			wp_register_script( 'magnific-popup', JARDINIER_THEME_JS . '/min/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_register_script( 'object-fit-images', JARDINIER_THEME_JS . '/min/ofi.min.js', array(), '3.0.1', true );

			wp_register_style( 'jquery-slider-pro', JARDINIER_THEME_CSS . '/slider-pro.min.css', array(), '1.2.4' );
			wp_register_style( 'jquery-swiper', JARDINIER_THEME_CSS . '/swiper.min.css', array(), '3.3.0' );
			wp_register_style( 'magnific-popup', JARDINIER_THEME_CSS . '/magnific-popup.min.css', array(), '1.1.0' );
			wp_register_style( 'font-awesome', JARDINIER_THEME_CSS . '/font-awesome.min.css', array(), '4.7.0' );
			wp_register_style( 'nucleo-outline', JARDINIER_THEME_CSS . '/nucleo-outline.css', array(), '1.0.0' );
			wp_register_style( 'nucleo-mini', JARDINIER_THEME_CSS . '/nucleo-mini.css', array(), '1.0.0' );
		}

		/**
		 * Enqueue assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {

			wp_enqueue_style( 'jardinier-theme-style', get_stylesheet_uri(),
				array( 'font-awesome', 'magnific-popup', 'nucleo-outline', 'nucleo-mini' ),
				JARDINIER_THEME_VERSION
			);

			wp_enqueue_style('custom-style', JARDINIER_THEME_CSS.'/custom.css', array(), '1.0.0');

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$depends = apply_filters( 'jardinier_theme_script_depends', array( 'cherry-js-core', 'hoverIntent' ) );

			wp_enqueue_script( 'jardinier-theme-script', JARDINIER_THEME_JS . '/theme-script.js', $depends, JARDINIER_THEME_VERSION, true );

			wp_add_inline_style( 'jardinier-theme-style', jardinier_breadcrumns_inline_css() );

			/**
			 * Filter the strings that send to scripts.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$labels = apply_filters( 'jardinier_theme_localize_labels', array(
				'totop_button'  => '',
				'header_layout' => get_theme_mod( 'header_layout_type', jardinier_theme()->customizer->get_default( 'header_layout_type' ) ),
			) );

			$more_button_options = apply_filters( 'jardinier_theme_more_button_options', array(
				'more_button_type'             => get_theme_mod( 'more_button_type', jardinier_theme()->customizer->get_default( 'more_button_type' ) ),
				'more_button_text'             => get_theme_mod( 'more_button_text', jardinier_theme()->customizer->get_default( 'more_button_text' ) ),
				'more_button_icon'             => get_theme_mod( 'more_button_icon', jardinier_theme()->customizer->get_default( 'more_button_icon' ) ),
				'more_button_image_url'        => get_theme_mod( 'more_button_image_url', jardinier_theme()->customizer->get_default( 'more_button_image_url' ) ),
				'retina_more_button_image_url' => get_theme_mod( 'retina_more_button_image_url', jardinier_theme()->customizer->get_default( 'retina_more_button_image_url' ) ),
			) );

			wp_localize_script( 'jardinier-theme-script', 'jardinier', apply_filters(
				'jardinier_theme_script_variables',
				array(
					'ajaxurl'             => esc_url( admin_url( 'admin-ajax.php' ) ),
					'labels'              => $labels,
					'more_button_options' => $more_button_options,
				) ) );

			// Threaded Comments.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Denqueue duplicate assets.
		 *
		 * @since 1.0.0
		 */
		public function denqueue_assets() {

			/**
			 * Filter the dequeue handles.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$dequeue_handles = apply_filters( 'jardinier_dequeue_handles', array(
				'style' => array(
					'tm-pg-grid',
					'tm-pg-font-awesome',
				),

				'script' => array(
					'booked-font-awesome',
				),
			) );

			foreach ( $dequeue_handles[ 'style' ] as $handle ) {
				wp_dequeue_style( $handle );
			}

			foreach ( $dequeue_handles[ 'script' ] as $handle ) {
				wp_dequeue_script( $handle );
			}

		}

		/**
		 * Overrides the load textdomain functionality when 'cherry-framework' is the domain in use.
		 *
		 * @since  1.0.0
		 * @link   https://gist.github.com/justintadlock/7a605c29ae26c80878d0
		 *
		 * @param  bool   $override Override.
		 * @param  string $domain   Text domain.
		 * @param  string $mofile   Mofile.
		 *
		 * @return bool
		 */
		public function override_load_textdomain( $override, $domain, $mofile ) {

			// Check if the domain is our framework domain.
			if ( 'cherry-framework' === $domain ) {

				global $l10n;

				// If the theme's textdomain is loaded, assign the theme's translations
				// to the framework's textdomain.
				if ( isset( $l10n['jardinier'] ) ) {
					$l10n[ $domain ] = $l10n['jardinier'];
				}

				// Always override.  We only want the theme to handle translations.
				$override = true;
			}

			return $override;
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
} // End if().

/**
 * Returns instance of main theme configuration class.
 *
 * @since  1.0.0
 * @return object
 */
function jardinier_theme() {
	return Jardinier_Theme_Setup::get_instance();
}

jardinier_theme();

// Register Polylang translate strings
pll_register_string( 'show again check', 'Don\'t show again', 'cherry-popups', false );

//todo попытка изменить слаг services
/*add_filter( 'cherry_services_post_type_args', '_my_rewrite_slug' );
function _my_rewrite_slug( $args ) {
    $args['rewrite']['slug'] = 'services';
    return $args;
}
*/
//Change currency symbol
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {

	$currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );

	return $currencies;

}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

	switch( $currency ) {

		case 'UAH': $currency_symbol = '&nbsp;грн.'; break;

	}

	return $currency_symbol;

}
