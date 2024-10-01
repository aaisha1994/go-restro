@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Contact US
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <!-- Profile -->
      @include('restaurant_admin.account.profile')
      <!-- end:: profile -->
      <div class="card mb-5 mb-xl-10">
         <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Contact US</h3>
            </div>
         </div>
         <div class="card-body border-top p-9">
            <div class="mb-15">
               <div class="row g-5 mb-5 mb-lg-15">
                  <h2 class="text-center fs-1 text-primary">Get in Touch</h2>
                  <p></p>
                  <div class="col-sm-4 ps-lg-10">
                     <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                        <span class="svg-icon svg-icon-3tx svg-icon-primary">
                           <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M25.6313 21.385C25.6313 21.805 25.538 22.2366 25.3397 22.6566C25.1413 23.0766 24.8847 23.4733 24.5463 23.8466C23.9747 24.4766 23.3447 24.9316 22.633 25.2233C21.933 25.515 21.1747 25.6666 20.358 25.6666C19.168 25.6666 17.8963 25.3866 16.5547 24.815C15.213 24.2433 13.8713 23.4733 12.5413 22.505C11.1997 21.525 9.92801 20.44 8.71467 19.2383C7.51301 18.025 6.42801 16.7533 5.45967 15.4233C4.50301 14.0933 3.73301 12.7633 3.17301 11.445C2.61301 10.115 2.33301 8.84331 2.33301 7.62998C2.33301 6.83665 2.47301 6.07831 2.75301 5.37831C3.03301 4.66665 3.47634 4.01331 4.09467 3.42998C4.84134 2.69498 5.65801 2.33331 6.52134 2.33331C6.84801 2.33331 7.17467 2.40331 7.46634 2.54331C7.76967 2.68331 8.03801 2.89331 8.24801 3.19665L10.9547 7.01165C11.1647 7.30331 11.3163 7.57165 11.4213 7.82831C11.5263 8.07331 11.5847 8.31831 11.5847 8.53998C11.5847 8.81998 11.503 9.09998 11.3397 9.36831C11.188 9.63665 10.9663 9.91665 10.6863 10.1966L9.79967 11.1183C9.67134 11.2466 9.61301 11.3983 9.61301 11.585C9.61301 11.6783 9.62467 11.76 9.64801 11.8533C9.68301 11.9466 9.71801 12.0166 9.74134 12.0866C9.95134 12.4716 10.313 12.9733 10.8263 13.58C11.3513 14.1866 11.9113 14.805 12.518 15.4233C13.148 16.0416 13.7547 16.6133 14.373 17.1383C14.9797 17.6516 15.4813 18.0016 15.878 18.2116C15.9363 18.235 16.0063 18.27 16.088 18.305C16.1813 18.34 16.2747 18.3516 16.3797 18.3516C16.578 18.3516 16.7297 18.2816 16.858 18.1533L17.7447 17.2783C18.0363 16.9866 18.3163 16.765 18.5847 16.625C18.853 16.4616 19.1213 16.38 19.413 16.38C19.6347 16.38 19.868 16.4266 20.1247 16.5316C20.3813 16.6366 20.6497 16.7883 20.9413 16.9866L24.803 19.7283C25.1063 19.9383 25.3163 20.1833 25.4447 20.475C25.5613 20.7666 25.6313 21.0583 25.6313 21.385Z" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10"/>
                           </svg>
                        </span>
                        <h1 class="text-dark fw-bolder my-5">Our Contact Number</h1>
                        <div class="text-gray-700 fs-3 fw-bold">+91 98795-98754</div>
                     </div>
                  </div>
                  <!--end::Col-->
                  <div class="col-sm-4 ps-lg-10">
                     <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                        <span class="svg-icon svg-icon-3tx svg-icon-primary">
                           <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M19.833 23.9166H8.16634C4.66634 23.9166 2.33301 22.1666 2.33301 18.0833V9.91665C2.33301 5.83331 4.66634 4.08331 8.16634 4.08331H19.833C23.333 4.08331 25.6663 5.83331 25.6663 9.91665V18.0833C25.6663 22.1666 23.333 23.9166 19.833 23.9166Z" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M19.8337 10.5L16.182 13.4167C14.9803 14.3733 13.0087 14.3733 11.807 13.4167L8.16699 10.5" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                        </span>
                        <h1 class="text-dark fw-bolder my-5">Our Email</h1>
                        <div class="text-gray-700 fs-3 fw-bold">hello@gorestro.com</div>
                     </div>
                  </div>
                  <!--begin::Col-->
                  <div class="col-sm-4 ps-lg-10">
                     <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                        <span class="svg-icon svg-icon-3tx svg-icon-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                              <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                           </svg>
                        </span>
                        <h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
                        <div class="text-gray-700 fs-3 fw-bold">Churchill-laan 16 II, 1052 CD, Amsterdam</div>
                     </div>
                  </div>
                  <!--end::Col-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection
