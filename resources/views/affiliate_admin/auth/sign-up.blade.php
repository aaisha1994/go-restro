<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GoRestro | Restaurant sign-up</title>
        <meta charset="utf-8" />
        <meta name="description" content=""/>
        <meta name="keywords" content=" "/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{asset('restaurant/media/logos/favicon.ico')}}"/>
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{asset('restaurant/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('restaurant/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <body id="kt_body" class="bg-body">
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('restaurant/media/illustrations/dozzy-1/14.png') }})">
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <a href="#" class="mb-8">
                        <img alt="Logo" src="{{asset('restaurant/media/logos/logo.png')}}" class="h-90px" />
                    </a>
                    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
                            <div class="mb-10 text-center">
                                <h1 class="text-dark mb-3">Create an Account</h1>
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                    <a href="{{Route('affiliate.login')}}" class="link-primary fw-bolder">Sign in here</a>
                                </div>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="" autocomplete="off" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" />
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Mobile No</label>
                                    <input class="form-control form-control-lg form-control-solid" type="tel" name="mobile-no" autocomplete="off" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Type of Affiliate</label>
                                    <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Type of Affiliate">
                                        <option></option>
                                        <option value="1">Social Influencers </option>
                                        <option value="2">On Wheels</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row fv-row">
                                <div class="col-xl-8">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <div class="me-5">
                                            <input class="form-check-input" name="radio_input" type="radio" value="1" id="perDownload" checked />
                                            <label class="form-check-label" for="perDownload">
                                                <div class="fw-bolder text-gray-800">Per Download</div>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" name="radio_input" type="radio" value="2" id="perPurchase" />
                                            <label class="form-check-label" for="perPurchase">
                                                <div class="fw-bolder text-gray-800">Per Purchase (User)</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-solid" name="per_download" type="text" value="&#8377; 50" id="perDownloadInput" disabled/>
                                    <input class="form-control form-control-solid" name="per_purchase" type="text" value="25%" id="perPurchaseInput" style="display: none;" disabled/>
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">GST No.</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="gstno" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Address</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="address"/>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">State</label>
                                    <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select State">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">City</label>
                                     <input class="form-control form-control-lg form-control-solid" type="text" name="city"/>
                                </div>
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">Zip Code</label>
                                    <input class="form-control form-control-lg form-control-solid" type="numbar" name="zip-code" autocomplete="off" />
                                </div>
                            </div>
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" name="confirm-password" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-center flex-column-auto p-10">
                    <div class="d-flex align-items-center fw-bold fs-6">
                        <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
                        <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
                        <a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <script>var hostUrl = "restaurant/";</script>
        <script src="{{asset('restaurant/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('restaurant/js/scripts.bundle.js')}}"></script>
        <script src="{{asset('restaurant/js/custom/authentication/sign-up/general.js')}}"></script>
        <script>
            const perDownloadRadio = document.getElementById('perDownload');
            const perPurchaseRadio = document.getElementById('perPurchase');
            const perDownloadInput = document.getElementById('perDownloadInput');
            const perPurchaseInput = document.getElementById('perPurchaseInput');

            // Add event listener to the radio buttons
            perDownloadRadio.addEventListener('change', function() {
                if (this.checked) {
                    perDownloadInput.style.display = 'block';
                    perPurchaseInput.style.display = 'none';
                }
            });

            perPurchaseRadio.addEventListener('change', function() {
                if (this.checked) {
                    perDownloadInput.style.display = 'none';
                    perPurchaseInput.style.display = 'block';
                }
            });
        </script>
    </body>
</html>

