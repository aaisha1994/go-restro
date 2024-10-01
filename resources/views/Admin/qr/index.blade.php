@extends('Admin.layouts.master')
@section('title', 'QR Management')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">QR Management</h4>
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
                                        <a href="{{ route('admin.qr.create') }}" class="btn btn-sm btn-primary" type="button">&#43; Create QR</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No Of QR Codes</th>
                                            <th>Created Date</th>
                                            <th class="text-start">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($QrGenerates as $Qr)
                                        <tr id="row_{{ $Qr->id }}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $Qr->quantity }}</td>
                                            <td>{{ date('d-m-Y', strtotime($Qr->created_at)) }}</td>
                                            <td id="tooltip-container9" class="d-flex justify-content-start">
                                                <a href="{{ route('admin.qr.view',[$Qr->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-placement="top" aria-label="view" data-bs-original-title="view"><i class="ri-eye-line font-size-14"></i></a>
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
