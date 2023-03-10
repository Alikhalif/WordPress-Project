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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<header class="entry-header">
	        <div class="entry-meta">
	            <?php 
	            if ( ! $options['single_post_hide_date'] ) :
	            	edufication_posted_on();
            	endif;

	        	if ( ! $options['single_post_hide_category'] ) :
	           		edufication_single_categories();
	        	endif;
	            ?>
	        </div><!-- .entry-meta -->
    </header>

	<div class="post-wrapper">
		<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edufication' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edufication' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="entry-meta">
				<?php edufication_entry_footer(); ?>
			</div>
		</div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
