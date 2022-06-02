<template>
  <div class="container py-5">
    <h1 class="page-title">भौगोलिक तथा राजनीतिक अवस्था</h1>
    <data-viewer :data="geographicalAreaData"></data-viewer>
    <div class="my-5"></div>
    <data-viewer :data="territorialGeographicalAreaData"></data-viewer>
    <div class="my-5"></div>
    <data-viewer :data="districtWiseAreaOfStateData"></data-viewer>
    <div class="my-5"></div>
    <data-viewer :data="districtWiseNumberOfLocalLevel">
      <template slot="thead-top">
        <tr>
          <th colspan="2"></th>
          <th colspan="4" class="bg-light text-center font-weight-bold">स्थानीय तह विवरण</th>
        </tr>
      </template>
    </data-viewer>
  </div>
</template>

<script>
import DataViewer from "../../components/DataViewer.vue";

export default {
  components: { DataViewer },
  data() {
    return {
      geographicalAreaData: {
        title: "सुदूरपश्चिम प्रदेशको भौगोलिक क्षेत्रगत क्षेत्रफल",
        labels: ["क्र.स.", "भौगोलिक क्षेत्र", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [
          [1, "हिमाली", 8393.11, 41.97],
          [2, "पहाडी", 6748.78, 33.75],
          [3, "तराइ", 8393.11, 41.97],
        ],
      },

      territorialGeographicalAreaData: {
        title: "प्रदेशगत भौगोलिक क्षेत्रफल",
        labels: ["क्र.स.", "प्रदेश", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [
          [1, "1", 25905, 17.55],
          [2, "मधेश", 9661, 6.54],
          [3, "बागमती", 20300, 13.75],
          [4, "गण्डकी", 22585, 15.3],
          [5, "लुम्बीनी", 17318, 11.73],
          [6, "कर्णाली", 31873, 21.56],
          [7, "सुदूरपश्चिम", 19999.25, 13.55],
          [
            {
              colspan: 2,
              value: "जम्मा",
            },
            147641.28,
            100,
          ],
        ],
      },

      districtWiseAreaOfStateData: {
        title: "प्रदेशको जिल्लागत क्षेत्रफल",
        labels: ["क्र.स.", "जिल्ला", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
        data: [
          [1, "कैलाली", 3247, 16.23],
          [2, "कञ्चनपुर", 1610, 8.05],
          [3, "डोटी", 2081, 10.4],
          [4, "अछाम", 1692, 8.46],
          [5, "बझाङ", 3422, 17.11],
          [6, "बाजुरा", 2188, 10.94],
          [6, "दार्चुला", 2782.28, 13.91],
          [6, "बैतडी", 1482, 7.41],
          [6, "डडेलधुरा", 1495, 7.48],
          ["", "सुदूरपश्चिम", 19999.28, 100],
        ],
      },

      // 2.6
      districtWiseNumberOfLocalLevel: {
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
};
</script>


<style scoped>
</style>