@extends('Admin.layouts.master')

@section('title', 'Sub Admin')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Admin Permissions</h4>
                    </div>
                </div>
            </div>

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
                                        <a href="{{ route('admin.subadmin.export') }}" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                                        <a href="{{ route('admin.subadmin.create') }}" class="btn btn-sm btn-primary" type="button">&#43; Add Admin</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Admins as $Admin)
                                            <tr id="row_{{ $Admin->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $Admin->name }}</td>
                                                <td>{{ $Admin->role }}</td>
                                                <td>{{ date('d-m-Y', strtotime($Admin->created_at)) }}</td>
                                                <td id="tooltip-container9" class="">
                                                    <a href="{{ route('admin.subadmin.view',[$Admin->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view">
                                                        <i class="ri-eye-line font-size-14"></i>
                                                    </a>

                                                    <a href="{{ route('admin.subadmin.edit',[$Admin->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil font-size-14"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary delete" data-id="{{ $Admin->id }}" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
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
                    url: "{{ route('admin.subadmin.delete', ['_id']) }}".replace('_id', id), ,
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
