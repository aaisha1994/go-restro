@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Support
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <!-- Profile -->
      @include('restaurant_admin.account.profile')
      <!-- end:: profile -->
      <div class="d-flex flex-wrap flex-stack mb-6">
         <h3 class="fw-bolder my-2">Support</h3>
         <div class="d-flex flex-wrap my-2">
            <div class="me-4">
               <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body w-125px">
                  <option value="Active" selected="selected">Open</option>
                  <option value="Approved">Close</option>
               </select>
            </div>
            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ticket_create">Add Ticket</a>
         </div>
      </div>
      <div class="row g-6 g-xl-9">
         <div class="col-md-6 col-xl-4">
            <a href="javascript:void(0)" class="card border-hover-primary" data-bs-toggle="modal" data-bs-target="#ticket_detail">
               <div class="card-header border-0 pt-9">
                  <div class="card-title m-0">
                     <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                        Refund Related
                     </div>
                  </div>
                  <div class="card-toolbar">
                     <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">Ticket No : 280854622</span>
                  </div>
               </div>
               <div class="card-body">
                  <div class="fs-6 fw-bolder text-dark">Description</div>
                  <p class="text-dark fw-bold fs-6 mt-1 mb-3">Need a refund or have subscription concerns? Tap our support screen for swift resolution and exceptional service.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0">05 Mar 2024</p>
                        <p class="m-0 badge badge-light-primary fw-bolder px-4 py-2">Status: Close</p>
                    </div>
               </div>
            </a>
         </div>
         <!--end::Col-->
         <!--begin::Col-->
         <div class="col-md-6 col-xl-4">
            <a href="javascript:void(0)" class="card border-hover-primary" data-bs-toggle="modal" data-bs-target="#ticket_detail">
               <div class="card-header border-0 pt-9">
                  <div class="card-title m-0">
                     <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                        Refund Related
                     </div>
                  </div>
                  <div class="card-toolbar">
                     <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">Ticket No : 280854622</span>
                  </div>
               </div>
               <div class="card-body">
                  <div class="fs-6 fw-bolder text-dark">Description</div>
                  <p class="text-dark fw-bold fs-6 mt-1 mb-3">Need a refund or have subscription concerns? Tap our support screen for swift resolution and exceptional service.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0">08 Mar 2024</p>
                        <p class="m-0 badge badge-light-success fw-bolder px-4 py-2">Status: Open</p>
                    </div>
               </div>
            </a>
         </div>
         <!--end::Col-->
         <!--begin::Col-->
         <div class="col-md-6 col-xl-4">
            <a href="javascript:void(0)" class="card border-hover-primary" data-bs-toggle="modal" data-bs-target="#ticket_detail">
               <div class="card-header border-0 pt-9">
                  <div class="card-title m-0">
                     <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                        Refund Related
                     </div>
                  </div>
                  <div class="card-toolbar">
                     <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">Ticket No : 280854622</span>
                  </div>
               </div>
               <div class="card-body">
                  <div class="fs-6 fw-bolder text-dark">Description</div>
                  <p class="text-dark fw-bold fs-6 mt-1 mb-3">Need a refund or have subscription concerns? Tap our support screen for swift resolution and exceptional service.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0">15 Mar 2024</p>
                        <p class="m-0 badge badge-light-success fw-bolder px-4 py-2">Status: Open</p>
                    </div>
               </div>
            </a>
         </div>
         <!--end::Col-->
      </div>
   </div>
</div>
<!--end::Container-->
<!-- Ticket Create Modal -->
<div class="modal fade" tabindex="-1" id="ticket_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="">
               <div class="modal-header">
                   <h5 class="modal-title">Add Ticket</h5>
                   <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                       <span class="svg-icon svg-icon-2x"></span>
                   </div>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-12 mb-8">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">Subject</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="" required>
                     </div>
                     <div class="col-lg-12 mb-8">
                       <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">Description</span>
                        </label>
                       <textarea class="form-control form-control-solid" name="" required></textarea>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>

<!-- Ticket Detail Modal -->
<div class="modal fade" tabindex="-1" id="ticket_detail">
    <div class="modal-dialog">
        <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Ticket Details</h5>
                   <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                       <span class="svg-icon svg-icon-2x"></span>
                   </div>
               </div>

               <div class="modal-body">
                  <div class="card-body">
                     <div class="fs-6 fw-bolder text-dark">Refund Related</div>
                     <p class="text-dark fw-bold fs-6 mt-1 mb-3">Need a refund or have subscription concerns? Tap our support screen for swift resolution and exceptional service.</p>
                       <div class="d-flex justify-content-between align-items-center">
                           <p class="m-0">15 Mar 2024</p>
                     </div>
                     <div class="border border-dashed border-2 mt-4 p-5">
                        <div class="fs-4 fw-bolder">Reply</div>
                        <div class="fs-6 text-dark">Go Restro Support Team</div>
                        <p class="pt-4 ">"Thank you for contacting us. We appreciate your patience. Our Financial Department is processing your refund, and you can expect it to be completed within 48 hours. If you have any further questions or concerns, please don't hesitate to reach out. Your satisfaction is our priority."</p>
                        <div class="d-flex justify-content-between align-items-center">
                           <p class="m-0">16 Mar 2024</p>
                           <p class="m-0 badge badge-light-primary fw-bolder px-4 py-2">Status: Close</p>
                       </div>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
               </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
