<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Go Restro | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content=" " />
    <meta name="keywords" content=" " />
    <meta name="author" content=" " />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/swiper.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{asset('web/css/icons.css')}}" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ asset('web/css/icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/aos.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/main.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/normalize.css') }}" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    @yield('css')
</head>

<body>
    <div id="wrapper">
        <div id="content">
            @include('web.layouts.header')
            <main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                @yield('content')
            </main>
            @include('web.layouts.footer')
        </div>
        <div class="prgoress_indicator">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- <section class="loading_overlay">
            <div class="loader_logo">
               <img class="logo" src="{{ asset('web/img/logos/icon.png') }}"/>
            </div>
         </section> -->
    </div>
    <!-- jquery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/particles.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/TweenMax.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/ScrollMagic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/animation.gsap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/debug.addIndicators.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/swiper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/countdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/simpleParallax.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/charming.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/jquery.bxslider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/sharer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/sticky.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/vendor/aos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('web/js/main.js') }}" type="text/javascript"></script>
    {{-- <script src="{{asset('web/js/pages/mobile.js')}}" type="text/javascript"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @yield('js')

    <script>
        function toastCall(status, message) {
            toastr.options.timeOut = 10000;
            if (status == "success") {
                console.log('asd');
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        }
    </script>
</body>

</html>
