@extends('Admin.layouts.master')
@section('title', 'View Restro Coupon')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">View Restro coupon Offer</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.coupon.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <a href="{{ route('admin.coupon.edit',[$Coupon->id]) }}" type="submit" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4 mb-xxl-8">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="me-7 mb-4">
                                    <img class="rounded me-3" alt="user profile" width="200" src="{{ $Coupon->image_path }}" data-holder-rendered="true">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="justify-content-between align-items-start mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="#" class="fs-2 text-dark fw-bolder me-1">{{ $Coupon->Restro->name }}</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">Offer Name</h6>
                                                    <p class="fw-bolder">{{ $Coupon->name }}</p>
                                                </div>
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">Offer Text</h6>
                                                    <p class="fw-bolder">{{ $Coupon->details }}</p>
                                                </div>
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">Coupon Quantity</h6>
                                                    <p class="fw-bolder">{{ $Coupon->quantity }}</p>
                                                </div>
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">Validity</h6>
                                                    <p class="fw-bolder">{{ $Coupon->validity }} Days</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">Terms & Condition</h6>
                                                    <p class="fw-bolder">{!! $Coupon->terms !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
