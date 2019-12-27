
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

	const categoryButtons = document.querySelectorAll('[data-name="category"]');

	console.log("serializeFilterData", categoryButtons);

	categoryButtons.forEach((button)=>{

		if (!button.dataset.selected)
			return;

		serialized.push({
			name: button.dataset.name,
			value: button.dataset.slug
		});
	});
	
	return serialized;
}

function _handleFilterFormSubmit(){
	console.log("_handleCategoryButtonClick");

	const form = document.getElementById("elochka-main-filter");
	// Get information from form
	const formData = serializeForm(form);
	// Get information from filter
	const filterData = serializeFilterData();
	// Merge data
	const fullQuery = formData.concat(filterData);

	// Submit query
	const url = buildQuery(fullQuery);
	window.location.href = url;
	return false;
}

function _handleOrderByChange(event){
	// Submit form
	_handleFilterFormSubmit();

	// Stop click event
	return false;
}

function _handleCategoryButtonClick(event){
	// Set selected
	event.target.dataset.selected = true;
	// Submit form
	_handleFilterFormSubmit();

	// Stop click event
	return false;
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
}

window.onload = function(){
	console.log("JS Starts!");

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