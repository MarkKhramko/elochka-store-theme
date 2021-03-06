/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/api.service.js":
/*!***************************!*\
  !*** ./js/api.service.js ***!
  \***************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nvar API_PREFIX = \"\".concat(window.location.protocol, \"//\").concat(window.location.host, \"/wp-json/v1\");\n\nfunction _makePost(url, serialisedData, callback) {\n  $.ajax({\n    type: \"POST\",\n    data: serialisedData,\n    cache: false,\n    url: url,\n    success: function success(data) {\n      callback(data);\n    }\n  });\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  orders: {\n    post: function post(data, callback) {\n      return _makePost(\"\".concat(API_PREFIX, \"/orders\"), data, callback);\n    }\n  }\n});\n\n//# sourceURL=webpack:///./js/api.service.js?");

/***/ }),

/***/ "./js/catalog/filter.js":
/*!******************************!*\
  !*** ./js/catalog/filter.js ***!
  \******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _query_service__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../query.service */ \"./js/query.service.js\");\n\n\nfunction serializeFilterData() {\n  // Setup our serialized data\n  var serialized = []; // Handle category\n\n  var selectedCategory = null;\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    if (button.dataset.selected === 'false') return;\n    selectedCategory = {\n      name: button.dataset.name,\n      value: button.dataset.slug\n    };\n  });\n  if (!!selectedCategory) serialized.push(selectedCategory); // Handle attributes\n\n  var selectedTerms = [];\n  var selectedTermsIds = [];\n  var attributesInputs = document.querySelectorAll('input[name=\"attributes\"]');\n  attributesInputs.forEach(function (input) {\n    if (!input.checked) return;\n    var parentDiv = input.closest('[data-name=\"attributes-container\"]');\n    console.log({\n      parentDiv: parentDiv\n    });\n    var termTaxonomy = parentDiv.dataset.tax_key;\n    if (selectedTerms.indexOf(termTaxonomy) === -1) selectedTerms.push(termTaxonomy);\n    selectedTermsIds.push(input.value);\n  });\n\n  if (selectedTerms.length > 0) {\n    serialized.push({\n      name: 'term-names',\n      value: selectedTerms\n    });\n    serialized.push({\n      name: 'attributes',\n      value: selectedTermsIds\n    });\n  }\n\n  return serialized;\n}\n\nfunction _handleFilterFormSubmit() {\n  var form = $(\"#elochka-main-filter\"); // Get information from form\n\n  var formData = _query_service__WEBPACK_IMPORTED_MODULE_0__[\"default\"].serializeForm(form); // Get information from filter\n\n  var filterData = serializeFilterData(); // Merge data\n\n  var fullQuery = formData.concat(filterData); // Submit query\n\n  var url = _query_service__WEBPACK_IMPORTED_MODULE_0__[\"default\"].buildQuery(fullQuery);\n  window.location.href = \"/katalog/\".concat(url);\n  return false;\n}\n\nfunction _handleOrderByChange(event) {\n  // Submit form\n  _handleFilterFormSubmit(); // Stop click event\n\n\n  return false;\n}\n\nfunction _handleCategoryButtonClick(event) {\n  // Deselect all previous\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    button.dataset.selected = false;\n  }); // Set selected\n\n  event.target.dataset.selected = true; // Submit form\n\n  _handleFilterFormSubmit(); // Stop click event\n\n\n  return false;\n}\n\nfunction _handleAttributesChange(event) {\n  // Submit form\n  _handleFilterFormSubmit();\n}\n\nfunction _registerFormSubmit() {\n  var filterForm = document.getElementById(\"elochka-main-filter\");\n  filterForm.onsubmit = _handleFilterFormSubmit;\n}\n\nfunction _registerOrderBySubmit() {\n  var orderByInput = document.getElementById(\"filter-orderby\");\n  orderByInput.onchange = _handleOrderByChange;\n}\n\nfunction _registerFilterSubmit() {\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    button.onclick = _handleCategoryButtonClick;\n  });\n  var attributesInputs = document.querySelectorAll('input[name=\"attributes\"]');\n  attributesInputs.forEach(function (input) {\n    input.onchange = _handleAttributesChange;\n  });\n}\n\nfunction _initialize() {\n  // CatalogFilter buttons click\n  $('.filters__attr').click(function () {\n    $(this).toggleClass('filters__attr--active');\n    $(this).next().toggleClass('filters__list--active');\n  });\n  $('.filters__item input[type=\"checkbox\"]').click(function () {\n    if ($(this).prop('checked') === true) {\n      $(this).parent().parent().addClass('filters__item--active');\n    } else {\n      $(this).parent().parent().removeClass('filters__item--active');\n    }\n  });\n  $('.filters__category').click(function () {\n    $(this).toggleClass('filters__category--active');\n    $(this).next().toggleClass('filters__subcategory--active');\n  });\n\n  _registerFormSubmit();\n\n  _registerOrderBySubmit();\n\n  _registerFilterSubmit();\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  initialize: _initialize\n});\n\n//# sourceURL=webpack:///./js/catalog/filter.js?");

/***/ }),

/***/ "./js/encyclopedia/filter.js":
/*!***********************************!*\
  !*** ./js/encyclopedia/filter.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _initialize() {\n  // Put value of category in search input on click\n  $('.knowledge__list-item').on('click', function () {\n    var categoryId = $(this).data('category-id'); // Put value inside search field\n\n    $('#category').val(categoryId); // Empty search field\n\n    $('#search').val(''); // Get form\n\n    var form = $(\"#elochka-encyclopedia-filter\"); // Submit \n\n    form.submit();\n  });\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  initialize: _initialize\n});\n\n//# sourceURL=webpack:///./js/encyclopedia/filter.js?");

/***/ }),

/***/ "./js/index.js":
/*!*********************!*\
  !*** ./js/index.js ***!
  \*********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _orders_modal__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./orders.modal */ \"./js/orders.modal.js\");\n/* harmony import */ var _catalog_filter__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./catalog/filter */ \"./js/catalog/filter.js\");\n/* harmony import */ var _encyclopedia_filter__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./encyclopedia/filter */ \"./js/encyclopedia/filter.js\");\n\n\n\njQuery(document).ready(function ($) {\n  window.onload = function () {\n    // Init orders modal\n    _orders_modal__WEBPACK_IMPORTED_MODULE_0__[\"default\"].initialize();\n    var currentPath = window.location.pathname; // If it's catalog, register filter\n\n    if (currentPath.includes(\"/katalog\")) {\n      _catalog_filter__WEBPACK_IMPORTED_MODULE_1__[\"default\"].initialize();\n    } // If it's product page, add product message\n    else if (currentPath.includes(\"/product/\")) {\n        console.log(\"Inside product\");\n        _orders_modal__WEBPACK_IMPORTED_MODULE_0__[\"default\"].addProductMessage();\n      } // If it's encyclopedia, register Encyclopedia filter\n      else if (currentPath.includes(\"/encyclopedia\")) {\n          _encyclopedia_filter__WEBPACK_IMPORTED_MODULE_2__[\"default\"].initialize();\n        } // Slick-slider\n\n\n    $('.slider-intro__slider').slick({\n      asNavFor: '.slider-intro__data',\n      slidesToShow: 1,\n      slidesToScroll: 1,\n      dots: false,\n      infinite: false,\n      nextArrow: $('.slider-intro__arrow--right'),\n      prevArrow: $('.slider-intro__arrow--left')\n    });\n    $('.slider-intro__data').slick({\n      asNavFor: '.slider-intro__slider',\n      slidesToShow: 1,\n      slidesToScroll: 1,\n      arrows: false,\n      infinite: false,\n      draggable: false,\n      dots: false,\n      fade: true\n    });\n    $('.slider-intro__pagination-bullet[data-id]').click(function (e) {\n      e.preventDefault();\n      var krutiverti = $(this).data('id');\n      $('.slider-intro__slider').slick('slickGoTo', krutiverti);\n    });\n    $('.slider-intro__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {\n      $('.slider-intro__pagination-bullet').removeClass('slider-intro__pagination-bullet--is-active');\n      $(\".slider-intro__pagination-bullet[data-id='\".concat(nextSlide, \"']\")).addClass('slider-intro__pagination-bullet--is-active');\n    }); // Burger-menu\n\n    $('.header__mobile-btn').click(function () {\n      $(this).toggleClass('header__mobile-btn--active');\n      $('.navigation--mobile').toggleClass('navigation--active');\n      $('body').toggleClass('unscroll');\n    });\n  };\n});\n\n//# sourceURL=webpack:///./js/index.js?");

/***/ }),

/***/ "./js/orders.modal.js":
/*!****************************!*\
  !*** ./js/orders.modal.js ***!
  \****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _api_service__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./api.service */ \"./js/api.service.js\");\n\n\nfunction _initModal() {\n  // Show modal on button click\n  $('.button--brown').click(function () {\n    $('.modal').toggleClass('hidden');\n  }); // Close modal on background click\n\n  $(document).click(function (event) {\n    //if you click on anything except the modal itself or the \"open modal\" link, close the modal\n    if (!$(event.target).closest(\".modal__box, .button--brown\").length) {\n      $(\"body\").find(\".modal\").addClass(\"hidden\");\n    }\n  }); // Send order info on button click\n\n  $('.modal__button-send').click(function () {\n    console.log(\"Send\"); // Validate inputs\n\n    var phoneValue = $('#modal-input-number').val();\n\n    if (phoneValue === '' || !phoneValue) {\n      $('#modal-input-number').addClass('error');\n      return false;\n    } else {\n      $('#modal-input-number').removeClass('error');\n    }\n\n    var data = $('#modal-form').serialize();\n    _api_service__WEBPACK_IMPORTED_MODULE_0__[\"default\"].orders.post(data, function (res) {\n      $(document).ajaxSend(function () {\n        $('.modal__button-send').addClass('button--loading');\n      });\n\n      if (res.error !== null) {\n        console.error(\"Modal Order send error: \", error.description);\n        return;\n      }\n\n      $('.modal__button-send').click(function () {\n        $.ajax({\n          type: 'GET',\n          success: function success(data) {\n            console.log(data);\n          }\n        }).done(function () {\n          $('.modal').toggleClass('hidden');\n          $('.modal__button-send').removeClass('button--loading');\n        });\n      }); // Order success\n      // $('.modal').toggleClass('hidden');\n    });\n  }); // Mask number input\n\n  $('.number').mask('+7 (000)000-00-00');\n}\n\nfunction _addProductMessage() {\n  // Get product Id\n  var productFullId = $('.product.type-product').attr('id');\n  var productId = productFullId.split('product-')[1]; // Set product Id to hidden input\n\n  $('#product-id').val(productId); // Get product title\n\n  var title = $('.title').text().trim(); // Set prodcut title to message input\n\n  $('#modal-input-message').val(\"\\u0417\\u0434\\u0440\\u0430\\u0432\\u0441\\u0442\\u0432\\u0443\\u0439\\u0442\\u0435!\\n\\n\\u041C\\u0435\\u043D\\u044F \\u0437\\u0430\\u0438\\u043D\\u0442\\u0435\\u0440\\u0435\\u0441\\u043E\\u0432\\u0430\\u043B \\\"\".concat(title, \"\\\".\"));\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  initialize: _initModal,\n  addProductMessage: _addProductMessage\n});\n\n//# sourceURL=webpack:///./js/orders.modal.js?");

/***/ }),

/***/ "./js/query.service.js":
/*!*****************************!*\
  !*** ./js/query.service.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _buildQuery(formData) {\n  // Setup our serialized data\n  var serialized = [];\n\n  for (var i = 0; i < formData.length; i++) {\n    var fieldData = formData[i];\n    serialized.push(encodeURIComponent(fieldData.name) + \"=\" + encodeURIComponent(fieldData.value));\n  }\n\n  return \"?\" + serialized.join('&');\n}\n\nfunction _serializeForm(form) {\n  // Setup our serialized data\n  var serialized = []; // Loop through each field in the form\n\n  for (var i = 0; i < form.elements.length; i++) {\n    var field = form.elements[i]; // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields\n\n    if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;\n    serialized.push({\n      name: field.name,\n      value: field.value\n    });\n  }\n\n  return serialized;\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  buildQuery: _buildQuery,\n  serializeForm: _serializeForm\n});\n\n//# sourceURL=webpack:///./js/query.service.js?");

/***/ }),

/***/ 1:
/*!***************************!*\
  !*** multi ./js/index.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! C:\\OSPanel\\domains\\elochka-store-theme\\wp-content\\themes\\elochka-store-theme\\src\\js\\index.js */\"./js/index.js\");\n\n\n//# sourceURL=webpack:///multi_./js/index.js?");

/***/ })

/******/ });