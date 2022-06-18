<template>
  <div class="container-fluid my-div">
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 side-client-menus">

          <div class="col-xl-12 col-lg-12 col-md-12 main-content">
            <div style="height: 80px;"></div>
            <div class="list-set">
              <ul class="table-list " style="overflow: auto;">
                <li class="my-3">
                  <a href="#table_1">ठूला तथा मझौला उद्योगहरुको प्रदेशगत विवरण</a>
                </li>

                <li class="my-3">
                  <a href="#table_2">सुदूरपश्चिमका दर्ता भएका कूल साना उद्योगहरुको विवरण</a>
                </li>

                <li class="my-3">
                  <a href="#table_3">सुदूरपश्चिममा रहेका मुख्य खानीको विवरण</a>
                </li>

              </ul>
            </div>
          </div>
        </div>


        <div class="col-xl-8 col-lg-7 col-md-12">
          <div class="container py-5">
            <h1 class="page-title">उद्योग ब्यवसाय</h1>
            <data-viewer :data="businessindustrydata"></data-viewer>
            <div class="my-5"></div>
            <data-viewer :data="SmallBusinessData">
              <template slot="thead-top">
                <tr>
                  <th colspan="2"></th>
                  <th colspan="2" class="bg-light text-center font-weight-bold">लघु</th>
                  <th colspan="2" class="bg-light text-center font-weight-bold">घरेलु</th>
                  <th colspan="2" class="bg-light text-center font-weight-bold">साना</th>
                  <th colspan="2" class="bg-light text-center font-weight-bold">जम्मा</th>
                </tr>
              </template>
            </data-viewer>
            <div class="my-5"></div>
            <data-viewer :data="minesdata"></data-viewer>
            <div class="my-5"></div>
            <data-viewer :data="districtWiseAreaOfStateData"></data-viewer>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      businessindustrydata: {
        id:'table_1',
        title: "ठूला तथा मझौला उद्योगहरुको प्रदेशगत विवरण",
        labels: ["प्रदेश", "कृषि र वन", "निर्माण", "उर्जा", "सञ्चार", "उत्पादनमा आधारित", "खानी", "सेवा", "पर्यटन", "उद्योगका संख्या", "कूल लगानी (रु.दश लाखमा)", "रोजगारी"],
        data: [
          ["प्रदेश १", 114, 3, 77, 2, 369, 2, 97, 50, 714, 37770.5, 76264],
          ["मधेश", 24, 1, 1, 1, 418, 3, 56, 18, 522, 10144.4, 54646],
          ["बागमती", 261, 48, 135, 45, 1695, 9, 1804, 1301, 5298, 70519.3, 357493],
          ["गण्डकी", 32, 4, 90, 1, 57, 9, 110, 253, 556, 28538.7, 29491],
          ["लुम्बिनी", 19, 2, 13, 1, 390, 24, 70, 69, 588, 20165.6, 60682],
          ["कर्णाली", 0, 0, 13, 0, 6, 5, 9, 6, 39, 11394.6, 2606],
          ["सुदूरपश्चिम", 6, 0, 21, 0, 41, 17, 22, 8, 115, 3843.1, 9919],
          ["जम्मा", 456, 58, 350, 50, 2976, 69, 2168, 1705, 7832, 182376.3, 591101],
        ],
      },

      SmallBusinessData: {
        id:'table_2',
        title: "सुदूरपश्चिमका दर्ता भएका कूल साना उद्योगहरुको विवरण",
        labels: ["क्र.स.","वर्गिकरण", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी", "संख्या", "कुलपुँजी"],
        data: [
          [1, "उर्जामुलक", 3, 1100000, 0, 0, 3, 490000, 6, 1590000],
          [2, "उत्पादनमुल", 438, 247365800, 585, 357525050, 4340, 8162847681, 5363, 8767988531],
          [3, "कृषी तथा वन पैदावारमा आधारित", 3352, 3608187350, 1554, 1711914770, 10926, 13512129439, 15832, 18832231559],
          [4, "खनिज", 0, 0, 0, 0, 0, 0, 0, 0],
          [5, "पुर्वाधार निर्माण मुलक", 3, 1470000, 4, 3800000, 212, 637230054, 219, 642500054],
          [6, "पर्यतन मुलक", 407, 296874000, 75, 60261000, 1311, 713531027, 1793, 1070666027],
          [7, "सुचन तथा  सञ्चार प्रविधिमा आधारित", 6, 4400000, 9, 6500000, 13, 17050000, 28, 27950000],
          [8, "सेवा मूलक", 1882, 1324805250, 441, 264024500, 10918, 18658580165, 13241, 20247409915],
          ["", "जम्मा", 6091, 5484452400, 2668, 2404025320, 27723, 41701858366, 36482, 49590336086],
        ],
      },

      minesdata: {
        id:'table_3',
        title: "सुदूरपश्चिममा रहेका मुख्य खानीको विवरण",
        labels: ["क्र.स.", "खानी", "जिल्ला", "अवस्था"],
        data: [
          [1, "तामा", "दार्चुला, डडेलधुरा, बझाङ र बाजुरा", "देखिएको, परम्परागत रुपमा निकालिएको, भेटिएको"],
          [2, "सुन", "डोटी र बैतडी,बझाङ, दार्चुला,डडेलधुरा, कैलाली, बाजुरा, अछाम", "प्रारम्भिर रुपमा देखिएको,संकलन तथा सम्भावना परीक्षण"],
          [3, "फलाम", "बैतडी, बझाङ र दार्चुला", "परम्परागत रुपमा निकालिएको,देखिएका"],
          [4, "सिसा", "बझाङ, बैतडी, अछाम, बाजुरा र डडेलधुरा", "	देखिएको"],
          [5, "लिथियम", "डोटी र बझाङ", "देखिएको"],
          [6, "टिन", "डडेलधुरा, डोटी र बझाङ", "देखिएको, भेटिएको"],
          [7, "युरेनियम", "बैतडी, दार्चुला, बझाङ, बाजुरा", "देखिएको"],
          [8, "जिंक", "बझाङ, बैतडी र डडेलधुरा", "देखिएको"],
          [9, "आर्सेनिक", "डेडेलधुरा र बझाङ", "देखिएको"],
          [10, "क्रोमियम", "बझाङ", "देखिएको"],
          [11, "कोबाल्ट", "बझाङ", "देखिएको"],
          [12, "चुनढुंगा", "बैतडी", " "],

        ],
      },
    };
  },
  mounted() {
    this.fetchProvinceBusiness();
    this.fetchSupaBusiness();
  },

  methods: {
    fetchProvinceBusiness() {
      axios
        .get("/api/province-business")
        .then((response) => {
          this.businessindustrydata.labels = response.data.labels;
          this.businessindustrydata.data = response.data.data
          this.infoDatas = response.data;
        })
        .catch((error) => console.log(error));
    },
     fetchSupaBusiness() {
      axios
        .get("/api/supa-business")
        .then((response) => {
          this.SmallBusinessData.labels = response.data.labels;
          this.SmallBusinessData.data = response.data.data
          this.infoDatas = response.data;
        })
        .catch((error) => console.log(error));
    },
    
  },
};
</script>


<style scoped>
</style>