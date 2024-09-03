import axios from "axios";
import { route as routeFn } from "ziggy-js";
import ApexCharts from "apexcharts";
document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector("#anualChart") !== null) {
        const JsonAnualReports = axios.get(routeFn("api.reports.year"));
        JsonAnualReports.then((response) => {
            let chart = new ApexCharts(document.querySelector("#anualChart"), {
                series: [
                    {
                        name: "Casos violência registados este ano",
                        data: response.data.values,
                    },
                    {
                        name: "Casos violência resolvidos",
                        data: response.data.solvedValues,
                    },
                ],
                chart: {
                    height: 350,
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: "smooth",
                },
                xaxis: {
                    categories: response.data.labels,
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
                    customLegendItems: ["Casos registados", "Casos resolvidos"],
                    markers: {
                        fillColors: ["#ff0000", "#00b500"],
                    },
                },
            });
            chart.render();
        });
    }

    if (document.querySelector("#violenceTypeChart") !== null) {
        const JsonAnualViolenceTypeReport = axios.get(
            routeFn("api.reports.violence-type"),
        );
        JsonAnualViolenceTypeReport.then((response) => {
            console.log(response.data);
            let options = {
                series: response.data.values,
                chart: {
                    type: "line",
                    height: 350,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                    },
                },
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [4],
                },
                stroke: {
                    show: true,
                    width: [0, 0, 0, 2],
                    colors: ["#ff0000"],
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 0,
                        stops: [0, 90, 100],
                    },
                },
                xaxis: {
                    categories: response.data.labels,
                },
                yaxis: {
                    title: {
                        text: "Casos registados de violência",
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (val: any) {
                            return val + " Casos registados";
                        },
                    },
                },
            };
            let chart = new ApexCharts(
                document.querySelector("#violenceTypeChart"),
                options,
            );
            chart.render();
        });
    }

    if (document.querySelector("#period-of-act") !== null){
        const jsonPeriodOfAct = axios.get(routeFn("api.reports.period-of-act"));

        jsonPeriodOfAct.then((response) => {
        var options = {
            series: response.data.values,
            chart: {
                width: '100%',
                height: '100%',
                type: 'pie',
            },
            colors: ['#ea1a58', '#b70c59', '#39539E', '#0077B5'],
            labels: response.data.labels,
            responsive: [
                {
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 600,
                        },
                        legend: {
                            position: 'bottom',
                        },
                    },
                },
            ],
            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: -5,
                    },
                },
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0,
                },
            },
            dataLabels: {
                formatter(val :any, opts:any
                ) {
                    const name = opts.w.globals.labels[opts.seriesIndex]
                    return [name, val.toFixed(1) + '%']
                },
            },
            legend: {
                show: false,
            },
        };

        var chart = new ApexCharts(document.querySelector("#period-of-act"), options);
        chart.render();

    });
    }


    if (document.querySelector("#violence_reason") !== null){
        const jsonPeriodOfAct = axios.get(routeFn("api.reports.violence-reason"));

        jsonPeriodOfAct.then((response) => {
            var options = {
                series: response.data.values,
                chart: {
                    width: '100%',
                    height: '100%',
                    type: 'pie',
                },
                colors: ['#ea1a58', '#b70c59', '#39539E', '#0077B5'], labels: response.data.labels,
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 600,
                            },
                            legend: {
                                position: 'bottom',
                            },
                        },
                    },
                ],

                grid: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: 0,
                        right: 0,
                    },
                },
                dataLabels: {
                    formatter(val :any, opts:any
                    ) {
                        const name = opts.w.globals.labels[opts.seriesIndex]
                        return [name, val.toFixed(1) + '%']
                    },
                },
                legend: {
                    show: false,
                },
            };

            let chartJ = new ApexCharts(document.querySelector("#violence_reason"), options);
            chartJ.render();

        });
    }

    if (document.querySelector("#violence_location") !== null){
        const jsonPeriodOfAct = axios.get(routeFn("api.reports.violence-location"));

        jsonPeriodOfAct.then((response) => {
            var options = {
                series: response.data.values,
                chart: {
                    width: '100%',
                    height: '100%',
                    type: 'pie',
                },
                colors: ['#ea1a58', '#b70c59', '#39539E', '#0077B5'],
                labels: response.data.labels,
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 600,
                            },
                            legend: {
                                position: 'bottom',
                            },
                        },
                    },
                ],
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -5,
                        },
                    },
                },
                grid: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: 0,
                        right: 0,
                    },
                },
                dataLabels: {
                    formatter(val :any, opts:any
                    ) {
                        const name = opts.w.globals.labels[opts.seriesIndex]
                        return [name, val.toFixed(1) + '%']
                    },
                },
                legend: {
                    show: false,
                },
            };

            let chartJ = new ApexCharts(document.querySelector("#violence_location"), options);
            chartJ.render();

        });
    }
});
