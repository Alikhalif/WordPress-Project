<?php
/**
 * Team Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Team section
$wp_customize->add_section( 'edufication_team_section', array(
	'title'             => esc_html__( 'Team','edufication' ),
	'description'       => esc_html__( 'Team Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Team content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[team_section_enable]', array(
	'default'			=> 	$options['team_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[team_section_enable]', array(
	'label'             => esc_html__( 'Team Section Enable', 'edufication' ),
	'section'           => 'edufication_team_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[team_section_enable]', array(
		'selector'            => '#our-team .tooltiptext',
		'settings'            => 'edufication_theme_options[team_section_enable]',
    ) );
}


// team title setting and control
$wp_customize->add_setting( 'edufication_theme_options[team_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['team_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[team_title]', array(
	'label'           	=> esc_html__( 'Title', 'edufication' ),
	'section'        	=> 'edufication_team_section',
	'active_callback' 	=> 'edufication_is_team_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[team_title]', array(
		'selector'            => '#our-team .section-header h2.section-title',
		'settings'            => 'edufication_theme_options[team_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_team_title_partial',
    ) );
}
if ( wp_get_theme()->Name == 'Edufication' ) {
	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'edufication_theme_options[team_content_category]', array(
		'sanitize_callback' => 'edufication_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[team_content_category]', array(
		'label'             => esc_html__( 'Select Category', 'edufication' ),
		'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'edufication' ),
		'section'           => 'edufication_team_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'edufication_is_team_section_enable'
	) ) );
}else{
	$wp_customize->add_setting(  'edufication_theme_options[team_content_team_cat]', array(
		'sanitize_callback' => 'absint',
	) ) ;

	$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[team_content_team_cat]', array(
		'label'             => esc_html__( 'Select Team Category', 'edufication' ),
		'description'      	=> esc_html__( 'Note: Latest selected no of teams will be shown from selected team category', 'edufication' ),
		'taxonomy'			=> 'tp-team-category',
		'section'           => 'edufication_team_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'edufication_is_team_section_enable'
	) ) );
}




