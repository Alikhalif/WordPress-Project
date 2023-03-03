<?php
/**
 * Event section
 *
 * This is the template for the content of event section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_event_section' ) ) :
    /**
    * Add event section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_event_section() {
    	$options = edufication_get_theme_options();
        // Check if event is enabled on frontpage
        $event_enable = apply_filters( 'edufication_section_status', true, 'event_section_enable' );

        if ( true !== $event_enable ) {
            return false;
        }
        // Get event section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_event_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render event section now.
        edufication_render_event_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_event_section_details' ) ) :
    /**
    * event section details.
    *
    * @since Edufication 1.0.0
    * @param array $input event section details.
    */
    function edufication_get_event_section_details( $input ) {
        $options = edufication_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['event_content_category'] ) ? $options['event_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $count = ( 1 === $i ) ? 20 : 10;
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = edufication_trim_content( $count );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
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
// event section content details.
add_filter( 'edufication_filter_event_section_details', 'edufication_get_event_section_details' );


if ( ! function_exists( 'edufication_render_event_section' ) ) :
  /**
   * Start event section
   *
   * @return string event content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_event_section( $content_details = array() ) {
        $options = edufication_get_theme_options();
        $readmore = ! empty( $options['event_read_more_label'] ) ? $options['event_read_more_label'] : esc_html__( 'View Our Event', 'edufication' );

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="edufication_event_section" class="relative page-section">
            <div id="news-events">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'news-events' );
                    endif; ?>
                    <?php if ( ! empty( $options['event_title'] ) ) : ?>
                        <div class="section-header text-center">
                            <h2 class="section-title separator"><?php echo esc_html( $options['event_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="section-content clear">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article class="<?php echo ! empty( $content['image'] ) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                                
                                <div class="featured-image" <?php if ( ! empty( $content['image'] ) ) : ?> style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');" <?php endif; ?>>
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="featured-image-link"></a>
                                    <?php endif; ?>
                                    <span class="posted-on">
                                        <time><?php echo date_i18n( 'd', strtotime( get_the_date( '', $content['id'] ) ) ); ?> <span class="month"><?php echo date_i18n( 'M', strtotime( get_the_date( '', $content['id'] ) ) ); ?></span></time>
                                    </span><!-- .posted-on -->
                                </div>

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->

                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="view-event"><?php echo esc_html( $readmore ); ?></a>
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #news-events -->
        </div>
        

    <?php }
endif;