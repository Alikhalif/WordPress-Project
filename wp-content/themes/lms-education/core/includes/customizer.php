<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'lms_education_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'lms-education' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'lms-education' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'lms-education' ),
		'section'     => 'title_tagline',
		'default'     => false	,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'lms_education_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'lms-education' ),
	) );

	Kirki::add_section( 'lms_education_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'lms-education' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_all_headings_typography',
		'section'     => 'lms_education_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'lms_education_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'lms-education' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'lms-education' ),
		'section'     => 'lms_education_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_body_content_typography',
		'section'     => 'lms_education_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'lms_education_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'lms-education' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'lms-education' ),
		'section'     => 'lms_education_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'lms_education_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'lms-education' ),
	) );

	// Additional Settings

	Kirki::add_section( 'lms_education_section_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'lms-education' ),
	    'description'    => esc_html__( 'Scroll To Top', 'lms-education' ),
	    'panel'          => 'lms_education_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'lms-education' ),
		'section'     => 'lms_education_section_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );


	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_lms_education',
		'label'       => esc_html__( 'Menus Text Transform', 'lms-education' ),
		'section'     => 'lms_education_section_additional_settings',
		'default'     => 'UPPERCASE',
		'placeholder' => esc_html__( 'Choose an option', 'lms-education' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'lms-education' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'lms-education' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'lms-education' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'lms_education_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'lms-education' ),
		'section'     => 'lms_education_section_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// Woocommerce Settings

	Kirki::add_section( 'lms_education_woocommerce_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'lms-education' ),
			'description'    => esc_html__( 'Shop Page', 'lms-education' ),
			'panel'          => 'lms_education_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'lms-education' ),
		'section'     => 'lms_education_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'lms_education_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'lms-education' ),
		'section'     => 'lms_education_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	// COLOR SECTION

	Kirki::add_section( 'lms_education_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'lms-education' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'lms-education' ),
	    'panel'          => 'lms_education_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_global_colors',
		'section'     => 'lms_education_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'lms_education_global_color',
		'label'       => __( 'choose your Appropriate Color', 'lms-education' ),
		'section'     => 'lms_education_section_color',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'lms_education_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'lms-education' ),
		'section'     => 'lms_education_section_color',
		'default'     => '',
	] );

	// POST SECTION

	Kirki::add_section( 'lms_education_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'lms-education' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'lms-education' ),
	    'panel'          => 'lms_education_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'lms-education' ),
		'section'     => 'lms_education_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'lms-education' ),
		'section'     => 'lms_education_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'lms_education_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'lms-education' ),
	    'description'    => esc_html__( 'Here you can add different type of social icons.', 'lms-education' ),
	    'panel'          => 'lms_education_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_phone_icon',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon Here', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'lms_education_dashicons_setting_1',
		'label'    => esc_html__( 'Select Appropriate Icon', 'lms-education' ),
		'section'  => 'lms_education_section_header',
		'default'  => 'dashicons dashicons-phone',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_phone_text',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_phone_number',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_email_icon',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon Here', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'lms_education_dashicons_setting_2',
		'label'    => esc_html__( 'Select Appropriate Icon', 'lms-education' ),
		'section'  => 'lms_education_section_header',
		'default'  => 'dashicons dashicons-email',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_email_text',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Eamil Address', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_email_address',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_enable_socail_link',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'lms_education_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'lms-education' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'lms-education' ),
		'settings'     => 'lms_education_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'lms-education' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'lms-education' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'lms-education' ),
				'description' => esc_html__( 'Add the social icon url here.', 'lms-education' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_button1_text',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button 1 Text', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => __( 'Add Text', 'lms-education' ),
		'settings' => 'lms_education_register_text',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'    => __( 'Add Link', 'lms-education' ),
		'settings' => 'lms_education_register_link',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_button2_text',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button 2 Text', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => __( 'Add Text', 'lms-education' ),
		'settings' => 'lms_education_login_text',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'    => __( 'Add Link', 'lms-education' ),
		'settings' => 'lms_education_login_link',
		'section'  => 'lms_education_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_enable_search',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_search_box_enable',
		'label'       => esc_html__( 'Search Enable / Disable Button', 'lms-education' ),
		'section'     => 'lms_education_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_enable_cart',
		'section'     => 'lms_education_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Cart', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_cart_box_enable',
		'label'       => esc_html__( 'Cart Enable / Disable Button', 'lms-education' ),
		'section'     => 'lms_education_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );


	// SLIDER SECTION

	Kirki::add_section( 'lms_education_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'lms-education' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'lms-education' ),
        'panel'          => 'lms_education_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_enable_heading',
		'section'     => 'lms_education_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_text_unable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_phone_detail_unable_disable',
		'label'       => esc_html__( 'Slide Phone Details Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_slider_heading',
		'section'     => 'lms_education_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'lms_education_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to display', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'lms_education_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'lms-education' ),
		'priority'    => 10,
		'choices'     => lms_education_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_slider_xcerpt_heading',
		'section'     => 'lms_education_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'lms_education_slide_excerpt_number',
		'label'       => esc_html__( 'Slide Content Range', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => 20,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_slider_phone_heading',
		'section'     => 'lms_education_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Text', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_slider_phone_text',
		'section'  => 'lms_education_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'lms_education_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'lms-education' ),
		'section'     => 'lms_education_blog_slide_section',
		'default'     => 'CENTER-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'lms-education' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'lms-education' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'lms-education' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'lms-education' ),

		],
	] );

	// OUR COURSES SECTION

	Kirki::add_section( 'lms_education_our_courses_section', array(
        'title'          => esc_html__( 'Our Courses Settings', 'lms-education' ),
        'description'    => esc_html__( 'You have to select page to show our courses section.', 'lms-education' ),
        'panel'          => 'lms_education_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_services_enable_heading',
		'section'     => 'lms_education_our_courses_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Courses Section', 'lms-education' ) . '</h3>',
		'priority'    => 1,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_our_courses_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_our_courses_section',
		'default'     => '0',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_course_title_unable_disable',
		'label'       => esc_html__( 'Course Title Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_our_courses_section',
		'default'     => '1',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'lms_education_course_text_unable_disable',
		'label'       => esc_html__( 'Course Text Enable / Disable', 'lms-education' ),
		'section'     => 'lms_education_our_courses_section',
		'default'     => '1',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'lms-education' ),
			'off' => esc_html__( 'Disable', 'lms-education' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_our_courses_section_title_heading',
		'section'     => 'lms_education_our_courses_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Section Title', 'lms-education' ) . '</h3>',
		'priority'    => 3,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_our_courses_section_title',
		'section'  => 'lms_education_our_courses_section',
		'default'  => '',
		'priority' => 4,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_our_courses_section_text_heading',
		'section'     => 'lms_education_our_courses_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Section Text', 'lms-education' ) . '</h3>',
		'priority'    => 5,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_our_courses_section_para',
		'section'  => 'lms_education_our_courses_section',
		'default'  => '',
		'priority' => 6,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'lms_education_our_courses_perpage',
		'label'       => esc_html__( 'Number of courses to display', 'lms-education' ),
		'section'     => 'lms_education_our_courses_section',
		'default'     => 10,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'lms_education_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'lms-education' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'lms-education' ),
        'panel'          => 'lms_education_panel_id',
        'priority'       => 180,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'lms_education_footer_text_heading',
		'section'     => 'lms_education_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'lms-education' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'lms_education_footer_text',
		'section'  => 'lms_education_footer_section',
		'default'  => '',
		'priority' => 10,
	] );
}

add_action( 'customize_register', 'lms_education_customizer_settings' );
function lms_education_customizer_settings( $wp_customize ) {
	$lms_education_args = array(
       'type'                     => 'lp_course',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'course_category',
        'pad_counts'               => false
    );
	$categories = get_categories($lms_education_args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lms_education_our_courses_category',array(
		'default'	=> 'select',
		'priority' => 8,
		'sanitize_callback' => 'lms_education_sanitize_select',
	));

	$wp_customize->add_control('lms_education_our_courses_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display courses ','lms-education'),
		'section' => 'lms_education_our_courses_section',
	));
}
