<template>
  <div class="container">
    <!-- <div class="row box p-4" >
            <div class="col-lg-3 mycards">
                <img src="https://thehimalayantimes.com/uploads/imported_images/wp-content/uploads/2018/02/CPN-Maoist-Centre-leader-Trilochan-Bhatta.jpg"  alt="img" >
            </div>
            <div class="col-lg-3">
                <h3 class=" mt-3 font-weight-bold">Bishal Chaudhary</h3>
                <h4 class="">मुख्यमन्त्री</h4>
                <h4 class="">मुख्यमन्त्री तथा मन्त्रीपरिषद</h4>
                <h4 class="">नेकपा (माओवादी केन्द्र)</h4>
            </div>

            <div class="col-lg-3 mycards">
                <img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014__340.jpg"  alt="img" >
            </div>
            <div class="col-lg-3">
                <h3 class=" mt-3 font-weight-bold">Bishal Chaudhary</h3>
                <h4 class="">मुख्यमन्त्री</h4>
                <h4 class="">मुख्यमन्त्री तथा मन्त्रीपरिषद</h4>
                <h4 class="">नेकपा (माओवादी केन्द्र)</h4>
            </div>
        </div> -->
    <h2 class="p-3 font-weight-bold">सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्</h2>
    <section v-if="ministryDetails" id="profile-summary">

      <div class="row p-3 background">
        <div v-for="item in ministryDetails" class="col-lg-6 mt-4">
          <div class="row">
            <div class="col-lg-6">
              <img class="profile-img" :src="'/ministry/' + item.profile" alt="img" :height="'320px'" :width="'100%'">
            </div>
            <div class="col-lg-6">
              <h4 class="font-weight-bold mt-3">{{ item.name }}</h4>
              <h5 class="mt-3">{{ item.post }}</h5>
              <h5 class="mt-3">{{ item.ministry }}</h5>
              <h5 class="mt-3">{{ item.team }}</h5>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
</template>



<script>
export default {

  data() {
    return {
      ministryDetails: [

      ],
    }
  },
  mounted() {
    this.fetchMinistryDetail();
  },
  methods: {
    fetchMinistryDetail() {
      axios
        .get("/api/display-ministry")
        .then((response) => {
          this.ministryDetails = response.data;
          console.log(response.data);
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
.mycards {
  height: 330px;
}

.mycards img {
  height: 100%;
  width: 100%;
  object-fit: fill;
}

.box {
  background-color: white;
  border-radius: 10px;
}

.background {
  background-color: white;
  border-radius: 10px;
}

.profile-img {
  border-radius: 10px;
}

.profile-img:hover {
  transform: scale(1.1);
}
</style>
