Highcharts.chart("container", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "80%"
    },

    credits: {
        enabled: false
    },

    title: {
        text: " "
    },

    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%"
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            distance: 20,
            style: {
                fontSize: "14px"
            }
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 60,
                color: "#55BF3B", // green
                thickness: 20
            },
            {
                from: 60,
                to: 80,
                color: "#DDDF0D", // yellow
                thickness: 20
            },
            {
                from: 80,
                to: 100,
                color: "#DF5353", // red
                thickness: 20
            }
        ]
    },

    series: [
        {
            name: "Speed",
            data: [parseInt($('#discountdata').val())],
            tooltip: {
                valueSuffix: "Off"
            },
            dataLabels: {
                format: "{y} % OFF",
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px"
                }
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%"
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6
            }
        }
    ]
});

// Add some life
setInterval(() => {
    const chart = Highcharts.charts[0];
    if (chart && !chart.renderer.forExport) {
        const point = chart.series[0].points[0],
            inc = Math.round((Math.random() - 0.5) * 20);

        let newVal = point.y + inc;
        if (newVal < 0 || newVal > 200) {
            newVal = point.y - inc;
        }

        point.update(newVal);
    }
}, 20000);

