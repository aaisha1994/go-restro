@extends('Affiliate.layouts.master')
@section('title', 'Profile')
@section('toolbar', 'Profile')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card mb-5 mb-xl-10">
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x m-8 fs-4">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder active" data-bs-toggle="tab" href="#tab_1">Profile Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab_2">Bank Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab-3">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab-5">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab-6">FAQ’s</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bolder" data-bs-toggle="tab" href="#tab-7">Contact US</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                            <form id="form1" class="form" action="{{ route('affiliate.profileupdate',[1]) }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">First Name</label>
                                            <input type="text" name="first_name" value="{{ $Affiliate->first_name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Last Name</label>
                                            <input type="text" name="last_name" value="{{ $Affiliate->last_name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Email Address</label>
                                            <input type="email" name="email" value="{{ $Affiliate->email }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Phone No</label>
                                            <input type="tel" name="mobile" value="{{ $Affiliate->mobile }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">State </label>
                                            <select class="form-select form-select-solid" name="state_id" id="state_id" data-control="select2" data-placeholder="Select an State">
                                                <option value="">Choose...</option>
                                                @foreach ($State as $co)
                                                    <option value="{{ $co->id }}" @if($Affiliate->state_id == $co->id) @selected(true) @endif>{{ $co->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">City </label>
                                            <input type="name" name="city" value="{{ $Affiliate->city }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Zip / Postal code</label>
                                            <input type="numbar" name="zip_code" value="{{ $Affiliate->zip_code }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    @if($Affiliate->affiliate_type == 1)
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Agency Name</label>
                                            <input type="text" name="agency_name" value="{{ $Affiliate->agency_name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    @endif
                                    @if($Affiliate->affiliate_type == 2)
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Vehicle Number</label>
                                            <input type="text" name="vehicle_number" value="{{ $Affiliate->vehicle_number }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    @endif
                                    @if($Affiliate->affiliate_type == 3)
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">GST No</label>
                                            <input type="text" name="gst_no" value="{{ $Affiliate->gst_no }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab_2" role="tabpanel">
                            <form id="form2" class="form" action="{{ route('affiliate.profileupdate',[2]) }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Bank Name</label>
                                            <input type="text" name="bank_name" value="{{ $Affiliate->bank_name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Account Holder Name</label>
                                            <input type="text" name="holder_name" value="{{ $Affiliate->holder_name }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Account Number</label>
                                            <input type="numbar" id="account_number" name="account_number" value="{{ $Affiliate->account_number }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Re-account Number </label>
                                            <input type="password" name="re_account_number" value="{{ $Affiliate->account_number }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">IFSC code</label>
                                            <input type="text" name="ifsc_code" value="{{ $Affiliate->ifsc_code }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                            <form id="form3" class="form" action="{{ route('affiliate.profileupdate',[3]) }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Current Password</label>
                                            <input type="password" name="old_password" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-5">
                                        <div class="fv-row mb-5">
                                            <label class="required fw-bold fs-6 mb-2">Confirm New Password</label>
                                            <input type="password" name="confirm_password" class="form-control form-control-solid mb-3 mb-lg-0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                        {{-- Support --}}
                        <div class="tab-pane fade" id="tab-5" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-wrap flex-stack mb-6">
                                        <h3 class="fw-bolder my-2">Support</h3>
                                        <div class="d-flex flex-wrap my-2">
                                            <div class="me-4 border border-1">
                                                <select name="status" data-control="select2" data-hide-search="true" class="status form-select form-select-sm bg-body border-body w-125px">
                                                    <option value="0" selected="selected">Open</option>
                                                    <option value="1">Close</option>
                                                </select>
                                            </div>
                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ticket_create">Add Ticket</a>
                                        </div>
                                    </div>
                                    <div class="row g-6 g-xl-9">
                                        @foreach ($Supports as $Support)
                                            <div class="col-md-6 col-xl-4 shadow-sm rounded @if($Support->status == 0) s0 @else s1 @endif" @if($Support->status == 1) style="display:none" @endif">
                                                <a href="javascript:void(0)" class="card border-hover-primary edit" data-id="{{ $Support->id }}" data-bs-toggle="modal" data-bs-target="#ticket_detail">
                                                    <div class="card-header border-0 pt-9">
                                                        <div class="card-title m-0">
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="">{{ $Support->subject }}</div>
                                                        </div>
                                                        <div class="card-toolbar">
                                                            <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">Ticket No : {{ $Support->id }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="fs-6 fw-bolder text-dark">Description</div>
                                                        <p class="text-dark fw-bold fs-6 mt-1 mb-3">{{ $Support->message }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="m-0">{{ date('d M Y', strtotime($Support->created_at)) }}</p>
                                                            <p class="m-0 badge {{ $Support->status == 0 ? 'badge-light-primary' : 'badge-light-success' }}  fw-bolder px-4 py-2">Status: {{ $Support->status == 0 ? 'Pending' : 'Close' }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ -->
                        <div class="tab-pane fade" id="tab-6" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-15">
                                       @foreach ($FAQs as $key => $FAQ)
                                            <div class="m-0">
                                                <div class="d-flex align-items-center collapsible py-3 toggle @if($key != 0) collapsed @endif mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_91_{{ $key }}">
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
                                                <div id="kt_job_91_{{ $key }}" class="collapse @if($key == 0) show @endif fs-6 ms-1">
                                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">{!! $FAQ->answer !!}</div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                            </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Us -->
                        <div class="tab-pane fade" id="tab-7" role="tabpanel">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-15">
                                        <div class="row g-5 mb-5 mb-lg-15">
                                            <h2 class="text-center fs-1 text-primary">Get in Touch</h2>
                                            <div class="col-sm-4 ps-lg-10">
                                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                                    <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M25.6313 21.385C25.6313 21.805 25.538 22.2366 25.3397 22.6566C25.1413 23.0766 24.8847 23.4733 24.5463 23.8466C23.9747 24.4766 23.3447 24.9316 22.633 25.2233C21.933 25.515 21.1747 25.6666 20.358 25.6666C19.168 25.6666 17.8963 25.3866 16.5547 24.815C15.213 24.2433 13.8713 23.4733 12.5413 22.505C11.1997 21.525 9.92801 20.44 8.71467 19.2383C7.51301 18.025 6.42801 16.7533 5.45967 15.4233C4.50301 14.0933 3.73301 12.7633 3.17301 11.445C2.61301 10.115 2.33301 8.84331 2.33301 7.62998C2.33301 6.83665 2.47301 6.07831 2.75301 5.37831C3.03301 4.66665 3.47634 4.01331 4.09467 3.42998C4.84134 2.69498 5.65801 2.33331 6.52134 2.33331C6.84801 2.33331 7.17467 2.40331 7.46634 2.54331C7.76967 2.68331 8.03801 2.89331 8.24801 3.19665L10.9547 7.01165C11.1647 7.30331 11.3163 7.57165 11.4213 7.82831C11.5263 8.07331 11.5847 8.31831 11.5847 8.53998C11.5847 8.81998 11.503 9.09998 11.3397 9.36831C11.188 9.63665 10.9663 9.91665 10.6863 10.1966L9.79967 11.1183C9.67134 11.2466 9.61301 11.3983 9.61301 11.585C9.61301 11.6783 9.62467 11.76 9.64801 11.8533C9.68301 11.9466 9.71801 12.0166 9.74134 12.0866C9.95134 12.4716 10.313 12.9733 10.8263 13.58C11.3513 14.1866 11.9113 14.805 12.518 15.4233C13.148 16.0416 13.7547 16.6133 14.373 17.1383C14.9797 17.6516 15.4813 18.0016 15.878 18.2116C15.9363 18.235 16.0063 18.27 16.088 18.305C16.1813 18.34 16.2747 18.3516 16.3797 18.3516C16.578 18.3516 16.7297 18.2816 16.858 18.1533L17.7447 17.2783C18.0363 16.9866 18.3163 16.765 18.5847 16.625C18.853 16.4616 19.1213 16.38 19.413 16.38C19.6347 16.38 19.868 16.4266 20.1247 16.5316C20.3813 16.6366 20.6497 16.7883 20.9413 16.9866L24.803 19.7283C25.1063 19.9383 25.3163 20.1833 25.4447 20.475C25.5613 20.7666 25.6313 21.0583 25.6313 21.385Z" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10" />
                                                        </svg>
                                                    </span>
                                                    <h1 class="text-dark fw-bolder my-5">Our Contact Number</h1>
                                                    <div class="text-gray-700 fs-3 fw-bold">{{ $ContactUs->mobile }}</div>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <div class="col-sm-4 ps-lg-10">
                                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                                    <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19.833 23.9166H8.16634C4.66634 23.9166 2.33301 22.1666 2.33301 18.0833V9.91665C2.33301 5.83331 4.66634 4.08331 8.16634 4.08331H19.833C23.333 4.08331 25.6663 5.83331 25.6663 9.91665V18.0833C25.6663 22.1666 23.333 23.9166 19.833 23.9166Z" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M19.8337 10.5L16.182 13.4167C14.9803 14.3733 13.0087 14.3733 11.807 13.4167L8.16699 10.5" stroke="#ED6D55" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <h1 class="text-dark fw-bolder my-5">Our Email</h1>
                                                    <div class="text-gray-700 fs-3 fw-bold">{{ $ContactUs->email }}</div>
                                                </div>
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-sm-4 ps-lg-10">
                                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                                    <a href="https://maps.google.com/maps?q={{ $ContactUs->latitude }},{{ $ContactUs->longitude }}" target="blank">
                                                        <span class="svg-icon svg-icon-3tx svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
                                                    <div class="text-gray-700 fs-3 fw-bold">{{ $ContactUs->address }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Ticket Create modal-->
    <div class="modal fade" tabindex="-1" id="ticket_create">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('affiliate.supportstore') }}" method="POST" id="form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Ticket</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Subject</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="subject">
                            </div>
                            <div class="col-lg-12 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Description</span>
                                </label>
                                <textarea class="form-control form-control-solid" name="message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Start Ticket Detail Modal -->
    <div class="modal fade" tabindex="-1" id="ticket_detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ticket Details</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="fs-6 fw-bolder text-dark tickettitle">Refund Related</div>
                        <p class="text-dark fw-bold fs-6 mt-1 mb-3 ticketdesc">Need a refund or have subscription concerns? Tap our
                            support screen for swift resolution and exceptional service.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="m-0 ticketcreate">15 Mar 2024</p>
                        </div>
                        <div class="border border-dashed border-2 mt-4 p-5 open">
                            <div class="fs-4 fw-bolder">Reply</div>
                            <div class="fs-6 text-dark">Go Restro Support Team</div>
                            <p class="pt-4 ticketreply">"Thank you for contacting us. We appreciate your patience. Our Financial</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0 ticketupdate">16 Mar 2024</p>
                                <p class="m-0 badge badge-light-primary fw-bolder px-4 py-2">Status: <span class="ticketstatus">Close</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal End -->
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.log(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    first_name: { required: true },
                    last_name: { required: true },
                    email: { required: true },
                    mobile: { required: true },
                    state_id: { required: true },
                    city: { required: true },
                    zip_code: { required: true },
                },
                messages: {
                    first_name: { required: "First Name is required" },
                    last_name: { required: "Last Name is required" },
                    email: { required: "Email is required" },
                    mobile: { required: "Contact No is required" },
                    state_id: { required: "State is required" },
                    cuty: { required: "City is required" },
                    zip_code: { required: "Zip Code is required" },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $("#form2").validate({
                rules: {
                    bank_name: {
                        required: true
                    },
                    ac_holder_name: {
                        required: true
                    },
                    account_number: {
                        required: true
                    },
                    re_account_number: {
                        required: true,
                        equalTo: "#account_number"
                    },
                    ifsc_code: {
                        required: true
                    },
                },
                messages: {
                    bank_name: { required: "Bank Name is required" },
                    holder_name: { required: "Account Holder Name is required" },
                    account_number: { required: "Account Number is required" },
                    re_account_number: {
                        required: "Re-Account Number is required",
                        equalTo : 'Account and Re Account No does not match'
                    },
                    ifsc_code: { required: "IFSC Code is required" },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $("#form3").validate({
                rules: {
                    current_password: { required: true },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    current_password: { required: "Current Password is required" },
                    password: {
                        required: "New Password is required",
                        minlength: 'Password must be at least 8 character and contain symbols'
                    },
                    confirm_password: {
                        required: "Confirm Password is required",
                        equalTo : 'Password and confirm password does not match'
                    },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $(document).on('change', '.status', function(e) {
            let id = $(this).val();
            if(id == 0) {
                $('.s0').show();
                $('.s1').hide();
            } else {
                $('.s0').hide();
                $('.s1').show();
            }
        });
        $(document).on('click', '.edit', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: "get",
                url: "{{ route('restro.profile.supportedit', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let edit_name = response.data.name;
                    $('.tickettitle').html(response.data.subject);
                    $('.ticketdesc').html(response.data.message);
                    $('.ticketcreate').html(moment(response.data.created_at).format('d MMM YYYY'));
                    $('.ticketreply').html(response.data.reply);
                    $('.ticketupdate').html(moment(response.data.updated_at).format('d MMM YYYY'));
                    $('.ticketstatus').html(response.data.status == 1 ? 'Close' : 'Open' );
                    $('.open').css('display', response.data.status == 0 ? 'none' : '' );
                },
            });
        });
    </script>
@endsection
