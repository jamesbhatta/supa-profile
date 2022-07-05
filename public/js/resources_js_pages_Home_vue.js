"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_Home_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=script&lang=js& ***!
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      src: "https://sthaniya.gov.np/gis",
      myIframe: null,
      height: "300px"
    };
  },
  methods: {
    onLoad: function onLoad(frame) {
      this.myIframe = frame.contentWindow;
      this.height = this.myIframe.document.documentElement.scrollHeight + "px";
    },
    iframeLoaded: function iframeLoaded(frame) {}
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-chartjs/legacy */ "./node_modules/vue-chartjs/legacy/index.js");
/* harmony import */ var chartjs_plugin_datalabels__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! chartjs-plugin-datalabels */ "./node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.esm.js");
/* harmony import */ var chart_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! chart.js */ "./node_modules/chart.js/dist/chart.esm.js");
/* harmony import */ var _components_GisTile_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./../components/GisTile.vue */ "./resources/js/components/GisTile.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




chart_js__WEBPACK_IMPORTED_MODULE_1__.Chart.register(chart_js__WEBPACK_IMPORTED_MODULE_1__.Title, chart_js__WEBPACK_IMPORTED_MODULE_1__.Tooltip, chart_js__WEBPACK_IMPORTED_MODULE_1__.Legend, chart_js__WEBPACK_IMPORTED_MODULE_1__.BarElement, chart_js__WEBPACK_IMPORTED_MODULE_1__.CategoryScale, chart_js__WEBPACK_IMPORTED_MODULE_1__.LinearScale, chart_js__WEBPACK_IMPORTED_MODULE_1__.ArcElement);
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Bar: vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_3__.Bar,
    Pie: vue_chartjs_legacy__WEBPACK_IMPORTED_MODULE_3__.Pie,
    GisTile: _components_GisTile_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      infoCards: [],
      pieChartPlugins: [chartjs_plugin_datalabels__WEBPACK_IMPORTED_MODULE_0__["default"]],
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.ministries {\n  background-color: #e1e1dd;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& ***!
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.navigation-grid[data-v-b3c5cf30] {\n  display: grid;\n  grid-template-columns: repeat(3, 1fr);\n  gap: 1.5rem;\n}\n.navigation-grid>a[data-v-b3c5cf30] {\n  background-color: #fff;\n  padding: 10px 15px;\n  border-radius: 6px;\n  min-height: 200px;\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  color: #2572bc;\n  font-size: 1.5rem;\n  font-weight: 600;\n  transition: 0.3s ease;\n}\n.navigation-grid>a[data-v-b3c5cf30]:hover {\n  background-color: #2572bc;\n  color: #fff;\n}\n.ministry-card[data-v-b3c5cf30] {\n  border-radius: 10px;\n}\n.ministry-card[data-v-b3c5cf30]:hover {\n  transform: translateY(-5px) scale(1.005) translateZ(0);\n  box-shadow: 0 24px 36px rgba(0, 0, 0, 0.11),\n    0 24px 46px var(--box-shadow-color);\n  background-color: #2572bc;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_1_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_1_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_1_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/components/GisTile.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/GisTile.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./GisTile.vue?vue&type=template&id=12b20804& */ "./resources/js/components/GisTile.vue?vue&type=template&id=12b20804&");
/* harmony import */ var _GisTile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./GisTile.vue?vue&type=script&lang=js& */ "./resources/js/components/GisTile.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _GisTile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__.render,
  _GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/GisTile.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

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
/* harmony import */ var _Home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Home.vue?vue&type=style&index=0&lang=css& */ "./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _Home_vue_vue_type_style_index_1_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& */ "./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;



/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__["default"])(
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

/***/ "./resources/js/components/GisTile.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/GisTile.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GisTile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./GisTile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GisTile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

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

/***/ "./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_1_id_b3c5cf30_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/Home.vue?vue&type=style&index=1&id=b3c5cf30&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/components/GisTile.vue?vue&type=template&id=12b20804&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/GisTile.vue?vue&type=template&id=12b20804& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_GisTile_vue_vue_type_template_id_12b20804___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./GisTile.vue?vue&type=template&id=12b20804& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=template&id=12b20804&");


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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=template&id=12b20804&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/GisTile.vue?vue&type=template&id=12b20804& ***!
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
  return _c(
    "div",
    { staticStyle: { height: "1150px" } },
    [
      _c("vue-iframe", {
        attrs: {
          src: _vm.src,
          allow: "camera *; geolocation *; microphone *; autoplay *",
          name: "my-frame",
          width: "150px",
          height: _vm.height,
        },
        on: { load: _vm.onLoad, "iframe-load": _vm.iframeLoaded },
      }),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



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
  return _c(
    "div",
    { staticClass: "container py-4" },
    [
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
        ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("gis-tile"),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-3 my-3" }, [
          _c("div", { staticClass: "chart-card" }, [
            _c(
              "div",
              { staticClass: "chart-body" },
              [
                _c("div", { staticClass: "chart-title mb-3" }, [
                  _vm._v("शैक्षिक संस्था संख्या"),
                ]),
                _vm._v(" "),
                _c("pie", {
                  attrs: {
                    "chart-options": { responsive: true },
                    plugins: _vm.pieChartPlugins,
                    "chart-data": {
                      labels: ["सामुदायिक", "संस्थागत"],
                      datasets: [
                        {
                          backgroundColor: ["#007bff", "#dc3545"],
                          data: [4044, 599],
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
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3 my-3" }, [
          _c("div", { staticClass: "chart-card" }, [
            _c(
              "div",
              { staticClass: "chart-body" },
              [
                _c("div", { staticClass: "chart-title mb-3" }, [
                  _vm._v("भौगोलिक क्षेत्रगत क्षेत्रफल"),
                ]),
                _vm._v(" "),
                _c("pie", {
                  attrs: {
                    "chart-options": {
                      plugins: { legend: { display: false } },
                    },
                    "chart-data": {
                      labels: ["हिमाली", "पहाडी", "तराई"],
                      datasets: [
                        {
                          backgroundColor: ["#007bff", "#dc3545", "green"],
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
        _vm._v(" "),
        _c("div", { staticClass: "col-md-6 my-3" }, [
          _c("div", { staticClass: "chart-card" }, [
            _c("div", { staticClass: "chart-body" }, [
              _c("div", { staticClass: "chart-title mb-3" }, [
                _vm._v("जनसाङ्ख्यिक अवस्था"),
              ]),
              _vm._v(" "),
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-1" }),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-md-5" },
                  [
                    _c("Bar", {
                      attrs: {
                        "chart-options": { responsive: true },
                        "chart-data": {
                          labels: ["पुरुष", "महिला"],
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
                  { staticClass: "col-md-5 my-pie" },
                  [
                    _c("Bar", {
                      attrs: {
                        "chart-options": { responsive: true },
                        "chart-data": {
                          labels: ["पुरुष", "महिला"],
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
        ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row my-5" }, [
        _c("div", { staticClass: "col-md-6" }, [
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
                            backgroundColor: ["#007bff", "#dc3545"],
                            data: [91.25, 90.49],
                          },
                        ],
                      },
                    },
                  }),
                  _vm._v(" "),
                  _c("label", { staticClass: "col-12 text-center" }, [
                    _vm._v("लैङ्गिक अनुपात"),
                  ]),
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
                            backgroundColor: ["#007bff", "#dc3545"],
                            data: [1.53, 0.58],
                          },
                        ],
                      },
                    },
                  }),
                  _vm._v(" "),
                  _c("label", { staticClass: "col-12 text-center" }, [
                    _vm._v("जनसंख्या बृद्धिदर"),
                  ]),
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
                            backgroundColor: ["#007bff", "#dc3545"],
                            data: [5.43, 4.62],
                          },
                        ],
                      },
                    },
                  }),
                  _vm._v(" "),
                  _c("label", { staticClass: "col-12 text-center" }, [
                    _vm._v("औषत परिवारको आकार"),
                  ]),
                ],
                1
              ),
            ]),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-4" }),
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c("div", { staticClass: "card " }, [
            _c(
              "div",
              { staticClass: "col-11" },
              [
                _c("bar", {
                  attrs: {
                    "chart-options": {
                      plugins: { legend: { display: false } },
                    },
                    "chart-data": {
                      labels: [
                        "कृषि क्षेत्र",
                        "उद्योग क्षेत्र",
                        "सेवा क्षेत्र",
                      ],
                      datasets: [
                        {
                          backgroundColor: ["#007bff", "#dc3545", "green"],
                          data: [36.1, 13.2, 50.7],
                        },
                      ],
                    },
                  },
                }),
                _vm._v(" "),
                _c("label", { staticClass: "col-12 text-center" }, [
                  _vm._v("कूलगार्हस्थ उत्पादन"),
                ]),
              ],
              1
            ),
          ]),
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c("div", { staticClass: "card" }, [
            _c(
              "div",
              { staticClass: "col-11" },
              [
                _c("bar", {
                  attrs: {
                    "chart-options": {
                      plugins: { legend: { display: false } },
                    },
                    "chart-data": {
                      labels: ["महिला", "पुरुष", "जम्मा"],
                      datasets: [
                        {
                          backgroundColor: ["#007bff", "#dc3545", "green"],
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
          ]),
        ]),
        _vm._v(" "),
        _vm._m(4),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-3" }, [
          _c(
            "div",
            { staticClass: "card" },
            [
              _c("bar", {
                attrs: {
                  "chart-options": { plugins: { legend: { display: false } } },
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
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c(
            "div",
            { staticClass: "card" },
            [
              _c("pie", {
                attrs: {
                  "chart-options": { responsive: true },
                  "chart-data": {
                    labels: ["कालोपत्रे", "ग्राभेल", "कच्ची"],
                    datasets: [
                      {
                        backgroundColor: ["#007bff", "#dc3545", "green"],
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
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c(
            "div",
            { staticClass: "card" },
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
              _vm._v(" "),
              _c("label", { staticClass: "col-12 text-center" }, [
                _vm._v("उर्जा उपयोग"),
              ]),
            ],
            1
          ),
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c(
            "div",
            { staticClass: "card" },
            [
              _c("pie", {
                attrs: {
                  "chart-options": { responsive: true },
                  "chart-data": {
                    labels: ["प्रदेश", "प्रतिनिधिसभा"],
                    datasets: [
                      {
                        backgroundColor: ["#007bff", "#dc3545", "green"],
                        data: [32, 16],
                      },
                    ],
                  },
                },
              }),
              _vm._v(" "),
              _c("label", { staticClass: "col-12 text-center" }, [
                _vm._v("निर्वाचन क्षेत्र"),
              ]),
            ],
            1
          ),
        ]),
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "p-3" }, [
        _c("div", { staticClass: "row my-4 ministries p-3" }, [
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    "ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "/minister-profile" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "80px", width: "90px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/ios-filled/50/000000/library.png",
                          height: "50px",
                        },
                      }),
                      _vm._v("\n            हालको मन्त्रिपरिषद्\n          "),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    " ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "#" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "80px", width: "90px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-geography-back-to-school-xnimrodx-lineal-color-xnimrodx.png",
                          height: "50px",
                        },
                      }),
                      _vm._v("\n            हाम्रो भूगोल\n          "),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    " ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "#" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "80px", width: "90px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/color/48/000000/earth-planet.png",
                        },
                      }),
                      _vm._v("\n            पर्यटक स्थल\n          "),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    " ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "#" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "80px", width: "90px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/color/48/000000/domain--v1.png",
                        },
                      }),
                      _vm._v(
                        "\n            स्थानीय तहकाहरू वेबसाइट\n          "
                      ),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    " ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "#" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "60px", width: "70px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/color-glass/48/000000/book-shelf.png",
                        },
                      }),
                      _vm._v("\n            ई-पुस्तकालय\n          "),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-4 mt-3" },
            [
              _c(
                "router-link",
                {
                  staticClass:
                    " ministry-card card text-dark text-center py-5 font-weight-bold",
                  attrs: { to: "#" },
                },
                [
                  _c(
                    "span",
                    {
                      staticStyle: { "align-items": "center" },
                      attrs: { height: "60px", width: "70px" },
                    },
                    [
                      _c("img", {
                        attrs: {
                          src: "https://img.icons8.com/color/48/000000/myspace.png",
                        },
                      }),
                      _vm._v("\n            सामाजिक संजाल\n          "),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
        ]),
      ]),
    ],
    1
  )
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
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-12" }, [
      _c("div", { staticClass: "chart-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-7" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "card my-3" }, [
                _c("div", { staticClass: "row" }),
              ]),
            ]),
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-5" }),
        ]),
      ]),
    ])
  },
]
render._withStripped = true



/***/ })

}]);