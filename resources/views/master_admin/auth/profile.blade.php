@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
    <form action="" method="" class="needs-validation" novalidate>
      <div class="row">
         <div class="col">
            <div class="page-title-box d-flex align-items-center justify-content-between">
               <h4 class="mb-md-0">Profile Details</h4>
               <div class=" ">
                  <div class="d-grid gap-2 d-flex justify-content-end">
                     <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                 <div class="row mb-4">
                     <label class="col-sm-2 col-form-label">Profile *</label>
                     <div class="col-sm-5">
                        <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="User image">
                        <input class="form-control mt-4" name="user_image" id="image" type="file" required>
                     </div>
                  </div>
                  <div class="row">
                     <label class="col-sm-2 col-form-label">Full Name *</label>
                     <div class="col-sm-5 mb-4">
                        <input class="form-control" type="text" name="" value="GoRestro" required>
                     </div>
                     <div class="col-sm-5 mb-4">
                        <input class="form-control" type="text" name="" value="GoRestro" required>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row mb-4">
                     <label class="col-sm-2 col-form-label">Company *</label>
                     <div class="col-sm-10">
                        <input class="form-control" type="text" name="" value="GoRestro" required>
                     </div>
                  </div>
                  <!-- end row -->
                   <div class="row mb-4">
                     <label class="col-sm-2 col-form-label">Email *</label>
                     <div class="col-sm-10">
                        <input class="form-control" type="email" name="" value="gorestro@gmail.com" required>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row mb-4">
                     <label class="col-sm-2 col-form-label">Contact Phone *</label>
                     <div class="col-sm-10">
                        <input class="form-control" type="tel" name="" value="+91 2356865235" required>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
            </div>
         </div>
      </div>
    </form>
      <!-- end row -->
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="labelreferral">Referral Link</div>
                  <div class="copy-text">
                     <input type="text" class="text form-control" value="https://unique-link.referral-factory.com" />
                     <button><i class="fa fa-clone"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container-fluid -->
</div>

@endsection
@section('js')
   <script type="text/javascript">
   $(document).ready(function(){
       $('#image').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#showImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });


   let copyText = document.querySelector(".copy-text");
      copyText.querySelector("button").addEventListener("click", function () {
         let input = copyText.querySelector("input.text");
         input.select();
         document.execCommand("copy");
         copyText.classList.add("active");
         window.getSelection().removeAllRanges();
         setTimeout(function () {
            copyText.classList.remove("active");
         }, 2500);
      });
</script>
@endsection
