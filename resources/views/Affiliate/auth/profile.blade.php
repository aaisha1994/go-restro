@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
   My Profile
@endsection
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card mb-5 mb-xl-10">
         <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x m-8 fs-4">
             <li class="nav-item">
                 <a class="nav-link text-dark fw-bolder active" data-bs-toggle="tab" href="#tab_1">Profile Details</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab_2">Bank Details</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab-3">Change Password</a>
             </li>
         </ul>
         <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                  <form id="form1" class="form" action="#" autocomplete="off">
                     <div class="row">
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">First Name</label>
                              <input type="text" name="first_name" value="" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Last Name</label>
                              <input type="text" name="last_name" value="" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Email Address</label>
                              <input type="email" name="email" value="" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Phone No</label>
                              <input type="tel" name="mobile" value="" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Agency Name</label>
                              <input type="text" name="agency_name" value="" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">State </label>
                              <select class="form-select form-select-solid" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an State">
                                 <option></option>
                                 <option value="1">Option 1</option>
                                 <option value="2">Option 2</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                            <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">City </label>
                              <select class="form-select form-select-solid" name="city_id" id="city_id" data-control="select2" data-placeholder="Select an City">
                                 <option></option>
                                 <option value="1">Option 1</option>
                                 <option value="2">Option 2</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Zip / Postal code</label>
                              <input type="numbar" name="zip_code" value="" class="form-control form-control-solid mb-3 mb-lg-0"/>
                           </div>
                        </div>
                     </div>
                     <div class="text-end">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                     </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="tab_2" role="tabpanel">
                  <form id="form2" class="form" action="#" autocomplete="off">
                     <div class="row">
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Bank Name</label>
                              <input type="text" name="bank_name" value="SBI Bank" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Account Holder Name</label>
                              <input type="text" name="ac_holder_name" value="Domenick Casper" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Account Number</label>
                              <input type="numbar" name="account_number" value="1234-4567-1525-1235" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Re-account Number </label>
                              <input type="numbar" name="re_account_number" value="1234-4567-1525-1235" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">IFSC code</label>
                              <input type="text" name="ifsc_code" value="SBIN0005943" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                     </div>
                     <div class="text-end">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                     </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                  <form id="form3" class="form" action="#" autocomplete="off">
                     <div class="row">
                        <div class="col-sm-12 col-md-4 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Current Password</label>
                              <input type="password" name="current_password" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-4 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">New Password</label>
                              <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-4 mt-5">
                           <div class="fv-row mb-5">
                              <label class="required fw-bold fs-6 mb-2">Confirm New Password</label>
                              <input type="password" name="confirm_password"  class="form-control form-control-solid mb-3 mb-lg-0" />
                           </div>
                        </div>
                     </div>
                     <div class="text-end">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                     </div>
                  </form>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection
@section('js')
<script type="text/javascript">
   $(document).ready(function() {
         $("#form1").validate({
            rules: {
              first_name: { required: true },
              last_name: { required: true },
              email: { required: true },
              mobile: { required: true },
              agency_name: { required: true },
              state_id: { required: true },
              city_id: { required: true },
              zip_code: { required: true },
          },
          messages: {
              first_name: { required: "First Name is required"},
              last_name: { required: "Last Name is required"},
              email: { required: "Email is required"},
              mobile: { required: "Contact No is required"},
              agency_name: { required: "Agency Name is required"},
              state_id: { required: "State is required"},
              city_id: { required: "City is required"},
              zip_code: { required: "Zip Code is required"},
          },
           errorPlacement: function(error, element) {
               error.addClass("error-message");
               error.insertAfter(element);
           },
           submitHandler: function(form) {
               form.submit();
           }
       });
         $("#form2").validate({
            rules: {
              bank_name: { required: true },
              ac_holder_name: { required: true },
              account_number: { required: true },
              re_account_number: { required: true },
              ifsc_code: { required: true },
          },
          messages: {
              bank_name: { required: "Bank Name is required"},
              ac_holder_name: { required: "Account Holder Name is required"},
              account_number: { required: "Account Number is required"},
              re_account_number: { required: "Re Account Number No is required"},
              ifsc_code: { required: "IFSC Code is required"},
          },
           errorPlacement: function(error, element) {
               error.addClass("error-message");
               error.insertAfter(element);
           },
           submitHandler: function(form) {
               form.submit();
           }
       });
       $("#form3").validate({
            rules: {
              current_password: { required: true },
              password: { required: true },
              confirm_password: { required: true },
          },
          messages: {
              current_password: { required: "Current Password is required"},
              password: { required: "Password is required"},
              confirm_password: { required: "Confirm Password is required"},
          },
           errorPlacement: function(error, element) {
               error.addClass("error-message");
               error.insertAfter(element);
           },
           submitHandler: function(form) {
               form.submit();
           }
       });
   });
</script>
@endsection
