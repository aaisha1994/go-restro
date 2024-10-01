@extends('Admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">View Member Details</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <a href="{{ route('admin.user.edit', [$User->id]) }}" type="submit" class="btn btn-sm btn-primary">Edit</a>
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
                                    <img class="rounded me-3" alt="user profile" width="180" src="{{ asset('storage/user/'.$User->image) }}" data-holder-rendered="true">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="justify-content-between align-items-start mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="#" class="fs-2 text-dark fw-bolder me-1">{{ $User->name }}</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md mb-4">
                                                    <h6 class="fw-bolder">Email</h6>
                                                    <p class="fw-bolder">{{ $User->email }}</p>
                                                </div>
                                                <div class="col-sm-12 col-md mb-4">
                                                    <h6 class="fw-bolder">Phone No.</h6>
                                                    <p class="fw-bolder">{{ $User->mobile }}</p>
                                                </div>
                                                <div class="col-sm-12 col-md mb-4">
                                                    <h6 class="fw-bolder">Date of Birth </h6>
                                                    <p class="fw-bolder">{{ date('d-m-Y', strtotime($User->date_of_birth)) }}</p>
                                                </div>
                                                @if($User->other_date != null)
                                                @foreach (explode(',',str_replace(array( '[', ']','{','}' ), '', json_encode($User->other_date))) as $key => $val)
                                                        <div class="col-sm-12 col-md mb-4">
                                                            <h6 class="fw-bolder">{{ str_replace(array( '"',  ), '', explode(':', $val)[0]) }}</h6>
                                                            <p class="fw-bolder">{{ str_replace(array( '"',  ), '', explode(':', $val)[1]) }}</p>
                                                        </div>
                                                        @if($key == 0)
                                                            </div>
                                                            <div class="row">
                                                        @endif
                                                    @endforeach
                                                @endif
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- coupon -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">coupons</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <div class="btn-group">
                                        <select class="form-select form-select-sm filter" data-id="{{ $User->id }}" id="coupon">
                                            <option value="0">Filter Coupons</option>
                                            <option value="0">All</option>
                                            <option value="1">Available</option>
                                            <option value="2">Redeemed</option>
                                            <option value="3">Expired</option>
                                        </select>
                                    </div>
                                    <div class="btn-group">
                                        <select class="form-select form-select-sm filter" data-id="{{ $User->id }}" id="restro">
                                            <option value="">Select Restro</option>
                                            @foreach ($UserRestro as $Restro)
                                                <option value="{{ $Restro->restro_id }}">{{ $Restro->Restaurant->name ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="coupondata">
                    @foreach ($UserCoupons as $UserCoupon)
                        <div class="col-sm-12 col-md-4">
                            <div class="card fw-bolder text-dark">
                                @if($UserCoupon->status == 1)
                                <div class="rubber_stamp">
                                    <img src="{{ asset('assets/images/coupon-logo/redeened-stamp.png') }}" alt="stamp" width="150">
                                </div>
                                @endif
                                @if($UserCoupon->end_date < date('Y-m-d'))
                                <div class="rubber_stamp">
                                    <img src="{{ asset('assets/images/coupon-logo/expired-stamp.png') }}" alt="stamp" width="150">
                                </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="qr-code">
                                                <img src="{{ $UserCoupon->Coupon->image_path }}" alt="qr-code" width="70">
                                            </div>
                                        </div>
                                        <div class="col-md-1 align-items-center border-end border-2"></div>
                                        <div class="col-md-8">
                                            <div class="align-items-center">
                                                <h3><span class="fs-5">{{ $UserCoupon->Coupon->name }}</span>
                                                    <span class="position-absolute top-0 end-0">
                                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="privacy policy">
                                                            <i class="ri-information-line fs-4"></i>
                                                        </a>
                                                    </span>
                                                </h3>
                                                <span>{{ $UserCoupon->Coupon->details }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on("change", ".filter", function() {
            var id = $(this).data("id");
            let status = $('#coupon').val();
            let restro = $('#restro').val();
            $.ajax({
                type: "post",
                url: "{{ route('admin.user.filter', ['_id']) }}".replace('_id', id),
                dataType: "html",
                data: {
                    'status' : status,
                    'restro_id' : restro
                },
                success: function(response) {
                    $('#coupondata').html(response);
                },
            });
        });
    </script>
@endsection
