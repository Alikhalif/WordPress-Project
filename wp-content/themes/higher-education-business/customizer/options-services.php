<?php

add_action( 'init' , 'higher_education_business_services' );
function higher_education_business_services(){

	Kirki::add_section( 'higher_education_business_sections', array(
        'title'   => esc_html__( 'Services', 'higher-education-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'services_status',
		'label'       => esc_html__( 'Enable / Disable', 'higher-education-business' ),
		'section'     => 'higher_education_business_sections',
		'default'     => false,
	] );

    Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'services_subtitle',
		'label'    => esc_html__( 'Subtitle', 'higher-education-business' ),
		'section'  => 'higher_education_business_sections',
		'default'  => esc_html__( 'MANAGED SERVICES', 'higher-education-business' ),
		'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'services_title',
		'label'    => esc_html__( 'Title', 'higher-education-business' ),
		'section'  => 'higher_education_business_sections',
		'default'  => esc_html__( 'More than 30+ years we provide business consulting', 'higher-education-business' ),
		'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Services', 'higher-education-business' ),
	    'section'     => 'higher_education_business_sections',
	    'settings'    => 'higher_education_business_services',
	    'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	    'choices' => [
	        'button_label' => esc_html__( 'Add Services', 'higher-education-business' ),
	        'row_label' => [
	            'value' => esc_html__( 'Services', 'higher-education-business' ),
	        ],
	        'fields' => [
	        	'icon'  => [
	                'type'        => 'fontawesome',
	                'label'       => esc_html__( 'Icon', 'higher-education-business' ),
	                'default'     => 'fab fa-accusoft',
	                'choices'     => bizberg_get_fontawesome_options(),
	            ],
	            'page_id' => [
	                'type'        => 'select',
	                'label'       => esc_html__( 'Page', 'higher-education-business' ),
	                'choices'     => bizberg_get_all_pages()
	            ],
	        ],
	    ]
    ));

}