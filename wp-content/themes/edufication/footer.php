<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

/**
 * edufication_footer_primary_content hook
 *
 * @hooked edufication_add_contact_section -  10
 *
 */
do_action( 'edufication_footer_primary_content' );

/**
 * edufication_content_end_action hook
 *
 * @hooked edufication_content_end -  10
 *
 */
do_action( 'edufication_content_end_action' );

/**
 * edufication_content_end_action hook
 *
 * @hooked edufication_footer_start -  10
 * @hooked Edufication_Footer_Widgets->add_footer_widgets -  20
 * @hooked edufication_footer_site_info -  40
 * @hooked edufication_footer_end -  100
 *
 */
do_action( 'edufication_footer' );

/**
 * edufication_page_end_action hook
 *
 * @hooked edufication_page_end -  10
 *
 */
do_action( 'edufication_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
