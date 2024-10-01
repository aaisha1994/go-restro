@foreach ($GiftCoupons as $GiftCoupon)
<div class="row">
    <div class="col mt-5">
        <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed">
            <div class="d-flex">
                <div class="col-md-4">
                    <img src="{{ $GiftCoupon->Coupon->image_path }}" class="img-fluid rounded-start h-100" alt="Pizza Image">
                </div>
                <div class="col-md-8 p-3">
                    <div class="d-flex flex-stack">
                        <span class="card-title fs-3 text-primary fw-bolder">{{ $GiftCoupon->Coupon->name }}</span>
                    </div>
                    <p class="card-text fw-bolder">{{ $GiftCoupon->Coupon->details }}</p>
                    <div class="d-flex flex-stack">
                        <span class=" badge badge-success">Gift quantity - {{ $GiftCoupon->quantity }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
