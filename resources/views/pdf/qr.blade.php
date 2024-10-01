<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <div class="qr-code">
        <div class="row">
            @foreach ($data as $Qr)
                <div class="col-sm-6 col-md-3">
                    <div class="card card-body text-center">
                        <div class="card-title">
                            <div id="canvas_{{ $Qr->id }}"></div>
                        </div>
                        <span class="fs-5 mt-3 card-footer border border-secondary border-1">{{ $Qr->qr_code }}</span>
                        <p class="fs-5 mt-4">Scan This QR</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script> --}}
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
            @foreach ($data as $Qr)
                qrgenerate({{ $Qr->id }}, "{{ e($Qr->qr_code) }}");
            @endforeach
        });
    </script>
</body>

</html>
