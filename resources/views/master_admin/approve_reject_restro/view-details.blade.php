@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-md-0">View Approve & Reject Post</h4>
                  <div class=" ">
                      <div class="d-grid gap-2 d-flex justify-content-end">
                          <a href="{{Route('approve-reject-post')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                     <div class="me-7 mb-0">
                        <img class="rounded me-3" alt="user profile" width="150" src="{{asset('assets/images/users/restro.jpg')}}" data-holder-rendered="true">
                     </div>
                     <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start mb-2">
                           <div class="d-flex flex-column">
                              <div class="d-flex align-items-center mb-3">
                                 <a href="#" class="fs-2 text-dark fw-bolder me-1">Restaurant Name</a>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-2">
                                    <h6 class="fw-bolder">Request Type</h6>
                                    <p class="fw-bolder">Menu Change.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Approve</a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Reject</a>
                    </div>
                  </div>
                  <hr>
                     <div class="row">
                        <h6 class="fw-bolder">Content</h6>
                        <div class="col-sm-12 col-md-3 mb-4">
                           <img class="rounded me-3" alt="user profile" width="200" src="{{asset('assets/images/menu/1.jpg')}}">
                        </div>
                        <div class="col-sm-12 col-md-3 mb-4">
                           <img class="rounded me-3" alt="user profile" width="200" src="{{asset('assets/images/menu/2.jpg')}}">
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
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
