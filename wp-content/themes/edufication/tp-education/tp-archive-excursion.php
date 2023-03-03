<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Edufication Pro
 * @since Edufication Pro 1.0.0
 */

get_header(); ?>
<div id="filter-posts-category" class="relative filter-by-category">
    <div class="wrapper">

    	<div class="select-category">
          	<?php if( get_query_var( 'monthnum' ) == '' ) : 
                $taxonomy = 'tp-excursion-category';
                $args = array(
                	'show_option_none'   => esc_html__( 'Select Excursion Category', 'edufication' ),
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
    </div><!-- .wrapper -->      
</div><!-- #filter-excursion-category -->

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="archive-blog-wrapper">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - edufication_action_pagination.
			*
			* @hooked edufication_pagination 
			*/
			do_action( 'edufication_action_pagination' ); 

			/**
			* Hook - edufication_infinite_loader_spinner_action.
			*
			* @hooked edufication_infinite_loader_spinner 
			*/
			do_action( 'edufication_infinite_loader_spinner_action' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( edufication_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
