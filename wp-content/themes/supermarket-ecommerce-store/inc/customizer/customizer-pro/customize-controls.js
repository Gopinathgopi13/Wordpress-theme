( function( api ) {

	// Extends our custom "supermarket-ecommerce-store" section.
	api.sectionConstructor['supermarket-ecommerce-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );