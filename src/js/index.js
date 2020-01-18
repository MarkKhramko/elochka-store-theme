import OrdersModal from './orders.modal';
import Filter from './filter';

window.onload = function () {
	console.log("JS Starts!");

	// Init orders modal
	OrdersModal.initialize();

	const currentPath = window.location.pathname;
	// If it's catalog, register filter
	if (currentPath.includes("/katalog")){
		Filter.registerFormSubmit();
		Filter.registerOrderBySubmit();
		Filter.registerFilterSubmit();
	}
	// If it's product page, add product message
	if (currentPath.includes("/product/")){
		console.log("Inside product");
		OrdersModal.addProductMessage();
	}

	// Slick-slider
	$('.slider-intro__slider').slick({
		asNavFor: '.slider-intro__data',
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		infinite: false,
		nextArrow: $('.slider-intro__arrow--right'),
		prevArrow: $('.slider-intro__arrow--left')
	});

	$('.slider-intro__data').slick({
		asNavFor: '.slider-intro__slider',
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		infinite: false,
		draggable: false,
		dots: false,
		fade: true,
	});

	$('.slider-intro__pagination-bullet[data-id]').click(function (e) {
		e.preventDefault();
		const krutiverti = $(this).data('id');
		$('.slider-intro__slider').slick('slickGoTo', krutiverti);

	});

	$('.slider-intro__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		$('.slider-intro__pagination-bullet').removeClass('slider-intro__pagination-bullet--is-active');
		$(`.slider-intro__pagination-bullet[data-id='${nextSlide}']`).addClass('slider-intro__pagination-bullet--is-active');
	});


	// Filter buttons click
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

	// Burger-menu
	$('.header__mobile-btn').click(function () {
		$(this).toggleClass('header__mobile-btn--active');
		$('.navigation--mobile').toggleClass('navigation--active');
		$('body').toggleClass('unscroll')
	});

	// Search knowledge page
	const listOfNames = $('.knowledge__item-name');
	let filterArr = [];

	listOfNames.each(function() {
		filterArr.push(this.innerHTML)
	});


	let filteredArr = filterArr.map(function (name) {
		console.log(name);
		return '<li class="knowledge__list-item">' + name + '</li>';
	}).join('');


	$('.knowledge__filter').append(filteredArr);

	// Input Filter
	$('.knowledge__list-item').on('click', function () {
		let input = $('.search');
		input.val(this.innerHTML);
	});


	function filter() {
		let inputVal =  $('input .search').val();
	}
};
