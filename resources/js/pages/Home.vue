
<template>
  <div class="container-fluid">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-3 d-none d-md-block">
          <nav class="dataset-links-card">
            <div class="heading">डाटासेटहरु</div>
            <div class="content">
              <router-link class="link" v-for="(item, index) in links" :key="index" :to="item.url">
                <span>{{ item.name }}</span>
              </router-link>
            </div>
          </nav>
        </div>
        <div class="col-md-9">
          <!-- <section id="profile-summary">
          <div class="info-grid">
            <div class="info-card blue-color">
              <div class="value">19,539</div>
              <div class="label">क्षेत्रफल</div>
              <div class="icon"><i class="far fa-map"></i></div>
            </div>
            <div class="info-card green-color">
              <div class="value">9</div>
              <div class="label">जम्मा जिल्ला</div>
              <div class="icon"><i class="fa fa-globe"></i></div>
            </div>
            <div class="info-card indigo-color">
              <div class="value">27,11,270</div>
              <div class="label">जनसंख्या</div>
              <div class="icon"><i class="fa fa-users"></i></div>
            </div>
            <div class="info-card orange-color">
              <div class="value">131</div>
              <div class="label">जनघनत्तो (वर्ग कि.मि.)</div>
              <div class="icon"><i class="fa fa-users"></i></div>
            </div>
            <div class="info-card yellow-color">
              <div class="value">32</div>
              <div class="label">प्रदेशसभा निर्वाचन क्षेत्र</div>
              <div class="icon"><i class="fa fa-person-booth"></i></div>
            </div>
            <div class="info-card teal-color">
              <div class="value">16</div>
              <div class="label">प्रतिनिधि निर्वाचन क्षेत्र</div>
              <div class="icon"><i class="fa fa-person-booth"></i></div>
            </div>
          </div>
        </section> -->

          <section v-if="infoCards" id="profile-summary">
            <div class="info-grid">
              <a v-for="item in infoCards" class="info-card" v-bind:key="item.id" :href="item.link || '#'" :class="item.card_theme">
                <div class="value">{{ item.value }}</div>
                <div class="label">{{ item.label }}</div>
                <div v-if="item.icon" class="icon"><i :class="item.icon"></i></div>
              </a>
            </div>
          </section>
          <div class="my-5"></div>
        </div>
      </div>

      <div class="p-3">
        <div class="row ministries px-3 pt-4 rounded">
          <div class="col-lg-4 mb-4">
            <router-link to="/minister-profile" class="ministry-card card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="80px" width="90px">
                <img src="https://img.icons8.com/ios-filled/50/000000/library.png" height="50px" />
                हालको मन्त्रिपरिषद्
              </span>
            </router-link>
          </div>
          <div class="col-lg-4 mb-4">
            <router-link to="/bhugol" class="ministry-card1 card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="80px" width="90px">
                <img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-geography-back-to-school-xnimrodx-lineal-color-xnimrodx.png" height="50px" />
                हाम्रो भूगोल
              </span>
            </router-link>
          </div>
          <div class="col-lg-4 mb-4">
            <router-link to="/tourist-place" class="ministry-card2 card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="80px" width="90px">
                <img src="https://img.icons8.com/color/48/000000/earth-planet.png" />
                पर्यटक स्थल
              </span>
            </router-link>
          </div>
          <div class="col-lg-4 mb-4">
            <router-link to="#" class="ministry-card3 card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="80px" width="90px">
                <img src="https://img.icons8.com/color/48/000000/domain--v1.png" />
                स्थानीय तहकाहरू वेबसाइट
              </span>
            </router-link>
          </div>
          <div class="col-lg-4 mb-4">
            <router-link to="#" class="ministry-card4 card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="60px" width="70px">
                <img src="https://img.icons8.com/color-glass/48/000000/book-shelf.png" />
                ई-पुस्तकालय
              </span>
            </router-link>
          </div>
          <div class="col-lg-4 mb-4">
            <router-link to="#" class="ministry-card5 card text-dark text-center py-5 font-weight-bold">
              <span style="align-items: center" height="60px" width="70px">
                <img src="https://img.icons8.com/color/48/000000/myspace.png" />
                सामाजिक संजाल
              </span>
            </router-link>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 my-3">
          <div class="chart-card">
            <div class="chart-body">
              <div class="chart-title mb-3">शैक्षिक संस्था संख्या</div>
              <pie
                :chart-options="{ responsive: true }"
                :plugins="pieChartPlugins"
                :chart-data="{
                  labels: ['सामुदायिक', 'संस्थागत'],
                  datasets: [
                    {
                      backgroundColor: ['#007bff', '#dc3545'],
                      data: [4044, 599],
                    },
                  ],
                }"
              />
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="chart-card">
            <div class="chart-body">
              <div class="chart-title mb-3">भौगोलिक क्षेत्रगत क्षेत्रफल</div>
              <pie
                :chart-options="{ plugins: { legend: { display: true } } }"
                :plugins="pieChartPlugins"
                :chart-data="{
                  labels: ['हिमाली', 'पहाडी', 'तराई'],
                  datasets: [
                    {
                      backgroundColor: ['#007bff', '#dc3545', 'green'],
                      data: [8393.11, 6748.78, 4857.39],
                    },
                  ],
                }"
              />
            </div>
          </div>
        </div>
        <div class="col-md-6 my-3">
          <div class="chart-card">
            <div class="chart-body">
              <div class="chart-title mb-3">जनसाङ्ख्यिक अवस्था</div>
              <!-- TODO::Why is this here? -->
              <div class="col-12">
                <div class="row chart-datas">
                  <div class="male_num">
                    <div></div>
                  </div>
                  <div class="female_num">
                    <div></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <Bar
                    :chart-options="{ plugins: { legend: { display: false } } }"
                    :chart-data="{
                      labels: ['पुरुष', 'महिला'],
                      datasets: [
                        {
                          backgroundColor: ['#007bff', '#dc3545'],
                          data: [1287997, 1423273],
                        },
                      ],
                    }"
                  />
                  <div class="text-center year"><label>2068</label></div>
                </div>
                <div class="col-md-5 my-pie">
                  <Bar
                    :chart-options="{ plugins: { legend: { display: false } } }"
                    :chart-data="{
                      labels: ['पुरुष', 'महिला'],
                      datasets: [
                        {
                          backgroundColor: ['#007bff', '#dc3545'],
                          data: [1217887, 1334630],
                        },
                      ],
                    }"
                  />
                  <div class="text-center year"><label for="">2078</label></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-md-6">
          <div class="card">
            <div class="row">
              <div class="container">
                <div class="row col-12">
                  <div class="data2068 col-6">
                    <div></div>
                  </div>
                  <div class="data2078 col-6">
                    <div></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <Pie
                  :chart-options="{ responsive: true }"
                  :plugins="pieChartPlugins"
                  :chart-data="{
                    // labels: ['2068', '2078'],
                    datasets: [
                      {
                        backgroundColor: ['#007bff', '#dc3545'],
                        data: [91.25, 90.49],
                      },
                    ],
                  }"
                />

                <label class="col-12 text-center">लैङ्गिक अनुपात</label>
              </div>

              <div class="col-md-4">
                <Pie
                  :chart-options="{ responsive: true }"
                  :plugins="pieChartPlugins"
                  :chart-data="{
                    // labels: ['2068', '2078'],
                    datasets: [
                      {
                        backgroundColor: ['#007bff', '#dc3545'],
                        data: [1.53, 0.58],
                      },
                    ],
                  }"
                />

                <label class="col-12 text-center">जनसंख्या बृद्धिदर</label>
              </div>

              <div class="col-md-4">
                <Pie
                  :chart-options="{ responsive: true }"
                  :plugins="pieChartPlugins"
                  :chart-data="{
                    // labels: ['2068', '2078'],
                    datasets: [
                      {
                        backgroundColor: ['#007bff', '#dc3545'],
                        data: [5.43, 4.62],
                      },
                    ],
                  }"
                />

                <label class="col-12 text-center">औषत परिवारको आकार</label>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="col-11">
              <bar
                :chart-options="{ plugins: { legend: { display: false } } }"
                :chart-data="{
                  labels: ['कृषि क्षेत्र', 'उद्योग क्षेत्र', 'सेवा क्षेत्र'],
                  datasets: [
                    {
                      backgroundColor: ['#007bff', '#dc3545', 'green'],
                      data: [36.1, 13.2, 50.7],
                    },
                  ],
                }"
              />
              <label class="col-12 text-center">कूलगार्हस्थ उत्पादन</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="col-11">
              <bar
                :chart-options="{ plugins: { legend: { display: false } } }"
                :chart-data="{
                  labels: ['महिला', 'पुरुष', 'जम्मा'],
                  datasets: [
                    {
                      backgroundColor: ['#007bff', '#dc3545', 'green'],
                      data: [51.93, 76.4, 63.48],
                    },
                  ],
                }"
              />

              <label class="col-12 text-center">साक्षरता दर</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="chart-body">
            <div class="row">
              <div class="col-md-7">
                <div class="row">
                  <!-- ======================== -->
                  <div class="card my-3">
                    <div class="row"></div>
                  </div>
                </div>
              </div>
              <!-- ================================================= -->
              <div class="col-md-5"></div>
            </div>
            <!-- ============== -->
          </div>
        </div>
      </div>
      <!-- ================ -->
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <bar
              :chart-options="{ plugins: { legend: { display: false } } }"
              :chart-data="{
                labels: ['अस्पताल', 'प्रास्वाक', 'स्वास्थ्य चौकी', 'सा.स्वा.इकाई.', 'आ.स्वा.के.', 'पोषण गृह'],
                datasets: [
                  {
                    backgroundColor: ['#007bff', '#dc3545', 'green', 'grey', 'pink', 'purple'],
                    data: [13, 16, 375, 135, 133],
                  },
                ],
              }"
            />

            <label class="col-12 text-center">स्वास्थ्य संस्था संख्या</label>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <pie
              :chart-options="{ responsive: true }"
              :plugins="pieChartPlugins"
              :chart-data="{
                labels: ['कालोपत्रे', 'ग्राभेल', 'कच्ची'],
                datasets: [
                  {
                    backgroundColor: ['#007bff', '#dc3545', 'green'],
                    data: [234, 1158, 3954],
                  },
                ],
              }"
            />

            <label class="col-12 text-center">सडक</label>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <bar
              :chart-options="{ responsive: true }"
              :chart-data="{
                labels: ['खना पकाउने', 'वत्तीवाल्ने'],
                datasets: [
                  {
                    label: 'दाउरा',
                    data: [98.57],
                    backgroundColor: '#007bff',
                  },
                  {
                    label: 'एलपिजीग्याँस',
                    data: [1.07],
                    backgroundColor: '#dc3545',
                  },
                  {
                    label: 'अन्यः',
                    data: [0.36],
                    backgroundColor: 'pink',
                  },
                  {
                    label: 'विजुली',
                    data: [0, 64.69],
                    backgroundColor: '#00663d',
                  },
                  {
                    label: 'वैकल्पिक उर्जा',
                    data: [0, 3],
                    backgroundColor: 'yellow',
                  },
                ],
              }"
            />
            <label class="col-12 text-center">उर्जा उपयोग</label>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <pie
              :chart-options="{ responsive: true }"
              :plugins="pieChartPlugins"
              :chart-data="{
                labels: ['प्रदेश', 'प्रतिनिधिसभा'],
                datasets: [
                  {
                    backgroundColor: ['#007bff', '#dc3545', 'green'],
                    data: [32, 16],
                  },
                ],
              }"
            />
            <label class="col-12 text-center">निर्वाचन क्षेत्र</label>
          </div>
        </div>
      </div>
      <!-- ========================================================= -->

      <div class="row mt-4">
        <div class="col-md-3">
          <!-- <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthedhangadhians%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId"
            height="500"
            style="border: none; overflow: auto;"
            scrolling="yes"
            frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
          ></iframe> -->
          <div
            class="fb-page"
            data-href="https://www.facebook.com/thedhangadhians"
            data-tabs="timeline"
            data-width=""
            data-height=""
            data-small-header="true"
            data-adapt-container-width="true"
            data-hide-cover="true"
            data-show-facepile="true"
          >
            <blockquote cite="https://www.facebook.com/thedhangadhians" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thedhangadhians">The Dhangadhians</a></blockquote>
          </div>
        </div>
        <div class="col-md-9">
          <gis-tile></gis-tile>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.ministries {
  background-color: #e2e2e8;
}
</style>
<script>
import { Bar, Pie } from "vue-chartjs/legacy";
import ChartDataLabels from "chartjs-plugin-datalabels";

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement } from "chart.js";
import GisTile from "./../components/GisTile.vue";
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement);

export default {
  components: { Bar, Pie, GisTile },

  data() {
    return {
      infoCards: [],
      pieChartPlugins: [ChartDataLabels],
      links: [
        {
          url: "/geographical-political-situation",
          name: "भौगोलिक तथा राजनीतिक अवस्था",
        },
        {
          url: "demographic-status",
          name: "जनसांख्यिक स्थिति",
        },
        {
          url: "/economical-situation",
          name: "आर्थिक अवस्था",
        },
        {
          url: "/social-status",
          name: "सामाजिक अवस्था",
        },
        {
          url: "/condition-of-physical-infrastructure",
          name: "भौतिक पूर्वाधारको अवस्था",
        },
        {
          url: "/status-of-tourism-development",
          name: "पर्यटन विकासको अवस्था",
        },
        {
          url: "/industry-business",
          name: "उद्योग ब्यवसाय",
        },
        {
          url: "/state-of-agricultural-sector",
          name: "कृषि क्षेत्रको अवस्था",
        },
        {
          url: "/forest-and-environment",
          name: "वन तथा वातावरण",
        },
        {
          url: "/miscellaneous",
          name: "विविध",
        },
      ],
    };
  },

  mounted() {
    this.fetchInfoCards();
  },

  methods: {
    fetchInfoCards() {
      axios
        .get("/api/info-cards")
        .then((response) => {
          this.infoCards = response.data;
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>


<style scoped>
.navigation-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.navigation-grid > a {
  background-color: #fff;
  padding: 10px 15px;
  border-radius: 6px;
  min-height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #2572bc;
  font-size: 1.5rem;
  font-weight: 600;
  transition: 0.3s ease;
}

.navigation-grid > a:hover {
  background-color: #2572bc;
  color: #fff;
}

.ministry-card:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(51, 214, 19, 0.753);
  background-color: #c6c915;
}
.ministry-card:hover span {
  color: #fff;
}
.ministry-card1:hover {
  transform: translateY(-2px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(51, 214, 19, 0.753);
  background-color: blue;
  color: #fff;
}
.ministry-card1:hover span {
  color: #fff;
}
.ministry-card2:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(0, 0, 0, 0.336);
  background-color: rgb(14, 209, 14);
}
.ministry-card2:hover span {
  color: #fff;
}
.ministry-card3:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(14, 90, 230, 0.945);
  background-color: rgb(119, 43, 43);
}
.ministry-card3:hover span {
  color: #fff;
}
.ministry-card4:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(14, 90, 230, 0.945);
  background-color: rgb(139, 50, 139);
}
.ministry-card4:hover span {
  color: #fff;
}
.ministry-card5:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 2px 2px 10px 3px rgba(14, 90, 230, 0.945);
  background-color: rgb(175, 106, 28);
}
.ministry-card5:hover span {
  color: #fff;
}
</style>