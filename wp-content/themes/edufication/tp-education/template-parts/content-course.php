<?php
/**
 * Template part for displaying team.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image'; ?>">

	<div class="courses-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
	        <div class="featured-image" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'post-thumbnail' ) ); ?>');">
	            <a href="<?php the_permalink(); ?>" class="featured-image-link"></a>
	        </div><!-- .featured-image -->
	    <?php endif; ?>

        <div class="entry-container">
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <ul>
                <?php if ( get_post_meta( get_the_id(), 'tp_course_price_value', true ) != '' ) : ?>
                    <li><?php tp_course_price(); ?></li>
                <?php endif; 

                 if ( get_post_meta( get_the_id(), 'tp_course_students_value', true ) != '' ) : ?>
                    <li><?php tp_course_students(); ?></li>
                <?php endif; ?>
            </ul>
        </div><!-- .entry-container -->
    </div><!-- .courses-wrapper -->

</article><!-- #post-## -->
