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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
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

/***/ "./js/orders.modal.js":
/*!****************************!*\
  !*** ./js/orders.modal.js ***!
  \****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _api_service__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./api.service */ \"./js/api.service.js\");\n\n\nfunction _initModal() {\n  // Show modal on button click\n  $('.button--brown').click(function () {\n    $('.modal').toggleClass('hidden');\n  }); // Close modal on background click\n  // ...\n  // Send order info on button click\n\n  $('.modal__button-send').click(function () {\n    console.log(\"Send\"); // Validate inputs\n\n    var phoneValue = $('#modal-input-number').val();\n\n    if (phoneValue === '' || !phoneValue) {\n      $('#modal-input-number').addClass('error');\n      return false;\n    } else {\n      $('#modal-input-number').removeClass('error');\n    }\n\n    var data = $('#modal-form').serialize();\n    _api_service__WEBPACK_IMPORTED_MODULE_0__[\"default\"].orders.post(data, function (res) {\n      if (res.error !== null) {\n        console.error(\"Modal Order send error: \", error.description);\n        return;\n      } // Order success\n\n\n      $('.modal').toggleClass('hidden');\n    });\n  }); // Mask number input\n\n  $('.number').mask('+7 (000)000-00-00');\n}\n\nfunction _addProductMessage() {\n  // Get product Id\n  var productFullId = $('.product.type-product').attr('id');\n  var productId = productFullId.split('product-')[1]; // Set product Id to hidden input\n\n  $('#product-id').val(productId); // Get product title\n\n  var title = $('.title').text().trim(); // Set prodcut title to message input\n\n  $('#modal-input-message').val(\"\\u0417\\u0434\\u0440\\u0430\\u0432\\u0441\\u0442\\u0432\\u0443\\u0439\\u0442\\u0435!\\n\\n\\u041C\\u0435\\u043D\\u044F \\u0437\\u0430\\u0438\\u043D\\u0442\\u0435\\u0440\\u0435\\u0441\\u043E\\u0432\\u0430\\u043B \\\"\".concat(title, \"\\\".\"));\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  initialize: _initModal,\n  addProductMessage: _addProductMessage\n});\n\n//# sourceURL=webpack:///./js/orders.modal.js?");

/***/ }),

/***/ 3:
/*!**********************************!*\
  !*** multi ./js/orders.modal.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/elochka42/wp-content/themes/elochka-store/src/js/orders.modal.js */\"./js/orders.modal.js\");\n\n\n//# sourceURL=webpack:///multi_./js/orders.modal.js?");

/***/ })

/******/ });