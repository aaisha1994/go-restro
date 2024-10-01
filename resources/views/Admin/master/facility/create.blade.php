@extends('Admin.layouts.master')
@section('title', 'Create Facility')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.facility.store') }}" method="POST" id="form" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add Facility</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.facility.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="facility-name">Facility Name *</label>
                                        <input type="text" class="form-control" id="facility-name" name="name">
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
