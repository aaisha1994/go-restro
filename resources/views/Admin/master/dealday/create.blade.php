@extends('Admin.layouts.master')
@section('title', 'Create Deal Of the day')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.dealday.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add deal</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.dealday.create') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label">Select Restraurant *</label>
                                        <select class="form-select" title="Select Restraurant" name="restro_id" id="restro_id">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($Restros as $Restro)
                                                <option value="{{ $Restro->id }}">{{ $Restro->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Select Offer *</label>
                                        <select class="form-select" title="Select Offer" id="coupon_id" name="coupon_id">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="date">Date *</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-5">
                                        <label class="form-label" for="image">image *</label>
                                        <input class="form-control" name="image" id="image" type="file">
                                        <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="User image">
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
                    restro_id: { required: true },
                    coupon_id: { required: true },
                    image: { required: true },
                    date: { required: true },
                    end_date: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
                    restro_id: { required: "Restro is required" },
                    coupon_id: { required: "Coupon is required" },
                    image: { required: "Image is required" },
                    date: { required: "Date is required"},
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
                url: "{{ route('admin.dealday.coupon', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let option = '<option value="0">Select Offer</option>';
                    for (let i = 0; i < response.data.length; i++) {
                        option += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                    }
                    $('#coupon_id').html(option);
                },
            });
        });
    </script>
@endsection
