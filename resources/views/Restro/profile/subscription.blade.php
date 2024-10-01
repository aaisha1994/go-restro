@extends('Restro.layouts.master')
@section('title', 'Subscription')
@section('toolbar', 'Subscription')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Current Plan</h3>
                    </div>
                    <div class="card-toolbar" >
                        <a href="{{route('restro.profile.subscription.history')}}" class="btn btn-sm btn-primary">History</a>
                    </div>
                </div>
                <div class="card-body border-top">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xxl-4 mx-auto">
                            @if($Restro->Restaurant->subscription_status == 0)
                            <div class="text-center">
                                <img src="{{asset('restaurant/media/illustrations/sigma-1/13.png')}}" width="250">
                            </div>
                            @else
                            <label class="active btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start shadow rounded p-6" data-kt-button="true" style="display: flex !important;justify-content: space-around;">
                                <span class="ms-5">
                                    <div class="row">
                                        <div class="col-md-6 text-start">
                                            <span class="badge badge-light-primary">Active</span>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <span>{{ date('d M Y', strtotime($Restro->Restaurant->expire_date)) }} </span>
                                        </div>
                                    </div>
                                    <span class="text-center">
                                        <span class="display-3 fw-bolder mb-1 d-block">Rs {{ $Transaction->amount ?? '' }}</span>
                                        <span class="fs-1 fw-bolder mt-1 d-block">{{ $Transaction->RestroSubscription->name ?? '' }}</span>
                                        <span class="fs-5 fw-bolder text-start mt-4 d-block">Benefits</span>
                                        <span class="fw-bold fs-5 text-gray-600">
                                            {!! $Transaction->RestroSubscription->benefits ?? '' !!}
                                        </span>
                                    </span>
                                </span>
                            </label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Subcription -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Prime Membership</h3>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <form action="{{ route('restro.profile.sub.pay') }}" method="POST" id="form">
                        @csrf
                        <input type="hidden" id="dataamount" name="amount">
                        <input type="hidden" id="subscription_id" name="subscription_id">
                        <div class="mb-2">
                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                @foreach ($RSubcriptions as $key => $RSubcription)
                                <div class="col-md-4 col-lg-4 col-xxl-4">
                                    <label data-id="{{ $RSubcription->id }}" data-amount="{{ $RSubcription->amount }}" class="btn btn-outline btn-outline-dashed @if($key == 1) active @endif btn-outline-default d-flex text-start shadow rounded p-6" data-kt-button="true" style="display: flex !important;justify-content: space-around;">
                                        <span class="ms-5">
                                            {{-- <span class="badge badge-light-primary text-end">Active</span> --}}
                                            <span class="text-center">
                                                <span class="display-3 fw-bolder mb-1 d-block">Rs {{ number_format($RSubcription->amount,0) }}</span>
                                                <span class="fs-1 fw-bolder mt-3 d-block">{{ $RSubcription->name }}</span>
                                                <span class="fs-5 fw-bolder text-start mt-4 d-block">Benefits</span>
                                                <span class="fw-bold fs-5 text-gray-600">
                                                    {!! $RSubcription->benefits !!}
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                                <!--begin::Col-->
                               {{-- <div class="col-md-4 col-lg-4 col-xxl-4">
                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start shadow rounded p-6"
                                        data-kt-button="true">
                                        <span class="ms-5">
                                            <!-- <span class="badge badge-light-primary text-end">Active</span> -->
                                            <span class="text-center">
                                                <span class="display-3 fw-bolder mb-1 d-block">Rs 1200</span>
                                                <span class="fs-1 fw-bolder mt-3 d-block">Diamond</span>
                                                <span class="fs-5 fw-bolder text-start mt-4 d-block">Benefits</span>
                                                <span class="fw-bold fs-5 text-gray-600">
                                                    <div class="row">
                                                        <div class="col-sm-6 mt-2">
                                                            <img src="{{ asset('restaurant/media/smiles/1.png') }}"
                                                                class="me-3" />B’day Discount
                                                        </div>
                                                        <div class="col-sm-6 mt-2">
                                                            <img src="{{ asset('restaurant/media/smiles/2.png') }}"
                                                                class="me-3" />
                                                            600 GR Coin
                                                        </div>
                                                        <div class="col-sm-6 mt-2">
                                                            <img src="{{ asset('restaurant/media/smiles/3.png') }}"
                                                                class="me-3" />
                                                            60% Discount
                                                        </div>
                                                        <div class="col-sm-6 mt-2">
                                                            <img src="{{ asset('restaurant/media/smiles/4.png') }}"
                                                                class="me-3" />
                                                            200 GR Coin
                                                        </div>
                                                    </div>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>--}}
                            </div>
                            <div class="text-center mt-15">
                                <button type="submit" class="btn btn-primary me-2 px-6 changeplan">Upgrade Plan</button>
                            </div>
                            <!--end::Row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection
@section('js')
    <script>
        $(document).on('click', '.changeplan', function (e) {
            let id = $('#form').find('.active').attr('data-id');
            let amount = $('#form').find('.active').attr('data-amount');
            $('#subscription_id').val(id);
            $('#dataamount').val(amount);
            $('#form').submit()
        });
    </script>
@endsection
