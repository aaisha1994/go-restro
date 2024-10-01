@extends('restaurant_admin.layouts.master')
@section('content')
    <!--begin::Toolbar-->
@section('toolbar')
    Dashboard
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <img src="{{ asset('restaurant/media/svg/illustrations/easy/1.svg') }}" class="w-100px"
                                alt="" />
                        </div>
                        <div class="d-flex flex-column my-1">
                            <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">320k</span>
                            <div class="m-0">
                                <span class="fw-bold fs-6 text-gray-400">Total Customer</span>
                            </div>
                        </div>
                        <span class="badge badge-success fs-base">
                            <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            2.1%
                        </span>
                    </div>
                </div>
            </div>
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <img src="{{ asset('restaurant/media/svg/illustrations/easy/2.svg') }}" class="w-100px"
                                alt="" />
                        </div>
                        <div class="d-flex flex-column my-1">
                            <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">200</span>
                            <div class="m-0">
                                <span class="fw-bold fs-6 text-gray-400">Redeemed Coupons</span>
                            </div>
                        </div>
                        <span class="badge badge-success fs-base">
                            <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            0.47%
                        </span>
                    </div>
                </div>
            </div>
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <img src="{{ asset('restaurant/media/svg/illustrations/easy/3.svg') }}" class="w-100px"
                                alt="" />
                        </div>
                        <div class="d-flex flex-column my-1">
                            <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">850</span>
                            <div class="m-0">
                                <span class="fw-bold fs-6 text-gray-400">Total Offers</span>
                            </div>
                        </div>
                        <span class="badge badge-success fs-base">
                            <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            0.6%
                        </span>
                    </div>
                </div>
            </div>
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-2 mb-xl-10">
                <div class="card h-lg-100">
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <div class="m-0">
                            <img src="{{ asset('restaurant/media/svg/illustrations/easy/4.svg') }}" class="w-100px"
                                alt="" />
                        </div>
                        <div class="d-flex flex-column my-1">
                            <span class="fw-bold fs-3x text-gray-800 lh-1 ls-n2">570</span>
                            <div class="m-0">
                                <span class="fw-bold fs-6 text-gray-400">Complementary Redeemed</span>
                            </div>
                        </div>
                        <span class="badge badge-success fs-base">
                            <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            3%
                        </span>
                    </div>
                </div>
            </div>
            <!--begin::Col-->
            <div class="col-xl-4 mb-5 mb-xl-10">
                <div class="card card-flush border-0 h-lg-100" style="background-color: #7239EA">
                    <div class="card-header pt-2">
                        <h3 class="card-title">
                            <span class="text-white fs-3 fw-bolder me-2">Total Customer & Gift</span>
                            <span class="badge badge-success">Active</span>
                        </h3>
                        <div class="card-toolbar">
                            <button
                                class="btn btn-icon bg-white bg-opacity-10 btn-color-white btn-active-success w-25px h-25px"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <span class="svg-icon svg-icon-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                                </div>
                                <div class="separator mb-3 opacity-75"></div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Monthly</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Yearly</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                        <div class="d-flex flex-wrap px-9 mb-5">
                            <div class="rounded min-w-125px py-3 px-4 my-1 me-6"
                                style="border: 1px dashed rgba(255, 255, 255, 0.2)">
                                <div class="d-flex align-items-center">
                                    <div class="text-white fs-2 fw-bolder" data-kt-countup="true"
                                        data-kt-countup-value="438">0</div>
                                </div>
                                <div class="fw-bold fs-6 text-white opacity-50">Customer Visit</div>
                            </div>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sendgift">
                                <div class="rounded min-w-125px py-3 px-4 my-1"
                                    style="border: 1px dashed rgba(255, 255, 255, 0.2)">
                                    <div class="d-flex align-items-center">
                                        <div class="text-white fs-2 fw-bolder" data-kt-countup="true"
                                            data-kt-countup-value="120">0</div>
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
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active"
                                        data-bs-toggle="tab" id="kt_chart_widget_11_tab_3"
                                        href="#kt_chart_widget_11_tab_content_3">Daily </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1"
                                        data-bs-toggle="tab" id="kt_chart_widget_11_tab_1"
                                        href="#kt_chart_widget_11_tab_content_1">Monthly </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1"
                                        data-bs-toggle="tab" id="kt_chart_widget_11_tab_2"
                                        href="#kt_chart_widget_11_tab_content_2">Yearly</a>
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
                                    <span
                                        class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">1,349</span>
                                    <span class="fs-6 fw-bold text-gray-400">Avarage cost per iteraction</span>
                                </div>
                                <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto w-100"
                                    style="height: 300px"></div>
                            </div>
                            <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                                <div class="mb-2">
                                    <span
                                        class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">3,492</span>
                                    <span class="fs-6 fw-bold text-gray-400">Avarage cost per iteraction</span>
                                </div>
                                <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto"
                                    style="height: 300px"></div>
                            </div>
                            <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_3"
                                role="tabpanel">
                                <div class="mb-2">
                                    <span
                                        class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">1,096</span>
                                    <span class="fs-6 fw-bold text-gray-400">1 Day</span>
                                </div>
                                <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto"
                                    style="height: 300px"></div>
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
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/1.png') }}" class="me-4 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Home Tast</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">3500 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-400 fw-bold">1</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/2.png') }}" class="me-4 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Kitchen Star</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">2300 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-400 fw-bold">2</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/3.png') }}" class="me-4 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Hotel Rangoli</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">1500 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-400 fw-bold">3</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/4.png') }}" class="me-4 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Hotel Luxury</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">1000 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-400 fw-bold">4</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/5.png') }}" class="me-5 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Hotel Raj</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">800 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-400 fw-bold">5</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3 ribbon ribbon-top">
                            <div class="ribbon-label bg-primary">You</div>
                        </div>
                        <div class="d-flex flex-stack ">
                            <div class="d-flex align-items-center me-3">
                                <img src="{{ asset('restaurant/media/restro/6.png') }}" class="me-4 w-45px"
                                    alt="" />
                                <div class="flex-grow-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">Royal Hotel</a>
                                    <span class="text-gray-400 fw-bold d-block fs-6">20 Users</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center w-100 mw-125px">
                                <div class="progress h-6px w-100 me-2 bg-light-success">
                                    <div class="progress h-6px w-100 me-2 bg-light-primary">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <span class="text-gray-400 fw-bold">99</span>
                            </div>
                        </div>
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
                            <div class="modal-body pt-0 pb-20 px-lg-17">
                                <div class="d-flex">
                                    <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                fill="currentColor" />
                                            <path
                                                d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="mb-9">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                            <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                        </div>
                                        <div class="fs-6" data-kt-calendar="event_description"></div>
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
                                        <span class="fw-bolder">Starts</span>
                                        <span data-kt-calendar="event_start_date"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-9">
                                    <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <circle fill="currentColor" cx="12" cy="12" r="8" />
                                        </svg>
                                    </span>
                                    <div class="fs-6">
                                        <span class="fw-bolder">Ends</span>
                                        <span data-kt-calendar="event_end_date"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="fs-6" data-kt-calendar="event_location"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--begin::Modal - Restaurant Information-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form id="kt_modal_new_target_form" action="#" class="form" novalidate="novalidate">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Restaurant Information</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Approx Price Person</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="99 To 9999"
                            name="approx_price_person" required>
                    </div>
                    <!--end::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Food Category</span>
                        </label>
                        <input class="form-control form-control-solid" value="Punjabi, Chinese , Italian"
                            name="food_category" id="kt_tagify1" required />
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-8">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Restaurant Photos</span>
                        </label>
                        <div class="dropzone" id="kt_dropzonejs1">
                            <div class="dz-message needsclick">
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.
                                    </h3>
                                    <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <div class="fv-row mb-8">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Restaurant Menu</span>
                        </label>
                        <div class="dropzone" id="kt_dropzonejs2">
                            <div class="dz-message needsclick">
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.
                                    </h3>
                                    <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Facilities</span>
                        </label>
                        <input class="form-control form-control-solid" value="Private Dining Rooms,Wi-Fi Access"
                            name="facilities" id="kt_tagify2" required />
                    </div>
                    <!--end::Input group-->
                    <div class="text-center">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="kt_modal_new_target_submit"
                            class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Restaurant Information-->
<!-- Send Gift Modal -->
<div class="modal fade" tabindex="-1" id="sendgift">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form w-lg-500px mx-auto" novalidate="novalidate">
                <div class="modal-header">
                    <h5 class="modal-title">Sent a Gift</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
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
                                    <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}"
                                        placeholder="Mobile No.." required>
                                </div>
                            </div>
                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="fv-row mb-10">
                                    <div class="row">
                                        <div class="col mt-5">
                                            <div
                                                class="rounded border-gray-300 border-1 border-gray-300 border-dashed">
                                                <div class="d-flex">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('restaurant/media/restro/passport.png') }}"
                                                            class="img-fluid rounded-start h-100" alt="Pizza Image">
                                                    </div>
                                                    <div class="col-md-8 p-3">
                                                        <div class="d-flex flex-stack">
                                                            <span class="card-title fs-3 text-primary fw-bolder">Buy 1
                                                                Get 1 Free</span>
                                                            <span><input class="form-check-input" type="checkbox"
                                                                    value="1"></span>
                                                        </div>
                                                        <p class="card-text fw-bolder">Buy 1 Pizza (Rs.100) Get 1 Pizza
                                                            (Free)</p>
                                                        <div class="d-flex flex-stack">
                                                            <span class=" badge badge-success">Gift quantity </span>
                                                            <!--begin::Dialer-->
                                                            <div class="input-group w-md-150px" data-kt-dialer="true"
                                                                data-kt-dialer-min="1" data-kt-dialer-max="50"
                                                                data-kt-dialer-step="1">
                                                                <button
                                                                    class="btn btn-icon btn-outline btn-outline-secondary"
                                                                    type="button" data-kt-dialer-control="decrease">
                                                                    <i class="bi bi-dash fs-1"></i>
                                                                </button>
                                                                <input type="text" class="form-control" readonly
                                                                    placeholder="Amount" value="1"
                                                                    data-kt-dialer-control="input" />
                                                                <button
                                                                    class="btn btn-icon btn-outline btn-outline-secondary"
                                                                    type="button" data-kt-dialer-control="increase">
                                                                    <i class="bi bi-plus fs-1"></i>
                                                                </button>
                                                            </div>
                                                            <!--end::Dialer-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                        <div class="col mt-5">
                                            <div
                                                class="rounded border-gray-300 border-1 border-gray-300 border-dashed">
                                                <div class="d-flex">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('restaurant/media/restro/passport.png') }}"
                                                            class="img-fluid rounded-start h-100" alt="Pizza Image">
                                                    </div>
                                                    <div class="col-md-8 p-3">
                                                        <div class="d-flex flex-stack">
                                                            <span class="card-title fs-3 text-primary fw-bolder">Buy 1
                                                                Get 1 Free</span>
                                                            <span><input class="form-check-input" type="checkbox"
                                                                    value="1"></span>
                                                        </div>
                                                        <p class="card-text fw-bolder">Buy 1 Pizza (Rs.100) Get 1 Pizza
                                                            (Free)</p>
                                                        <div class="d-flex flex-stack">
                                                            <span class=" badge badge-success">Gift quantity </span>
                                                            <!--begin::Dialer-->
                                                            <div class="input-group w-md-150px" data-kt-dialer="true"
                                                                data-kt-dialer-min="1" data-kt-dialer-max="50"
                                                                data-kt-dialer-step="1">
                                                                <button
                                                                    class="btn btn-icon btn-outline btn-outline-secondary"
                                                                    type="button" data-kt-dialer-control="decrease">
                                                                    <i class="bi bi-dash fs-1"></i>
                                                                </button>
                                                                <input type="text" class="form-control" readonly
                                                                    placeholder="Amount" value="1"
                                                                    data-kt-dialer-control="input" />
                                                                <button
                                                                    class="btn btn-icon btn-outline btn-outline-secondary"
                                                                    type="button" data-kt-dialer-control="increase">
                                                                    <i class="bi bi-plus fs-1"></i>
                                                                </button>
                                                            </div>
                                                            <!--end::Dialer-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <div class="me-2">
                                <button type="button" class="btn btn-light btn-active-light-primary"
                                    data-kt-stepper-action="previous">Back</button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary"
                                    data-kt-stepper-action="submit">Submit</button>
                                <button type="button" class="btn btn-primary"
                                    data-kt-stepper-action="next">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- send coupon modal -->
@endsection
@section('js')
<script>
    var element = document.querySelector("#sendGiftForm");
    var stepper = new KTStepper(element);
    stepper.on("kt.stepper.next", function(stepper) {
        stepper.goNext(); // go next step
    });
    stepper.on("kt.stepper.previous", function(stepper) {
        stepper.goPrevious(); // go previous step
    });
</script>

<script type="text/javascript">
    // Function to set a cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Function to get a cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Function to open modal if first visit
    function openModal() {
        var modalShown = getCookie("modalShown");
        if (!modalShown) {
            $('#kt_modal_new_target').modal('show');
            setCookie("modalShown", true, 30); // Set cookie to indicate modal has been shown
        }
    }

    // Open the modal on page load
    $(document).ready(function() {
        openModal();
    });

    // Optional: You can also trigger the modal open event on button click
    $('#modalOpener').click(function() {
        openModal();
    });



    var myDropzone = new Dropzone("#kt_dropzonejs1", {
        url: "#!",
        paramName: "file",
        maxFiles: 10,
        maxFilesize: 10,
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });
    var myDropzone = new Dropzone("#kt_dropzonejs2", {
        url: "#!",
        paramName: "file",
        maxFiles: 10,
        maxFilesize: 10,
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });

    // The DOM elements you wish to replace with Tagify
    var input = document.querySelector("#kt_tagify1");
    new Tagify(input, {
        whitelist: ["Ada", "Adenine", "Agda", "Agilent VEE"],
        maxTags: 10,
        dropdown: {
            maxItems: 20,
            classname: "", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,
            closeOnSelect: false
        }
    });
    var input = document.querySelector("#kt_tagify2");
    new Tagify(input, {
        whitelist: ["Ada", "Adenine", "Agda", "Agilent VEE"],
        maxTags: 10,
        dropdown: {
            maxItems: 20,
            classname: "", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,
            closeOnSelect: false
        }
    });
</script>
@endsection
