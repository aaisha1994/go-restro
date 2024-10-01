@extends('Restro.layouts.master')
@section('title', 'History')
@section('toolbar', 'History')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            @include('Restro.profile.profile')
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Subscription History</h3>
                    </div>
                    <div class="card-toolbar" >
                        <a href="{{route('restro.profile.subscription')}}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-200px">Plan Name</th>
                                    <th class="min-w-150px">Amount</th>
                                    <th class="min-w-150px">Purchase date</th>
                                    <th class="min-w-100px text-end">Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $history)
                                    <tr>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $history->RestroSubscription->name }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $history->amount }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ date('d M Y', strtotime($history->start_date)) }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6 text-end">{{ date('d M Y', strtotime($history->end_date)) }}</a>
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
@endsection
