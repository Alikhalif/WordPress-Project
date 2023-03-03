<?php
/**
 * Template part for displaying custom post type posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="0.3s">
		<?php $post_type = get_query_var( 'post_type' );
		switch ( $post_type ) {
			case 'tp-class': ?>
				<ul class="tp-education-meta entry-meta">
					<?php  
					if ( class_exists( 'TP_Education' ) ) : 

						if ( get_post_meta( get_the_id(), 'tp_class_age_group_value', true ) != '' ) : ?>
							<li><?php tp_class_age_group(); ?></li>
						<?php endif; 

						if ( get_post_meta( get_the_id(), 'tp_class_size_value', true ) != '' ) : ?>
							<li><?php tp_class_size(); ?></li>
						<?php endif;
						
						if ( get_post_meta( get_the_id(), 'tp_class_cost_value', true ) != '' ) : ?>
                     	
                     	<li>
                     		<?php
                            // class cost
                            tp_class_cost();    

                            // class period
                            tp_class_period();
                            ?>
                        </li>
                        <?php endif; 
                    endif; 
                    ?>
				</ul><!-- .tp-education-meta -->
			<?php break;

			case 'tp-event': ?>
				<p class="tp-education-meta entry-meta">
					<?php  
					if ( class_exists( 'TP_Education' ) ) :
						// event date
						tp_event_date();

						// event start time
						tp_event_start_time();

						// event end time
						tp_event_end_time();

						// event location
						tp_event_location();
					endif;
					?>
				</p><!-- .tp-education-meta -->
			<?php break;

			case 'tp-excursion': ?>
				<p class="tp-education-meta entry-meta">
					<?php  
					if ( class_exists( 'TP_Education' ) ) :
						// excursion start date
						tp_excursion_start_date();

						// excursion end date
						tp_excursion_end_date();

						// event end time
						tp_event_end_time();

						// excursion location
						tp_excursion_location();
					endif;
					?>
				</p><!-- .tp-education-meta -->
			<?php break;

			case 'tp-affiliation': ?>
				<p class="tp-education-meta entry-meta">
					<?php  
					if ( class_exists( 'TP_Education' ) ) :
						// team designation
						tp_affiliation_link();
					endif;
					?>
				</p><!-- .tp-education-meta -->
			<?php break;
			
			default:
			break;
		}

		?>

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
	<?php
		/**
		 * Hook edufication_author_profile
		 *  
		 * @hooked edufication_get_author_profile 
		 */
		 do_action( 'edufication_author_profile' );
	?>
</article><!-- #post-## -->
