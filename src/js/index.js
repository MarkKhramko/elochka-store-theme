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

	//slick-slider


	/*$('.slider-intro__slider').slick();*/

	//Filter buttons click
	$('.filters__attr').click(function () {
		$(this).toggleClass('filters__attr--active');
		$(this).next().toggleClass('filters__list--active');
	})

	$('.filters__item input[type="checkbox"]').click(function () {
		if($(this).prop('checked') === true) {
			$(this).parent().parent().addClass('filters__item--active')
 		} else {
			$(this).parent().parent().removeClass('filters__item--active')
		}
	})

	$('.filters__category').click(function () {
		$(this).toggleClass('filters__category--active')
		$(this).next().toggleClass('filters__subcategory--active');
	})

	//Burger-menu
	$('.header__mobile-btn').click(function () {
		$(this).toggleClass('header__mobile-btn--active');
		$('.navigation--mobile').toggleClass('navigation--active');
		$('body').toggleClass('unscroll')
	})
};


