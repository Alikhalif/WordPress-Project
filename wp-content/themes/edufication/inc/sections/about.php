<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_about_section() {
    	$options = edufication_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'edufication_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        edufication_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Edufication 1.0.0
    * @param array $input about section details.
    */
    function edufication_get_about_section_details( $input ) {
        $options = edufication_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
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
                $page_post['excerpt']   = edufication_trim_content( 50 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

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
// about section content details.
add_filter( 'edufication_filter_about_section_details', 'edufication_get_about_section_details' );


if ( ! function_exists( 'edufication_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_about_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="edufication_about_section">
                <div id="about-us" class="relative">
                    <div class="wrapper">
                        <?php if ( is_customize_preview()):
                                edufication_section_tooltip( 'about-us' );
                            endif; ?>
                        <div class="about-section-wrapper <?php echo ! empty( $content['image'] ) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?> ">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ?>');">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="featured-image-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <div class="section-header">
                                        <h2 class="section-title separator"><?php echo esc_html( $content['title'] ); ?></h2>
                                    </div><!-- .section-header -->
                                <?php endif; 

                                if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="section-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; 

                                if ( ! empty( $readmore ) ) : ?>
                                    <div class="more-link">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
                                    </div><!-- .more-link -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </div><!-- .about-section-wrapper -->
                    </div><!-- .wrapper -->
                </div><!-- #about-us -->
            </div>
          
        <?php endforeach;
    }
endif;