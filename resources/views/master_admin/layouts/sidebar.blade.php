<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-4-line"></i>
                        <span>Users Onboarding</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li><a href="{{ route('admin.restro.index') }}">Restros</a></li>
                        <li><a href="{{ route('affiliate-list') }}">Affiliates</a></li>
                        <li><a href="{{ route('subadmin-list') }}">Sub Admin</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('restro-offer-list')}}" class="waves-effect">
                        <i class="ri-coupon-2-line"></i>
                        <span>Restro Coupon Offer</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('approve-reject-post')}}" class="waves-effect">
                        <i class="ri-store-2-line"></i>
                        <span>Approve & Reject Restro</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('qr-management')}}" class="waves-effect">
                        <i class=" ri-qr-code-line"></i>
                        <span>QR Management</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('leader-board')}}" class="waves-effect">
                        <i class="ri-artboard-2-line"></i>
                        <span>Leader Board</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('utm-campaign')}}" class="waves-effect">
                        <i class="ri-link"></i>
                        <span>UTM Campaign</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-list-3-line"></i>
                        <span>Subscription</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('subscription')}}">Subscription</a></li>
                        <li><a href="{{route('user-passport-history')}}">User Passport History</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-secure-payment-fill"></i>
                        <span>Payment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- <li><a href="{{route('subscription-payment')}}">Subscription Payment</a></li> -->
                        <li><a href="{{route('affiliate-payment')}}">Affiliate Payment</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('dynamic-discount')}}" class="waves-effect">
                        <i class="ri-donut-chart-fill"></i>
                        <span>Dynamic Discount</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('reports')}}" class="waves-effect">
                        <i class="ri-bar-chart-grouped-line"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('customer-support')}}" class="waves-effect">
                        <i class="ri-customer-service-2-line"></i>
                        <span>Customer Support</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mastercard-line"></i>
                        <span>Masters</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('advertisement-master')}}">Advertisement Master</a></li>
                        <li><a href="{{route('category-master')}}">Category Master</a></li>
                        <li><a href="{{route('promotion-master')}}">Promotion Master</a></li>
                        <li><a href="{{route('notification-master')}}">Notification Master</a></li>
                        <li><a href="{{route('facilities-master')}}">Facilities Master</a></li>
                        <li><a href="{{route('complementary-master')}}">Complementary Master</a></li>
                        <li><a href="{{route('dealoftheday-master')}}">Deal Of the Day Master</a></li>
                        <li><a href="{{route('referandearn-master')}}">Refer and Earn Master</a></li>
                        <li><a href="{{route('affiliate-commission')}}">Affiliate Commission</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-hashtag"></i>
                        <span>CMS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('terms-condition')}}">Terms & Condition</a></li>
                        <li><a href="{{route('refund-policy')}}">Refund Policy</a></li>
                        <li><a href="{{route('faqs-list')}}">FAQs</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
