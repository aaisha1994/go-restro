@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Approve & Reject Post</h4>
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
                                      <th>Restaurant Name</th>
                                      <th>Request Type</th>
                                      <th>Content</th>
                                      <th class="text-start">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>Restro Name</td>
                                      <td>Profile Change</td>
                                      <td>{{Str::of('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')->limit(40)}}</td>
                                      <td class="d-flex gap-2 justify-content-start">
                                          <a href="{{route('approve-reject-details')}}" class="btn btn-secondary btn-sm">View</a>
                                          <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Approve</a>
                                          <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Reject</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>Restro Name</td>
                                      <td>Menu change</td>
                                      <td>{{Str::of('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')->limit(40)}}</td>
                                      <td class="d-flex gap-2 justify-content-start">
                                          <a href="{{route('approve-reject-details')}}" class="btn btn-secondary btn-sm">View</a>
                                          <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Approve</a>
                                          <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Reject</a>
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

 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="" accept="">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Do you want to update the passport price ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <label>Old Price</label>
                    <input type="text" value="500" name="passport-price" class="form-control">
                  </div>
                  <div class="col">
                    <label>New Price</label>
                    <input type="text" name="passport-price" class="form-control">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
