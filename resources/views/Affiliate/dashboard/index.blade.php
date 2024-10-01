@extends('Affiliate.layouts.master')
@section('title', 'Dashboard')
@section('toolbar', 'Dashboard')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-10">
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <div class="card card-flush border-0 h-lg-100" style="background-color: #ED6D55">
                        <div class="card-header pt-2">
                            <h3 class="card-title">
                                <span class="text-white fs-3 fw-bolder me-2">My Wallet</span>
                                <span class="badge badge-success">Active</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                            <div class="d-flex flex-wrap px-9 mb-5">
                                <div class="text-center d-flex justify-content-center py-3 px-4 me-6">
                                    <img src="{{ asset('restaurant/media/svg/illustrations/easy/3.svg') }}"
                                        class="w-100px w-xl-90px" alt="image" />
                                </div>
                                <a href="javascript:void(0)">
                                    <div class="rounded text-center min-w-200px py-3 px-4 my-1 me-6"
                                        style="border: 2px dashed rgba(255, 255, 255, 0.8)">
                                        <div class="fw-bold fs-6 text-white">Current Balance</div>
                                        <div class="d-flex justify-content-center">
                                            <span class="text-white fs-1 fw-bolder me-3">&#8377;</span>
                                            <div class="text-white fs-1 fw-bolder" data-kt-countup="true"
                                                data-kt-countup-value="{{ $Affiliate->wallet }}">0</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="rounded text-center min-w-200px py-3 px-4 my-1"
                                        style="border: 2px dashed rgba(255, 255, 255, 0.8)">
                                        <div class="fw-bold fs-6 text-white">Total Earned INR</div>
                                        <div class="d-flex justify-content-center">
                                            <span class="text-white fs-1 fw-bolder me-3">&#8377;</span>
                                            <div class="text-white fs-1 fw-bolder" data-kt-countup="true"
                                                data-kt-countup-value="{{ $Credit }}">0</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 mb-5 mb-xl-10">
                    <div class="card card-flush border-0 h-lg-100" style="background-color: #ED6D55">
                        <div class="card-header pt-2">
                            <h3 class="card-title">
                                <span class="text-white fs-3 fw-bolder me-2">Your referral link</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                            <div class="px-9 mb-5">
                                <div class="w-lg-100">
                                    <h4 class="fs-6 fw-bold text-white">Share referral link with friends</h4>
                                    <div class="d-flex">
                                        <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://go-restro.com/?ref={{ $Affiliate->ref_code }}" readonly />
                                        <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0" data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
            <!--chart-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-6">
                    <div class="card card-flush h-xl-100">
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
                <!--end::Col-->
                <div class="col-xl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7">
                            @if($Affiliate->affiliate_type == 3)
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Restaurant information</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('affiliate.restro.index') }}" class="btn btn-sm btn-light">View All</a>
                                </div>
                            @else
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Invite information</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('affiliate.invitePeople.list') }}" class="btn btn-sm btn-light">View All</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if($Affiliate->affiliate_type == 3)
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <thead>
                                            <tr class="fs-7 fw-bolder text-gray-400 border-bottom-0">
                                                <th class="p-0 pb-3 min-w-175px text-start">Restaurant Name</th>
                                                <th class="p-0 pb-3 min-w-100px text-end">Contact No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Restros as $Restro)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50px me-3">
                                                                <img src="{{ $Restro->image_path }}" class="" alt="" />
                                                            </div>
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">{{ $Restro->name }}</a>
                                                                <span class="text-gray-400 fw-bold d-block fs-7">{{ $Restro->Restro->email }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-600 fw-bolder fs-6">+91 {{ $Restro->mobile }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <thead>
                                            <tr class="fs-7 fw-bolder text-gray-400 border-bottom-0">
                                                <th class="p-0 pb-3 min-w-175px text-start">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($InvitePeoples as $InvitePeople)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="mailto:{{ $InvitePeople->email }}" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">{{ $InvitePeople->email }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end::row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Payment List</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('affiliate.payment') }}" class="btn btn-sm btn-light">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bolder text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-175px text-start">Request Type</th>
                                            <th class="p-0 pb-3 min-w-100px text-end">Payment Status</th>
                                            <th class="p-0 pb-3 min-w-100px text-end">Amount</th>
                                            <th class="p-0 pb-3 min-w-100px text-end">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Wallets as $Wal)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">{{ $Wal->type == 1 ? 'Referral Bonus' : 'Withdrawal Request' }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0">
                                                @if($Wal->status == 1)
                                                    <div class="badge py-3 px-4 fs-7 badge-light-success">{{ 'Success' }}</span></div>
                                                @elseif($Wal->status == 0)
                                                    <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ 'Pending' }}</span></div>
                                                @elseif($Wal->status == 3)
                                                    <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ 'In-Progress' }}</span></div>
                                                @else
                                                    <div class="badge py-3 px-4 fs-7 badge-light-danger">{{ 'Reject' }}</span></div>
                                                @endif
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-600 fw-bolder fs-6">&#8377; {{ $Wal->amount }}</td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-600 fw-bolder fs-6">{{ date('d M Y', strtotime($Wal->created_at))  }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Invite people</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="form1" class="form" action="{{ route('affiliate.invitePeople') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <input type="email" id="sendemail" name="email" class="form-control form-control-solid me-5" placeholder="email@example.com" />
                                    <button type="submit" class="sendemail btn btn-md btn-primary d-flex align-items-center gap-3 ">Send <i class="bi bi-send"></i></button>
                                </div>
                                <div class="error"></div>
                                <h4 class="card-title pt-10">
                                    <span class="card-label fw-bolder text-gray-800">Share Your Referral Link!</span>
                                </h4>
                                <div class="rounded text-center mt-10 py-10 px-4 "
                                    style="border: 2px dashed rgba(0, 0, 0, 0.8)">
                                    <p class="fs-4">"Invite your friends to join us and reap the benefits together! Simply
                                        enter their email addresses below and hit send to share your referral link. Let's grow
                                        our community and unlock exciting opportunities together."</p>
                                </div>
                            </form>
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
        var button = document.querySelector('#kt_share_earn_link_copy_button');
        var input = document.querySelector('#kt_share_earn_link_input');
        var clipboard = new ClipboardJS(button);

        clipboard.on('success', function(e) {
            var buttonCaption = button.innerHTML;
            //Add bgcolor
            input.classList.add('bg-success');
            input.classList.add('text-inverse-success');

            button.innerHTML = 'Copied!';

            setTimeout(function() {
                button.innerHTML = buttonCaption;

                // Remove bgcolor
                input.classList.remove('bg-success');
                input.classList.remove('text-inverse-success');
            }, 1000);

            e.clearSelection();
        });

        window.addEventListener('load', function() {
            $("#form1").validate({
                rules: {
                    email: { required: true },
                },
                messages: {
                    email: { required: "Email is required" },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    // error.insertAfter(element);
                    element.closest('.form').find('.error').append(error);
                },
                submitHandler: function(form) {
                    let email = $('#sendemail').val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('affiliate.invitePeople') }}",
                        dataType: "json",
                        data : {
                            'email' : email
                        },
                        success: function(response) {
                            if (response.status) {
                                toastCall("success", response.message);
                                $('#sendemail').val('');
                            } else {
                                toastCall("error", response.message);
                            }
                        },
                    });
                }
            });
        });
        // $(document).on('click', '.sendemail', function(e) {

        // });
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
