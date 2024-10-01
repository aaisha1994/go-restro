@extends('Admin.layouts.master')
@section('title', 'Send Gift')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Send Gift</h4>
                    </div>
                </div>
            </div>
            <!-- end title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-inline float-md-start">
                                        <div class="search-box ms-2">
                                            <div class="position-relative">
                                                <input type="search" id="search" class="form-control rounded" placeholder="Search...">
                                                <i class="mdi mdi-magnify search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#sendgift">Send Gift</button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Restaurant Name</th>
                                            <th>Mobile Number</th>
                                            <th>Gift Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Gifts as $Gift)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $Gift->Restro->name }}</td>
                                                <td>+91 {{ $Gift->mobile }}</td>
                                                <td>{{ $Gift->GiftCoupon->sum('quantity') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gift Send Modal -->
    <div class="modal fade" id="sendgift" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="custom-validation" action="{{ route('admin.gift.store') }}" method="post" id="form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Gift Send</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="validationCustom03" class="form-label">Select Restaurant</label>
                            <select class="form-select" id="validationCustom03" name="restro_id">
                                <option selected="" disabled="" value="">Choose...</option>
                                @foreach ($Restro as $Restr)
                                    <option value="{{ $Restr->id }}">{{ $Restr->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Mobile No..">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    restro_id: { required: true },
                    mobile: { required: true },
                },
                messages: {
                    restro_id: { required: "Restro is required" },
                    mobile: { required: "Mobile is required" },
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
