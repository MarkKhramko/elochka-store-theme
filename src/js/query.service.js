function _buildQuery(formData){
	// Setup our serialized data
	const serialized = [];

	for(let i=0; i < formData.length; i++){
		const fieldData = formData[i];
		serialized.push(encodeURIComponent(fieldData.name) + "=" + encodeURIComponent(fieldData.value));
	}

	return "?" + (serialized.join('&'));
}

function _serializeForm(form){
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

export default {
	buildQuery: _buildQuery,
	serializeForm: _serializeForm
}