<?php

if ( ! function_exists( 'dark_edufication_enqueue_styles' ) ) :

	function dark_edufication_enqueue_styles() {
		wp_enqueue_style( 'dark-edufication-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'dark-edufication-style', get_stylesheet_directory_uri() . '/style.css', array( 'dark-edufication-style-parent' ), '1.0.0' );

		wp_enqueue_script( 'dark-edufication-custom', get_theme_file_uri() . '/custom.js', array(), '1.0', true );

		wp_enqueue_style( 'dark-edufication-fonts', dark_edufication_fonts_url(), array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'dark_edufication_enqueue_styles', 99 );

function dark_edufication_customize_control_style() {

	// simple icon picker
	wp_enqueue_style( 'simple-iconpicker-css', get_theme_file_uri() . '/simple-iconpicker.css' );

	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css' );

	wp_enqueue_script( 'jquery-simple-iconpicker', get_theme_file_uri() . '/simple-iconpicker.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'dark-edufication-customize-controls', get_theme_file_uri() . '/customizer-control.js', array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'dark_edufication_customize_control_style' );


if ( !function_exists( 'dark_edufication_block_editor_styles' ) ):

	function dark_edufication_block_editor_styles() {
		wp_enqueue_style( 'dark-edufication-fonts', dark_edufication_fonts_url(), array(), null );
	}

endif;

add_action( 'enqueue_block_editor_assets', 'dark_edufication_block_editor_styles' );


if ( ! function_exists( 'dark_edufication_fonts_url' ) ) :

function dark_edufication_fonts_url() {
	
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'dark-edufication' ) ) {
		$fonts[] = 'Poppins:400,500,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

endif;


if ( ! function_exists( 'dark_edufication_body_classes' ) ) :

	function dark_edufication_body_classes( $classes ) {

		$body_class[] = 'dark-version';

		if ( edufication_is_frontpage() ) {
			$body_class[] = 'home-page';
		}

		return $body_class;

	}

endif;


add_filter( 'body_class', 'dark_edufication_body_classes' );


require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/service.php';

require get_theme_file_path() . '/inc/front-sections/team.php';

require get_theme_file_path() . '/inc/front-sections/counter.php';

require get_theme_file_path() . '/inc/front-sections/testimonial.php';

require get_theme_file_path() . '/inc/front-sections/subscribe.php';
