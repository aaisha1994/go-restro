<!DOCTYPE html>
<html lang="en">
	<head>
      <title>GoRestro | Restaurant Forgot Password</title>
      <meta charset="utf-8" />
      <meta name="description" content=""/>
      <meta name="keywords" content=" "/>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="shortcut icon" href="{{asset('restaurant/media/logos/favicon.ico')}}"/>
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <!--begin::Global Stylesheets Bundle(used by all pages)-->
      <link href="{{asset('restaurant/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('restaurant/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
      <!--end::Global Stylesheets Bundle-->
   </head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('restaurant/media/illustrations/dozzy-1/14.png') }})">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="javascript:void(0)" class="mb-8">
						<img alt="Logo" src="{{asset('restaurant/media/logos/logo.png')}}" class="h-90px" />
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Forgot Password ?</h1>
								<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<a href="{{Route('sign-in')}}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
							</div>
						</form>
					</div>
				</div>
				<div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
						<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "restaurant/";</script>
		<script src="{{asset('restaurant/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('restaurant/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('restaurant/js/custom/authentication/password-reset/password-reset.js')}}"></script>
	</body>
</html>
