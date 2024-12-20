( function( api ) {

	// Extends our custom "electronic-gadget-store" section.
	api.sectionConstructor['electronic-gadget-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );