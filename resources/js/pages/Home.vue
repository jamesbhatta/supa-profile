<template>
  <div class="container py-5">
    <section id="profile-summary">
      <div class="info-grid">
        <div class="info-card">
          <div class="label">क्षेत्रफल</div>
          <div class="value">19,539</div>
        </div>
        <div class="info-card">
          <div class="label">जम्मा जिल्ला</div>
          <div class="value">9</div>
        </div>
        <div class="info-card">
          <div class="label">जनघनत्तो (वर्ग कि.मि.)</div>
          <div class="value">131</div>
        </div>
        <div class="info-card">
          <div class="label">प्रदेशसभा निर्वाचन क्षेत्र</div>
          <div class="value">32</div>
        </div>
        <div class="info-card">
          <div class="label">प्रतिनिधि निर्वाचन क्षेत्र</div>
          <div class="value">16</div>
        </div>
      </div>
    </section>

    <div class="navigation-grid mt-5">
      <router-link v-for="(item, index) in links" :key="index" :to="item.url">
        <span>{{ item.name }}</span>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
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
.info-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.info-card {
  background-color: #fff;
  display: flex;
  border-radius: 6px;
  overflow: hidden;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.info-card .label {
  padding: 30px 20px;
  font-size: 1.1rem;
  color: #303942;
  font-weight: 600;
}

.info-card .value {
  margin-left: auto;
  padding: 30px 15px;
  background-color: #2572bc;
  background-color: #ebf6ff;
  /* color: #fff; */
  color: #2572bc;
  font-size: 1.4rem;
  min-width: 100px;
  text-align: center;
}

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