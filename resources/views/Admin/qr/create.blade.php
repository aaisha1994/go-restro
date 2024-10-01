@extends('Admin.layouts.master')
@section('title', 'QR Management')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('admin.qr.store') }}" method="post" id="form">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Generate QR</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.qr.index')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="rq">No Of QR *</label>
                                    <div class="input-group col">
                                        <input type="number" class="form-control" aria-describedby="fileAddon" max="500" name="quantity">
                                        <button type="submit" class="btn btn-sm btn-primary" id="fileAddon">Generate QR</button>
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

        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    quantity: {
                        required: true
                    },
                },
                messages: {
                    quantity: {
                        required: "Quantity is required"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col').append(error);
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
