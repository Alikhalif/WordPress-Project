<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add About section
$wp_customize->add_section( 'edufication_about_section', array(
	'title'             => esc_html__( 'About Us','edufication' ),
	'description'       => esc_html__( 'About Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'edufication' ),
	'section'           => 'edufication_about_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[about_section_enable]', array(
		'selector'            => '#about-us .tooltiptext',
		'settings'            => 'edufication_theme_options[about_section_enable]',
    ) );
}

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'edufication_theme_options[about_content_page]', array(
	'sanitize_callback' => 'edufication_sanitize_page',
) );

$wp_customize->add_control( new Edufication_Dropdown_Chooser( $wp_customize, 'edufication_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'edufication' ),
	'section'           => 'edufication_about_section',
	'choices'			=> edufication_page_choices(),
	'active_callback'	=> 'edufication_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'edufication_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' 			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'edufication' ),
	'section'        	=> 'edufication_about_section',
	'active_callback' 	=> 'edufication_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[about_btn_title]', array(
		'selector'            => '#about-us .more-link a',
		'settings'            => 'edufication_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_about_btn_title_partial',
    ) );
}
