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

/***/ "./_development/scripts/editor-scripts.js":
/*!************************************************!*\
  !*** ./_development/scripts/editor-scripts.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _editor_disabled_blocks_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./editor/disabled-blocks.js */ \"./_development/scripts/editor/disabled-blocks.js\");\n/* harmony import */ var _editor_disabled_blocks_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_editor_disabled_blocks_js__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _editor_block_styles_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./editor/block-styles.js */ \"./_development/scripts/editor/block-styles.js\");\n/* harmony import */ var _editor_block_styles_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_editor_block_styles_js__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _editor_paragraph_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor/paragraph.js */ \"./_development/scripts/editor/paragraph.js\");\n/* harmony import */ var _editor_paragraph_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_editor_paragraph_js__WEBPACK_IMPORTED_MODULE_2__);\n\n\n\n\n//# sourceURL=webpack:///./_development/scripts/editor-scripts.js?");

/***/ }),

/***/ "./_development/scripts/editor/block-styles.js":
/*!*****************************************************!*\
  !*** ./_development/scripts/editor/block-styles.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/* global wp */\nwp.domReady(() => {\n  wp.blocks.unregisterBlockStyle(\"core/button\", \"default\");\n  wp.blocks.unregisterBlockStyle(\"core/button\", \"fill\");\n  wp.blocks.unregisterBlockStyle(\"core/button\", \"outline\");\n  wp.blocks.unregisterBlockStyle(\"core/button\", \"squared\");\n  wp.blocks.unregisterBlockStyle(\"core/image\", \"default\");\n  wp.blocks.unregisterBlockStyle(\"core/image\", \"rounded\");\n  wp.blocks.unregisterBlockStyle(\"core/quote\", \"default\");\n  wp.blocks.unregisterBlockStyle(\"core/quote\", \"large\");\n});\n\n//# sourceURL=webpack:///./_development/scripts/editor/block-styles.js?");

/***/ }),

/***/ "./_development/scripts/editor/disabled-blocks.js":
/*!********************************************************!*\
  !*** ./_development/scripts/editor/disabled-blocks.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/* global wp */\n// A list of blocks to disable in the editor.\nconst disabledBlocks = [\"core/gallery\", \"core/archives\", \"core/audio\", \"core/calendar\", \"core/categories\", \"core/code\", \"core/columns\", \"core/column\", \"core/file\", \"core/media-text\", \"core/latest-comments\", \"core/latest-posts\", \"core/more\", \"core/nextpage\", \"core/preformatted\", \"core/pullquote\", \"core/rss\", \"core/search\", \"core/social-links\", \"core/social-link\", \"core/spacer\", \"core/subhead\", \"core/tag-cloud\", \"core/table\", \"core/text-columns\", \"core/video\", \"core/verse\"];\nwp.domReady(() => {\n  for (const block of disabledBlocks) {\n    wp.blocks.unregisterBlockType(block);\n  }\n});\n\n//# sourceURL=webpack:///./_development/scripts/editor/disabled-blocks.js?");

/***/ }),

/***/ "./_development/scripts/editor/paragraph.js":
/*!**************************************************!*\
  !*** ./_development/scripts/editor/paragraph.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/* global wp */\n\n/**\n * Filter block settings to hide the dropcap option on paragraph blocks.\n *\n * Uses an experimental feature filter.\n *\n * @link: https://github.com/joppuyo/remove-drop-cap\n *\n * @param {object} settings Block settings object.\n * @param {string} name Block name.\n */\nconst removeDropCap = function (settings, name) {\n  // Bail early - wrong block.\n  if (name !== \"core/paragraph\") {\n    return settings;\n  }\n\n  const newSettings = Object.assign({}, settings);\n\n  if (newSettings.supports && newSettings.supports.__experimentalFeatures && newSettings.supports.__experimentalFeatures.typography && newSettings.supports.__experimentalFeatures.typography.dropCap) {\n    newSettings.supports.__experimentalFeatures.typography.dropCap = false;\n  }\n\n  return newSettings;\n};\n\nwp.hooks.addFilter(\"blocks.registerBlockType\", \"granola/remove-drop-cap\", removeDropCap);\n\n//# sourceURL=webpack:///./_development/scripts/editor/paragraph.js?");

/***/ }),

/***/ 1:
/*!******************************************************!*\
  !*** multi ./_development/scripts/editor-scripts.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/wordpress/wp-content/themes/wordpress-test/_development/scripts/editor-scripts.js */\"./_development/scripts/editor-scripts.js\");\n\n\n//# sourceURL=webpack:///multi_./_development/scripts/editor-scripts.js?");

/***/ })

/******/ });