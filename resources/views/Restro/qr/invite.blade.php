@extends('Restro.layouts.master')
@section('title', 'QR Invite')
@section('toolbar', 'QR Invite')
@section('content')

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7   mx-auto">
                <div class="card card-flush py-4">
                    <div id="linkQR" style="background: #FFF">
                        <div class="card-header" style="border: 0">
                            <div class="card-title mx-auto mb-5">
                                <img src="{{ asset('restaurant/media/logos/logo.png') }}" class="w-150px" />
                            </div>
                        </div>
                        <div class="card-body text-center pt-5">
                            <div class="image-input image-input-empty image-input-outline mb-3">
                                <div class="w-170px h-170px">
                                    @if($QrGenerate)
                                        {{-- {!! QrCode::size(150)->margin(1)->style('dot')->eye('circle')->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'inverse_diagonal')->generate($QrGenerate->qr_code) !!} --}}
                                        <div id="canvas_1"></div>
                                    @else
                                        <img src="{{ asset('restaurant/media/restro/qr.png') }}" class="w-150px h-150px" />
                                    @endif
                                    {{-- <img src="{{ asset('restaurant/media/restro/qr.png') }}" class="w-150px h-150px" /> --}}
                                </div>
                            </div>
                            <div class="text-dark fw-bolder pt-5 fs-3">Scan This QR to Download The App</div>
                            <div class="text-dark fw-bolder pt-2 fs-6 invitecount"><span class="text-primary">Invites</span>-150</div>
                        </div>
                    </div>
                    <div class="d-flex gap-5 mx-auto icons">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#serial_number">
                            <div class="bg-light-primary rounded-circle p-4">
                                <i class="bi bi-link-45deg text-primary fs-1"></i>
                            </div>
                        </a>
                        <div class="bg-light-primary rounded-circle p-4" id="downloadQR">
                            <i class="bi bi-download text-primary fs-2"></i>
                        </div>
                        {{-- <a href="javascript:void(0)">
                            <div class="bg-light-primary rounded-circle p-4">
                                <i class="bi bi-share text-primary fs-2"></i>
                            </div>
                        </a> --}}
                        {{-- <a href="javascript:void(0)">
                            <div class="bg-light-primary rounded-circle p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                                </svg>
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
    <!-- Modal Start -->
    <div class="modal fade" tabindex="-1" id="serial_number">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('restro.qr.link') }}">
                    @csrf
                    <div class="modal-body">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Serial Number</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="qr_code" placeholder="SMPH00123" required>
                        <input type="hidden" name="type" value="1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button value="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.5.2/dom-to-image.min.js"></script>
<script>
    $('#downloadQR').click(function () {
        $('.invitecount').css('visibility','hidden');
        domtoimage.toJpeg(document.getElementById('linkQR'), {
            quality: 0.95
        })
        .then(function (dataUrl) {
            $('.invitecount').css('visibility','visible');
            let link = document.createElement('a')
            link.download = 'invite.jpeg'
            link.href = dataUrl
            link.click()
        })
    })
</script>


<script src="https://cdn.jsdelivr.net/npm/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

<script type="text/javascript">
    function qrgenerate(id, qr_code) {
        var qrCode = new QRCodeStyling({
            width: 170,
            height: 170,
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
        @if($QrGenerate)
            qrgenerate(1, "{{ e($QrGenerate->qr_code) }}");
        @endif
    });
</script>
@endsection
