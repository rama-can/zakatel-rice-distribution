import Chart from "chart.js/auto";
// Import utilities
import { tailwindConfig, hexToRGB } from "../utils";

document.addEventListener("DOMContentLoaded", function () {
    fetch("/api/rice-chart")
        .then((response) => response.json())
        .then((data) => {
            var ctx = document.getElementById("riceChart").getContext("2d");

            var config = {
                type: "line",
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            label: "In Rice",
                            fill: true,
                            backgroundColor: `rgba(${hexToRGB(
                                tailwindConfig().theme.colors.blue[500]
                            )}, 0.08)`,
                            borderColor:
                                tailwindConfig().theme.colors.indigo[500],
                            data: data.riceInData,
                        },
                        {
                            label: "Out Rice",
                            fill: true,
                            backgroundColor: `rgba(${hexToRGB(
                                tailwindConfig().theme.colors.red[500]
                            )}, 0.08)`,
                            borderColor: tailwindConfig().theme.colors.red[500],
                            data: data.riceOutData,
                        },
                    ],
                },
                options: {
                    layout: {
                        padding: 10,
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Quantity",
                            },
                            ticks: {
                                callback: function (value, index, values) {
                                    return value + " kg";
                                },
                            },
                        },
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.dataset.label || "";
                                    if (label) {
                                        label += ": ";
                                    }
                                    label +=
                                        context.parsed.y.toFixed(2) + " kg";
                                    return label;
                                },
                            },
                        },
                    },
                },
            };

            new Chart(ctx, config);
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
});
