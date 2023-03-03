<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Edufication Pro
 * @since Edufication Pro 1.0.0
 */

$options = edufication_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'edufication' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
            <a href="<?php the_permalink(); ?>" class="featured-image-link"></a>
            <span class="posted-on">
                <time>
                <?php echo date_i18n( 'd', strtotime( get_the_date() ) ); ?> <span class="month"><?php echo date_i18n( 'M', strtotime( get_the_date() ) ); ?></span>
                </time>
            </span><!-- .posted-on -->
        </div>
    <?php endif; ?>

    <div class="entry-container">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <span class="posted-on">
                <time>
                    <?php
                        echo edufication_get_svg( array( 'icon' => 'time' ) );
                        tp_event_start_time();
                        echo ' - ';
                        tp_event_end_time();
                    ?>
                </time>
            </span><!-- .posted-on -->

            <span class="cat-links">
                <?php echo edufication_get_svg( array( 'icon' => 'plane' ) ); ?>
                <a href="<?php the_permalink(); ?>"><?php tp_event_location(); ?></a>
            </span><!-- .cat-links -->
        </div><!-- .entry-meta -->

        <div class="entry-content">
            <?php 
            the_excerpt(); 

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edufication' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <a href="<?php the_permalink(); ?>" class="view-event"><?php echo esc_html( $readmore ); ?></a>
    </div><!-- .entry-container -->

</article><!-- #post-## -->
