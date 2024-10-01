@extends('Admin.layouts.master')
@section('title', 'Approve Reject Restro')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">View Approve & Reject Post</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="javascript:void()" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Approve</a>
                                <a href="{{ route('admin.approve.reject',[$Approve->id]) }}" class="btn btn-secondary btn-sm">Reject</a>
                                <a href="{{ route('admin.approve.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4 mb-xxl-8">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="me-7 mb-4">
                                    <img class="rounded me-3" alt="user profile" width="180" src="{{ $Restaurant->image_path }}" data-holder-rendered="true">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="justify-content-between align-items-start mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="#" class="fs-2 text-dark fw-bolder me-1">{{ $Restaurant->name }}</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md mb-2">
                                                    <h6 class="fw-bolder">@if($Approve->type == 0)
                                                        {{ 'New Profile' }}
                                                        @elseif($Approve->type == 1)
                                                        {{ 'Profile Change' }}
                                                        @elseif($Approve->type == 2)
                                                        {{ 'Passport Change' }}
                                                        @endif</h6>
                                                </div>
                                            </div>
                                            @if($Approve->type != 2)
                                                <div class="row">
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Contact Person Name</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->Restro->name }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Email</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->Restro->email }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Contact No.</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->Restro->mobile }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Alternate contact No.</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->mobile2 }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Approx price for person</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->price_per_person }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">Passport Price</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->passport_price }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <h6 class="fw-bolder">City</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->City->name }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md mb-4">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-toggle="collapse" href="#multiCollapseExample1"
                                                            aria-expanded="false" aria-controls="multiCollapseExample1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-arrows-expand"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row collapse multi-collapse" id="multiCollapseExample1">
                                                    <div class="col-sm-12 col-md-3 mb-4">
                                                        <h6 class="fw-bolder">State</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->State->name }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 mb-4">
                                                        <h6 class="fw-bolder">Zip / Postal code </h6>
                                                        <p class="fw-bolder">{{ $Restaurant->zip_code }}</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 mb-4">
                                                        <h6 class="fw-bolder">Address</h6>
                                                        <p class="fw-bolder">{{ $Restaurant->address }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($Approve->type == 2)
                                <hr>
                                <div class="row">
                                    <h6 class="fw-bolder">Content</h6>
                                    @foreach ($Restaurant->Coupon as $Coupon)
                                        <div class="col-sm-12 col-md-4">
                                            <div class="card fw-bolder text-dark">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="qr-code">
                                                                <img src="{{ $Coupon->image_path }}" alt="qr-code" width="70">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 align-items-center border-end border-1"></div>
                                                        <div class="col-md-8">
                                                            <div class="align-items-center">
                                                                <h3><span class="fs-5">{{ $Coupon->name }}</span>
                                                                    <span class="position-absolute top-0 end-0">
                                                                        <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="privacy policy">
                                                                            <i class="ri-information-line fs-5"></i>
                                                                        </a>
                                                                    </span>
                                                                </h3>
                                                                <span>{{ $Coupon->details }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($Approve->type != 2)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#restroimages" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-images"></i></span>
                                            <span class="d-none d-sm-block fw-bolder">Restro Images</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#restromenus" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-file-alt"></i></span>
                                            <span class="d-none d-sm-block fw-bolder">Restro Menus</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#terms-condition" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-file-alt"></i></span>
                                            <span class="d-none d-sm-block fw-bolder">Terms & Condition</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content pt-3 text-muted">
                                    <div class="tab-pane active" id="restroimages" role="tabpanel">
                                        <div class="popup-gallery">
                                            <div class="row">
                                                @foreach ($Restaurant->RestroImage as $image)
                                                    @if($image->image_type == 1)
                                                    <div class="col-sm-3 mt-2">
                                                        <a class="float-start"
                                                            href="{{ $image->image_path }}"
                                                            title="Project 1">
                                                            <div class="img-fluid">
                                                                <img src="{{ $image->image_path }}" class="rounded " alt="img-1" width="200">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end::teb -->
                                    <div class="tab-pane" id="restromenus" role="tabpanel">
                                        <div class="zoom-gallery">
                                            <div class="row">
                                                @foreach ($Restaurant->RestroImage as $image)
                                                    @if($image->image_type == 2)
                                                    <div class="col-sm-3 mt-2">
                                                        <a class="float-start"
                                                            href="{{ $image->image_path }}"
                                                            title="Project 1">
                                                            <div class="img-fluid">
                                                                <img src="{{ $image->image_path }}" class="rounded " alt="img-1" width="200">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end::tab -->
                                    <div class="tab-pane" id="terms-condition" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! $Restaurant->terms !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.approve.approve',[$Approve->id]) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Do you want to update the passport price ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label>Old Price</label>
                                <input type="text" value="{{ $Restaurant->passport_price }}" name="old_price" class="form-control">
                            </div>
                            <div class="col">
                                <label>New Price</label>
                                <input type="text" name="passport_price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
