@extends('Admin.layouts.master')
@section('title', 'Contact Us')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{route('admin.cms.contact.store')}}" method="POST" id="form">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Contact Us</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-primary">Clear</button>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Phone No *</label>
                                    <input type="tel" class="form-control" name="mobile" value="{{ $cms->mobile }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" value="{{ $cms->email }}">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Address *</label>
                                    <textarea class="form-control" rows="3" name="address">{{ $cms->address }}</textarea>
                                </div>
                                <h5 class="mb-4">Social Media Links</h5>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Facbook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $cms->facebook }}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $cms->instagram }}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ $cms->linkedin }}">
                                    <input type="hidden" name="latitude" id="latitude" value="{{ $cms->latitude ?? 23.000810403073036 }}">
                                        <input type="hidden" name="longitude" id="longitude" value="{{ $cms->longitude ?? 72.57424599428148 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 card">
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
    <script>
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    mobile : { required: true },
                    email : { required: true },
                    address : { required: true },
                },
                messages: {
                    mobile: { required: "Mobile is required" },
                    email: { required: "Email is required" },
                    address: { required: "Address is required" },
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
    </script>
@endsection
