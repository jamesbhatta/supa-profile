<template>
    
    <data-viewer :data="territorialGeographicalAreaData">
        <template slot="chart">
            <div class="row">
                <div class="col-md-6">
                    <pie-chart :chart-data="territorialGeographicalAreaPieChartData" :width="200" :height="200">
                    </pie-chart>
                </div>
                <div class="col-md-6">
                    <bar-chart :chart-data="territorialGeographicalAreaChartData" :width="200" :height="200">
                    </bar-chart>
                </div>
            </div>
        </template>
    </data-viewer>
</template>

<script>
export default {
    data() {
        return {
            territorialGeographicalAreaData: {
                title: "प्रदेशगत भौगोलिक क्षेत्रफल",
                labels: ["क्र.स.", "प्रदेश", "क्षेत्रफल (वर्ग कि.मि.)", "प्रतिशत"],
                data: [
                    [1, "प्रदेश १", 25905, 17.55],
                    [2, "मधेश", 9661, 6.54],
                    [3, "बागमती", 20300, 13.75],
                    [4, "गण्डकी", 22585, 15.3],
                    [5, "लुम्बीनी", 17318, 11.73],
                    [6, "कर्णाली", 31873, 21.56],
                    [7, "सुदूरपश्चिम", 19999.25, 13.55],
                    [
                        {
                            colspan: 2,
                            value: "जम्मा",
                        },
                        147641.28,
                        100,
                    ],
                ],
            },
            territorialGeographicalAreaPieChartData: {
                labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", 'लुम्बीनी', 'कर्णाली', 'सुदूरपश्चिम'],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen'],
                        data: ['17.5', '6.54', '13.75', '15.3', '11.73', '21.56', '13.55'],
                    },
                ],
            },
            territorialGeographicalAreaChartData: {
                labels: ["प्रदेश १", "मधेश", "बागमती", "गण्डकी", 'लुम्बीनी', 'कर्णाली', 'सुदूरपश्चिम'],
                datasets: [
                    {
                        backgroundColor: ["#29a8ab", "#5fb96c", "#e6b40f", 'indigo', 'cyan', 'pink', 'yellowgreen'],
                        data: ['25905', '9661', '20300', '22585', '17318', '31873', '19999.25'],
                    },
                ],
            },
         
        }
    }
}
</script>