( function( api ) {

	// Extends our custom "ocius" section.
	api.sectionConstructor['ocius'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
