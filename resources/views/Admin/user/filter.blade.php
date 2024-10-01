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
