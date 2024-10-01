<!DOCTYPE html>
<html lang="en">
   <head>
      <title>GoRestro | Restaurant Dashboard</title>
      <meta charset="utf-8"/>
      <meta name="description" content=""/>
      <meta name="keywords" content=""/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="shortcut icon" href="{{asset('restaurant/media/logos/favicon.ico')}}"/>
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
      <!--begin::Page Vendor Stylesheets(used by this page)-->
      <link href="{{asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('restaurant/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
      <!--begin::Global Stylesheets Bundle(used by all pages)-->
      <link href="{{asset('restaurant/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('restaurant/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
   </head>
   <body id="kt_body" id="modalOpener" style="background-image: url(restaurant/media/patterns/header-bg.jpg)" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
      <div class="d-flex flex-column flex-root">
         <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
               <!--begin::Header-->
                  @include('restaurant_admin.layouts.header')
               <!--begin::Toolbar-->
                  <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                     <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                        <div class="page-title d-flex flex-column me-3">
                           <h1 class="d-flex text-white fw-bolder my-1 fs-3">@yield('toolbar')</h1>
                           <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                              <li class="breadcrumb-item text-white opacity-75">
                                 <span class="text-white text-hover-primary">Restaurant Name</span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               <!--begin::Container-->
                  @yield('content')
               <!--end::Container-->

               <!--begin::Footer-->
                  @include('restaurant_admin.layouts.footer')
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
      <!--begin::Javascript-->
      <script>var hostUrl = "restaurant/";</script>
      <!--begin::Global Javascript Bundle(used by all pages)-->
      <script src="{{asset('restaurant/plugins/global/plugins.bundle.js')}}"></script>
      <script src="{{asset('restaurant/js/scripts.bundle.js')}}"></script>
      <!--begin::Page Vendors Javascript(used by this page)-->
      <script src="{{asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
      <script src="{{asset('restaurant/plugins/custom/datatables/datatables.bundle.js')}}"></script>
      <!--begin::Page Custom Javascript(used by this page)-->
      <script src="{{asset('restaurant/js/custom/account/settings/signin-methods.js')}}"></script>
      <script src="{{asset('restaurant/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/apps/calendar/calendar.js')}}"></script>
      <script src="{{asset('restaurant/js/widgets.bundle.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/widgets.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/apps/chat/chat.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/utilities/modals/create-app.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/utilities/modals/new-target.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/utilities/modals/create-campaign.js')}}"></script>
      <script src="{{asset('restaurant/js/custom/utilities/modals/users-search.js')}}"></script>
      <!--begin::Page Custom Javascript(used by this page)-->
      @yield('js')
   </body>
</html>
