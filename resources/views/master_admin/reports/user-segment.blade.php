@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">User Segment</h4>
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
                            <a href="{{Route('index')}}" class="btn btn-sm btn-primary" type="button">Back</a>
                          </div>
                        </div>
                      </div>

                      <div class="table-responsive">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Contact No.</th>
                                      <th>Created Date</th>
                                      <th>Purchase Subscription</th>
                                      <th>No Of Passport</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>User Name</td>
                                      <td>user@gmail.com</td>
                                      <td>+91 123456789</td>
                                      <td>5/2/2024</td>
                                      <td>Yes</td>
                                      <td>20</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>User Name</td>
                                      <td>user@gmail.com</td>
                                      <td>+91 123456789</td>
                                      <td>5/2/2024</td>
                                      <td>No</td>
                                      <td>25</td>
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
