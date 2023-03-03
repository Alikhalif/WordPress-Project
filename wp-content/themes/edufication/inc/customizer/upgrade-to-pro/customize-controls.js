( function( api ) {

	// Extends our custom "edufication" section.
	api.sectionConstructor['edufication'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
