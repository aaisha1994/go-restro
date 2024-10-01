@extends('Admin.layouts.master')

@section('title', 'Users')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>
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
                                        <a href="{{ route('admin.user.export') }}" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary" type="button">&#43; Add User</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Created Date</th>
                                            <th>Purchase Subscription</th>
                                            <th>No Of Passport</th>
                                            <th>Source</th>
                                            <td>Activate / Deactivate</td>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Users as $User)
                                            <tr id="row_{{ $User->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $User->name }}</td>
                                                <td>{{ $User->email }}</td>
                                                <td>{{ $User->mobile }}</td>
                                                <td>{{ date('d-m-Y', strtotime($User->created_at)) }}</td>
                                                <td>{{ $User->subscription_status == 1 ? 'Yes' : 'No' }}</td>
                                                <td>{{ $User->current_restro ?? '-' }}</td>
                                                <td>
                                                    @if($User->source == 1)
                                                        {{ 'User' }}
                                                    @elseif($User->source == 2)
                                                        {{ 'Restro' }}
                                                    @elseif($User->source == 3)
                                                        {{ 'Admin' }}
                                                    @elseif($User->source == 4)
                                                        {{ 'Affiliate' }}
                                                    @else
                                                        {{ '-' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <label class="switch" >
                                                        <input type="checkbox" class="status" data-id="{{ $User->id }}" @if($User->status == 1) checked @endif>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td id="tooltip-container9" class="">
                                                    <a href="{{ route('admin.user.view',[$User->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view">
                                                        <i class="ri-eye-line font-size-14"></i>
                                                    </a>

                                                    <a href="{{ route('admin.user.edit',[$User->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil font-size-14"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" class="me-1 btn btn-sm btn-secondary delete" data-id="{{ $User->id }}" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="delete" data-bs-original-title="delete"><i class="mdi mdi-delete font-size-14"></i></a>
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
                    url: "{{ route('admin.user.delete', ['_id']) }}".replace('_id', id),
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
            url: "{{ route('admin.user.status', ['_id']) }}".replace('_id', id),
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
