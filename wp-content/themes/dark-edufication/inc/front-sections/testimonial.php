<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Dark Edufication
 * @since Dark Edufication 1.0.0
 */
if ( ! function_exists( 'dark_edufication_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Dark Edufication 1.0.0
    */
    function dark_edufication_add_testimonial_section() {
        $options = edufication_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'edufication_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'dark_edufication_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        dark_edufication_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'dark_edufication_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Dark Edufication 1.0.0
    * @param array $input testimonial section details.
    */
    function dark_edufication_get_testimonial_section_details( $input ) {
        $options = edufication_get_theme_options();
        
        $content = array();
        $cat_id = ! empty( $options['testimonial_content_category'] ) ? $options['testimonial_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = edufication_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) : '';
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
// testimonial section content details.
add_filter( 'dark_edufication_filter_testimonial_section_details', 'dark_edufication_get_testimonial_section_details' );


if ( ! function_exists( 'dark_edufication_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Dark Edufication 1.0.0
   *
   */
   function dark_edufication_render_testimonial_section( $content_details = array() ) {
        $options = edufication_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="edufication_testimonial_section" class="relative page-section">
            <div id="clients-section">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'clients-section' );
                    endif; ?>
                    <?php if ( ! empty( $options['testimonial_title'] ) ) : ?>
                        <div class="section-header text-center">
                            <h2 class="section-title separator"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="section-content">
                        <div class="clients-slider" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
                            <?php foreach ( $content_details as $content ) : ?>
                                <article>
                                    <div class="client-item-wrapper">
                                        <div class="featured-image">
                                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                            <?php endif; ?>

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                            </header>
                                        </div><!-- .featured-image -->

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    </div><!-- .client-item-wrapper -->
                                </article>
                            <?php endforeach; ?>
                        </div><!-- .clients-slider -->
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #clients-section -->
        </div>
        

    <?php }
endif;