@extends('Restro.layouts.master')
@section('title', 'Profile Details')
@section('toolbar', 'Profile Details')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <a href="{{ route('restro.profile.edit') }}" class="btn btn-primary align-self-center">Edit Profile</a>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Restaurant Name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Contact Person Name</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $Restro->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted"> Mobile Number <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 text-gray-800 me-2">+91 {{ $Restaurant->mobile }}</span>
                            {{-- <span class="badge badge-success">Verified</span> --}}
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Alt Mobile Number</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 text-gray-800 me-2">+91 {{ $Restaurant->mobile2 }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <div class="col-lg-8">
                            <a href="#" class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $Restro->email }}</a>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Meal Preference</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->meal_preference }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Approx Price Person</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->price_per_person }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Address</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->address }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Food Category</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ implode(', ', $Category) }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Restaurant Image</label>
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($Images as $image)
                                    @if($image->image_type == 1)
                                        <div class="col border border-dashed border-2 text-center p-3">
                                            <img src="{{ $image->image_path }}" alt="image" width="70">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Restaurant Menu</label>
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($Images as $image)
                                    @if($image->image_type == 2)
                                        <div class="col border border-dashed border-2 text-center p-3">
                                            <img src="{{ $image->image_path }}" alt="image" width="70">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Facilities</label>
                        <div class="col-lg-8">
                            @foreach ($Facility as $fa)
                                <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">{{ $fa }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Must Try</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->must_try }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">Area</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $Restaurant->establishment_type }}</span>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 fw-bold text-muted">Open Time</label>
                        <div class="col-lg-8 fv-row">
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Sunday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Sunday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Sunday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Monday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Monday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Monday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Tuesday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Tuesday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Tuesday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Wednesday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Wednesday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Wednesday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Thursday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Thursday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Thursday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Friday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Friday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Friday"]["to_time"])) }}</span>
                            </div>
                            <div class="d-flex" style="justify-content: space-between">
                                <span class="fw-bolder fs-6 text-gray-800">Saturday</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Saturday"]["from_time"])) }}</span>
                                <span class="fw-bolder fs-6 text-gray-800">{{ date('h:i A', strtotime($Restaurant->open_time["Saturday"]["to_time"])) }}</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection
