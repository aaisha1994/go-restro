@extends('web.layouts.master')
@section('title', 'Privacy Policy')
@section('content')
    <section class="pt_banner_inner banner_px_image"
        style="background-image: url({{ asset('web/img/inner/bg-contact.png') }});     background-size: cover;">
        <div class="parallax_cover">
            <!-- <img class=" " src="{{ asset('web/img/inner/bg-contact.png') }}" alt="image"> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="banner_title_inner">
                        <h1 data-aos="fade-up" data-aos-delay="0">Privacy Policy</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Go Restro</p>
                        <div data-aos="fade-up" data-aos-delay="200" id="contact">
                            <a href="#contact" class="btn btn_sm_primary bg-blue c-white rounded-8">Let's talk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_contact_five contact_six margin-t-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{ $Restro->title }}</h1>
                    {!! $Restro->description !!}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
