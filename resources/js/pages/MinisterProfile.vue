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
        
        <section v-if="infoCards" id="profile-summary">
        
          <div class="info-grid">
            <a v-for="item in infoCards" class="info-card" >
              <div class="value">{{ item.name}}</div>
              <div class="label">{{ item }}</div>
            </a>
          </div>
        </section>
    </div>
</template>



<script>
export default {
  
  data() {
    return {
        infoCards:[

        ],
    }
  },
   mounted() {
    this.fetchInfoCards();
  },
  methods: {
    fetchInfoCards() {
      axios
        .get("/api/display-ministry")
        .then((response) => {
          this.infoCards = response.data;
          console.log(response.data);
        })
        .catch((error) => console.log(error));
    },
  },};
</script>

<style>
    .mycards{
        height: 330px;
    }
    .mycards img{
        height: 100%;
        width: 100%;
        object-fit: fill;
    }
    .box{
        background-color: white;
        border-radius: 10px;
    }
</style>
