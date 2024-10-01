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

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body id="kt_body" class="bg-body">
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('restaurant/media/illustrations/dozzy-1/14.png') }})">
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <a href="#" class="mb-8">
                        <img alt="Logo" src="{{asset('restaurant/media/logos/logo.png')}}" class="h-90px" />
                    </a>
                    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <form action="{{ route('affiliate.postRegister') }}" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
                            @csrf
                            <div class="mb-10 text-center">
                                <h1 class="text-dark mb-3">Create an Account</h1>
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                    <a href="{{ route('affiliate.login')}}" class="link-primary fw-bolder">Sign in here</a>
                                </div>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" autocomplete="off" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" />
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Mobile No</label>
                                    <input class="form-control form-control-lg form-control-solid" type="number" name="mobile" autocomplete="off" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Type of Affiliate</label>
                                    <select class="form-select form-select-solid" id="type-of-affiliate" data-control="select2" name="affiliate_type" data-placeholder="Select Type of Affiliate">
                                        <option></option>
                                        <option value="1">Social Influencers </option>
                                        <option value="2">On Wheels</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6" id="vehicle-number" style="display: none">
                                    <label class="form-label fw-bolder text-dark fs-6">Vehicle Number</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="vehicle_number" autocomplete="off" />
                                </div>
                                <div class="col-xl-6" id="agency-name" style="display: none">
                                    <label class="form-label fw-bolder text-dark fs-6">Agency Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="agency_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="row fv-row">
                                <div class="col-xl-8">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <div class="me-5">
                                            <input class="form-check-input" name="commission_type" type="radio" value="1" id="perDownload" checked />
                                            <label class="form-check-label" for="perDownload">
                                                <div class="fw-bolder text-gray-800">Per Download</div>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" name="commission_type" type="radio" value="2" id="perPurchase" />
                                            <label class="form-check-label" for="perPurchase">
                                                <div class="fw-bolder text-gray-800">Per Purchase</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-solid" type="text" id="comm" disabled/>
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Address</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="address" autocomplete="off" />
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">State</label>
                                    <select class="form-select form-select-solid" name="state_id" data-control="select2" data-placeholder="Select State">
                                        <option value="">Choose...</option>
                                        @foreach ($State as $co)
                                            <option value="{{ $co->id }}">{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">City</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="city" autocomplete="off" />
                                </div>
                                <div class="col-xl-4">
                                    <label class="form-label fw-bolder text-dark fs-6">Zip Code</label>
                                    <input class="form-control form-control-lg form-control-solid" type="numbar" name="zip_code" autocomplete="off" />
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
                                    {{-- <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div> --}}
                                </div>
                                {{-- <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div> --}}
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" name="confirm_password" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                        <a href="{{route('user.terms')}}" class="ms-1 link-primary">Terms and conditions</a> &
                                        <a href="{{route('user.privacy')}}" class="ms-1 link-primary">Privacy Policy</a>
                                    </span>
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
            </div>
        </div>
        <script>var hostUrl = "restaurant/";</script>
        <script src="{{asset('restaurant/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('restaurant/js/scripts.bundle.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('restaurant/js/custom/authentication/sign-up/general1.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).on('change','#type-of-affiliate', function(e){
                let type = $(this).val();
                if(type == 1){
                    $('#vehicle-number').hide();
                    $('#agency-name').hide();
                }
                if(type == 2){
                    $('#vehicle-number').show();
                    $('#agency-name').hide();
                }
                commission();
            });
            $(document).on('change','.form-check-input', function(e){
                commission();
            });
            function commission() {
                let arr = JSON.parse('{!! $Commission !!}');
                let type = $('#type-of-affiliate').val();
                let commission = document.querySelector('input[name="commission_type"]:checked').value;
                let amount = 0;
                for (let i = 0; i < arr.length; i++) {
                    if(arr[i].type == type) {
                        if(commission == 1){
                            amount = arr[i].per_download;
                        }
                        if(commission == 2){
                            amount = arr[i].per_purchase;
                        }
                    }
                }
                $('#comm').val(amount);
            }
        </script>
    </body>
</html>

