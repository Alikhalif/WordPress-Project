<?php
/**
 * Client section
 *
 * This is the template for the content of topbar section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_topbar_section' ) ) :
    /**
    * Add topbar section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_topbar_section() {
        // Get topbar section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_topbar_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render topbar section now.
        edufication_render_topbar_section( $section_details );
    }
endif;
add_action( 'edufication_topbar_news_action', 'edufication_add_topbar_section', 10 );

if ( ! function_exists( 'edufication_get_topbar_section_details' ) ) :
    /**
    * topbar section details.
    *
    * @since Edufication 1.0.0
    * @param array $input topbar section details.
    */
    function edufication_get_topbar_section_details( $input ) {
        $options = edufication_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['topbar_content_category'] ) ? $options['topbar_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 5,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// topbar section content details.
add_filter( 'edufication_filter_topbar_section_details', 'edufication_get_topbar_section_details' );


if ( ! function_exists( 'edufication_render_topbar_section' ) ) :
  /**
   * Start topbar section
   *
   * @return string topbar content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_topbar_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $label = ! empty( $options['topbar_news_label'] ) ? $options['topbar_news_label'] : esc_html__( 'News', 'edufication' );
        
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div class="latest-news">
            <span class="latest-news-header">
                <?php echo edufication_get_svg( array( 'icon' => 'news' ) ); ?>
                <span><?php echo esc_html( $label ); ?></span>
            </span>

            <div class="latest-news-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":false, "autoplay": true, "draggable": true, "vertical": true, "fade": false }'>
                <?php foreach( $content_details as $content ) : ?>
                    <div class="slick-item">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><p><?php echo esc_html( $content['title'] ); ?></p></a>
                    </div><!-- .slick-item -->
                <?php endforeach; ?>
            </div><!-- .latest-news-slider-->
        </div><!-- .latest-news -->

    <?php }
endif;