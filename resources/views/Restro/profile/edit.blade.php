@extends('Restro.layouts.master')
@section('title', 'Profile Details')
@section('toolbar', 'Profile Details')
@section('css')
<style>
    .error {
        color: #ff0000;
    }
</style>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form action="{{ route('restro.profile.updateprofile') }}" method="POST" id="kt_account_profile_details_form" class="form">
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Restaurant Logo</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('restaurant/media/svg/avatars/blank.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $Restaurant->image_path }})"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $Restaurant->name }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Person Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="person_name" class="form-control form-control-lg form-control-solid" value="{{ $Restaurant->Restro->name }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ $Restaurant->Restro->email }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Mobile Number</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="mobile" class="form-control form-control-lg form-control-solid" value="{{ $Restaurant->mobile }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Alt Mobile Number</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="mobile2" class="form-control form-control-lg form-control-solid" value="{{ $Restaurant->mobile2 }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">State</span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <select name="state_id" id="state_id" aria-label="Select a state" data-control="select2" data-placeholder="Select a state..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select a State...</option>
                                        @foreach ($State as $co)
                                            <option value="{{ $co->id }}" @if($co->id == $Restaurant->state_id) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">City</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="city_id" id="city_id" aria-label="Select a city" data-control="select2" data-placeholder="Select a city..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select a City...</option>
                                        @foreach ($City as $co)
                                            <option value="{{ $co->id }}" @if($co->id == $Restaurant->city_id) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Zip Code</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="zip_code" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $Restaurant->zip_code }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                                <div class="col-lg-8 mb-5 fv-row">
                                    <textarea name="address" class="form-control form-control-lg form-control-solid" rows="3">{{ $Restaurant->address }}</textarea>
                                    <input type="hidden" name="latitude" id="latitude" value="{{ $Restaurant->latitude ?? 23.000810403073036 }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ $Restaurant->longitude ?? 72.57424599428148 }}">
                                </div>
                                <div class="col fv-row">
                                    <div id="map_canvas" style="width: 100%;height: 300px;"></div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Approx Price Person</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="price_per_person" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $Restaurant->price_per_person }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Food Category</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="category_id[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Food Category" data-allow-clear="true" multiple="multiple">
                                        @foreach ($Category as $co)
                                            <option value="{{ $co->id }}" @if(in_array($co->id, $category_id)) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Image</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="fv-row">
                                        <div class="dropzone" id="kt_dropzonejs1">
                                            <div class="dz-message needsclick">
                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                    <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Restaurant Menu</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="fv-row">
                                        <div class="dropzone" id="kt_dropzonejs2">
                                            <div class="dz-message needsclick">
                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                    <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Facilities</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="facility_id[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Facilities" data-allow-clear="true" multiple="multiple">
                                        @foreach ($Facility as $co)
                                            <option value="{{ $co->id }}" @if(in_array($co->id, $facility_id)) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Meal Preference</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck1" value="veg" @if(in_array('veg', explode(',', $Restaurant->meal_preference))) checked @endif>
                                    <label class="form-check-label me-4" for="formCheck1">Veg </label>
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck2" value="non-veg" @if(in_array('non-veg', explode(',', $Restaurant->meal_preference))) checked @endif>
                                    <label class="form-check-label me-4" for="formCheck2">Non-Veg</label>
                                    <input type="checkbox" name="meal_preference[]" class="form-check-input" id="formCheck3" value="vegans" @if(in_array('vegans', explode(',', $Restaurant->meal_preference))) checked @endif>
                                    <label class="form-check-label" for="formCheck3">Vegans </label>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Must Try</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="must_try" value="{{ $Restaurant->must_try }}">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Area</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="establishment_type" value="{{ $Restaurant->establishment_type }}">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Open Time</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Sunday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Sunday][from_time]" value="{{ $Restaurant->open_time["Sunday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Sunday][to_time]" value="{{ $Restaurant->open_time["Sunday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Monday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Monday][from_time]" value="{{ $Restaurant->open_time["Monday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Monday][to_time]" value="{{ $Restaurant->open_time["Monday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Tuesday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Tuesday][from_time]" value="{{ $Restaurant->open_time["Tuesday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Tuesday][to_time]" value="{{ $Restaurant->open_time["Tuesday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Wednesday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Wednesday][from_time]" value="{{ $Restaurant->open_time["Wednesday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Wednesday][to_time]" value="{{ $Restaurant->open_time["Wednesday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Thursday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Thursday][from_time]" value="{{ $Restaurant->open_time["Thursday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Thursday][to_time]" value="{{ $Restaurant->open_time["Thursday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Friday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Friday][from_time]" value="{{ $Restaurant->open_time["Friday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Friday][to_time]" value="{{ $Restaurant->open_time["Friday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" readonly value="Saturday">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Saturday][from_time]" value="{{ $Restaurant->open_time["Saturday"]["from_time"] ?? '09:00:00' }}">
                                        <input type="time" class="form-control form-control-solid" name="open_time[Saturday][to_time]" value="{{ $Restaurant->open_time["Saturday"]["to_time"] ?? '23:00:00' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
    <input type="hidden" id="RestroImage" value="{{ $RestroImage }}">
    <input type="hidden" id="RestroMenu" value="{{ $RestroMenu }}">
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on("change", "#state_id", function() {
            var id = $(this).val();
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
                },
            });
        });

        window.addEventListener('load', function() {
            $("#kt_account_profile_details_form").validate({
                rules: {
                    name: { required: true },
                    person_name: { required: true },
                    email: { required: true },
                    mobile: { required: true },
                    mobile2: { required: true },
                    price_per_person: { required: true },
                    state_id: { required: true },
                    city_id: { required: true },
                    address: { required: true },
                    zip_code: { required: true },
                    "category_id[]": { required: true, },
                    "facility_id[]": { required: true, },
                    "meal_preference[]": { required: true, },
                    must_try: { required: true, },
                    establishment_type: { required: true, },
                },
                messages: {
                    name: { required: "Name is required" },
                    person_name: { required: "Person Name is required" },
                    email: { required: "Email is required" },
                    mobile: { required: "Contact No is required" },
                    mobile2: { required: "Alternate Contact No is required" },
                    price_per_person: { required: "Approx price for person is required" },
                    state_id: { required: "State is required" },
                    city_id: { required: "City is required" },
                    address: { required: "Address is required" },
                    zip_code: { required: "Zip Code is required" },
                    "category_id[]": { required: "Category is required", },
                    "facility_id[]": { required: "Facility is required", },
                    "meal_preference[]": { required: "Meal Preference is required", },
                    must_try: { required: "Must Try is required", },
                    establishment_type: { required: "Area is required", },
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

        var myDropzone = new Dropzone("#kt_dropzonejs1", {
            url: "{{ route('restro.profile.uploadimage') }}",
            paramName: "image",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                let myDropzone = this;
                let RestroImage = JSON.parse($('#RestroImage').val());
                for (let index = 0; index < RestroImage.length; index++) {
                    var element = RestroImage[index];
                    let mockFile = { name: element['image'], size: 12345, serverFileName: element['id'] };
                    myDropzone.displayExistingFile(mockFile, element['image_path']);
                }
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
            init: function() {
                let myDropzone = this;
                let RestroMenu = JSON.parse($('#RestroMenu').val());
                for (let index = 0; index < RestroMenu.length; index++) {
                    var element = RestroMenu[index];
                    let mockFile = { name: element['image'], size: 12345, serverFileName: element['id'] };
                    myDropzone.displayExistingFile(mockFile, element['image_path']);
                }
            },
            success: function(file, response) {
                file.serverFileName = response;
            },
            removedfile: function(file) {
                $.post("{{ route('restro.profile.removeimage') }}", {id: file.serverFileName}, function() { file.previewElement.remove(); });
            }
        });
    </script>
@endsection
