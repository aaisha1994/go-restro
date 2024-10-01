@extends('Restro.layouts.master')
@section('title', 'Dashboard')
@section('toolbar', 'Dashboard')
@section('css')
<style>
    .active1 {
        border-color: #28a745 !important;
        background-color: #f2f2f2;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.18), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .card1 {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15), 0 2px 5px rgba(0, 0, 0, 0.2);
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
    .card1 .card-body {
        padding: 1rem
    }
</style>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <img src="{{ asset('restaurant/media/svg/illustrations/easy/1.svg') }}" class="w-100px" alt="" />
                            </div>
                            <div class="d-flex flex-column my-1">
                                <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">{{ $data['customer'] }}</span>
                                <div class="m-0">
                                    <span class="fw-bold fs-6 text-gray-400">Total Customer</span>
                                </div>
                            </div>
                            {{-- <span class="badge badge-success fs-base">
                                <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                2.1%
                            </span> --}}
                        </div>
                    </div>
                </div>
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <img src="{{ asset('restaurant/media/svg/illustrations/easy/2.svg') }}" class="w-100px" alt="" />
                            </div>
                            <div class="d-flex flex-column my-1">
                                <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">{{ $data['redeem'] }}</span>
                                <div class="m-0">
                                    <span class="fw-bold fs-6 text-gray-400">Redeemed Coupons</span>
                                </div>
                            </div>
                            {{-- <span class="badge badge-success fs-base">
                                <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                0.47%
                            </span> --}}
                        </div>
                    </div>
                </div>
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <img src="{{ asset('restaurant/media/svg/illustrations/easy/3.svg') }}" class="w-100px" alt="" />
                            </div>
                            <div class="d-flex flex-column my-1">
                                <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">{{ $data['offer'] }}</span>
                                <div class="m-0">
                                    <span class="fw-bold fs-6 text-gray-400">Total Offers</span>
                                </div>
                            </div>
                            {{-- <span class="badge badge-success fs-base">
                                <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                0.6%
                            </span> --}}
                        </div>
                    </div>
                </div>
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <img src="{{ asset('restaurant/media/svg/illustrations/easy/4.svg') }}" class="w-100px" alt="" />
                            </div>
                            <div class="d-flex flex-column my-1">
                                <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">{{ $data['complementry'] }}</span>
                                <div class="m-0">
                                    <span class="fw-bold fs-6 text-gray-400">Complementary Redeemed</span>
                                </div>
                            </div>
                            {{-- <span class="badge badge-success fs-base">
                                <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                3%
                            </span> --}}
                        </div>
                    </div>
                </div>
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <div class="card card-flush border-0 h-lg-100" style="background-color: #7239EA">
                        <div class="card-header pt-2">
                            <h3 class="card-title">
                                <span class="text-white fs-3 fw-bolder me-2">Total Customer & Gift</span>
                             </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                            <div class="d-flex flex-wrap px-9 mb-5">
                                <div class="rounded min-w-125px py-3 px-4 my-1 me-6"
                                    style="border: 1px dashed rgba(255, 255, 255, 0.2)">
                                    <div class="d-flex align-items-center">
                                        <div class="text-white fs-2 fw-bolder" data-kt-countup="true"
                                            data-kt-countup-value="{{ $data['todaycustomer'] }}">0</div>
                                    </div>
                                    <div class="fw-bold fs-6 text-white opacity-50">Customer Visit</div>
                                </div>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sendgift">
                                    <div class="rounded min-w-125px py-3 px-4 my-1"
                                        style="border: 1px dashed rgba(255, 255, 255, 0.2)">
                                        <div class="d-flex align-items-center">
                                            <div class="text-white fs-2 fw-bolder" data-kt-countup="true"
                                                data-kt-countup-value="{{ $data['sendgift'] }}">0</div>
                                        </div>
                                        <div class="fw-bold fs-6 text-white opacity-50">Send Gift</div>
                                    </div>
                                </a>
                            </div>
                            <div id="kt_card_widget_1_chart" data-kt-chart-color="#8F5FF4" style="height: 105px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-8">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">User Acquire</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-6">Users from all channels</span>
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
                <div class="col-xl-4">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">GR Leaders</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            @foreach ($grleaders as $key => $grleader)
                                @if($key != 0)
                                    <div class="separator separator-dashed my-3"></div>
                                @endif
                                @if($grleader->id == $Restaurant->id)
                                    <div class="separator separator-dashed my-3 ribbon ribbon-top">
                                        <div class="ribbon-label bg-primary">You</div>
                                    </div>
                                @endif
                                <div class="d-flex flex-stack">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="{{ url('storage/logo/'. $grleader->logo) }}" class="me-4 w-45px" alt="" />
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">{{ $grleader->name }}</a>
                                            <span class="text-gray-400 fw-bold d-block fs-6">{{ $grleader->user }} Users</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center w-100 mw-125px">
                                        <div class="progress h-6px w-100 me-2 bg-light-primary">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ 100 - ($key * 10) }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-gray-400 fw-bold">{{ $grleader->ranks }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Calendar-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start ">
                <div class="content flex-row-fluid" id="kt_content">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title fw-bolder">Events</h2>
                        </div>
                        <div class="card-body">
                            <div id="kt_calendar_app"></div>
                        </div>
                    </div>
                    <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <div class="modal-content">
                                <form class="form" action="#" id="kt_modal_add_event_form"></form>
                            </div>
                        </div>
                    </div>
                    <!--begin::Modal - New Product-->
                    <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <div class="modal-content">
                                <div class="modal-header border-0 justify-content-end">
                                    <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                                        data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                    rx="1" transform="rotate(-45 6 17.3137)"
                                                    fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-body pt-0 pb-20 px-lg-17 ">
                                    <div class="d-flex">
                                        <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <div class="mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                                <span class="badge badge-light-success" style="display: none" data-kt-calendar="all_day"></span>
                                            </div>
                                            {{-- <div class="fs-6">
                                                <span class="fw-bolder">Event Name : </span>
                                                <span data-kt-calendar="event_description"></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <circle fill="currentColor" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <div class="fs-6">
                                            <span class="fw-bolder">Event Name : </span>
                                            <span data-kt-calendar="event_description" id="event_description"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <circle fill="currentColor" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <div class="fs-6">
                                            <span class="fw-bolder">Event Date : </span>
                                            <span data-kt-calendar="event_start_date"></span>
                                        </div>
                                    </div>
                                    @if($Restaurant->gr_coin > 0)
                                        <div class="text-end wts">
                                            <a href="javascript:void(0)" class="btn btn-success" id="sendwhatsapp">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="wts1" style="display: none">
                                            <form method="POST" action="{{ route('restro.sendwhatsapp') }}">
                                                @csrf
                                                <div class="modal-body p-0 pt-5">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Event Template</span>
                                                    </label>
                                                    <div class="card-deck row">
                                                        <div class="col-sm-6">
                                                            <div id="anniversary-card" class="card card1 mb-4">
                                                                <div class="card-body" role="button">
                                                                    <h5 class="card-title">
                                                                        <input id="anniversary" type="radio" name="template" value="anniversary" checked>
                                                                        <label for="anniversary">Anniversary</label>
                                                                    </h5>
                                                                    <p class="card-text">Happy anniversary to the most amazing couple! ...<br /> Dining with {1}. for Exclusive offers<br />Regards , Go-Restro</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div id="anniversary_2-card" class="card card1 mb-4">
                                                                <div class="card-body" role="button">
                                                                    <h5 class="card-title">
                                                                        <input id="anniversary_2" type="radio" name="template" value="anniversary_2">
                                                                        <label for="anniversary_2">Anniversary 2</label>
                                                                    </h5>
                                                                    <p class="card-text">{2} Happy Anniversary ,<br />Cheers to love and good food!<br />with {1} ,<br />Privilege offer using Go-Restro app</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div id="birthday-card" class="card card1 mb-4">
                                                                <div class="card-body" role="button">
                                                                    <h5 class="card-title">
                                                                        <input id="birthday" type="radio" name="template" value="birthday">
                                                                        <label for="birthday">Birthday</label>
                                                                    </h5>
                                                                    <p class="card-text">Dear {1} , <br />*Wishing you the best on your birthday,*<br />Plan for Party or Dinner ?<br />You have Passport of {2},<br />Grab Your Special Discount 🏃<br />Team , Go-Restro</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div id="birathday_3-card" class="card card1 mb-4">
                                                                <div class="card-body" role="button">
                                                                    <h5 class="card-title">
                                                                        <input id="birathday_3" type="radio" name="template" value="birathday_3">
                                                                        <label for="birathday_3">Birthday</label>
                                                                    </h5>
                                                                    <p class="card-text">Hey {1},<br />Sending you lots of love on your special day !<br />Plan for dine-out ,<br />special discount at {2}<br />Team Go-Restro</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div id="birthday_week-card" class="card card1 mb-4">
                                                                <div class="card-body" role="button">
                                                                    <h5 class="card-title">
                                                                        <input id="birthday_week" type="radio" name="template" value="birthday_week">
                                                                        <label for="birthday_week">Birthday</label>
                                                                    </h5>
                                                                    <p class="card-text">Hi {1},<br />It`s Your birthday week ! Celebrating and plan party with {2} ,<br />Get *Exclusive Deals On Meals*<br />Team Go-Restro</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" data-kt-calendar="event_location">
                                                    <input type="hidden" name="name" id="event_description1">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button value="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <input type="hidden" name="id" data-kt-calendar="event_location" value="1">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Send Gift Modal -->
    <div class="modal fade" tabindex="-1" id="sendgift">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('restro.sendgiftstore') }}" method="POST" class="form w-lg-500px mx-auto" novalidate="novalidate">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Sent a Gift</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x text">
                                <i class="bi bi-x-lg text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="stepper stepper-pills" id="sendGiftForm">
                            <div class="stepper-nav flex-center flex-wrap">
                                <div class="stepper-item current" data-kt-stepper-element="nav"></div>
                                <div class="stepper-item" data-kt-stepper-element="nav"></div>
                            </div>
                            <!--begin::Form-->
                            <div class="mb-5">
                                <div class="flex-column current" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="tel" name="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Mobile No.." required>
                                    </div>
                                </div>
                                <!--begin::Step 1-->
                                <div class="flex-column" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
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
                                </div>
                            </div>
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <div class="me-2">
                                    <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">Back</button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">Submit</button>
                                    <button type="button" class="btn btn-primary" data-kt-stepper-action="next">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="week" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartWeek))) }}'>
    <input type="hidden" id="month" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartMonth))) }}'>
    <input type="hidden" id="year" value='{{ str_replace(array('[',']','"'),'',json_encode(array_keys($ChartYear))) }}'>
    <input type="hidden" id="calanderdata" value='{{ $event }}'>
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
                        n = KTUtil.getCssVariableValue("--bs-success"),
                        m = KTUtil.getCssVariableValue("--bs-success"),
                        d = new ApexCharts(o, {
                            series: [{
                                name: "Usres",
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

        var element = document.querySelector("#sendGiftForm");
        var stepper = new KTStepper(element);
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>
    <script src="{{asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="{{asset('restaurant/js/custom/apps/calendar/calendar.js')}}"></script>

    <script>
        $(document).on('click', '#sendwhatsapp', function(e) {
            $('.wts').hide();
            $('.wts1').show();
            let event_description = $('#event_description').text();
            $('#event_description1').val(event_description);
        });
        $(document).ready(function () {
            $('input:radio').change(function () {//Clicking input radio
                var radioClicked = $(this).attr('id');
                $("#" + radioClicked).prop("checked", true);
                $(".card1").removeClass("active1");
                $("#" + radioClicked + "-card").addClass("active1");
            });
            $(".card1").click(function () {//Clicking the card1
                var inputElement = $(this).find('input[type=radio]').attr('id');
                $("#" + inputElement).prop("checked", true);
                $(".card1").removeClass("active1");
                $("#" + inputElement + "-card").addClass("active1");
            });
        });
    </script>
@endsection
