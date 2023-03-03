<?php
/**
 * Banner Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Banner section
$wp_customize->add_section( 'edufication_banner_section', array(
	'title'             => esc_html__( 'Banner','edufication' ),
	'description'       => esc_html__( 'Banner Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Banner content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[banner_section_enable]', array(
	'default'			=> 	$options['banner_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[banner_section_enable]', array(
	'label'             => esc_html__( 'Banner Section Enable', 'edufication' ),
	'section'           => 'edufication_banner_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[banner_section_enable]', array(
		'selector'            => '#hero-section .tooltiptext',
		'settings'            => 'edufication_theme_options[banner_section_enable]',
    ) );
}

// banner pages drop down chooser control and setting
$wp_customize->add_setting( 'edufication_theme_options[banner_content_page]', array(
	'sanitize_callback' => 'edufication_sanitize_page',
) );

$wp_customize->add_control( new Edufication_Dropdown_Chooser( $wp_customize, 'edufication_theme_options[banner_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'edufication' ),
	'section'           => 'edufication_banner_section',
	'choices'			=> edufication_page_choices(),
	'active_callback'	=> 'edufication_is_banner_section_enable',
) ) );

// banner link label setting and control
$wp_customize->add_setting( 'edufication_theme_options[banner_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['banner_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[banner_btn_label]', array(
	'label'           	=> esc_html__( 'Banner Button Label', 'edufication' ),
	'section'        	=> 'edufication_banner_section',
	'active_callback' 	=> 'edufication_is_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[banner_btn_label]', array(
		'selector'            => '#hero-section .hero-content-wrapper .buttons a.btn-transparent',
		'settings'            => 'edufication_theme_options[banner_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_banner_btn_label_partial',
    ) );
}
