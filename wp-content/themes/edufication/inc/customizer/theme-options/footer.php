<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'edufication_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'edufication' ),
		'priority'   			=> 900,
		'panel'      			=> 'edufication_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'edufication_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'edufication_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'edufication_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'edufication' ),
		'section'    			=> 'edufication_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'edufication_theme_options[copyright_text]', array(
		'selector'            => '.site-info span.copyright',
		'settings'            => 'edufication_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'edufication_copyright_text_partial',
    ) );
}

// footer Social menu visible
$wp_customize->add_setting( 'edufication_theme_options[footer_social_visible]',
	array(
		'default'       	=> $options['footer_social_visible'],
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[footer_social_visible]',
    array(
		'label'      		=> esc_html__( 'Display Footer Social', 'edufication' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show footer social menu.', 'edufication' ), esc_html__( 'Click Here', 'edufication' ), esc_html__( 'to create menu', 'edufication' ) ),
		'section'    		=> 'edufication_section_footer',
		'on_off_label' 		=> edufication_switch_options(),
    )
) );

// scroll top visible
$wp_customize->add_setting( 'edufication_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Edufication_Switch_Control( $wp_customize, 'edufication_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'edufication' ),
		'section'    		=> 'edufication_section_footer',
		'on_off_label' 		=> edufication_switch_options(),
    )
) );