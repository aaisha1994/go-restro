@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col">
            <div class="page-title-box d-flex align-items-center justify-content-between">
               <h4 class="mb-md-0">View Affiliate Details</h4>
               <div class=" ">
                  <div class="d-grid gap-2 d-flex justify-content-end">
                     <a href="{{Route('affiliate-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                     <a href="{{Route('affiliate-edit')}}" type="submit" class="btn btn-sm btn-primary">Edit</a>
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
                                    <h6 class="fw-bolder">Type of Affiliate</h6>
                                    <p class="fw-bolder">on wheels</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Vehicle Number</h6>
                                    <p class="fw-bolder">GJ05-1856</p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">State</h6>
                                    <p class="fw-bolder">Gujarat</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">City</h6>
                                    <p class="fw-bolder">Surat</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Zip / Postal code</h6>
                                    <p class="fw-bolder">341504</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4 d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10"></path>
                                       </svg>
                                    </button>
                                    <!-- Modified Wallet Design -->
         									<div class="wallet-container">
         									    <div class="justify-content-end">
         									        <a class="fs-5 fw-bolder text-success">
         									            <i class="ri-wallet-3-line align-middle me-1"></i>750 &#8377;
         									            <p class="fw-bolder">Wallet Balance</p>
         									        </a>
         									    </div>
         									</div>
                                 </div>
                              </div>
                              <div class="row collapse multi-collapse" id="multiCollapseExample1">
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">Bank name</h6>
                                    <p class="fw-bolder">kotak bank</p>
                                 </div>
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">Account holder Name</h6>
                                    <p class="fw-bolder">Ac holder name</p>
                                 </div>
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">Account Number</h6>
                                    <p class="fw-bolder">123456789789456</p>
                                 </div>
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">IFSC code</h6>
                                    <p class="fw-bolder">KOTAK5693SH</p>
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
      <!-- table -->
      <div class="row">
         <div class="col">
            <div class="page-title-box d-flex align-items-center justify-content-between">
               <h4 class="mb-md-0">Wallet History</h4>
               <div class=" ">
                  <div class="d-grid gap-2 d-flex justify-content-end">
                     <a href="javascript:void(0)" class="badge bg-danger-subtle text-danger fs-5">Debited-1000</a>
                     <a href="javascript:void(0)" class="badge bg-success-subtle text-success fs-5">Credited-2000</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-centered  dt-responsive nowrap">
                  <thead class="thead-light">
                     <tr>
                        <th>Transaction Type</th>
                        <th>Date & Time</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Debited</td>
                        <td>04 Apr, 2024 - 12:30PM</td>
                        <td>172 &#8377;</td>
                        <td>
                           <div class="badge bg-danger-subtle text-danger font-size-12">pending</div>
                        </td>
                     </tr>
                     <tr>
                        <td>Credited</td>
                        <td>01 Apr, 2024 - 12:30PM</td>
                        <td>160 &#8377;</td>
                        <td>
                           <div class="badge bg-success-subtle text-success  font-size-12">Success</div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
@endsection
