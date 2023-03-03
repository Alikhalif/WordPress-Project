<?php
/**
 * Template part for displaying team.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */
?>

<article id="post-<?php the_ID(); ?>">

    <div class="client-item-wrapper">
        <div class="featured-image">
    	   <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?></a>
	       <?php endif; ?>
           
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php tp_testimonial_designation(); ?>
            </header>
        </div><!-- .featured-image -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <div class="rating">
            <?php tp_testimonial_rating(); ?>
        </div><!-- .rating -->
    </div><!-- .client-item-wrapper -->

</article><!-- #post-## -->
