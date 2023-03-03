<?php

require get_stylesheet_directory() . '/customizer/options-services.php';
require get_stylesheet_directory() . '/customizer/options-services2.php';
require get_stylesheet_directory() . '/sections/services.php';
require get_stylesheet_directory() . '/sections/services2.php';

add_action( 'after_setup_theme', 'higher_education_business_setup_theme' );
function higher_education_business_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
}

add_action( 'wp_enqueue_scripts', 'higher_education_business_chld_thm_parent_css' );
function higher_education_business_chld_thm_parent_css() {

    $higher_education_business = wp_get_theme();
    $theme_version = $higher_education_business->get( 'Version' );

    wp_enqueue_style( 
    	'higher_education_business_chld_css', 
    	trailingslashit( get_template_directory_uri() ) . 'style.css', 
    	array( 
    		'bootstrap',
    		'font-awesome-5',
    		'bizberg-main',
    		'bizberg-component',
    		'bizberg-style2',
    		'bizberg-responsive' 
    	),
        $theme_version
    );

    if ( is_rtl() ) {
        wp_enqueue_style( 
            'higher_education_business_parent_rtl',
            trailingslashit( get_template_directory_uri() ) . 'rtl.css'
        );
    }
    
}

add_filter( 'bizberg_theme_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_menu_color_hover_sticky_menu', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_button_color_sticky_menu', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_button_color_hover_sticky_menu', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_menu_color_hover', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_button_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_header_button_color_hover', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_slider_title_box_highlight_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_slider_arrow_background_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_slider_dot_active_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_read_more_background_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_read_more_background_color_2', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_link_color_hover', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_blog_listing_pagination_active_hover_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_sidebar_widget_link_color_hover', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_sidebar_widget_title_color', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_footer_social_icon_background', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_background_color_1', 'higher_education_business_change_theme_color' );
add_filter( 'bizberg_background_color_2', 'higher_education_business_change_theme_color' );
function higher_education_business_change_theme_color(){
    return '#ffb606';
}

add_filter( 'bizberg_slider_banner_settings', 'higher_education_business_slider_banner_settings' );
function higher_education_business_slider_banner_settings(){
    return 'banner';
}

add_filter( 'bizberg_banner_image', 'higher_education_business_banner_image' );
function higher_education_business_banner_image(){
    return [
        'background-color'      => 'rgba(20,20,20,.8)',
        'background-image'      => get_stylesheet_directory_uri() . '/assets/images/StockSnap_FMJOIWUH4F.jpg',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    ];
}

add_filter( 'bizberg_banner_opacity_primary_color', 'higher_education_business_banner_opacity_primary_color' );
function higher_education_business_banner_opacity_primary_color(){
    return 'rgba(0,0,0,0)';
}

add_filter( 'bizberg_banner_opacity_secondary_color', 'higher_education_business_banner_opacity_secondary_color' );
function higher_education_business_banner_opacity_secondary_color(){
    return 'rgba(0,0,0,0.39)';
}

add_filter( 'bizberg_slider_gradient_primary_color', 'higher_education_business_slider_gradient_primary_color' );
function higher_education_business_slider_gradient_primary_color(){
    return 'rgba(255,182,6,0.65)';
}

add_filter( 'bizberg_link_color', 'higher_education_business_link_color' );
function higher_education_business_link_color(){
    return '#64686d';
}

add_filter( 'bizberg_footer_social_icon_color', 'higher_education_business_footer_social_icon_color' );
function higher_education_business_footer_social_icon_color(){
    return '#fff';
}

add_filter( 'bizberg_sidebar_settings', 'higher_education_business_sidebar_settings' );
function higher_education_business_sidebar_settings(){
    return '4';
}

add_filter( 'bizberg_three_col_listing_radius', 'higher_education_business_three_col_listing_radius' );
function higher_education_business_three_col_listing_radius(){
    return 0;
}

add_filter( 'bizberg_footer_social_links' , 'higher_education_business_footer_social_links' );
function higher_education_business_footer_social_links(){
    return [];
}

add_filter( 'bizberg_excerpt_length', 'higher_education_business_excerpt_length' );
function higher_education_business_excerpt_length(){
    return '30';
}

add_filter( 'bizberg_site_title_font', 'higher_education_business_site_title_font' );
function higher_education_business_site_title_font(){
    return [
        'font-family'    => 'Montserrat',
        'variant'        => '600',
        'font-size'      => '23px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'uppercase',
        'text-align'     => 'left',
    ];
}

add_filter( 'bizberg_site_tagline_font', 'higher_education_business_site_tagline_font' );
function higher_education_business_site_tagline_font(){
    return [
        'font-family'    => 'Montserrat',
        'variant'        => '300',
        'font-size'      => '13px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'left',
    ];
}

add_filter( 'bizberg_banner_spacing', 'higher_education_business_banner_spacing' );
function higher_education_business_banner_spacing(){
    return [
        'padding-top'    => '250px',
        'padding-bottom' => '0px',
        'padding-left'   => '0px',
        'padding-right'  => '0px',
    ];
}

add_filter( 'bizberg_banner_title', 'higher_education_business_banner_title' );
function higher_education_business_banner_title(){
    return current_user_can( 'edit_theme_options' ) ? esc_html__( 'Be educated so that you can change the world.', 'higher-education-business' ) : '';
}

add_filter( 'bizberg_banner_subtitle', 'higher_education_business_banner_subtitle' );
function higher_education_business_banner_subtitle(){
    return current_user_can( 'edit_theme_options' ) ? esc_html__( 'Being educated helps people to judge any situation and make the right decision. It also broadens ones perspective and makes one knowledgeable, which is essential for their personal and professional growth in future.', 'higher-education-business' ) : '';
}

add_filter( 'bizberg_banner_title_font_status', 'higher_education_business_banner_title_font_status' );
function higher_education_business_banner_title_font_status(){
    return true;
}

add_filter( 'bizberg_banner_subtitle_font_status', 'higher_education_business_banner_subtitle_font_status' );
function higher_education_business_banner_subtitle_font_status(){
    return true;
}

add_filter( 'bizberg_banner_title_font_desktop', 'higher_education_business_banner_title_font_desktop' );
function higher_education_business_banner_title_font_desktop(){
    return [
        'font-family'    => 'Montserrat',
        'variant'        => '700',
        'font-size'      => '40px',
        'line-height'    => '1.2',
        'letter-spacing' => '0',
        'text-transform' => 'none'
    ];
}

add_filter( 'bizberg_banner_subtitle_font_settings_desktop', 'higher_education_business_banner_subtitle_font_settings_desktop' );
function higher_education_business_banner_subtitle_font_settings_desktop(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => 'regular',
        'font-size'      => '18px',
        'line-height'    => '1.4',
        'letter-spacing' => '0',
        'text-transform' => 'none'
    ];
}

add_filter( 'bizberg_banner_subtitle_font_settings_tablet', 'higher_education_business_banner_subtitle_font_settings_tablet' );
function higher_education_business_banner_subtitle_font_settings_tablet(){
    return [
        'font-size'      => '18px',
        'line-height'    => '1.4',
        'letter-spacing' => '0',
    ];
}

add_action( 'after_switch_theme', 'higher_education_business_switch_theme' );
function higher_education_business_switch_theme() {

    $flag = get_theme_mod( 'higher_education_business_copy_settings', false );

    if ( true === $flag ) {
        return;
    }

    foreach( Kirki::$fields as $field ) {
        set_theme_mod( $field["settings"],$field["default"] );
    }

    //Set flag
    set_theme_mod( 'higher_education_business_copy_settings', true );
    
}

add_filter( 'bizberg_getting_started_screenshot', 'higher_education_business_getting_started_screenshot' );
function higher_education_business_getting_started_screenshot(){
    return true;
}