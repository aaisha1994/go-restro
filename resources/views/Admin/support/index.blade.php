@extends('Admin.layouts.master')
@section('title', 'Customer Support')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customer Support</h4>
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
                                    <div class="d-grid d-flex justify-content-end">
                                        <div class="float-start">
                                            <select class="form-select form-select-sm">
                                                <option selected="">Pending</option>
                                                <option value="2">Success</option>
                                            </select>
                                        </div>
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
                                            <th>Account Type</th>
                                            <th>Query</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Supports as $Support)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    @if ($Support->account_type == 1)
                                                        {{ $Support->User->name }}
                                                    @elseif ($Support->account_type == 2)
                                                        {{ $Support->Restro->name }}
                                                    @else
                                                        {{ $Support->Affiliate->first_name }}
                                                    @endif
                                                </td>
                                                <td>{{ __(App\Models\Support::$AccountType[$Support->account_type]) }}</td>
                                                <td>{{ $Support->subject }}</td>
                                                <td>{{ date('d-m-Y', strtotime($Support->created_at)) }}</td>
                                                <td>{{ $Support->status == 1 ? 'Success' : 'Pending' }}</td>
                                                <td id="tooltip-container9" class="">
                                                    <a href="{{ route('admin.support.view',[$Support->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="view" data-bs-original-title="view"><i class="ri-eye-line font-size-14"></i></a>
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
