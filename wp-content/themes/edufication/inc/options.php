<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function edufication_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'edufication' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'edufication_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function edufication_site_layout() {
        $edufication_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/frame.png',
        );

        $output = apply_filters( 'edufication_site_layout', $edufication_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'edufication_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function edufication_selected_sidebar() {
        $edufication_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'edufication' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'edufication' ),
        );

        $output = apply_filters( 'edufication_selected_sidebar', $edufication_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'edufication_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function edufication_sidebar_position() {
        $edufication_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'edufication_sidebar_position', $edufication_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'edufication_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function edufication_pagination_options() {
        $edufication_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'edufication' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'edufication' ),
        );

        $output = apply_filters( 'edufication_pagination_options', $edufication_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'edufication_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function edufication_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'edufication' ),
            'off'       => esc_html__( 'Disable', 'edufication' )
        );
        return apply_filters( 'edufication_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'edufication_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function edufication_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'edufication' ),
            'off'       => esc_html__( 'No', 'edufication' )
        );
        return apply_filters( 'edufication_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'edufication_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function edufication_sortable_sections() {
        $sections = array(
            'banner'    => esc_html__( 'Banner', 'edufication' ),
            'service'   => esc_html__( 'Services', 'edufication' ),
            'about'     => esc_html__( 'About Us', 'edufication' ),
            'course'    => esc_html__( 'Courses', 'edufication' ),
            'event'     => esc_html__( 'Events', 'edufication' ),
            'testimonial' => esc_html__( 'Testimonial', 'edufication' ),
            'team'      => esc_html__( 'Team', 'edufication' ),
            'cta'       => esc_html__( 'Call to Action', 'edufication' ),
            'blog'      => esc_html__( 'Blog', 'edufication' ),
        );
        return apply_filters( 'edufication_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'edufication_course_section_options' ) ) :
    /**
     * Pagination
     * @return array site course_section options
     */
    function edufication_course_section_options() {
        $edufication_course_section_options = array(
            'category'  => esc_html__( 'Category', 'edufication' ),
        );

        if ( class_exists( 'TP_Education' ) ) {
            $edufication_course_section_options = array_merge( $edufication_course_section_options, 
                array( 
                    'tp-course-cat' => esc_html__( 'Course Category', 'edufication' ), 
                    ) );
        }

        $output = apply_filters( 'edufication_course_section_options', $edufication_course_section_options );

        return $output;
    }
endif;

if ( ! function_exists( 'edufication_event_section_options' ) ) :
    /**
     * Pagination
     * @return array site event_section options
     */
    function edufication_event_section_options() {
        $edufication_event_section_options = array(
            'page'      => esc_html__( 'Page', 'edufication' ),
            'post'      => esc_html__( 'Post', 'edufication' ),
            'category'  => esc_html__( 'Category', 'edufication' ),
        );

        if ( class_exists( 'TP_Education' ) ) {
            $edufication_event_section_options = array_merge( $edufication_event_section_options, 
                array( 
                    'tp-event' => esc_html__( 'Events', 'edufication' ), 
                    'tp-event-cat' => esc_html__( 'Events Category', 'edufication' ), 
                    'recent-tp-event' => esc_html__( 'Recent Events', 'edufication' ), 
                    ) );
        }

        $output = apply_filters( 'edufication_event_section_options', $edufication_event_section_options );

        return $output;
    }
endif;

if ( ! function_exists( 'edufication_testimonial_section_options' ) ) :
    /**
     * Pagination
     * @return array site testimonial_section options
     */
    function edufication_testimonial_section_options() {
        $edufication_testimonial_section_options = array(
            'page'      => esc_html__( 'Page', 'edufication' ),
            'post'      => esc_html__( 'Post', 'edufication' ),
            'category'  => esc_html__( 'Category', 'edufication' ),
        );

        if ( class_exists( 'TP_Education' ) ) {
            $edufication_testimonial_section_options = array_merge( $edufication_testimonial_section_options, 
                array( 
                    'tp-testimonial' => esc_html__( 'Testimonial', 'edufication' ), 
                    'recent-tp-testimonial' => esc_html__( 'Recent Testimonial', 'edufication' ), 
                    ) );
        }

        $output = apply_filters( 'edufication_testimonial_section_options', $edufication_testimonial_section_options );

        return $output;
    }
endif;

if ( ! function_exists( 'edufication_team_section_options' ) ) :
    /**
     * Pagination
     * @return array site team_section options
     */
    function edufication_team_section_options() {
        $edufication_team_section_options = array(
            'page'      => esc_html__( 'Page', 'edufication' ),
            'post'      => esc_html__( 'Post', 'edufication' ),
            'category'  => esc_html__( 'Category', 'edufication' ),
        );

        if ( class_exists( 'TP_Education' ) ) {
            $edufication_team_section_options = array_merge( $edufication_team_section_options, 
                array( 
                    'tp-team' => esc_html__( 'Teams', 'edufication' ), 
                    'tp-team-cat' => esc_html__( 'Teams Category', 'edufication' ), 
                    'recent-tp-team' => esc_html__( 'Recent Teams', 'edufication' ), 
                    ) );
        }

        $output = apply_filters( 'edufication_team_section_options', $edufication_team_section_options );

        return $output;
    }
endif;