function _initialize() {
	// Put value of category in search input on click
	$('.knowledge__list-item').on('click', function () {
		const newSearchTerm = $(this).text().trim();

		// Put value inside search field
		$('#search').val(newSearchTerm);

		// Get form
		const form = $("#elochka-encyclopedia-filter");
		// Submit 
		form.submit();
	});
}

export default {
	initialize: _initialize
};