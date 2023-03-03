<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'edufication_pagination', array(
	'title'               => esc_html__('Pagination','edufication'),
	'description'         => esc_html__( 'Pagination section options.', 'edufication' ),
	'panel'               => 'edufication_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'edufication_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'edufication_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'edufication' ),
	'section'             => 'edufication_pagination',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'edufication_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'edufication_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'edufication_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'edufication' ),
	'section'             => 'edufication_pagination',
	'type'                => 'select',
	'choices'			  => edufication_pagination_options(),
	'active_callback'	  => 'edufication_is_pagination_enable',
) );
