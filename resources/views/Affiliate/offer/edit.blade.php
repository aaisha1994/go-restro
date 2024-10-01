@extends('Affiliate.layouts.master')
@section('title', 'Restaurant Offers Update')
@section('toolbar', 'Restaurant Offers Update')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1"></div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('affiliate.offer.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="form" class="form" action="{{ route('affiliate.offer.update', [$Coupon->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Select Restraurant</label>
                                    <select class="form-select form-select-solid" name="restro_id" id="restraurant_name" data-control="select2" data-placeholder="Select an Restraurant">
                                        <option>Choose...</option>
                                        @foreach ($Restros as $co)
                                            <option value="{{ $co->id }}" @if($Coupon->restro_id == $co->id) @selected(true) @endif>{{ $co->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Offer Name</label>
                                    <input type="text" name="name" value="{{ $Coupon->name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Offer Text</label>
                                    <input type="text" name="details" value="{{ $Coupon->details }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Coupon Quantity.</label>
                                    <input type="number" name="quantity" value="{{ $Coupon->quantity }}" class="form-control form-control-solid mb-3 mb-lg-0" pattern="[0-9]{10}" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="required fw-bold fs-6 mb-2">Offer image</label>
                                    <input type="file" name="image" id="image" class="form-control form-control-solid mb-3 mb-lg-0" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="fv-row mt-5">
                                    <img id="showImage" class="rounded avatar-lg w-100px h-100p" src="{{ $Coupon->image_path }}" alt="Restaurant Logo">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-5">
                                <div class="fv-row mb-10">
                                    <label class="fw-bold fs-6 mb-2">Terms & Condition</label>
                                    <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="terms">{{ $Coupon->terms }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('affiliate.offer.index') }}" class="btn btn-md btn-light-primary me-5">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
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

        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    restro_id: { required: true },
                    name: { required: true },
                    details: { required: true },
                    quantity: { required: true },
                    image: { required: true }
                },
                messages: {
                    restro_id: { required: "Restraurant Name is required" },
                    name: { required: "Offer Name is required" },
                    details: { required: "Details is required" },
                    quantity: { required: "Quantity is required" },
                    image: { required: "Offer Image is required" },
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
@endsection
