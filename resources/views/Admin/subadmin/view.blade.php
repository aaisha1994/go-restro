@extends('Admin.layouts.master')
@section('title', 'Sub Admin Details')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">View Member Permissions</h4>
                        <div class="">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{ route('admin.subadmin.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="name">User Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $Admin->name }}" readonly>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="email-address">Email Address *</label>
                                    <input type="email" class="form-control" id="email-address" name="email" value="{{ $Admin->email }}" readonly>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input type="number" class="form-control" id="phone" name="mobile" value="{{ $Admin->mobile }}" readonly pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="role">Role Name *</label>
                                    <input type="text" name="role" value="{{ $Admin->role }}" readonly id="role" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Permissions -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4">Permissions</h5>
                            <div class=" ">
                                <table class="table table border">
                                    <!-- Start Users Onboarding -->
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="users_onboarding" value="Users Onboarding" @if(in_array('Users Onboarding',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="users_onboarding">Users Onboarding</label>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="users" value="Users" @if(in_array('Users',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="users">Users</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliates" value="Affiliates" @if(in_array('Affiliates',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="affiliates">Affiliates</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restros" value="Restros" @if(in_array('Restros',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="restros">Restros</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="subadmin" value="Sub Admin" @if(in_array('Sub Admin',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="subadmin">Sub Admin</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Subscription -->
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="subscription" value="Subscription" @if(in_array('Subscription',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="subscription">Subscription</label>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="users_subscription" value="Users Subscription" @if(in_array('Users Subscription',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="users_subscription">Users Subscription</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restro_subscription" value="Restro Subscription" @if(in_array('Restro Subscription',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="restro_subscription">Restro Subscription</label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="user_passport_history" value="User Passport History" @if(in_array('User Passport History',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="user_passport_history">User Passport History</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Masters-->
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="masters" value="Masters" @if(in_array('Masters',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="masters">Masters</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="advertisement" value="Advertisement" @if(in_array('Advertisement',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="advertisement">Advertisement</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="category" value="Category" @if(in_array('Category',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="category">Category</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="promotion" value="Promotion" @if(in_array('Promotion',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="promotion">Promotion</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="notification" value="Notification" @if(in_array('Notification',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="notification">Notification</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="facility" value="Facility" @if(in_array('Facility',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="facility">Facility</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="complementary" value="Complementary" @if(in_array('Complementary',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="complementary">Complementary</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="Deal Of The Day" value="Deal Of The Day" @if(in_array('Deal Of The Day',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="Deal Of The Day">Deal Of The Day</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliate_commission" value="Affiliate Commission" @if(in_array('Affiliate Commission',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="affiliate_commission">Affiliate Commission</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="refer_earn" value="Refer & Earn" @if(in_array('Refer & Earn',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="refer_earn">Refer & Earn</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start CMS -->
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="cms" value="CMS" @if(in_array('CMS',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="cms">CMS</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="terms_condition" value="Terms Condition" @if(in_array('Terms Condition',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="terms_condition">Terms Condition</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="privacy_policy" value="Privacy Policy" @if(in_array('Privacy Policy',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="privacy_policy">Privacy Policy</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="refund_policy" value="Refund Policy" @if(in_array('Refund Policy',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="refund_policy">Refund Policy</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="faqs" value="FAQs" @if(in_array('FAQs',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="faqs">FAQs</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Restro Coupon Offer -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restro_coupon_offer" value="Restro Coupon Offer" @if(in_array('Restro Coupon Offer',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="restro_coupon_offer">Restro Coupon Offer</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Approve & Reject Post -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="approve_reject" value="Approve & Reject Post" @if(in_array('Approve & Reject Post',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="approve_reject">Approve & Reject Post</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start QR Management -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="qr_management" value="QR Management" @if(in_array('QR Management',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="qr_management">QR Management</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Affiliate Payment -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliate_payment" value="Affiliate Payment" @if(in_array('Affiliate Payment',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="affiliate_payment">Affiliate Payment</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Dynamic Discount -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="dynamic_discount" value="Dynamic Discount" @if(in_array('Dynamic Discount',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="dynamic_discount">Dynamic Discount</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Reports -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="reports" value="Reports" @if(in_array('Reports',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="reports">Reports</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Start Customer Support -->
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-check">
                                                <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="customer_support" value="Customer Support" @if(in_array('Customer Support',$Admin->role_details)) checked="checked" @endif @disabled(true)>
                                                <label class="form-check-label" for="customer_support">Customer Support</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- End -->
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Permissions -->
                </div>
            </div>
        </div>
    </div>
@endsection
