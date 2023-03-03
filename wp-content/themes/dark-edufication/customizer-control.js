/**
 * Scripts within the customizer controls window.
 *
 */

jQuery( document ).ready(function($) {

    // icon picker
    $('.dark-edufication-icon-picker').each( function() {
        $(this).iconpicker( '#' + this.id );
    } );

});

