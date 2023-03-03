<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_cta_section() {
    	$options = edufication_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'edufication_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        edufication_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Edufication 1.0.0
    * @param array $input cta section details.
    */
    function edufication_get_cta_section_details( $input ) {
        $options = edufication_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
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
                $page_post['excerpt']   = edufication_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// cta section content details.
add_filter( 'edufication_filter_cta_section_details', 'edufication_get_cta_section_details' );


if ( ! function_exists( 'edufication_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_cta_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $readmore = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="edufication_cta_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div id="call-to-action">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <?php if ( is_customize_preview()):
                            edufication_section_tooltip( 'call-to-action' );
                        endif; ?>
                        <?php if ( ! empty( $content['title'] ) ) : ?>
                            <div class="section-header text-center">
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </div><!-- .section-header -->
                        <?php endif; 

                        if ( ! empty( $content['excerpt'] ) ) : ?>
                            <div class="section-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .section-content -->
                        <?php endif; ?>
                        <div class="buttons">
                            <?php if ( ! empty( $readmore ) ) : ?>
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                            <?php endif; ?>
                        </div><!-- .buttons -->
                    </div><!-- .wrapper -->
                </div><!-- #call-to-action -->
            </div>
           
        <?php endforeach;
    }
endif;