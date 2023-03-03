<?php
/**
 * Course section
 *
 * This is the template for the content of course section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_course_section' ) ) :
    /**
    * Add course section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_course_section() {
    	$options = edufication_get_theme_options();
        // Check if course is enabled on frontpage
        $course_enable = apply_filters( 'edufication_section_status', true, 'course_section_enable' );

        if ( true !== $course_enable ) {
            return false;
        }
        // Get course section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_course_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render course section now.
        edufication_render_course_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_course_section_details' ) ) :
    /**
    * course section details.
    *
    * @since Edufication 1.0.0
    * @param array $input course section details.
    */
    function edufication_get_course_section_details( $input ) {
         $options = edufication_get_theme_options();

        // Content type.
        $course_content_type  = $options['course_content_type'];
        $course_count = 6;
        
        $content = array();
        switch ( $course_content_type ) {
            
            case 'category':
                $cat_id = ! empty( $options['course_content_category'] ) ? $options['course_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $course_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'tp-course-cat':
                $cat_id = ! empty( $options['course_content_course_cat'] ) ? $options['course_content_course_cat'] : '';
                $args = array(
                    'post_type'         => 'tp-course',
                    'posts_per_page'    => absint( $course_count ),
                    'tax_query'         => array(
                        array(
                            'taxonomy'  => 'tp-course-category',
                            'field'     => 'id',
                            'terms'     => absint( $cat_id ),
                        )
                    ) );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// course section content details.
add_filter( 'edufication_filter_course_section_details', 'edufication_get_course_section_details' );


if ( ! function_exists( 'edufication_render_course_section' ) ) :
  /**
   * Start course section
   *
   * @return string course content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_course_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $course_content_type  = $options['course_content_type'];
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="edufication_course_section" class="relative page-section">
            <div id="courses-section">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'courses-section' );
                    endif; ?>
                    <?php if ( ! empty( $options['course_title'] ) ) : ?>
                        <div class="section-header text-center">
                            <h2 class="section-title separator"><?php echo esc_html( $options['course_title'] ); ?></h2>
                        </div><!-- .hentry -->
                    <?php endif; ?>

                    <!-- .supports col-1, col-2 and col-3 -->
                    <div class="section-content clear col-3">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="courses-wrapper">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="featured-image-link"></a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>

                                    <div class="entry-container">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                        <ul>
                                            <?php if ( class_exists( 'TP_Education' ) && in_array( $course_content_type, array( 'tp-course', 'tp-course-cat', 'recent-tp-course' ) ) ) : ?>
                                                <?php  
                                                $course_price = get_post_meta( $content['id'], 'tp_course_price_value', true );
                                                if ( ! empty( $course_price ) ) : ?>
                                                    <li><?php tp_course_price( $content['id'] ); ?></li>
                                                <?php endif; 

                                                $course_students = get_post_meta( $content['id'], 'tp_course_students_value', true );
                                                if ( ! empty( $course_students ) ) : ?>
                                                    <li><?php tp_course_students( $content['id'] ); ?></li>
                                                <?php endif; 
                                            else : ?>
                                                <li><?php edufication_posted_on( $content['id'] ); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div><!-- .entry-container -->
                                </div><!-- .courses-wrapper -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #courses-section -->
        </div>
        

    <?php }
endif;