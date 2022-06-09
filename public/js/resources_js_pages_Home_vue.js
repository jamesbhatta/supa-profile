"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_Home_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-chartjs/legacy */ "./node_modules/vue-chartjs/legacy/index.js");
/* harmony import */ var chart_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! chart.js */ "./node_modules/chart.js/dist/chart.esm.js");
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


chart_js__WEBPACK_IMPORTED_MODULE_0__.Chart.register(chart_js__WEBPACK_IMPORTED_MODULE_0__.Title, chart_js__WEBPACK_IMPORTED_MODULE_0__.Tooltip, chart_js__WEBPACK_IMPORTED_MODULE_0__.Legend, chart_js__WEBPACK_IMPORTED_MODULE_0__.BarElement, chart_js__WEBPACK_IMPORTED_MODULE_0__.CategoryScale, chart_js__WEBPACK_IMPORTED_MODULE_0__.LinearScale, chart_js__WEBPACK_IMPORTED_MODULE_0__.ArcElement);
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Bar: vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_1__.Bar,
    Pie: vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_1__.Pie
  },
  data: function data() {
    return {
      infoCards: [],
      links: [{
        url: "/geographical-political-situation",
        name: "भौगोलिक तथा राजनीतिक अवस्था"
      }, {
        url: "demographic-status",
        name: "जनसांख्यिक स्थिति"
      }, {
        url: "/economical-situation",
        name: "आर्थिक अवस्था"
      }, {
        url: "/social-status",
        name: "सामाजिक अवस्था"
      }, {
        url: "/condition-of-physical-infrastructure",
        name: "भौतिक पूर्वाधारको अवस्था"
      }, {
        url: "/status-of-tourism-development",
        name: "पर्यटन विकासको अवस्था"
      }, {
        url: "/industry-business",
        name: "उद्योग ब्यवसाय"
      }, {
        url: "/state-of-agricultural-sector",
        name: "कृषि क्षेत्रको अवस्था"
      }, {
        url: "/forest-and-environment",
        name: "वन तथा वातावरण"
      }, {
        url: "/miscellaneous",
        name: "विविध"
      }]
    };
  },
  mounted: function mounted() {
    this.fetchInfoCards();
  },
  methods: {
    fetchInfoCards: function fetchInfoCards() {
      var _this = this;

      axios.get("/api/info-cards").then(function (response) {
        _this.infoCards = response.data;
      })["catch"](function (error) {
        return console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.navigation-grid[data-v-b3c5cf30] {\n  display: grid;\n  grid-template-columns: repeat(3, 1fr);\n  gap: 1.5rem;\n}\n.navigation-grid>a[data-v-b3c5cf30] {\n  background-color: #fff;\n  padding: 10px 15px;\n  border-radius: 6px;\n  min-height: 200px;\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  color: #2572bc;\n  font-size: 1.5rem;\n  font-weight: 600;\n  transition: 0.3s ease;\n}\n.navigation-grid>a[data-v-b3c5cf30]:hover {\n  background-color: #2572bc;\n  color: #fff;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/pages/Home.vue":
/*!*************************************!*\
  !*** ./resources/js/pages/Home.vue ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Home.vue?vue&type=template&id=b3c5cf30&scoped=true& */ "./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true&");
/* harmony import */ var _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Home.vue?vue&type=script&lang=js& */ "./resources/js/pages/Home.vue?vue&type=script&lang=js&");
/* harmony import */ var _Home_vue_vue_type_style_index_0_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& */ "./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "b3c5cf30",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Home.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Home.vue?vue&type=script&lang=js&":
/*!**************************************************************!*\
  !*** ./resources/js/pages/Home.vue?vue&type=script&lang=js& ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&id=b3c5cf30&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true&":
/*!********************************************************************************!*\
  !*** ./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_b3c5cf30_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=template&id=b3c5cf30&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=template&id=b3c5cf30&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "container py-4" }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-3 d-none d-md-block" }, [
        _c("nav", { staticClass: "dataset-links-card" }, [
          _c("div", { staticClass: "heading" }, [_vm._v("डाटासेटहरु")]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "content" },
            _vm._l(_vm.links, function (item, index) {
              return _c(
                "router-link",
                { key: index, staticClass: "link", attrs: { to: item.url } },
                [_c("span", [_vm._v(_vm._s(item.name))])]
              )
            }),
            1
          ),
        ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-9" }, [
        _vm.infoCards
          ? _c("section", { attrs: { id: "profile-summary" } }, [
              _c(
                "div",
                { staticClass: "info-grid" },
                _vm._l(_vm.infoCards, function (item) {
                  return _c(
                    "a",
                    {
                      key: item.id,
                      staticClass: "info-card",
                      class: item.card_theme,
                      attrs: { href: item.link || "#" },
                    },
                    [
                      _c("div", { staticClass: "value" }, [
                        _vm._v(_vm._s(item.value)),
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "label" }, [
                        _vm._v(_vm._s(item.label)),
                      ]),
                      _vm._v(" "),
                      item.icon
                        ? _c("div", { staticClass: "icon" }, [
                            _c("i", { class: item.icon }),
                          ])
                        : _vm._e(),
                    ]
                  )
                }),
                0
              ),
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticClass: "my-5" }),
        _vm._v(" "),
        _c("div", { staticClass: "my-5" }),
        _vm._v(" "),
        _c("div", { staticClass: "container-fluid" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-4 my-3" }, [
              _c("div", { staticClass: "chart-card" }, [
                _c("div", { staticClass: "chart-body" }, [
                  _c("div", { staticClass: "chart-title mb-3" }, [
                    _vm._v("भौगोलिक क्षेत्रगत क्षेत्रफल"),
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-md-12" },
                      [
                        _c("bar", {
                          attrs: {
                            "chart-options": { responsive: true },
                            "chart-data": {
                              labels: ["हिमाली", "पहाडी", "तराई"],
                              datasets: [
                                {
                                  backgroundColor: [
                                    "#007bff",
                                    "#dc3545",
                                    "green",
                                  ],
                                  data: [8393.11, 6748.78, 4857.39],
                                },
                              ],
                            },
                          },
                        }),
                      ],
                      1
                    ),
                  ]),
                ]),
              ]),
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "col-md-7 my-3" },
              [
                [
                  _c("div", { staticClass: "chart-card" }, [
                    _c("div", { staticClass: "chart-body" }, [
                      _c("div", { staticClass: "chart-title mb-3" }, [
                        _vm._v("जनसाङ्ख्यिक अवस्था"),
                      ]),
                      _vm._v(" "),
                      _vm._m(0),
                      _vm._v(" "),
                      _c("div", { staticClass: "row" }, [
                        _c(
                          "div",
                          { staticClass: "col-md-6" },
                          [
                            _c("Pie", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  // labels: ['पुरुष', 'महिला'],
                                  datasets: [
                                    {
                                      backgroundColor: ["#007bff", "#dc3545"],
                                      data: [1287997, 1423273],
                                    },
                                  ],
                                },
                              },
                            }),
                            _vm._v(" "),
                            _vm._m(1),
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "col-md-6 my-pie" },
                          [
                            _c("Pie", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  // labels: ['पुरुष', 'महिला'],
                                  datasets: [
                                    {
                                      backgroundColor: ["#007bff", "#dc3545"],
                                      data: [1217887, 1334630],
                                    },
                                  ],
                                },
                              },
                            }),
                            _vm._v(" "),
                            _vm._m(2),
                          ],
                          1
                        ),
                      ]),
                    ]),
                  ]),
                ],
              ],
              2
            ),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-12" },
              [
                [
                  _c("div", { staticClass: "col-md-12" }, [
                    _c("div", { staticClass: "chart-card" }, [
                      _c("div", { staticClass: "chart-body" }, [
                        _c("div", { staticClass: "chart-title mb-3" }, [
                          _vm._v("श्रम सम्बन्धि सूचक"),
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            { staticClass: "col-md-6 mybar" },
                            [
                              _c("bar", {
                                attrs: {
                                  "chart-options": { responsive: true },
                                  "chart-data": {
                                    labels: [
                                      "बेरोजगारी दर",
                                      "श्रम शक्ति सजभागिता दर",
                                      "जनसंख्या अनुपातमा रोजगार",
                                      "रोजगारको क्षेत्र",
                                      "रोजगार",
                                    ],
                                    datasets: [
                                      {
                                        label: "पुरुष",
                                        data: [11.5, 45.6, 40.4],
                                        backgroundColor: "#007bff",
                                      },
                                      {
                                        label: "महिला",
                                        data: [11.5, 15.7, 0],
                                        backgroundColor: "#dc3545",
                                      },
                                      {
                                        label: "औपचारिक",
                                        data: [0, 0, 0, 33.3, 14.8],
                                        backgroundColor: "pink",
                                      },
                                      {
                                        label: "अनौपचारिक",
                                        data: [0, 0, 0, 66.7, 85.2],
                                        backgroundColor: "#00663d",
                                      },
                                    ],
                                  },
                                },
                              }),
                              _vm._v(" "),
                              _c(
                                "label",
                                { staticClass: " col-12 text-center" },
                                [_vm._v("(सुदुरपश्चिममा)")]
                              ),
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "col-md-6" },
                            [
                              _c("bar", {
                                attrs: {
                                  "chart-options": { responsive: true },
                                  "chart-data": {
                                    labels: [
                                      "बेरोजगारी दर",
                                      "श्रम शक्ति सजभागिता दर",
                                      "जनसंख्या अनुपातमा रोजगार",
                                      "रोजगारको क्षेत्र",
                                      "रोजगार",
                                    ],
                                    datasets: [
                                      {
                                        label: "पुरुष",
                                        data: [10.3, 53.8, 48.3],
                                        backgroundColor: "#007bff",
                                      },
                                      {
                                        label: "महिला",
                                        data: [13.1, 26.3, 0],
                                        backgroundColor: "#dc3545",
                                      },
                                      {
                                        label: "औपचारिक",
                                        data: [0, 0, 0, 37.8, 15.4],
                                        backgroundColor: "pink",
                                      },
                                      {
                                        label: "अनौपचारिक",
                                        data: [0, 0, 0, 62.2, 84.6],
                                        backgroundColor: "#00663d",
                                      },
                                    ],
                                  },
                                },
                              }),
                              _vm._v(" "),
                              _c(
                                "label",
                                { staticClass: "col-12 text-center" },
                                [_vm._v("(नेपालमा)")]
                              ),
                            ],
                            1
                          ),
                        ]),
                      ]),
                    ]),
                  ]),
                ],
              ],
              2
            ),
          ]),
        ]),
      ]),
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "my-5" }),
    _vm._v(" "),
    _c("div", { staticClass: "row my-5" }, [
      _c(
        "div",
        { staticClass: "col-12" },
        [
          [
            _c("div", { staticClass: "col-md-12" }, [
              _c("div", {}, [
                _c("div", { staticClass: "chart-body" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-7" }, [
                      _c("div", { staticClass: "row" }, [
                        _c("div", { staticClass: "card" }, [
                          _c("div", { staticClass: "row" }, [
                            _vm._m(3),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("Pie", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      // labels: ['2068', '2078'],
                                      datasets: [
                                        {
                                          backgroundColor: [
                                            "#007bff",
                                            "#dc3545",
                                          ],
                                          data: [91.25, 90.49],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("लैङ्गिक अनुपात")]
                                ),
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("Pie", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      // labels: ['2068', '2078'],
                                      datasets: [
                                        {
                                          backgroundColor: [
                                            "#007bff",
                                            "#dc3545",
                                          ],
                                          data: [1.53, 0.58],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("जनसंख्या बृद्धिदर")]
                                ),
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("Pie", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      // labels: ['2068', '2078'],
                                      datasets: [
                                        {
                                          backgroundColor: [
                                            "#007bff",
                                            "#dc3545",
                                          ],
                                          data: [5.43, 4.62],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("औषत परिवारको आकार")]
                                ),
                              ],
                              1
                            ),
                          ]),
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "card my-3" }, [
                          _c("div", { staticClass: "row" }, [
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("bar", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      labels: ["2068"],
                                      datasets: [
                                        {
                                          backgroundColor: ["#007bff"],
                                          data: [3.56],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("आर्थित बृद्धिदर")]
                                ),
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("bar", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      labels: ["2068"],
                                      datasets: [
                                        {
                                          backgroundColor: ["#dc3545"],
                                          data: [685],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("प्रति ब्यक्ति आय")]
                                ),
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "col-md-4" },
                              [
                                _c("Pie", {
                                  attrs: {
                                    "chart-options": { responsive: true },
                                    "chart-data": {
                                      labels: ["सामुदायिक", "संस्थागत"],
                                      datasets: [
                                        {
                                          backgroundColor: [
                                            "#007bff",
                                            "#dc3545",
                                          ],
                                          data: [4044, 599],
                                        },
                                      ],
                                    },
                                  },
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  { staticClass: "col-12 text-center" },
                                  [_vm._v("शैक्षिक संस्था संख्या")]
                                ),
                              ],
                              1
                            ),
                          ]),
                        ]),
                      ]),
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-5" }, [
                      _c("div", { staticClass: "card" }, [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            { staticClass: "col-md-12" },
                            [
                              _c("bar", {
                                attrs: {
                                  "chart-options": { responsive: true },
                                  "chart-data": {
                                    labels: [
                                      "कृषि क्षेत्र",
                                      "उद्योग क्षेत्र",
                                      "सेवा क्षेत्र",
                                    ],
                                    datasets: [
                                      {
                                        backgroundColor: [
                                          "#007bff",
                                          "#dc3545",
                                          "green",
                                        ],
                                        data: [36.1, 13.2, 50.7],
                                      },
                                    ],
                                  },
                                },
                              }),
                              _vm._v(" "),
                              _c(
                                "label",
                                { staticClass: "col-12 text-center" },
                                [_vm._v("कूलगार्हस्थ उत्पादन")]
                              ),
                            ],
                            1
                          ),
                        ]),
                      ]),
                    ]),
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-12" }, [
                    _c("div", { staticClass: "card" }, [
                      _c("div", { staticClass: "row" }, [
                        _c(
                          "div",
                          { staticClass: "col-md-3" },
                          [
                            _c("Pie", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  labels: ["महिला", "पुरुष", "जम्मा"],
                                  datasets: [
                                    {
                                      backgroundColor: [
                                        "#007bff",
                                        "#dc3545",
                                        "green",
                                      ],
                                      data: [51.93, 76.4, 63.48],
                                    },
                                  ],
                                },
                              },
                            }),
                            _vm._v(" "),
                            _c("label", { staticClass: "col-12 text-center" }, [
                              _vm._v("साक्षरता दर"),
                            ]),
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "col-md-3" },
                          [
                            _c("bar", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  labels: [
                                    "अस्पताल",
                                    "प्रास्वाक",
                                    "स्वास्थ्य चौकी",
                                    "सा.स्वा.इकाई.",
                                    "आ.स्वा.के.",
                                    "पोषण गृह",
                                  ],
                                  datasets: [
                                    {
                                      backgroundColor: [
                                        "#007bff",
                                        "#dc3545",
                                        "green",
                                        "grey",
                                        "pink",
                                        "purple",
                                      ],
                                      data: [13, 16, 375, 135, 133],
                                    },
                                  ],
                                },
                              },
                            }),
                            _vm._v(" "),
                            _c("label", { staticClass: "col-12 text-center" }, [
                              _vm._v("स्वास्थ्य संस्था संख्या"),
                            ]),
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "col-md-3" },
                          [
                            _c("pie", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  labels: ["कालोपत्रे", "ग्राभेल", "कच्ची"],
                                  datasets: [
                                    {
                                      backgroundColor: [
                                        "#007bff",
                                        "#dc3545",
                                        "green",
                                      ],
                                      data: [234, 1158, 3954],
                                    },
                                  ],
                                },
                              },
                            }),
                            _vm._v(" "),
                            _c("label", { staticClass: "col-12 text-center" }, [
                              _vm._v("सडक"),
                            ]),
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "col-md-3" },
                          [
                            _c("bar", {
                              attrs: {
                                "chart-options": { responsive: true },
                                "chart-data": {
                                  labels: ["खना पकाउने", "वत्तीवाल्ने"],
                                  datasets: [
                                    {
                                      label: "दाउरा",
                                      data: [98.57],
                                      backgroundColor: "#007bff",
                                    },
                                    {
                                      label: "एलपिजीग्याँस",
                                      data: [1.07],
                                      backgroundColor: "#dc3545",
                                    },
                                    {
                                      label: "अन्यः",
                                      data: [0.36],
                                      backgroundColor: "pink",
                                    },
                                    {
                                      label: "विजुली",
                                      data: [0, 64.69],
                                      backgroundColor: "#00663d",
                                    },
                                    {
                                      label: "वैकल्पिक उर्जा",
                                      data: [0, 3],
                                      backgroundColor: "yellow",
                                    },
                                  ],
                                },
                              },
                            }),
                          ],
                          1
                        ),
                      ]),
                    ]),
                  ]),
                ]),
              ]),
            ]),
          ],
        ],
        2
      ),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-12" }, [
      _c("div", { staticClass: "row chart-datas" }, [
        _c("div", { staticClass: "male_num" }, [_c("div")]),
        _vm._v(" "),
        _c("div", { staticClass: "female_num" }, [_c("div")]),
      ]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center year" }, [
      _c("label", [_vm._v("2068")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center year" }, [
      _c("label", { attrs: { for: "" } }, [_vm._v("2078")]),
    ])
  },
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "container" }, [
      _c("div", { staticClass: "row col-12" }, [
        _c("div", { staticClass: "data2068 col-6" }, [_c("div")]),
        _vm._v(" "),
        _c("div", { staticClass: "data2078 col-6" }, [_c("div")]),
      ]),
    ])
  },
]
render._withStripped = true



/***/ })

}]);