"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_TouristPlace_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      touristAreas: []
    };
  },
  mounted: function mounted() {
    this.fetchMinistryDetail();
  },
  methods: {
    fetchMinistryDetail: function fetchMinistryDetail() {
      var _this = this;

      axios.get("/api/tourist-area").then(function (response) {
        _this.touristAreas = response.data.data; // console.log(this.ministryDetails);
      })["catch"](function (error) {
        return console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.mycards {\n  height: 330px;\n}\n.mycards img {\n  height: 100%;\n  width: 100%;\n  -o-object-fit: fill;\n     object-fit: fill;\n}\n.box {\n  background-color: white;\n  border-radius: 10px;\n}\n.background {\n  background-color: white;\n  border-radius: 10px;\n}\n.profile-img {\n  border-radius: 10px;\n}\n\n/* .profile-img:hover {\n  transform: scale(1.1);\n} */\n.name-tab {\n  height: 100px;\n  position: absolute;\n  background-color: rgba(0, 0, 0, 0.8);\n  width: 95%;\n  margin-top: -100px;\n  border-bottom-left-radius: 10px;\n  border-bottom-right-radius: 10px;\n}\n.tourist-place-name {\n  background-color: rgba(0, 0, 0, 0.5);\n  height: 50px;\n  position: relative;\n  margin-top: -50px;\n  border-bottom-left-radius: 10px;\n  border-bottom-right-radius: 10px;\n  transition: 1.2s;\n}\n.tourist-place-name h5 {\n  color: #fff;\n}\n.container .cards .icon {\n\n  position: absolute;\n\n  top: 0;\n\n  left: 0;\n\n  width: 100%;\n\n  height: 100%;\n}\n.container .cards .icon .fa {\n\n  position: absolute;\n\n  top: 50%;\n\n  left: 50%;\n\n  transform: translate(-50%, -50%);\n\n  font-size: 80px;\n\n  color: #fff;\n}\n.container .cards .slide {\n\n  width: 100%;\n\n  height: 300px;\n\n  transition: 0.5s;\n}\n.container .cards .slide2 {\n\n  width: 100%;\n\n  height: 100px;\n\n  transition: 0.5s;\n}\n.container .cards .slide.slide1 {\n\n  position: relative;\n\n  display: flex;\n\n  justify-content: center;\n\n  align-items: center;\n\n  z-index: 1;\n\n  transition: .7s;\n\n  transform: translateY(100px);\n}\n.container .cards:hover .slide.slide1 {\n\n  transform: translateY(0px);\n}\n.container .cards:hover .tourist-place-name {\n\n  opacity: 0;\n  margin-top: 0px;\n  /* transform: rotate(360deg); */\n  /* width: 0px; */\n}\n.container .cards .slide.slide2 {\n\n  position: relative;\n\n  display: flex;\n\n  justify-content: center;\n\n  align-items: center;\n\n  padding: 20px;\n\n  box-sizing: border-box;\n\n  transition: .8s;\n\n  transform: translateY(-100px);\n\n  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);\n}\n.container .cards:hover .slide.slide2 {\n\n  transform: translateY(0);\n}\n.container .cards .slide.slide2::after {\n\n  content: \"\";\n\n  position: absolute;\n\n  width: 30px;\n\n  height: 4px;\n\n  bottom: 15px;\n\n  left: 50%;\n\n  left: 50%;\n\n  transform: translateX(-50%);\n\n  background: #2c73df;\n}\n.container .cards .slide.slide2 .content p {\n\n  margin: 0;\n\n  padding: 0;\n\n  text-align: center;\n\n  color: #414141;\n}\n.container .cards .slide.slide2 .content h3 {\n\n  margin: 0 0 10px 0;\n\n  padding: 0;\n\n  font-size: 24px;\n\n  text-align: center;\n\n  color: #414141;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TouristPlace.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/pages/TouristPlace.vue":
/*!*********************************************!*\
  !*** ./resources/js/pages/TouristPlace.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TouristPlace.vue?vue&type=template&id=13ebd07e& */ "./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e&");
/* harmony import */ var _TouristPlace_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TouristPlace.vue?vue&type=script&lang=js& */ "./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js&");
/* harmony import */ var _TouristPlace_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TouristPlace.vue?vue&type=style&index=0&lang=css& */ "./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _TouristPlace_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__.render,
  _TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/TouristPlace.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TouristPlace.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************!*\
  !*** ./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TouristPlace.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e&":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TouristPlace_vue_vue_type_template_id_13ebd07e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./TouristPlace.vue?vue&type=template&id=13ebd07e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/TouristPlace.vue?vue&type=template&id=13ebd07e& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c("h2", { staticClass: "p-3 font-weight-bold" }, [
      _vm._v("सुदूरपश्चिमको पर्यटक स्थल"),
    ]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "row" },
      _vm._l(_vm.touristAreas, function (item) {
        return _c("div", { key: item.id, staticClass: "col-lg-4 mt-4" }, [
          _c("div", { staticClass: "cards" }, [
            _c("div", { staticClass: "slide slide1" }, [
              _c("div", { staticClass: "content" }, [
                _c("div", { staticClass: "icon" }, [
                  _c("img", {
                    staticClass: "profile-img",
                    attrs: {
                      src: item.image_url,
                      alt: "img",
                      height: "100%",
                      width: "100%",
                    },
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "tourist-place-name" }, [
                    _c(
                      "h5",
                      {
                        staticClass:
                          "text-center text-uppercase text-monospace",
                      },
                      [_vm._v(_vm._s(item.name))]
                    ),
                  ]),
                ]),
              ]),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "slide slide2" }, [
              _c("div", { staticClass: "content" }, [
                _c("h3", { staticClass: "font-weight-bold text-uppercase" }, [
                  _vm._v(
                    "\n              " + _vm._s(item.name) + "\n            "
                  ),
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "text-monospace text-uppercase" }, [
                  _vm._v(_vm._s(item.address)),
                ]),
              ]),
            ]),
          ]),
        ])
      }),
      0
    ),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);