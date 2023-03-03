<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function lms_education_google_fonts() {

  require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

    wp_enqueue_style( 'lms-education-google-fonts-ubuntu', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'lms_education_google_fonts' );


if (!function_exists('lms_education_enqueue_scripts')) {

	function lms_education_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

    	wp_enqueue_style(
			'dashicons',
			get_template_directory_uri(),
			array(),'2.3.4');

		wp_enqueue_style('lms-education-style', get_stylesheet_uri(), array() );

		wp_style_add_data('lms-education-style', 'rtl', 'replace');

		wp_enqueue_style(
			'lms-education-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'lms-education-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'lms-education-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'lms-education-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$lms_education_css = '';

		if ( get_header_image() ) :

			$lms_education_css .=  '
				header.header {
					background-image: url('.esc_url(get_header_image()).') !important;
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'lms-education-style', $lms_education_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'lms-education-style',$lms_education_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'lms_education_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_after_setup_theme')) {

	function lms_education_after_setup_theme() {

		if ( ! isset( $lms_education_content_width ) ) $lms_education_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'lms-education' ),
		));

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
			'height' => 100,
  		'flex-width' => true,
  		'flex-height' => true,
      'header-text' => false,
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

	add_action( 'after_setup_theme', 'lms_education_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

if ( ! defined( 'LMS_EDUCATION_PREMIUM_THEME_LINK' ) ) {
    define( 'LMS_EDUCATION_PREMIUM_THEME_LINK', 'https://www.misbahwp.com/themes/education-wordpress-theme/' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function lms_education_logo_resizer() {

    $lms_education_theme_logo_size_css = '';
    $lms_education_logo_resizer = get_theme_mod('lms_education_logo_resizer');

	$lms_education_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($lms_education_logo_resizer).'px !important;
			width: '.esc_attr($lms_education_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'lms-education-style',$lms_education_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'lms_education_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function lms_education_global_color() {

    $theme_color_css = '';
    $lms_education_global_color = get_theme_mod('lms_education_global_color');
    $lms_education_global_color_2 = get_theme_mod('lms_education_global_color_2');

	$theme_color_css = '
		.register-top, #main-menu ul.children li a:hover, #main-menu ul.sub-menu li a:hover,#checkout-payment #checkout-order-action button,.learnpress-page .lp-button, .learnpress-page #lp-button,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.lms-education-pagination span.current,.lms-education-pagination span.current:hover,.lms-education-pagination span.current:focus,.lms-education-pagination a span:hover,.lms-education-pagination a span:focus,.comment-respond input#submit,.comment-reply a,.sidebar-area .tagcloud a:hover,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.menu-toggle,.dropdown-toggle,button.close-menu,nav.woocommerce-MyAccount-navigation,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.scroll-up a,.sidebar-area h4.title, aside h2,nav.woocommerce-MyAccount-navigation ul li {
			background: '.esc_attr($lms_education_global_color).';
		}
		#learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button.button-enroll-course,ul.learn-press-nav-tabs .course-nav.active::before{
			background: '.esc_attr($lms_education_global_color).'!important;
		}
		a:hover,a:focus,.social-links a:hover,.top-header p,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,.call-us h4,.call-us i,.courses-info strong,.courses-box-content h3 a {
			color: '.esc_attr($lms_education_global_color).';
		}
		#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,.lp-archive-courses .course-summary .course-summary-content .course-detail-info .course-info-left .course-meta .course-meta__pull-left .meta-item::before,#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label,#learn-press-course-tabs input[name=learn-press-course-tab-radio]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,.lp-archive-courses .course-summary .course-summary-content .lp-entry-content.lp-content-area .course-summary-sidebar .course-summary-sidebar__inner>div ul li a:hover {
			color: '.esc_attr($lms_education_global_color).'!important;
		}
		.content_inner_box hr,.call-us i,.slider .owl-carousel button.owl-dot.active,#courses hr,#checkout-payment #checkout-order-action button,.learnpress-page .lp-button,.learnpress-page #lp-button{
			border-color: '.esc_attr($lms_education_global_color).';
		}
		#learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button.button-enroll-course{
			border-color: '.esc_attr($lms_education_global_color).'!important;
		}
		.header,footer,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.scroll-up a:hover,.woocommerce .cart .button:hover, .woocommerce .cart input.button:hover,.woocommerce a.button.alt:hover,.woocommerce a.button:hover,.woocommerce button.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce button.button:hover,.courses-box-content {
			background: '.esc_attr($lms_education_global_color_2).';
		}
		.lp-archive-courses .course-summary .course-summary-content .course-detail-info {
			background: '.esc_attr($lms_education_global_color_2).'!important;
		}
		a,h1,h2,h3,h4,h5,h6,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,.call-us p,.blog_inner_box h3.post-title a,aside h2 {
			color: '.esc_attr($lms_education_global_color_2).';
		}
		.lp-archive-courses .course-summary .course-summary-content .lp-entry-content.lp-content-area .course-summary-sidebar .course-summary-sidebar__inner>div ul li a{
			color: '.esc_attr($lms_education_global_color_2).'!important;
		}
	';
    wp_add_inline_style( 'lms-education-style',$theme_color_css );
    wp_add_inline_style( 'lms-education-woocommerce-css',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'lms_education_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function lms_education_comment($comment, $lms_education_args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'lms-education');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'lms-education'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($lms_education_args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $lms_education_args['avatar_size']) echo get_avatar($comment, $lms_education_args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translatorscontent_width: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'lms-education'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'lms-education' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'lms-education'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $lms_education_args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $lms_education_args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for lms_education_comment()

if (!function_exists('lms_education_widgets_init')) {

	function lms_education_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','lms-education'),
			'id'   => 'lms-education-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'lms-education'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','lms-education'),
			'id'   => 'lms-education-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'lms-education'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'lms_education_widgets_init' );

}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'lms_education_woocommerce_header_add_to_cart_fragment' );

function lms_education_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','lms-education' ); ?>"><i class="fas fa-shopping-cart"></i><p class="cart-item-box"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></p></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

function lms_education_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'lms_education_loop_columns', 999);
if (!function_exists('lms_education_loop_columns')) {
	function lms_education_loop_columns() {
		return 3; // 3 products per row
	}
}

function lms_education_get_categories_select() {
	$teh_cats = get_categories();
	$results;
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

//redirect
function lms_education_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=lms-education-guide-page") );
   	}
}
add_action('after_setup_theme', 'lms_education_notice');

?>