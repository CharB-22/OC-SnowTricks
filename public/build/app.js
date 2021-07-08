(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$":
/*!*****************************************************************************************************************!*\
  !*** ./assets/controllers/ sync ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \.(j|t)sx?$ ***!
  \*****************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./hello_controller.js": "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$";

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json":
/*!************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
});

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js":
/*!******************************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _default)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.reflect.construct.js */ "./node_modules/core-js/modules/es.reflect.construct.js");
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var stimulus__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! stimulus */ "./node_modules/stimulus/index.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }














function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }


/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */

var _default = /*#__PURE__*/function (_Controller) {
  _inherits(_default, _Controller);

  var _super = _createSuper(_default);

  function _default() {
    _classCallCheck(this, _default);

    return _super.apply(this, arguments);
  }

  _createClass(_default, [{
    key: "connect",
    value: function connect() {
      this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }
  }]);

  return _default;
}(stimulus__WEBPACK_IMPORTED_MODULE_12__.Controller);



/***/ }),

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./bootstrap */ "./assets/bootstrap.js");






/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)

 // start the Stimulus application



var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"); // Generate embedded forms for Image and video collection


var newItem = function newItem(e) {
  var collectionHolder = document.querySelector(e.currentTarget.dataset.collection);
  var item = document.createElement("div");
  item.classList.add("col-11");
  item.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, collectionHolder.dataset.index);
  item.querySelector(".btn-remove").addEventListener("click", function () {
    return item.remove();
  });
  collectionHolder.appendChild(item);
  collectionHolder.dataset.index++;
};

document.querySelectorAll(".btn-remove").forEach(function (btn) {
  return btn.addEventListener("click", function (e) {
    return e.currentTarget.closest("col").remove();
  });
});
document.querySelectorAll(".btn-new").forEach(function (btn) {
  return btn.addEventListener("click", newItem);
}); // Display the input field for the current trick Image/Video to edit

var editMedia = function editMedia(e) {
  // Create the input element
  var uploadField = document.querySelector(".uploadField");

  if (uploadField.classList.contains("visually-hidden")) {
    uploadField.classList.remove("visually-hidden");
  } else {
    uploadField.classList.add("visually-hidden");
  }
};

document.querySelectorAll(".editMedia").forEach(function (btn) {
  return btn.addEventListener("click", editMedia);
}); // Remove the current image from the trick Form - only possible for saved images

document.querySelectorAll(".deleteMedia").forEach(function (btn) {
  return btn.addEventListener("click", function (e) {
    return e.currentTarget.closest("div").remove();
  });
}); // jQuery section - the loadmore button

$(function () {
  $(".trick").slice(0, 4).show();
  $("#loadmore").on("click", function (e) {
    e.preventDefault(); // Display more tricks when available

    $(".trick:hidden").slice(0, 4).slideDown(); // If no more tricks - disabled button

    if ($(".trick:hidden").length === 0) {
      $("#loadmore").addClass("disabled");
    }
  });
}); // Manage the media display for trick details on mobile

var displayMedia = function displayMedia(e) {
  var mobileCaroussel = document.getElementById("mobileMediaList");

  if (mobileCaroussel.classList.contains("visually-hidden")) {
    mobileCaroussel.classList.remove("visually-hidden");
  } else {
    mobileCaroussel.classList.add("visually-hidden");
  }
};

document.getElementById("moreMedia").addEventListener("click", displayMedia);

/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "app": () => (/* binding */ app)
/* harmony export */ });
/* harmony import */ var _symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @symfony/stimulus-bridge */ "./node_modules/@symfony/stimulus-bridge/dist/index.js");
 // Registers Stimulus controllers from controllers.json and in the controllers/ directory

var app = (0,_symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__.startStimulusApp)(__webpack_require__("./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$")); // register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ "use strict";
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_symfony_stimulus-bridge_dist_index_js-node_modules_bootstrap_dist_js_boo-547334"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vfC9cXC4oanx0KXN4Iiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy5qc29uIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzIl0sIm5hbWVzIjpbImVsZW1lbnQiLCJ0ZXh0Q29udGVudCIsIkNvbnRyb2xsZXIiLCIkIiwicmVxdWlyZSIsIm5ld0l0ZW0iLCJlIiwiY29sbGVjdGlvbkhvbGRlciIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsImN1cnJlbnRUYXJnZXQiLCJkYXRhc2V0IiwiY29sbGVjdGlvbiIsIml0ZW0iLCJjcmVhdGVFbGVtZW50IiwiY2xhc3NMaXN0IiwiYWRkIiwiaW5uZXJIVE1MIiwicHJvdG90eXBlIiwicmVwbGFjZSIsImluZGV4IiwiYWRkRXZlbnRMaXN0ZW5lciIsInJlbW92ZSIsImFwcGVuZENoaWxkIiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJidG4iLCJjbG9zZXN0IiwiZWRpdE1lZGlhIiwidXBsb2FkRmllbGQiLCJjb250YWlucyIsInNsaWNlIiwic2hvdyIsIm9uIiwicHJldmVudERlZmF1bHQiLCJzbGlkZURvd24iLCJsZW5ndGgiLCJhZGRDbGFzcyIsImRpc3BsYXlNZWRpYSIsIm1vYmlsZUNhcm91c3NlbCIsImdldEVsZW1lbnRCeUlkIiwiYXBwIiwic3RhcnRTdGltdWx1c0FwcCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwwSTs7Ozs7Ozs7Ozs7Ozs7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QixDQUE4QixpQkFBOUI7QUFDSDtBQUVKLENBWkQ7O0FBY0FSLFFBQVEsQ0FDUGdDLGNBREQsQ0FDZ0IsV0FEaEIsRUFDNkJuQixnQkFEN0IsQ0FDOEMsT0FEOUMsRUFDdURpQixZQUR2RCxFOzs7Ozs7Ozs7Ozs7Ozs7O0NDaEdBOztBQUNPLElBQU1HLEdBQUcsR0FBR0MsMEVBQWdCLENBQUN0QywwSUFBRCxDQUE1QixDLENBTVA7QUFDQSxnRTs7Ozs7Ozs7Ozs7O0FDVkEiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIG1hcCA9IHtcblx0XCIuL2hlbGxvX2NvbnRyb2xsZXIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9Ac3ltZm9ueS9zdGltdWx1cy1icmlkZ2UvbGF6eS1jb250cm9sbGVyLWxvYWRlci5qcyEuL2Fzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vYXNzZXRzL2NvbnRyb2xsZXJzIHN5bmMgcmVjdXJzaXZlIC4vbm9kZV9tb2R1bGVzL0BzeW1mb255L3N0aW11bHVzLWJyaWRnZS9sYXp5LWNvbnRyb2xsZXItbG9hZGVyLmpzISBcXFxcLihqfHQpc3g/JFwiOyIsImV4cG9ydCBkZWZhdWx0IHtcbn07IiwiaW1wb3J0IHsgQ29udHJvbGxlciB9IGZyb20gJ3N0aW11bHVzJztcclxuXHJcbi8qXHJcbiAqIFRoaXMgaXMgYW4gZXhhbXBsZSBTdGltdWx1cyBjb250cm9sbGVyIVxyXG4gKlxyXG4gKiBBbnkgZWxlbWVudCB3aXRoIGEgZGF0YS1jb250cm9sbGVyPVwiaGVsbG9cIiBhdHRyaWJ1dGUgd2lsbCBjYXVzZVxyXG4gKiB0aGlzIGNvbnRyb2xsZXIgdG8gYmUgZXhlY3V0ZWQuIFRoZSBuYW1lIFwiaGVsbG9cIiBjb21lcyBmcm9tIHRoZSBmaWxlbmFtZTpcclxuICogaGVsbG9fY29udHJvbGxlci5qcyAtPiBcImhlbGxvXCJcclxuICpcclxuICogRGVsZXRlIHRoaXMgZmlsZSBvciBhZGFwdCBpdCBmb3IgeW91ciB1c2UhXHJcbiAqL1xyXG5leHBvcnQgZGVmYXVsdCBjbGFzcyBleHRlbmRzIENvbnRyb2xsZXIge1xyXG4gICAgY29ubmVjdCgpIHtcclxuICAgICAgICB0aGlzLmVsZW1lbnQudGV4dENvbnRlbnQgPSAnSGVsbG8gU3RpbXVsdXMhIEVkaXQgbWUgaW4gYXNzZXRzL2NvbnRyb2xsZXJzL2hlbGxvX2NvbnRyb2xsZXIuanMnO1xyXG4gICAgfVxyXG59XHJcbiIsIi8qXHJcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcclxuICpcclxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxyXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxyXG4gKi9cclxuXHJcbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcclxuaW1wb3J0IFwiLi9zdHlsZXMvYXBwLnNjc3NcIjtcclxuaW1wb3J0IHsgVG9vbHRpcCwgVG9hc3QsIFBvcG92ZXIgfSBmcm9tIFwiYm9vdHN0cmFwXCI7XHJcbi8vIHN0YXJ0IHRoZSBTdGltdWx1cyBhcHBsaWNhdGlvblxyXG5pbXBvcnQgXCIuL2Jvb3RzdHJhcFwiO1xyXG4gXHJcbmNvbnN0ICQgPSByZXF1aXJlKFwianF1ZXJ5XCIpO1xyXG5cclxuXHJcbi8vIEdlbmVyYXRlIGVtYmVkZGVkIGZvcm1zIGZvciBJbWFnZSBhbmQgdmlkZW8gY29sbGVjdGlvblxyXG5cclxuY29uc3QgbmV3SXRlbSA9IChlKSA9PiB7XHJcbiAgICBcclxuICAgIGNvbnN0IGNvbGxlY3Rpb25Ib2xkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGUuY3VycmVudFRhcmdldC5kYXRhc2V0LmNvbGxlY3Rpb24pO1xyXG4gICAgY29uc3QgaXRlbSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJkaXZcIik7XHJcbiAgICBpdGVtLmNsYXNzTGlzdC5hZGQoXCJjb2wtMTFcIik7XHJcbiAgICBcclxuICAgIGl0ZW0uaW5uZXJIVE1MID0gY29sbGVjdGlvbkhvbGRlci5kYXRhc2V0LnByb3RvdHlwZS5yZXBsYWNlKFxyXG4gICAgICAgIC9fX25hbWVfXy9nLFxyXG4gICAgICAgIGNvbGxlY3Rpb25Ib2xkZXIuZGF0YXNldC5pbmRleFxyXG4gICAgKTtcclxuXHJcbiAgICBpdGVtLnF1ZXJ5U2VsZWN0b3IoXCIuYnRuLXJlbW92ZVwiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4gaXRlbS5yZW1vdmUoKSk7XHJcbiAgICBcclxuICAgIGNvbGxlY3Rpb25Ib2xkZXIuYXBwZW5kQ2hpbGQoaXRlbSk7XHJcbiAgICBjb2xsZWN0aW9uSG9sZGVyLmRhdGFzZXQuaW5kZXgrKztcclxufTtcclxuXHJcblxyXG5kb2N1bWVudFxyXG4ucXVlcnlTZWxlY3RvckFsbChcIi5idG4tcmVtb3ZlXCIpXHJcbi5mb3JFYWNoKChidG4pID0+IGJ0bi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZSA9PiBlLmN1cnJlbnRUYXJnZXQuY2xvc2VzdChcImNvbFwiKS5yZW1vdmUoKSkpO1xyXG5cclxuZG9jdW1lbnRcclxuLnF1ZXJ5U2VsZWN0b3JBbGwoXCIuYnRuLW5ld1wiKVxyXG4uZm9yRWFjaCggKGJ0bikgPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBuZXdJdGVtKSk7XHJcblxyXG4vLyBEaXNwbGF5IHRoZSBpbnB1dCBmaWVsZCBmb3IgdGhlIGN1cnJlbnQgdHJpY2sgSW1hZ2UvVmlkZW8gdG8gZWRpdFxyXG5jb25zdCBlZGl0TWVkaWEgPSAoZSkgPT4ge1xyXG4gICAgLy8gQ3JlYXRlIHRoZSBpbnB1dCBlbGVtZW50XHJcbiAgICBsZXQgdXBsb2FkRmllbGQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLnVwbG9hZEZpZWxkXCIpO1xyXG4gICAgaWYgKHVwbG9hZEZpZWxkLmNsYXNzTGlzdC5jb250YWlucyhcInZpc3VhbGx5LWhpZGRlblwiKSlcclxuICAgIHtcclxuICAgICAgICB1cGxvYWRGaWVsZC5jbGFzc0xpc3QucmVtb3ZlKFwidmlzdWFsbHktaGlkZGVuXCIpO1xyXG4gICAgfVxyXG4gICAgZWxzZVxyXG4gICAge1xyXG4gICAgICAgIHVwbG9hZEZpZWxkLmNsYXNzTGlzdC5hZGQoXCJ2aXN1YWxseS1oaWRkZW5cIik7XHJcbiAgICB9XHJcbiAgICBcclxufTtcclxuXHJcbmRvY3VtZW50XHJcbi5xdWVyeVNlbGVjdG9yQWxsKFwiLmVkaXRNZWRpYVwiKVxyXG4uZm9yRWFjaCggKGJ0bikgPT4gYnRuLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBlZGl0TWVkaWEpKTtcclxuXHJcbi8vIFJlbW92ZSB0aGUgY3VycmVudCBpbWFnZSBmcm9tIHRoZSB0cmljayBGb3JtIC0gb25seSBwb3NzaWJsZSBmb3Igc2F2ZWQgaW1hZ2VzXHJcbmRvY3VtZW50XHJcbi5xdWVyeVNlbGVjdG9yQWxsKFwiLmRlbGV0ZU1lZGlhXCIpXHJcbi5mb3JFYWNoKChidG4pID0+IGJ0bi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZSAgPT4gZS5jdXJyZW50VGFyZ2V0LmNsb3Nlc3QoXCJkaXZcIikucmVtb3ZlKCkpKTtcclxuXHJcbi8vIGpRdWVyeSBzZWN0aW9uIC0gdGhlIGxvYWRtb3JlIGJ1dHRvblxyXG4kKGZ1bmN0aW9uKCl7XHJcbiAgICAkKFwiLnRyaWNrXCIpLnNsaWNlKDAsIDQpLnNob3coKTtcclxuICAgICQoXCIjbG9hZG1vcmVcIikub24oXCJjbGlja1wiLCBmdW5jdGlvbihlKXtcclxuICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAvLyBEaXNwbGF5IG1vcmUgdHJpY2tzIHdoZW4gYXZhaWxhYmxlXHJcbiAgICAgICAgICQoXCIudHJpY2s6aGlkZGVuXCIpLnNsaWNlKDAsIDQpLnNsaWRlRG93bigpO1xyXG4gICAgICAgICBcclxuICAgICAgICAgLy8gSWYgbm8gbW9yZSB0cmlja3MgLSBkaXNhYmxlZCBidXR0b25cclxuICAgICAgICAgaWYoJChcIi50cmljazpoaWRkZW5cIikubGVuZ3RoID09PSAwKSB7XHJcbiAgICAgICAgICAgICAkKFwiI2xvYWRtb3JlXCIpLmFkZENsYXNzKFwiZGlzYWJsZWRcIik7XHJcbiAgICAgICAgIH1cclxuICAgIH0pO1xyXG59KTtcclxuXHJcbi8vIE1hbmFnZSB0aGUgbWVkaWEgZGlzcGxheSBmb3IgdHJpY2sgZGV0YWlscyBvbiBtb2JpbGVcclxuY29uc3QgZGlzcGxheU1lZGlhID0gKGUpID0+IHtcclxuICAgIGxldCBtb2JpbGVDYXJvdXNzZWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcIm1vYmlsZU1lZGlhTGlzdFwiKTtcclxuXHJcbiAgICBpZiAobW9iaWxlQ2Fyb3Vzc2VsLmNsYXNzTGlzdC5jb250YWlucyhcInZpc3VhbGx5LWhpZGRlblwiKSlcclxuICAgIHtcclxuICAgICAgICBtb2JpbGVDYXJvdXNzZWwuY2xhc3NMaXN0LnJlbW92ZShcInZpc3VhbGx5LWhpZGRlblwiKTtcclxuICAgIH1cclxuICAgIGVsc2VcclxuICAgIHtcclxuICAgICAgICBtb2JpbGVDYXJvdXNzZWwuY2xhc3NMaXN0LmFkZChcInZpc3VhbGx5LWhpZGRlblwiKTtcclxuICAgIH1cclxuXHJcbn1cclxuXHJcbmRvY3VtZW50XHJcbi5nZXRFbGVtZW50QnlJZChcIm1vcmVNZWRpYVwiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZGlzcGxheU1lZGlhKTtcclxuXHJcbiIsImltcG9ydCB7IHN0YXJ0U3RpbXVsdXNBcHAgfSBmcm9tICdAc3ltZm9ueS9zdGltdWx1cy1icmlkZ2UnO1xyXG5cclxuLy8gUmVnaXN0ZXJzIFN0aW11bHVzIGNvbnRyb2xsZXJzIGZyb20gY29udHJvbGxlcnMuanNvbiBhbmQgaW4gdGhlIGNvbnRyb2xsZXJzLyBkaXJlY3RvcnlcclxuZXhwb3J0IGNvbnN0IGFwcCA9IHN0YXJ0U3RpbXVsdXNBcHAocmVxdWlyZS5jb250ZXh0KFxyXG4gICAgJ0BzeW1mb255L3N0aW11bHVzLWJyaWRnZS9sYXp5LWNvbnRyb2xsZXItbG9hZGVyIS4vY29udHJvbGxlcnMnLFxyXG4gICAgdHJ1ZSxcclxuICAgIC9cXC4oanx0KXN4PyQvXHJcbikpO1xyXG5cclxuLy8gcmVnaXN0ZXIgYW55IGN1c3RvbSwgM3JkIHBhcnR5IGNvbnRyb2xsZXJzIGhlcmVcclxuLy8gYXBwLnJlZ2lzdGVyKCdzb21lX2NvbnRyb2xsZXJfbmFtZScsIFNvbWVJbXBvcnRlZENvbnRyb2xsZXIpO1xyXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwic291cmNlUm9vdCI6IiJ9