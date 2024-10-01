<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Go Restro</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Go Restro" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
      <!-- jquery.vectormap css -->
      <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
      <!-- DataTables -->
      <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <!--  -->
      <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
      <!-- Lightbox css -->
      <link href="{{asset('assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- ION Slider -->
      <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap Css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
      <!-- main Css -->
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
      <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body data-sidebar="dark">
      <div id="layout-wrapper">
         @include('master_admin.layouts.header')

	        @include('master_admin.layouts.sidebar')

         <div class="main-content">
            @yield('content')

            @include('master_admin.layouts.footer')
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
                  <img src="{{asset('assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="layout-1">
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                  <label class="form-check-label" for="light-mode-switch">Light Mode</label>
               </div>
               <div class="mb-2">
                  <img src="{{asset('assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="layout-2">
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.html">
                  <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
               </div>
            </div>
         </div>
         <!-- end slimscroll-menu-->
      </div>
      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>
      <!-- JAVASCRIPT -->
      <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
      <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
      <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
      <!-- apexcharts -->
      <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
      <!-- jquery.vectormap map -->
      <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
      <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>
      <!-- Required datatable js -->
      <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
      <!-- Responsive examples -->
      <!-- <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script> -->
      <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
      <!-- apexcharts init -->
      <script src="{{asset('assets/js/pages/apexcharts.init.js')}}"></script>
      <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/jquery-knob.init.js')}}"></script>

      <script src="{{asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/chartjs.init.js')}}"></script>

      <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
      <!-- form-validation -->
      <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

      <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
      <script src="{{asset('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
      <!-- Magnific Popup-->
      <script src="{{asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
      <!-- lightbox init js-->
      <script src="{{asset('assets/js/pages/lightbox.init.js')}}"></script>
      <!--tinymce js-->
      <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
      <!-- Form Editor init js -->
      <script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
      <!-- Datatable init js -->
      <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
      <!-- Ion Range Slider-->
      <script src="{{asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
      <!-- Range slider init js-->
      <script src="{{asset('assets/js/pages/range-sliders.init.js')}}"></script>
      <!-- App js -->
      <script src="{{asset('assets/js/app.js')}}"></script>
      <!-- High charts -->
      <script src="https://code.highcharts.com/highcharts.js"></script>
	   <script src="https://code.highcharts.com/highcharts-more.js"></script>
      <script src="{{asset('assets/js/highcharts.js')}}"></script>
	   <!-- Sweet Alert For Delete-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="{{ asset('assets/js/code.js')}}"></script>
      <script src="{{ asset('assets/js/search.js')}}"></script>
      @yield('js')
   </body>
</html>
