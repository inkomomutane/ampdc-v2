import axios from "axios";
import { route as routeFn} from "ziggy-js";
import ApexCharts from "apexcharts";
document.addEventListener("DOMContentLoaded", function () {

    if(document.querySelector("#anualChart") !== null) {
        const JsonAnualReports = axios.get(routeFn('api.reports.year'));
        JsonAnualReports.then((response) => {
            console.log(response.data);
            let chart = new ApexCharts(document.querySelector("#anualChart"), {
                series: [{
                    name: 'Casos violência registados este ano',
                    data:  response.data.values
                },{
                    name: 'Casos violência resolvidos',
                    data:  response.data.solvedValues
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: response.data.labels
                },
                plotOptions: {
                    bar: {
                        columnWidth: "60%",
                    },
                },
                colors: ["#ff0000", "#00b500"],
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    customLegendItems: ["Casos registados", "Casos resolvidos"  ],
                    markers: {
                        fillColors: ["#ff0000", "#00b500"],
                    },
                },
            });
             chart.render();
        });
    }

});
