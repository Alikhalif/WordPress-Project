<?php
/**
 * Team section
 *
 * This is the template for the content of team section
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */
if ( ! function_exists( 'edufication_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since Edufication 1.0.0
    */
    function edufication_add_team_section() {
    	$options = edufication_get_theme_options();
        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'edufication_section_status', true, 'team_section_enable' );

        if ( true !== $team_enable ) {
            return false;
        }
        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'edufication_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render team section now.
        edufication_render_team_section( $section_details );
    }
endif;

if ( ! function_exists( 'edufication_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since Edufication 1.0.0
    * @param array $input team section details.
    */
    function edufication_get_team_section_details( $input ) {
        $options = edufication_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['team_content_category'] ) ? $options['team_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 4,
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
// team section content details.
add_filter( 'edufication_filter_team_section_details', 'edufication_get_team_section_details' );


if ( ! function_exists( 'edufication_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since Edufication 1.0.0
   *
   */
   function edufication_render_team_section( $content_details = array() ) {
        $options = edufication_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="edufication_team_section" class="relative page-section">
             <div id="our-team">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'our-team' );
                    endif; ?>
                    <?php if ( ! empty( $options['team_title'] ) ) : ?>
                        <div class="section-header text-center">
                            <h2 class="section-title separator"><?php echo esc_html( $options['team_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <!-- supports col-1, col-2, col-3 and col-4 -->
                    <div class="section-content col-4">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="team-item-wrapper">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>
                                    <div class="entry-container">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </header>
                                    </div><!-- .entry-container -->
                                </div><!-- .team-item-wrapper -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #our-team -->

        </div>
       
    <?php }
endif;