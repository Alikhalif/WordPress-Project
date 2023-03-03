<?php
/**
 * Banner section
 *
 * This is the template for the content of banner section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_banner_section' ) ) :
    /**
    * Add banner section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_banner_section() {
        $options = edufication_get_theme_options();
        // Check if banner is enabled on frontpage
        $banner_enable = apply_filters( 'edufication_section_status', true, 'banner_section_enable' );

        if ( true !== $banner_enable ) {
            return false;
        }
        // Get banner section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render banner section now.
        edufication_render_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_banner_section_details' ) ) :
    /**
    * banner section details.
    *
    * @since Edufication 1.0.0
    * @param array $input banner section details.
    */
    function edufication_get_banner_section_details( $input ) {
        $options = edufication_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['banner_content_page'] ) ? $options['banner_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = edufication_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/hero-banner.jpg';

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
// banner section content details.
add_filter( 'edufication_filter_banner_section_details', 'edufication_get_banner_section_details' );


if ( ! function_exists( 'edufication_render_banner_section' ) ) :
  /**
   * Start banner section
   *
   * @return string banner content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_banner_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $btn_label = ! empty( $options['banner_btn_label'] ) ? $options['banner_btn_label'] : esc_html__( 'Learn More', 'edufication' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="edufication_banner_section">
                <div id="hero-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                    <div class="overlay"></div>
                        <div class="wrapper">
                            <?php if ( is_customize_preview()):
                                edufication_section_tooltip( 'hero-section' );
                            endif; ?>
                            <div class="hero-content-wrapper">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <div class="section-header">
                                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    </div><!-- .section-content -->
                                <?php endif; 

                                if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="section-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div><!-- .section-content -->
                                <?php endif; ?>

                                <div class="buttons">
                                    <?php if ( ! empty( $btn_label ) ) : ?>
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_label ); ?></a>
                                    <?php endif; ?>
                                </div><!-- .buttons -->
                            </div><!-- .hero-content-wrapper -->
                    </div><!-- .wrapper -->
                </div><!-- #hero-section -->
            </div>
            
        <?php endforeach;
    }
endif;