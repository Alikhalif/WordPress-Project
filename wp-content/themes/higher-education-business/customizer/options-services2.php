<?php

add_action( 'init' , 'higher_education_business_services2' );
function higher_education_business_services2(){

	Kirki::add_section( 'higher_education_business_sections2', array(
        'title'   => esc_html__( 'Services 2', 'higher-education-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'services_status2',
		'label'       => esc_html__( 'Enable / Disable', 'higher-education-business' ),
		'section'     => 'higher_education_business_sections2',
		'default'     => false,
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'services_subtitle2',
		'label'    => esc_html__( 'Subtitle', 'higher-education-business' ),
		'section'  => 'higher_education_business_sections2',
		'default'  => esc_html__( 'VALUED SERVICES', 'higher-education-business' ),
		'active_callback' => [
			[
				'setting'  => 'services_status2',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'text',
		'settings' => 'services_title2',
		'label'    => esc_html__( 'Title', 'higher-education-business' ),
		'section'  => 'higher_education_business_sections2',
		'default'  => esc_html__( 'Managed IT, Software, Voice & Data Services for Your Organization.', 'higher-education-business' ),
		'active_callback' => [
			[
				'setting'  => 'services_status2',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Services', 'higher-education-business' ),
	    'section'     => 'higher_education_business_sections2',
	    'settings'    => 'higher_education_business_services2',
	    'active_callback' => [
			[
				'setting'  => 'services_status2',
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