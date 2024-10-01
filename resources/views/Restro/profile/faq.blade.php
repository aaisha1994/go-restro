@extends('Restro.layouts.master')
@section('title', 'FAQ’s')
@section('toolbar', 'FAQ’s')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">FAQ’s</h3>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <div class="mb-15">
                        <!--begin::Section-->
                        @foreach ($FAQs as $key => $FAQ)
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle @if($key != 0) collapsed @endif mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_9_{{ $key }}">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $FAQ->question }}</h4>
                                </div>
                                <div id="kt_job_9_{{ $key }}" class="collapse @if($key == 0) show @endif fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">{!! $FAQ->answer !!}</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
