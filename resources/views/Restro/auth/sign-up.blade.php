<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoRestro | Restaurant sign-up</title>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--end::Global Stylesheets Bundle-->
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('restaurant/media/illustrations/dozzy-1/14.png') }})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="#" class="mb-8">
                    <img alt="Logo" src="{{ asset('restaurant/media/logos/logo.png') }}" class="h-90px" />
                </a>
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" action="{{ route('api.register') }}" method="POST"
                        novalidate="novalidate" id="kt_sign_up_form">
                        @csrf
                        <div class="mb-10 text-center">
                            <h1 class="text-dark mb-3">Create an Account</h1>
                            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                <a href="{{ route('restro.login') }}" class="link-primary fw-bolder">Sign in here</a>
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Restaurant Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Contact Person Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="person_name" />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Mobile No</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" name="mobile" />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Alternative Mobile No</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" name="mobile2" />
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Address</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="address" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2">
                                    <i class="bi bi-geo-alt fs-2"></i>
                                </span>
                            </div>
                            <input type="hidden" name="latitude" id="latitude" value="23.000810403073036">
                            <input type="hidden" name="longitude" id="longitude" value="72.57424599428148">
                            <div id="map_canvas" style="width: 100%;height: 150px;display: none;"></div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-4">
                                <label class="form-label fw-bolder text-dark fs-6">State</label>
                                <select name="state_id" id="state_id" class="form-control form-select-transparent " data-control="select2" data-placeholder="Select an option">
                                    @foreach ($States as $State)
                                        <option value="{{ $State->id }}">{{ $State->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label fw-bolder text-dark fs-6">City</label>
                                <select name="city_id" id="city_id" class="form-control form-control-lg form-control-solid" data-control="select2" data-placeholder="Select an option"></select>
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label fw-bolder text-dark fs-6">Zip Code</label>
                                <input class="form-control form-control-lg form-control-solid" type="numbar" name="zip_code" />
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Upload Logo</label>
                            <input class="form-control form-control-lg form-control-solid" type="file" name="logo" />
                        </div>
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        name="password" />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                {{-- <div class="d-flex align-items-center mb-3"
                                    data-kt-password-meter-control="highlight">
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
                            <input class="form-control form-control-lg form-control-solid" type="password" name="confirm-password" />
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
    {{-- <script>var hostUrl = "restaurant/";</script> --}}
    <script src="{{ asset('restaurant/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/js/scripts.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('restaurant/js/custom/authentication/sign-up/general.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('.select2').select2();

        $('#city_id').select2({
            language: {
                noResults: function() {
                    return `<li><button type="button"
                    class="btn btn-primary w-100"
                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">+ Add New City</button>
                    </li>`;
                }
            },
            escapeMarkup: function(markup) {
                return markup;
            }
        });

        $(document).on('click', '#citybutton', function(e) {
            var name = $('#city_name').val();
            var state_id = $('#state_id').val();
            if (name == '') {
                $('#citynameerror').html('The city name field is required.');
            } else {
                $.ajax({
                    type: "post",
                    url: "{{ route('api.addcity') }}",
                    dataType: "json",
                    data: {
                        'name': name,
                        'state_id': state_id,
                    },
                    success: function(response) {
                        if (response.data.message == 1) {
                            $('.btn-close').click();
                            var data = {
                                id: response.data.result.id,
                                text: response.data.result.city
                            };
                            var newOption = new Option(data.text, data.id, true, true);
                            $('#city').append(newOption).trigger('change');
                            $('#city_name').val('');
                            $('#citynameerror').html('');
                        } else {
                            $('#citynameerror').html('The city name already created.');
                        }
                    },
                });
            }
        });

        $(document).on('change', '#state_id', function(e) {
            let id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('api.city', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let option = '<option value="0">Select City</option>';
                    for (let i = 0; i < response.data.result.length; i++) {
                        option += '<option value="' + response.data.result[i].id + '">' + response.data
                            .result[i].name + '</option>';
                    }
                    $('#city_id').html(option);
                    $('#city_id').attr('disabled', false);
                },
            });
        });
        $(".bi-geo-alt").click(function(){
            $("#map_canvas").toggle();
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZbsf-aYi1Jtg8HDXi4Iw62896BBgMeHU"></script>
    <script type="text/javascript">
        async function initMap() {
            let lat = Number($('#latitude').val());
            let long = Number($('#longitude').val());
            const { Map, InfoWindow } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
            const map = new Map(document.getElementById("map_canvas"), {
                center: { lat: lat, lng: long },
                zoom: 14,
                mapId: "4504f8b37365c3d0",
            });
            const infoWindow = new InfoWindow();
            const draggableMarker = new AdvancedMarkerElement({
                map,
                position: { lat: lat, lng: long },
                gmpDraggable: true,
                title: "This marker is draggable.",
            });

            draggableMarker.addListener("dragend", (event) => {
                const position = draggableMarker.position;
                infoWindow.close();
                $('#latitude').val(position.lat);
                $('#longitude').val(position.lng);
                infoWindow.setContent(`Pin dropped at: ${position.lat}, ${position.lng}`,);
                infoWindow.open(draggableMarker.map, draggableMarker);
            });
        }
        initMap();
    </script>
</body>

</html>
