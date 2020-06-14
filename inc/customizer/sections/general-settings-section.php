<?php
/**
 * General settings section.
 *
 * @package Postmandu
 */

$defaults = postmandu_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'general_options',
	array(
		'title' => __( 'General Settings', 'postmandu' ),
	)
);


Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'skip_to_content_toggle',
		'label'    => esc_html__( 'Show Skip To Content', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => $defaults['skip_to_content_toggle'],
	)
);



Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'menubar_mode',
		'label'    => esc_html__( 'Main Menu Bar Mode', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => $defaults['menubar_mode'],
		'choices'  => array(
			'standard' => esc_html__( 'Withought Search', 'postmandu' ),
			'alt'      => esc_html__( 'With Search', 'postmandu' ),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'mainmenu_style',
		'label'    => esc_html__( 'Main Menu: Style', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => 'regular',
		'choices'  => array(
			'regular' => esc_html__( 'Regular', 'postmandu' ),
			'fixed'   => esc_html__( 'Fixed', 'postmandu' ),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'mainmenu_dropdown_mode',
		'label'    => esc_html__( 'Main Menu: Appearance(small screen)', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => 'default',
		'choices'  => array(
			'default'   => get_template_directory_uri() . '/assets/images/menu-left.png',
			'bootstrap' => get_template_directory_uri() . '/assets/images/menu-top.png',
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'sidebar_position',
		'label'    => esc_html__( 'Sidebar Displays', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => $defaults['sidebar_position'],
		'choices'  => array(
			'left'  => get_template_directory_uri() . '/assets/images/sidebar-left.png',
			'none'  => get_template_directory_uri() . '/assets/images/sidebar-none.png',
			'right' => get_template_directory_uri() . '/assets/images/sidebar-right.png',
		),
	)
);

// Setting sidebar bg.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'sidebar_bg',
		'label'     => __( 'Sidebar Background Color', 'postmandu' ),
		'section'   => 'general_options',
		'default'   => '#101010',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#sidebar .sidebar',
				'property' => 'background-color',
			),
		),
	)
);

// Setting sidebar color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'sidebar_color',
		'label'     => __( 'Sidebar Color', 'postmandu' ),
		'section'   => 'general_options',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#sidebar .sidebar',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_blur',
		'label'    => esc_html__( 'Sidebar Box Shadow Blur(px)', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_color'  => 'sidebar_bs_color',
				),
			),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'sidebar_bs_spread',
		'label'    => esc_html__( 'Sidebar Box Shadow Spread(px)', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px shadow_blurpx $px shadow_color',
				'pattern_replace' => array(
					'shadow_color' => 'sidebar_bs_color',
					'shadow_blur'  => 'sidebar_bs_blur',
				),
			),
		),
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'sidebar_bs_color',
		'label'    => __( 'Sidebar Box Shadow Color', 'postmandu' ),
		'section'  => 'general_options',
		'default'  => 'rgba(0,0,0,0)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => '#sidebar .sidebar',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px shadow_spreadpx shadow_blurpx $',
				'pattern_replace' => array(
					'shadow_spread' => 'sidebar_bs_spread',
					'shadow_blur'   => 'sidebar_bs_blur',
				),
			),
		),
	)
);
