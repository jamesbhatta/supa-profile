<template>

    <div class="container-fluid my-div">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 side-client-menus">

                    <div class="col-xl-12 col-lg-12 col-md-12 main-content">
                        <div style="height: 80px;"></div>
                        <div class="list-set">
                            <ul class="table-list " style="overflow: auto;">
                                <li class="my-3">
                                    <a href="#table_1">वन क्षेत्रको जिल्लागत विवरण</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_2">वन क्षेत्रको प्रदेशगत विवरण</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_3">सुदूरपश्चिम प्रदेशमा रहेका राष्ट्रिय निकुञ्ज</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_4">सुदूरपश्चिममा रहेका हिमनदी र हिमतालहरु</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_5">सुदूरपश्चिममा रहेका तालतलैया</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="container py-5">
                        <h1 class="page-title">वन क्षेत्रको प्रदेशगत विवरण</h1>
                        <data-viewer :data="DistrictWiseForestData">
                            <template slot="thead-top">
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">सामूदायिक वन</th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">कबुलियती वन</th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">धार्मिक वन</th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">साझेदारी वन</th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">वैज्ञानिक वन</th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">वन संरक्षण क्षेत्र
                                    </th>
                                    <th colspan="2" class="bg-light text-center font-weight-bold">निजी वन</th>
                                </tr>
                            </template>
                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="DistrictWiseForestChartData"></pie-chart>
                                    </div>

                                    <div class="col-md-6">
                                        <bar-chart :chart-data="DistrictWiseForestChartData"></bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>
                        <div class="my-5"></div>

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
                                        <pie-chart :chart-data="GlaciersRiversandLakesintheFarWestChartData">
                                        </pie-chart>
                                    </div>

                                    <div class="col-md-6">
                                        <bar-chart :chart-data="GlaciersRiversandLakesintheFarWestChartData">
                                        </bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>
                        <div class="my-5"></div>
                        <data-viewer :data="LakesandPondsintheFarWest"></data-viewer>
                        <div class="my-5"></div>
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
            DistrictWiseForestData: {
                id:'table_1',
                title: "वन क्षेत्रको जिल्लागत विवरण",
                labels: ["क्र.स.", "जिल्ला", "वनको क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)", "संख्या", "क्षेत्रफल (हे.)",
                ],
                data: [
                    [1, "कैलाली", 200570, 553, 74237.34, 0, 0, 14, 188, 2, 4344.59, 94, 25684.4, 1, 69001, 79, 75.11],
                    [2, "कञ्चनपुर", 78800, 139, 19570, 26, 39.7, 11, 116, 0, 0, 12, 3332.7, 1, 29642, 182, 110.2],
                    [3, "डडेलधुरा", 113310, 786, 55181.22, 177, 906.72, 7, 76.7, 0, 0, 5, 1315.46, "1 (प्रस्तावित)", 53014, 4, 1.163],
                    [4, "बैतडी", 93180, 362, 33427.57, 174, 479.6, 0, 0, 0, 0, 2, 614.07, "2 (प्रस्तावित)", 5878.3, 3, 2.4],
                    [5, "डोटी", 15300, 391, 36819, 215, 941.4, 1, 3, 0, 0, 8, 2483.41, "1 (प्रस्तावित)", 21618, 7, 5.23],
                    [6, "अछाम", 108910, 408, 42818.23, 166, 640.42, 2, 6, 0, 0, 4, 213.29, "1 (प्रस्तावित)", 3051.3, 1, 1.158],
                    [7, "दार्चुला", 107750, 170, 7189.7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 6],
                    [8, "बझाङ", 155360, 401, 34575.01, 121, 2243.87, 3, 2285, 0, 0, 0, 0, 0, 0, 13, 8.5],
                    [9, "बाजुरा", 135230, 307, 19999, 163, 2030.89, 1, 0.38, 0, 0, 1, 229.6, 0, 0, 12, 6.42],
                    ["जम्मा", "", 1146110, 3217, 323816.9, 1042, 7282.6, 39, 2675.1, 2, 4344.59, 126, 33872.9, "", 182204, 303, 216.2]
                ],
            },

            DistrictWiseForestChartData: {
                labels: ["कैलाली", "कञ्चनपुर", "डडेलधुरा", "बैतडी", "डोटी", "अछाम", "दार्चुला", "बझाङ", "बाजुरा",],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'blue', 'pink', 'red', 'gray', 'purple', 'brown'],
                        data: [200570, 78800, 113310, 93180, 15300, 108910, 107750, 155360, 135230],
                    },
                ],
            },

            TerritorialDetailsofForestArea: {
                id:'table_2',
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
                id:'table_3',
                title: "सुदूरपश्चिम प्रदेशमा रहेका राष्ट्रिय निकुञ्ज",
                labels: ["क्र.स.", "नाम", "घोषणा बर्ष", "क्षेत्रफल", "भूगोल",
                ],
                data: [
                    ["१", "खप्तड राष्ट्रिय निकुञ्", "सन् १९८४", "२२५ बर्ग किमि", "मध्य पहाड"],
                    ["२", "शुक्लाफाँटा राष्ट्रिय निकुञ्", "सन् १९७६", "३०५ बर्ग किमि", "तराई"],
                ],
            },
            GlaciersRiversandLakesintheFarWest: {
                id:'table_4',
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
                id:'table_5',
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