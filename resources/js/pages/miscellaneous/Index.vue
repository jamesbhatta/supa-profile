<template>
  <div class="container py-5">
    <h1 class="page-title">विविध</h1>
    <data-viewer :data="geographicalAreaData"></data-viewer>
    <div class="my-5"></div>
    <data-viewer :data="territorialGeographicalAreaData"></data-viewer>
    <div class="my-5"></div>
    <data-viewer :data="districtWiseAreaOfStateData"></data-viewer>
  </div>
</template>

<script>
export default {
  data() {
    return {

      territorialGeographicalAreaData: {
        title: "प्रदेश सरकार मातहतका मन्त्रालय, आयोग, निर्देशनालय र कार्यालयको विवरण",
        labels: ["क्र.स.", "कार्यायलको नाम", "सम्पर्क नम्बर", "इमेल"],
        data: [
          [1, "प्रदेश प्रमुखको कार्यालय", "०९१–५२४२७३","ophsudurpaschim@gmail.com"],
          [2, "मुख्यमन्त्री तथा मन्त्रिपरिषद्को कार्यालय", "","admin.ocmpm@gmail.com"],
          [3, "आर्थिक मामिला मन्त्रालय", "","moeap7@gmail.com"],
          [4, "भौतिक पूर्वाधार विकास मन्त्रालय", "","mopidp7@gmail.com"],
          [5, "उद्योग पर्यटन वन तथा वातावरण मन्त्रालय", "", "moitfesudurpaschim@gmail.com"],
          [6, "सामाजिक विकास मन्त्रालय", "", "mosdkailali07@gmail.com"],
          [7, "भुमिब्यवस्था कृषि तथा सहकारी मन्त्रालय", "","molmac7@gmail.com"],
          [8, "आन्तरिक मामिला तथा कानुन मन्त्रालय", "","moiaffairsandlaw7@gmail.com"],
          [9, "प्रदेश सभा सचिवालय", "","pradeshsabha7@gmail.com"],
          [10, "लोकसेवा आयोग", "","ppsc.p7@gmail.com"],
          [11, "प्रदेश नीति तथा योजना आयोग", "","pppc.supa@gmail.com"],
          [12, "प्रदेश लेखा नियन्त्रक कार्यालय", "","pfcop7@gmail.com"],
          [13, "सामाजिक विकास मन्त्रालय मातहका कार्यालयहरु", "",""],
          [14, "शिक्षा विकास निर्देशनालय", "",""],
          [15, "स्वास्थ्य निर्देशनालय", "",""],
          [16, "आयुर्वेद चिकित्सा प्रतिष्ठान", "",""],
          
        ],
      },

    };
  },
};
</script>


<style scoped>
</style>