@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   QR Invites
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
       <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7   mx-auto">
            <div class="card card-flush py-4">
               <div class="card-header">
                  <div class="card-title mx-auto mb-5">
                     <img src="{{asset('restaurant/media/logos/logo.png')}}" class="w-150px" />
                  </div>
               </div>
               <div class="card-body text-center pt-5">
                  <div class="image-input image-input-empty image-input-outline mb-3">
                     <div class="image-input-wrapper w-150px h-150px">
                        <img src="{{asset('restaurant/media/restro/qr.png')}}" class="w-150px h-150px" />
                     </div>
                  </div>
                  <div class="text-dark fw-bolder pt-5 fs-3">Scan This QR to Download The App</div>
                  <div class="text-dark fw-bolder pt-2 fs-6"><span class="text-primary">Invites</span>-150</div>
               </div>
                <div class="d-flex gap-5 mx-auto icons">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#serial_number">
                     <div class="bg-light-primary rounded-circle p-4">
                        <i class="bi bi-link-45deg text-primary fs-1"></i>
                     </div>
                  </a>
                  <a href="javascript:void(0)">
                     <div class="bg-light-primary rounded-circle p-4">
                        <i class="bi bi-download text-primary fs-2"></i>
                     </div>
                  </a>
                  <a href="javascript:void(0)">
                     <div class="bg-light-primary rounded-circle p-4">
                        <i class="bi bi-share text-primary fs-2"></i>
                     </div>
                  </a>
                  <a href="javascript:void(0)">
                     <div class="bg-light-primary rounded-circle p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                        </svg>
                     </div>
                  </a>
                </div>
            </div>
       </div>
   </div>
</div>
<!--end::Container-->
<!-- Modal Start -->
<div class="modal fade" tabindex="-1" id="serial_number">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="" action="">
               <div class="modal-body">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                     <span class="required">Serial Number</span>
                  </label>
                  <input type="text" class="form-control form-control-solid" name="" placeholder="SMPH00123" required>
               </div>

               <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button value="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection
@section('js')

@endsection
