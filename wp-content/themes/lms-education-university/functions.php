<?php

if ( ! defined( 'LMS_EDUCATION_PREMIUM_THEME_LINK' ) ) {
    define( 'LMS_EDUCATION_PREMIUM_THEME_LINK', 'https://www.misbahwp.com/themes/education-university-wordpress-theme/' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_university_enqueue_scripts')) {

	function lms_education_university_enqueue_scripts() {

	    $lms_education_university_my_theme = wp_get_theme();
	    $version = $lms_education_university_my_theme['Version'];

	    wp_enqueue_style(
			'bootstrap-css',
			esc_url( get_template_directory_uri() ) . '/css/bootstrap.css',
			array(),'4.5.0'
		);

	    wp_enqueue_style( 'lms-education-style', get_template_directory_uri() . '/style.css' );

	    wp_enqueue_style( 'lms-education-university-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-woocommerce-css'), $version );

	    wp_enqueue_style( 'lms-education-university-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-style'), $version );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}

	add_action( 'wp_enqueue_scripts', 'lms_education_university_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_university_after_setup_theme')) {

	function lms_education_university_after_setup_theme() {

		if ( ! isset( $lms_education_university_content_width ) ) $lms_education_university_content_width = 900;

		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( "responsive-embeds" );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'lms_education_university_after_setup_theme', 999 );

}

if (!function_exists('lms_education_university_widgets_init')) {

	function lms_education_university_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','lms-education-university'),
			'id'   => 'lms-education-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'lms-education-university'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','lms-education-university'),
			'id'   => 'lms-education-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'lms-education-university'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'lms_education_university_widgets_init' );

}

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function lms_education_university_global_color() {

    $lms_education_university_theme_color_css = '';
    $lms_education_global_color = get_theme_mod('lms_education_global_color');
    $lms_education_global_color_2 = get_theme_mod('lms_education_global_color_2');

	$lms_education_university_theme_color_css = '
		.register-top, #main-menu ul.children li a:hover, #main-menu ul.sub-menu li a:hover,#checkout-payment #checkout-order-action button,.learnpress-page .lp-button, .learnpress-page #lp-button,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.lms-education-pagination span.current,.lms-education-pagination span.current:hover,.lms-education-pagination span.current:focus,.lms-education-pagination a span:hover,.lms-education-pagination a span:focus,.comment-respond input#submit,.comment-reply a,.sidebar-area .tagcloud a:hover,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.menu-toggle,.dropdown-toggle,button.close-menu,nav.woocommerce-MyAccount-navigation,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.slider-btn a,.owl-nav i:hover,.scroll-up a {
			background: '.esc_attr($lms_education_global_color).';
		}
		a:hover,a:focus,.social-links a:hover,.top-header p,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,.call-us h4,.call-us i,.courses-info strong,.courses-box-content h3 a,.slider h3.post-title a,span.rss-date,.textwidget strong {
			color: '.esc_attr($lms_education_global_color).';
		}
		.content_inner_box hr,.call-us i,.slider .owl-carousel button.owl-dot.active,#courses hr,#checkout-payment #checkout-order-action button,.learnpress-page .lp-button,.learnpress-page #lp-button, .sidebar-area h4.title{
			border-color: '.esc_attr($lms_education_global_color).';
		}
		.searchform input[type=submit]:hover, .searchform input[type=submit]:focus,.header, footer,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.comment-reply a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.slider-btn a:hover,.scroll-up a:hover,.comment-respond input#submit:hover,.woocommerce a.added_to_cart:hover {
			background: '.esc_attr($lms_education_global_color_2).';
		}
		.lp-archive-courses .course-summary .course-summary-content .course-detail-info {
			background: '.esc_attr($lms_education_global_color_2).'!important;
		}
		a,h1, h2, h3, h4, h5, h6,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.blog_inner_box h3.post-title a,span.rss-date:hover {
			color: '.esc_attr($lms_education_global_color_2).';
		}
	';
    wp_add_inline_style( 'lms-education-university-style',$lms_education_university_theme_color_css );
    wp_add_inline_style( 'lms-education-university-woocommerce-css',$lms_education_university_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'lms_education_university_global_color' );

function lms_education_university_remove_custom($wp_customize) {
  $wp_customize->remove_setting('lms_education_slider_phone_heading');
  $wp_customize->remove_setting('lms_education_slider_phone_text');
 	$wp_customize->remove_setting('lms_education_phone_detail_unable_disable');
  $wp_customize->remove_setting('lms_education_slider_content_alignment');
	$wp_customize->remove_section('lms_education_section_post');
}
add_action( 'customize_register', 'lms_education_university_remove_custom', 1000 );

if ( ! defined( 'LMS_EDUCATION_DOCS_FREE' ) ) {
define('LMS_EDUCATION_DOCS_FREE',__('https://www.misbahwp.com/docs/lms-education-university-free-docs/','lms-education-university'));
}
if ( ! defined( 'LMS_EDUCATION_DOCS_PRO' ) ) {
define('LMS_EDUCATION_DOCS_PRO',__('https://www.misbahwp.com/docs/lms-education-university-pro-docs','lms-education-university'));
}
if ( ! defined( 'LMS_EDUCATION_BUY_NOW' ) ) {
define('LMS_EDUCATION_BUY_NOW',__('https://www.misbahwp.com/themes/education-university-wordpress-theme/','lms-education-university'));
}
if ( ! defined( 'LMS_EDUCATION_SUPPORT_FREE' ) ) {
define('LMS_EDUCATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/lms-education-university','lms-education-university'));
}
if ( ! defined( 'LMS_EDUCATION_REVIEW_FREE' ) ) {
define('LMS_EDUCATION_REVIEW_FREE',__('https://wordpress.org/support/theme/lms-education-university/reviews/#new-post','lms-education-university'));
}
if ( ! defined( 'LMS_EDUCATION_DEMO_PRO' ) ) {
define('LMS_EDUCATION_DEMO_PRO',__('https://www.misbahwp.com/demo/lms-education-university/','lms-education-university'));
}
