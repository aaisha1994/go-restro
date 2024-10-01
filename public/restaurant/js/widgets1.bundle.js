var KTChartsWidget11 = function() {
    var e = function(e, a, t, l) {
        var o = document.querySelector(a),
            r = parseInt(KTUtil.css(o, "height"));
        if (o) {
            var i = KTUtil.getCssVariableValue("--bs-gray-500"),
                s = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                n = KTUtil.getCssVariableValue("--bs-success"),
                m = KTUtil.getCssVariableValue("--bs-success"),
                d = new ApexCharts(o, {
                    series: [{
                        name: "Deliveries",
                        data: t
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "area",
                        height: r,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: .3,
                            opacityTo: .7,
                            stops: [0, 90, 100]
                        }
                    },
                    stroke: {
                        curve: "smooth",
                        show: !0,
                        width: 3,
                        colors: [n]
                    },
                    xaxis: {
                        categories: ["", "Apr 01", "Apr 06", "Apr 06", "Apr 05", "Apr 06", "Apr 10", "Apr 08", "Apr 09", "Apr 14", "Apr 10", "Apr 12", "Apr 18", "Apr 14", "Apr 15", "Apr 14", "Apr 17", "Apr 18", "Apr 02", "Apr 06", "Apr 18", "Apr 05", "Apr 06", "Apr 10", "Apr 08", "Apr 22", "Apr 14", "Apr 11", "Apr 12", ""],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        tickAmount: 5,
                        labels: {
                            rotate: 0,
                            rotateAlways: !0,
                            style: {
                                colors: i,
                                fontSize: "13px"
                            }
                        },
                        crosshairs: {
                            position: "front",
                            stroke: {
                                color: n,
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: !0,
                            formatter: void 0,
                            offsetY: 0,
                            style: {
                                fontSize: "13px"
                            }
                        }
                    },
                    yaxis: {
                        tickAmount: 4,
                        max: 24,
                        min: 10,
                        labels: {
                            style: {
                                colors: i,
                                fontSize: "13px"
                            }
                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {
                            formatter: function(e) {
                                return +e
                            }
                        }
                    },
                    colors: [m],
                    grid: {
                        borderColor: s,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    },
                    markers: {
                        strokeColor: n,
                        strokeWidth: 3
                    }
                }),
                g = !1,
                c = document.querySelector(e);
            !0 === l && (d.render(), g = !0), c.addEventListener("shown.bs.tab", (function(e) {
                0 == g && (d.render(), g = !0)
            }))
        }
    };
    return {
        init: function() {
            e("#kt_chart_widget_11_tab_1",
            "#kt_chart_widget_11_chart_1", [16, 19, 19, 16, 16, 14, 15, 15, 17, 17, 19, 19, 18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 20, 20, 22], !1),
            e("#kt_chart_widget_11_tab_2",
            "#kt_chart_widget_11_chart_2", [18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 18, 20, 20, 22, 15, 18, 18, 17, 17, 15, 15, 17, 17, 19, 17], !1),
            e("#kt_chart_widget_11_tab_3",
            "#kt_chart_widget_11_chart_3", [25, 20, 20, 19, 19, 17, 17, 19, 19, 21, 21, 19, 19, 21, 21, 18, 18, 16, 17, 17, 19, 19, 21, 21, 19, 19, 17, 17, 18, 18], !0)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget11), KTUtil.onDOMContentLoaded((function() {
    KTChartsWidget11.init()
}));
