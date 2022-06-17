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
                                    <a href="#table_1">प्रदेशको आर्थिक सूचकहरु</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_2">राजश्व बाँडफाँड (रु.दश लाखमा)</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_3">प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_4">बजेटको स्रोतको अवस्था</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_5">सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_6">श्रम तथा रोजगारको अवस्था</a>
                                </li>

                                <li class="my-3">
                                    <a href="#table_7">प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="container py-5">
                        <h1 class="page-title">आर्थिक अवस्था</h1>

                        <data-viewer :data="provinceEconomicData"></data-viewer>

                        <data-viewer :data="statusofRevenueSharing">
                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="statusofRevenueSharingChartData" :width="200"
                                            :height="200"></pie-chart>
                                    </div>
                                    <div class="col-md-6">
                                        <bar-chart :chart-data="statusofRevenueSharingChartData" :width="200"
                                            :height="200"></bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>

                        <data-viewer :data="RevenueReceivedState"></data-viewer>

                        <data-viewer :data="BudgetResourcesStatus">

                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="BudgetResourcesStatusChartData" :width="200"
                                            :height="200"></pie-chart>
                                    </div>
                                    <div class="col-md-6">
                                        <bar-chart :chart-data="BudgetResourcesStatusChartData" :width="200"
                                            :height="200"></bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>

                        <data-viewer :data="supabudget">
                            <template slot="thead-top">
                                <tr>
                                    <th colspan="2"></th>
                                    <th colspan="3" class="bg-light text-center font-weight-bold">बजेट (रु. हजारमा)</th>
                                    <th colspan="6" class="bg-light text-center font-weight-bold">खर्च (रु. हजारमा)</th>
                                </tr>
                            </template>
                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="supabudgetChartData" :width="200" :height="200">
                                        </pie-chart>
                                    </div>
                                    <div class="col-md-6">
                                        <bar-chart :chart-data="supabudgetChartData" :width="200" :height="200">
                                        </bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>

                        <data-viewer :data="LaborandEmploymentStatus">
                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="LaborandEmploymentStatusChartData" :width="200"
                                            :height="200"></pie-chart>
                                    </div>
                                    <div class="col-md-6">
                                        <bar-chart :chart-data="LaborandEmploymentStatusChartData" :width="200"
                                            :height="200"></bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>

                        <data-viewer :data="StateGovernmentHarukoDetails">

                            <template slot="chart">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pie-chart :chart-data="StateGovernmentHarukoDetailsChartData" :width="200"
                                            :height="200"></pie-chart>
                                    </div>
                                    <div class="col-md-6">
                                        <bar-chart :chart-data="StateGovernmentHarukoDetailsChartData" :width="200"
                                            :height="200"></bar-chart>
                                    </div>
                                </div>
                            </template>
                        </data-viewer>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</template>

<script>
export default {
    data() {
        return {
            // provinceEconomicData: {
            //     id:'table_1',
            //     title: "प्रदेशको आर्थिक सूचकहरु",
            //     labels: ["क्र.स.", "विवरण", "सूचक (प्रतिशत)"],
            //     data: [
            //         [1, "कूल गार्हस्थ उत्पादन (आ.व. ०७७÷७८) ", 6.9],
            //         [2, "आर्थिक बृद्धि दर (आ.व. ०७७÷७८)", 3.56],
            //         [3, "कूल गार्हस्थ उत्पादनमा कृषि क्षेत्रको योगदान (आ.व. ०७७÷७८)", 36.1],
            //         [4, "कूल गार्हस्थ उत्पादनमा उद्योग क्षेत्रको योगदान (आ.व. ०७७÷७८)", 13.2],
            //         [5, "कूल गार्हस्थ उत्पादनमा सेवा क्षेत्रको योगदान (आ.व. ०७७÷७८)", 50.7],
            //         [6, "संघीय अनुदान तथा राजश्वको अंश", 13.02 + "(प्रतिशत)"],
            //         [7, "प्रतिब्यक्ति आय (आ.व. ०७७÷७८)", 685 + "(अमेरिकी डलर)"],
            //         [8, "बहुआयामिक गरिबी दर", 25.3],
            //         [9, "बहुआयामिक गरीबी सूचकाङ्क (MPI)", 0.105],
            //         [10, "मानव विकास सूचकाङ्क", 0.547],
            //         [11, "लैङ्गिक विकास सूचकाङ्क(GDI)", 0.903],
            //         [12, "लैङ्गिक असमानता सूचकाङ्क", 0.522],
            //         [13, "बेरोजगारी दर", 11.5],
            //         [14, "राजश्व असुली (आ.व. ०७७÷७८)", 152.10],
            //         [15, "राजश्व असुली (आ.व. ०७६÷७७)", 105.89],
            //         [16, "राजश्व असुली (आ.व. ०७५÷७६)", 51.84],
            //         [17, "बैक तथा वित्तिय संस्था", 777],



            //     ],
            // },
            provinceEconomicData: {
                id: 'table_1',
                title: "प्रदेशको आर्थिक सूचकहरु",
                labels: ["क्र.स.", "विवरण", "सूचक (प्रतिशत)"],
                data: [


                ],
            },

            // statusofRevenueSharing: {
            //     id:'table_2',
            //     title: "राजश्व बाँडफाँड (रु.दश लाखमा)",
            //     labels: ["प्रदेश", "राजश्व बाँडफाँड", "प्रतिशत", "स्थानीय तह", "राजश्व बाँडफाँड", "प्रतिशत"],
            //     data: [
            //         ["प्रदेश १", 457, 15.6, 137, 524, 17.8],
            //         ["मधेश", 434, 14.8, 136, 538, 18.3],
            //         ["बागमती", 460, 15.7, 119, 479, 16.3],
            //         ["गण्डकी", 381, 12.9, 85, 298, 10.1],
            //         ["लुम्बीनी", 438, 14.8, 109, 492, 16.7],
            //         ["कर्णाली", 384, 13.0, 79, 266, 9.1],
            //         ["सुदूरपश्चिम", 384, 13.2, 88, 344, 11.7],
            //         ["जम्मा", 2941, 100.0, 753, 2941, 100.0],
            //     ],
            // },

            statusofRevenueSharing: {
                id: 'table_2',
                title: "राजश्व बाँडफाँड (रु.दश लाखमा)",
                labels: ["प्रदेश", "राजश्व बाँडफाँड", "प्रतिशत", "स्थानीय तह", "राजश्व बाँडफाँड", "प्रतिशत"],
                data: [

                ],
            },

            statusofRevenueSharingChartData: {
                labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", "लुम्बीनी", "कर्णाली", "सुदूरपश्चिम"],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'red', 'pink', 'purple', 'grey'],
                        data: [17.8, 18.3, 16.3, 10.1, 16.7, 9.1, 11.7],
                    },
                ],
            },

            // RevenueReceivedState: {
            //     id:'table_3',
            //     title: "प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण",
            //     labels: ["क्र.स.", "शिर्षक", "रकम"],
            //     data: [
            //         [1, "बाँडफाँडबाट प्राप्त हुने घरजग्गा रजिष्ट्रेशन दस्तुर", '३३९४९१९५५८'],
            //         [2, "बाँडफाँडबाट प्राप्त हुने मुल्य अभिबृद्धि कर", '५२१८२३२७४६'],
            //         [3, "बाँडफाँडबाट प्राप्त हुने अन्तशुल्क", '१५१०५२४४३३'],
            //         [4, "बाँडफाँडबाट प्राप्त हुने सवारी साधन कर", '३१९२२७७६८'],
            //         [5, "बाँडफाँडबाट प्राप्त हुने विज्ञापन कर", '७६२४५७'],
            //         [6, "व्यवसाय कर", '८२५००'],
            //         [7, "सरकारी सम्पत्तिको बहालबाट प्राप्त आय", '४४०५७१'],
            //         [8, "बाँडफाँडबाट प्राप्त वन रोयल्टी", '३८४४६३८६'],
            //         [9, "बाँडफाँडबाट प्राप्त खानी तथा खनिज सम्बन्धी रोयल्टी", '४३०१६'],
            //         [10, "बाँडफाँडबाट प्राप्त विद्युत रोयल्टी", '६५७३२९४'],
            //         [11, "बाँडफाँडबाट प्राप्त दहत्तर बहत्तरको विक्रीबाट प्राप्त रोयल्टी", '३१०४८०८'],
            //         [12, "बाँडफाँडबाट प्राप्त पर्वतारोहण रोयल्टी", '३५८०४'],
            //         [13, "कृषि उत्पादनको विक्रीबाट प्राप्त रकम", '१०१८२५२०'],
            //         [14, "सरकारी सम्पत्तिको विक्रीबाट प्राप्त रकम", '१००७२६९'],
            //         [15, "अन्य विक्रीबाट प्राप्त रकम", '४१२२१८'],
            //         [16, "न्यायिक दस्तुर", '१२४०५'],
            //         [17, "शिक्षा क्षेत्रको आम्दानी", '२७९८००'],
            //         [18, "परीक्षा शुल्क", '१५०४८५०'],
            //         [19, "यातायात क्षेत्रको आम्दानी", '२५८३२६६०'],
            //         [20, "अन्य प्राशासनिक सेवा शुल्क", '२२१५८३९३'],
            //         [21, "व्यवसाय रजिष्ट्रेशन शुल्क", '३६२८९००७'],
            //         [22, "चालक अनुमति पत्र सवारी दर्ता किताब (ब्लु बुक) सम्बन्धी दस्तुर", '१८३५०'],
            //         [23, "न्यायिक दण्ड, जरिवाना र जफत", '१८३५०'],
            //         [24, "प्रशासनिक दण्ड, जरिवाना र जफत", '३९०६९९०'],
            //         [25, "धरौटी सदरस्याहा", '५३५५७८'],
            //         [26, "अन्य राजश्व", '४८६'],
            //         [27, "बेरुजु", '३६९२४९२१'],
            //         [28, "निकास फिर्ता", '६७८५३९७७'],
            //         [29, "अनुदान फिर्ता", '३०३०३२८४३'],
            //         [30, "सवारी साधन कर", '५२८५२८५६५'],
            //         [31, "वन क्षेत्रको रोयल्टी", '७९३७८१४१'],
            //         [{
            //             colspan: 2,
            //             value: "जम्मा",
            //         },
            //             '८६७६२६५७०१'
            //         ],
            //     ],
            // },

            RevenueReceivedState: {
                id: 'table_3',
                title: "प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण",
                labels: ["क्र.स.", "शिर्षक", "रकम"],
                data: [],
            },

            // BudgetResourcesStatus: {
            //     id: 'table_4',
            //     title: "बजेटको स्रोतको अवस्था ",
            //     labels: ["क्र.स.", "आय तथा राजश्व", "रकम (रु.हजारमा)"],
            //     data: [
            //         [1, "आन्तरिक राजश्व", '१०८०३२२'],
            //         [2, "राजश्व बाँडफाँड", '७९२९१००'],
            //         [3, "रोयल्टी बाँडफाँड", '३९४६३'],
            //         [4, "वित्तिय समानीकरण अनुदान", '८५४४०००'],
            //         [5, "सशर्त अनुदान", '४१९३३००'],
            //         [6, "समपुरक अनुदान", '१२२९४००'],
            //         [7, "विशेष अनुदान", '६१३५००'],
            //         [8, "बैदेशिक सहायता", '२४६१०'],
            //         [9, "गत आबको बचत", '६६८३९६१'],

            //         [{
            //             colspan: 2,
            //             value: "आब ०७८÷७९ को कुल बजेट",
            //         },
            //             '३०३३९४५५'
            //         ],
            //     ],
            // },

            BudgetResourcesStatus: {
                id: 'table_4',
                title: "बजेटको स्रोतको अवस्था ",
                labels: ["क्र.स.", "आय तथा राजश्व", "रकम (रु.हजारमा)"],
                data: [],
            },

            BudgetResourcesStatusChartData: {
                labels: ["आन्तरिक राजश्व", "राजश्व बाँडफाँड", "रोयल्टी बाँडफाँड", "वित्तिय समानीकरण अनुदान", "सशर्त अनुदान", "समपुरक अनुदान", "विशेष अनुदान", "बैदेशिक सहायता", "गत आबको बचत"],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'red', 'pink', 'purple', 'grey', 'silver', 'green'],
                        data: [1080322, 7929100, 39463, 8544000, 4193300, 1229400, 613500, 24610, 6683961],
                    },
                ],
            },

            // 4.5
            //To be develop
            // supabudget: {
            //     id: 'table_5',
            //     title: "सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था",
            //     labels: ["क्र.स.", "आर्थिक वर्ष", "चालु", "पुँजीगत", "जम्मा", "चालु", "प्रतिशत", "पुँजीगत", "प्रतिशत", "जम्मा", "प्रतिशत"],
            //     data: [
            //         [1, "074/075", 843400, 177100, 1020500, 165817, 19.66, 93999, 53.08, 259816, 25.5],
            //         [2, "075/076", 13350800, 11714814, 25065614, 6930792, 51.91, 7232608, 61.74, 14163400, 56.5],
            //         [3, "076/077", 15094836, 13067199, 28162035, 8403434, 55.67, 9288578, 71.08, 17692012, 62.8],
            //         [4, "077/078", 16402360, 18242639, 34644999, 10444795, 63.68, 12700680, 69.62, 23145475, 66.8],
            //         [5, "078/079", 12447899, 18030106, 30478005, 1910495, 15.35, 812258, 4.51, 2722753, 8.9],
            //     ],
            // },
            supabudget: {
                id: 'table_5',
                title: "सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था",
                labels: ["क्र.स.", "आर्थिक वर्ष", "चालु", "पुँजीगत", "जम्मा", "चालु", "प्रतिशत", "पुँजीगत", "प्रतिशत", "जम्मा", "प्रतिशत"],
                data: [
                ],
            },

            supabudgetChartData: {
                labels: ["074/075", "075/076", "076/077", "077/078", "078/079",],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'red', 'pink'],
                        data: [25.5, 56.5, 62.8, 66.8, 8.9],
                    },
                ],
            },

            LaborandEmploymentStatus: {
                id: 'table_6',
                title: "श्रम तथा रोजगारको अवस्था",
                labels: ["प्रदेश", "बेरोजगारी", "जनसंख्याको अनुपातमा बेरोजगारी", "श्रमशक्तिमा सहभागिताको दर"],

                data: [
                    ["प्रदेश १", '१०.२', '३४', '३७.८'],
                    ["मधेश", '२०.१', '३१.८', '३९.७'],
                    ["बागमती", '७', '४३.८', '४७.१'],
                    ["गण्डकी", '९', '३२.५', '३५.७'],
                    ["लुम्बीनी", '११.२', '३३.१', '३७.३'],
                    ["कर्णाली", '९.७', '२४.८', '२७.७'],
                    ["सुदूरपश्चिम", '११.५', '२४.१', '२७.३'],
                    ["नेपाल", '११.४', '३४.२', '३८.५'],
                ],
            },

            LaborandEmploymentStatusChartData: {
                labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", "लुम्बीनी", "कर्णाली", "सुदूरपश्चिम"],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'red', 'pink', 'blue', 'green'],
                        data: [10.2, 20.1, 7, 9, 11.2, 9.7, 11.5, 11.4],
                    },
                ],
            },

            StateGovernmentHarukoDetails: {
                id: 'table_7',
                title: "प्रदेशमा दर्ता भएका सहकारीहरुको विवरण",
                labels: ["क्र.स.", "बेरोजगारी", "बहुउद्देश्यीय", "कृषि", "ऋण तथा बचत", "स्वास्थ्य", "सञ्चार", "विधुत", "जडिबुटी", "वतावरण संरक्षण", "प्रकाशन", "अन्य", "जम्मा"],
                data: [
                    [1, "कैलाली", '23', '31', '22', '', '', '10', '', '2', '1', '5', '94'],
                    [2, "कञ्चनपुर", '24', '27', '19', '1', '', '6', '', '', '', '11', '88'],
                    [3, "डडेलधुरा", '2', '4', '3', '2', '', '', '2', '', '', '9', '22'],
                    [4, "बैतडी", '2', '9', '17', '', '', '2', '1', '', '', '1', '32'],
                    [5, "दार्चुला", '', '4', '18', '', '', '', '', '', '', '2', '24'],
                    [6, "डोटी", '3', '', '6', '', '', '', '', '', '', '1', '10'],
                    [7, "अछाम", '12', '1', '16', '', '', '2', '', '', '', '5', '36'],
                    [8, "बझाङ", '3', '2', '12', '', '', '', '', '', '', '1', '18'],
                    [9, "बाजुरा", '4', '7', '15', '1', '2', '', '', '', '', '2', '31'],
                    [{
                        colspan: 2,
                        value: "जम्मा",
                    },
                        '73',
                        '85',
                        '128',
                        '4',
                        '2',
                        '20',
                        '3',
                        '2',
                        '1',
                        '37',
                        '355',
                    ],
                ],
            },

            StateGovernmentHarukoDetailsChartData: {
                labels: ["कैलाली", "कञ्चनपुर", "डडेलधुरा", "बैतडी", "दार्चुला", "डोटी", "अछाम", "बझाङ", "बाजुरा",],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'red', 'pink', 'green', 'blue', 'brown', 'grey'],
                        data: [94, 55, 22, 32, 24, 10, 66, 18, 31],
                    },
                ],
            },
        };
    },

    mounted() {
        this.fetchEconomicIndicator();
        this.fetchRevenueSharing();
        this.fetchRevenue();
        this.fetchBudgetResource();
        this.fetchTotalBudget();
    },

    methods: {
        fetchEconomicIndicator() {
            axios
                .get("/api/economic-indicator")
                .then((response) => {
                    this.provinceEconomicData.labels = response.data.labels;
                    this.provinceEconomicData.data = response.data.data
                    this.infoDatas = response.data;
                })
                .catch((error) => console.log(error));
        },

        fetchRevenueSharing() {
            axios
                .get("/api/revenue-sharing")
                .then((response) => {
                    this.statusofRevenueSharing.labels = response.data.labels;
                    this.statusofRevenueSharing.data = response.data.data
                    this.infoDatas = response.data;
                })
                .catch((error) => console.log(error));
        },
        fetchRevenue() {
            axios
                .get("/api/revenue")
                .then((response) => {
                    this.RevenueReceivedState.labels = response.data.labels;
                    this.RevenueReceivedState.data = response.data.data
                    this.infoDatas = response.data;
                })
                .catch((error) => console.log(error));
        },
        fetchBudgetResource() {
            axios
                .get("/api/budget-resource")
                .then((response) => {
                    this.BudgetResourcesStatus.labels = response.data.labels;
                    this.BudgetResourcesStatus.data = response.data.data
                    this.infoDatas = response.data;
                    console.log(response.data);
                })
                .catch((error) => console.log(error));
        },

        fetchTotalBudget() {
            axios
                .get("/api/total-budget")
                .then((response) => {
                    this.supabudget.labels = response.data.labels;
                    this.supabudget.data = response.data.data
                    this.infoDatas = response.data;
                    console.log(response.data);
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>
