<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Go Restro | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Go Restro" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    @yield('css')
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('Admin.layouts.header')

        @include('Admin.layouts.sidebar')

        <div class="main-content">
            @yield('content')

            @include('Admin.layouts.footer')
        </div>
    </div>
    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">
                <h5 class="m-0 me-2">Settings</h5>
                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>
            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>
            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail"
                        alt="layout-1">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail"
                        alt="layout-2">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                        data-bsStyle="./assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.html">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>
            </div>
        </div>
        <!-- end slimscroll-menu-->
    </div>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    {{-- <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script> --}}

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <!-- High charts -->

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
        $('#search').on('input', function () {
            $('#datatable').DataTable().search(this.value).draw();
        });
    </script>
    @yield('js')
    {{-- <script src="https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.1/firebase-messaging.js"></script> --}}
    <script>
        // var firebaseConfig = {
        //     apiKey: "AIzaSyBhPkcymuz-dSPcLkCupXvKCfHHwMtWcFs",
        //     authDomain: "go-restro-418107.firebaseapp.com",
        //     projectId: "go-restro-418107",
        //     storageBucket: "go-restro-418107.appspot.com",
        //     messagingSenderId: "344791552147",
        //     appId: "1:344791552147:web:aec69dbe392cb080957d66",
        //     measurementId: "G-ZN7BJGENLD"
        // };

        // firebase.initializeApp(firebaseConfig);
        // const messaging = firebase.messaging();
        // // messaging.requestPermission();

        // function initFirebaseMessagingRegistration() {
        //     console.log('3');
        //     messaging.requestPermission().then(function() {
        //             return messaging.getToken()
        //         })
        //         .then(function(token) {
        //             console.log('token', token);
        //             // let device_token = $('#fcmToken').val();
        //             // if (device_token != token) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //                 url: '{{ route('admin.fcmToken') }}',
        //                 type: 'POST',
        //                 data: {
        //                     token: token
        //                 },
        //                 dataType: 'JSON',
        //                 success: function(response) {
        //                     alert('Token saved successfully.');
        //                 },
        //                 error: function(err) {
        //                     console.log('User Chat Token Error' + err);
        //                 },
        //             });
        //             // }
        //         }).catch(function(err) {
        //             console.log('User Chat Token Error' + err);
        //         });
        // }
        // // if (getCookie("fcm") == "") {

        // messaging.requestPermission().then(function() {
        //     console.log('2');
        //     initFirebaseMessagingRegistration();
        // });

        // // }

        // messaging.onMessage(function(payload) {
        //     console.log("1");
        //     const noteTitle = payload.notification.title;
        //     const noteOptions = {
        //         body: payload.notification.body,
        //         icon: payload.notification.icon,
        //     };
        //     new Notification(noteTitle, noteOptions);
        // });
    </script>
</body>

</html>
