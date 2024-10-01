@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Member</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('users')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="name">Full Name *</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="email-address">Email Address *</label>
                                    <input type="email" class="form-control" id="email-address" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="dob">Date of Birth *</label>
                                    <input type="date" class="form-control" id="dob"  required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="anniversary-date">Anniversary Date</label>
                                    <input type="date" class="form-control" id="anniversary-date">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="anniversary-date">Child Date</label>
                                    <input type="date" class="form-control" id="anniversary-date">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="spouse-of-birth">Spouse Date of Birth</label>
                                    <input type="date" class="form-control" id="spouse-of-birth">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label">Country *</label>
                                    <select class="form-select" title="Country" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="form-label" class="form-label">State *</label>
                                    <select class="form-select" title="State" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="billing-city">City *</label>
                                    <input type="text" class="form-control" id="billing-city" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="zip-code">Zip / Postal code *</label>
                                    <input type="number" class="form-control" id="zip-code" pattern="[0-9]*" inputmode="numeric" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="image">Profile *</label>
                                    <input class="form-control" name="user_image" id="image" type="file" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 mb-4">
                                    <label class="form-label" for="billing-address">Address</label>
                                    <textarea class="form-control" id="billing-address" rows="3" required></textarea>
                                </div>
                                <div class="col-md-3 mb-4">
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
