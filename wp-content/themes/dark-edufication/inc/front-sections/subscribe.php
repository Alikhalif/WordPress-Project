<?php
/**
 * Subscribe section
 *
 * This is the template for the content of subscribe section
 *
 * @package Theme Palace
 * @subpackage Dark Edufication Pro
 * @since Dark Edufication Pro 1.0.0
 */
if ( ! function_exists( 'dark_edufication_add_subscribe_section' ) ) :
    /**
    * Add subscribe section
    *
    *@since Dark Edufication Pro 1.0.0
    */
    function dark_edufication_add_subscribe_section() {
    	 if ( true !== get_theme_mod( 'dark_edufication_subscribe_section_enable' ) ) {
            return false;
        }

        // Render subscribe section now.
        dark_edufication_render_subscribe_section();
    }
endif;

if ( ! function_exists( 'dark_edufication_render_subscribe_section' ) ) :
  /**
   * Start subscribe section
   *
   * @return string subscribe content
   * @since Dark Edufication Pro 1.0.0
   *
   */
   function dark_edufication_render_subscribe_section() {
        $background = ! empty( get_theme_mod( 'dark_edufication_subscribe_image' ) ) ? get_theme_mod( 'dark_edufication_subscribe_image' ) : '';
        $subscription_title = ! empty( get_theme_mod( 'dark_edufication_subscription_title' ) ) ? get_theme_mod( 'dark_edufication_subscription_title' ) : '';
        $column = (  get_theme_mod( 'dark_edufication_subscribe_section_enable', false ) && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'subscriptions' ) ) ? 'col-2' : 'col-1';
        ?>
        <div id="edufication_subscribe_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $background ); ?>');">
            <!-- .supports col-1 and col-2 -->
            <div id="subscribe-newsletter" class="<?php echo esc_attr( $column ); ?>">
                <div class="overlay"></div>
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                        edufication_section_tooltip( 'subscribe-newsletter' );
                    endif; ?>
                    <div class="hentry">
                        <?php if ( ! empty( get_theme_mod( 'dark_edufication_subscribe_section_title' ) ) || ! empty( get_theme_mod( 'dark_edufication_subscribe_section_sub_title' ) ) ) : ?>
                            <div class="section-header">
                                <?php if ( ! empty( get_theme_mod( 'dark_edufication_subscribe_section_title' ) ) ) : ?>
                                    <h3 class="section-subtitle"><?php echo esc_html( get_theme_mod( 'dark_edufication_subscribe_section_title' ) ); ?></h3>
                                <?php endif; 

                                if ( ! empty( get_theme_mod( 'dark_edufication_subscribe_section_sub_title' ) ) ) : ?>
                                    <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'dark_edufication_subscribe_section_sub_title' ) ); ?></h2>
                                <?php endif; ?>
                            </div><!-- .section-header -->
                        <?php endif; 

                        if ( get_theme_mod( 'dark_edufication_count_down_enable' ) && ! empty( get_theme_mod( 'dark_edufication_count_down_date' ) ) ) : ?>
                            <div class="course-starting-time">
                                <h4 id="courses-timer" data-countdown="<?php echo esc_attr( get_theme_mod( 'dark_edufication_count_down_date' ) ); ?>"></h4>
                            </div><!-- .course-starting-time -->
                        <?php endif; ?>
                    </div><!-- .hentry -->

                    <?php if (  get_theme_mod( 'dark_edufication_subscribe_section_enable', false ) && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'subscriptions' ) ) : ?>
                        <div class="hentry">
                            <?php 
                            $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="' . esc_html( $subscription_title ) . '" subscribe_button="' . esc_html__( 'Get it now', 'edufication' ) . '" show_subscribers_total=""]';
                            echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                            ?>
                        </div><!-- .hentry -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #subscribe-newsletter -->
        </div>
       

    <?php }
endif;