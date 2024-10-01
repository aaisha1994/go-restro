@extends('web.layouts.master')
@section('title', 'Home')
@section('content')
    <section class="demo_1 banner_section banner_demo8">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-sm-12 order-2 order-lg-1 tebsize">
                    <div class="banner_title">
                        <h1>
                            Big Discount on Every Dine In.
                            <span class="c-purple">Join Go Restro.</span>
                        </h1>
                        <p>
                            Unlock amazing discounts on your favorite restaurants with our app-exclusive coupons. Download
                            now to enjoy delicious meals at unbeatable prices. Don't miss out!
                        </p>
                        <div class="subscribe_phone">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="app_smartphone margin-t-4 d-flex">
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
                                                    <img width="20"
                                                        src="{{ asset('web/img/icons/google-play.svg') }}" />
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
                    </div>
                </div>
                <div class="col-lg-6 mx-auto order-1 order-lg-1">
                    <div class="ill_appMobile">
                        <img class="ill_app" src="{{ asset('web/img/app/c_app.svg') }}" />
                        <!-- <img class="ill_bg" src="{{ asset('web/img/app/background.svg') }}" /> -->
                        <img class="ill_user" src="{{ asset('web/img/app/home.png') }}" />
                        <a href="#"
                            class="btn btn_lg_primary effect-letter try_it bg-primary text-light rounded-8">Download APP</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->
    <!-- Start Services -->
    <section class="services_section  padding-t-8" id="services">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="title_sections">
                        <h2>Why <span class="text-primary">Go Restro</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 ">
                    <div class="items_serv">
                        <div class="media">
                            <div class="item-img">
                                <img src="{{ asset('web/img/icons/voucher.png') }}" class="mt-0" alt="icons">
                            </div>
                            <div class="media-body">
                                <div class="txt-small">
                                    <span style="visibility: hidden;">Step 1</span>
                                </div>
                                <h3>Every time big discount on your meal.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="items_serv">
                        <div class="media">
                            <div class="item-img">
                                <img src="{{ asset('web/img/icons/finish-line.png') }}" class="mt-0" alt="icon">
                            </div>
                            <div class="media-body">
                                <div class="txt-small">
                                    <span style="visibility: hidden;">Step 2</span>
                                </div>
                                <h3>Find Nearby best vibe in Dine in.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="items_serv">
                        <div class="media">
                            <div class="item-img">
                                <img src="{{ asset('web/img/icons/glitter.png') }}" class="mt-0" alt="icon">
                            </div>
                            <div class="media-body">
                                <div class="txt-small">
                                    <span style="visibility: hidden;">Step 3</span>
                                </div>
                                <h3>Make more Precious on your special day.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
    <!-- Start feature_app -->
    <section class="feature_app feature_demo2 margin-t-10 padding-t-10" id="Products">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10 col-lg-6 text-center">
                    <div class="title_sections">
                        <h2>Start your experience with Go Restro.</h2>
                        <p>
                            Explore exclusive restaurant coupons on our app. Uncover delicious deals and enjoy savings with
                            every meal. Download now to start saving!
                        </p>
                        {{-- <div class="z_apps">
                  <a href="#" target="_blank" class="item__app bg_apple mb-3 mb-sm-0">
                     <div class="media">
                        <i class="tio apple icon"></i>
                        <div class="media-body">
                           <div class="txt">
                              <span>Available on the</span>
                              <h4>App Store</h4>
                           </div>
                        </div>
                     </div>
                  </a>
                  <a href="#" target="_blank" class="item__app bg_google">
                     <div class="media">
                        <img class="icon" src="{{asset('web/img/icons/google-play.svg')}}" />
                        <div class="media-body">
                           <div class="txt">
                              <span>Get it on</span>
                              <h4>Google Play</h4>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> --}}
                    </div>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6 col-lg-4 d-none d-sm-block order-1 order-sm-1">
                    <div class="item_box item_one">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/01.png') }}" alt="image" />
                        </div>
                        <h3>Multigrain Hot Cereal</h3>
                    </div>
                    <div class="item_box item_two">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/02.png') }}" alt="image" />
                        </div>
                        <h3>Branch Special</h3>
                    </div>
                    <div class="item_box item_three">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/03.png') }}" alt="image" />
                        </div>
                        <h3>French Crostini</h3>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 order-3 order-sm-2" data-aos="fade-up" data-aos-delay="0">
                    <div class="app_mobile">
                        <img class="apoo" src="{{ asset('web/img/app/1.png') }}" alt="image" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-none d-sm-block order-2 order-sm-3">
                    <div class="item_box item_four">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/04.png') }}" alt="image" />
                        </div>
                        <h3>Fried Egg Sandwich</h3>
                    </div>
                    <div class="item_box item_five">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/05.png') }}" alt="image" />
                        </div>
                        <h3>Branch Special</h3>
                    </div>
                    <div class="item_box item_six">
                        <div class="img_bbo">
                            <img src="{{ asset('web/img/app/06.png') }}" alt="image" />
                        </div>
                        <h3>Lemon Yogurt Parfait</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End. feature_app -->
    <!-- Start logos 3 -->
    <section class="logos_section logos_demo3 padding-py-5 text-center">
        <div class="container">
            <h3 class="margin-b-4">
                Get Exclusive Restaurant Deals on Our App!
            </h3>
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="items_loog">
                        <div class="item-client mb-3 mb-lg-0">
                            <img width="130" src="{{ asset('web/img/logos/j1.png') }}" alt="logos" />
                        </div>
                        <div class="item-client mb-3 mb-lg-0">
                            <img width="130" src="{{ asset('web/img/logos/w1.png') }}" alt="logos" />
                        </div>
                        <div class="item-client mb-3 mb-lg-0">
                            <img width="130" src="{{ asset('web/img/logos/o1.png') }}" alt="logos" />
                        </div>
                        <div class="item-client mb-3 mb-lg-0">
                            <img width="130" src="{{ asset('web/img/logos/h1.png') }}" alt="logos" />
                        </div>
                        <div class="item-client mb-3 mb-lg-0">
                            <img width="130" src="{{ asset('web/img/logos/n1.png') }}" alt="logos" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="trigger2"></div>
    <!-- Section Service -->
    <section class="serv_app padding-t-10" id="Features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="amo_pic">
                        <img id="animate2" src="{{ asset('web/img/app/2.png') }}" alt="image" />
                    </div>
                </div>
                <div class="col-lg-5 my-auto mx-auto">
                    <div class="title_sections mb-0">
                        <div class="before_title">
                            <span>Save</span>
                            <span class="c-gold">Money</span>
                        </div>
                        <h2>Unlock Savings Galore with Our App's Exclusive Coupons!</h2>
                        <p>
                            Experience unbeatable savings with our app's exclusive coupons. From enticing discounts to
                            irresistible deals, indulge in a world of culinary delights without breaking the bank. Download
                            now and treat yourself to delicious meals at incredible prices!
                        </p>
                        <a href="#"
                            class="btn btn_lg_primary effect-letter try_it bg-primary text-light rounded-8">Try it free</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End. serv_app -->
    <div id="trigger3"></div>
    <!-- Section Service -->
    <section class="serv_app padding-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 my-auto order-2 order-lg-1">
                    <div class="title_sections mb-0">
                        <div class="before_title">
                            <span>Google</span>
                            <span class="c-gold">Map</span>
                        </div>
                        <h2>Dine In to local favorites near you.</h2>
                        <p>
                            Whatever you want, we get it. Order delivery for yourself
                            or with friends and watch in real-time as your Postmate
                            brings you all the things you love.
                        </p>
                        <div class="app_smartphone margin-t-4">
                            <div class="btn--app mb-3 d-block">
                                <a class="media" href="#" target="_blank">
                                    <div class="icon dark">
                                        <i class="tio apple"></i>
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
                                        <h4 class="c-dark">App Store</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto mb-4 mb-lg-0 order-1 order-lg-1">
                    <div class="amo_pic">
                        <img id="animate3" src="{{ asset('web/img/app/3.png') }}" alt="image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End. serv_app -->
    <!-- Start FAQ -->
    <section class="faq_demo2 faq_demo4 padding-t-10 margin-t-10" id="FAQ">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="title_sections">
                        <div class="before_title">
                            <span>Frequently Asked</span>
                            <span class="c-gold">Questions</span>
                        </div>
                        <h2>Want to ask something <br />from us?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-10 col-lg-5 pr-lg-5">
                    @foreach ($Faqs as $key => $Faq)
                        <div class="item_list">
                            <h4>
                                <span class="hline"></span>{{ $Faq->question }}
                            </h4>
                            {!! $Faq->answer !!}
                        </div>
                        @if(floor($Faqs->count() / 2) == $key)
                            </div>
                            <div class="col-md-10 col-lg-5">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->
    <!-- Start Statistic -->
    <section class="padding-t-12 section_state state_demo2" id="Statistic">
        <!-- particle background -->
        <div id="particles-js"></div>
        <div class="container">
            <div id="triggerBlur"></div>
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="title_sections">
                        <div class="before_title">
                            <span>Clients</span>
                            <span class="c-gold">Trust</span>
                        </div>
                        <h2>Trust us and feel free to try our service</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bb_qgency_state">
                        <div class="number_state">
                            <div class="txt">
                                3 320
                            </div>
                        </div>
                        <!-- <div class="blur_item"></div> -->
                        <div class="content_state">
                            <div class="row justify-content-md-center">
                                <div class="col-md-2">
                                    <div class="it__em">
                                        <div class="icon">
                                            <img src="{{ asset('web/img/icons/1f469.png') }}" alt="icons" />
                                        </div>
                                        <div class="info_txt">
                                            <h4>2000</h4>
                                            <p>
                                                Users
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="it__em">
                                        <div class="icon">
                                            <img src="{{ asset('web/img/icons/2665.png') }}" alt="icons" />
                                        </div>
                                        <div class="info_txt">
                                            <h4>1000</h4>
                                            <p>
                                                Restaurant
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="it__em">
                                        <div class="icon">
                                            <img src="{{ asset('web/img/icons/1f647-2640.png') }}" alt="icons" />
                                        </div>
                                        <div class="info_txt">
                                            <h4>320</h4>
                                            <p>
                                                Affiliates
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="users_profile">
                            <img src="{{ asset('web/img/persons/02.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/03.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/05.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/15.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/08.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/06.png') }}" alt="image-icons" />
                            <img src="{{ asset('web/img/persons/01.png') }}" alt="image-icons" />
                        </div>
                        <div class="link_state">
                            <a href="#"
                                class="btn btn_xl_primary effect-letter try_it bg-primary text-light rounded-8">Join
                                Affiliate</a>
                            <a href="{{ route('contact-us') }}" class="btn btn_xl_primary btn_touch rounded-8">
                                <img src="{{ asset('web/img/icons/1f607.png') }}" alt="icon" />Get a touch</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
