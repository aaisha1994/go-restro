@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
	Account Overview
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<div class="content flex-row-fluid" id="kt_content">
		<!-- Profile -->
		 @include('restaurant_admin.account.profile')
		<!-- end:: profile -->
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<div class="card-header cursor-pointer">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Profile Details</h3>
				</div>
				<a href="{{ route('account-settings') }}" class="btn btn-primary align-self-center">Edit Profile</a>
			</div>
			<div class="card-body p-9">
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Restaurant Name</label>
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">Avadh Restaurant</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Contact Person Name</label>
					<div class="col-lg-8 fv-row">
						<span class="fw-bold text-gray-800 fs-6">Rajkumar</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted"> Mobile Number
					<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
					<div class="col-lg-8 d-flex align-items-center">
						<span class="fw-bolder fs-6 text-gray-800 me-2">+91 3276 454 935</span>
						<span class="badge badge-success">Verified</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Alt Mobile Number</label>
					<div class="col-lg-8 d-flex align-items-center">
						<span class="fw-bolder fs-6 text-gray-800 me-2">+91 5623 454 935</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Email</label>
					<div class="col-lg-8">
						<a href="#" class="fw-bold fs-6 text-gray-800 text-hover-primary">gorestro@gmail.com</a>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Meal Preference</label>
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">Veg, Non Veg, Vegan</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Approx Price Person</label>
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">&#8377;99 To &#8377;9999</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Address</label>
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">1001, 10th Floor, Luxuria Business Hub, Surat - Dumas Rd, Piplod, Surat, Gujarat 395007</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Food Category</label>
					<div class="col-lg-8">
						<span class="fw-bold fs-6 text-gray-800">Fruit and vegetables, Dairy, Protein</span>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Restaurant Image</label>
					<div class="col-lg-8">
						<div class="row">
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Restaurant Menu</label>
					<div class="col-lg-8">
						<div class="row">
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
							<div class="col border border-dashed border-2 text-center p-3">
								<img src="{{asset('restaurant/media/avatars/logo.png')}}" alt="image" width="70">
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-7">
					<label class="col-lg-4 fw-bold text-muted">Facilities</label>
					<div class="col-lg-8">
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Private Dining Rooms</span>
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Wi-Fi Access</span>
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Outdoor Dining Area</span>
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Valet Parking</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Container-->
@endsection
