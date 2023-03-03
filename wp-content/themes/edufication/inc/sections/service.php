<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_service_section() {
    	$options = edufication_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'edufication_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        edufication_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Edufication 1.0.0
    * @param array $input service section details.
    */
    function edufication_get_service_section_details( $input ) {
        $options = edufication_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['service_content_category'] ) ? $options['service_content_category'] : '';
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
                $page_post['excerpt']   = edufication_trim_content( 13 );

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
// service section content details.
add_filter( 'edufication_filter_service_section_details', 'edufication_get_service_section_details' );


if ( ! function_exists( 'edufication_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_service_section( $content_details = array() ) {
        $options = edufication_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="edufication_service_section" class="relative page-section">
            <div id="our-services" class="col-1">
                <div class="our-services-wrapper">
                    <div class="wrapper">
                        <?php if ( is_customize_preview()):
                            edufication_section_tooltip( 'our-services' );
                        endif; ?>
                        <div class="services-wrapper">
                            <?php if ( ! empty( $options['service_title'] ) ) : ?>
                                <div class="hentry services-section-content">
                                    <div class="section-header">
                                        <h2 class="section-title separator"><?php echo esc_html( $options['service_title'] ); ?></h2>
                                    </div><!-- .section-content -->
                                </div><!-- .hentry -->
                            <?php endif; ?>

                            <div class="hentry services-items-wrapper col-2">
                                <?php foreach ( $content_details as $content ) : ?>
                                    <article>
                                        <header class="entry-header">
                                            <h2 class="entry-title">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <?php 
                                                    echo edufication_get_svg( array( 'icon' => 'check' ) );
                                                    echo esc_html( $content['title'] ); 
                                                    ?>
                                                </a>
                                            </h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    </article>
                                <?php endforeach; ?>
                            </div><!-- .hentry -->
                        </div><!-- .services-wrapper -->                    
                    </div><!-- .wrapper -->
                </div><!-- .our-services-wrapper -->
            </div><!-- #our-services -->
        </div>
        
    <?php }
endif;