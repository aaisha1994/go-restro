<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoRestro | Affiliate sign-in</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content=" " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('restaurant/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('restaurant/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style type="text/css">
        .form-control.is-valid, .was-validated .form-control:valid {
            background-image: none !important;
        }
        .form-control.is-invalid, .was-validated .form-control:invalid {
            background-image: none !important;
        }
    </style>
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url('{{ asset('restaurant/media/illustrations/dozzy-1/14.png') }}')">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-10">
                <a href="javascript:void(0)" class="mb-8">
                    <img alt="Logo" src="{{ asset('restaurant/media/logos/logo.png') }}" class="h-90px" />
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-10 mx-auto">
                    <form class="form w-100" id="kt_sign_in_form"  novalidate="novalidate" action="{{ route('affiliate.postLogin') }}">
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to GoRestro</h1>
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="{{ route('affiliate.register') }}" class="link-primary fw-bolder">Create an Account</a>
                            </div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="{{ old('email') }}" autocomplete="off" />
                        </div>
                        <div class="fv-row mb-10" data-kt-password-meter="true">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <a href="{{ route('affiliate.forgotPassword') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password"/>
                            <span
                                class="btn btn-sm btn-icon position-absolute translate-middle end-0 me-n2"
                                data-kt-password-meter-control="visibility" style="top:68%;">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_sign_in_submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                    <div class="d-flex flex-center flex-column-auto p-3">
                        <div class="d-flex align-items-center fw-bold fs-6">
                            <a href="{{ route('user.terms') }}" class="text-muted text-hover-primary px-2">Terms & Conditions</a>
                            <a href="{{ route('user.privacy') }}" class="text-muted text-hover-primary px-2">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('restaurant/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/js/scripts.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('restaurant/js/custom/authentication/sign-in/general1.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
