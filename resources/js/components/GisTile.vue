<template>
  <div id="gis-wrapper">
    <vue-iframe :src="src" allow="camera *; geolocation *; microphone *; autoplay *" @load="onLoad" @iframe-load="iframeLoaded" name="my-frame" width="150px" :height="height" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      src: "https://sthaniya.gov.np/gis",
      myIframe: null,
      height: "300px",
    };
  },
  methods: {
    onLoad(frame) {
      this.myIframe = frame.contentWindow;
      this.height = this.myIframe.document.documentElement.scrollHeight + "px";
    },

    iframeLoaded(frame) {},
  },
};
</script>

<style scoped>
#gis-wrapper {
  height: 800px;
}

@media screen AND (min-width: 700px) {
  #gis-wrapper {
    height: 800px;
  }
}

@media screen AND (min-width: 1200px) {
  #gis-wrapper {
    height: 1325px;
  }
}
</style>