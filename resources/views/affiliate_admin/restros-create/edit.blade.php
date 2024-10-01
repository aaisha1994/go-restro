@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
   Restaurant View & Edit
@endsection
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card">
         <div class="card-header border-0 pt-6">
            <div class="card-title">
               <div class="d-flex align-items-center position-relative my-1"></div>
            </div>
            <div class="card-toolbar">
               <div class="d-flex justify-content-end">
                  <a href="{{Route('affiliate-restros')}}" class="btn btn-primary">Back</a>
               </div>
            </div>
         </div>
         <div class="card-body pt-0">
            <form id="form" class="form" action="#" autocomplete="off">
               <div class="row">
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Restaurant Name</label>
                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Contact person Name</label>
                        <input type="text" name="person_name" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Contact No.</label>
                        <input type="number" name="mobile" class="form-control form-control-solid mb-3 mb-lg-0"  pattern="[0-9]{10}"/>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Alternate contact no</label>
                        <input type="number" name="mobile2" class="form-control form-control-solid mb-3 mb-lg-0" pattern="[0-9]{10}"/>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Approx price for person</label>
                        <input type="number" name="price_per_person" pattern="[0-9]*" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">State </label>
                        <select class="form-select form-select-solid" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an State">
                           <option></option>
                           <option value="1">Option 1</option>
                           <option value="2">Option 2</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">City </label>
                        <select class="form-select form-select-solid" name="city_id" id="city_id" data-control="select2" data-placeholder="Select an City">
                           <option></option>
                           <option value="1">Option 1</option>
                           <option value="2">Option 2</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Zip / Postal code</label>
                        <input type="number" id="zip-code" pattern="[0-9]*" name="zip_code" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="fw-bold fs-6 mb-2">Food Category</label>
                        <select class="form-select form-select-solid"  name="category_id[]" data-control="select2" data-placeholder="Select an Food Category" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="2">Option 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="fw-bold fs-6 mb-2">Facility Select</label>
                        <select class="form-select form-select-solid" name="facility_id[]" data-control="select2" data-placeholder="Select Facility" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="2">Option 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="fw-bold fs-6 mb-2">Meal Preference</label>
                        <div class="form-check form-check-custom form-check-solid">
                           <div class="me-10">
                              <input class="form-check-input" type="checkbox" name="meal_preference[]" value="" />
                              <label class="form-check-label">Veg</label>
                           </div>
                           <div class="me-10">
                              <input class="form-check-input" type="checkbox" name="meal_preference[]" value="" />
                              <label class="form-check-label">Non-Veg</label>
                           </div>
                           <div>
                              <input class="form-check-input" type="checkbox" name="meal_preference[]" value="" />
                              <label class="form-check-label">Vegans</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Restaurant Logo</label>
                        <input type="file" name="logo" id="image" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password"  class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                     <div class="fv-row mb-10">
                        <img id="showImage" class="rounded avatar-lg w-125px h-125p" src="{{ url('upload/no_image.jpg') }}" alt="Restaurant Logo">
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-8 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Address</label>
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="address"></textarea>
                     </div>
                  </div>
               </div>
               <div class="text-end">
                  <a href="{{Route('affiliate-restros')}}" class="btn btn-md btn-light-primary me-5">Cancel</a>
                  <button type="submit" class="btn btn-md btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

   $(document).ready(function() {
      $('#image').change(function(e) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
  });

$(document).ready(function() {
    $("#form").validate({
         rules: {
           name: { required: true },
           person_name: { required: true },
           email: { required: true },
           mobile: { required: true },
           mobile2: { required: true },
           price_per_person: { required: true },
           state_id: { required: true },
           city_id: { required: true },
           address: { required: true },
           zip_code: { required: true },
           logo: { required: true },
           password: { required: true },
           confirm_password: { required: true },
       },
       messages: {
           name: { required: "Name is required"},
           person_name: { required: "Person Name is required"},
           email: { required: "Email is required"},
           mobile: { required: "Contact No is required"},
           mobile2: { required: "Alternate Contact No is required"},
           price_per_person: { required: "Approx price for person is required"},
           state_id: { required: "State is required"},
           city_id: { required: "City is required"},
           address: { required: "Address is required"},
           zip_code: { required: "Zip Code is required"},
           logo: { required: "Restaurant Logo is required"},
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
