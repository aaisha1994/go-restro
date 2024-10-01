@extends('web.layouts.master')
@section('title', 'partner-with-us')
@section('content')

    <section class="pt_banner_inner banner_px_image"
        style="background-image: url({{ asset('web/img/inner/bg-contact.png') }});     background-size: cover;">
        <div class="parallax_cover justify-content-center">
            <!-- <img class="cover-parallax" src="{{ asset('web/img/inner/bg-contact.png') }}" alt="image"> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 pm-lg-10">
                    <div class="banner_title_inner">
                        <h1 data-aos="fade-up" data-aos-delay="0">Partner with Go Restro at 0% commission for the life time!
                        </h1>
                        <!-- <p data-aos="fade-up" data-aos-delay="100">Drop by for a cup of coffe</p> -->
                        <div data-aos="fade-up" data-aos-delay="200" id="contact">
                            <a href="{{ route('restro.login') }}"
                                class="btn btn_sm_primary bg-blue c-white rounded-8">Register your restaurant</a>
                        </div>
                        <p class="fs-18 pt-4 text-light">Need help? Contact <a href="tel:+91 8799599912"
                                class="text-primary">+91 8799599912</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services_section hosting_service margin-b-3 margin-t-8">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="title_sections_inner margin-b-5">
                        <h2>Why should you partner with Go Restro?</h2>
                        <p class="fs-20">Go Restro enables you to get 60% more revenue, 10x new customers and boost your
                            brand visibility by providing insights to improve your business.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4 item">
                            <div class="items_serv sevice_block">
                                <div class="icon--top">
                                    <img src="{{ asset('web/img/icons/Settings.svg') }}" alt="icon">
                                </div>
                                <div class="txt">
                                    <h3>Restro Dashboarde</h3>
                                    <p>
                                        Efficiently manage restaurant coupon distribution
                                        and usage with our user-friendly dashboard.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="items_serv sevice_block">
                                <div class="icon--top">
                                    <img src="{{ asset('web/img/icons/Layers.svg') }}" alt="icon">
                                </div>
                                <div class="txt">
                                    <h3>Track your customer</h3>
                                    <p>
                                        Efficiently monitor customer engagement metrics,
                                        including coupon redemptions and daily visit count.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="items_serv sevice_block">
                                <div class="icon--top">
                                    <img src="{{ asset('web/img/icons/Thunder-move.svg') }}" alt="icon">
                                </div>
                                <div class="txt">
                                    <h3>Your Restro Promotion</h3>
                                    <p>
                                        Expand your restaurant's reach and attract more
                                        diners with GoRestro's innovative user app platform
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="simplecontact_section gbo_contact ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-5">
                    <div class="title_sections mb-0">
                        <h2 class="c-white">Start your journey with Go Restro</h2>
                        <p class="c-white">
                            Create your restaurant page and register for online ordering
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-6 my-auto ml-auto text-md-right">
                    <a href="{{ route('restro.login') }}"
                        class="btn rounded-8 c-white btn_md_primary ripple scale bg-orange-red">
                        Start now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="app_icon">
        <div class="container subscribe_phone">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="h2 my-5 text-center">Download The App</div> -->
                    <div class="app_smartphone margin-t-5 d-flex justify-content-center">
                        <div class="btn--app mb-3 d-block">
                            <a class="media" href="#" target="_blank">
                                <div class="icon dark">
                                    <i class="tio apple text-dark"></i>
                                </div>
                                <div class="media-body txt">
                                    <div>
                                        <span class="c-light">Download</span>
                                    </div>
                                    <h4 class="c-dark">App Store</h4>
                                </div>
                            </a>
                        </div>
                        <div class="btn--app">
                            <a class="media" href="#" target="_blank">
                                <div class="icon blue">
                                    <img width="20" src="{{ asset('web/img/icons/google-play.svg') }}" />
                                </div>
                                <div class="media-body txt">
                                    <div>
                                        <span class="c-light">Download</span>
                                    </div>
                                    <h4 class="c-dark">Google Play</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="stories__customers py-0 mb-0 margin-t-5 bg-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-5">
                    <div class="title_sections_inner margin-b-5">
                        <h2>Our happy partners</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="body__swipe">
                        <!-- Swiper -->
                        <div class="swiper-container swiper__center swiper-container-initialized swiper-container-horizontal"
                            style="cursor: grab;">
                            <div class="swiper-wrapper"
                                style="transform: translate3d(-674.667px, 0px, 0px); transition-duration: 0ms;">

                                <div class="swiper-slide" style="width: 307.333px; margin-right: 30px;">
                                    <div class="item__review bg-snow">
                                        <div class="head_content">
                                            <div class="media">
                                                <img class="img_av" src="{{ asset('web/img/persons/01.png') }}"
                                                    alt="">
                                                <div class="media-body">
                                                    <div class="txt">
                                                        <h3>Virginia A. Busey</h3>
                                                        <p>UI/ UX Designer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content_txt">
                                            <p>
                                                "Impressed with master class support of the team and really look forward for
                                                the
                                                future.Really, really well made! Love that each component is handmade and
                                                customised.
                                                Great Work!"
                                            </p>
                                        </div>
                                        <div class="footer_content">
                                            <div class="starts_item">
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide swiper-slide-prev" style="width: 307.333px; margin-right: 30px;">
                                    <div class="item__review bg-snow">
                                        <div class="head_content">
                                            <div class="media">
                                                <img class="img_av" src="{{ asset('web/img/persons/02.png') }}"
                                                    alt="">
                                                <div class="media-body">
                                                    <div class="txt">
                                                        <h3>Jackie D. Binion</h3>
                                                        <p>UI Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content_txt">
                                            <p>
                                                "Impressed with master class support of the team and really look forward for
                                                the
                                                future.Really, really well made! Love that each component is handmade and
                                                customised.
                                                Great Work!"
                                            </p>
                                        </div>
                                        <div class="footer_content">
                                            <div class="starts_item">
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide swiper-slide-active"
                                    style="width: 307.333px; margin-right: 30px;">
                                    <div class="item__review bg-snow">
                                        <div class="head_content">
                                            <div class="media">
                                                <img class="img_av" src="{{ asset('web/img/persons/03.png') }}"
                                                    alt="">
                                                <div class="media-body">
                                                    <div class="txt">
                                                        <h3>Jack M. Hall</h3>
                                                        <p>UI Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content_txt">
                                            <p>
                                                "Impressed with master class support of the team and really look forward for
                                                the
                                                future.Really, really well made! Love that each component is handmade and
                                                customised.
                                                Great Work!"
                                            </p>
                                        </div>
                                        <div class="footer_content">
                                            <div class="starts_item">
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide swiper-slide-next" style="width: 307.333px; margin-right: 30px;">
                                    <div class="item__review bg-snow">
                                        <div class="head_content">
                                            <div class="media">
                                                <img class="img_av" src="{{ asset('web/img/persons/2.png') }}"
                                                    alt="">
                                                <div class="media-body">
                                                    <div class="txt">
                                                        <h3>Norma J. Thomas</h3>
                                                        <p>UI Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content_txt">
                                            <p>
                                                "Impressed with master class support of the team and really look forward for
                                                the
                                                future.Really, really well made! Love that each component is handmade and
                                                customised.
                                                Great Work!"
                                            </p>
                                        </div>
                                        <div class="footer_content">
                                            <div class="starts_item">
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide" style="width: 307.333px; margin-right: 30px;">
                                    <div class="item__review bg-snow">
                                        <div class="head_content">
                                            <div class="media">
                                                <img class="img_av" src="{{ asset('web/img/persons/1.png') }}"
                                                    alt="">
                                                <div class="media-body">
                                                    <div class="txt">
                                                        <h3>Virginia A. Busey</h3>
                                                        <p>UI Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content_txt">
                                            <p>
                                                "Impressed with master class support of the team and really look forward for
                                                the
                                                future.Really, really well made! Love that each component is handmade and
                                                customised.
                                                Great Work!"
                                            </p>
                                        </div>
                                        <div class="footer_content">
                                            <div class="starts_item">
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                                <i class="tio star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-button-next bg-dark" tabindex="0" role="button" aria-label="Next slide"
                            aria-disabled="false">
                            <i class="tio chevron_right c-white"></i>
                        </div>

                        <div class="swiper-button-prev bg-snow" tabindex="0" role="button"
                            aria-label="Previous slide" aria-disabled="false">
                            <i class="tio chevron_left c-dark"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq_one_inner py-0 mt-0 margin-b-6 margin-t-6 w-100">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-5">
                    <div class="title_sections_inner margin-b-5">
                        <h2>Frequently asked questions</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <!-- block Collapse -->
                    <div class="faq_section faq_demo3 faq_with_icon">
                        <div class="block_faq">
                            <div class="accordion" id="accordionExample">
                                @foreach ($Faqs as $key => $Faq)
                                    <div class="card">
                                        <div class="card-header @if($key == 0) active @endif" id="heading{{ $key }}">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">{{ $Faq->question }}</button>
                                            </h3>
                                        </div>
                                        <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">{!! $Faq->answer !!}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
