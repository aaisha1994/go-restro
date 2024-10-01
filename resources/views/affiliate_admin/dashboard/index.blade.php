@extends('affiliate_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Affiliate Dashboard
@endsection
<!--end::Toolbar-->
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
                        <img src="{{asset('restaurant/media/svg/illustrations/easy/3.svg')}}" class="w-100px w-xl-90px" alt="image"/>
                     </div>
                     <a href="javascript:void(0)">
                     <div class="rounded text-center min-w-200px py-3 px-4 my-1 me-6" style="border: 2px dashed rgba(255, 255, 255, 0.8)">
                        <div class="fw-bold fs-6 text-white">Current Balance</div>
                        <div class="d-flex justify-content-center">
                           <span class="text-white fs-1 fw-bolder me-3">&#8377;</span>
                           <div class="text-white fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-value="400">0</div>
                        </div>
                     </div>
                     </a>
                     <a href="javascript:void(0)">
                        <div class="rounded text-center min-w-200px py-3 px-4 my-1" style="border: 2px dashed rgba(255, 255, 255, 0.8)">
                           <div class="fw-bold fs-6 text-white">Total Earned INR</div>
                           <div class="d-flex justify-content-center">
                              <span class="text-white fs-1 fw-bolder me-3">&#8377;</span>
                              <div class="text-white fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-value="1200">0</div>
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
                             <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1"
                             name="search" value="https://go-restro.com/?ref=gorestro_user" />

                             <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0"
                             data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end::Row-->
      <!--begin::Row-->
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
                           <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_11_tab_1" href="#kt_chart_widget_11_tab_content_1">Week</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">Monthly</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Yearly</a>
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
                           <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">1,200</span>
                           <span class="fs-6 fw-bold text-gray-400">This Week</span>
                        </div>
                        <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto w-100" style="height: 300px"></div>
                     </div>
                     <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                        <div class="mb-2">
                           <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">2,200</span>
                           <span class="fs-6 fw-bold text-gray-400">This Month</span>
                        </div>
                        <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                     </div>
                     <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                        <div class="mb-2">
                           <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2">3,300</span>
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
                  <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bolder text-gray-800">Restaurant information</span>
                  </h3>
                  <div class="card-toolbar">
                     <a href="javascript:void(0)" class="btn btn-sm btn-light">View All</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead>
                           <tr class="fs-7 fw-bolder text-gray-400 border-bottom-0">
                              <th class="p-0 pb-3 min-w-175px text-start">Restaurant Name</th>
                              <th class="p-0 pb-3 min-w-100px text-end">Contact No.</th>
                              <th class="p-0 pb-3 min-w-100px text-end">Commission</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                       <img src="{{asset('restaurant/media/stock/600x600/img-49.jpg')}}" class="" alt="" />
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">The Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">+91 5265356953</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">10%</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                       <img src="{{asset('restaurant/media/stock/600x600/img-43.jpg')}}" class="" alt="" />
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Blue Bubble Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">+91 5265356953</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">20%</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                       <img src="{{asset('restaurant/media/stock/600x600/img-46.jpg')}}" class="" alt="" />
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Color Face Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">+91 5265356953</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">15%</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                       <img src="{{asset('restaurant/media/stock/600x600/img-54.jpg')}}" class="" alt="" />
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Blue to Orange Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">+91 5265356953</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">5%</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                       <img src="{{asset('restaurant/media/stock/600x600/img-45.jpg')}}" class="" alt="" />
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Awesome Bird Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">+91 5265356953</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">10%</span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
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
                     <span class="card-label fw-bolder text-gray-800">Invoice list</span>
                  </h3>
                  <div class="card-toolbar">
                     <a href="javascript:void(0)" class="btn btn-sm btn-light">View All</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead>
                           <tr class="fs-7 fw-bolder text-gray-400 border-bottom-0">
                              <th class="p-0 pb-3 min-w-175px text-start">Name & Email</th>
                              <th class="p-0 pb-3 min-w-100px text-end">Payment Status</th>
                              <th class="p-0 pb-3 min-w-100px text-end">Amount</th>
                              <th class="p-0 pb-3 min-w-100px text-end">Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">The Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JennyWilson@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">&#8377; 500</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">1 April 24</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Blue Bubble Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">Guy Hawkins</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">&#8377; 200</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">5 April 24</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Color Face Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">WadeWarren@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">&#8377; 400</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">10 April 24</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Blue to Orange Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JaneCooper@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">&#8377; 100</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">15 April 24</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                       <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Awesome Bird Art</a>
                                       <span class="text-gray-400 fw-bold d-block fs-7">JacobJones@gmail.com</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">&#8377; 300</span>
                              </td>
                              <td class="text-end pe-0">
                                 <span class="text-gray-600 fw-bolder fs-6">20 April 24</span>
                              </td>
                           </tr>
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
                  <form method="" action="">
                     <div class="d-flex align-items-center">
                        <input type="email" class="form-control form-control-solid me-5" placeholder="email@example.com"/>
                        <button type="submit" class="btn btn-md btn-primary d-flex align-items-center gap-3">Send <i class="bi bi-send"></i></button>
                     </div>
                  </form>
                  <h4 class="card-title pt-10">
                     <span class="card-label fw-bolder text-gray-800">Share Your Referral Link!</span>
                  </h4>
                  <div class="rounded text-center mt-10 py-10 px-4 " style="border: 2px dashed rgba(0, 0, 0, 0.8)">
                     <p class="fs-4">"Invite your friends to join us and reap the benefits together! Simply enter their email addresses below and hit send to share your referral link. Let's grow our community and unlock exciting opportunities together."</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
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
 </script>
@endsection
