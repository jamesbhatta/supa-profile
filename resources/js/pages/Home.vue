<template>
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
            <a v-for="item in infoCards" class="info-card" v-bind:key="item.id" :href="item.link || '#'"
              :class="item.card_theme">
              <div class="value">{{ item.value }}</div>
              <div class="label">{{ item.label }}</div>
              <div v-if="item.icon" class="icon"><i :class="item.icon"></i></div>
            </a>
          </div>
        </section>
        <div class="my-5"></div>
      
        <!-- =========================================== -->
        <div class="my-5"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 my-3">
                  <div class="chart-card">
                    <div class="chart-body">
                      <div class="chart-title mb-3">भौगोलिक क्षेत्रगत क्षेत्रफल</div>
                      <div class="row">
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                          <bar :chart-options="{ responsive: true }" :chart-data="{
                            labels: ['हिमाली', 'पहाडी', 'तराई'],
                            datasets: [
                              {
                                backgroundColor: ['#007bff', '#dc3545', 'green'],
                                data: [8393.11, 6748.78, 4857.39],
                              },
                            ],
                          }" />

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-7 my-3">
              <template>
                  <div class="chart-card">
                    <div class="chart-body">
                      <div class="chart-title mb-3">जनसाङ्ख्यिक अवस्था</div>
                      <div class="row">
                        <div class="col-md-6">
                          <Pie :chart-options="{ responsive: true }" :chart-data="{
                            labels: ['पुरुष', 'महिला'],
                            datasets: [
                              {
                                backgroundColor: ['#007bff', '#dc3545'],
                                data: [1287997, 1423273],
                              },
                            
                            ],
                          }" />
                          <div class="text-center year"><label>2068</label></div>
                        </div>
                        <div class="col-md-6 my-pie">
                          
                          <Pie :chart-options="{ responsive: true }" :chart-data="{
                           labels: ['पुरुष', 'महिला'],
                            datasets: [
                                {
                                backgroundColor: ['#007bff', '#dc3545'],
                                data: [1217887, 1334630],
                              },
                            ],
                          }" />
                          <div class="text-center year"><label for="">2078</label></div>
                        </div>
                      </div>
                    </div>
                  </div>
              </template>
            </div>
          </div>
          
        </div>
        <div class="my-5"></div>
          <!-- ========================================== -->
         <div class="row">
            <div class="col-12">
              <template>
                <div class="col-md-12">
                  <div class="chart-card">
                    <div class="chart-body">
                      <div class="chart-title mb-3">श्रम सम्बन्धि सूचक</div>
                      <div class="row">
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-6">
                          <bar :chart-options="{ responsive: true }" :chart-data="{
                            labels: ['बेरोजगारी दर', 'श्रम शक्ति सजभागिता दर', 'जनसंख्या अनुपातमा रोजगार', 'रोजगारको क्षेत्र', 'रोजगार'],
                            datasets: [
                              {
                                label: 'पुरुष',
                                data: [11.5, 45.6, 40.4,],
                                backgroundColor: '#007bff',
                              },
                              {
                                label: 'महिला',
                                data: [11.5, 15.7, 0],
                                backgroundColor: '#dc3545',
                              },
                              {
                                label: 'औपचारिक',
                                data: [0, 0,0, 33.3, 14.8],
                                backgroundColor: 'pink',
                              },
                              {
                                label: 'अनौपचारिक',
                                data: [0, 0,0, 66.7, 85.2],
                                backgroundColor: '#00663d',
                              }
                          
                            ]
                          }" />

                          <label class=" col-12 text-center">(सुदुरपश्चिममा)</label>

                        </div>
                        <div class="col-md-6">
                          <bar :chart-options="{ responsive: true }" :chart-data="{
                            labels: ['बेरोजगारी दर', 'श्रम शक्ति सजभागिता दर', 'जनसंख्या अनुपातमा रोजगार', 'रोजगारको क्षेत्र', 'रोजगार'],
                            datasets: [
                              {
                                label: 'पुरुष',
                                data: [10.3, 53.8, 48.3],
                                backgroundColor: '#007bff',
                              },
                              {
                                label: 'महिला',
                                data: [13.1, 26.3, 0],
                                backgroundColor: '#dc3545',
                              },
                              {
                                label: 'औपचारिक',
                                data: [0, 0,0, 37.8, 15.4],
                                backgroundColor: 'pink',
                              },
                              {
                                label: 'अनौपचारिक',
                                data: [0, 0,0, 62.2, 84.6],
                                backgroundColor: '#00663d',
                              }
                            ]
                          }" />

                          <label class="col-12 text-center">(नेपालमा)</label>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </template>
            </div>

          </div>
        <!-- ======================== -->
        <!-- <section class="mt-4">
          <div class="row">
            <div class="col-md-6">
              <div class="chart-card">
                <div class="chart-body">
                  <div class="chart-title mb-3">जनसाङ्ख्यिक अवस्था</div>
                  <div class="row">
                    <div class="col-md-6">
                      <Pie :chart-options="{ responsive: true }" :chart-data="{
                        labels: ['पुरुष', 'महिला'],
                        datasets: [
                          {
                            backgroundColor: ['#007bff', '#dc3545'],
                            data: [1287997, 1423273],
                          },
                        ],
                      }" />
                      <div class="text-center">2068</div>
                    </div>
                    <div class="col-md-6">
                      <Pie :chart-options="{ responsive: true }" :chart-data="{
                        labels: ['पुरुष', 'महिला'],
                        datasets: [
                          {
                            backgroundColor: ['#007bff', '#dc3545'],
                            data: [1217887, 1334630],
                          },
                        ],
                      }" />
                      <div class="text-center">2078</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </section> -->


      </div>
    </div>

    <!-- <div class="navigation-grid mt-5">
      <router-link v-for="(item, index) in links" :key="index" :to="item.url">
        <span>{{ item.name }}</span>
      </router-link>
    </div> -->
  </div>
</template>

<script>
import { Bar, Pie } from "vue-chartjs/legacy";

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement } from "chart.js";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement);

export default {
  components: { Bar, Pie },

  data() {
    return {
      infoCards: [],
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

.navigation-grid>a {
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

.navigation-grid>a:hover {
  background-color: #2572bc;
  color: #fff;
}
</style>