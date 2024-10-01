@extends('Admin.layouts.master')
@section('title', 'Privacy Policy')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{route('admin.cms.privacy.store')}}" method="POST" id="form">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Privacy Policy</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-primary">Clear</button>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content text-muted">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label" for="title">Title *</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $cms->title }}">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label" for="description">Description *</label>
                                        <textarea class="form-control" rows="8" id="editor" name="description">{{ $cms->description }}</textarea>
                                    </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

            window.addEventListener('load', function() {
                $("#form").validate({
                    rules: {
                        title: { required: true },
                        description: { required: true },
                    },
                    messages: {
                        title: { required: "Title is required" },
                        description: { required: "Description is required" },
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
