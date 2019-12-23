import API from './api.service';
 

window.onload = function(){
	console.log("JS Starts!");

	const currentPath = window.location.pathname;

	// If we're in a catalog
	if (currentPath.includes("/katalog")){

		// Fetch products
		API.products.get()
		.then(function(response) {
			// handle success
			console.log({response});
			const data = response.data;
			console.log({ data });
		})
		.catch(function (error) {
			// handle error
			console.error("Axios get error:", error);
		});

		// Fetch attributes
		API.attributes.get()
		.then(function(response) {
			// handle success
			console.log({response});
			const data = response.data;
			console.log({ data });
		})
		.catch(function (error) {
			// handle error
			console.error("Axios get error:", error);
		});
	}
};