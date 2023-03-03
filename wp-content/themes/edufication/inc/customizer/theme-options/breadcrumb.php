<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

$wp_customize->add_section( 'edufication_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','edufication' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'edufication' ),
	'panel'             => 'edufication_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'edufication_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'edufication_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'edufication' ),
	'section'          	=> 'edufication_breadcrumb',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'edufication_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'edufication_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'edufication' ),
	'active_callback' 	=> 'edufication_is_breadcrumb_enable',
	'section'          	=> 'edufication_breadcrumb',
) );
