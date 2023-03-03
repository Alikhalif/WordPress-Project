<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 * @return array An array of default values
 */

function edufication_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$edufication_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		'colorscheme'					=> 'default',
		
		// loader
		'loader_enable'         		=> false,
		'loader_icon'         			=> 'default',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'edufication' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'edufication' ), '[the-year]', '[site-link]' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'edufication' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,
		'footer_social_visible'        	=> false,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'edufication' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_section_enable'			=> false,
		'topbar_email'					=> 'info@themepalace.com',
		'topbar_phone'					=> esc_html__( '+0 00 000000000', 'edufication' ),
		'topbar_news_label'				=> esc_html__( 'News', 'edufication' ),

		// banner
		'banner_section_enable'			=> false,
		'banner_btn_label'				=> esc_html__( 'Learn More', 'edufication' ),

		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'We Provide The Best For You!', 'edufication' ),

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Know us more', 'edufication' ),

		// course
		'course_section_enable'			=> false,
		'course_content_type'			=> 'category',
		'course_title'					=> esc_html__( 'Learn Our Most Valuable Courses Here', 'edufication' ),

		// event
		'event_section_enable'			=> false,
		'event_title'					=> esc_html__( 'Our Educational Upcoming News/Events', 'edufication' ),
		'event_read_more_label'			=> esc_html__( 'View Our Event', 'edufication' ),

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'What Happy People Said About Edufication', 'edufication' ),

		// team
		'team_section_enable'			=> false,
		'team_title'					=> esc_html__( 'Our Awesome & Creative Team Members', 'edufication' ),

		// call to action
		'cta_section_enable'			=> false,
		'cta_btn_title'					=> esc_html__( 'Learn More', 'edufication' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'Our Thoughts, Comments And Posts', 'edufication' ),
		'blog_btn_title'				=> esc_html__( 'View All Blog Post', 'edufication' )

	);

	$output = apply_filters( 'edufication_default_theme_options', $edufication_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}