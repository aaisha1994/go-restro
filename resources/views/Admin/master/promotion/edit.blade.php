@extends('Admin.layouts.master')
@section('title', 'Edit Promotion')
@section('css')
<style>
    .input-group{
        gap: 15px;
    }
</style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.promotion.update',[$Promotion->id]) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add Promotion</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.promotion.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="promotion_name">Promotion Name *</label>
                                        <input type="text" class="form-control" id="promotion_name" name="name" value="{{ $Promotion->name }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Select Restraurant *</label>
                                        <select class="form-select" title="Select Restraurant" name="restro_id" id="restro_id">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($Restros as $Restro)
                                                <option value="{{ $Restro->id }}" @if($Promotion->restro_id == $Restro->id) @selected(true) @endif>{{ $Restro->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Select Coupon*</label>
                                        <select class="form-select" title="Select Coupon" id="coupon_id" name="coupon_id">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($Coupons as $Coupon)
                                                <option value="{{ $Coupon->id }}" @if($Promotion->coupon_id == $Coupon->id) @selected(true) @endif>{{ $Coupon->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-5">
                                        <label class="form-label" for="image">Banner image *</label>
                                        <input class="form-control" name="image" id="image" type="file">
                                        <img id="showImage" class="rounded avatar-lg mt-3" src="{{ $Promotion->image_path }}" alt="User image">
                                    </div>
                                    <div class="col-md-4 mb-5">
                                        <label class="form-label">Date *</label>
                                        <div class="input-daterange input-group flex-container" style="flex-wrap: nowrap" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                            <div><input type="text" class="form-control" name="start_date" placeholder="Start Date" value="{{ date('d M, Y', strtotime($Promotion->start_date)) }}"></div>
                                            <div><input type="text" class="form-control" name="end_date" placeholder="End Date" value="{{ date('d M, Y', strtotime($Promotion->end_date)) }}"></div>
                                        </div>
                                    </div>
                                </div>
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
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                    restro_id: { required: true },
                    coupon_id: { required: true },
                    start_date: { required: true },
                    end_date: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
                    restro_id: { required: "Restro is required" },
                    coupon_id: { required: "Coupon is required" },
                    start_date: { required: "Start Date is required"},
                    end_date: { required: "End Date is required"},
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        $(document).on('change','#restro_id', function(e){
            var id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('admin.promotion.coupon', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let option = '<option value="0">Select Coupon</option>';
                    for (let i = 0; i < response.data.length; i++) {
                        option += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                    }
                    $('#coupon_id').html(option);
                },
            });
        });
    </script>
@endsection
