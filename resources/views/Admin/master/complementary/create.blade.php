@extends('Admin.layouts.master')
@section('title', 'Create Complementary')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.complementary.store') }}" method="POST" id="form" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add Complementary</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.complementary.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="account_type">Account Type *</label>
                                        <select class="form-select" title="Select Restraurant" name="account_type">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option value="Restro">Restro</option>
                                            <option value="Affilates">Affilates</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Users">Users</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="complementary-validity">Validity *</label>
                                        <input type="number" class="form-control" id="complementary-validity" name="validity">
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
                    account_type: { required: "Account Type is required" },
                    validity : { required: "Validity is required" },
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
