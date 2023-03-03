<?php

add_action( 'admin_menu', 'lms_education_getting_started' );
function lms_education_getting_started() {
	add_theme_page( esc_html__('Get Started', 'lms-education'), esc_html__('Get Started', 'lms-education'), 'edit_theme_options', 'lms-education-guide-page', 'lms_education_test_guide');
}

function lms_education_admin_enqueue_scripts() {
	wp_enqueue_style( 'lms-education-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'lms_education_admin_enqueue_scripts' );

if ( ! defined( 'LMS_EDUCATION_DOCS_FREE' ) ) {
define('LMS_EDUCATION_DOCS_FREE',__('https://www.misbahwp.com/docs/lms-education-free-docs/','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_DOCS_PRO' ) ) {
define('LMS_EDUCATION_DOCS_PRO',__('https://www.misbahwp.com/docs/lms-education-pro-docs','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_BUY_NOW' ) ) {
define('LMS_EDUCATION_BUY_NOW',__('https://www.misbahwp.com/themes/education-wordpress-theme/','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_SUPPORT_FREE' ) ) {
define('LMS_EDUCATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/lms-education','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_REVIEW_FREE' ) ) {
define('LMS_EDUCATION_REVIEW_FREE',__('https://wordpress.org/support/theme/lms-education/reviews/#new-post','lms-education'));
}
if ( ! defined( 'LMS_EDUCATION_DEMO_PRO' ) ) {
define('LMS_EDUCATION_DEMO_PRO',__('https://www.misbahwp.com/demo/lms-education/','lms-education'));
}

function lms_education_test_guide() { ?>
	<?php $lms_education_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( LMS_EDUCATION_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'lms-education' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'lms-education' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( LMS_EDUCATION_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'lms-education' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'lms-education' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','lms-education'); ?><?php echo esc_html( $lms_education_theme ); ?>  <span><?php esc_html_e('Version: ', 'lms-education'); ?><?php echo esc_html($lms_education_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $lms_education_theme->get_screenshot() ); ?>" />
				<div id="description-inside">
					<?php
						$lms_education_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $lms_education_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','lms-education'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','lms-education'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','lms-education'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','lms-education'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'lms-education' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','lms-education'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'lms-education' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( LMS_EDUCATION_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'lms-education' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( LMS_EDUCATION_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'lms-education' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
