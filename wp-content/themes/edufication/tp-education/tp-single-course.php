<?php
/**
 * The template for displaying all course single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 */

get_header(); ?>

<div id="courses-single-meta" class="relative courses-meta">
    <div class="wrapper">
        <div class="entry-meta">
			<?php 
			$tp_course_professor = get_post_meta( get_the_id(), 'tp_course_professor_value', true );
			$tp_course_professor = ! empty( $tp_course_professor ) ? $tp_course_professor : '';
			if ( ! empty( $tp_course_professor ) ) :
				$tp_args = array(
					'post_type'	=> 'tp-team',
					'p'			=> $tp_course_professor
					);
				$tp_posts = get_posts( $tp_args );
				if( ! empty( $tp_posts ) ) :
					foreach ( $tp_posts as $post ) :
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				?>
						<div class="pull-left">
							<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
								<div class="image">
									<a href="<?php the_permalink( $post->ID ); ?>">
										<img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $post->ID ) ); ?>" >
									</a>
								</div>
							<?php endif; ?>
							<div class="user">
								<small><?php esc_html_e( 'Professor', 'edufication' ); ?></small>
	                      		<small><a href="<?php the_permalink( $post->ID ); ?>" class="name"><?php echo esc_html( get_the_title( $post->ID ) ); ?></a></small>
							</div>
						</div>
					<?php endforeach;
				endif; 
				wp_reset_postdata();
			endif;
			?>
			<div class="pull-left categories">
				<small><?php esc_html_e( 'Categories', 'edufication' ); ?></small>
				<small>
					<?php 
					if ( function_exists( 'tp_education_get_terms' ) ) :
						tp_education_get_terms( 'tp-course-category', get_the_id() ); 
					endif; 
					?>
				</small>
			</div>

			<div class="pull-left categories">
				<small><?php esc_html_e( 'Likes', 'edufication' ); ?></small>
				<small>
					<?php 
					if ( function_exists( 'tp_education_like_button' ) ) :
						echo tp_education_like_button(); 
					endif;
					?>
				</small>
			</div>

			<div class="pull-left reviews">
				<small><?php esc_html_e( 'Reviews', 'edufication' ); ?></small>
				<small class="reviews-number">( <?php echo absint( get_comments_number( get_the_id() ) ) . ' ' . esc_html__( 'Reviews', 'edufication' ); ?> )</small>
			</div>

		</div><!--.entry-meta-->
    </div><!-- .wrapper -->      
</div><!-- #courses-single-meta -->

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="course-single">

					<?php
						get_template_part( 'tp-education/template-parts/content-single', 'course' );

					?>
					
			</div><!-- #courses-details -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	if ( edufication_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- .container -->
<?php	
get_footer();
