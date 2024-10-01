@extends('Admin.layouts.master')
@section('title', 'Create Restro')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.restro.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add New Restro</h4>
                            <div class="">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.restro.index') }}" type="button"
                                        class="btn btn-sm btn-primary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="restaurant-name">Restaurant Name *</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="contact-person">Contact person Name *</label>
                                        <input type="text" class="form-control" id="contact-person" name="person_name">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="email-address">Email Address *</label>
                                        <input type="email" class="form-control" id="email-address" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="phone">Contact No. *</label>
                                        <input type="number" class="form-control" id="phone" name="mobile"
                                            maxlength="10" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="alternate-contact">Alternate contact no *</label>
                                        <input type="number" class="form-control" name="mobile2" id="alternate-contact"
                                            maxlength="10" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="alternate-contact">Approx price for person *</label>
                                        <input type="text" class="form-control" id="price_per_person" name="price_per_person">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label for="form-label" class="form-label">State *</label>
                                        <select class="form-select select2" title="Country" name="state_id" id="state_id">
                                            <option value="">Choose...</option>
                                            @foreach ($State as $co)
                                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="city_id">City *</label>
                                        <select class="form-select select2" title="city" name="city_id" id="city_id">
                                            <option value="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="zip-code">Zip / Postal code *</label>
                                        <input type="number" class="form-control" id="zip-code" pattern="[0-9]*"
                                            name="zip_code">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="image">Restaurant Logo *</label>
                                        <input class="form-control" name="logo" id="image" type="file">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Food Category</label>
                                        <select class="select2 form-control select2-multiple select2" name="category_id[]"
                                            multiple="multiple" data-placeholder="Choose Food Category...">
                                            @foreach ($Category as $co)
                                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Facility Select</label>
                                        <select class="select2 form-control select2-multiple select2" name="facility_id[]"
                                            multiple="multiple" data-placeholder="Choose ...">
                                            @foreach ($Facility as $co)
                                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <img id="showImage" class="rounded avatar-lg mt-3"
                                            src="{{ url('upload/no_image.jpg') }}" alt="Restaurant Logo">
                                    </div>
                                    <div class="col mt-4">
                                        <label class="form-label">Meal preference</label>
                                        <div>
                                            <input type="checkbox" name="meal_preference[]" class="form-check-input"
                                                id="formCheck1" value="veg">
                                            <label class="form-check-label me-4" for="formCheck1">Veg </label>
                                            <input type="checkbox" name="meal_preference[]" class="form-check-input"
                                                id="formCheck2" value="non-veg">
                                            <label class="form-check-label me-4" for="formCheck2">Non-Veg</label>
                                            <input type="checkbox" name="meal_preference[]" class="form-check-input"
                                                id="formCheck3" value="vegans">
                                            <label class="form-check-label" for="formCheck3">Vegans </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="billing-address">Address</label>
                                        <textarea class="form-control" id="billing-address" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="password">Password *</label>
                                        <input class="form-control" name="password" id="password" type="password">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="confirm_password">Confirm Password *</label>
                                        <input class="form-control" name="confirm_password" id="confirm_password"
                                            type="password">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="passport_price">Passport Price *</label>
                                        <input type="number" class="form-control" id="passport_price" name="passport_price">
                                        <input type="hidden" name="latitude" id="latitude" value="23.000810403073036">
                                        <input type="hidden" name="longitude" id="longitude" value="72.57424599428148">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div id="map_canvas" style="width: 100%;height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.select2').select2();
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

        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: {
                        required: true
                    },
                    person_name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    mobile: {
                        required: true
                    },
                    mobile2: {
                        required: true
                    },
                    price_per_person: {
                        required: true
                    },
                    state_id: {
                        required: true
                    },
                    city_id: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    zip_code: {
                        required: true
                    },
                    logo: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    person_name: {
                        required: "Person Name is required"
                    },
                    email: {
                        required: "Email is required"
                    },
                    mobile: {
                        required: "Contact No is required"
                    },
                    mobile2: {
                        required: "Alternate Contact No is required"
                    },
                    price_per_person: {
                        required: "Approx price for person is required"
                    },
                    state_id: {
                        required: "State is required"
                    },
                    city_id: {
                        required: "City is required"
                    },
                    address: {
                        required: "Address is required"
                    },
                    zip_code: {
                        required: "Zip Code is required"
                    },
                    logo: {
                        required: "Restaurant Logo is required"
                    },
                    password: {
                        required: "New Password is required",
                        minlength: 'Password must be at least 8 character and contain symbols'
                    },
                    confirm_password: {
                        required: "Confirm Password is required",
                        equalTo : 'Password and confirm password does not match'
                    },
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
            const { Map, InfoWindow } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
            const map = new Map(document.getElementById("map_canvas"), {
                center: { lat: 23.000810403073036, lng: 72.57424599428148 },
                zoom: 14,
                mapId: "4504f8b37365c3d0",
            });
            const infoWindow = new InfoWindow();
            const draggableMarker = new AdvancedMarkerElement({
                map,
                position: { lat: 23.000810403073036, lng: 72.57424599428148 },
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
