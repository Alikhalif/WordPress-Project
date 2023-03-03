<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'edufication_service_section', array(
	'title'             => esc_html__( 'Services','edufication' ),
	'description'       => esc_html__( 'Services Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'edufication' ),
	'section'           => 'edufication_service_section',
	'on_off_label' 		=> edufication_switch_options(),
	 'priority' => 10,
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[service_section_enable]', array(
		'selector'            => '#our-services .tooltiptext',
		'settings'            => 'edufication_theme_options[service_section_enable]',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'edufication_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'edufication' ),
	'section'        	=> 'edufication_service_section',
	'active_callback' 	=> 'edufication_is_service_section_enable',
	'type'				=> 'text',
	 'priority' => 20,
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2.section-title',
		'settings'            => 'edufication_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_service_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'edufication_theme_options[service_content_category]', array(
	'sanitize_callback' => 'edufication_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[service_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'edufication' ),
	'section'           => 'edufication_service_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_service_section_enable',
	 'priority' => 60,
) ) );
