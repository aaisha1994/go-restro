@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
Account Settings
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <!-- Profile -->
      @include('restaurant_admin.account.profile')
      <!-- end:: profile -->
      <div class="card mb-5 mb-xl-10">
         <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Profile Details</h3>
            </div>
         </div>
         <div id="kt_account_settings_profile_details" class="collapse show">
            <form id="kt_account_profile_details_form" class="form">
               <div class="card-body border-top p-9">
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label fw-bold fs-6">Restaurant Logo</label>
                     <div class="col-lg-8">
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('restaurant/media/svg/avatars/blank.svg')">
                           <div class="image-input-wrapper w-125px h-125px" style="background-image: url(restaurant/media/logos/logo1.png)"></div>
                           <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                           <i class="bi bi-pencil-fill fs-7"></i>
                           <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                           <input type="hidden" name="avatar_remove" />
                           </label>
                           <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                           <i class="bi bi-x fs-2"></i>
                           </span>
                           <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                           <i class="bi bi-x fs-2"></i>
                           </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Name</label>
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="GoRestro" />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                     <div class="col-lg-8 fv-row">
                        <input type="email" name="website" class="form-control form-control-lg form-control-solid" value="gorestro@gmail.com" />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Mobile Number</span>
                     </label>
                     <div class="col-lg-8 fv-row">
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" value="+91 3276 454 935" />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Alt Mobile Number</span>
                     </label>
                     <div class="col-lg-8 fv-row">
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" value="+91 8562 454 935" />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">State</span>
                     </label>
                     <div class="col-lg-8 fv-row">
                        <select name="state" aria-label="Select a state" data-control="select2" data-placeholder="Select a state..." class="form-select form-select-solid form-select-lg fw-bold">
                           <option value="">Select a State...</option>
                           <option value="AD" selected>Gujarat</option>
                           <option value="AF">Uttar Pradesh</option>
                           <option value="AX">Maharashtra</option>
                           <option value="AL">Bihar</option>
                           <option value="DZ">West Bengal</option>
                           <option value="AS">Madhya Pradesh</option>
                           <option value="AD">Rajasthan</option>
                           <option value="AD">Karnataka</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">City</label>
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="city" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="surat" />
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Zip Code</label>
                     <div class="col-lg-8 fv-row">
                        <input type="number" name="zipcode" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="341504"/>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Approx Price Person</label>
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="price" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="99 To 999"/>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Food Category</label>
                     <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Food Category" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <option value="1" selected>Punjabi</option>
                            <option value="2">Chinese</option>
                            <option value="2">Gujarati</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Image</label>
                     <div class="col-lg-8 fv-row">
                        <div class="fv-row">
                          <div class="dropzone" id="kt_dropzonejs1">
                              <div class="dz-message needsclick">
                                  <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                  <div class="ms-4">
                                      <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                      <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                  </div>
                              </div>
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Menu</label>
                     <div class="col-lg-8 fv-row">
                        <div class="fv-row">
                          <div class="dropzone" id="kt_dropzonejs2">
                              <div class="dz-message needsclick">
                                  <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                  <div class="ms-4">
                                      <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                      <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                  </div>
                              </div>
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Facilities</label>
                     <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Facilities" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <option value="1" selected>Private Dining Rooms</option>
                            <option value="2" selected>Wi-Fi Access</option>
                            <option value="3" selected>Outdoor Dining Area</option>
                            <option value="4">Valet Parking</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-6">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                     <div class="col-lg-8 mb-5 fv-row">
                        <textarea name="Address" class="form-control form-control-lg form-control-solid" rows="5">1001, 10th Floor, Luxuria Business Hub, Surat - Dumas Rd, Piplod, Surat, Gujarat 395007</textarea>
                     </div>
                     <div class="col fv-row">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.126452210256!2d72.75700887464711!3d21.147365383695586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d0ef4797e83%3A0x3206cd88a2ea8e47!2sARROWMUSE!5e0!3m2!1sen!2sin!4v1710744230039!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
               <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                  <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection

@section('js')
   <script type="text/javascript">
      var myDropzone = new Dropzone("#kt_dropzonejs1", {
          url: " ",
          paramName: "file",
          maxFiles: 10,
          maxFilesize: 10, // MB
          addRemoveLinks: true,
          accept: function(file, done) {
              if (file.name == "wow.jpg") {
                  done("Naha, you don't.");
              } else {
                  done();
              }
          }
      });

      var myDropzone = new Dropzone("#kt_dropzonejs2", {
          url: " ",
          paramName: "file",
          maxFiles: 10,
          maxFilesize: 10, // MB
          addRemoveLinks: true,
          accept: function(file, done) {
              if (file.name == "wow.jpg") {
                  done("Naha, you don't.");
              } else {
                  done();
              }
          }
      });
   </script>
@endsection
