@extends('Affiliate.layouts.master')
@section('title', 'sales')
@section('toolbar', 'sales')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-bordered">
                <div class="card-header pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-1 text-dark">Earning</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_11_tabs">
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active buttondata btn-active-light fw-bolder px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_1" href="#kt_chart_widget_11_tab_content_1">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Yearly</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                            <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto w-100" style="height: 500px"></div>
                        </div>
                        <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                            <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 500px"></div>
                        </div>
                        <div class="tab-pane fade show active" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                            <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="week" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartWeek))) }}'>
    <input type="hidden" id="month" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartMonth))) }}'>
    <input type="hidden" id="year" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartYear))) }}'>
@endsection
@section('js')
    <script type="text/javascript">
        var KTChartsWidget11 = function() {
            var e = function(e, a, t, l) {
                var o = document.querySelector(a),
                    r = parseInt(KTUtil.css(o, "height"));
                if (o) {
                    var i = KTUtil.getCssVariableValue("--bs-gray-500"),
                        s = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                        n = KTUtil.getCssVariableValue("--bs-primary"),
                        m = KTUtil.getCssVariableValue("--bs-primary"),
                        d = new ApexCharts(o, {
                            series: [{
                                name: 'Net Earning',
                                type: 'bar',
                                stacked: true,
                                data: t
                            }],
                            chart: {
                                fontFamily: 'inherit',
                                stacked: true,
                                height: r,
                                toolbar: {
                                    show: false
                                }
                            },
                            plotOptions: {
                                bar: {
                                    stacked: true,
                                    horizontal: false,
                                    endingShape: 'rounded',
                                    columnWidth: ['12%']
                                },
                            },
                            legend: {
                                show: false
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: l,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false
                                },
                                labels: {
                                    style: {
                                        colors: i,
                                        fontSize: '12px'
                                    }
                                }
                            },
                            yaxis: {
                                // max: 120,
                                labels: {
                                    style: {
                                        colors: i,
                                        fontSize: '12px'
                                    }
                                }
                            },
                            fill: {
                                opacity: 1
                            },
                            states: {
                                normal: {
                                    filter: {
                                        type: 'none',
                                        value: 0
                                    }
                                },
                                hover: {
                                    filter: {
                                        type: 'none',
                                        value: 0
                                    }
                                },
                                active: {
                                    allowMultipleDataPointsSelection: false,
                                    filter: {
                                        type: 'none',
                                        value: 0
                                    }
                                }
                            },
                            tooltip: {
                                style: {
                                    fontSize: '12px'
                                },
                                y: {
                                    formatter: function(val) {
                                        return 'Rs. ' + val
                                    }
                                }
                            },
                            colors: [m],
                            grid: {
                                borderColor: s,
                                strokeDashArray: 4,
                                yaxis: {
                                    lines: {
                                        show: true
                                    }
                                },
                                padding: {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0
                                }
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
                    "#kt_chart_widget_11_chart_1", {{ json_encode(array_values($ChartWeek)) }}, $('#week').val().split(","), !1),
                    e("#kt_chart_widget_11_tab_2",
                    "#kt_chart_widget_11_chart_2", {{ json_encode(array_values($ChartMonth)) }}, $('#month').val().split(","), !1),
                    e("#kt_chart_widget_11_tab_3",
                    "#kt_chart_widget_11_chart_3", {{ json_encode(array_values($ChartYear)) }}, $('#year').val().split(","), !0)
                }
            }
        }();
        "undefined" != typeof module && (module.exports = KTChartsWidget11), KTUtil.onDOMContentLoaded((function() {
            KTChartsWidget11.init();
            $('.buttondata')[0].click();
        }));
    </script>
@endsection
