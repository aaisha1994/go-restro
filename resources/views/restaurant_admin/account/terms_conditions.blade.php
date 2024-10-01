@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Terms & Conditions
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
               <h3 class="fw-bolder m-0">Terms & Conditions</h3>
            </div>
         </div>
         <form class="form" novalidate="novalidate">
         <div class="card-body border-top p-9">
            <textarea name="kt_docs_ckeditor_classic" id="kt_docs_ckeditor_classic"></textarea>
            <div class="d-flex mt-8">
               <button type="submit" class="btn btn-primary me-2 px-6">Save</button>
               <button type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection

@section('js')
   <script type="text/javascript">
      ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
   </script>
@endsection
