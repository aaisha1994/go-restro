<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Onboarding', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-4-line"></i>
                        <span>Users Onboarding</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.user.index')}}">Users</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.restro.index')}}">Restros</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.affiliate.index')}}">Affiliates</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Sub Admin', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.subadmin.index')}}">Sub Admin</a></li>@endif
                    </ul>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Coupon Offer', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.coupon.index')}}" class="waves-effect">
                        <i class="ri-coupon-2-line"></i>
                        <span>Restro Coupon Offer</span>
                    </a>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Approve & Reject Post', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.approve.index') }}" class="waves-effect">
                        <i class="ri-store-2-line"></i>
                        <span>Approve & Reject Restro</span>
                    </a>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('QR Management', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.qr.index') }}" class="waves-effect">
                        <i class=" ri-qr-code-line"></i>
                        <span>QR Management</span>
                    </a>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Leader Board', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.leaderboard.index') }}" class="waves-effect">
                        <i class="ri-artboard-2-line"></i>
                        <span>Leader Board</span>
                    </a>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('UTM Campaign', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.utmcampaign.index') }}" class="waves-effect">
                        <i class="ri-link"></i>
                        <span>UTM Campaign</span>
                    </a>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Leader Board', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-list-3-line"></i>
                        <span>Subscription</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Subscription', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.subscription.index') }}">Subscription</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Subscription', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.restrosubscription.index') }}">Restro Subscription</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('User Passport History', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.userpassport.passporthistory') }}">User Passport History</a></li>@endif
                    </ul>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliate Payment', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-secure-payment-fill"></i>
                        <span>Payment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.affiliate.payment')}}">Affiliate Payment</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Dynamic Discount', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.discount.index')}}" class="waves-effect">
                        <i class="ri-donut-chart-fill"></i>
                        <span>Dynamic Discount</span>
                    </a>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Reports', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.reports.index') }}" class="waves-effect">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span>Reports</span>
                    </a>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Customer Support', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="{{ route('admin.support.index')}}" class="waves-effect">
                        <i class="ri-customer-service-2-line"></i>
                        <span>Customer Support</span>
                    </a>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Masters', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mastercard-line"></i>
                        <span>Masters</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Advertisement', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.advertisement.index') }}">Advertisement Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Category', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.category.index') }}">Category Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Promotion', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.promotion.index') }}">Promotion Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Notification', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.notification.index') }}">Notification Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Facility', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.facility.index') }}">Facilities Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Complementary', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.complementary.index') }}">Complementary Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Deal Of The Day', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.dealday.index') }}">Deal Of the Day Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Refer & Earn', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.refer.index') }}">Refer and Earn Master</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliate Commission', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.commission.index') }}">Affiliate Commission</a></li>@endif
                    </ul>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('CMS', Auth::guard('admin')->user()->role_details))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-hashtag"></i>
                        <span>CMS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Terms Condition', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.cms.terms.index') }}">Terms & Condition</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Privacy Policy', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.cms.privacy.index') }}">Privacy Policy</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Refund Policy', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.cms.refund.index') }}">Refund Policy</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('FAQs', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.faq.index') }}">FAQs</a></li>@endif
                        @if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Contact Us', Auth::guard('admin')->user()->role_details))<li><a href="{{ route('admin.cms.contact.index') }}">Contact Us</a></li>@endif
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{ route('admin.inquiry.index') }}" class="waves-effect">
                        <i class="ri-link"></i>
                        <span>Inquiry</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
