import "flowbite";
import AOS from "aos";
import "aos/dist/aos.css";
import ApexCharts from "apexcharts";

window.addEventListener("load", () => {
    AOS.init({
        offset: 0,
        duration: 700,
        delay: 0,
    });
    var options = {
        series: [
            {
                name: "Actual",
                data: [
                    {
                        x: "2011",
                        y: 1292,
                        goals: [
                            {
                                name: "Expected",
                                value: 1400,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2012",
                        y: 4432,
                        goals: [
                            {
                                name: "Expected",
                                value: 5400,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2013",
                        y: 5423,
                        goals: [
                            {
                                name: "Expected",
                                value: 5200,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2014",
                        y: 6653,
                        goals: [
                            {
                                name: "Expected",
                                value: 6500,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2015",
                        y: 8133,
                        goals: [
                            {
                                name: "Expected",
                                value: 6600,
                                strokeHeight: 13,
                                strokeWidth: 0,
                                strokeLineCap: "round",
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2016",
                        y: 7132,
                        goals: [
                            {
                                name: "Expected",
                                value: 7500,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2017",
                        y: 7332,
                        goals: [
                            {
                                name: "Expected",
                                value: 8700,
                                strokeHeight: 5,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                    {
                        x: "2018",
                        y: 6553,
                        goals: [
                            {
                                name: "Expected",
                                value: 7300,
                                strokeHeight: 2,
                                strokeDashArray: 2,
                                strokeColor: "#775DD0",
                            },
                        ],
                    },
                ],
            },
        ],
        chart: {
            height: 350,
            type: "bar",
        },
        plotOptions: {
            bar: {
                columnWidth: "60%",
            },
        },
        colors: ["#ff0000"],
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: true,
            showForSingleSeries: true,
            customLegendItems: ["Actual", "Expected"],
            markers: {
                fillColors: ["#ff0000", "#775DD0"],
            },
        },
    };
    if (document.querySelector("#chart") !== null) {
        let chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }

    radialBar("#radial");
    radialBar("#radial2");
    radialBar("#radial3");
});

function radialBar(selector: string) {
    var options = {
        series: [40],
        chart: {
            height: 350,
            type: "radialBar",
            toolbar: {
                show: true,
            },
        },
        plotOptions: {
            radialBar: {
                startAngle: 0,
                endAngle: 360,
                hollow: {
                    margin: 0,
                    size: "70%",
                    background: "#fff",
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                },
                track: {
                    background: "#fbb7b7",
                    strokeWidth: "100%",
                    margin: 0, // margin
                },

                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "17px",
                    },
                    value: {
                        formatter: function (val:any) {
                            return parseInt(val);
                        },
                        color: "#111",
                        fontSize: "36px",
                        show: true,
                    },
                },
            },
        },
        fill: {
            colors: ["#F44336", "#E91E63", "#9C27B0"],
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Percent"],
    };

    if (document.querySelector(selector) === null) {
        return;
    }
    var chart = new ApexCharts(document.querySelector(selector), options);
    chart.render();
}
