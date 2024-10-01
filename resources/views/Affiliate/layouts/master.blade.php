<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoRestro | @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('restaurant/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    @yield('css')
</head>

<body id="kt_body" style="background-image: url({{ asset('restaurant/media/patterns/1.png') }})" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header-->
                @include('Affiliate.layouts.header')
                <!--begin::Toolbar-->
                <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                        <div class="page-title d-flex flex-column me-3">
                            <h1 class="d-flex text-white fw-bolder my-1 fs-3">@yield('toolbar')</h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                <li class="breadcrumb-item text-white opacity-75">
                                    <span class="text-white text-hover-primary">Hi {{ Auth::guard('affiliate')->user()->first_name.' '.Auth::guard('affiliate')->user()->last_name}}, Welcome back!</span>
                                    <div class="symbol symbol-30px">
                                        <img src="{{ asset('restaurant/media/svg/waving-hand.svg') }}" class="" alt="" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center py-3 py-md-1">
                            @yield('toolbar_buttons')
                        </div>
                    </div>
                </div>
                <!--begin::Container-->
                @yield('content')
                <!--end::Container-->

                <!--begin::Footer-->
                @include('Affiliate.layouts.footer')
                <!--end::Footer-->

            </div>
        </div>
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
        </span>
    </div>
    <script src="{{ asset('restaurant/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('restaurant/js/widgets1.bundle.js') }}"></script> --}}
    {{-- <script src="{{ asset('restaurant/js/custom/widgets.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

        function toastCall(status, message) {
            toastr.options.timeOut = 10000;
            if (status == "success") {
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        }
    </script>
    @yield('js')
</body>

</html>
