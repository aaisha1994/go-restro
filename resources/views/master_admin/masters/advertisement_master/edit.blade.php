@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Advertise</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('advertisement-master')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="advertise-name">Advertise Name *</label>
                                    <input type="text" class="form-control" id="advertise-name"  required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="image">image *</label>
                                    <input class="form-control" name="user_image" id="image" type="file" required>
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="User image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

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
</script>
@endsection
