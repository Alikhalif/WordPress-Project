<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'edufication_topbar_section', array(
	'title'             => esc_html__( 'Topbar','edufication' ),
	'description'       => esc_html__( 'Topbar Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Topbar content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[topbar_section_enable]', array(
	'default'			=> 	$options['topbar_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[topbar_section_enable]', array(
	'label'             => esc_html__( 'Topbar Section Enable', 'edufication' ),
	'section'           => 'edufication_topbar_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

// topbar email setting and control
$wp_customize->add_setting( 'edufication_theme_options[topbar_news_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_news_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[topbar_news_label]', array(
	'label'           	=> esc_html__( 'News Label', 'edufication' ),
	'section'        	=> 'edufication_topbar_section',
	'active_callback' 	=> 'edufication_is_topbar_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[topbar_news_label]', array(
		'selector'            => '#top-header .latest-news .latest-news-header span',
		'settings'            => 'edufication_theme_options[topbar_news_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_topbar_news_label_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'edufication_theme_options[topbar_content_category]', array(
	'sanitize_callback' => 'edufication_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[topbar_content_category]', array(
	'label'             => esc_html__( 'Select News Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest five posts will be shown from selected category', 'edufication' ),
	'section'           => 'edufication_topbar_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_topbar_section_enable'
) ) );

// topbar hr setting and control
$wp_customize->add_setting( 'edufication_theme_options[topbar_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Edufication_Customize_Horizontal_Line( $wp_customize, 'edufication_theme_options[topbar_hr]',
	array(
		'section'         => 'edufication_topbar_section',
		'active_callback' => 'edufication_is_topbar_section_enable',
		'type'			  => 'hr'
) ) );

// topbar email setting and control
$wp_customize->add_setting( 'edufication_theme_options[topbar_email]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_email'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[topbar_email]', array(
	'label'           	=> esc_html__( 'Email ID', 'edufication' ),
	'section'        	=> 'edufication_topbar_section',
	'active_callback' 	=> 'edufication_is_topbar_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[topbar_email]', array(
		'selector'            => '#top-header .contact-info .topbar-email a',
		'settings'            => 'edufication_theme_options[topbar_email]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_topbar_email_partial',
    ) );
}

// topbar phone setting and control
$wp_customize->add_setting( 'edufication_theme_options[topbar_phone]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_phone'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[topbar_phone]', array(
	'label'           	=> esc_html__( 'Phone No.', 'edufication' ),
	'section'        	=> 'edufication_topbar_section',
	'active_callback' 	=> 'edufication_is_topbar_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[topbar_phone]', array(
		'selector'            => '#top-header .contact-info .topbar-phone a',
		'settings'            => 'edufication_theme_options[topbar_phone]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_topbar_phone_partial',
    ) );
}