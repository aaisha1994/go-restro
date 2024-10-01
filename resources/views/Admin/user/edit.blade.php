@extends('Admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('admin.user.update',[$User->id]) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            @method('put')
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Member</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $User->name }}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="email-address">Email Address *</label>
                                    <input type="email" class="form-control" id="email-address" name="email" value="{{ $User->email }}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input type="number" class="form-control" id="phone" name="mobile" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="{{ $User->mobile }}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="dob">Date of Birth *</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{ $User->date_of_birth }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="image">Profile *</label>
                                    <input class="form-control" name="image" id="image" type="file">
                                </div>
                                @if($User->other_date != null)
                                    @foreach (explode(',',str_replace(array( '[', ']','{','}' ), '', json_encode($User->other_date))) as $key => $val)
                                        <div class="col-md-3 mb-4">
                                            <label class="form-label" for="anniversary-date">{{ str_replace(array( '"',  ), '', explode(':', $val)[0]) }}</label>
                                            <input type="date" class="form-control" id="anniversary-date" name="other_date[{{ str_replace(array( '"',  ), '', explode(':', $val)[0]) }}]" value="{{ str_replace(array( '"',  ), '', explode(':', $val)[1]) }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ $User->image_path }}" alt="User image">
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
                // image: { required: true },
            },
            messages: {
                name: { required: "Name is required"},
                email: { required: "Email is required"},
                mobile: { required: "Mobile is required"},
                date_of_birth: { required: "Date Of Birth is required"},
                // image: { required: "Image is required"},
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
