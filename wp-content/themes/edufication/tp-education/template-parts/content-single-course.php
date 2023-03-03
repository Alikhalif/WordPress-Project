<?php
/**
 * Template part for displaying course posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

$options = edufication_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="featured-image">
				<?php the_post_thumbnail( 'full', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
			</div>
		<?php } ?>
		<div class="entry-container">
			<div class="tab pull-left">
				<ul class="tabs tp-education-search-tabs">
					<li class="tab-link active" data-tab="tab-3"><a href="#."><?php esc_html_e( 'Courses', 'edufication' ); ?></a></li>
					<li class="tab-link" data-tab="tab-4"><a href="#."><?php esc_html_e( 'Curriculum', 'edufication' ); ?></a></li>
					<li class="tab-link" data-tab="tab-5"><a href="#."><?php esc_html_e( 'Counselors', 'edufication' ); ?></a></li>
					<li class="tab-link" data-tab="tab-6"><a href="#."><?php esc_html_e( 'Reviews', 'edufication' ); ?></a></li>
				</ul><!--.tabs-->
			</div><!--.tab/pull-left-->

			<div class="course-features-wrapper">
				<div class="courses-list two-columns">

					<div id="tab-3" class="tab-content active">
						<div class="tab-pane">
							<div class="details-text">
								<h2><?php esc_html_e( 'Course Description', 'edufication' ); ?></h2>
								<?php 
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edufication' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
								?>
							</div><!--.details-text-->
						</div><!--.row-->
					</div><!--.tab-3-->

					<div id="tab-4" class="tab-content">
						<div class="tab-pane">
							<div class="details-text">
								<h2><?php esc_html_e( 'Related Courses', 'edufication' ); ?></h2>
								<ul>
									<?php 
									$term_id = array();
									$terms = wp_get_post_terms( get_the_ID(), 'tp-course-category', array( "fields" => "all" ) );
									foreach ( $terms as $term ) :
										$term_id[] = $term->term_id;
									endforeach;
									$args = array(
						                'post_type'         => $post_type,
						                'post__not_in'		=> array( get_the_id() ),
						                'tax_query'         => array(
						                    array(
						                        'taxonomy'  => 'tp-course-category',
						                        'field'     => 'id',
						                        'terms'     => $term_id
						                    )
						                )
						            );
						            $posts = get_posts( $args );
						            foreach ( $posts as $post )	: ?>
										<li><span><a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a></span></li>
						            <?php endforeach; 
						            wp_reset_postdata(); ?>			
								</ul>
							</div><!--.details-text-->

						</div><!--.tab-pane-->
					</div><!--.tab-4-->

					<div id="tab-5" class="tab-content">
						<div class="tab-pane">
							<div class="details-text">
								<h2><?php esc_html_e( 'Counselors Detail', 'edufication' ); ?></h2>
								<ul class="comment-list">
									<?php  
									$tp_course_counselors = get_post_meta( get_the_id(), 'tp_course_counselors_value', true );
									$tp_course_counselors = ! empty( $tp_course_counselors ) ? $tp_course_counselors : '';
									if ( ! empty( $tp_course_counselors ) && $tp_course_counselors[0] !== 0 ) :
										$args = array(
											'post_type'	=> 'tp-team',
											'post__in'	=> $tp_course_counselors
										);
										$posts = get_posts( $args );
										foreach ( $posts as $post ) : ?>

										<li>
											
											<?php 
											if ( has_post_thumbnail( $post->ID ) )
												the_post_thumbnail( 'thumbnail', array( 'alt' => esc_attr( get_the_title( $post->ID ) ) ) );
											else 
			                                	echo '<img src="' . get_template_directory_uri() .'/assets/uploads/no-featured-image-200x200.jpg" alt="'. esc_attr( get_the_title() ) .'">';
											?>
											<span>
												<a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a>
												<?php 
												if ( function_exists( 'tp_team_designation' ) ) :
													tp_team_designation(); 
												endif;
												?>
											</span>

											<span class="course-counselor-detail">
												<?php echo edufication_trim_content( 25, $post  ); ?>
											</span>

										</li>

										<?php endforeach; 
								        wp_reset_postdata(); 
							        else : ?>
							        	<h5><?php esc_html_e( 'No Counselor Found !', 'edufication' ); ?></h5>
							    	<?php endif; ?>
								</ul>
							</div><!--.details-text-->

						</div><!--.tab-pane-->
					</div><!--.tab-5-->

					<div id="tab-6" class="tab-content">
						<div class="tab-pane">
							<div class="details-text">
								<?php  
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>
							</div><!--.details-text-->

						</div><!--.tab-pane-->
					</div><!--.tab-6-->

				</div><!--.courses-list-->


				<div class="course-features">
					<h2><?php esc_html_e( 'Course Features', 'edufication' ); ?></h2>
					<ul>
						<?php if ( class_exists( 'TP_Education' ) ) : ?>
							<?php
							$course_price = get_post_meta( get_the_id(), 'tp_course_price_value', true );
							if ( ! empty( $price ) ) : ?>
								<li><?php tp_course_price(); ?></li>
							<?php endif; 

							$course_type = get_post_meta( get_the_id(), 'tp_course_type_value', true );
							if ( ! empty( $type ) ) : ?>
								<li><?php tp_course_type(); ?></li>
							<?php endif; 

							$course_students = get_post_meta( get_the_id(), 'tp_course_students_value', true );
							if ( ! empty( $course_students ) ) : ?>
								<li><?php tp_course_students(); ?></li>
							<?php endif; 

							$course_duration = get_post_meta( get_the_id(), 'tp_course_duration_value', true );
							if ( ! empty( $course_duration ) ) : ?>
								<li><?php tp_course_duration(); ?></li>
							<?php endif; 

							$course_skills = get_post_meta( get_the_id(), 'tp_course_skills_value', true );
							if ( ! empty( $course_skills ) ) : ?>
								<li><?php tp_course_skills(); ?></li>
							<?php endif; 

							$course_language = get_post_meta( get_the_id(), 'tp_course_language_value', true );
							if ( ! empty( $course_language ) ) : ?>
								<li><?php tp_course_language(); ?></li>
							<?php endif; 

							$course_assessment = get_post_meta( get_the_id(), 'tp_course_assessment_value', true );
							if ( ! empty( $course_assessment ) ) : ?>
								<li><?php tp_course_assessment(); ?></li>
							<?php endif;
						endif; ?>
					</ul>
				</div><!--.course-features-->

				<?php 
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edufication' ),
						'after'  => '</div>',
					) );

				?>

		</div><!--.course-features-wrapper-->
	</div><!--.entry-container-->
</article><!-- #post-## -->

<?php  
/**
* Hook edufication_action_post_pagination
*  
* @hooked edufication_post_pagination 
*/
do_action( 'edufication_action_post_pagination' );

$courses = wp_count_posts( 'tp-course' );
$courses = $courses->publish;

if ( $courses > 1 ) :
	$args = array(
		'post_type'			=> 'tp-course',
		'posts_per_page'	=> 2,
		'order'				=> 'rand',
		'post__not_in'		=> array( get_the_ID() )
		);
	$posts = get_posts( $args );
	if ( ! empty( $posts ) ) :
	?>
		<div id="courses-section" class="related-courses">
			<h2><?php esc_html_e( 'You May Like', 'edufication' ); ?></h2>
			<div class="section-content col-3">
				<?php foreach ( $posts as $post ) : ?>
					 <article class="<?php echo has_post_thumbnail( $post->ID ) ? 'has-featured-image' : 'no-featured-image'; ?>">
						<div class="courses-wrapper">
							<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
							 	<div class="featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' ); ?>');">
	                                <a href="<?php the_permalink( $post->ID ); ?>" class="featured-image-link"></a>
	                            </div><!-- .featured-image -->
	                        <?php endif; ?>

							<div class="entry-container">
								<header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h2>
                                </header>
                                <ul>
                                	<?php 
                                	$course_price = get_post_meta( get_the_id(), 'tp_course_price_value', true );
                                	if ( ! empty( $course_price ) ) : ?>
	                                    <li><?php tp_course_price( $post->ID ); ?></li>
	                                <?php endif; 

	                                $course_students = get_post_meta( get_the_id(), 'tp_course_students_value', true );
	                                if ( ! empty( $course_students ) ) : ?>
	                                    <li><?php tp_course_students( $post->ID ); ?></li>
	                                <?php endif; ?>
                            	</ul>
							</div><!-- .entry-container -->
						</div><!-- .course-wrapper -->
					</article>
				<?php endforeach; 
				wp_reset_postdata(); ?>
			</div><!--.related-courses-->
		</div><!--.related-courses-->  

	<?php endif; 
endif; ?>