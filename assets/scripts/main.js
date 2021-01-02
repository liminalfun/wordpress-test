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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./_development/components/_components.js":
/*!************************************************!*\
  !*** ./_development/components/_components.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _cookie_notice_scripts_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cookie-notice/scripts.js */ \"./_development/components/cookie-notice/scripts.js\");\n/* harmony import */ var _img_fit_scripts_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./img-fit/scripts.js */ \"./_development/components/img-fit/scripts.js\");\n\n\n\n//# sourceURL=webpack:///./_development/components/_components.js?");

/***/ }),

/***/ "./_development/components/cookie-notice/scripts.js":
/*!**********************************************************!*\
  !*** ./_development/components/cookie-notice/scripts.js ***!
  \**********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scripts_cookie_notice__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/cookie-notice */ \"./_development/components/cookie-notice/scripts/cookie-notice.js\");\n\nwindow.addEventListener(\"DOMContentLoaded\", () => {\n  const cookieNoticeElement = document.querySelector(\".cookie-notice\");\n\n  if (cookieNoticeElement) {\n    new _scripts_cookie_notice__WEBPACK_IMPORTED_MODULE_0__[\"default\"](cookieNoticeElement);\n  }\n});\n\n//# sourceURL=webpack:///./_development/components/cookie-notice/scripts.js?");

/***/ }),

/***/ "./_development/components/cookie-notice/scripts/cookie-notice.js":
/*!************************************************************************!*\
  !*** ./_development/components/cookie-notice/scripts/cookie-notice.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scripts_helpers_cookies__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../scripts/helpers/cookies */ \"./_development/scripts/helpers/cookies.js\");\n\n\nclass cookieNotice {\n  constructor(element) {\n    this.element = element;\n    this.cookieLifetime = 365;\n    this.cookieName = \"cookies-accepted\";\n    this.acceptBtn = this.element.querySelector(\".js-cookie-notice-accept\");\n    this.rejectBtn = this.element.querySelector(\".js-cookie-notice-reject\");\n    this.init();\n  }\n\n  init() {\n    // The cookie notice is only shown if not previously dismissed.\n    if (Object(_scripts_helpers_cookies__WEBPACK_IMPORTED_MODULE_0__[\"getCookie\"])(this.cookieName) === \"\") {\n      this.element.classList.add(\"active\");\n    } // Handle cookie acceptance.\n\n\n    this.element.addEventListener(\"click\", event => {\n      if (event.target === this.acceptBtn) {\n        this.setCookieChoice(true);\n      } else if (event.target === this.rejectBtn) {\n        this.setCookieChoice(false);\n      }\n    });\n  }\n  /**\n   * Handles the user accepting or rejecting site cookies.\n   *\n   * @param {boolean} choice Whether the user has accepted/rejected site cookies.\n   */\n\n\n  setCookieChoice(choice) {\n    Object(_scripts_helpers_cookies__WEBPACK_IMPORTED_MODULE_0__[\"setCookie\"])(this.cookieName, choice, this.cookieLifetime);\n    this.closeCookieNotice();\n  }\n  /**\n   * Closes the cookie notice.\n   */\n\n\n  closeCookieNotice() {\n    this.element.classList.remove(\"active\");\n  }\n\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (cookieNotice);\n\n//# sourceURL=webpack:///./_development/components/cookie-notice/scripts/cookie-notice.js?");

/***/ }),

/***/ "./_development/components/img-fit/object-fit.js":
/*!*******************************************************!*\
  !*** ./_development/components/img-fit/object-fit.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return objectFit; });\n/**\n * Provides a background image fallback when browser doesn't support an 'object-fit' property.\n *\n * @param { string || array } targetClass: all class names where polyfill should be applied.\n * @param { string } fallbackClass: a class that will be added when object-fit polyfill is used\n */\nfunction objectFit({\n  targetClass = 'img-fit',\n  fallbackClass = 'img-fit--fallback'\n} = {}) {\n  // do nothing if browser supports 'object-fit'.\n  if (objectFitIsSupported()) {\n    return;\n  }\n\n  if (Array.isArray(targetClass)) {\n    targetClass = targetClass.join(',.');\n  }\n\n  const targets = document.querySelectorAll(`.${targetClass}`);\n\n  if (targets) {\n    for (const target of targets) {\n      provideFallback(target, fallbackClass);\n    }\n  }\n}\n\nconst objectFitIsSupported = () => 'objectFit' in document.documentElement.style; // Applies background-image to image container and removes the image from DOM\n\n\nconst provideFallback = (imageContainer, fallbackClass) => {\n  const image = imageContainer.querySelector('img');\n  let imageUrl = image.getAttribute('src');\n  const imageDataUrl = image.getAttribute('data-src');\n\n  if (imageDataUrl !== null && imageDataUrl !== \"\") {\n    imageUrl = imageDataUrl;\n  }\n\n  if (!imageUrl) {\n    return;\n  }\n\n  imageContainer.classList.add(fallbackClass);\n  imageContainer.style.backgroundImage = `url( ${imageUrl} )`;\n  image.parentNode.removeChild(image);\n};\n\n//# sourceURL=webpack:///./_development/components/img-fit/object-fit.js?");

/***/ }),

/***/ "./_development/components/img-fit/scripts.js":
/*!****************************************************!*\
  !*** ./_development/components/img-fit/scripts.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _object_fit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./object-fit */ \"./_development/components/img-fit/object-fit.js\");\n // ------------------------------------------------------------------\n// Image Fit\n// ------------------------------------------------------------------\n// This adds a compatibility layer for images and usage of object fit\n// The fall back will be applied if the no-object-fit class is on the\n// HTML element\n// ------------------------------------------------------------------\n\nObject(_object_fit__WEBPACK_IMPORTED_MODULE_0__[\"default\"])({\n  targetClass: ['img-fit', // Custom usage\n  'gallery-icon' // WordPress\n  ]\n});\n\n//# sourceURL=webpack:///./_development/components/img-fit/scripts.js?");

/***/ }),

/***/ "./_development/scripts/helpers/cookies.js":
/*!*************************************************!*\
  !*** ./_development/scripts/helpers/cookies.js ***!
  \*************************************************/
/*! exports provided: setCookie, getCookie */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"setCookie\", function() { return setCookie; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"getCookie\", function() { return getCookie; });\n// Get a Date a number of days in the future.\nconst futureDate = days => new Date(Date.now() + days * 24 * 60 * 60 * 1000); // Get a future date as a UTC string.\n\n\nconst utcFutureDate = days => futureDate(days).toUTCString(); // Create a key-value string for a cookie attribute.\n\n\nconst cAttr = (key, value) => key + \"=\" + value + \";\"; // Set a cookie with a given lifetime (in days).\n\n\nconst setCookie = (name, value, lifetime) => {\n  document.cookie = cAttr(name, value) + cAttr(\"expires\", utcFutureDate(lifetime)) + cAttr(\"path\", \"/\") + cAttr(\"SameSite\", \"strict\");\n}; // Retrieve a cookie value by name. Empty string if not found.\n\n\nconst getCookie = cname => {\n  const name = cname + \"=\";\n  const ca = document.cookie.split(\";\");\n\n  for (let i = 0; i < ca.length; i++) {\n    let c = ca[i];\n\n    while (c.charAt(0) == \" \") {\n      c = c.substring(1);\n    }\n\n    if (c.indexOf(name) == 0) {\n      return c.substring(name.length, c.length);\n    }\n  }\n\n  return \"\";\n};\n\n\n\n//# sourceURL=webpack:///./_development/scripts/helpers/cookies.js?");

/***/ }),

/***/ "./_development/scripts/helpers/ie10.js":
/*!**********************************************!*\
  !*** ./_development/scripts/helpers/ie10.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return ie10; });\nfunction ie10() {\n  if (navigator.appVersion.indexOf(\"MSIE 10\") !== -1) {\n    return true;\n  }\n\n  return false;\n}\n\n//# sourceURL=webpack:///./_development/scripts/helpers/ie10.js?");

/***/ }),

/***/ "./_development/scripts/helpers/ie11.js":
/*!**********************************************!*\
  !*** ./_development/scripts/helpers/ie11.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return ie11; });\nfunction ie11() {\n  const UAString = navigator.userAgent;\n  return UAString.indexOf(\"Trident\") !== -1 && UAString.indexOf(\"rv:11\") !== -1;\n}\n\n//# sourceURL=webpack:///./_development/scripts/helpers/ie11.js?");

/***/ }),

/***/ "./_development/scripts/main.js":
/*!**************************************!*\
  !*** ./_development/scripts/main.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _components_components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/_components */ \"./_development/components/_components.js\");\n/* harmony import */ var _helpers_ie10__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./helpers/ie10 */ \"./_development/scripts/helpers/ie10.js\");\n/* harmony import */ var _helpers_ie11__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./helpers/ie11 */ \"./_development/scripts/helpers/ie11.js\");\n// Loaded from\n\n\n // ------------------------------------------------------------------\n// Custom scripts\n// ------------------------------------------------------------------\n\nconst Granola = () => {\n  if (Object(_helpers_ie11__WEBPACK_IMPORTED_MODULE_2__[\"default\"])() || Object(_helpers_ie10__WEBPACK_IMPORTED_MODULE_1__[\"default\"])()) {\n    document.querySelector('html').classList.add('legacybrowser');\n  }\n};\n\ndocument.addEventListener('DOMContentLoaded', () => Granola());\n\n//# sourceURL=webpack:///./_development/scripts/main.js?");

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./_development/scripts/main.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! /Users/xela/Sites/portfolio/_development/scripts/main.js */\"./_development/scripts/main.js\");\n\n\n//# sourceURL=webpack:///multi_./_development/scripts/main.js?");

/***/ })

/******/ });