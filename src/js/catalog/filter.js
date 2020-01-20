import QueryService from '../query.service';

function serializeFilterData(){
	// Setup our serialized data
	const serialized = [];

	// Handle category
	let selectedCategory = null;
	const categoryButtons = document.querySelectorAll('[data-name="category"]');
	categoryButtons.forEach((button)=>{

		if (button.dataset.selected === 'false')
			return;

		selectedCategory = {
			name: button.dataset.name,
			value: button.dataset.slug
		};
	});
	if (!!selectedCategory)
		serialized.push(selectedCategory);

	// Handle attributes
	const selectedTerms = [];
	const selectedTermsIds = [];
	const attributesInputs = document.querySelectorAll('input[name="attributes"]');
	attributesInputs.forEach((input)=>{
		if (!input.checked)
			return;

		const parentDiv = input.closest('[data-name="attributes-container"]');
		console.log({ parentDiv });
		const termTaxonomy = parentDiv.dataset.tax_key;
		if (selectedTerms.indexOf(termTaxonomy) === -1)
			selectedTerms.push(termTaxonomy);

		selectedTermsIds.push(input.value);
	});

	if (selectedTerms.length > 0){
		serialized.push({
			name: 'term-names',
			value: selectedTerms
		});

		serialized.push({
			name: 'attributes',
			value: selectedTermsIds
		});
	}
	
	return serialized;
}

function _handleFilterFormSubmit(){
	const form = $("#elochka-main-filter");
	// Get information from form
	const formData = QueryService.serializeForm(form);
	// Get information from filter
	const filterData = serializeFilterData();
	// Merge data
	const fullQuery = formData.concat(filterData);

	// Submit query
	const url = QueryService.buildQuery(fullQuery);
	window.location.href = `/katalog/${url}`;
	return false;
}

function _handleOrderByChange(event){
	// Submit form
	_handleFilterFormSubmit();

	// Stop click event
	return false;
}

function _handleCategoryButtonClick(event){
	// Deselect all previous
	const categoryButtons = document.querySelectorAll('[data-name="category"]');
	categoryButtons.forEach((button)=>{
		button.dataset.selected = false;
	});

	// Set selected
	event.target.dataset.selected = true;
	// Submit form
	_handleFilterFormSubmit();

	// Stop click event
	return false;
}

function _handleAttributesChange(event){
	// Submit form
	_handleFilterFormSubmit();
}

function _registerFormSubmit(){
	const filterForm = document.getElementById("elochka-main-filter");
	filterForm.onsubmit = _handleFilterFormSubmit;
}

function _registerOrderBySubmit(){
	const orderByInput = document.getElementById("filter-orderby");
	orderByInput.onchange = _handleOrderByChange;
}

function _registerFilterSubmit(){
	const categoryButtons = document.querySelectorAll('[data-name="category"]');
	categoryButtons.forEach((button)=>{
		button.onclick = _handleCategoryButtonClick;
	});

	const attributesInputs = document.querySelectorAll('input[name="attributes"]');
	attributesInputs.forEach((input)=>{
		input.onchange = _handleAttributesChange;
	});
}

function _initialize() {
	// CatalogFilter buttons click
	$('.filters__attr').click(function () {
		$(this).toggleClass('filters__attr--active');
		$(this).next().toggleClass('filters__list--active');
	});

	$('.filters__item input[type="checkbox"]').click(function () {
		if ($(this).prop('checked') === true) {
			$(this).parent().parent().addClass('filters__item--active')
		} else {
			$(this).parent().parent().removeClass('filters__item--active')
		}
	});

	$('.filters__category').click(function () {
		$(this).toggleClass('filters__category--active')
		$(this).next().toggleClass('filters__subcategory--active');
	});

	_registerFormSubmit();
	_registerOrderBySubmit();
	_registerFilterSubmit();
}

export default {
	initialize: _initialize
};