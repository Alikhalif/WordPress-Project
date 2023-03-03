<?php
/**
 * counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage  Dark Edufication Pro
 * @since  Dark Edufication Pro 1.0.0
 */
if ( ! function_exists( 'dark_edufication_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since  Dark Edufication Pro 1.0.0
    */
    function dark_edufication_add_counter_section() {

        if ( true !== get_theme_mod( 'dark_edufication_counter_section_enable' ) ) {
            return false;
        }

        // Render counter section now.
        dark_edufication_render_counter_section();
    }
endif;

if ( ! function_exists( 'dark_edufication_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since  Dark Edufication Pro 1.0.0
   *
   */
   function dark_edufication_render_counter_section() {
        $image   = empty( get_theme_mod( 'dark_edufication_counter_image' ) ) ? '' : get_theme_mod( 'dark_edufication_counter_image' ) ;
        $counter_count = ! empty( $options['counter_count'] ) ? $options['counter_count'] : 4;

        $contents = array();
        for( $i= 1; $i <= absint( $counter_count ); $i++ ){
            $page_post['title']     = empty( get_theme_mod( 'dark_edufication_counter_text_' . $i ) ) ? '' : get_theme_mod( 'dark_edufication_counter_text_' . $i );
            $page_post['icon']      = empty( get_theme_mod( 'dark_edufication_counter_icon_' . $i ) ) ? '' : get_theme_mod( 'dark_edufication_counter_icon_' . $i );
            $page_post['number']    = empty( get_theme_mod( 'dark_edufication_counter_value_' . $i ) ) ? '' : get_theme_mod( 'dark_edufication_counter_value_' . $i );

            if(!empty($page_post['title']) || !empty($page_post['percent']) || !empty($page_post['icon']) || !empty($page_post['number']))  array_push( $contents, $page_post );
        } ?>
        
        <div id="edufication_counter_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $image ) ; ?>');">
            <div class="overlay"></div>
            <div id="counter-section">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'counter-section' );
                    endif; ?>
                   <?php if(!empty($contents)): ?>
                        <div class="section-content col-4 clear">
                        <?php foreach ( $contents as $content ): ?>
                            <article>
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <i class="fa <?php echo esc_attr($content['icon']); ?>"></i>
                                    </div>
                                    <h2 class="counter-value"><?php echo esc_html( $content['number'] ); ?></h2>
                                    <h3 class="counter-title"><?php echo esc_html( $content['title'] ); ?></h3>
                                </div>
                            </article>
                        <?php endforeach; ?>
                        </div><!-- .section-content -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #counter-section -->
        </div>
          

    <?php }
endif;
