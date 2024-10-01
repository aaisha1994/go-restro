@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Add Notification</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('notification-master')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="notification_name">Notification Title *</label>
                                    <input type="text" class="form-control" id="notification_name" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Select Category *</label>
                                    <select class="form-select" title="Select Restraurant" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Prime Users</option>
                                        <option>Non Prime Users</option>
                                        <option>Passport Purchased</option>
                                        <option>Not Passport Purchased</option>
                                        <option>Not Redeemed</option>
                                        <option>Events (Same Day)</option>
                                        <option>Events (1 Dat Advance)</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="image">image *</label>
                                    <input class="form-control" name="user_image" id="image" type="file" required>
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="User image">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="description">Description *</label>
                                    <textarea class="form-control" rows="5" id="editor" required></textarea>
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
@endsection
@section('js')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

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
