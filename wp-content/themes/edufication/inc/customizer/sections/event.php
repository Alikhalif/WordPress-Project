<?php
/**
 * Event Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Event section
$wp_customize->add_section( 'edufication_event_section', array(
	'title'             => esc_html__( 'Events','edufication' ),
	'description'       => esc_html__( 'Events Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Event content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[event_section_enable]', array(
	'default'			=> 	$options['event_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[event_section_enable]', array(
	'label'             => esc_html__( 'Event Section Enable', 'edufication' ),
	'section'           => 'edufication_event_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[event_section_enable]', array(
		'selector'            => '#news-events .tooltiptext',
		'settings'            => 'edufication_theme_options[event_section_enable]',
    ) );
}

// event title setting and control
$wp_customize->add_setting( 'edufication_theme_options[event_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[event_title]', array(
	'label'           	=> esc_html__( 'Title', 'edufication' ),
	'section'        	=> 'edufication_event_section',
	'active_callback' 	=> 'edufication_is_event_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[event_title]', array(
		'selector'            => '#news-events .section-header h2.section-title',
		'settings'            => 'edufication_theme_options[event_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_event_title_partial',
    ) );
}

// event read more label setting and control
$wp_customize->add_setting( 'edufication_theme_options[event_read_more_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_read_more_label'],
) );

$wp_customize->add_control( 'edufication_theme_options[event_read_more_label]', array(
	'label'           	=> esc_html__( 'Read More Label', 'edufication' ),
	'section'        	=> 'edufication_event_section',
	'active_callback' 	=> 'edufication_is_event_section_enable',
	'type'				=> 'text',
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'edufication_theme_options[event_content_category]', array(
	'sanitize_callback' => 'edufication_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[event_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'edufication' ),
	'section'           => 'edufication_event_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_event_section_enable'
) ) );
