@extends('Admin.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details))
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                                <h4 class="mb-0">{{ $data['User'] }}</h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <i class="ri-stack-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            @if($data['UserCount'] > 0)
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 7.125L9.225 10.275L8.025 8.475L5.625 10.875" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 7.125H12.375V8.625" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 16.5H11.25C15 16.5 16.5 15 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 15 3 16.5 6.75 16.5Z" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 11.5L9.225 8.35L8.025 10.15L5.625 7.75" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 11.5H12.375V10" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 17.125H11.25C15 17.125 16.5 15.625 16.5 11.875V7.375C16.5 3.625 15 2.125 11.25 2.125H6.75C3 2.125 1.5 3.625 1.5 7.375V11.875C1.5 15.625 3 17.125 6.75 17.125Z" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @endif
                                            <span class="text-muted ms-2">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details))
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Total Restro</p>
                                                <h4 class="mb-0">{{ $data['Restro'] }}</h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <i class="ri-store-2-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            @if($data['RestroCount'] > 0)
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 7.125L9.225 10.275L8.025 8.475L5.625 10.875" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 7.125H12.375V8.625" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 16.5H11.25C15 16.5 16.5 15 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 15 3 16.5 6.75 16.5Z" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 11.5L9.225 8.35L8.025 10.15L5.625 7.75" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 11.5H12.375V10" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 17.125H11.25C15 17.125 16.5 15.625 16.5 11.875V7.375C16.5 3.625 15 2.125 11.25 2.125H6.75C3 2.125 1.5 3.625 1.5 7.375V11.875C1.5 15.625 3 17.125 6.75 17.125Z" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @endif
                                            <span class="text-muted ms-2">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details))
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2">Affiliate</p>
                                                <h4 class="mb-0">{{ $data['Affiliate'] }}</h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <i class="ri-briefcase-4-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            @if($data['AffiliateCount'] > 0)
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 7.125L9.225 10.275L8.025 8.475L5.625 10.875" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 7.125H12.375V8.625" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 16.5H11.25C15 16.5 16.5 15 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 15 3 16.5 6.75 16.5Z" stroke="#32842B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @else
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.375 11.5L9.225 8.35L8.025 10.15L5.625 7.75" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.875 11.5H12.375V10" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 17.125H11.25C15 17.125 16.5 15.625 16.5 11.875V7.375C16.5 3.625 15 2.125 11.25 2.125H6.75C3 2.125 1.5 3.625 1.5 7.375V11.875C1.5 15.625 3 17.125 6.75 17.125Z" stroke="#BC3434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @endif
                                            <span class="text-muted ms-2">From previous period</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- end row -->
                    @if(Auth::guard('admin')->user()->is_admin == 1)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Revenue Analytics</h4>
                                <div>
                                    <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>

                            <div class="card-body border-top text-center">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-2 text-muted text-truncate mb-0">This month</p>
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">&#8377; {{ number_format($visitsMonth,2) }}</h5>
                                            {{-- <div class="text-success">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                                            <div class="d-inline-flex">
                                                <h5 class="mb-0 me-2">&#8377; {{ number_format(array_sum($ChartYear),2) }}</h5>
                                                {{-- <div class="text-success">
                                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <p class="mb-2 text-muted text-truncate"><i
                                                    class="mdi mdi-circle text-success font-size-10 me-1"></i> Previous Year :
                                            </p>
                                            <div class="d-inline-flex">
                                                <h5 class="mb-0">&#8377; {{ number_format(array_sum($ChartYear1),2) }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                    <!-- end row -->
                </div>

                <div class="col-xl-4">
                    @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details))
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <select class="form-select form-select-sm" id="restro_id">
                                        <option selected>Restro Name</option>
                                        @foreach ($data['RestroList'] as $Restro)
                                            <option value="{{ $Restro->id }}">{{ $Restro->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h4 class="card-title mb-4">Restro Sales Analytics</h4>

                                <!-- <div id="donut-chart" class="apex-charts"></div> -->
                                <div id="spline_area" class="apex-charts" dir="ltr"></div>

                            </div>
                        </div>
                    @endif
                    @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Dynamic Discount', Auth::guard('admin')->user()->role_details))
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Discount</h4>
                                <div class="text-center">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                        <p class="highcharts-description"></p>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- end row -->

            <!-- post approval -->
            <div class="row">
                <div class="col-md-8">
                    @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Approve & Reject Post', Auth::guard('admin')->user()->role_details))
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="form-inline float-md-start">
                                            <div class="search-box ms-2">
                                                <div class="position-relative">
                                                    <h4 class="card-title">Post Approval</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2 d-flex justify-content-end">
                                            <a href="{{ route('admin.approve.index')}}" class="btn btn-sm btn-primary" type="button">View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table  mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Restaurant Name</th>
                                                <th>Request Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['approve'] as $Approve)
                                                <tr id="row_{{ $Approve->id }}">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td><img src="{{ $Approve->Restaurant->image_path }}" height="35" /></td>
                                                    <td>{{ $Approve->Restaurant->name }}</td>
                                                    <td>@if($Approve->type == 0)
                                                        {{ 'New Profile' }}
                                                        @elseif($Approve->type == 1)
                                                        {{ 'Profile Change' }}
                                                        @elseif($Approve->type == 2)
                                                        {{ 'Passport Change' }}
                                                        @endif</td>
                                                    <td class="d-flex gap-2 justify-content-start">
                                                        <a href="javascript:void()" class="btn btn-primary btn-sm approve" data-id={{ $Approve->id }} data-price={{ $Approve->Restaurant->passport_price }} data-bs-toggle="modal" data-bs-target="#staticBackdrop">Approve</a>
                                                        <a href="{{ route('admin.approve.reject',[$Approve->id]) }}" class="btn btn-secondary btn-sm">Reject</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('User Segment', Auth::guard('admin')->user()->role_details))
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">User Segment</h4>
                                <a href="{{ route('admin.usersegment.index') }}">
                                    <div id="pie_chart" class="apex-charts" dir="ltr"></div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="" id="form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Do you want to update the passport price ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label>Old Price</label>
                                <input type="text" value="500" name="old_price" id="old_price" class="form-control">
                            </div>
                            <div class="col">
                                <label>New Price</label>
                                <input type="text" name="passport_price" id="passport_price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="discountdata" value="{{ $data['discount'] }}">
    <input type="hidden" id="week" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartYear))) }}'>
    <input type="hidden" id="month" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartYear1))) }}'>

    {{-- {{ dd(json_encode($data1)) }} --}}
@endsection
@section('js')
<!-- apexcharts init -->

<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script> --}}
{{-- Revenue Analytics --}}
<script>
    const d = new Date();
    var options = {
        series: [{
            name: d.getFullYear(),
            type: "column",
            data: {{ json_encode(array_values($ChartYear)) }}
        }, {
            name: d.getFullYear() - 1,
            type: "line",
            data: {{ json_encode(array_values($ChartYear1)) }}
        }],
        chart: {
            height: 280,
            type: "line",
            toolbar: {
                show: !1
            }
        },
        stroke: {
            width: [0, 3],
            curve: "smooth"
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%"
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        colors: ["#5664d2", "#1cbb8c"],
        labels: $('#week').val().split(",")
    },
    chart = new ApexCharts(document.querySelector("#line-column-chart"), options).render();
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{-- Pie Chart --}}
<script>
    $(document).on('change', '#restro_id', function(e){
        var id = $(this).val();
        var url = '{{ route('admin.restrosales',['_id']) }}'.replace('_id', id);
        // var url = 'http://my-json-server.typicode.com/apexcharts/apexcharts.js/yearly';
        axios({
            method: 'GET',
            url: url,
        }).then(function(response) {
            $('#spline_area').html('');
            var options = {
                chart: {
                    height: 265,
                    type: "area"
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 3
                },
                series: [{
                    name: " ",
                    data: []
                }, {
                    name: "series",
                    data: Object.values(response.data.data)
                }],
                colors: [" ", "#1cbb8c"],
                xaxis: {
                    type: "datetime",
                    categories: Object.keys(response.data.data)
                },
                grid: {
                    borderColor: "#f1f1f1",
                    padding: {
                        bottom: 15
                    }
                },
                tooltip: {
                    x: {
                        format: "dd/MM/yy"
                    }
                },
                legend: {
                    offsetY: 7
                }
            };
            var chart = new ApexCharts(document.querySelector("#spline_area"), options);
            chart.render();
        });
    });

    // Pie Chart
    options = {
        chart: {
            height: 320,
            type: "pie"
        },

        series: {{ json_encode(array_values($data1)) }},
        // plotOptions: {
        //     series: {
        //         // cursor: 'pointer',
        //         // point: {
        //         //     events: {
        //         //         click: function () {
        //         //             // location.href = 'https://en.wikipedia.org/wiki/' + this.options;
        //         //             console.log('asd');
        //         //         }
        //         //     }
        //         // }
        //     }
        // },
        events: {
            dataPointSelection: function(event, chartContext, config) {
                var seriesIndex = config.seriesIndex;
                var dataPointIndex = config.dataPointIndex;
                var selectedData = config.series[seriesIndex][dataPointIndex];
                console.log('asd');
                // Update grid with selected dataupdateGrid(selectedData);
            }
        },
        labels: ["Prime User", "Non Prime User", "Passport Purchased", "Passport Not Purchased", "C Redeem", "C N Redeem"],
        colors: ["#1cbb8c", "#5664d2", "#fcb92c", "#4aa3ff", "#ff3d60", "#8a8a5c"],
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0,
            offsetY: 6
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: !1
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#pie_chart"), options);
    chart.render();
</script>

<script>
    $(document).on('click','.approve', function (e){
        let id = $(this).attr('data-id');
        let price = $(this).attr('data-price');
        $('#old_price').val(price);
        let route = '{{ route('admin.approve.approve',['_id']) }}'.replace('_id', id);
        $('#form').prop('action', route);
    });
    $('#restro_id').val({{ $data['RestroList'][0]['id'] }}).change();
</script>

<!-- High charts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="{{asset('assets/js/highcharts.js')}}"></script>
@endsection
