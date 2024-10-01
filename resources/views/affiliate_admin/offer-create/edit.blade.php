@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
    View & Edit Offers
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
                  <a href="{{Route('affiliate-offer')}}" class="btn btn-primary">Back</a>
               </div>
            </div>
         </div>
         <div class="card-body pt-0">
            <form id="form" class="form" action="#" autocomplete="off">
               <div class="row">
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Select Restraurant</label>
                        <select class="form-select form-select-solid" name="restraurant_name" id="restraurant_name" data-control="select2" data-placeholder="Select an Restraurant">
                           <option></option>
                           <option value="1">Option 1</option>
                           <option value="2">Option 2</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Offer Name</label>
                        <input type="text" name="offer_name" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Offer Text</label>
                        <input type="text" name="offer_text" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Coupon Quantity.</label>
                        <input type="number" name="coupon_quantity" class="form-control form-control-solid mb-3 mb-lg-0"  pattern="[0-9]{10}"/>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4 mt-5">
                     <div class="fv-row mb-10">
                        <label class="required fw-bold fs-6 mb-2">Offer image</label>
                        <input type="file" name="image" id="image" class="form-control form-control-solid mb-3 mb-lg-0" />
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                     <div class="fv-row mb-5">
                        <img id="showImage" class="rounded avatar-lg w-100px h-100p" src="{{ url('upload/no_image.jpg') }}" alt="Restaurant Logo">
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-12 mt-5">
                     <div class="fv-row mb-10">
                        <label class="fw-bold fs-6 mb-2">Terms & Condition</label>
                        <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="address"></textarea>
                     </div>
                  </div>
               </div>
               <div class="text-end">
                  <a href="{{Route('affiliate-offer')}}" class="btn btn-md btn-light-primary me-5">Cancel</a>
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
           restraurant_name: { required: true },
           person_restraurant_name: { required: true },
           offer_name: { required: true },
           offer_text: { required: true },
           image: { required: true },
           coupon_quantity: { required: true },
           validity: { required: true },
       },
       messages: {
           restraurant_name: { required: "Restraurant Name is required"},
           person_name: { required: "Person Name is required"},
           offer_name: { required: "Offer Name is required"},
           offer_text: { required: "Offer Text is required"},
           image: { required: "Offer Image is required"},
           coupon_quantity: { required: "Coupon Quantity is required"},
           validity: { required: "validity is required"},
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
