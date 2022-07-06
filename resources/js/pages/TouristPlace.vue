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
    <h2 class="p-3 font-weight-bold">सुदूरपश्चिमको पर्यटक स्थल</h2>
    <!-- <section v-if="ministryDetails" id="profile-summary">

      <div class="row p-3 background">
        <div v-for="item in ministryDetails" class="col-lg-6 mt-4" :key="item.id">
          <div class="row">
            <div class="col-lg-12">
              <img class="profile-img" :src="item.image_url" :alt="item.name" height="320px" width="100%">
              <div class="name-tab">
                <h4 class="font-weight-bold mt-3 text-center text-white text-uppercase">{{ item.name }}</h4>
                <h5 class="mt-3 text-white text-center text-monospace">{{ item.address }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section> -->


    <div class="row">
      <div v-for="item in touristAreas" class="col-lg-4 mt-4" :key="item.id">
        <div class="cards">
          <div class="slide slide1">
            <div class="content">
              <div class="icon">
                <img class="profile-img" :src="item.image_url" alt="img" :height="'100%'" :width="'100%'" />
                <div class="tourist-place-name">
                  <h5 class="text-center text-uppercase text-monospace">{{ item.name }}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="slide slide2">
            <div class="content">
              <h3 class="font-weight-bold text-uppercase">
                {{ item.name }}
              </h3>
              <p class="text-monospace text-uppercase">{{ item.address }}</p>
            </div>
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
      touristAreas: [],
    }
  },
  mounted() {
    this.fetchMinistryDetail();
  },
  methods: {
    fetchMinistryDetail() {
      axios
        .get("/api/tourist-area")
        .then((response) => {
          this.touristAreas = response.data.data;
          // console.log(this.ministryDetails);
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

/* .profile-img:hover {
  transform: scale(1.1);
} */
.name-tab {
  height: 100px;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.8);
  width: 95%;
  margin-top: -100px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.tourist-place-name {
  background-color: rgba(0, 0, 0, 0.5);
  height: 50px;
  position: relative;
  margin-top: -50px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  transition: 1.2s;

}

.tourist-place-name h5 {
  color: #fff;
}

.container .cards .icon {

  position: absolute;

  top: 0;

  left: 0;

  width: 100%;

  height: 100%;


}

.container .cards .icon .fa {

  position: absolute;

  top: 50%;

  left: 50%;

  transform: translate(-50%, -50%);

  font-size: 80px;

  color: #fff;

}

.container .cards .slide {

  width: 100%;

  height: 300px;

  transition: 0.5s;

}

.container .cards .slide2 {

  width: 100%;

  height: 100px;

  transition: 0.5s;

}

.container .cards .slide.slide1 {

  position: relative;

  display: flex;

  justify-content: center;

  align-items: center;

  z-index: 1;

  transition: .7s;

  transform: translateY(100px);

}

.container .cards:hover .slide.slide1 {

  transform: translateY(0px);

}


.container .cards:hover .tourist-place-name {

  opacity: 0;
  margin-top: 0px;
  /* transform: rotate(360deg); */
  /* width: 0px; */
}

.container .cards .slide.slide2 {

  position: relative;

  display: flex;

  justify-content: center;

  align-items: center;

  padding: 20px;

  box-sizing: border-box;

  transition: .8s;

  transform: translateY(-100px);

  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);

}

.container .cards:hover .slide.slide2 {

  transform: translateY(0);

}

.container .cards .slide.slide2::after {

  content: "";

  position: absolute;

  width: 30px;

  height: 4px;

  bottom: 15px;

  left: 50%;

  left: 50%;

  transform: translateX(-50%);

  background: #2c73df;

}

.container .cards .slide.slide2 .content p {

  margin: 0;

  padding: 0;

  text-align: center;

  color: #414141;

}

.container .cards .slide.slide2 .content h3 {

  margin: 0 0 10px 0;

  padding: 0;

  font-size: 24px;

  text-align: center;

  color: #414141;

}
</style>
