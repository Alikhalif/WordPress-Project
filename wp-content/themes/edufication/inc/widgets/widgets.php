<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Edufication
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';
/*
 * Add contact info widget
 */
require get_template_directory() . '/inc/widgets/contact-info-widget.php';


/**
 * Register widgets
 */
function edufication_register_widgets() {

	register_widget( 'Edufication_Latest_Post' );

	register_widget( 'Edufication_Contact_Info' );

	register_widget( 'Edufication_Social_Link' );

}
add_action( 'widgets_init', 'edufication_register_widgets' );