@extends('web.layouts.master')
@section('title', 'Pricing')
@section('content')

<section class="pt_banner_inner banner_px_image">
  <div class="parallax_cover">
    <img class="cover-parallax" src="{{asset('web/img/inner/bg-contact.png')}}" alt="image">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-6">
        <div class="banner_title_inner">
          <h1 data-aos="fade-up" data-aos-delay="0">Pricing </h1>
          <p data-aos="fade-up" data-aos-delay="100">Drop by for a cup of coffe</p>
          <div data-aos="fade-up" data-aos-delay="200" id="contact">
            <a href="#contact" class="btn btn_sm_primary bg-blue c-white rounded-8">Let's talk!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pricing_section margin-t-5 padding-b-7 margin-b-7">
	<div class="container">
		<div class="row justify-content-md-center">
		  <div class="col-md-8 col-lg-6 text-center">
		    <div class="title_sections_inner margin-b-5">
		      <div class="toggle_switch margin-t-4">
		        <label class="toggler toggler--is-active" id="filt-monthly">Monthly</label>
		        <div class="toggle">
		          <input type="checkbox" id="switcher" class="check" />
		          <b class="b switch"></b>
		        </div>
		        <div class="d-inline-block yearly">
		          <label class="toggler" id="filt-yearly">Yearly</label>
		          <span class="offer rounded-pill">Save 20%</span>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="blocks_pricing" id="monthly">
		  <div class="row justify-content-center">
		    <div class="col-md-6 col-lg-8">
		      	<div class="h-100 d-flex">
		      		<img src="{{asset('web/img/app/app.png')}}" class="img-fluid mr-5" width="45%">
		      		<img src="{{asset('web/img/app/s10-ss03.png')}}" class="img-fluid" width="45%">
		      	</div>
		    </div>
		    <div class="col-md-6 col-lg-4">
		      <div class="item__price">
		        <h4 class="name_p">Enterprise</h4>
		        <div class="number">
		          <span class="n_price">129</span>
		          <span class="coins">$</span>
		          <span class="d-block per">Per User/Month Billed Annually</span>
		        </div>
		        <p class="info_price">
		          For businesses looking for deep customization and
		          advanced reports
		        </p>
		        <div class="feature_price">
		          <ul class="list-group">
		            <li class="list-group-item">
		              <i class="tio checkmark_circle_outlined"></i>Custom Permissions</li>
		            <li class="list-group-item">
		              <i class="tio checkmark_circle_outlined"></i>Required Fields</li>
		            <li class="list-group-item">
		              <i class="tio checkmark_circle_outlined"></i>Full API Access</li>
		            <li class="list-group-item">
		              <i class="tio checkmark_circle_outlined"></i>API/Formulas Support*</li>
		            <li class="list-group-item">
		              <i class="tio checkmark_circle_outlined"></i>Custom Reports*</li>
		          </ul>
		          <button type="button" class="btn scale effect-letter rounded-pill btn_md_primary c-white bg-orange-red">Contact With Us</button>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	</section>
@endsection