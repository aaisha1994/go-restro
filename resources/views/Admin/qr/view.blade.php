@extends('Admin.layouts.master')
@section('title', 'QR Management')
@section('css')
<style type="text/css">
.position-relative {
    position: relative;
}

.overlay-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none; /* Ensure the image doesn't block QR code scanning */
}
</style>
@endsectiom
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-md-0">QR Codes</h4>
                <div class=" ">
                    <div class="d-grid gap-2 d-flex justify-content-end">
                        <a href="{{ route('admin.qr.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                        <a href="javascript:void(0)" type="button" onclick="window.print()" class="btn btn-sm btn-primary">Export QR</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- {!! $qrCode !!} --}}
        <div class="qr-code">
            <div class="row">
                @foreach ($QrGenerate as $Qr)
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-body text-center">
                            <div class="card-title position-relative">
                                <div id="canvas_{{ $Qr->id }}" class="position-relative"></div>
                                @if($Qr->status !=0)<img src="{{ asset('assets/images/coupon-logo/redeened-stamp.png') }}" class="overlay-image" width="140">@endif
                            </div>
                            <span class="fs-5 mt-3 card-footer border border-secondary border-1">{{ $Qr->qr_code }}</span>
                            <p class="fs-5 mt-4">Scan This QR</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')

{{-- <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

<script type="text/javascript">
    function qrgenerate(id, qr_code) {
        var qrCode = new QRCodeStyling({
            width: 200,
            height: 200,
            type: "canvas",
            data: qr_code,
            image: "{{ asset('assets/images/users/logo.png') }}",
            margin: 5,
            dotsOptions: {
                type: "dots",
                colorType: "gradient",
                gradient:{
                    colorStops: [
                        {color:"#ED6D59", offset: 0.5}, {color:"#425969",offset: 0.5}
                    ],
                    rotation: "106",
                    type: "linear"
                },
            },
            cornersSquareOptions: {
                type : "extra-rounded"
            },
            cornersDotOptions: {
                type: "Dot"
            },
            qrOptions: {
                errorCorrectionLevel: "H"
            },
            imageOptions: {
                crossOrigin: "anonymous",
                margin: 5
            }
        });

        qrCode.clear;
        qrCode.append(document.getElementById("canvas_" + id));
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @foreach ($QrGenerate as $Qr)
            qrgenerate({{ $Qr->id }}, "{{ e($Qr->qr_code) }}");
        @endforeach
    });
</script>
@endsection
