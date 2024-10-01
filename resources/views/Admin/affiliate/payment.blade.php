@extends('Admin.layouts.master')
@section('title', 'Affiliate Payment')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Affiliate Payment</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-sm-flex justify-content-end">
                                <a href="javascript:void(0)" class="badge bg-info-subtle text-info fs-5"><span class="fs-6">Total Amount</span> {{ $Pending + $InProgress }}</a>
                                <a href="javascript:void(0)" class="badge bg-danger-subtle text-danger fs-5"><span class="fs-6">Pending </span>{{ $Pending }}</a>
                                <a href="javascript:void(0)" class="badge bg-success-subtle text-success fs-5"><span class="fs-6">InProgress</span> {{ $InProgress }}</a>
                            </div>
                        </div>
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
                                {{-- <div class="col">
                                    <div class="d-grid gap-2 d-flex justify-content-end">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2"
                                            type="button">Export to Excel</a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2"
                                            type="button">Upload to Excel</a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Affiliate Name</th>
                                            <th>Affiliate Type</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Wallets as $Wallet)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $Wallet->Affiliate->first_name .' '. $Wallet->Affiliate->last_name }}</td>
                                                <td>
                                                    @if($Wallet->Affiliate->affiliate_type == 1)
                                                        {{ 'Social Influencers' }}
                                                    @elseif($Wallet->Affiliate->affiliate_type == 2)
                                                        {{ 'On Wheels' }}
                                                    @else
                                                        {{ 'Marketing Agencies' }}
                                                    @endif
                                                </td>
                                                <td>{{ $Wallet->amount }} &#8377;</td>
                                                <td>{{ date('d M, Y', strtotime($Wallet->created_at)) }}</td>
                                                <td>
                                                    <div class="float-start">
                                                        <select class="form-select form-select-sm status" data-id="{{ $Wallet->id }}" @if($Wallet->status == 1 || $Wallet->status == 2) @disabled(true) @endif>
                                                            <option value="0" @if($Wallet->status == 0) @selected(true) @endif>Pending</option>
                                                            <option value="3" @if($Wallet->status == 3) @selected(true) @endif>In-progress</option>
                                                            <option value="1" @if($Wallet->status == 1) @selected(true) @endif>Success</option>
                                                            <option value="2" @if($Wallet->status == 2) @selected(true) @endif>Rejected</option>
                                                        </select>
                                                    </div>
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
        $(document).on("change", ".status", function() {
            var t = $(this);
            var id = $(this).data("id");
            let status = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('admin.affiliate.payment.change', ['_id']) }}".replace('_id', id),
                dataType: "json",
                data: {
                    'status' : status
                },
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
