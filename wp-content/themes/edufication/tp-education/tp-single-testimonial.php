<?php
/**
 * The template for displaying all testimonial single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 */

get_header(); ?>
<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section id="testimonial-single">
		
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'tp-education/template-parts/content-single', 'testimonial' );

				endwhile; // End of the loop.
				?>

			</section>
		</main>
	</div>

	<?php
	if ( edufication_is_sidebar_enable() ) {
		get_sidebar();
	} ?>

</div><!-- .wrapper -->
<?php	
get_footer();
