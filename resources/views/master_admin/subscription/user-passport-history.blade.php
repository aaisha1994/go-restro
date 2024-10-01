@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">User Passport History</h4>
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
                      </div>

                      <div class="table-responsive">
                           <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>User Name</th>
                                      <th>Restaurant Name</th>
                                      <th>Amount</th>
                                      <th>Purchased Date</th>
                                      <th>Invoice</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>user name</td>
                                      <td>restro name</td>
                                      <td>150</td>
                                      <td>10/3/2024</td>
                                      <td>
                                        <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Invoice" data-bs-original-title="Invoice"><i class="ri-file-download-line font-size-14"></i></a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>user name</td>
                                      <td>restro name</td>
                                      <td>250</td>
                                      <td>10/5/2024</td>
                                      <td>
                                        <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Invoice" data-bs-original-title="Invoice"><i class="ri-file-download-line font-size-14"></i></a>
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
