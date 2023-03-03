<?php
/**
 * Course Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Course section
$wp_customize->add_section( 'edufication_course_section', array(
	'title'             => esc_html__( 'Courses','edufication' ),
	'description'       => esc_html__( 'Courses Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Course content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[course_section_enable]', array(
	'default'			=> 	$options['course_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[course_section_enable]', array(
	'label'             => esc_html__( 'Course Section Enable', 'edufication' ),
	'section'           => 'edufication_course_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[course_section_enable]', array(
		'selector'            => '#courses-section .tooltiptext',
		'settings'            => 'edufication_theme_options[course_section_enable]',
    ) );
}

// course title setting and control
$wp_customize->add_setting( 'edufication_theme_options[course_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['course_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[course_title]', array(
	'label'           	=> esc_html__( 'Title', 'edufication' ),
	'section'        	=> 'edufication_course_section',
	'active_callback' 	=> 'edufication_is_course_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[course_title]', array(
		'selector'            => '#courses-section .section-header h2.section-title',
		'settings'            => 'edufication_theme_options[course_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_course_title_partial',
    ) );
}


// Course content type control and setting
$wp_customize->add_setting( 'edufication_theme_options[course_content_type]', array(
	'default'          	=> $options['course_content_type'],
	'sanitize_callback' => 'edufication_sanitize_select',
) );

$wp_customize->add_control( 'edufication_theme_options[course_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'edufication' ),
	'section'           => 'edufication_course_section',
	'type'				=> 'select',
	'active_callback' 	=> 'edufication_is_course_section_enable',
	'choices'			=> edufication_course_section_options(),
) );

$wp_customize->add_setting(  'edufication_theme_options[course_content_course_cat]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[course_content_course_cat]', array(
	'label'             => esc_html__( 'Select Course Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of courses will be shown from selected course category', 'edufication' ),
	'taxonomy'			=> 'tp-course-category',
	'section'           => 'edufication_course_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_course_section_content_course_category_enable'
) ) );


// Add dropdown category setting and control.
$wp_customize->add_setting(  'edufication_theme_options[course_content_category]', array(
	'sanitize_callback' => 'edufication_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[course_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest six posts will be shown from selected category', 'edufication' ),
	'section'           => 'edufication_course_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_course_section_content_category_enable'
) ) );
