@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-md-0">View Restro coupon Offer</h4>
                  <div class=" ">
                      <div class="d-grid gap-2 d-flex justify-content-end">
                          <a href="{{Route('restro-offer-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                          <a href="{{Route('restro-offer-edit')}}" type="submit" class="btn btn-sm btn-primary">Edit</a>
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
                        <img class="rounded me-3" alt="user profile" width="200" src="{{asset('assets/images/users/restro.jpg')}}" data-holder-rendered="true">
                     </div>
                     <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start mb-2">
                           <div class="d-flex flex-column">
                              <div class="d-flex align-items-center mb-3">
                                 <a href="#" class="fs-2 text-dark fw-bolder me-1">Restaurant Name</a>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Offer Name</h6>
                                    <p class="fw-bolder">Deal Delights.</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Offer Text</h6>
                                    <p class="fw-bolder">Buy 1 Get 1 free </p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Coupon Quantity</h6>
                                    <p class="fw-bolder">50</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Validity</h6>
                                    <p class="fw-bolder">02/01/2024</p>
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Terms & Condition</h6>
                                    <p class="fw-bolder">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
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
   </div>
   <!-- container-fluid -->
</div>
@endsection
