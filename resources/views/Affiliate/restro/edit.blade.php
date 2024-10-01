@extends('Affiliate.layouts.master')
@section('title', 'Restro Update')
@section('toolbar', 'Restro Update')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <form id="form" class="form" action="{{ route('affiliate.restro.update',[$Restaurant->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1"></div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('affiliate.restro.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Restaurant Name</label>
                                    <input type="text" name="name" value="{{ $Restaurant->name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Contact person Name</label>
                                    <input type="text" name="person_name" value="{{ $Restaurant->Restro->name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Email Address</label>
                                    <input type="email" name="email" value="{{ $Restaurant->Restro->email }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Contact No.</label>
                                    <input type="number" name="mobile" value="{{ $Restaurant->mobile }}" class="form-control form-control-solid mb-3 mb-lg-0" pattern="[0-9]{10}" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Alternate contact no</label>
                                    <input type="number" name="mobile2" value="{{ $Restaurant->mobile2 }}" class="form-control form-control-solid mb-3 mb-lg-0" pattern="[0-9]{10}" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Approx price for person</label>
                                    <input type="text" name="price_per_person" value="{{ $Restaurant->price_per_person }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">State </label>
                                    <select class="form-select form-select-solid" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an State">
                                        <option value="">Choose...</option>
                                        @foreach ($State as $co)
                                            <option value="{{ $co->id }}" @if($co->id == $Restaurant->state_id) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">City </label>
                                    <select class="form-select form-select-solid" name="city_id" id="city_id" data-control="select2" data-placeholder="Select an City">
                                        <option value="">Choose...</option>
                                        @foreach ($City as $co)
                                            <option value="{{ $co->id }}" @if($co->id == $Restaurant->city_id) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Zip / Postal code</label>
                                    <input type="number" id="zip-code" pattern="[0-9]*" name="zip_code" value="{{ $Restaurant->zip_code }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="fw-bold fs-6 mb-2">Food Category</label>
                                    <select class="form-select form-select-solid" name="category_id[]" data-control="select2" data-placeholder="Select an Food Category" data-allow-clear="true" multiple="multiple">
                                        @foreach ($Category as $co)
                                            <option value="{{ $co->id }}" @if(in_array($co->id, $category_id)) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="fw-bold fs-6 mb-2">Facility Select</label>
                                    <select class="form-select form-select-solid" name="facility_id[]" data-control="select2" data-placeholder="Select Facility" data-allow-clear="true" multiple="multiple">
                                        @foreach ($Facility as $co)
                                            <option value="{{ $co->id }}" @if(in_array($co->id, $facility_id)) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="fw-bold fs-6 mb-2">Meal Preference</label>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <div class="me-10">
                                            <input class="form-check-input" type="checkbox" name="meal_preference[]" value="veg" @if(in_array('veg', explode(',', $Restaurant->meal_preference))) checked @endif />
                                            <label class="form-check-label">Veg</label>
                                        </div>
                                        <div class="me-10">
                                            <input class="form-check-input" type="checkbox" name="meal_preference[]" value="nonveg" @if(in_array('nonveg', explode(',', $Restaurant->meal_preference))) checked @endif />
                                            <label class="form-check-label">Non-Veg</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="meal_preference[]" value="vegans" @if(in_array('vegans', explode(',', $Restaurant->meal_preference))) checked @endif />
                                            <label class="form-check-label">Vegans</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Restaurant Logo</label>
                                    <input type="file" name="logo" id="image" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="fv-row mb-10">
                                    <img id="showImage" class="rounded avatar-lg w-125px h-125p" src="{{ url('upload/no_image.jpg') }}" alt="Restaurant Logo">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Address</label>
                                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="address">{{ $Restaurant->address }}</textarea>
                                    <input type="hidden" name="latitude" id="latitude" value="{{ $Restaurant->latitude ?? 23.000810403073036 }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ $Restaurant->longitude ?? 72.57424599428148 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="map_canvas" style="width: 100%;height: 300px;"></div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <a href="{{ route('affiliate.restro.index') }}" class="btn btn-md btn-light-primary me-5">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

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

        $(document).ready(function() {
            $("#form").validate({
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
@endsection
