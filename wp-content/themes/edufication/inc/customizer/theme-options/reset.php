<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'edufication_reset_section', array(
	'title'             => esc_html__('Reset all settings','edufication'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'edufication' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'edufication_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'edufication_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'edufication_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'edufication' ),
	'section'           => 'edufication_reset_section',
	'type'              => 'checkbox',
) );
