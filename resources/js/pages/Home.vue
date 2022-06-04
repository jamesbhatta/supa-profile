<template>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-3">
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
        <section id="profile-summary">
          <div class="info-grid">
            <div class="info-card blue-color">
              <div class="value">19,539</div>
              <div class="label">क्षेत्रफल</div>
            </div>
            <div class="info-card green-color">
              <div class="value">9</div>
              <div class="label">जम्मा जिल्ला</div>
            </div>
            <div class="info-card indigo-color">
              <div class="value">27,11,270</div>
              <div class="label">जनसंख्या</div>
            </div>
            <div class="info-card orange-color">
              <div class="value">131</div>
              <div class="label">जनघनत्तो (वर्ग कि.मि.)</div>
            </div>
            <div class="info-card yellow-color">
              <div class="value">32</div>
              <div class="label">प्रदेशसभा निर्वाचन क्षेत्र</div>
            </div>
            <div class="info-card teal-color">
              <div class="value">16</div>
              <div class="label">प्रतिनिधि निर्वाचन क्षेत्र</div>
            </div>
          </div>
        </section>

        <section class="mt-4">
          <div class="row">
            <div class="col-md-6">
              <div class="chart-card">
                <div class="chart-body">
                  <div class="chart-title mb-3">जनसाङ्ख्यिक अवस्था</div>
                  <div class="row">
                    <div class="col-md-6">
                      <Pie
                        :chart-options="{ responsive: true }"
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
                      <div class="text-center">2068</div>
                    </div>
                    <div class="col-md-6">
                      <Pie
                        :chart-options="{ responsive: true }"
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
                      <div class="text-center">2078</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </section>
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
</style>