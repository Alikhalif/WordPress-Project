<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

if ( ! function_exists( 'edufication_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Edufication 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edufication_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'edufication_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'edufication_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Edufication 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edufication_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'edufication_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'edufication_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Edufication 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function edufication_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'edufication_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if topbar section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[topbar_section_enable]' )->value() );
}

/**
 * Check if banner section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[banner_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if course section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_course_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[course_section_enable]' )->value() );
}

function edufication_is_course_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'edufication_theme_options[course_content_type]' )->value();
	return edufication_is_course_section_enable( $control ) && ( 'category' == $content_type );
}

function edufication_is_course_section_content_course_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'edufication_theme_options[course_content_type]' )->value();
	return edufication_is_course_section_enable( $control ) && ( 'tp-course-cat' == $content_type );
}

/**
 * Check if event section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_event_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[event_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if team section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[team_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'edufication_theme_options[blog_content_type]' )->value();
	return edufication_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'edufication_theme_options[blog_content_type]' )->value();
	return edufication_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if client section is enabled.
 *
 * @since Edufication 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function edufication_is_client_section_enable( $control ) {
	return ( $control->manager->get_setting( 'edufication_theme_options[client_section_enable]' )->value() );
}
