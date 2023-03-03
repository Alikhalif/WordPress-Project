<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('lms-education-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area">';
          dynamic_sidebar('lms-education-footer-sidebar');
        echo '</div>';
      }
    ?>

    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center">
          <?php
            if (!get_theme_mod('lms_education_footer_text') ) { ?>
              <a href="<?php echo esc_url('https://www.misbahwp.com/themes/free-education-wordpress-theme/'); ?>" target="_blank">
              <?php esc_html_e('Education WordPress Theme ','lms-education'); ?></a>
            <?php } else {
              echo esc_html(get_theme_mod('lms_education_footer_text'));
            }
          ?>
            <?php
            /* translators: %s: Misbah WP */
            printf( esc_html__( 'by %s', 'lms-education' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'lms-education' ), 'WordPress' ); ?></a>
        </p>
      </div>
    </div>
    <?php if ( get_theme_mod('lms_education_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
          <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
