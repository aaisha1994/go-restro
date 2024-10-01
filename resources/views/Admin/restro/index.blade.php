@extends('Admin.layouts.master')
@section('title', 'Restro List')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Restros</h4>
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
                                                <input type="search" id="search" class="form-control rounded"
                                                    placeholder="Search...">
                                                <i class="mdi mdi-magnify search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-grid gap-2 d-flex justify-content-end">
                                        <a href="{{ route('admin.restro.export') }}" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                                        <a href="{{ route('admin.restro.create') }}" class="btn btn-sm btn-primary" type="button">&#43; Add Restro</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Created Date</th>
                                            <th>Passport Price</th>
                                            <td>Activate / Deactivate</td>
                                            <td>Top Restaurants</td>
                                            <th>Action</th>
                                            <td>Switch</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Restros as $Restro)
                                            <tr id="row_{{ $Restro->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $Restro->name }}</td>
                                                <td>{{ $Restro->Restro->email ?? '-' }}</td>
                                                <td>{{ $Restro->Restro->mobile ?? '-' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($Restro->created_at)) }}</td>
                                                <td>{{ $Restro->passport_price }}</td>
                                                <td>
                                                    <input type="checkbox" id="switch1_{{ $Restro->id }}" switch="none" class="status" data-id="{{ $Restro->id }}" @if($Restro->status == 1) checked @endif />
                                                    <label for="switch1_{{ $Restro->id }}" data-on-label="On" data-off-label="Off"></label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="switch2_{{ $Restro->id }}" switch="none" class="status1" data-id="{{ $Restro->id }}" @if($Restro->top_restro == 1) checked @endif />
                                                    <label for="switch2_{{ $Restro->id }}" data-on-label="On" data-off-label="Off"></label>
                                                </td>
                                                <td id="tooltip-container9" class=" ">
                                                    <a href="{{ route('admin.restro.view',[$Restro->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view">
                                                        <i class="ri-eye-line font-size-14"></i>
                                                    </a>
                                                    <a href="{{ route('admin.restro.edit',[$Restro->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="edit" data-bs-original-title="edit">
                                                        <i class="mdi mdi-pencil font-size-14"></i>
                                                    </a>
                                                    <a href="javascript:void()" class="me-1 btn btn-sm btn-secondary delete" data-id="{{ $Restro->id }}" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.restro.login',[$Restro->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Login" data-bs-original-title="Login">
                                                        <i class="ri-login-circle-line font-size-14"></i>
                                                    </a>
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
                    url: "{{ route('admin.restro.delete', ['_id']) }}".replace('_id', id),
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

    $(document).on("click", ".status", function() {
        var id = $(this).data("id");
        $.ajax({
            type: "post",
            url: "{{ route('admin.restro.status', ['_id']) }}".replace('_id', id),
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    toastCall("success", response.message);
                } else {
                    toastCall("error", response.message);
                }
            },
        });
    });
    $(document).on("click", ".status1", function() {
        var id = $(this).data("id");
        $.ajax({
            type: "post",
            url: "{{ route('admin.restro.top', ['_id']) }}".replace('_id', id),
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    toastCall("success", response.message);
                } else {
                    toastCall("error", response.message);
                }
            },
        });
    });
</script>
@endsection
