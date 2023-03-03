<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'edufication_blog_section', array(
	'title'             => esc_html__( 'Blog','edufication' ),
	'description'       => esc_html__( 'Blog Section options.', 'edufication' ),
	'panel'             => 'edufication_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'edufication_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'edufication' ),
	'section'           => 'edufication_blog_section',
	'on_off_label' 		=> edufication_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[blog_section_enable]', array(
		'selector'            => '#latest-posts .tooltiptext',
		'settings'            => 'edufication_theme_options[blog_section_enable]',
    ) );
}


// blog title setting and control
$wp_customize->add_setting( 'edufication_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'edufication' ),
	'section'        	=> 'edufication_blog_section',
	'active_callback' 	=> 'edufication_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'edufication_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_blog_title_partial',
    ) );
}

// blog btn title setting and control
$wp_customize->add_setting( 'edufication_theme_options[blog_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_btn_title'],
	'transport'			=> 'refresh',
) );

$wp_customize->add_control( 'edufication_theme_options[blog_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'edufication' ),
	'section'        	=> 'edufication_blog_section',
	'active_callback' 	=> 'edufication_is_blog_section_enable',
	'type'				=> 'text',
) );

// blog btn url setting and control
$wp_customize->add_setting( 'edufication_theme_options[blog_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'edufication_theme_options[blog_btn_url]', array(
	'label'           	=> esc_html__( 'Button Link', 'edufication' ),
	'section'        	=> 'edufication_blog_section',
	'active_callback' 	=> 'edufication_is_blog_section_enable',
	'type'				=> 'url',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[blog_btn_title]', array(
		'selector'            => '#latest-posts .more-link a.btn',
		'settings'            => 'edufication_theme_options[blog_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_blog_btn_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'edufication_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'edufication_sanitize_select',
) );

$wp_customize->add_control( 'edufication_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'edufication' ),
	'section'           => 'edufication_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'edufication_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'edufication' ),
		'recent' 	=> esc_html__( 'Recent', 'edufication' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'edufication_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'edufication_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Taxonomies_Control( $wp_customize,'edufication_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Latest three posts will be shown from selected category', 'edufication' ),
	'section'           => 'edufication_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'edufication_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'edufication_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'edufication_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Edufication_Dropdown_Category_Control( $wp_customize,'edufication_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'edufication' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Ctrl key select multilple categories. Latest three posts will be shown.', 'edufication' ),
	'section'           => 'edufication_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'edufication_is_blog_section_content_recent_enable'
) ) );
