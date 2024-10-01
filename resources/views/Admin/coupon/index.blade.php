@extends('Admin.layouts.master')
@section('title', 'Restro Coupon')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Restro coupon Offer</h4>
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
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                                        <a href="{{ route('admin.coupon.create') }}" class="btn btn-sm btn-primary" type="button">&#43; Add Offer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Restro Name</th>
                                            <th>Offer Name</th>
                                            <th>Offer Text</th>
                                            <th>Quantity</th>
                                            {{-- <th>Validity</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Coupons as $Coupon)
                                            <tr id="row_{{ $Coupon->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><img src="{{ $Coupon->image_path }}" alt="avatar" class="rounded avatar-sm"></td>
                                                <td>{{ $Coupon->Restro->name ?? '-' }}</td>
                                                <td>{{ $Coupon->name }}</td>
                                                <td>{{ $Coupon->details }}</td>
                                                <td>{{ $Coupon->quantity }}</td>
                                                {{-- <td>{{ $Coupon->validity }} Days</td> --}}
                                                <td id="tooltip-container9" class=" ">
                                                    <a href="{{ route('admin.coupon.view',[$Coupon->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view">
                                                        <i class="ri-eye-line font-size-14"></i>
                                                    </a>
                                                    <a href="{{ route('admin.coupon.edit',[$Coupon->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="edit" data-bs-original-title="edit">
                                                        <i class="mdi mdi-pencil font-size-14"></i>
                                                    </a>
                                                    <a href="javascript:void()" class="me-1 btn btn-sm btn-secondary delete" data-id="{{ $Coupon->id }}" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
                                                </td>
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
@endsection
@section('js')
<script>
    $(document).on('click', '.delete', function(e) {
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "{{ route('admin.coupon.delete', ['_id']) }}".replace('_id', id),
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            toastCall("success", response.message);
                            $('#row_' + id).remove();
                        } else {
                            toastCall("error", response.message);
                        }
                    },
                });
            }
        })
    });
</script>
@endsection
