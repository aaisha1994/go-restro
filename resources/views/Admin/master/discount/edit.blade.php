@extends('Admin.layouts.master')
@section('title', 'Update Discount')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.discount.update',[$Discount->id]) }}" method="post" id="form" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Edit Discount</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.discount.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="height:370px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="name">Discount Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $Discount->name }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="discount">Discount % *</label>
                                        <input type="number" class="form-control" id="discount" name="discount" value="{{ $Discount->discount }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Date Range Selection</label>
                                        <div class="input-daterange input-group flex-container" style="flex-wrap: nowrap" id="datepicker6"
                                            data-date-format="dd M, yyyy" data-date-autoclose="true"
                                            data-provide="datepicker" data-date-container="#datepicker6">
                                            <div><input type="text" class="form-control" name="start_date" placeholder="Start Date"  value="{{ date('d M, Y', strtotime($Discount->start_date)) }}"></div>
                                            <div><input type="text" class="form-control" name="end_date" placeholder="End Date"  value="{{ date('d M, Y', strtotime($Discount->end_date)) }}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('js')
<script>
    window.addEventListener('load', function() {
        $("#form").validate({
            rules: {
                name: { required: true },
                discount: { required: true },
                start_date: { required: true },
                end_date: { required: true },
            },
            messages: {
                name: { required: "Name is required"},
                discount: { required: "Discount is required"},
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
</script>
@endsection
