<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

$options = edufication_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'edufication' );
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    
    <div class="featured-image" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');" <?php endif; ?>>
        <a href="<?php the_permalink(); ?>" class="featured-image-link"></a>
        <?php if ( edufication_archive_meta_option( 'hide_date' ) ) : ?>
            <span class="posted-on">
                <time><?php echo date_i18n( 'd', strtotime( get_the_date() ) ); ?> <span class="month"><?php echo date_i18n( 'M', strtotime( get_the_date() ) ); ?></span></time>
            </span><!-- .posted-on -->
        <?php endif; ?>
    </div>
    

    <div class="entry-container">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <?php edufication_article_footer_meta(); ?> 
        </div><!-- .entry-meta -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <a href="<?php the_permalink(); ?>" class="view-event"><?php echo esc_html( $readmore ); ?></a>
    </div><!-- .entry-container -->

</article><!-- #post-## -->
