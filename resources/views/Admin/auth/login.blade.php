<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | GoRestro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="GoRestro" name="description" />
    <meta content="GoRestro" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
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
                                                <a href="javascript:void(0)" class="authentication-logo">
                                                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="100" class="auth-logo logo-dark mx-auto">
                                                    <img src="{{ asset('assets/images/logo-sm-dark.png') }}" alt="" height="100" class="auth-logo logo-light mx-auto">
                                                </a>
                                            </div>
                                            <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                            <p class="text-muted">Sign in to continue to <span class="fw-bold">GoRestro.</span></p>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <form action="{{ route('admin.postLogin') }}" class="needs-validation" novalidate method="POST">
                                                @csrf
                                                <div class="mb-3 auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="email" class="fw-semibold">Username</label>
                                                    <input type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter Username" name="email" required>
                                                    <div class="invalid-feedback">Please provide a valid Username.</div>
                                                </div>
                                                <div class="mb-3 auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" required name="password">
                                                    <i class="fas fa-eye-slash fs-5" id="togglePassword" style="cursor: pointer; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                                    <div class="invalid-feedback"> Please provide a valid password. </div>
                                                    @if(session('error'))
                                                        <div style="display: block" class="invalid-feedback">{{ session('error') }}</div>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck"> Agree to terms and conditions</label>
                                                    <div class="invalid-feedback"> You must agree before submitting.</div>
                                                </div> --}}
                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="{{ route('admin.forgotPassword') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <p>©{{ date('Y') }} GoRestro. Crafted with <i class="mdi mdi-heart text-danger"></i> by Arrowmuse</p>
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
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>