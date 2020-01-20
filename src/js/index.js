import OrdersModal from './orders.modal';
import CatalogFilter from './catalog/filter';
import EncyclopediaFilter from './encyclopedia/filter';

window.onload = function () {
	// Init orders modal
	OrdersModal.initialize();

	const currentPath = window.location.pathname;
	// If it's catalog, register filter
	if (currentPath.includes("/katalog")){
		CatalogFilter.initialize();
	}
	// If it's product page, add product message
	else if (currentPath.includes("/product/")){
		console.log("Inside product");
		OrdersModal.addProductMessage();
	}
	// If it's encyclopedia, register Encyclopedia filter
	else if (currentPath.includes("/encyclopedia")){
		EncyclopediaFilter.initialize();
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

	// Burger-menu
	$('.header__mobile-btn').click(function () {
		$(this).toggleClass('header__mobile-btn--active');
		$('.navigation--mobile').toggleClass('navigation--active');
		$('body').toggleClass('unscroll')
	});
};
