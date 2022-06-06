"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_geographical-political-situations_Index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _charts_BarChart_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../charts/BarChart.vue */ "./resources/js/charts/BarChart.vue");
/* harmony import */ var _charts_PieChart_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../charts/PieChart.vue */ "./resources/js/charts/PieChart.vue");
/* harmony import */ var _components_DataViewer_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/DataViewer.vue */ "./resources/js/components/DataViewer.vue");
/* harmony import */ var _partials_Pardeshsavanamawali_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./partials/Pardeshsavanamawali.vue */ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    DataViewer: _components_DataViewer_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    BarChart: _charts_BarChart_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    PieChart: _charts_PieChart_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Pardeshsavanamawali: _partials_Pardeshsavanamawali_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      geographicalAreaData: {
        title: "सुदूरपश्चिम प्रदेशको भौगोलिक क्षेत्रगत क्षेत्रफल",
        labels: ["क्र.स.", "भौगोलिक क्षेत्र", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [[1, "हिमाली", 8393.11, 41.97], [2, "पहाडी", 6748.78, 33.75], [3, "तराई", 4857.39, 24.28], [{
          colspan: 2,
          value: "जम्मा"
        }, 19999.28, 100.00]]
      },
      geographicalAreaChartData: {
        labels: ["हिमाली", "पहाडी", "तराई"],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f"],
          data: [8393.11, 6748.78, 4857.39]
        }]
      },
      districtWiseAreaOfStateData: {
        title: "प्रदेशको जिल्लागत क्षेत्रफल",
        labels: ["क्र.स.", "जिल्ला", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [[1, "कैलाली", 3247, 16.23], [2, "कञ्चनपुर", 1610, 8.05], [3, "डोटी", 2081, 10.4], [4, "अछाम", 1692, 8.46], [5, "बझाङ", 3422, 17.11], [6, "बाजुरा", 2188, 10.94], [7, "दार्चुला", 2782.28, 13.91], [8, "बैतडी", 1482, 7.41], [9, "डडेलधुरा", 1495, 7.48], ["", "सुदूरपश्चिम", 19999.28, 100]]
      },
      districtWiseAreaOfStateChartData: {
        labels: ["कैलाली", "कञ्चनपुर", "डोटी", "अछाम", "बझाङ", "बाजुरा", "दार्चुला", "बैतडी", "डडेलधुरा", "सुदूरपश्चिम"],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen', '#5e4b9c', "#5e4b9c"],
          data: ['3247', '1610', '2081', '1692', '3422', '2188', '2782', '1482', '1495']
        }]
      },
      // 2.5
      vuupyogkoData: {
        title: "भू – उपयोगको अवस्था",
        labels: ["क्र.स.", "क्षेत्र", "नेपालको क्षेत्रफल (हे.हजारमा)", "सुदूरपश्चिमको क्षेत्रफल (हे.हजारमा)"],
        data: [["1", "खेती गरिएको जमिन", 3031, 318 + "(" + 10.3 + "प्रतिशत)"], ["2", "खेती नगरिएको जमिन", 1030, 39 + "(" + 3.8 + "प्रतिशत)"], ["3", "वन जंगल", 5828, 297 + "(" + 5.1 + "प्रतिशत)"], ["4", "चरन", 1766, ""], ["5", "पानी", 383, ""], ["6", "अन्य", 2620, ""], [{
          colspan: 2,
          value: "जम्मा"
        }, 14718, ""]]
      },
      vuupyogkoChartData: {
        labels: ["खेती गरिएको जमिन", "खेती नगरिएको जमिन", "वन जंगल", "चरन", "पानी", "अन्य"],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink'],
          data: ['3031', '1030', '5828', '1766', '383', '2620']
        }]
      },
      // 2.6
      sthaniyetahapopulation: {
        title: "स्थानीय तहको जिल्लागत संख्या",
        labels: ["क्र.स.", "जिल्ला", "उप महानगर", "नगरपालिका", "गाउँपालिका", "वडा संख्या"],
        data: [[1, "दार्चुला", "", 2, 7, 61], [2, "बैतडी", "", 4, 6, 84], [3, "डडेलधुरा", "", 2, 5, 52], [4, "कञ्चनपुर", "", 7, 2, 92], [5, "बझाङ", "", 2, 10, 94], [6, "बाजुरा", "", 4, 5, 69], [7, "डोटी", "", 2, 7, 65], [8, "अछाम", "", 4, 6, 91], [9, "कैलाली", 1, 6, 6, 126], [{
          colspan: 2,
          value: "सुदूरपश्चिम जम्मा"
        }, 1, 33, 54, 734], [{
          colspan: 2,
          value: "नेपाल"
        }, 11, 276, 460, 6743], [{
          colspan: 2,
          value: "सुदूरपश्चिमले ओगटेको अंश (प्रतिशत)"
        }, 9.09, 11.95, 11.73, 10.88]]
      },
      // 2.7
      nirbachanchhetra: {
        title: " प्रदेशमा भौगोलिक विभाजन अनुसार निर्वाचन क्षेत्रको विवरण",
        labels: ["क्र.स.", "भौगोलिक क्षेत्र", "प्रतिनिधि सभा", "प्रदेश सभा", "प्रतिशत"],
        data: [["1", "हिमाल", 3, 6, 18.75], ["2", "पहाड", 5, 10, 31.25], ["3", "तराई", 8, 16, 50], [{
          colspan: 2,
          value: "सुदूरपश्चिम जम्मा"
        }, 16, 32, 100]]
      },
      nirbachanchhetraChartData: {
        labels: ["हिमाल", "पहाड", "तराई"],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f"],
          data: ["18.75", "31.25", "50"]
        }]
      },
      // 2.8
      jillanirbachanchhetra: {
        title: "प्रदेशका जिल्लाहरुमा रहेका निर्वाचन क्षेत्रको विवरण",
        labels: ["क्र.स.", "जिल्ला", "प्रतिनिधि सभा", "प्रदेश सभा"],
        data: [["1", "दार्चुला", 1, 2], ["2", "बैतडी", 1, 2], ["3", "डडेलधुरा", 1, 2], ["4", "कञ्चनपुर", 3, 6], ["5", "बझाङ", 1, 2], ["6", "बाजुरा", 1, 2], ["7", "डोटी", 1, 2], ["8", "अछाम", 2, 4], ["9", "कैलाली", 5, 10], [{
          colspan: 2,
          value: "सुदूरपश्चिम जम्मा"
        }, 16, 32], [{
          colspan: 2,
          value: "नेपाल"
        }, 165, 330], [{
          colspan: 2,
          value: "सुदूरपश्चिमले ओगटेको अंश(प्रतिशत)"
        }, 9.69, 9.69]]
      },
      jillanirbachanchhetraChartData: {},
      parmukhharukonaamwali: {
        title: " हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति",
        labels: ["क्र.स.", "प्रदेश प्रमुख", "देखि", "सम्म"],
        data: [[1, "मा. मोहनराज मल्ल", "२०७४/१०/०३", "२०७६/०७/१७"], [2, "मा.शर्मिला कुमारी पन्त", "२०७६/०७/१८", "२०७८/०१/२०"], [3, "मा.गंगा प्रसाद यादव", "२०७८/०१/२०", "२०७८/०७/२३"], [4, "मा.देवराज जोशी", "२०७८/०७/२३", ""]]
      },
      // 2.10
      pahilomantriparisadh: {
        title: "सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्",
        labels: ["क्र.स.", "नाम थर", "मन्त्रालय", "दल"],
        data: [[1, "मा.त्रिलोचन भट्ट", "मुख्यमन्त्री", "नेकपा (माओवादी केन्द्र)"], [2, "मा.प्रकाशबहादुर शाह", "आन्तरिक मामिला तथा कानुन", "नेकपा एमाले"], [3, "मा.दीर्घबहादुर सोडारी", "सामाजिक विकास", "नेकपा एमाले"], [4, "मा.पठानसिंह बोहरा", "भौतिक योजना तथा विकास", "नेकपा एमाले"], [5, "मा.माया भट्ट", "उद्योग, पर्यटन वन तथा वातावरण", "नेकपा एमाले"], [6, "मा.झपट बहादुर बोहरा", "आर्थिक मामिला तथा योजना", "नेकपा (माओवादी केन्द्र)"], [7, "मा.बिनिता चौधरी", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"]]
      },
      // 2.11
      supaparisadh: {
        title: "सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्",
        labels: ["क्र.स.", "नाम थर", "पद", "मन्त्रालय", "दल"],
        data: [[1, "मा.त्रिलोचन भट्ट", "मुख्यमन्त्री", "मुख्यमन्त्री तथा मन्त्रीपरिषद्", "नेकपा (माओवादी केन्द्र)"], [2, "मा.दीर्घबहादुर सोडारी", "मन्त्री", "भौतिक पूर्वाधार विकास", "नेकपा (एकीकृत समाजवादी)"], [3, "मा.मानबहादुर धामी", "मन्त्री", "उद्योग,पर्यटन वन तथा वातावरण", "नेकपा (माओवादी केन्द्र)"], [4, "मा.तारा लामा तामाङ", "मन्त्री", "आर्थिक मामिला तथा योजना", "नेकपा (एकीकृत समाजवादी)"], [5, "मा.लालबहादुर खड्का", "मन्त्री", "सामाजिक विकास", "	नेकपा एमाले"], [6, "मा.बिनितादेवी चौधरी", "मन्त्री", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"], [7, "मा.पूर्णा जोशी", "मन्त्री", "आन्तरिक मामिला तथा कानुन", "	नेकपा (एकीकृत समाजवादी)"], [8, "मा.चुनकुमारी चौधरी", "राज्यमन्त्री", "भौतिक योजना तथा विकास", "नेकपा (एकीकृत समाजवादी)"], [9, "मा.मना कुमारी साउँद", "राज्यमन्त्री", "सामाजिक विकास", "नेकपा (एकीकृत समाजवादी)"], [10, "मा.माया तामाङ", "राज्यमन्त्री", "आर्थिक मामिला तथा योजना", "नेकपा (एकीकृत समाजवादी)"], [11, "मा.मानबहादुर सुनार", "राज्यमन्त्री", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"]]
      },
      // 2.12
      pardeshsavanamawali: {
        title: "प्रदेश सभा सदस्यहरुको नामावली",
        labels: ["क्र.स.", "नाम थर", "निर्वाचन क्षेत्र", "हालको राजनीतिक दल"],
        data: [["1", "अर्जुन बहादुर थापा", "बझाङ १-१", "सभामुख"], ["2", "निर्मला बडाल जोशी", "समानुपातिक", "नेकपा माओवादी केन्द्र"], ["3", "अक्कलबहादुर रावल", "अछाम २-१", "नेकपा माओवादी केन्द्र"], ["4", "अर्चना गहतराज", "समानुपातिक", "नेकपा एमाले"], ["5", "अमर बहादुर साउँद", "कैलाली ३-२", "नेकपा (एकीकृत समाजवादी)"], ["6", "अम्बी कुमारी थापा", "समानुपातिक", "नेपाली कांग्रेस"], ["7", "उमा कुमारी बादी", "समानुपातिक", "नेपाली कांग्रेस"], ["8", "कर्णबहादुर मल्ल", "डडेलधुरा १-२", "नेपाली कांग्रेस"], ["9", "कुन्ती जोशी", "समानुपातिक", "नेकपा माओवादी केन्द्र"], ["10", "कुमारी नन्दा बम", "समानुपातिक", "नेपाली कांग्रेस"], ["11", "कुलबीर चौधरी", "कञ्चनपुर १-२", "नेकपा (एकीकृत समाजवादी)"], ["12", "कृष्ण बहादुर चौधरी", "कैलाली १-१", "लोकतान्त्रिक समाजवादी पार्टी नेपाल"], ["13", "कृष्णराज सुवेदी", "कैलाली ४-२", "नेकपा एमाले"], ["14", "गेल्बु सिं बोहरा", "दार्चुला १-१", "नेकपा एमाले"], ["15", "गोबिन्द राज बोहरा", "समानुपातिक", "नेपाली कांग्रेस"], ["16", "चुन कुमारी चौधरी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], ["17", "टेक बहादुर रैका आउजी", "समानुपातिक", "नेपाली कांग्रेस"], ["18", "डिल्ली राज पन्त", "कैलाली ५-२", "नेपाली कांग्रेस"], ["19", "तारा लामा तामाङ्ग", "कञ्चनपुर १-१", "नेकपा (एकीकृत समाजवादी)"], ["20", "दिब्यश्वरी शाह", "समानुपातिक", "नेपाली कांग्रेस"], ["21", "दीर्घबहादुर सोडारी", "कैलाली ४-१", "नेकपा (एकीकृत समाजवादी)"], ["22", "दुर्गा कुमारी कामी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], ["23", "देबकी मल्ल थापा", "बझाङ १-२", "नेकपा माओवादी केन्द्र"], ["24", "देबराज पाठक", "समानुपातिक", "नेपाली कांग्रेस"], ["25", "नन्द बहादुर साउँद", "कैलाली २-२", "नेकपा माओवादी केन्द्र"], ["26", "नेपालु चौधरी", "कैलाली ५-१", "नेकपा एमाले"], ["27", "पठानसिंह बोहरा", "डडेलधुरा १-१", "नेकपा एमाले"], ["28", "पूर्णा जोशी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], ["29", "प्रकाश बहादुर शाह", "बाजुरा १-२", "नेकपा एमाले"], ["30", "प्रकाश रावल", "कञ्चनपुर ३ -१", "नेकपा (एकीकृत समाजवादी)"], ["31", "प्रेम प्रकाश भट्ट", "बैतडी १ -१", "नेकपा माओवादी केन्द्र"], ["32", "बलदेव रेग्मी", "बाजुरा १-१", "नेकपा एमाले"], ["33", "बल बहादुर सोडारी", "अछाम २-२", "नेकपा (एकीकृत समाजवादी)"], ["34", "भरत बहादुर खड्का", "डोटी १ -१", "नेपाली कांग्रेस"], ["35", "मना कुमारी साउँद", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], ["36", "महेश दत्त जोशी", "कञ्चनपुर २ -१", "नेकपा माओवादी केन्द्र"], ["37", "मान बहादुर धामी", "दार्चुला १ -२", "नेकपा माओवादी केन्द्र"], ["38", "मान बहादुर सुनार", "कञ्चनपुर ३ -२", "नेकपा माओवादी केन्द्र"], ["39", "माया तामाङ्ग बोहरा", "कञ्चनपुर १ -१", "नेकपा (एकीकृत समाजवादी)"], ["40", "माया भट्ट", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], ["41", "मालमती कुमारी राना थारु", "समानुपातिक", "जनता समाजवादी पार्टी नेपाल"], ["42", "रण बहादुर रावल", "कैलाली १ -२", "नेपाली कांग्रेस"], ["43", "रतन बहादुर थापा", "कैलाली २-१", "नेकपा एमाले"], ["44", "लाल बहादुर खड्का", "कञ्चनपुर २ -२", "नेकपा (एकीकृत समाजवादी)"], ["45", "लिलाधर भट्ट", "बैतडी १ -२", "नेकपा एमाले"], ["46", "विनिता देवी चौधरी", "समानुपातिक", "नेकपा माओवादी केन्द्र"], ["47", "विरभान चौधरी", "कैलाली ३-१", "नेकपा माओवादी केन्द्र"], ["48", "शान्ती नेपाली", "समानुपातिक", "नेकपा माओवादी केन्द्र"], ["49", "श्यामलाल राना थारु", "समानुपातिक", "नेपाली कांग्रेस"], [50, "शुसिला बुढाथोकी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"], [51, "हर्क बहादुर कुँवर", "अछाम १-१", "नेकपा एमाले"], [52, "त्रिलोचन भट्ट", "डोटी १ -२", "नेकपा माओवादी केन्द्र"], ["", "", "अछाम १-२", "हाल रिक्त रहेको"]]
      },
      // 2.6
      districtWiseNumberOfLocalLevel: {
        title: "स्थानीय तहको जिल्लागत संख्या",
        labels: ["क्र.स.", "जिल्ला", "उप महानगर", "नगरपालिका", "गाउँपालिका", "वडा संख्या"],
        data: [[6, "दार्चुला", "", 2, 7, 61], [6, "बैतडी", "", 4, 6, 84], [6, "डडेलधुरा", "", 2, 5, 52], [2, "कञ्चनपुर", "", 7, 2, 92], [5, "बझाङ", "", 2, 10, 94], [6, "बाजुरा", "", 4, 5, 69], [3, "डोटी", "", 2, 7, 65], [4, "अछाम", "", 4, 6, 91], [1, "कैलाली", 1, 6, 6, 126], [{
          colspan: 2,
          value: "सुदूरपश्चिम जम्मा"
        }, 1, 33, 54, 734], [{
          colspan: 2,
          value: "नेपाल"
        }, 11, 276, 460, 6743], [{
          colspan: 2,
          value: "सुदूरपश्चिमले ओगटेको अंश (प्रतिशत)"
        }, 9.09, 11.95, 11.73, 10.88]]
      }
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      territorialGeographicalAreaData: {
        title: "प्रदेशगत भौगोलिक क्षेत्रफल",
        labels: ["क्र.स.", "प्रदेश", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [[1, "प्रदेश १", 25905, 17.55], [2, "मधेश", 9661, 6.54], [3, "बागमती", 20300, 13.75], [4, "गण्डकी", 22585, 15.30], [5, "लुम्बीनी", 17318, 11.73], [6, "कर्णाली", 31873, 21.56], [7, "सुदूरपश्चिम", 19999.25, 13.55], [{
          colspan: 2,
          value: "जम्मा"
        }, 147641.28, 100]]
      },
      territorialGeographicalAreaPieChartData: {
        labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", 'लुम्बीनी', 'कर्णाली', 'सुदूरपश्चिम'],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen'],
          data: ['17.5', '6.54', '13.75', '15.3', '11.73', '21.56', '13.55']
        }]
      },
      territorialGeographicalAreaChartData: {
        labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", 'लुम्बीनी', 'कर्णाली', 'सुदूरपश्चिम'],
        datasets: [{
          backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen'],
          data: ['25905', '9661', '20300', '22585', '17318', '31873', '19999.25']
        }]
      }
    };
  }
});

/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/Index.vue":
/*!************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/Index.vue ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=3886a01a&scoped=true& */ "./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "3886a01a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/geographical-political-situations/Index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue":
/*!***********************************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae& */ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae&");
/* harmony import */ var _Pardeshsavanamawali_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Pardeshsavanamawali.vue?vue&type=script&lang=js& */ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Pardeshsavanamawali_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__.render,
  _Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Pardeshsavanamawali_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Pardeshsavanamawali.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Pardeshsavanamawali_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true&":
/*!*******************************************************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true& ***!
  \*******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_3886a01a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=template&id=3886a01a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true&");


/***/ }),

/***/ "./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae&":
/*!******************************************************************************************************************************!*\
  !*** ./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae& ***!
  \******************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Pardeshsavanamawali_vue_vue_type_template_id_bacaf5ae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/Index.vue?vue&type=template&id=3886a01a&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "container py-5" },
    [
      _c("h1", { staticClass: "page-title" }, [
        _vm._v("भौगोलिक तथा राजनीतिक अवस्था"),
      ]),
      _vm._v(" "),
      _c(
        "data-viewer",
        { attrs: { data: _vm.geographicalAreaData } },
        [
          _c("template", { slot: "chart" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("pie-chart", {
                    attrs: {
                      "chart-data": _vm.geographicalAreaChartData,
                      width: 200,
                      height: 200,
                    },
                  }),
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("bar-chart", {
                    attrs: {
                      "chart-data": _vm.geographicalAreaChartData,
                      width: 200,
                      height: 200,
                    },
                  }),
                ],
                1
              ),
            ]),
          ]),
        ],
        2
      ),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("pardeshsavanamawali"),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c(
        "data-viewer",
        { attrs: { data: _vm.districtWiseAreaOfStateData } },
        [
          _c("template", { slot: "chart" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("pie-chart", {
                    attrs: {
                      "chart-data": _vm.districtWiseAreaOfStateChartData,
                    },
                  }),
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("bar-chart", {
                    attrs: {
                      "chart-data": _vm.districtWiseAreaOfStateChartData,
                    },
                  }),
                ],
                1
              ),
            ]),
          ]),
        ],
        2
      ),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c(
        "data-viewer",
        { attrs: { data: _vm.vuupyogkoData } },
        [
          _c("template", { slot: "chart" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("pie-chart", {
                    attrs: { "chart-data": _vm.vuupyogkoChartData },
                  }),
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("bar-chart", {
                    attrs: { "chart-data": _vm.vuupyogkoChartData },
                  }),
                ],
                1
              ),
            ]),
          ]),
        ],
        2
      ),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c(
        "data-viewer",
        { attrs: { data: _vm.sthaniyetahapopulation } },
        [
          _c("template", { slot: "thead-top" }, [
            _c("tr", [
              _c("th", { attrs: { colspan: "2" } }),
              _vm._v(" "),
              _c(
                "th",
                {
                  staticClass: "bg-light text-center font-weight-bold",
                  attrs: { colspan: "4" },
                },
                [_vm._v("स्थानीय तह विवरण")]
              ),
            ]),
          ]),
        ],
        2
      ),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c(
        "data-viewer",
        { attrs: { data: _vm.nirbachanchhetra } },
        [
          _c("template", { slot: "chart" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("pie-chart", {
                    attrs: { "chart-data": _vm.nirbachanchhetraChartData },
                  }),
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-6" },
                [
                  _c("bar-chart", {
                    attrs: { "chart-data": _vm.nirbachanchhetraChartData },
                  }),
                ],
                1
              ),
            ]),
          ]),
        ],
        2
      ),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("data-viewer", { attrs: { data: _vm.jillanirbachanchhetra } }),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("data-viewer", { attrs: { data: _vm.parmukhharukonaamwali } }),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("data-viewer", { attrs: { data: _vm.pahilomantriparisadh } }),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("data-viewer", { attrs: { data: _vm.supaparisadh } }),
      _vm._v(" "),
      _c("div", { staticClass: "my-5" }),
      _vm._v(" "),
      _c("data-viewer", { attrs: { data: _vm.pardeshsavanamawali } }),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae&":
/*!*********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/geographical-political-situations/partials/Pardeshsavanamawali.vue?vue&type=template&id=bacaf5ae& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************/
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
    "data-viewer",
    { attrs: { data: _vm.territorialGeographicalAreaData } },
    [
      _c("template", { slot: "chart" }, [
        _c("div", { staticClass: "row" }, [
          _c(
            "div",
            { staticClass: "col-md-6" },
            [
              _c("pie-chart", {
                attrs: {
                  "chart-data": _vm.territorialGeographicalAreaPieChartData,
                  width: 200,
                  height: 200,
                },
              }),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-6" },
            [
              _c("bar-chart", {
                attrs: {
                  "chart-data": _vm.territorialGeographicalAreaChartData,
                  width: 200,
                  height: 200,
                },
              }),
            ],
            1
          ),
        ]),
      ]),
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);