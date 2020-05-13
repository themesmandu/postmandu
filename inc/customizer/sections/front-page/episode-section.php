<?php
/**
 * episode settings section.
 *
 * @package Postmandu
 */

$defaults = postmandu_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'episode_section',
	array(
		'title' => __( 'Episodes Section', 'postmandu' ),
		'panel' => 'front_page_options',
	)
);

// Setting background image
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'episode_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'postmandu' ),
		'section'  => 'episode_section',
		'output'   => array(
			array(
				'element'  => '.latest-episode',
				'property' => 'background-image',
			),
		),

	)
);



// Setting gradient overlay.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'episode_section_overlay',
		'label'     => esc_html__( 'Section Background Overlay', 'postmandu' ),
		'section'   => 'episode_section',
		'default'   => $defaults['episode_section_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.latest-episode .overlay',
				'property' => 'background',
			),
		),
	)
);

// Section Text Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'episode_section_color',
		'label'     => __( 'Section Text Color', 'postmandu' ),
		'section'   => 'episode_section',
		'default'   => $defaults['episode_section_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.latest-episode',
				'property' => 'color',
			),
		),
	)
);

// Section preset Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'        => 'color',
		'settings'    => 'episode_section_preset_color',
		'label'       => __( 'Section Preset Color', 'postmandu' ),
		'description' => __( 'Includes title,button,sort colors', 'postmandu' ),
		'section'     => 'episode_section',
		'default'     => $defaults['episode_section_color'],
		'choices'     => array(
			'alpha' => true,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.latest-episode',
				'property' => 'color',
			),
		),
	)
);



// Setting heading.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'episode_section_title',
		'label'    => __( 'Section Heading', 'postmandu' ),
		'section'  => 'episode_section',
	)
);

Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'episode_section_button_label',
		'label'    => esc_html__( 'Button Label', 'postmandu' ),
		'section'  => 'episode_section',
	)
);


Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'     => 'link',
		'settings' => 'episode_section_button_link',
		'label'    => __( 'Button Link', 'postmandu' ),
		'section'  => 'episode_section',
	)
);


