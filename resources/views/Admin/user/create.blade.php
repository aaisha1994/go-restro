@extends('Admin.layouts.master')

@section('title', 'User Create')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add New Member</h4>
                            <div class="">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.user.index') }}" type="button"
                                        class="btn btn-sm btn-primary">Back</a>
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
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="name">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="email-address">Email Address *</label>
                                        <input type="email" class="form-control" id="email-address" name="email">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="phone">Phone *</label>
                                        <input type="number" class="form-control" id="phone" name="mobile"
                                            pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="dob">Date of Birth *</label>
                                        <input type="date" class="form-control" id="dob" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="image">Profile *</label>
                                        <input class="form-control" name="image" id="image" type="file">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="anniversary-date">Anniversary Date</label>
                                        <input type="date" class="form-control" id="anniversary-date" name="other_date[Anniversary Date]">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="child-date">Child Date</label>
                                        <input type="date" class="form-control" id="child-date" name="other_date[Child Date]">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="spouse-of-birth">Spouse Date of Birth</label>
                                        <input type="date" class="form-control" id="spouse-of-birth" name="other_date[spouse of birth]">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="User image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')

    <script type="text/javascript">
        $('.select2').select2();
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                    email: { required: true },
                    mobile: { required: true },
                    date_of_birth: { required: true },
                    image: { required: true },
                },
                messages: {
                    name: { required: "Name is required"},
                    email: { required: "Email is required"},
                    mobile: { required: "Mobile is required"},
                    date_of_birth: { required: "Date Of Birth is required"},
                    image: { required: "Image is required"},
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
