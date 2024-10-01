@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">

      <div class="row">
         <div class="col">
            <div class="page-title-box d-flex align-items-center justify-content-between">
               <h4 class="mb-md-0">Affiliate Payment</h4>
               <div class=" ">
                  <div class="d-grid gap-2 d-sm-flex justify-content-end">
                     <a href="javascript:void(0)" class="badge bg-info-subtle text-info fs-5"><span class="fs-6">Total Amount</span> 3000</a>
                     <a href="javascript:void(0)" class="badge bg-danger-subtle text-danger fs-5"><span class="fs-6">Pending </span>1000</a>
                     <a href="javascript:void(0)" class="badge bg-success-subtle text-success fs-5"><span class="fs-6">InProgress</span> 2000</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="row mb-4">
                     <div class="col">
                        <div class="form-inline float-md-start">
                           <div class="search-box ms-2">
                              <div class="position-relative">
                                 <input type="search" id="search" class="form-control rounded" placeholder="Search...">
                                 <i class="mdi mdi-magnify search-icon"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="d-grid gap-2 d-flex justify-content-end">
                           <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                           <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Upload to Excel</a>
                        </div>
                     </div>
                  </div>

                  <div class="table-responsive">
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                           <tr>
                              <th style="width: 20px;">
                                 <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="ordercheck">
                                     <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                 </div>
                               </th>
                              <th>#</th>
                              <th>Affiliate Name</th>
                              <th>Affiliate Type</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>Payment Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="ordercheck1">
                                     <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                 </div>
                              </td>
                              <th scope="row">1</th>
                              <td>affiliate name</td>
                              <td>Marketing Agencies</td>
                              <td>150 &#8377;</td>
                              <td>04 Apr, 2024</td>
                              <td>
                                 <div class="float-start">
                                    <select class="form-select form-select-sm">
                                       <option selected="">Pending</option>
                                       <option value="1">In-progress</option>
                                       <option value="2">Success</option>
                                    </select>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="ordercheck3">
                                     <label class="form-check-label mb-0" for="ordercheck3">&nbsp;</label>
                                 </div>
                              </td>
                              <th scope="row">2</th>
                              <td>affiliate name</td>
                              <td>Social Influencers</td>
                              <td>250 &#8377;</td>
                              <td>03 Apr, 2024</td>
                              <td>
                                 <div class="float-start">
                                    <select class="form-select form-select-sm">
                                       <option selected="">Pending</option>
                                       <option value="1">In-progress</option>
                                       <option value="2">Success</option>
                                    </select>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
