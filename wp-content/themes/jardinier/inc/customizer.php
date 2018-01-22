<?php
/**
 * Theme Customizer.
 *
 * @package Jardinier
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function jardinier_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'jardinier_get_customizer_options' , array(
		'prefix'     => 'jardinier',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Identity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'jardinier' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'jardinier' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'jardinier' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `General Site settings` panel */
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'jardinier' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'jardinier' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'jardinier' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'jardinier' ),
					'text'  => esc_html__( 'Text', 'jardinier' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload logo image', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload logo image', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'jardinier' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => jardinier_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => '600',
				'field'           => 'select',
				'choices'         => jardinier_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => '24',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'jardinier' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => jardinier_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'jardinier' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'jardinier' ),
					'minified' => esc_html__( 'Minified', 'jardinier' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_bg_color' => array(
				'title'   => esc_html__( 'Breadcrumbs background color', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'breadcrumbs_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'jardinier' ),
				'section' => 'breadcrumbs',
				'field'   => 'image',
				'default' => '%s/assets/images/texture.png',
				'type'    => 'control',
			),
			'breadcrumbs_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => jardinier_get_bg_repeat(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => 'center',
				'field'   => 'select',
				'choices' => jardinier_get_bg_position(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => 'auto',
				'field'   => 'select',
				'choices' => jardinier_get_bg_size(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'jardinier' ),
				'section' => 'breadcrumbs',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => jardinier_get_bg_attachment(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_image_opacity' => array(
				'title'       => esc_html__( 'Background image opacity', 'jardinier' ),
				'section'     => 'breadcrumbs',
				'default'     => 1,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'jardinier' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'jardinier' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'jardinier' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'jardinier' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'jardinier' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'jardinier' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'jardinier' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'jardinier' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'jardinier' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'jardinier' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'jardinier' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'jardinier' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'jardinier' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'jardinier' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'jardinier' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'jardinier' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'jardinier' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'jardinier' ),
				'description' => esc_html__( 'Configure Color Scheme', 'jardinier' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'jardinier' ),
				'priority'    => 10,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#62be1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#fe8a01',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_4' => array(
				'title'   => esc_html__( 'Accent color (4)', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#6ac11c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#79787f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#62be1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'jardinier' ),
				'section' => 'regular_scheme',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'jardinier' ),
				'priority'    => 20,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#79787f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#62be1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'jardinier' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Greyscale colors` section */
			'grey_scheme' => array(
				'title'       => esc_html__( 'Greyscale colors', 'jardinier' ),
				'priority'    => 30,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),

			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'jardinier' ),
				'section' => 'grey_scheme',
				'default' => '#d2d2d3',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'grey_color_2' => array(
				'title'   => esc_html__( 'Grey color (2)', 'jardinier' ),
				'section' => 'grey_scheme',
				'default' => '#e3e2e7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'grey_color_3' => array(
				'title'   => esc_html__( 'Grey color (3)', 'jardinier' ),
				'section' => 'grey_scheme',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'jardinier' ),
				'description' => esc_html__( 'Configure typography settings', 'jardinier' ),
				'priority'    => 50,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'jardinier' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'body_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'body_typography',
				'default'     => '1.643',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'jardinier' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h1_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h1_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h1_typography',
				'default'     => '64',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h1_typography',
				'default'     => '1.19',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'jardinier' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h2_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h2_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h2_typography',
				'default'     => '46',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h2_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'jardinier' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h3_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h3_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h3_typography',
				'default'     => '32',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h3_typography',
				'default'     => '1.344',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h3_typography',
				'default'     => '0.02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'jardinier' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h4_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h4_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h4_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h4_typography',
				'default'     => '1.45',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h4_typography',
				'default'     => '0.02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'jardinier' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h5_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h5_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h5_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h5_typography',
				'default'     => '0.02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'jardinier' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'h6_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'h6_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'h6_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'h6_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'jardinier' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => jardinier_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'jardinier' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'jardinier' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'meta_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'meta_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'meta_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'meta_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),

			/** `Main menu` section */
			'main_menu_typography' => array(
				'title'       => esc_html__( 'Main menu', 'jardinier' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'main_menu_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'jardinier' ),
				'section' => 'main_menu_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'main_menu_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'jardinier' ),
				'section' => 'main_menu_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => jardinier_get_font_styles(),
				'type'    => 'control',
			),
			'main_menu_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'jardinier' ),
				'section' => 'main_menu_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => jardinier_get_font_weight(),
				'type'    => 'control',
			),
			'main_menu_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'jardinier' ),
				'section'     => 'main_menu_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'main_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'jardinier' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'jardinier' ),
				'section'     => 'main_menu_typography',
				'default'     => '1.643',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'main_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'jardinier' ),
				'section'     => 'main_menu_typography',
				'default'     => '0.04',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'main_menu_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'jardinier' ),
				'section' => 'main_menu_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => jardinier_get_character_sets(),
				'type'    => 'control',
			),

			/** `Typography misc` section */
			'misc_styles' => array(
				'title'    => esc_html__( 'Misc', 'jardinier' ),
				'priority' => 60,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'word_wrap' => array(
				'title'   => esc_html__( 'Enable Word Wrap', 'jardinier' ),
				'section' => 'misc_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'jardinier' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Styles', 'jardinier' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => jardinier_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header overlay', 'jardinier' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => '__return_false',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'jardinier' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_nav_panel_type' => array(
				'title'   => esc_html__( 'Navigation section type', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'boxed',
				'field'   => 'select',
				'type'    => 'control',
				'choices' => array(
					'fullwidth' => esc_html__( 'Fullwidth', 'jardinier' ),
					'boxed'     => esc_html__( 'Boxed', 'jardinier' ),
				),
				'active_callback' => 'jardinier_is_header_layout_style_5',
			),
			'header_nav_panel_position' => array(
				'title'   => esc_html__( 'Navigation section position', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'static',
				'field'   => 'select',
				'type'    => 'control',
				'choices' => array(
					'static' => esc_html__( 'Static', 'jardinier' ),
					'over'   => esc_html__( 'Over Content', 'jardinier' ),
				),
				'active_callback' => 'jardinier_is_header_layout_style_5',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'jardinier' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'jardinier' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => jardinier_get_bg_repeat(),
				'type'    => 'control',
			),
			'header_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => jardinier_get_bg_position(),
				'type'    => 'control',
			),
			'header_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => jardinier_get_bg_size(),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'jardinier' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => jardinier_get_bg_attachment(),
				'type'    => 'control',
			),

			/** `Header elements` section */
			'header_elements' => array(
				'title'       => esc_html__( 'Header Elements', 'jardinier' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Show search', 'jardinier' ),
				'section' => 'header_elements',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_woo_elements' => array(
				'title'           => esc_html__( 'Show woocommerce elements', 'jardinier' ),
				'section'         => 'header_elements',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_woocommerce_activated',
			),
			'header_btn_visibility' => array(
				'title'   => esc_html__( 'Show header call to action button', 'jardinier' ),
				'section' => 'header_elements',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_text' => array(
				'title'           => esc_html__( 'Header call to action button', 'jardinier' ),
				'description'     => esc_html__( 'Button text', 'jardinier' ),
				'section'         => 'header_elements',
				'default'         => esc_html__( 'Make an Appointment', 'jardinier' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),
			'header_btn_icon' => array(
				'title'           => esc_html__( 'Header button icon', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_elements',
				'field'           => 'iconpicker',
				'default'         => 'education_agenda-bookmark',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),
			'header_btn_icon_location' => array(
				'title'   => esc_html__( 'Header icon location', 'jardinier' ),
				'section' => 'header_elements',
				'default' => 'left',
				'field'   => 'radio',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'jardinier' ),
					'right'  => esc_html__( 'Right', 'jardinier' ),
				),
				'type'    => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),
			'header_btn_url' => array(
				'title'           => '',
				'description'     => esc_html__( 'Button url', 'jardinier' ),
				'section'         => 'header_elements',
				'default'         => '%%home_url%%booked',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),
			'header_btn_target' => array(
				'title'           => esc_html__( 'Open Link in New Tab', 'jardinier' ),
				'section'         => 'header_elements',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),
			'header_btn_style' => array(
				'title'   => esc_html__( 'Header button style', 'jardinier' ),
				'section' => 'header_elements',
				'default' => 'accent-1',
				'field'   => 'radio',
				'choices' => array(
					'accent-1'  => esc_html__( 'Accent 1', 'jardinier' ),
					'accent-2'  => esc_html__( 'Accent 2', 'jardinier' ),
				),
				'type'    => 'control',
				'active_callback' => 'jardinier_is_header_btn_visible',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'       => esc_html__( 'Header Contact Block', 'jardinier' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'jardinier' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'ui-2_time-clock',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => jardinier_get_default_contact_information( 'work-time' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'location_pin',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => jardinier_get_default_contact_information( 'address' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'ui-3_phone',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => esc_html__( 'Call Us:', 'jardinier' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),
			'header_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_contact_block',
				'default'         => jardinier_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_contact_block_enable',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'jardinier' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'jardinier' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'           => esc_html__( 'Disclaimer Text', 'jardinier' ),
				'description'     => esc_html__( 'HTML formatting support', 'jardinier' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_enable',
			),
			'top_panel_bg'        => array(
				'title'           => esc_html__( 'Background color', 'jardinier' ),
				'section'         => 'header_top_panel',
				'default'         => '#1e1d24',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_enable',
			),
			'top_menu_visibility' => array(
				'title'           => esc_html__( 'Show top menu', 'jardinier' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_enable',
			),
			'login_link_visibility' => array(
				'title'           => esc_html__( 'Show login link', 'jardinier' ),
				'section'         => 'header_top_panel',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_enable',
			),

			/** `Header contact block` section */
			'header_top_panel_contact_block' => array(
				'title'       => esc_html__( 'Top Panel Contact Block', 'jardinier' ),
				'description' => esc_html__( 'This block shows only if Top Panel section is enabled!', 'jardinier' ),
				'priority'    => 25,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_top_panel_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'jardinier' ),
				'section' => 'header_top_panel_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_top_panel_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'ui-3_phone',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => 'Call:',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => jardinier_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'field'           => 'iconpicker',
				'default'         => 'ui-2_time-clock',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => jardinier_get_default_contact_information( 'info' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_icon_4' => array(
				'title'           => esc_html__( 'Contact item 4', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_label_4' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),
			'header_top_panel_contact_text_4' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'jardinier' ),
				'section'         => 'header_top_panel_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_top_panel_contact_block_enable',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'jardinier' ),
				'priority' => 30,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'jardinier' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'jardinier' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_style' => array(
				'title'   => esc_html__( 'Menu style', 'jardinier' ),
				'section' => 'header_main_menu',
				'default' => 'style-1',
				'field'   => 'radio',
				'choices' => array(
					'style-1' => esc_html__( 'Style 1', 'jardinier' ),
					'style-2' => esc_html__( 'Style 2', 'jardinier' ),
				),
				'type'    => 'control',
			),
			'more_button_type' => array(
				'title'   => esc_html__( 'More Menu Button Type', 'jardinier' ),
				'section' => 'header_main_menu',
				'default' => 'text',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'jardinier' ),
					'icon'  => esc_html__( 'Icon', 'jardinier' ),
					'text'  => esc_html__( 'Text', 'jardinier' ),
				),
				'type'    => 'control',
			),
			'more_button_text' => array(
				'title'           => esc_html__( 'More Menu Button Text', 'jardinier' ),
				'section'         => 'header_main_menu',
				'default'         => esc_html__( 'More', 'jardinier' ),
				'field'           => 'input',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_more_button_type_text',
			),
			'more_button_icon' => array(
				'title'           => esc_html__( 'More Menu Button Icon', 'jardinier' ),
				'section'         => 'header_main_menu',
				'field'           => 'iconpicker',
				'type'            => 'control',
				'default'         => 'arrows-1_minimal-down',
				'active_callback' => 'jardinier_is_more_button_type_icon',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
			),
			'more_button_image_url' => array(
				'title'           => esc_html__( 'More Button Image Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload More Button image', 'jardinier' ),
				'section'         => 'header_main_menu',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_more_button_type_image',
			),
			'retina_more_button_image_url' => array(
				'title'           => esc_html__( 'Retina More Button Image Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload More Button image for retina-ready devices', 'jardinier' ),
				'section'         => 'header_main_menu',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_more_button_type_image',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'jardinier' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'jardinier' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'jardinier' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'jardinier' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'jardinier' ),
				),
				'type' => 'control',
			),
			'sidebar_services' => array(
				'title'           => esc_html__( 'Enable services sidebar area on single service. If disbled will display default sidebar area.', 'jardinier' ),
				'section'         => 'sidebar_settings',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_services_activated',
			),
			'sidebar_projects' => array(
				'title'           => esc_html__( 'Enable projects sidebar area on single project. If disbled will display default sidebar area.', 'jardinier' ),
				'section'         => 'sidebar_settings',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_projects_activated',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'jardinier' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'jardinier' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'jardinier' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'jardinier' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'jardinier' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'jardinier' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'jardinier' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'jardinier' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'jardinier' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'jardinier' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'jardinier' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_url' => array(
				'title'           => esc_html__( 'Logo upload', 'jardinier' ),
				'section'         => 'footer_styles',
				'field'           => 'image',
				'default'         => '%s/assets/images/footer-logo.png',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_logo_enable',
			),
			'invert_footer_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'jardinier' ),
				'description'     => esc_html__( 'Upload logo image', 'jardinier' ),
				'section'         => 'footer_styles',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_header_logo_image',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => jardinier_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => jardinier_get_footer_layout_options(),
				'type' => 'control',
			),
			'footer_bg_first' => array(
				'title'           => esc_html__( 'Footer Background first row color', 'jardinier' ),
				'section'         => 'footer_styles',
				'default'         => '#ffffff',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_style_1_enable',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => '#1e1d24',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'           => esc_html__( 'Widget Area Columns', 'jardinier' ),
				'section'         => 'footer_styles',
				'default'         => '4',
				'field'           => 'select',
				'choices'         => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_area_enable',
			),
			'footer_widgets_bg' => array(
				'title'           => esc_html__( 'Footer Widgets Area Background color', 'jardinier' ),
				'section'         => 'footer_styles',
				'default'         => '#f6f6f6',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_area_enable',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'jardinier' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'jardinier' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'jardinier' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => jardinier_get_nc_outline_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => jardinier_get_nc_outline_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'jardinier' ),
				'description'     => esc_html__( 'Choose icon', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => jardinier_get_nc_outline_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),
			'footer_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'jardinier' ),
				'section'         => 'footer_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_footer_contact_block_enable',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'jardinier' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'jardinier' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'jardinier' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'jardinier' ),
					'default-modern'   => esc_html__( 'Modern Listing', 'jardinier' ),
					'grid'             => esc_html__( 'Grid', 'jardinier' ),
					'masonry'          => esc_html__( 'Masonry', 'jardinier' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'jardinier' ),
				),
				'type' => 'control',
			),
			'blog_layout_columns' => array(
				'title'           => esc_html__( 'Columns', 'jardinier' ),
				'section'         => 'blog',
				'default'         => '3-cols',
				'field'           => 'select',
				'choices'         => array(
					'2-cols' => esc_html__( '2 columns', 'jardinier' ),
					'3-cols' => esc_html__( '3 columns', 'jardinier' ),
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_blog_layout_type_grid_masonry',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'jardinier' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'jardinier' ),
					'icon'  => esc_html__( 'Font Icon', 'jardinier' ),
					'both'  => esc_html__( 'Text with Icon', 'jardinier' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'jardinier' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'ui-2_favourite-31',
				'icon_data'       => jardinier_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'jardinier' ),
				'description'     => esc_html__( 'Label for sticky post', 'jardinier' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'jardinier' ),
				'field'           => 'text',
				'active_callback' => 'jardinier_is_sticky_text',
				'type'            => 'control',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'jardinier' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'jardinier' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'jardinier' ),
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_blog_featured_image',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'jardinier' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'jardinier' ),
					'full'    => esc_html__( 'Full content', 'jardinier' ),
					'none'    => esc_html__( 'Hide', 'jardinier' ),
				),
				'type' => 'control',
			),
			'blog_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the excerpt', 'jardinier' ),
				'section'         => 'blog',
				'default'         => '30',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_blog_posts_content_type_excerpt',
			),
			'blog_read_more_btn' => array(
				'title'   => esc_html__( 'Show Read More button', 'jardinier' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read More button text', 'jardinier' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Read more', 'jardinier' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_blog_read_more_btn_enable',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'jardinier' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'jardinier' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'jardinier' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'jardinier' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'jardinier' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'jardinier' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'jardinier' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'jardinier' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'jardinier' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'jardinier' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Latest posts', 'jardinier' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'jardinier' ),
					'3' => esc_html__( '3 columns', 'jardinier' ),
					'4' => esc_html__( '4 columns', 'jardinier' ),
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_title' => array(
				'title'           => esc_html__( 'Show post title', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_title_length' => array(
				'title'           => esc_html__( 'Number of words in the title', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_image' => array(
				'title'           => esc_html__( 'Show post image', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_content' => array(
				'title'           => esc_html__( 'Display content', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => 'hide',
				'field'           => 'select',
				'choices'         => array(
					'hide'         => esc_html__( 'Hide', 'jardinier' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'jardinier' ),
					'post_content' => esc_html__( 'Content', 'jardinier' ),
				),
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the content', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_categories' => array(
				'title'           => esc_html__( 'Show post categories', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_tags' => array(
				'title'           => esc_html__( 'Show post tags', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'jardinier' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'jardinier_is_related_posts_enable',
			),

			/** `Woocommerce Settings` panel */
			'woocommerce_settings' => array(
				'title'           => esc_html__( 'Woocommerce options', 'jardinier' ),
				'priority'        => 120,
				'type'            => 'panel',
				'active_callback' => 'jardinier_is_woocommerce_activated',
			),
			/** `Badge` section */
			'woo_badge_options' => array(
				'title'    => esc_html__( 'Woocommerce badge', 'jardinier' ),
				'panel'    => 'woocommerce_settings',
				'priority' => 10,
				'type'     => 'section',
			),
			'onsale_badge_bg' => array(
				'title'   => esc_html__( 'Onsale badge background', 'jardinier' ),
				'section' => 'woo_badge_options',
				'default' => '#ff3a4c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'featured_badge_bg' => array(
				'title'   => esc_html__( 'Featured badge background', 'jardinier' ),
				'section' => 'woo_badge_options',
				'default' => '#fcfa06',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'new_badge_bg' => array(
				'title'   => esc_html__( 'New badge background', 'jardinier' ),
				'section' => 'woo_badge_options',
				'default' => '#04e2f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page Style', 'jardinier' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'jardinier' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'page_404_image' => array(
				'title'   => esc_html__( '404 Image', 'jardinier' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/404.jpg',
				'type'    => 'control',
			),
			'page_404_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'jardinier' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'jardinier' ),
				'section'     => 'page_404_options',
				'default'     => 'dark',
				'field'       => 'select',
				'choices'     => jardinier_get_text_color(),
				'type'        => 'control',
			),
			'page_404_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'jardinier' ),
				'section' => 'page_404_options',
				'default' => 'accent-1',
				'field'   => 'select',
				'choices' => jardinier_get_btn_style_presets(),
				'type'    => 'control',
			),
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function jardinier_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function jardinier_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_logo_image( $control ) {
	return jardinier_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_logo_text( $control ) {
	return jardinier_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_blog_featured_image( $control ) {
	return jardinier_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_sticky_text( $control ) {
	return jardinier_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_sticky_icon( $control ) {
	return jardinier_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if More button (in the main menu) has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_more_button_type_image( $control ) {
	return jardinier_is_setting( $control, 'more_button_type', 'image' );
}

/**
 * Return true if More button (in the main menu) has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_more_button_type_text( $control ) {
	return jardinier_is_setting( $control, 'more_button_type', 'text' );
}

/**
 * Return true if More button (in the main menu) has icon type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_more_button_type_icon( $control ) {
	return jardinier_is_setting( $control, 'more_button_type', 'icon' );
}

/**
 * Return true if option Show header call to action button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_btn_enable( $control ) {
	return jardinier_is_setting( $control, 'header_btn_visibility', true );
}

/**
 * Return true if option Add button icon is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_btn_icon_enable( $control ) {
	return jardinier_is_setting( $control, 'header_btn_visibility', true ) && jardinier_is_setting( $control, 'header_btn_add_btn_icon', true );
}

/**
 * Return true if option Show Header Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_contact_block_enable( $control ) {
	return jardinier_is_setting( $control, 'header_contact_block_visibility', true );
}

/**
 * Return true if option Show Top panel Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_top_panel_contact_block_enable( $control ) {
	return jardinier_is_setting( $control, 'header_top_panel_contact_block_visibility', true );
}

/**
 * Return true if option Show Footer Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_footer_contact_block_enable( $control ) {
	return jardinier_is_setting( $control, 'footer_contact_block_visibility', true );
}

/**
 * Return true if option Show Related Posts Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_related_posts_enable( $control ) {
	return jardinier_is_setting( $control, 'related_posts_visible', true );
}

/**
 * Return true if option Enable Top Panel is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_top_panel_enable( $control ) {
	return jardinier_is_setting( $control, 'top_panel_visibility', true );
}

/**
 * Return true if option Show header call to action button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_btn_visible( $control ) {
	return jardinier_is_setting( $control, 'header_btn_visibility', true );
}

/**
 * Return true if option Show Footer Logo is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_footer_logo_enable( $control ) {
	return jardinier_is_setting( $control, 'footer_logo_visibility', true );
}

/**
 * Return true if option Show Footer Widgets Area is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_footer_area_enable( $control ) {
	return jardinier_is_setting( $control, 'footer_widget_area_visibility', true );
}

/**
 * Return true if option Footer style is layout-1. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_footer_style_1_enable( $control ) {
	return jardinier_is_setting( $control, 'footer_layout_type', 'style-1' );
}

/**
 * Return true if option Blog posts content is excerpt. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_blog_posts_content_type_excerpt( $control ) {
	return jardinier_is_setting( $control, 'blog_posts_content', 'excerpt' );
}

/**
 * Return true if option Show Read More button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_blog_read_more_btn_enable( $control ) {
	return jardinier_is_setting( $control, 'blog_read_more_btn', true );
}

/**
 * Return true if Blog layout selected Grid or Masonry. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_blog_layout_type_grid_masonry( $control ) {
	if ( in_array( $control->manager->get_setting( 'blog_layout_type' )->value(), array( 'grid', 'masonry' ) ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if option Header Layout type is style-5. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function jardinier_is_header_layout_style_5( $control ) {
	return jardinier_is_setting( $control, 'header_layout_type', 'style-5' );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function jardinier_get_header_layout_options() {
	return apply_filters( 'jardinier_header_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'jardinier' ),
		'style-2' => esc_html__( 'Style 2', 'jardinier' ),
		'style-3' => esc_html__( 'Style 3', 'jardinier' ),
		'style-4' => esc_html__( 'Style 4', 'jardinier' ),
		'style-5' => esc_html__( 'Style 5', 'jardinier' ),
		'style-6' => esc_html__( 'Style 6', 'jardinier' ),
		'style-7' => esc_html__( 'Style 7', 'jardinier' ),
	) );
}

/**
 * Get default footer layouts.
 *
 * @since  1.0.0
 * @return array
 */
function jardinier_get_footer_layout_options() {
	return apply_filters( 'jardinier_footer_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'jardinier' ),
		'style-2' => esc_html__( 'Style 2', 'jardinier' ),
		'style-3' => esc_html__( 'Style 3', 'jardinier' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function jardinier_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => array(
			'label' => esc_html__( 'Inherit', 'jardinier' ),
		),
	);

	$header_layouts = jardinier_get_header_layout_options();
	$options        = array();

	foreach ( $header_layouts as $layout => $label ) {
		$options[ $layout ] = array(
			'label' => $label,
			'slave' => 'header_layout_type_' . str_replace( '-', '_', $layout ),
		);
	}

	return array_merge( $inherit_option, $options );
}

/**
 * Get default footer layouts options for Post Meta boxes
 *
 * @return array
 */
function jardinier_get_footer_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'jardinier' ),
	);

	$options = jardinier_get_footer_layout_options();

	return array_merge( $inherit_option, $options );
}

// Change native customizer control (based on WordPress core).
add_action( 'customize_register', 'jardinier_customizer_change_core_controls', 20 );

// Bind JS handlers to instantly live-preview changes.
add_action( 'customize_preview_init', 'jardinier_customize_preview_js' );

/**
 * Change native customize control (based on WordPress core).
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function jardinier_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section         = 'jardinier_logo_favicon';
	$wp_customize->get_section( 'background_image' )->priority = 45;
	$wp_customize->get_control( 'background_color' )->label    = esc_html__( 'Body Background Color', 'jardinier' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function jardinier_customize_preview_js() {
	wp_enqueue_script( 'jardinier-customize-preview', JARDINIER_THEME_JS . '/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_font_styles() {
	return apply_filters( 'jardinier_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'jardinier' ),
		'italic'  => esc_html__( 'Italic', 'jardinier' ),
		'oblique' => esc_html__( 'Oblique', 'jardinier' ),
		'inherit' => esc_html__( 'Inherit', 'jardinier' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_character_sets() {
	return apply_filters( 'jardinier_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'jardinier' ),
		'greek'        => esc_html__( 'Greek', 'jardinier' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'jardinier' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'jardinier' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'jardinier' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'jardinier' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'jardinier' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_text_aligns() {
	return apply_filters( 'jardinier_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'jardinier' ),
		'center'  => esc_html__( 'Center', 'jardinier' ),
		'justify' => esc_html__( 'Justify', 'jardinier' ),
		'left'    => esc_html__( 'Left', 'jardinier' ),
		'right'   => esc_html__( 'Right', 'jardinier' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_font_weight() {
	return apply_filters( 'jardinier_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_bg_position() {
	return apply_filters( 'jardinier_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'jardinier' ),
		'top-center'    => esc_html__( 'Top Center', 'jardinier' ),
		'top-right'     => esc_html__( 'Top Right', 'jardinier' ),
		'center-left'   => esc_html__( 'Middle Left', 'jardinier' ),
		'center'        => esc_html__( 'Middle Center', 'jardinier' ),
		'center-right'  => esc_html__( 'Middle Right', 'jardinier' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'jardinier' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'jardinier' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'jardinier' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_bg_size() {
	return apply_filters( 'jardinier_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'jardinier' ),
		'cover'   => esc_html__( 'Cover', 'jardinier' ),
		'contain' => esc_html__( 'Contain', 'jardinier' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_bg_repeat() {
	return apply_filters( 'jardinier_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'jardinier' ),
		'repeat'    => esc_html__( 'Tile', 'jardinier' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'jardinier' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'jardinier' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_bg_attachment() {
	return apply_filters( 'jardinier_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'jardinier' ),
		'fixed'  => esc_html__( 'Fixed', 'jardinier' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function jardinier_get_text_color() {
	return apply_filters( 'jardinier_get_text_color', array(
		'light' => esc_html__( 'Light', 'jardinier' ),
		'dark'  => esc_html__( 'Dark', 'jardinier' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function jardinier_get_dynamic_css_options() {
	return apply_filters( 'jardinier_get_dynamic_css_options', array(
		'prefix'        => 'jardinier',
		'type'          => 'theme_mod',
		'parent_handle' => 'jardinier-theme-style',
		'single'        => true,
		'css_files'     => array(
			JARDINIER_THEME_DIR . '/assets/css/dynamic.css',

			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/header.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/forms.css' ,
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/social.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/post.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/site/buttons.css',

			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/custom-posts.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/playlist-slider.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/featured-posts-block.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/news-smart-box.css',
			JARDINIER_THEME_DIR . '/assets/css/dynamic/widgets/contact-information.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_bg_color',
			'breadcrumbs_bg_repeat',
			'breadcrumbs_bg_position',
			'breadcrumbs_bg_attachment',
			'breadcrumbs_bg_size',
			'breadcrumbs_bg_image_opacity',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',

			'main_menu_font_style',
			'main_menu_font_weight',
			'main_menu_font_size',
			'main_menu_line_height',
			'main_menu_font_family',
			'main_menu_letter_spacing',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_accent_color_4',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'grey_color_1',
			'grey_color_2',
			'grey_color_3',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position',
			'header_bg_attachment',
			'header_bg_size',

			'page_404_bg_color',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg_first',
			'footer_bg',

			'onsale_badge_bg',
			'featured_badge_bg',
			'new_badge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function jardinier_get_fonts_options() {
	return apply_filters( 'jardinier_get_fonts_options', array(
		'prefix'  => 'jardinier',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function jardinier_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% %%site-name%%. All Rights Reserved.', 'jardinier' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function jardinier_get_default_contact_information( $value ) {
	$contact_information = array(
		'work-time' => sprintf( '%1$s<br>%2$s', esc_html__( 'Mon – Fri: 10AM – 7PM;', 'jardinier' ), esc_html__( 'Sat – Sun: 10AM – 3PM', 'jardinier' ) ),
		'phones'    => sprintf( '<a href="tel:#">%1$s</a>', esc_html__( '(719) 445-2808', 'jardinier' ) ),
		'info'      => esc_html__( '24/7 Emergency Service', 'jardinier' ),
		'address'   => sprintf( '%1$s<br>%2$s', esc_html__( '4578 Marmora Road,', 'jardinier' ), esc_html__( 'Glasgow', 'jardinier' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function jardinier_get_icons_set() {

	static $font_icons;

	if ( ! $font_icons ) {

		ob_start();

		include JARDINIER_THEME_DIR . '/assets/js/icons.json';
		$json = ob_get_clean();

		$font_icons = array();
		$icons      = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$font_icons[] = $icon['id'];
		}
	}

	return $font_icons;
}

/**
 * Get nc-outline icons set.
 *
 * @return array
 */
function jardinier_get_nc_outline_icons_set() {

	static $nc_outline_icons;

	if ( ! $nc_outline_icons ) {
		ob_start();

		include JARDINIER_THEME_DIR . '/assets/css/nucleo-outline.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$nc_outline_icons = $matches[1];
	}

	return $nc_outline_icons;
}

/**
 * Get nc-mini icons set.
 *
 * @return array
 */
function jardinier_get_nc_mini_icons_set() {

	static $nc_mini_icons;

	if ( ! $nc_mini_icons ) {
		ob_start();

		include JARDINIER_THEME_DIR . '/assets/css/nucleo-mini.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$nc_mini_icons = $matches[1];
	}

	return $nc_mini_icons;
}

/**
 * Get nc-outline icons data for iconpicker control.
 *
 * @return array
 */
function jardinier_get_nc_outline_icons_data() {
	return apply_filters( 'jardinier_nc_outline_icons_data', array(
		'icon_set'    => 'jardinierNucleoOutlineIcons',
		'icon_css'    => JARDINIER_THEME_URI . '/assets/css/nucleo-outline.css',
		'icon_base'   => 'nc-icon-outline',
		'icon_prefix' => '',
		'icons'       => jardinier_get_nc_outline_icons_set(),
	) );
}

/**
 * Get nc-mini icons data for iconpicker control.
 *
 * @return array
 */
function jardinier_get_nc_mini_icons_data() {
	return apply_filters( 'jardinier_nc_mini_icons_data', array(
		'icon_set'    => 'jardinierNucleoMiniIcons',
		'icon_css'    => JARDINIER_THEME_URI . '/assets/css/nucleo-mini.css',
		'icon_base'   => 'nc-icon-mini',
		'icon_prefix' => '',
		'icons'       => jardinier_get_nc_mini_icons_set(),
	) );
}

/**
 * Get header button style presets.
 *
 * @return array
 */
function jardinier_get_btn_style_presets() {
	return apply_filters( 'jardinier_get_btn_style_presets', array(
		'accent-1' => esc_html__( 'Accent button 1', 'jardinier' ),
		'accent-2' => esc_html__( 'Accent button 2', 'jardinier' ),
	) );
}

/**
 * Check if Cherry Services plugin is activated.
 */
function jardinier_is_services_activated() {
	return class_exists( 'Cherry_Services_List' );
}

/**
 * Check if Cherry Projects plugin is activated.
 */
function jardinier_is_projects_activated() {
	return class_exists( 'Cherry_Projects' );
}
