<!DOCTYPE html>
<html lang="en">

<head>
    <title>GoRestro | @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('restaurant/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('restaurant/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    @yield('css')
</head>

<body id="kt_body" style="background-image: url({{ asset('restaurant/media/patterns/header-bg.jpg') }})"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header-->
                @include('Restro.layouts.header')
                <!--begin::Toolbar-->
                <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                        <div class="page-title d-flex flex-column me-3">
                            <h1 class="d-flex text-white fw-bolder my-1 fs-3">@yield('toolbar')</h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                <li class="breadcrumb-item text-white opacity-75">
                                    <span class="text-white text-hover-primary">{{ Auth::guard('restro')->user()->Restaurant->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('content')
                @include('Restro.layouts.footer')
            </div>
        </div>
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
        </span>
    </div>
    {{-- @if(Auth::guard('restro')->user()->Restaurant->details_status == 0) --}}
        <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        {{-- <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div> --}}
                    </div>
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <form id="kt_modal_new_target_form" action="{{ route('restro.other') }}" method="POST" class="form" novalidate="novalidate">
                            @csrf
                            <div class="mb-13 text-center">
                                <h1 class="mb-3">Restaurant Information</h1>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Approx Price Person</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="99 To 9999" name="price_per_person" required>
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Food Category</span>
                                </label>
                                <select name="category_id[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Food Category" data-allow-clear="true" multiple="multiple">
                                    @foreach (Category() as $co)
                                        <option value="{{ $co->id }}">{{ $co->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Restaurant Photos</span>
                                </label>
                                <div class="dropzone" id="kt_dropzonejs1">
                                    <div class="dz-message needsclick">
                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.
                                            </h3>
                                            <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                            <div class="fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Restaurant Menu</span>
                                </label>
                                <div class="dropzone" id="kt_dropzonejs2">
                                    <div class="dz-message needsclick">
                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.
                                            </h3>
                                            <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Facilities</span>
                                </label>
                                <select name="facility_id[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Facilities" data-allow-clear="true" multiple="multiple">
                                    @foreach (Facility() as $co)
                                        <option value="{{ $co->id }}" >{{ $co->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Meal Preference</span>
                                </label>
                                <div>
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck1" value="veg">
                                    <label class="form-check-label me-4" for="formCheck1">Veg </label>
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck2" value="non-veg">
                                    <label class="form-check-label me-4" for="formCheck2">Non-Veg</label>
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck3" value="vegans">
                                    <label class="form-check-label" for="formCheck3">Vegans </label>
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">Must Try</label>
                                <input type="text" class="form-control form-control-solid" name="must_try">
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">Area</label>
                                <input type="text" class="form-control form-control-solid" name="establishment_type" required>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">Open Time</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Sunday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Sunday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Sunday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Monday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Monday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Monday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Tuesday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Tuesday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Tuesday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Wednesday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Wednesday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Wednesday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Thursday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Thursday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Thursday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Friday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Friday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Friday][to_time]" value="23:00:00">
                                </div>
                                <div class="d-flex">
                                    <input type="text" class="form-control form-control-solid" readonly value="Saturday">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Saturday][from_time]" value="09:00:00">
                                    <input type="time" class="form-control form-control-solid" name="open_time[Saturday][to_time]" value="23:00:00">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endif --}}

    @if(Auth::guard('restro')->user()->Restaurant->admin_status == 0 && Auth::guard('restro')->user()->Restaurant->details_status == 1)
        <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end"></div>
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15 text-center">
                        <img src="{{ asset('assets/animation.gif') }}" alt="">
                        <h2>Under Review</h2>
                        <p>We are working on it, Your profile is in under review for approval.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('restaurant/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('restaurant/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

        function toastCall(status, message) {
            toastr.options.timeOut = 10000;
            if (status == "success") {
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        }
    </script>

    <script>
        function openModal() {
            $("#kt_modal_new_target").modal({
                show: false,
                keyboard: false,
                backdrop: 'static'
            });
            $('#kt_modal_new_target').modal('show');
        }
    </script>
    @if(Auth::guard('restro')->user()->Restaurant->details_status == 0 || Auth::guard('restro')->user()->Restaurant->admin_status == 0)
        <script>
        $(document).ready(function() { openModal(); });
        var myDropzone = new Dropzone("#kt_dropzonejs1", {
            url: "{{ route('restro.profile.uploadimage') }}",
            paramName: "image",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                file.serverFileName = response;
            },
            removedfile: function(file) {
                $.post("{{ route('restro.profile.removeimage') }}", {id: file.serverFileName}, function() { file.previewElement.remove(); });
            }
        });
        var myDropzone = new Dropzone("#kt_dropzonejs2", {
            url: "{{ route('restro.profile.uploadimage') }}",
            paramName: "menu",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                file.serverFileName = response;
            },
            removedfile: function(file) {
                $.post("{{ route('restro.profile.removeimage') }}", {id: file.serverFileName}, function() { file.previewElement.remove(); });
            }
        });
        </script>

        <script>
        window.addEventListener('load', function() {
            $("#kt_modal_new_target_form").validate({
                rules: {
                    price_per_person: { required: true, },
                    "category_id[]": { required: true, },
                    "facility_id[]": { required: true, },
                    "meal_preference[]": { required: true, },
                    must_try: { required: true, },
                    establishment_type: { required: true, },
                },
                messages: {
                    price_per_person: { required: "Price per purson is required", },
                    "category_id[]": { required: "Category is required", },
                    "facility_id[]": { required: "Facility is required", },
                    "meal_preference[]": { required: "Meal Preference is required", },
                    must_try: { required: "Must Try is required", },
                    establishment_type: { required: "Area is required", },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.fv-row').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        </script>
    @endif
    @yield('js')
</body>

</html>
