<?php
/**
 * Head banner section settings.
 *
 * @package Postmandu
 */

$defaults = postmandu_get_default_theme_options();
/**
 *
 * Add Section
 */
Kirki::add_section(
	'frontpage_banner',
	array(
		'title' => __( 'Header Banner Settings', 'postmandu' ),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'banner_toggle',
		'label'    => esc_html__( 'Show Header Banner', 'postmandu' ),
		'section'  => 'frontpage_banner',
		'default'  => '0',
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_title',
		'label'    => esc_html__( 'Heading', 'postmandu' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_subtitle',
		'label'    => esc_html__( 'Sub-Heading', 'postmandu' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_button_label',
		'label'    => esc_html__( 'Button Label', 'postmandu' ),
		'section'  => 'frontpage_banner',
	)
);


Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'link',
		'settings' => 'banner_button_link',
		'label'    => __( 'Button Link', 'postmandu' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_bg_color',
		'label'     => __( 'Background Color', 'postmandu' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.front-page .header-banner',
				'property' => 'background-color',
			),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_color',
		'label'     => __( 'Color', 'postmandu' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.front-page .header-banner',
				'property' => 'color',
			),
		),
	)
);


Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'        => 'cropped_image',
		'settings'    => 'banner_bg_image',
		'label'       => esc_html__( 'Background Image', 'postmandu' ),
		'section'     => 'frontpage_banner',
		'width'       => 1900,
		'height'      => 1080,
		'flex-width'  => true,
		'flex-height' => true,
		'output'      => array(
			array(
				'element'  => '.header-banner',
				'property' => 'background-image',
			),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'banner_padding',
		'label'     => esc_html__( 'Banner Paddings', 'postmandu' ),
		'section'   => 'frontpage_banner',
		'default'   => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'postmandu' ),
				'padding-right'  => esc_html__( 'Padding Right', 'postmandu' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'postmandu' ),
				'padding-left'   => esc_html__( 'Padding Left', 'postmandu' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => 'padding-top',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-left',
			),
		),
	)
);

