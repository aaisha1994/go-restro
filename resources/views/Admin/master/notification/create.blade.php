@extends('Admin.layouts.master')
@section('title', 'Create Notification')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.notification.store') }}" method="POST" id="form" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add Notification</h4>
                            <div class="">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.notification.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="name">Notification Title *</label>
                                        <input type="text" class="form-control" id="name" name="title">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Select Category *</label>
                                        <select class="form-select" title="Select Restraurant" name="category">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($Category as $key => $cat)
                                                <option value="{{ $key }}">{{ $cat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="image">image *</label>
                                        <input class="form-control" name="image" id="image" type="file">
                                        <img id="showImage" class="rounded avatar-lg mt-3"
                                            src="{{ url('upload/no_image.jpg') }}" alt="User image">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label" for="description">message *</label>
                                        <textarea class="form-control" rows="5" name="message" id="editor"></textarea>
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
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#editor'))
        //     .catch(error => {
        //         console.error(error);
        //     });

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
                    title: { required: true },
                    category: { required: true },
                    image: { required: true },
                    message: { required: true },
                },
                messages: {
                    title: { required: "Title is required" },
                    category : { required: "Category is required" },
                    image : { required: "Image is required" },
                    message : { required: "Message is required" },
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
