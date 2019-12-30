
function buildQuery(formData){
	// Setup our serialized data
	const serialized = [];

	for(let i=0; i < formData.length; i++){
		const fieldData = formData[i];
		serialized.push(encodeURIComponent(fieldData.name) + "=" + encodeURIComponent(fieldData.value));
	}

	return "?" + (serialized.join('&'));
}

function serializeForm(form){
	// Setup our serialized data
	const serialized = [];

	// Loop through each field in the form
	for (let i = 0; i < form.elements.length; i++) {
		const field = form.elements[i];

		// Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
		if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') 
			continue;

		serialized.push({
			name: field.name,
			value: field.value
		});
	}

	return serialized;
}

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
	const form = document.getElementById("elochka-main-filter");
	// Get information from form
	const formData = serializeForm(form);
	// Get information from filter
	const filterData = serializeFilterData();
	// Merge data
	const fullQuery = formData.concat(filterData);

	// Submit query
	const url = buildQuery(fullQuery);
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

function registerFormSubmit(){
	const filterForm = document.getElementById("elochka-main-filter");
	filterForm.onsubmit = _handleFilterFormSubmit;
}

function registerOrderBySubmit(){
	const orderByInput = document.getElementById("filter-orderby");
	orderByInput.onchange = _handleOrderByChange;
}

function registerFilterSubmit(){
	const categoryButtons = document.querySelectorAll('[data-name="category"]');
	categoryButtons.forEach((button)=>{
		button.onclick = _handleCategoryButtonClick;
	});

	const attributesInputs = document.querySelectorAll('input[name="attributes"]');
	attributesInputs.forEach((input)=>{
		input.onchange = _handleAttributesChange;
	});
}

window.onload = function(){
	const currentPath = window.location.pathname;

	// If it's catalog
	if (currentPath.includes("/katalog")){
		registerFormSubmit();
		registerOrderBySubmit();
		registerFilterSubmit();

		// // Fetch products
		// API.products.get()
		// .then(function(response) {
		// 	// handle success
		// 	console.log({response});
		// 	const data = response.data;
		// 	console.log({ data });
		// })
		// .catch(function (error) {
		// 	// handle error
		// 	console.error("Axios get error:", error);
		// });

		// // Fetch attributes
		// API.attributes.get()
		// .then(function(response) {
		// 	// handle success
		// 	console.log({response});
		// 	const data = response.data;
		// 	console.log({ data });
		// })
		// .catch(function (error) {
		// 	// handle error
		// 	console.error("Axios get error:", error);
		// });
	}
};