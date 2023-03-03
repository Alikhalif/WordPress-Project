<?php
/**
 * Edufication Customizer.
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function edufication_customize_register( $wp_customize ) {
	$options = edufication_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'edufication_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'edufication_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'edufication' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'edufication_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'edufication_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'edufication' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'edufication_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'edufication_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'edufication_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'edufication' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'edufication' ),
			'show-all'     => esc_html__( 'Show All', 'edufication' ),
			'title-only'   => esc_html__( 'Title Only', 'edufication' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'edufication' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'edufication' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'edufication' ),
			)
	) );

	// Add panel for common theme options
	$wp_customize->add_panel( 'edufication_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','edufication' ),
	    'description'=> esc_html__( 'Edufication Theme Options.', 'edufication' ),
	    'priority'   => 150,
	) );

	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'edufication_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','edufication' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'edufication' ),
	    'priority'   => 140,
	) );

	// load topbar option
	require get_template_directory() . '/inc/customizer/sections/topbar.php';

	// load banner option
	require get_template_directory() . '/inc/customizer/sections/banner.php';

	// load service option
	require get_template_directory() . '/inc/customizer/sections/service.php';
	
	// load about option
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// load course option
	require get_template_directory() . '/inc/customizer/sections/course.php';

	// load event option
	require get_template_directory() . '/inc/customizer/sections/event.php';

	// load testimonial option
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';

	// load team option
	require get_template_directory() . '/inc/customizer/sections/team.php';

	// load cta option
	require get_template_directory() . '/inc/customizer/sections/cta.php';

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';

}
add_action( 'customize_register', 'edufication_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function edufication_customize_preview_js() {
	wp_enqueue_script( 'edufication-customizer', get_template_directory_uri() . '/assets/js/customizer' . edufication_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'edufication_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function edufication_customize_control_js() {	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . edufication_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . edufication_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'edufication-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . edufication_min() . '.css' );
	wp_enqueue_script( 'edufication-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . edufication_min() . '.js', array(), '1.0', true );
	$edufication_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'edufication' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'edufication-customize-controls', 'edufication_reset_data', $edufication_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'edufication_customize_control_js' );

if ( !function_exists( 'edufication_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Edufication 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function edufication_reset_options() {
		$options = edufication_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'edufication_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'edufication_reset_options' );
