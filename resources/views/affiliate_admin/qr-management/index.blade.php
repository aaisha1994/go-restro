@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
   QR Management
@endsection
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card">
         <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card-flush border-0 h-lg-100" >
               <div class="card-header border-0 pt-2">
                  <h3 class="card-title">
                     <span class="text-gray-600 text-hover-primary fs-3 fw-bolder me-2">Your referral link</span>
                  </h3>
               </div>
               <!--end::Header-->
               <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                  <div class="px-9 mb-5">
                     <div class="w-lg-100">
                         <h4 class="fs-6 mb-5 fw-bold text-primary">Share referral link with friends</h4>
                           <div class="row">
                              <div class="col-sm-12 col-md-4">
                                 <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Restaurant">
                                     <option></option>
                                     <option value="1">Option 1</option>
                                     <option value="2">Option 2</option>
                                 </select>
                              </div>
                              <div class="col-sm-12 col-md-8 d-flex">
                                <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1"
                                name="search" value="https://go-restro.com/?ref=gorestro_user" />

                                <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0"
                             data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>

                              </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mt-5 mx-auto">
                  <div class="card card-flush border border-3 py-4">
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
                        <div class="text-dark fw-bolder pt-5 fs-3">Scan This QR</div>
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
      </div>
   </div>
</div>
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
  <script type="text/javascript">
   var button = document.querySelector('#kt_share_earn_link_copy_button');
   var input = document.querySelector('#kt_share_earn_link_input');
   var clipboard = new ClipboardJS(button);

   clipboard.on('success', function(e) {
       var buttonCaption = button.innerHTML;
       //Add bgcolor
       input.classList.add('bg-success');
       input.classList.add('text-inverse-success');

       button.innerHTML = 'Copied!';

       setTimeout(function() {
           button.innerHTML = buttonCaption;

           // Remove bgcolor
           input.classList.remove('bg-success');
           input.classList.remove('text-inverse-success');
       }, 1000);

       e.clearSelection();
   });
 </script>
@endsection
