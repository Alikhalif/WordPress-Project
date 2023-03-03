<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'edufication_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','edufication' ),
	'description'       => esc_html__( 'Archive section options.', 'edufication' ),
	'panel'             => 'edufication_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'edufication_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'edufication_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'edufication' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'edufication' ),
	'section'           => 'edufication_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'edufication_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'edufication_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'edufication' ),
	'section'           => 'edufication_archive_section',
	'on_off_label' 		=> edufication_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'edufication_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'edufication_sanitize_switch_control',
) );

$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'edufication' ),
	'section'           => 'edufication_archive_section',
	'on_off_label' 		=> edufication_hide_options(),
) ) );
