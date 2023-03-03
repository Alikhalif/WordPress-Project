<?php if ( get_theme_mod('lms_education_blog_box_enable') ) : ?>

<?php $lms_education_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('lms_education_blog_slide_category'),
  'posts_per_page' => get_theme_mod('lms_education_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $lms_education_arr_posts = new WP_Query( $lms_education_args );
    if ( $lms_education_arr_posts->have_posts() ) :
      while ( $lms_education_arr_posts->have_posts() ) :
        $lms_education_arr_posts->the_post();
        ?>
        <div class="blog_box">
          <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            endif;
          ?>
          <div class="blog_inner_box">
            <div class="content_inner_box">
              <?php if ( get_theme_mod('lms_education_title_unable_disable',true) ) : ?>
                <h3 class="post-title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
              <?php endif; ?>
              <hr>
              <?php if ( get_theme_mod('lms_education_text_unable_disable',true) ) : ?>
                <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('lms_education_slide_excerpt_number',20) ); ?></p>
              <?php endif; ?>
              <?php if ( get_theme_mod('lms_education_phone_detail_unable_disable',true) ) : ?>
                <div class="call-us mt-5">
                  <?php if ( get_theme_mod('lms_education_slider_phone_text') ) : ?>
                    <h4><?php echo esc_html( get_theme_mod('lms_education_slider_phone_text' ) ); ?></h4>
                  <?php endif; ?>
                  <?php if ( get_theme_mod('lms_education_phone_number') ) : ?>
                    <p><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('lms_education_phone_number' ) ); ?></p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>
