function _initialize() {
	// Put value of category in search input on click
	$('.knowledge__list-item').on('click', function () {
		const categoryId = $(this).data('category-id');

		// Put value inside search field
		$('#category').val(categoryId);
		// Empty search field
		$('#search').val('');

		// Get form
		const form = $("#elochka-encyclopedia-filter");
		// Submit 
		form.submit();
	});
}

export default {
	initialize: _initialize
};