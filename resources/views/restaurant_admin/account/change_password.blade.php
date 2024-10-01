@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Change Password
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <!-- Profile -->
      @include('restaurant_admin.account.profile')
      <!-- end:: profile -->
      <div class="card mb-5 mb-xl-10">
         <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Change Password</h3>
            </div>
         </div>
         <div id="kt_account_settings_signin_method" class=" ">
            <div class="card-body border-top p-9">
               <div class="d-flex flex-wrap align-items-center mb-10">
                  <div id="kt_signin_password_edit" class="flex-row-fluid">
                     <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                        <div class="row mb-1">
                           <div class="col-lg-4">
                              <div class="fv-row mb-0">
                                 <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                 <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="fv-row mb-0">
                                 <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                 <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="fv-row mb-0">
                                 <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                 <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                              </div>
                           </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex">
                           <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                           <button type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection
