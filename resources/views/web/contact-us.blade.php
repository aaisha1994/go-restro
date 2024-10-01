@extends('web.layouts.master')
@section('title', 'Contact Us')
@section('css')
    <style>
        .error:before{
            content: none !important;
        }
    </style>
@endsection
@section('content')

    <!-- Start banner_about -->
    <section class="pt_banner_inner banner_px_image"
        style="background-image: url({{ asset('web/img/inner/bg-contact.png') }});     background-size: cover;">
        <div class="parallax_cover">
            <!-- <img class="cover-parallax" src="{{ asset('web/img/inner/bg-contact.png') }}" alt="image"> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="banner_title_inner">
                        <h1 data-aos="fade-up" data-aos-delay="0">Contact us</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Go Restro</p>
                        <div data-aos="fade-up" data-aos-delay="200" id="contact">
                            <a href="#contact" class="btn btn_sm_primary bg-blue c-white rounded-8">Let's talk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_contact_five contact_six margin-t-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="title_sections_inner">
                        <h2>Get in touch</h2>
                    </div>
                    <div class="information_agency d-md-flex">
                        <div class="item_data mr-5">
                            <p>Work Inquiries</p>
                            <a class="tel" href="tel:+91 8799599912">+91 8799599912</a>
                        </div>
                        <div class="item_data">
                            <p>Work Inquiries</p>
                            <a class="tel" href="mailto:gorestro.gr@gmail.com">gorestro.gr@gmail.com</a>
                        </div>
                    </div>
                    <h3 class="font-s-16 font-w-500 c-gray margin-t-4">HQ</h3>
                    <p class="font-s-16">3048 : Swaroop 6 B , Sector 4 ATPL , Behind - Trimandir , adalaj , Ahmedabad ,
                        Gujarat-382421.</p>

                    <div class="scoail__media">
                        <a href="#">
                            <i class="tio facebook"></i>
                        </a>
                        <a href="#">
                            <i class="tio instagram"></i>
                        </a>
                        <a href="#">
                            <i class="tio linkedin"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=918799599912&text=Hello">
                            <i class="tio whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 ml-auto">
                    <div class="form_cc_four">
                        <form action="{{ route('inquiry') }}" method="POST" class="row" id="form">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="ex. John Doe">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ex. john@mail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="numbar" class="form-control" name="mobile" id="mobile" placeholder="+91 123456789">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Subject</label>
                                    <select class="form-control custom-select" name="subject" id="subject">
                                        <option value="">Please Select</option>
                                        <option value="Purchase">Purchase</option>
                                        <option value="Support">Support</option>
                                        <option value="Technique">Technique</option>
                                        <option value="Service Request">Service Request</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="4" name="message" id="message" placeholder="message."></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-right margin-t-2">
                                <button type="submit" class="btn btn_md_primary bg-blue rounded-8 c-white h-fit-content">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

{{-- <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    window.addEventListener('load', function() {
        $("#form").validate({
            rules: {
                name: { required: true },
                email: { required: true },
                mobile: { required: true },
                subject: { required: true },
                message: { required: true },
            },
            messages: {
                name: { required: "Full Name is required" },
                email: { required: "Email is required" },
                mobile: { required: "Contact No is required" },
                subject: { required: "Subject is required" },
                message: { required: "Message is required" },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                // $('#form').reset();
                $.ajax({
                    type: "post",
                    url: "{{ route('inquiry') }}",
                    dataType: "json",
                    data : $('#form').serialize(),
                    success: function(response) {
                        if (response.status) {
                            toastCall("success", response.message);
                        } else {
                            toastCall("error", response.message);
                        }
                        $('#name').val('');
                        $('#email').val('');
                        $('#mobile').val('');
                        $('#subject').val('');
                        $('#message').val('');
                    },
                });
            }
        });
    });
</script>
@endsection
