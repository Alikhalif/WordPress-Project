<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Edufication
* @since Edufication 1.0.0
*/

if ( ! function_exists( 'edufication_topbar_news_label_partial' ) ) :
    // topbar news label
    function edufication_topbar_news_label_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['topbar_news_label'] );
    }
endif;

if ( ! function_exists( 'edufication_topbar_email_partial' ) ) :
    // topbar email
    function edufication_topbar_email_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['topbar_email'] );
    }
endif;

if ( ! function_exists( 'edufication_topbar_phone_partial' ) ) :
    // topbar phone
    function edufication_topbar_phone_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['topbar_phone'] );
    }
endif;

if ( ! function_exists( 'edufication_banner_btn_label_partial' ) ) :
    // banner btn label
    function edufication_banner_btn_label_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['banner_btn_label'] );
    }
endif;

if ( ! function_exists( 'edufication_service_title_partial' ) ) :
    // service title
    function edufication_service_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'edufication_about_btn_title_partial' ) ) :
    // about btn title
    function edufication_about_btn_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'edufication_course_title_partial' ) ) :
    // course title
    function edufication_course_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['course_title'] );
    }
endif;

if ( ! function_exists( 'edufication_event_title_partial' ) ) :
    // event title
    function edufication_event_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['event_title'] );
    }
endif;

if ( ! function_exists( 'edufication_testimonial_title_partial' ) ) :
    // testimonial title
    function edufication_testimonial_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'edufication_team_title_partial' ) ) :
    // team title
    function edufication_team_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['team_title'] );
    }
endif;

if ( ! function_exists( 'edufication_cta_title_partial' ) ) :
    // cta title
    function edufication_cta_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['cta_title'] );
    }
endif;

if ( ! function_exists( 'edufication_cta_btn_title_partial' ) ) :
    // cta btn title
    function edufication_cta_btn_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'edufication_blog_title_partial' ) ) :
    // blog title
    function edufication_blog_title_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'edufication_copyright_text_partial' ) ) :
    // copyright text
    function edufication_copyright_text_partial() {
        $options = edufication_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
