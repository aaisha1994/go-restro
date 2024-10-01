@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Promotion</h4>
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
                            <a href="{{Route('promotion-create')}}" class="btn btn-sm btn-primary" type="button">&#43; Add Promotion</a>
                          </div>
                        </div>
                      </div>

                      <div class="table-responsive">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Image</th>
                                      <th>Promotion Name</th>
                                      <th>Restaurant Name</th>
                                      <th>Coupons</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td><img src="{{asset('assets/images/users/logo.png')}}" alt="avatar" class="rounded avatar-sm"></td>
                                      <td>Flavor Fiesta</td>
                                      <td>restro name</td>
                                      <td>coupons name</td>
                                      <td id="tooltip-container9">

                                           <a href="{{Route('promotion-edit')}}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="mdi mdi-pencil font-size-14"></i></a>

                                           <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" id="delete" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td><img src="{{asset('assets/images/users/logo.png')}}" alt="avatar" class="rounded avatar-sm"></td>
                                      <td>Taste Triumph</td>
                                      <td>restro name</td>
                                      <td>coupons name</td>
                                      <td id="tooltip-container9">

                                           <a href="{{Route('promotion-edit')}}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="mdi mdi-pencil font-size-14"></i></a>

                                           <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary" id="delete" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
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
