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

/***/ "./js/index.js":
/*!*********************!*\
  !*** ./js/index.js ***!
  \*********************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function buildQuery(formData) {\n  // Setup our serialized data\n  var serialized = [];\n\n  for (var i = 0; i < formData.length; i++) {\n    var fieldData = formData[i];\n    serialized.push(encodeURIComponent(fieldData.name) + \"=\" + encodeURIComponent(fieldData.value));\n  }\n\n  return \"?\" + serialized.join('&');\n}\n\nfunction serializeForm(form) {\n  // Setup our serialized data\n  var serialized = []; // Loop through each field in the form\n\n  for (var i = 0; i < form.elements.length; i++) {\n    var field = form.elements[i]; // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields\n\n    if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;\n    serialized.push({\n      name: field.name,\n      value: field.value\n    });\n  }\n\n  return serialized;\n}\n\nfunction serializeFilterData() {\n  // Setup our serialized data\n  var serialized = []; // Handle category\n\n  var selectedCategory = null;\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    if (button.dataset.selected === 'false') return;\n    selectedCategory = {\n      name: button.dataset.name,\n      value: button.dataset.slug\n    };\n  });\n  if (!!selectedCategory) serialized.push(selectedCategory); // Handle attributes\n\n  var selectedTerms = [];\n  var selectedTermsIds = [];\n  var attributesInputs = document.querySelectorAll('input[name=\"attributes\"]');\n  attributesInputs.forEach(function (input) {\n    if (!input.checked) return;\n    var parentDiv = input.closest('[data-name=\"attributes-container\"]');\n    console.log({\n      parentDiv: parentDiv\n    });\n    var termTaxonomy = parentDiv.dataset.tax_key;\n    if (selectedTerms.indexOf(termTaxonomy) === -1) selectedTerms.push(termTaxonomy);\n    selectedTermsIds.push(input.value);\n  });\n\n  if (selectedTerms.length > 0) {\n    serialized.push({\n      name: 'term-names',\n      value: selectedTerms\n    });\n    serialized.push({\n      name: 'attributes',\n      value: selectedTermsIds\n    });\n  }\n\n  return serialized;\n}\n\nfunction _handleFilterFormSubmit() {\n  var form = document.getElementById(\"elochka-main-filter\"); // Get information from form\n\n  var formData = serializeForm(form); // Get information from filter\n\n  var filterData = serializeFilterData(); // Merge data\n\n  var fullQuery = formData.concat(filterData); // Submit query\n\n  var url = buildQuery(fullQuery);\n  window.location.href = \"/katalog/\".concat(url);\n  return false;\n}\n\nfunction _handleOrderByChange(event) {\n  // Submit form\n  _handleFilterFormSubmit(); // Stop click event\n\n\n  return false;\n}\n\nfunction _handleCategoryButtonClick(event) {\n  // Deselect all previous\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    button.dataset.selected = false;\n  }); // Set selected\n\n  event.target.dataset.selected = true; // Submit form\n\n  _handleFilterFormSubmit(); // Stop click event\n\n\n  return false;\n}\n\nfunction _handleAttributesChange(event) {\n  // Submit form\n  _handleFilterFormSubmit();\n}\n\nfunction registerFormSubmit() {\n  var filterForm = document.getElementById(\"elochka-main-filter\");\n  filterForm.onsubmit = _handleFilterFormSubmit;\n}\n\nfunction registerOrderBySubmit() {\n  var orderByInput = document.getElementById(\"filter-orderby\");\n  orderByInput.onchange = _handleOrderByChange;\n}\n\nfunction registerFilterSubmit() {\n  var categoryButtons = document.querySelectorAll('[data-name=\"category\"]');\n  categoryButtons.forEach(function (button) {\n    button.onclick = _handleCategoryButtonClick;\n  });\n  var attributesInputs = document.querySelectorAll('input[name=\"attributes\"]');\n  attributesInputs.forEach(function (input) {\n    input.onchange = _handleAttributesChange;\n  });\n}\n\nwindow.onload = function () {\n  var currentPath = window.location.pathname; // If it's catalog\n\n  if (currentPath.includes(\"/katalog\")) {\n    registerFormSubmit();\n    registerOrderBySubmit();\n    registerFilterSubmit(); // // Fetch products\n    // API.products.get()\n    // .then(function(response) {\n    // \t// handle success\n    // \tconsole.log({response});\n    // \tconst data = response.data;\n    // \tconsole.log({ data });\n    // })\n    // .catch(function (error) {\n    // \t// handle error\n    // \tconsole.error(\"Axios get error:\", error);\n    // });\n    // // Fetch attributes\n    // API.attributes.get()\n    // .then(function(response) {\n    // \t// handle success\n    // \tconsole.log({response});\n    // \tconst data = response.data;\n    // \tconsole.log({ data });\n    // })\n    // .catch(function (error) {\n    // \t// handle error\n    // \tconsole.error(\"Axios get error:\", error);\n    // });\n  }\n};\n\n//# sourceURL=webpack:///./js/index.js?");

/***/ }),

/***/ 1:
/*!***************************!*\
  !*** multi ./js/index.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/elochka42/wp-content/themes/elochka-store/src/js/index.js */\"./js/index.js\");\n\n\n//# sourceURL=webpack:///multi_./js/index.js?");

/***/ })

/******/ });