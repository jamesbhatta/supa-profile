<template>
  <div class="container-fluid my-div">


    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 side-client-menus">
          <div style="height: 80px;"></div>
          <div class="list-set">
            <ul class="table-list " style="overflow: auto;">
              <li class="my-3">
                <a href="#table_1">सुदूरपश्चिम प्रदेशको भौगोलिक
                  क्षेत्रगत क्षेत्रफल</a>
              </li>

              <li class="my-3">
                <a href="#table_2">प्रदेशगत भौगोलिक
                  क्षेत्रफल</a>
              </li>

              <li class="my-3">
                <a href="#table_3">प्रदेशको जिल्लागत
                  क्षेत्रफल</a>
              </li>

              <li class="my-3">
                <a href="#table_4">भू – उपयोगको अवस्था</a>
              </li>

              <li class="my-3">
                <a href="#table_5">स्थानीय तहको जिल्लागत
                  संख्या</a>
              </li>

              <li class="my-3">
                <a href="#table_6">प्रदेशमा भौगोलिक विभाजन
                  अनुसार निर्वाचन क्षेत्रको विवरण</a>
              </li>

              <li class="my-3">
                <a href="#table_7">प्रदेशका जिल्लाहरुमा रहेका
                  निर्वाचन क्षेत्रको विवरण</a>
              </li>

              <li class="my-3">
                <a href="#table_8">हालसम्म भएका प्रदेश
                  प्रमुखहरुको नामावली र मिति</a>
              </li>

              <li class="my-3">
                <a href="#table_9">सुदूरपश्चिम प्रदेशको पहिलो
                  मन्त्रिपरिषद्</a>
              </li>

              <li class="my-3">
                <a href="#table_10">सुदूरपश्चिम प्रदेशमा हालको
                  मन्त्रिपरिषद्</a>
              </li>

              <li class="my-3">
                <a href="#table_11">प्रदेश सभा सदस्यहरुको
                  नामावली</a>
              </li>

            </ul>
          </div>
        </div>
        <!-- ================================== -->
        <div class="col-xl-8 col-lg-7 col-md-12">
          <div class="container">
            <h1 class="page-title">भौगोलिक तथा राजनीतिक अवस्था</h1>

            <data-viewer :data="geographicalAreaData">
              <template slot="chart">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <pie-chart :chart-data="geographicalAreaChartData"></pie-chart>
                  </div>
                  <!-- <div class="col-md-6">
                    <bar-chart :chart-data="geographicalAreaChartData" :width="200" :height="200"></bar-chart>
                  </div> -->
                </div>
              </template>
            </data-viewer>

            <pardeshsavanamawali></pardeshsavanamawali>
            <div class="my-5"></div>

            <data-viewer :data="districtWiseAreaOfStateData">
              <template slot="chart">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <pie-chart :chart-data="districtWiseAreaOfStateChartData"></pie-chart>
                  </div>
                  <!-- <div class="col-md-6">
                    <bar-chart :chart-data="districtWiseAreaOfStateChartData"></bar-chart>
                  </div> -->
                </div>
              </template>
            </data-viewer>

            <data-viewer :data="vuupyogkoData">
              <template slot="chart">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <pie-chart :chart-data="vuupyogkoChartData"></pie-chart>
                  </div>
                  <!-- <div class="col-md-6">
                    <bar-chart :chart-data="vuupyogkoChartData"></bar-chart>
                  </div> -->
                </div>
              </template>
            </data-viewer>

            <data-viewer :data="sthaniyetahapopulation">
              <template slot="thead-top">
                <tr>
                  <th colspan="2"></th>
                  <th colspan="4" class="bg-light text-center font-weight-bold">स्थानीय तह विवरण</th>
                </tr>
              </template>
            </data-viewer>

            <data-viewer :data="nirbachanchhetra">
              <template slot="chart">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <pie-chart :chart-data="nirbachanchhetraChartData"></pie-chart>
                  </div>

                  <!-- <div class="col-md-6">
                    <bar-chart :chart-data="nirbachanchhetraChartData"></bar-chart>
                  </div> -->
                </div>
              </template>
            </data-viewer>

            <data-viewer :data="jillanirbachanchhetra"></data-viewer>

            <data-viewer :data="parmukhharukonaamwali"></data-viewer>

            <data-viewer :data="pahilomantriparisadh"></data-viewer>

            <data-viewer :data="supaparisadh"></data-viewer>

            <data-viewer :data="pardeshsavanamawali"></data-viewer>
            <data-viewer :data="districtWiseNumberOfLocalLevel"></data-viewer>

          </div>
        </div>
      </div>

    </div>
  </div>

</template>

<script>
import BarChart from "../../charts/BarChart.vue";
import PieChart from "../../charts/PieChart.vue";
import DataViewer from "../../components/DataViewer.vue";
import Pardeshsavanamawali from "./partials/Pardeshsavanamawali.vue";

export default {
  components: { DataViewer, BarChart, PieChart, Pardeshsavanamawali },
  data() {
    return {
      currentUrl: {
        cUrl: window.location.pathname,
      },
      geographicalAreaData: {
        id: "table_1",
        title: "सुदूरपश्चिम प्रदेशको भौगोलिक क्षेत्रगत क्षेत्रफल",
        labels: ["क्र.स.", "भौगोलिक क्षेत्र", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [
          [1, "हिमाली", 8393.11, 41.97],
          [2, "पहाडी", 6748.78, 33.75],
          [3, "तराई", 4857.39, 24.28],
          [{
            colspan: 2,
            value: "जम्मा",
          }, 19999.28, 100.00],
        ],
      },
      geographicalAreaChartData: {
        labels: ["हिमाली", "पहाडी", "तराई"],
        datasets: [
          {
            backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f"],
            data: [8393.11, 6748.78, 4857.39],
          },
        ],
      },


      districtWiseAreaOfStateData: {
        id: "table_3",
        title: "प्रदेशको जिल्लागत क्षेत्रफल",
        labels: ["क्र.स.", "जिल्ला", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [
          [1, "कैलाली", 3247, 16.23],
          [2, "कञ्चनपुर", 1610, 8.05],
          [3, "डोटी", 2081, 10.4],
          [4, "अछाम", 1692, 8.46],
          [5, "बझाङ", 3422, 17.11],
          [6, "बाजुरा", 2188, 10.94],
          [7, "दार्चुला", 2782.28, 13.91],
          [8, "बैतडी", 1482, 7.41],
          [9, "डडेलधुरा", 1495, 7.48],
          ["", "सुदूरपश्चिम", 19999.28, 100],
        ],
      },
      districtWiseAreaOfStateChartData: {
        labels: ["कैलाली", "कञ्चनपुर", "डोटी", "अछाम", "बझाङ", "बाजुरा", "दार्चुला", "बैतडी", "डडेलधुरा", "सुदूरपश्चिम",],
        datasets: [
          {
            backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen', '#5e4b9c', "#5e4b9c"],
            data: ['3247', '1610', '2081', '1692', '3422', '2188', '2782', '1482', '1495',],
          }
        ]
      },
      // 2.5
      vuupyogkoData: {
        id: "table_4",
        title: "भू – उपयोगको अवस्था",
        labels: ["क्र.स.", "क्षेत्र", "नेपालको क्षेत्रफल (हे.हजारमा)", "सुदूरपश्चिमको क्षेत्रफल (हे.हजारमा)"],
        data: [
          ["1", "खेती गरिएको जमिन", 3031, 318 + "(" + 10.3 + "प्रतिशत)"],
          ["2", "खेती नगरिएको जमिन", 1030, 39 + "(" + 3.8 + "प्रतिशत)"],
          ["3", "वन जंगल", 5828, 297 + "(" + 5.1 + "प्रतिशत)"],
          ["4", "चरन", 1766, ""],
          ["5", "पानी", 383, ""],
          ["6", "अन्य", 2620, ""],
          [
            {
              colspan: 2,
              value: "जम्मा",
            },
            14718,
            "",
          ],
        ],
      },
      vuupyogkoChartData: {
        labels: ["खेती गरिएको जमिन", "खेती नगरिएको जमिन", "वन जंगल", "चरन", "पानी", "अन्य"],
        datasets: [
          {
            backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink'],
            data: ['3031', '1030', '5828', '1766', '383', '2620'],
          }
        ]
      },
      // 2.6
      sthaniyetahapopulation: {
        id: "table_5",
        title: "स्थानीय तहको जिल्लागत संख्या",
        labels: ["क्र.स.", "जिल्ला", "उप महानगर", "नगरपालिका", "गाउँपालिका", "वडा संख्या"],
        data: [
          [1, "दार्चुला", "", 2, 7, 61],
          [2, "बैतडी", "", 4, 6, 84],
          [3, "डडेलधुरा", "", 2, 5, 52],
          [4, "कञ्चनपुर", "", 7, 2, 92],
          [5, "बझाङ", "", 2, 10, 94],
          [6, "बाजुरा", "", 4, 5, 69],
          [7, "डोटी", "", 2, 7, 65],
          [8, "अछाम", "", 4, 6, 91],
          [9, "कैलाली", 1, 6, 6, 126],
          [
            {
              colspan: 2,
              value: "सुदूरपश्चिम जम्मा",
            },
            1,
            33,
            54,
            734,
          ],
          [
            {
              colspan: 2,
              value: "नेपाल",
            },
            11,
            276,
            460,
            6743,
          ],
          [
            {
              colspan: 2,
              value: "सुदूरपश्चिमले ओगटेको अंश (प्रतिशत)",
            },
            9.09,
            11.95,
            11.73,
            10.88,
          ],
        ],
      },
      // 2.7
      nirbachanchhetra: {
        id: "table_6",
        title: " प्रदेशमा भौगोलिक विभाजन अनुसार निर्वाचन क्षेत्रको विवरण",
        labels: ["क्र.स.", "भौगोलिक क्षेत्र", "प्रतिनिधि सभा", "प्रदेश सभा", "प्रतिशत"],
        data: [
          ["1", "हिमाल", 3, 6, 18.75],
          ["2", "पहाड", 5, 10, 31.25],
          ["3", "तराई", 8, 16, 50],
          [
            {
              colspan: 2,
              value: "सुदूरपश्चिम जम्मा",
            },
            16,
            32,
            100,
          ],
        ],
      },
      nirbachanchhetraChartData: {
        labels: ["हिमाल", "पहाड", "तराई",],
        datasets: [
          {
            backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f"],
            data: ["18.75", "31.25", "50"],
          }
        ],
      },
      // 2.8
      jillanirbachanchhetra: {
        id: "table_7",
        title: "प्रदेशका जिल्लाहरुमा रहेका निर्वाचन क्षेत्रको विवरण",
        labels: ["क्र.स.", "जिल्ला", "प्रतिनिधि सभा", "प्रदेश सभा"],
        data: [
          ["1", "दार्चुला", 1, 2],
          ["2", "बैतडी", 1, 2],
          ["3", "डडेलधुरा", 1, 2],
          ["4", "कञ्चनपुर", 3, 6],
          ["5", "बझाङ", 1, 2],
          ["6", "बाजुरा", 1, 2],
          ["7", "डोटी", 1, 2],
          ["8", "अछाम", 2, 4],
          ["9", "कैलाली", 5, 10],
          [{ colspan: 2, value: "सुदूरपश्चिम जम्मा", }, 16, 32,],
          [{ colspan: 2, value: "नेपाल", }, 165, 330,],
          [{ colspan: 2, value: "सुदूरपश्चिमले ओगटेको अंश(प्रतिशत)", }, 9.69, 9.69,],
        ],
      },

      jillanirbachanchhetraChartData: {

      },


      // parmukhharukonaamwali: {
      //   id: "table_8",
      //   title: " हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति",
      //   labels: ["क्र.स.", "प्रदेश प्रमुख", "देखि", "सम्म"],
      //   data: [
      //     [1, "मा. मोहनराज मल्ल", "२०७४/१०/०३", "२०७६/०७/१७"],
      //     [2, "मा.शर्मिला कुमारी पन्त", "२०७६/०७/१८", "२०७८/०१/२०"],
      //     [3, "मा.गंगा प्रसाद यादव", "२०७८/०१/२०", "२०७८/०७/२३"],
      //     [4, "मा.देवराज जोशी", "२०७८/०७/२३", ""],
      //   ],
      // },

      parmukhharukonaamwali: {
        id: "table_8",
        title: " हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति",
        labels: ["क्र.स.", "प्रदेश प्रमुख", "देखि", "सम्म"],
        data: [],
      },

      // 2.10
      pahilomantriparisadh: {
        id: "table_9",
        title: "सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्",
        labels: ["क्र.स.", "नाम थर", "मन्त्रालय", "दल"],
        data: [
          [1, "मा.त्रिलोचन भट्ट", "मुख्यमन्त्री", "नेकपा (माओवादी केन्द्र)"],
          [2, "मा.प्रकाशबहादुर शाह", "आन्तरिक मामिला तथा कानुन", "नेकपा एमाले"],
          [3, "मा.दीर्घबहादुर सोडारी", "सामाजिक विकास", "नेकपा एमाले"],
          [4, "मा.पठानसिंह बोहरा", "भौतिक योजना तथा विकास", "नेकपा एमाले"],
          [5, "मा.माया भट्ट", "उद्योग, पर्यटन वन तथा वातावरण", "नेकपा एमाले"],
          [6, "मा.झपट बहादुर बोहरा", "आर्थिक मामिला तथा योजना", "नेकपा (माओवादी केन्द्र)"],
          [7, "मा.बिनिता चौधरी", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"],
        ],
      },


      // 2.11
      // supaparisadh: {
      //   id: "table_10",
      //   title: "सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्",
      //   labels: ["क्र.स.", "नाम थर", "पद", "मन्त्रालय", "दल"],
      //   data: [
      //     [1, "मा.त्रिलोचन भट्ट", "मुख्यमन्त्री", "मुख्यमन्त्री तथा मन्त्रीपरिषद्", "नेकपा (माओवादी केन्द्र)"],
      //     [2, "मा.दीर्घबहादुर सोडारी", "मन्त्री", "भौतिक पूर्वाधार विकास", "नेकपा (एकीकृत समाजवादी)"],
      //     [3, "मा.मानबहादुर धामी", "मन्त्री", "उद्योग,पर्यटन वन तथा वातावरण", "नेकपा (माओवादी केन्द्र)"],
      //     [4, "मा.तारा लामा तामाङ", "मन्त्री", "आर्थिक मामिला तथा योजना", "नेकपा (एकीकृत समाजवादी)"],
      //     [5, "मा.लालबहादुर खड्का", "मन्त्री", "सामाजिक विकास", "	नेकपा एमाले"],
      //     [6, "मा.बिनितादेवी चौधरी", "मन्त्री", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"],
      //     [7, "मा.पूर्णा जोशी", "मन्त्री", "आन्तरिक मामिला तथा कानुन", "	नेकपा (एकीकृत समाजवादी)"],
      //     [8, "मा.चुनकुमारी चौधरी", "राज्यमन्त्री", "भौतिक योजना तथा विकास", "नेकपा (एकीकृत समाजवादी)"],
      //     [9, "मा.मना कुमारी साउँद", "राज्यमन्त्री", "सामाजिक विकास", "नेकपा (एकीकृत समाजवादी)"],
      //     [10, "मा.माया तामाङ", "राज्यमन्त्री", "आर्थिक मामिला तथा योजना", "नेकपा (एकीकृत समाजवादी)"],
      //     [11, "मा.मानबहादुर सुनार", "राज्यमन्त्री", "भूमि ब्यवस्था कृषि तथा सहकारी", "नेकपा (माओवादी केन्द्र)"],
      //   ],
      // },

      supaparisadh: {
        id: "table_10",
        title: "सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्",
        labels: ["क्र.स.", "नाम थर", "पद", "मन्त्रालय", "दल"],
        data: [],
      },

      // 2.12
      // pardeshsavanamawali: {
      //   id: "table_11",
      //   title: "प्रदेश सभा सदस्यहरुको नामावली",
      //   labels: ["क्र.स.", "नाम थर", "निर्वाचन क्षेत्र", "हालको राजनीतिक दल"],
      //   data: [
      //     ["1", "अर्जुन बहादुर थापा", "बझाङ १-१", "सभामुख"],
      //     ["2", "निर्मला बडाल जोशी", "समानुपातिक", "नेकपा माओवादी केन्द्र"],
      //     ["3", "अक्कलबहादुर रावल", "अछाम २-१", "नेकपा माओवादी केन्द्र"],
      //     ["4", "अर्चना गहतराज", "समानुपातिक", "नेकपा एमाले"],
      //     ["5", "अमर बहादुर साउँद", "कैलाली ३-२", "नेकपा (एकीकृत समाजवादी)"],
      //     ["6", "अम्बी कुमारी थापा", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["7", "उमा कुमारी बादी", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["8", "कर्णबहादुर मल्ल", "डडेलधुरा १-२", "नेपाली कांग्रेस"],
      //     ["9", "कुन्ती जोशी", "समानुपातिक", "नेकपा माओवादी केन्द्र"],
      //     ["10", "कुमारी नन्दा बम", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["11", "कुलबीर चौधरी", "कञ्चनपुर १-२", "नेकपा (एकीकृत समाजवादी)"],
      //     ["12", "कृष्ण बहादुर चौधरी", "कैलाली १-१", "लोकतान्त्रिक समाजवादी पार्टी नेपाल"],
      //     ["13", "कृष्णराज सुवेदी", "कैलाली ४-२", "नेकपा एमाले"],
      //     ["14", "गेल्बु सिं बोहरा", "दार्चुला १-१", "नेकपा एमाले"],
      //     ["15", "गोबिन्द राज बोहरा", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["16", "चुन कुमारी चौधरी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     ["17", "टेक बहादुर रैका आउजी", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["18", "डिल्ली राज पन्त", "कैलाली ५-२", "नेपाली कांग्रेस"],
      //     ["19", "तारा लामा तामाङ्ग", "कञ्चनपुर १-१", "नेकपा (एकीकृत समाजवादी)"],
      //     ["20", "दिब्यश्वरी शाह", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["21", "दीर्घबहादुर सोडारी", "कैलाली ४-१", "नेकपा (एकीकृत समाजवादी)"],
      //     ["22", "दुर्गा कुमारी कामी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     ["23", "देबकी मल्ल थापा", "बझाङ १-२", "नेकपा माओवादी केन्द्र"],
      //     ["24", "देबराज पाठक", "समानुपातिक", "नेपाली कांग्रेस"],
      //     ["25", "नन्द बहादुर साउँद", "कैलाली २-२", "नेकपा माओवादी केन्द्र"],
      //     ["26", "नेपालु चौधरी", "कैलाली ५-१", "नेकपा एमाले"],
      //     ["27", "पठानसिंह बोहरा", "डडेलधुरा १-१", "नेकपा एमाले"],
      //     ["28", "पूर्णा जोशी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     ["29", "प्रकाश बहादुर शाह", "बाजुरा १-२", "नेकपा एमाले"],
      //     ["30", "प्रकाश रावल", "कञ्चनपुर ३ -१", "नेकपा (एकीकृत समाजवादी)"],
      //     ["31", "प्रेम प्रकाश भट्ट", "बैतडी १ -१", "नेकपा माओवादी केन्द्र"],
      //     ["32", "बलदेव रेग्मी", "बाजुरा १-१", "नेकपा एमाले"],
      //     ["33", "बल बहादुर सोडारी", "अछाम २-२", "नेकपा (एकीकृत समाजवादी)"],
      //     ["34", "भरत बहादुर खड्का", "डोटी १ -१", "नेपाली कांग्रेस"],
      //     ["35", "मना कुमारी साउँद", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     ["36", "महेश दत्त जोशी", "कञ्चनपुर २ -१", "नेकपा माओवादी केन्द्र"],
      //     ["37", "मान बहादुर धामी", "दार्चुला १ -२", "नेकपा माओवादी केन्द्र"],
      //     ["38", "मान बहादुर सुनार", "कञ्चनपुर ३ -२", "नेकपा माओवादी केन्द्र"],
      //     ["39", "माया तामाङ्ग बोहरा", "कञ्चनपुर १ -१", "नेकपा (एकीकृत समाजवादी)"],
      //     ["40", "माया भट्ट", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     ["41", "मालमती कुमारी राना थारु", "समानुपातिक", "जनता समाजवादी पार्टी नेपाल"],
      //     ["42", "रण बहादुर रावल", "कैलाली १ -२", "नेपाली कांग्रेस"],
      //     ["43", "रतन बहादुर थापा", "कैलाली २-१", "नेकपा एमाले"],
      //     ["44", "लाल बहादुर खड्का", "कञ्चनपुर २ -२", "नेकपा (एकीकृत समाजवादी)"],
      //     ["45", "लिलाधर भट्ट", "बैतडी १ -२", "नेकपा एमाले"],
      //     ["46", "विनिता देवी चौधरी", "समानुपातिक", "नेकपा माओवादी केन्द्र"],
      //     ["47", "विरभान चौधरी", "कैलाली ३-१", "नेकपा माओवादी केन्द्र"],
      //     ["48", "शान्ती नेपाली", "समानुपातिक", "नेकपा माओवादी केन्द्र"],
      //     ["49", "श्यामलाल राना थारु", "समानुपातिक", "नेपाली कांग्रेस"],
      //     [50, "शुसिला बुढाथोकी", "समानुपातिक", "नेकपा (एकीकृत समाजवादी)"],
      //     [51, "हर्क बहादुर कुँवर", "अछाम १-१", "नेकपा एमाले"],
      //     [52, "त्रिलोचन भट्ट", "डोटी १ -२", "नेकपा माओवादी केन्द्र"],
      //     ["", "", "अछाम १-२", "हाल रिक्त रहेको"],
      //   ],
      // },
      pardeshsavanamawali: {
        id: "table_11",
        title: "प्रदेश सभा सदस्यहरुको नामावली",
        labels: ["क्र.स.", "नाम थर", "निर्वाचन क्षेत्र", "हालको राजनीतिक दल"],
        data: [],
      },

      // 2.6
      districtWiseNumberOfLocalLevel: {
        id: "table_12",
        title: "स्थानीय तहको जिल्लागत संख्या",
        labels: ["क्र.स.", "जिल्ला", "उप महानगर", "नगरपालिका", "गाउँपालिका", "वडा संख्या"],
        data: [
          [6, "दार्चुला", "", 2, 7, 61],
          [6, "बैतडी", "", 4, 6, 84],
          [6, "डडेलधुरा", "", 2, 5, 52],
          [2, "कञ्चनपुर", "", 7, 2, 92],
          [5, "बझाङ", "", 2, 10, 94],
          [6, "बाजुरा", "", 4, 5, 69],
          [3, "डोटी", "", 2, 7, 65],
          [4, "अछाम", "", 4, 6, 91],
          [1, "कैलाली", 1, 6, 6, 126],
          [{ colspan: 2, value: "सुदूरपश्चिम जम्मा" }, 1, 33, 54, 734],
          [{ colspan: 2, value: "नेपाल" }, 11, 276, 460, 6743],
          [{ colspan: 2, value: "सुदूरपश्चिमले ओगटेको अंश (प्रतिशत)" }, 9.09, 11.95, 11.73, 10.88],
        ],
      },
    };
  },

  mounted() {
    this.fetchDatas();
    this.fetchProvinceHeadData();
    this.fetchAssemblyMember();
    this.fetchLandUses();
  },

  methods: {
    fetchDatas() {
      axios
        .get("/api/current-ministry")
        .then((response) => {
          this.supaparisadh.labels = response.data.labels;
          this.supaparisadh.data = response.data.data
          this.infoDatas = response.data;
        })
        .catch((error) => console.log(error));
    },
    fetchProvinceHeadData() {
      axios
        .get("/api/province-head")
        .then((response) => {
          this.parmukhharukonaamwali.labels = response.data.labels;
          this.parmukhharukonaamwali.data = response.data.data
          this.infoDatas = response.data;
        })
        .catch((error) => console.log(error));
    },
    fetchAssemblyMember() {
      axios
        .get("/api/state-assembly-member")
        .then((response) => {
          this.pardeshsavanamawali.labels = response.data.labels;
          this.pardeshsavanamawali.data = response.data.data
          this.infoDatas = response.data;
        })
        .catch((error) => console.log(error));
    },
    fetchLandUses() {
      axios
        .get("/api/land-uses")
        .then((response) => {
          this.vuupyogkoData.labels = response.data.labels;
          this.vuupyogkoData.data = response.data.data
          this.infoDatas = response.data;
          this.vuupyogkoChartData.datasets.backgroundColor=response.data.backgroundColor;
          this.vuupyogkoChartData.datasets.data=response.data.data;

          console.log(response.data.backgroundColor);
          console.log(response.data.data);
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style scoped>
#unit-nav {
  position: fixed;
  top: -100px;
  display: block;
  margin-left: -50px;
}

.unit-nav-list {
  margin-top: 20vh;

  /* box-shadow: 5px 5px 10px #888888; */
}

.unit-nav-list li {
  list-style: none;

}

.unit-nav-list li a label {
  cursor: pointer;
  margin-right: 20px;
  margin-top: 5px;
}
</style>