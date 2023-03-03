<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Edufication
* @since Edufication 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'edufication_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'edufication_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'edufication_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'edufication' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'edufication' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );