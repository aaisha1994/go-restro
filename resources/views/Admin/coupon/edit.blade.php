@extends('Admin.layouts.master')
@section('title', 'Edit Restro Coupon')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.coupon.update',[$Coupon->id]) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Edit Offer</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.coupon.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                    <button type="submit" id="form1" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview</button>
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
                                        <label class="form-label">Select Restraurant *</label>
                                        <select class="form-select" title="Select Restraurant" name="restro_id">
                                            <option disabled="" value="">Choose...</option>
                                            @foreach ($Restro as $co)
                                                <option value="{{ $co->id }}" @if($co->id == $Coupon->restro_id) @selected(true) @endif>{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="offer-name">Offer Name *</label>
                                        <input type="text" class="form-control" id="offer-name" placeholder="Offer Name" name="name" value="{{ $Coupon->name }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="offer-text">Offer Text *</label>
                                        <input type="text" class="form-control" id="offer-text" placeholder="Offer Text" name="details" value="{{ $Coupon->details }}">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-md-4 mb-4">
                                        <label class="form-label" for="validity">Validity </label>
                                        <input type="number" class="form-control" id="validity" name="validity" value="{{ $Coupon->validity }}">
                                    </div> --}}
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="image">image *</label>
                                        <input class="form-control" name="image" id="image" type="file">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="coupon-quantity">Coupon Quantity *</label>
                                        <input type="number" class="form-control" id="coupon-quantity" name="quantity" value="{{ $Coupon->quantity }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <img id="showImage" class="rounded avatar-lg mt-3" src="{{ $Coupon->image_path }}" alt="User image">
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <label class="form-label" for="terms-condition">Terms & Condition *</label>
                                        <textarea class="form-control" rows="3" placeholder="Terms & Condition" name="terms">{{ $Coupon->terms }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Preview Coupon</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card fw-bolder text-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="qr-code">
                                                    <img src="{{ asset('assets/images/coupon-logo/1.png') }}" alt="logo" id="coupon_image" width="100">
                                                </div>
                                            </div>
                                            <div class="col-md-1 align-items-center border-end border-2"></div>
                                            <div class="col-md-8">
                                                <div class="align-items-center flote-end">
                                                    <h3><span class="fs-5" id="coupon_name">Discount</span>
                                                        <span class="position-absolute top-0 end-0">
                                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                                                <i class="ri-information-line fs-4"></i>
                                                            </a>
                                                        </span>
                                                    </h3>
                                                    <span id="coupon_details"></span><br>
                                                    <span class="position-absolute bottom-0 end-0">
                                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Coupon Quantity">
                                                            <span class="badge bg-primary text-end" id="coupon_quantity">50</span>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="savebtn" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Model Over --}}
            </form>
        </div>
    </div>
    <input type="hidden" value="1" id="formsubmit">
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

        $(document).on('click','#form1', function(e) {
            $("#form").validate({
                rules: {
                    restro_id: { required: true },
                    name: { required: true },
                    details: { required: true },
                    quantity: { required: true },
                    // validity: { required: true },
                    // image: { required: true },
                    terms: { required: true },
                },
                messages: {
                    restro_id: { required: "Restro is required" },
                    name: { required: "Name is required" },
                    details: { required: "Details is required" },
                    quantity: { required: "Quantity is required" },
                    // validity: { required: "Validity is required" },
                    // image: { required: "Validity is required" },
                    terms: { required: "Terms is required" },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    console.log($('#formsubmit').val());
                    if($('#formsubmit').val() == 1) {
                        var image = $('#showImage').attr('src');
                        console.log($('#offer-name').val());
                        $('#staticBackdrop').modal('show');
                        $('#coupon_name').html($('#offer-name').val());
                        $('#coupon_details').html($('#offer-text').val());
                        $('#coupon_quantity').html($('#coupon-quantity').val());
                        $('#coupon_image').attr('src', image);
                        $('#formsubmit').val(1);
                    } else {
                        form.submit();
                    }
                }
            });
        });
        $(document).on('click','#savebtn', function(e){
            $('#formsubmit').val(2);
        });
    </script>
@endsection
