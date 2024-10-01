@extends('Admin.layouts.master')
@section('title', 'Update Complementary')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.complementary.update',[$Complementary->id]) }}" method="POST" id="form" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Edit Complementary</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.complementary.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="account_type">Account Type *</label>
                                        <select class="form-select" title="Select Restraurant" name="account_type">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option value="Restro" @if($Complementary->account_type == 'Restro') @selected(true) @endif>Restro</option>
                                            <option value="Affilates" @if($Complementary->account_type == 'Affilates') @selected(true) @endif>Affilates</option>
                                            <option value="Admin" @if($Complementary->account_type == 'Admin') @selected(true) @endif>Admin</option>
                                            <option value="Users" @if($Complementary->account_type == 'Users') @selected(true) @endif>Users</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="validity">Validity  *</label>
                                        <input type="text" class="form-control" id="validity" name="validity" value="{{ $Complementary->validity }}">
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
                    account_type: { required: true },
                    validity: { required: true },
                },
                messages: {
                    account_type: { required: "Name is required" },
                    validity : { required: "Account Type is required" },
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

