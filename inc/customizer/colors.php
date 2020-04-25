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
				'element'  => 'button, .btn-postmandu, .section_four .active .sub_heading, .postmandu-span, #menu span, .skip-link',
				'property' => 'background-color',
			),
			array(
				'element'  => 'span.page-numbers.current, section .wpcf7-form p input[type="submit"], .section_review .strong-view.controls-style-buttons2 .wpmslider-prev, .section_review .strong-view.controls-style-buttons2 .wpmslider-next',
				'property' => 'background-color',
			),
			array(
				'element'  => '.testimonialslide .slick-dots .slick-active button',
				'property' => 'background-color',
			),
			array(
				'element'  => '.section_four .column-content .paragraph',
				'property' => 'border-color',
			),
			array(
				'element'  => '.strong-view .wpmslider-controls .wpmslider-pager-link:hover:before,
				.strong-view .wpmslider-controls .wpmslider-pager-link.active:before,
				.strong-view .wpmslider-controls .wpmslider-pager-link.active:hover:before, .main-navigation .menu-item.current-menu-item .nav-link,
				.main-navigation .menu-item.current-menu-item.menu-item-has-children:after, .action .active i, .guest-post',
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
				'element'  => 'button:hover, .btn-postmandu:hover, .skip-link:hover, #wizards_slider .slider_bullets .active, #wizards_slider .wiz-arrow:hover i',
				'property' => 'background-color',
			),
			array(
				'element'  => '#wizards_slider .wiz-arrow img, section .wpcf7-form p input[type="submit"]:hover, .section_review .strong-view.controls-style-buttons2 .wpmslider-prev:hover, .section_review .strong-view.controls-style-buttons2 .wpmslider-next:hover',
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
				'element'  => 'button, .btn-postmandu, .postmandu-span, .cart-pop-up .edd_download_purchase_form .edd_price_options li.selected span, .skip-link, span.page-numbers.current',
				'property' => 'color',
			),
			array(
				'element'  => '.cart-pop-up .edd_price_options label:hover span, section .wpcf7-form p input[type="submit"], .section_review .strong-view.controls-style-buttons2 .wpmslider-prev, .section_review .strong-view.controls-style-buttons2 .wpmslider-next',
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
				'element'  => 'button:hover, .btn-postmandu:hover, section .wpcf7-form p input[type="submit"]:hover, .section_review .strong-view.controls-style-buttons2 .wpmslider-prev:hover, .section_review .strong-view.controls-style-buttons2 .wpmslider-next:hover',
				'property' => 'color',
			),
		),
	)
);





