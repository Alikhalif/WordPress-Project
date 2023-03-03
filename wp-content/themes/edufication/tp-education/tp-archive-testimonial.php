<?php
/**
 * The template for displaying course archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

get_header(); ?>
	
<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="archive-wrapper">
                <div id="testimonial-section" class="relative">
                    <!-- supports col-1, col-2, col-3 and col-4 -->
                	<div class="section-content col-<?php echo is_active_sidebar( 'sidebar-1' ) ? 2 : 3; ?>">
            
						<?php
						if ( have_posts() ) : 

							while ( have_posts() ) : the_post();
								/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*/
								get_template_part( 'tp-education/template-parts/content', 'testimonial' );
							endwhile;
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; 

						/**
						* Hook - edufication_action_pagination.
						*
						* @hooked edufication_pagination 
						*/
						do_action( 'edufication_action_pagination' );
						?>

          			</div><!--.section-content -->   
          		</div><!--.our-team-->
        	</div><!--#team-sections-->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	if ( edufication_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- .wrapper -->

<?php
get_footer();
