<?php
/**
* Template part for displaying testimonial post.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Graduate Pro
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="featured-image">
			<?php the_post_thumbnail( 'thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
		</figure>
	<?php endif; ?>
	<div class="entry-container">
		<h2><?php the_title(); ?></h2>
		<span class="position">
			<?php  
			// testimonial designation
			if ( function_exists( 'tp_testimonial_designation' ) )
				tp_testimonial_designation();
			?>
		</span>
		<ul class="rating">
			<?php  
			// testimonial ratings
			if ( function_exists( 'tp_testimonial_rating' ) )
				tp_testimonial_rating();
			?>
		</ul><!-- .star-rating -->

		<div class="description">
			<p><?php the_content(); ?></p>
		</div><!-- .description -->

		<?php  
		// Testimonial Social Icons
		if ( function_exists( 'tp_testimonial_social' ) )
			tp_testimonial_social();
		?>
	</div><!-- .entry-container -->
</article>

<?php  
/**
* Hook edufication_action_testimonial_pagination
*  
* @hooked edufication_testimonial_pagination 
*/
do_action( 'edufication_action_testimonial_pagination' );
?>

<div class="testimonial-thumbs">
	<?php  
	$testimonial_id = get_the_ID();
	$args = array(
		'post_type'			=> 'tp-testimonial',
		'posts_per_page'	=> -1,
		'order'				=> 'ASC',
		);
	$posts = get_posts( $args );
	?>
	<ul>
		<?php foreach ( $posts as $post ) : ?>
			<li class="<?php echo ( $testimonial_id == $post->ID ) ? 'active' : ''; ?>" >
				<a href="<?php the_permalink( $post->ID ); ?>" title="<?php the_title(); ?>">
					<div class="blue-overlay"></div>
					<?php  
					if ( has_post_thumbnail( $post->ID ) ) :
						echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
					else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/uploads/no-featured-image-150x150.jpg' ); ?>" alt="<?php the_title_attribute( array( 'post' => $post->ID ) ); ?>">
					<?php endif;
					?>
				</a>
			</li>
		<?php endforeach; 
		wp_reset_postdata(); ?>
	</ul>
</div><!-- .testimonial-thumbs -->
