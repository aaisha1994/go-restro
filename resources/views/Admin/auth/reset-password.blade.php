<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recover Password | GoRestro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="GoRestro" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="GoRestro" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        #password-error, #confirm_password-error {
            position: relative;
            left: 0;
            top: 5px;
        }
        .auth-form-group-custom .auti-custom-input-icon {
            top: 30px;
        }
    </style>
</head>

<body class="auth-body-bg">
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="#" class="">
                                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="100" class="auth-logo logo-dark mx-auto">
                                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="100" class="auth-logo logo-light mx-auto">
                                                </a>
                                            </div>
                                            <h4 class="font-size-18 mt-4">Reset Password</h4>
                                            <p class="text-muted">Reset your password to <span class="fw-bold">GoRestro.</span>.</p>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <div class="alert alert-success mb-4" role="alert">
                                                Enter your Email and instructions will be sent to you!
                                            </div>
                                            <form method="POST" action="{{ route('admin.resetsend',[$token]) }}" class="form">
                                                @csrf
                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-mail-line auti-custom-input-icon"></i>
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                                </div>
                                                <div class="auth-form-group-custom mb-4">
                                                    <i class="ri-mail-line auti-custom-input-icon"></i>
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Password">
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="{{ route('admin.login') }}" class="fw-medium text-primary"> Log in </a> </p>
                                            <p>© {{ date('Y') }} GoRestro. Crafted with <i class="mdi mdi-heart text-danger"></i> by Arrowmuse </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            $(".form").validate({
                rules: {
                    password: { required: true },
                    confirm_password: { required: true },
                },
                messages: {
                    password: { required: "Password is required" },
                    confirm_password: { required: "Confirm Password is required" },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    $.ajax({
                        type: "post",
                        url: $('#form').prop('action'),
                        dataType: "json",
                        data : {
                            password : $('#password').val(),
                            confirm_password : $('#confirm_password').val()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                $('.alert').addClass('alert-success').removeClass('alert-danger');
                            } else {
                                $('.alert').removeClass('alert-success').addClass('alert-danger');
                            }
                            $('.alert').html(response.message);
                            if (response.success) {
                                setTimeout(() => {
                                    window.location.href= {{ route('admin.login') }};
                                }, 1000);
                            }
                        },
                    });
                    return false;
                }
            });
        });
    </script>
</body>

</html>
