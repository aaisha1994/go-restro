@extends('Admin.layouts.master')
@section('title', 'Subscription History')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Subscription History</h4>
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
                                        <a href="{{ route('admin.subscription.index') }}" class="btn btn-sm btn-primary me-md-2">Back</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Restaurant Name</th> --}}
                                            <th>Purchased Plan</th>
                                            <th>Order No</th>
                                            <th>Transaction No</th>
                                            <th>Amount</th>
                                            <th>Purchased Date</th>
                                            {{-- <th>Invoice</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Transactions as $Transaction)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $Transaction->Subscription->name }}</td>
                                                {{-- <td>Gold Access</td> --}}
                                                <td>{{ $Transaction->order_no }}</td>
                                                <td>{{ $Transaction->transaction_id }}</td>
                                                <td>{{ $Transaction->amount }}</td>
                                                <td>{{ date('d-m-Y', strtotime($Transaction->created_at)) }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('admin.subscription.invoice',[$Transaction->id]) }}" class="me-1 btn btn-sm btn-secondary" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Invoice" data-bs-original-title="Invoice"><i class="ri-file-download-line font-size-14"></i></a>
                                                </td> --}}
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
