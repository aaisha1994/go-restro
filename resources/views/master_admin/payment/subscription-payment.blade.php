@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0">Subscription Payment</h4>
            </div>
         </div>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#restaurant" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Restaurant</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Users</span>
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content p-3 text-muted">
                     <div class="tab-pane active" id="restaurant" role="tabpanel">
                        <div class="row mb-4">
                           <div class="col">
                              <div class="form-inline float-md-start">
                                 <div class="search-box ms-2">
                                    <div class="position-relative">
                                       <input type="text" class="form-control rounded" placeholder="Search...">
                                       <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="d-grid gap-2 d-flex justify-content-end">
                                 <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table mb-0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Restaurant Name</th>
                                    <th>Plan Name</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Transaction Number</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>Gold Restro</td>
                                    <td>Basic Bliss</td>
                                    <td>150 &#8377;</td>
                                    <td>15/10/2024</td>
                                    <td>2625PPLP121</td>
                                 </tr>
                                 <tr>
                                    <th scope="row">2</th>
                                    <td>Perks Restro</td>
                                    <td>Premium Paradise</td>
                                    <td>250 &#8377;</td>
                                    <td>10/10/2024</td>
                                    <td>569235LLP21</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="tab-pane" id="users" role="tabpanel">
                        <div class="row mb-4">
                           <div class="col">
                              <div class="form-inline float-md-start">
                                 <div class="search-box ms-2">
                                    <div class="position-relative">
                                       <input type="text" class="form-control rounded" placeholder="Search...">
                                       <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="d-grid gap-2 d-flex justify-content-end">
                                 <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table mb-0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Restaurant Name</th>
                                    <th>Passport Tenure</th>
                                    <th>Purchased Plan</th>
                                    <th>Amount</th>
                                    <th>Transaction Number</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>user name</td>
                                    <td>restro name</td>
                                    <td>3 month</td>
                                    <td>Gold</td>
                                    <td>150 &#8377;</td>
                                    <td>12526LKI23</td>
                                    <td>15/10/2024</td>
                                 </tr>
                                 <tr>
                                    <th scope="row">2</th>
                                    <td>user name</td>
                                    <td>restro name</td>
                                    <td>6 month</td>
                                    <td>silver</td>
                                    <td>250 &#8377;</td>
                                    <td>12526LKI23</td>
                                    <td>15/10/2024</td>
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
   </div>
</div>
@endsection
