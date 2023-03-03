<?php
/**
 * Template part for displaying team post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Graduate Pro
 */
?>

<div class="counselor-profile clear">
	<aside id="left-sidebar" class="widget-area">
		<section id="profile-1" class="widget widget_profile">
			<div class="image-wrapper"> 
				<?php  
				if ( has_post_thumbnail() )
					the_post_thumbnail( 'thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
				?>
				<h2 class="widget-title"><?php the_title(); ?></h2>
				<span><?php tp_team_designation(); ?></span>
			</div><!--.image-wrapper-->  

			<?php $tp_team_email = get_post_meta( get_the_ID(), 'tp_team_email_value', true ); 
			if ( ! empty( $tp_team_email ) ) :
			?>
				<div class="follow-buttons">
					<a href="mailto:<?php echo esc_attr( $tp_team_email ); ?>" class="btn-red-transparent"><?php esc_html_e( 'message me', 'edufication' ); ?></a>
				</div><!-- .follow-buttons -->
			<?php endif; ?>

			<div class="social-link clear">
				<?php  
				// Team Social Icons
				if ( function_exists( 'tp_team_social' ) )
					tp_team_social(); ?>
			</div>

			<div class="ratings clear">
				<?php
				$tp_team_courses = get_post_meta( get_the_ID(), 'tp_team_courses_value', true );
				if ( ! empty( $tp_team_courses ) && $tp_team_courses[0] !== 0 ) :
					$team_course_count = count( $tp_team_courses );
				?>
					<div class="pull-left">
						<span class="numbers"><?php echo absint( $team_course_count ); ?></span>
						<span><?php esc_html_e( 'courses', 'edufication' ); ?></span>
					</div>
				<?php endif; ?>
				<div class="pull-left">
					<span class="numbers">
					<?php 
					if ( function_exists( 'tp_education_like_button' ) ) :
						echo tp_education_like_button(); 
					endif;
					?>
					</span>
					<span><?php esc_html_e( 'likes', 'edufication' ); ?></span>
				</div>
			</div><!--.ratings-->

			<ul class="contact-address">
				<?php
				$tp_team_email = get_post_meta( get_the_ID(), 'tp_team_email_value', true );
				if ( ! empty( $tp_team_email ) ) :
				?>
					<li><a href="mailto:<?php echo esc_attr( $tp_team_email ); ?>"><i class="fa fa-envelope"></i><?php echo esc_html( $tp_team_email ); ?></a></li>
				<?php
				endif;
				$tp_team_phone = get_post_meta( get_the_ID(), 'tp_team_phone_value', true );
				if ( ! empty( $tp_team_phone ) ) :
				?>
					<li><a href="tel:<?php echo absint( preg_replace( '/\D+/', '', $tp_team_phone ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_html( $tp_team_phone ); ?></a></li>
				<?php
				endif;
				$tp_team_skype = get_post_meta( get_the_ID(), 'tp_team_skype_value', true );
				if ( ! empty( $tp_team_skype ) ) :
				?>
					<li><a href="callto:<?php echo esc_attr( $tp_team_skype ); ?>"><i class="fa fa-skype"></i><?php echo esc_html( $tp_team_skype ); ?></a></li>
				<?php
				endif;
				$tp_team_website = get_post_meta( get_the_ID(), 'tp_team_website_value', true );
				if ( ! empty( $tp_team_website ) ) :
				?>
					<li><a href="<?php echo esc_url( $tp_team_website ); ?>"><i class="fa fa-link"></i><?php echo esc_html( $tp_team_website ); ?></a></li> 
				<?php endif; ?>
			</ul><!--contact-address-->
		</section><!-- .widget_categories -->
	</aside><!--#left-sidebar-->

	<div id="about-counselor" class="wow fadeInDown" data-wow-delay="0.1s" data-wow-duration="0.3s">
		<header class="entry-header">
			<h2 class="entry-title"><?php esc_html_e( 'About', 'edufication' ); ?></h2>
		</header><!--.entry-header-->

	  	<div class="entry-content">
	        <?php  
	        the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edufication' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
	        ?>
	  	</div><!--.entry-content-->

		<div class="tab-courses">
            <ul class="tabs tp-education-search-tabs">
				<?php if ( ! empty( $tp_team_courses ) && $tp_team_courses[0] !== 0 ) : ?>
					<li class="tab-link active" data-tab="tab_courses"><a href="#."><?php esc_html_e( 'Courses', 'edufication' ); ?></a><span><?php echo absint( $team_course_count ); ?></span></li>
				<?php endif; ?>
					<li class="tab-link <?php echo empty( $tp_team_courses ) ? 'active' : ''; ?>" data-tab="tab_reviews"><a href="#."><?php esc_html_e( 'Reviews', 'edufication' ); ?></a><span><?php echo absint( get_comments_number() ); ?></span></li>
			</ul><!--.tabs-->

			<?php if ( ! empty( $tp_team_courses ) && $tp_team_courses[0] !== 0 ) : 
				$args = array(
					'post_type'	=> 'tp-course',
					'post__in'	=> $tp_team_courses ? $tp_team_courses : ''
				);
				$posts = get_posts( $args );
			?>
				<div id="tab_courses" class="tab-content <?php echo ! empty( $tp_team_courses ) ? 'active' : ''; ?>">
					<ul>
						<?php foreach ( $posts as $post ) : ?>
							<li class="has-post-thumbnail clear">
								<div class="post-image">
									<a href="<?php the_permalink( $post->ID ); ?>">
										<?php 
										if ( has_post_thumbnail( $post->ID ) )
											the_post_thumbnail( 'thumbnail', array( 'alt' => esc_attr( get_the_title( $post->ID ) ) ) );
										else 
		                                	echo '<img src="' . get_template_directory_uri() .'/assets/uploads/no-featured-image-200x200.jpg" alt="'. esc_attr( get_the_title( $post->ID ) ) .'">';
										?>
									</a>
								</div><!-- .post-image-->
								<div class="post-wrapper">
									<div class="post-title pull-left">
										<h5><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( get_the_title( $post->ID ) ); ?></a></h5>
										<?php 
										if ( function_exists( 'tp_course_price' ) ) :
											tp_course_price(); 
										endif;
										?>
									</div><!-- .post-title -->
									<a href="<?php the_permalink( $post->ID ); ?>" class="btn-black"><?php esc_html_e( 'view', 'edufication' ); ?></a>
								</div><!-- .post-wrapper -->
							</li>
						<?php endforeach; 
						wp_reset_postdata(); ?>
					</ul>
				</div><!-- #tab_courses -->
			<?php endif; ?>

			<div id="tab_reviews" class="tab-content <?php echo empty( $tp_team_courses ) ? 'active' : ''; ?>">
				<?php  
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div><!-- #tab_reviews -->
		</div><!-- .tab-courses -->
	</div><!--#about-counselor-->
</div><!--#counselor-profile-->
<?php  
/**
* Hook edufication_action_post_pagination
*  
* @hooked edufication_post_pagination 
*/
do_action( 'edufication_action_post_pagination' );
?>
