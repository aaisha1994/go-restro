@extends('Affiliate.layouts.master')
@section('title', 'QR Management')
@section('toolbar', 'QR Management')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <div class="card-flush border-0 h-lg-100">
                        <div class="card-header border-0 pt-2">
                            <h3 class="card-title">
                                <span class="text-gray-600 text-hover-primary fs-3 fw-bolder me-2">Your referral link</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                            <div class="px-9 mb-5">
                                <div class="w-lg-100">
                                    <h4 class="fs-6 mb-5 fw-bold text-primary">Share referral link with friends</h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <select class="form-select form-select-solid" id="restro_id" data-control="select2" data-placeholder="Select Restaurant">
                                                <option value="0" disabled></option>
                                                @foreach ($Restaurant as $Restro)
                                                    <option value="{{ $Restro->id }}" @if($Restro->id == Auth::guard('affiliate')->user()->restro_id) @selected(true) @endif>{{ $Restro->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-8 d-flex">
                                            <input id="kt_share_earn_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://go-restro.com/?ref={{ Auth::guard('affiliate')->user()->ref_code }}" readonly />
                                            <button id="kt_share_earn_link_copy_button" class="btn btn-light fw-bolder flex-shrink-0" data-clipboard-target="#kt_share_earn_link_input">Copy Link</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mt-5 mx-auto">
                            <div class="card card-flush border border-3 py-4">
                                <div id="linkQR" style="background: #FFF">
                                    <div class="card-header">
                                        <div class="card-title mx-auto mb-5">
                                            <img src="{{ asset('restaurant/media/logos/logo.png') }}" class="w-150px" />
                                        </div>
                                    </div>
                                    <div class="card-body text-center pt-5">
                                        <div class="image-input image-input-empty image-input-outline mb-3">
                                            <div class="w-170px h-170px">
                                                @if($QrGenerate)
                                                    <div id="canvas_1"></div>
                                                    {{-- {!! QrCode::size(200)->margin(1)->style('dot')->eye('circle')->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'inverse_diagonal')->generate($QrGenerate->qr_code) !!} --}}
                                                @else
                                                    <img src="{{ asset('restaurant/media/restro/qr.png') }}" class="w-150px h-150px" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-dark fw-bolder pt-5 fs-3">Scan This QR</div>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                                            </svg>
                                        </div>
                                    </a> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Start -->
    <div class="modal fade" tabindex="-1" id="serial_number">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('affiliate.qr.link') }}">
                    @csrf
                    <div class="modal-body">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Serial Number</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="qr_code" placeholder="SMPH00123" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button value="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.5.2/dom-to-image.min.js"></script>

    <script>
        $('#downloadQR').click(function () {
            domtoimage
                .toJpeg(document.getElementById('linkQR'), {
                    quality: 0.95
                })
                .then(function (dataUrl) {
                    let link = document.createElement('a')
                    link.download = 'reedem.jpeg'
                    link.href = dataUrl
                    link.click()
                })
        })
    </script>
    <script type="text/javascript">
        var button = document.querySelector('#kt_share_earn_link_copy_button');
        var input = document.querySelector('#kt_share_earn_link_input');
        var clipboard = new ClipboardJS(button);

        clipboard.on('success', function(e) {
            var buttonCaption = button.innerHTML;
            //Add bgcolor
            input.classList.add('bg-success');
            input.classList.add('text-inverse-success');

            button.innerHTML = 'Copied!';

            setTimeout(function() {
                button.innerHTML = buttonCaption;

                // Remove bgcolor
                input.classList.remove('bg-success');
                input.classList.remove('text-inverse-success');
            }, 1000);

            e.clearSelection();
        });

        $(document).on("change", "#restro_id", function() {
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('affiliate.restrolink', ['_id']) }}".replace('_id', id),
                dataType: "json",
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