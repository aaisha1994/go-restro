@extends('Admin.layouts.master')
@section('title', 'Update Advertisement')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('admin.advertisement.update',[$Advertisement->id]) }}" method="POST" id="form" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Advertise</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.advertisement.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <input type="text" class="form-control" id="advertise-name" name="name" value="{{ $Advertisement->name }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="image">image *</label>
                                    <input class="form-control" name="image" id="image" type="file">
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ asset('storage/advertisement/'.$Advertisement->image) }}" alt="User image">
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
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
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
