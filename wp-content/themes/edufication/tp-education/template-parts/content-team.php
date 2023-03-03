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

    <div class="team-item-wrapper">
    	<?php if ( has_post_thumbnail() ) : ?>
	        <div class="featured-image">
	            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'post-thumbnail' ) ?>" alt="<?php the_title_attribute(); ?>"></a>
	        </div><!-- .featured-image -->
	    <?php endif; ?>

        <div class="entry-container">
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php tp_team_designation(); ?>
            </header>

            <div class="social-icons">
                <?php tp_team_social(); ?>
            </div><!-- .social-icons -->
        </div><!-- .entry-container -->
    </div><!-- .team-item-wrapper -->

</article><!-- #post-## -->
