@extends('Restro.layouts.master')
@section('title', 'Send Gift')
@section('toolbar', 'Send Gift')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <form accept="" method="">
                                <div class="input-group mb-5">
                                    <input type="tel" name="phone" id="phoneInput" class="form-control" pattern="[0-9]{10}" placeholder="Mobile No.." required />
                                    <button type="button" class="input-group-text btn btn-primary btn-sm" id="openModalButton" disabled data-bs-toggle="modal" data-bs-target="#sendgift">Send Gift</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">Gifts Sent Over Time</span>
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
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pb-0 pt-4">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                                        <div class="mb-2">
                                            <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">{{ array_sum($ChartWeek) }}</span>
                                            <span class="fs-6 fw-bold text-gray-400">This Week</span>
                                        </div>
                                        <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto w-100" style="height: 300px"></div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                                        <div class="mb-2">
                                            <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">{{ array_sum($ChartMonth) }}</span>
                                            <span class="fs-6 fw-bold text-gray-400">This Month</span>
                                        </div>
                                        <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                                    </div>
                                    <div class="tab-pane fade show active" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                                        <div class="mb-2">
                                            <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">{{ array_sum($ChartYear) }}</span>
                                            <span class="fs-6 fw-bold text-gray-400">This Year</span>
                                        </div>
                                        <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crad card-bordered mt-5">
                        <h3 class="pt-5">Send Gift List</h3>
                        <div class="align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4"></span>
                                    <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                                </div>
                                <!--end::Search-->
                            </div>
                        </div>
                        <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                                    <th class="min-w-100px"># NO</th>
                                    <th class="min-w-100px">Mobile Number</th>
                                    <th class="min-w-100px">Gift Count</th>
                                    <th class="min-w-100px">Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($Gifts as $Gift)
                                    <tr class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>+91 {{ $Gift->mobile }}</td>
                                        <td>{{ $Gift->GiftCoupon->sum('quantity') }}</td>
                                        <td><button class="btn btn-primary btn-sm viewgift" data-id="{{ $Gift->id }}" data-bs-toggle="modal" data-bs-target="#viewgift">view</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
    <!-- Send Gift Modal -->
    <div class="modal fade" tabindex="-1" id="sendgift">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('restro.sendgiftstore') }}">
                    @csrf
                    <input type="hidden" id="phoneInput1" name="mobile">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Gift</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($Coupons as $Coupon)
                                <div class="col mt-5">
                                    <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed">
                                        <div class="d-flex">
                                            <div class="col-md-4">
                                                <img src="{{ $Coupon->image_path }}" class="img-fluid rounded-start h-100" alt="{{ $Coupon->name }}">
                                            </div>
                                            <div class="col-md-8 p-3">
                                                <div class="d-flex flex-stack">
                                                    <span class="card-title fs-3 text-primary fw-bolder">{{ $Coupon->name }}</span>
                                                    <span><input class="form-check-input" type="checkbox" name="sendgift[]" value="{{ $Coupon->id }}"></span>
                                                </div>
                                                <p class="card-text fw-bolder">{{ $Coupon->details }}</p>
                                                <div class="d-flex flex-stack">
                                                    <span class=" badge badge-success">Gift quantity </span>
                                                    <div class="input-group w-md-150px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="{{ $Coupon->quantity }}" data-kt-dialer-step="1">
                                                        <button class="btn btn-icon btn-outline btn-outline-secondary" type="button" data-kt-dialer-control="decrease">
                                                            <i class="bi bi-dash fs-1"></i>
                                                        </button>
                                                        <input type="text" class="form-control" readonly placeholder="Amount" value="1" data-kt-dialer-control="input" name="qty_{{$Coupon->id}}" />
                                                        <button class="btn btn-icon btn-outline btn-outline-secondary" type="button" data-kt-dialer-control="increase">
                                                            <i class="bi bi-plus fs-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <!-- View Gift Modal -->
    <div class="modal fade" tabindex="-1" id="viewgift">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="" action="">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Gift</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body couponlist"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <input type="hidden" id="week" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartWeek))) }}'>
    <input type="hidden" id="month" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartMonth))) }}'>
    <input type="hidden" id="year" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartYear))) }}'>
@endsection
@section('js')
    <script type="text/javascript">
        document.getElementById('phoneInput').addEventListener('input', function(event) {
            var phoneInput = event.target.value;
            var openModalButton = document.getElementById('openModalButton');
            if (/^\d{10}$/.test(phoneInput)) {
                openModalButton.disabled = false;
                $('#phoneInput1').val(phoneInput);
            } else {
                openModalButton.disabled = true;
            }
        });
    </script>
    <script type="text/javascript">
        "use strict";
        var KTDatatablesBasicBasic = function() {
            var initDatatable = function() {
                var table = $('#kt_datatable_example_1').DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            };

            return {
                init: function() {
                    initDatatable();
                },
            };
        }();

        $(document).ready(function() {
            KTDatatablesBasicBasic.init();
        });

        $(document).on('click', '.viewgift', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: "get",
                url: "{{ route('restro.sendgift.list', ['_id']) }}".replace('_id', id),
                dataType: "html",
                cache: false,
                success: function(response) {
                    $('.couponlist').html(response);
                },
            });
        });
    </script>
    <script type="text/javascript">
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
                                categories: l,
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
                                // max: 300,
                                min: 0,
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
