<template>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container" style="">
      <!-- Navbar brand -->
      <router-link class="d-flex align-items-center" to="/">
        <img src="https://fra.mofaga.gov.np/static/media/logo.940ff832.svg" height="50px" />
        <div class="ml-3 navbar-brand text-main">
          <div class="font-weight-bold">सुदूरपश्चिम प्रदेश प्रोफाइल</div>
          <div class="font-weight-bold">Profile of Sudur Paschim Province</div>
        </div>
      </router-link>

      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">
        <!-- Links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">गृह पृष्ठ</router-link>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">डाटासेटहरु</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
              <router-link class="dropdown-item" v-for="(item, index) in links" :key="index" :to="item.url">
                <span>{{ item.name }}</span>
              </router-link>
            </div>
          </li>
        </ul>
        <!-- Links -->
      </div>
      <!-- Collapsible content -->
    </div>
  </nav>
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
#navbar {
  background: linear-gradient(to right, #3f0fb7, #1e78de);
  box-shadow: 0 3px 6px 0 rgb(0 0 0 / 12%) !important;
  font-family: "Roboto", sans-serif;
}
</style>