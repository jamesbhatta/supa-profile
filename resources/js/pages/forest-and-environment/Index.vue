<template>
    <div class="container py-5">
        <h1 class="page-title">वन क्षेत्रको प्रदेशगत विवरण</h1>
        <data-viewer :data="TerritorialDetailsofForestArea">
            <template slot="chart">
                <div class="row">
                    <div class="col-md-6">
                        <pie-chart :chart-data="TerritorialDetailsofForestAreaChartData"></pie-chart>
                    </div>

                    <div class="col-md-6">
                        <bar-chart :chart-data="TerritorialDetailsofForestAreaChartData"></bar-chart>
                    </div>
                </div>
            </template>
        </data-viewer>
        <div class="my-5"></div>
        <data-viewer :data="NationalParksintheFarWesternStates"></data-viewer>
        <div class="my-5"></div>
        <data-viewer :data="GlaciersRiversandLakesintheFarWest">
             <template slot="chart">
                <div class="row">
                    <div class="col-md-6">
                        <pie-chart :chart-data="GlaciersRiversandLakesintheFarWestChartData"></pie-chart>
                    </div>

                    <div class="col-md-6">
                        <bar-chart :chart-data="GlaciersRiversandLakesintheFarWestChartData"></bar-chart>
                    </div>
                </div>
            </template>
        </data-viewer>
        <div class="my-5"></div>
        <data-viewer :data="LakesandPondsintheFarWest"></data-viewer>
        <div class="my-5"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {


            TerritorialDetailsofForestArea: {
                title: "वन क्षेत्रको प्रदेशगत विवरण",
                labels: ["प्रदेश", "प्रदेशको क्षेत्रफल (हे.)", "वन क्षेत्र (हे.)", "नेपालको कूल वन क्षेत्रको हिस्सा (प्रतिशत)", "प्रदेशको कूल भूभागको तुलनामा वन क्षेत्रफल (प्रतिशत)",
                ],
                data: [
                    ["प्रदेश १", '२५९०५००', '११३४२५०', '१७.१६', '४३.७८'],
                    ["मधेश", '९६६१००', '२६३६३०', '३.९९', '२७.२९'],
                    ["बागमती", '२०३००००', '१०९०८८०', '१६.५०', '५३.७४'],
                    ["गण्डकी", '२१५०४००', '८१७२९०', '१२.३६', '३८.०१'],
                    ["लुम्बीनी", '२२२८८००', '९७४३८०', '१४.७४', '४३.७२'],
                    ["कर्णाली", '२७९८४००', '११८३४००', '१७.९०', '४२.२९'],
                    ["सुदूरपश्चिम", '१९५३९००', '११४६११०', '१७.३४', '५८.६६'],
                    ["जम्मा", '१४७१८१००', '६६०९९४०', '१००.००', '४४.७४'],
                ],
            },

            TerritorialDetailsofForestAreaChartData: {
                labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", "लुम्बीनी", "कर्णाली", "सुदूरपश्चिम"],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'blue', 'pink', 'purple'],
                        data: [43.78, 27.29, 53.74, 38.01, 43.72, 42.29, 58.66],
                    },
                ],
            },

            NationalParksintheFarWesternStates: {
                title: "सुदूरपश्चिम प्रदेशमा रहेका राष्ट्रिय निकुञ्ज",
                labels: ["क्र.स.", "नाम", "घोषणा बर्ष", "क्षेत्रफल", "भूगोल",
                ],
                data: [
                    ["१", "खप्तड राष्ट्रिय निकुञ्", "सन् १९८४", "२२५ बर्ग किमि", "मध्य पहाड"],
                    ["२", "शुक्लाफाँटा राष्ट्रिय निकुञ्", "सन् १९७६", "३०५ बर्ग किमि", "तराई"],
                ],
            },
            GlaciersRiversandLakesintheFarWest: {
                title: "सुदूरपश्चिममा रहेका हिमनदी र हिमतालहरु",
                labels: ["प्रकार", "जम्मा सङ्ख्या", "कूल क्षेत्रफल (बर्ग किमि)",

                ],
                data: [
                    ["हिमनदी (GLACIERS)", '१६४', '११२.५'],
                    ["हिमताल (GLACIERS Lakes)", '९', '०.१३७'],
                ],
            },

            GlaciersRiversandLakesintheFarWestChartData: {
                labels: ["हिमनदी", "हिमताल"],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c"],
                        data: [164, 9],
                    },
                ],
            },


            LakesandPondsintheFarWest: {
                title: " सुदूरपश्चिममा रहेका तालतलैया",
                labels: [
                    "क्र.स.",
                    "जिल्ला",
                    "जम्मा",
                    "१०० मिटर भन्दा कम मिटर उचाइमा",
                    "१००–४९९ मिटर",
                    "५००–१९९९ मिटर",
                    "२०००–२९९९ मिटर",
                    "३०००–४९९९ मिटर",
                    "५ हजार मिटर भन्दा माथि",

                ],
                data: [

                    [1, "बाजुरा", '५७', '', '', '', '५', '४५', '७'],
                    [2, "अछाम", '१३', '', '', '३', '७', '३', ''],
                    [3, "बझाङ", '२५', '', '', '', '२', '१९', '४'],
                    [4, "डोटी", '१९', '', '', '९', '४', '६', ''],
                    [5, "कैलाली", '११४', '', '११३', '१', '', '', ''],
                    [6, "कञ्चनपुर", '८५', '२', '७९', '४', '', '', ''],
                    [7, "डडेलधुरा", '२', '', '', '२', '', '', ''],
                    [8, "बैतडी", '१', '', '', '१', '', '', ''],
                    [9, "दार्चुला", '१९', '', '', '१', '', '१६', '२'],
                ],
            },























        };
    },
};
</script>


<style scoped>
</style>