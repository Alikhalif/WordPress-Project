<?php
/**
 * The template for displaying all custom single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 */

get_header(); ?>

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="single-wrapper">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'tp-education/template-parts/content-custom', 'single' );

					/**
					* Hook edufication_action_post_pagination
					*  
					* @hooked edufication_post_pagination 
					*/
					do_action( 'edufication_action_post_pagination' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	if ( edufication_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- .container -->
<?php	
get_footer();
