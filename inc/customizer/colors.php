<?php
/**
 * Additional color settings.
 *
 * @package Postmandu
 */

$defaults = postmandu_get_default_theme_options();

/**
 *
 * Add Section colors to nav_menu Panel
 */
Kirki::add_section(
	'nav_menu_colors',
	array(
		'title'    => __( 'Menu Color Settings', 'postmandu' ),
		'panel'    => 'nav_menus',
		'priority' => 99,
	)
);

// menu bg color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_bar_bgcolor',
		'label'     => __( 'Main Menu Bar Background', 'postmandu' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_bar_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.main-navigation',
				'property' => 'background-color',
			),
		),
	)
);

// menu fixed bg color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_bar_scroll_bgcolor',
		'label'     => __( 'Main Menu Bar Background(fixed scroll)', 'postmandu' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_bar_scroll_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.main-navigation.fixed',
				'property' => 'background-color',
			),
		),
	)
);

// menu color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_color',
		'label'     => __( 'Main Menu Color', 'postmandu' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-nav .nav-link, .main-navigation .menu-item-has-children:after',
				'property' => 'color',
			),
			array(
				'element'  => '.menu-item-has-children:after',
				'property' => 'color',
			),
		),
	)
);

// menu hover color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'menu_hover_color',
		'label'     => __( 'Main Menu Hover Color', 'postmandu' ),
		'section'   => 'nav_menu_colors',
		'default'   => $defaults['menu_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-nav .nav-link:hover',
				'property' => 'color',
			),
		),
	)
);

// site ttle color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'site_title_color',
		'label'     => __( 'Site Title Color', 'postmandu' ),
		'section'   => 'title_tagline',
		'default'   => $defaults['site_title_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.navbar .navbar-brand, .navbar .navbar-brand:hover',
				'property' => 'color',
			),
			array(
				'element'  => '.site-branding span',
				'property' => 'color',
			),
		),
	)
);

// Text Link Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'link_color',
		'label'     => __( 'Text Link Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['link_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'a, .page-numbers.dots',
				'property' => 'color',
			),
		),
	)
);

// Text Link Hover Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'link_hover_color',
		'label'     => __( 'Text Link Hover Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['link_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'a:hover',
				'property' => 'color',
			),
		),
	)
);

// Button Background Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'postmandu_btn_color',
		'label'     => __( 'Button Background Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['postmandu_btn_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button, .btn-postmandu, .postmandu-span, #menu span, .skip-link, .tnp-widget-minimal input.tnp-submit, .tnp-field input[type="submit"], input[type="submit"]',
				'property' => 'background-color',
			),
			array(
				'element'  => 'span.page-numbers.current, section .wpcf7-form p input[type="submit"]',
				'property' => 'background-color',
			),
			array(
				'element'  => '#footer .footer-social-nav a:hover, .input-group>.input-group-append>.btn',
				'property' => 'background-color',
			),
			array(
				'element'  => '.podcast_player .mejs-container, .podcast_player .mejs-container .mejs-controls, .podcast_player .mejs-embed, .podcast_player .mejs-embed body',
				'property' => 'background',
			),
			array(
				'element'  => 'blockquote',
				'property' => 'border-color',
			),
			array(
				'element'  => 'a:hover, .main-navigation .menu-item.current-menu-item .nav-link, blockquote p,
				.main-navigation .menu-item.current-menu-item.menu-item-has-children:after, .guest-post, article.post .more-link, .sidebar .widget li a:hover',
				'property' => 'color',
			),
			array(
				'element'  => '.single-post .navigation .column h4:hover',
				'property' => 'color',
			),
		),
	)
);

// Button Background: Hover Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'postmandu_btn_hover_color',
		'label'     => __( 'Button Background: Hover Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['postmandu_btn_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button:hover, .btn-postmandu:hover, .skip-link:hover, input[type="submit"]:hover, .input-group>.input-group-append>.btn:hover, #cancel-comment-reply-link:hover',
				'property' => 'background-color',
			),
			array(
				'element'  => '',
				'property' => 'background-color',
			),
		),
	)
);

// Button Text Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'postmandu_btn_text_color',
		'label'     => __( 'Button Text Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['postmandu_btn_text_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button, .btn-postmandu, .postmandu-span, .skip-link, span.page-numbers.current',
				'property' => 'color',
			),
			array(
				'element'  => 'input[type="submit"], .more-link-btn.btn-postmandu a',
				'property' => 'color',
			),
		),
	)
);

// Button Text: Hover Color.
Kirki::add_field(
	'postmandu_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'postmandu_btn_text_hover_color',
		'label'     => __( 'Button Text: Hover Color', 'postmandu' ),
		'section'   => 'colors',
		'default'   => $defaults['postmandu_btn_text_hover_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'button:hover, .btn-postmandu:hover, .skip-link:hover, input[type="submit"]:hover, .more-link-btn.btn-postmandu a:hover',
				'property' => 'color',
			),
		),
	)
);