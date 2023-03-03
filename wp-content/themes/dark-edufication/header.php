<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage dark_edufication
	 * @since dark_edufication 1.0.0
	 */

	/**
	 * edufication_doctype hook
	 *
	 * @hooked edufication_doctype -  10
	 *
	 */
	do_action( 'edufication_doctype' );

?>
<head>
<?php
	/**
	 * edufication_before_wp_head hook
	 *
	 * @hooked edufication_head -  10
	 *
	 */
	do_action( 'edufication_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * edufication_page_start_action hook
	 *
	 * @hooked edufication_page_start -  10
	 *
	 */
	do_action( 'edufication_page_start_action' ); 

	/**
	 * edufication_loader_action hook
	 *
	 * @hooked edufication_loader -  10
	 *
	 */
	do_action( 'edufication_before_header' );

	/**
	 * edufication_header_action hook
	 *
	 * @hooked edufication_header_start -  10
	 * @hooked edufication_site_branding -  20
	 * @hooked edufication_site_navigation -  30
	 * @hooked edufication_header_end -  50
	 *
	 */
	do_action( 'edufication_header_action' );

	/**
	 * edufication_content_start_action hook
	 *
	 * @hooked edufication_content_start -  10
	 *
	 */
	do_action( 'edufication_content_start_action' );

	/**
	 * edufication_header_image_action hook
	 *
	 * @hooked edufication_header_image -  10
	 *
	 */
	do_action( 'edufication_header_image_action' );
	
	if ( edufication_is_frontpage() ) {
    	$options = edufication_get_theme_options();

		$sorted = array( 'banner', 'service', 'about', 'course', 'cta', 'event', 'testimonial', 'subscribe', 'team', 'counter', 'blog' );
	
		foreach ( $sorted as $section ) {
			if ( $section == 'service' || $section == 'team' || $section == 'testimonial' || $section == 'counter' || $section == 'subscribe' ) {
				add_action( 'dark_edufication_primary_content', 'dark_edufication_add_'. $section .'_section' );
			}else{
				add_action( 'dark_edufication_primary_content', 'edufication_add_'. $section .'_section' );
			}	
		}

		do_action( 'dark_edufication_primary_content' );
	}