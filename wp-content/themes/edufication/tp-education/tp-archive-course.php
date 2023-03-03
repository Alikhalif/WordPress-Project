<?php
/**
 * The template for displaying course archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

get_header(); ?>
<div id="filter-posts-category" class="relative filter-by-category">
    <div class="wrapper">

    	<div class="select-category">
          	<?php if( get_query_var( 'monthnum' ) == '' ) : 
                $taxonomy = 'tp-course-category';
                $args = array(
                	'show_option_none'   => esc_html__( 'Select Course Category', 'edufication' ),
                	'option_none_value'  => '',
                    'hide_empty'         => 0,              
                    'selected'           => 1,
                    'hierarchical'       => 1,
                    'name'               => $taxonomy,
                    'class'              => '',              
                    'taxonomy'           => $taxonomy,
                    'selected'           => get_query_var( 'term' ),
                    'value_field'        => 'slug'
                );

                wp_dropdown_categories( $args, $taxonomy ); ?>

                <span class="filter-cat-dropdown">
                	<?php echo edufication_get_svg( array( 'icon' => 'down' ) ); ?>
                </span>
            <?php endif; ?>

      	</div><!--.select-category -->


        <div class="custom-post-type-views">
            <span class="list-view">
                <svg viewBox="0 0 231 231">
                    <rect width="181" x="50" y="164.5" height="33"/>
                    <rect width="181" x="50" y="99.5" height="33"/>
                    <rect width="181" x="50" y="32.5" height="33"/>
                    <rect width="33" y="165.5" height="33"/>
                    <rect width="33" y="99.5" height="33"/>
                    <rect width="33" y="32.5" height="33"/>
                </svg>
            </span><!-- .list-view -->
            <span class="grid-view">
                <svg viewBox="0 0 399.36 399.36">
                    <rect width="179.2" height="179.2"/>
                    <rect x="220.16" width="179.2" height="179.2"/>
                    <rect y="220.16" width="179.2" height="179.2"/>
                    <rect x="220.16" y="220.16" width="179.2" height="179.2"/>
                </svg>
            </span><!-- .grid-view -->
        </div><!-- .custom-post-type-views -->
    </div><!-- .wrapper -->      
</div><!-- #filter-course-category -->
	
<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="courses-section" class="relative">
                <!-- .supports col-1, col-2 and col-3 -->
                <div class="section-content clear col-<?php echo is_active_sidebar( 'sidebar-1' ) ? 2 : 3; ?>">
            
					<?php
					if ( have_posts() ) : 

						while ( have_posts() ) : the_post();
							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'tp-education/template-parts/content', 'course' );
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

          		</div><!--.graduate-list-->   
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
