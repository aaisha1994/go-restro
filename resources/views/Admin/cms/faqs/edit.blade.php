@extends('Admin.layouts.master')
@section('title', 'Update FAQ')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.faq.update',[$Faq->id]) }}" method="POST" id="form">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add FAQ</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.faq.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="question">Question *</label>
                                        <input type="text" class="form-control" id="question" value="{{ $Faq->question }}" name="question">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="type-of-affiliate" class="form-label">Type *</label>
                                        <select class="form-select" id="type-of-affiliate" name="type" title="Type of Affiliate" >
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option value="1" @if($Faq->type == 1) @selected(true) @endif>Users</option>
                                            <option value="2" @if($Faq->type == 2) @selected(true) @endif>Restaurant</option>
                                            <option value="3" @if($Faq->type == 3) @selected(true) @endif>Affiliate</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Answer *</label>
                                        <textarea class="form-control" rows="5" id="editor" name="answer">{{$Faq->answer}}</textarea>
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
                        question: { required: true },
                        type: { required: true },
                        answer: { required: true },
                    },
                    messages: {
                        question: { required: "Question is required" },
                        type: { required: "Type is required" },
                        answer: { required: "Answer is required" },
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
