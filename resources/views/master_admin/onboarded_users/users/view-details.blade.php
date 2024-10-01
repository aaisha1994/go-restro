@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-md-0">View Member Details</h4>
                  <div class=" ">
                      <div class="d-grid gap-2 d-flex justify-content-end">
                          <a href="{{Route('users')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                          <a href="{{Route('edit')}}" type="submit" class="btn btn-sm btn-primary">Edit</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end page title -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card mb-4 mb-xxl-8">
               <div class="card-body pt-9 pb-0">
                  <div class="d-flex flex-wrap flex-sm-nowrap">
                     <div class="me-7 mb-4">
                        <img class="rounded me-3" alt="user profile" width="180" src="{{asset('assets/images/users/avatar-1.jpg')}}" data-holder-rendered="true">
                     </div>
                     <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start mb-2">
                           <div class="d-flex flex-column">
                              <div class="d-flex align-items-center mb-3">
                                 <a href="#" class="fs-2 text-dark fw-bolder me-1">Max Smith</a>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Email</h6>
                                    <p class="fw-bolder">maxsmith@gmail.com</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Phone No.</h6>
                                    <p class="fw-bolder">+91 8666362669</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Date of Birth </h6>
                                    <p class="fw-bolder">02/01/2004</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Anniversary Date </h6>
                                    <p class="fw-bolder">02/01/2020</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Spouse Date of Birth</h6>
                                    <p class="fw-bolder">02/01/2004</p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Child Date of Birth</h6>
                                    <p class="fw-bolder">02/02/2016</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">State</h6>
                                    <p class="fw-bolder">Gujarat</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">City</h6>
                                    <p class="fw-bolder">Surat</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Zip / Postal code </h6>
                                    <p class="fw-bolder">341504</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16">
                                         <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                              <div class="row collapse multi-collapse" id="multiCollapseExample1">
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">Country</h6>
                                    <p class="fw-bolder">India</p>
                                 </div>
                                 <div class="col-sm-12 col-md-9 mb-4">
                                    <h6 class="fw-bolder">Address</h6>
                                    <p class="fw-bolder">Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- coupon -->
      <div class="container-fluid">
         <div class="row">
             <div class="col">
                 <div class="page-title-box d-flex align-items-center justify-content-between">
                     <h4 class="mb-md-0">coupons</h4>
                     <div class=" ">
                         <div class="d-grid gap-2 d-flex justify-content-end">
                              <div class="btn-group">
                                 <select class="form-select form-select-sm">
                                    <option selected>Filter Coupons</option>
                                    <option value="1">All</option>
                                    <option value="1">Available</option>
                                    <option value="2">Redeemed</option>
                                    <option value="3">Expired</option>
                                 </select>
                              </div>
                              <div class="btn-group">
                                 <select class="form-select form-select-sm">
                                    <option selected>Select Restro</option>
                                    <option value="1">Restro 1</option>
                                    <option value="2">Restro 2</option>
                                    <option value="3">Restro 3</option>
                                 </select>
                              </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
          <div class="row">
              <div class="col-sm-12 col-md-4">
                  <div class="card fw-bolder text-dark">
                       <div class="rubber_stamp">
                            <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                       </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
               <div class="col-sm-12 col-md-4">
                  <div class="card fw-bolder text-dark">
                     <div class="rubber_stamp">
                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
               <div class="col-sm-12 col-md-4">
                  <div class="card fw-bolder text-dark">
                     <div class="rubber_stamp">
                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                     </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/3.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12 col-md-4">
                  <div class="card box1">
                    <div class="rubber_stamp">
                        <img src="{{asset('assets/images/coupon-logo/expired-stamp.png')}}" alt="stamp" width="150">
                     </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
               <div class="col-sm-12 col-md-4">
                  <div class="card fw-bolder text-dark">
                     <div class="rubber_stamp">
                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                     </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
               <div class="col-sm-12 col-md-4">
                  <div class="card fw-bolder text-dark">
                     <div class="rubber_stamp">
                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                     </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="qr-code">
                                      <img src="{{asset('assets/images/coupon-logo/3.png')}}" alt="qr-code" width="70">
                                  </div>
                              </div>
                              <div class="col-md-1 align-items-center border-end border-2"></div>
                              <div class="col-md-8">
                                  <div class="align-items-center">
                                    <!-- <span class="badge bg-success">Success</span> -->
                                      <h3>15% <span class="fs-5">Discount</span>
                                       <span class="position-absolute top-0 end-0">
                                          <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                             <i class="ri-information-line fs-4"></i>
                                          </a>
                                       </span>
                                       </h3>
                                      <span>Orders from 160,000 VND</span>
                                      <span>October 25 - 26, 2023</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
@endsection
