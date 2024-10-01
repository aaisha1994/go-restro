@extends('Restro.layouts.master')
@section('title', 'Change Password')
@section('toolbar', 'Change Password')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Change Password</h3>
                    </div>
                </div>
                <div id="kt_account_settings_signin_method" class=" ">
                    <div class="card-body border-top p-9">
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <div id="kt_signin_password_edit" class="flex-row-fluid">
                                <form action="{{ route('restro.profile.changepassword') }}" method="POST" id="form" class="form" novalidate="novalidate">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="old_password" id="currentpassword" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="new_password" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="new_password" id="new_password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="confirm_password" id="confirmpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div> --}}
                                    <div class="d-flex mt-12">
                                        <button type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    old_password: { required: true },
                    new_password: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8,
                        equalTo: "#new_password"
                    },
                },
                messages: {
                    old_password: { required: "Old Password is required" },
                    new_password: {
                        required: "New Password is required",
                        minlength: 'Password must be at least 8 character and contain symbols'
                    },
                    confirm_password: {
                        required: "Confirm Password is required",
                        minlength: 'Password must be at least 8 character and contain symbols',
                        equalTo : 'Password and confirm password does not match'
                    },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
