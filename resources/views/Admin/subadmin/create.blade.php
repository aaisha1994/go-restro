@extends('Admin.layouts.master')
@section('title', 'Sub Admin Create')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('admin.subadmin.store') }}" method="post" id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add New Member</h4>
                            <div class="">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.subadmin.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="email-address">Email Address *</label>
                                        <input type="email" class="form-control" id="email-address" name="email">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="phone">Phone *</label>
                                        <input type="number" class="form-control" id="phone" name="mobile" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="role">Role Name *</label>
                                        <input type="text" name="role" id="role" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="name">Password *</label>
                                        <input type="password" name="password" id="pass2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="name">Confirm Password *</label>
                                        <input type="password" name="confirm_password" class="form-control" data-parsley-equalto="#pass2" placeholder="Re-Type Password">
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
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="users_onboarding" value="Users Onboarding">
                                                    <label class="form-check-label" for="users_onboarding">Users Onboarding</label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="users" value="Users">
                                                    <label class="form-check-label" for="users">Users</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliates" value="Affiliates">
                                                    <label class="form-check-label" for="affiliates">Affiliates</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restros" value="Restros">
                                                    <label class="form-check-label" for="restros">Restros</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="subadmin" value="Sub Admin">
                                                    <label class="form-check-label" for="subadmin">Sub Admin</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Subscription -->
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="subscription" value="Subscription">
                                                    <label class="form-check-label" for="subscription">Subscription</label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="users_subscription" value="Users Subscription">
                                                    <label class="form-check-label" for="users_subscription">Users Subscription</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restro_subscription" value="Restro Subscription">
                                                    <label class="form-check-label" for="restro_subscription">Restro Subscription</label>
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="user_passport_history" value="User Passport History">
                                                    <label class="form-check-label" for="user_passport_history">User Passport History</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Masters-->
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="masters" value="Masters">
                                                    <label class="form-check-label" for="masters">Masters</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="advertisement" value="Advertisement">
                                                    <label class="form-check-label" for="advertisement">Advertisement</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="category" value="Category">
                                                    <label class="form-check-label" for="category">Category</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="promotion" value="Promotion">
                                                    <label class="form-check-label" for="promotion">Promotion</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="notification" value="Notification">
                                                    <label class="form-check-label" for="notification">Notification</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="facility" value="Facility">
                                                    <label class="form-check-label" for="facility">Facility</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="complementary" value="Complementary">
                                                    <label class="form-check-label" for="complementary">Complementary</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="Deal Of The Day" value="Deal Of The Day">
                                                    <label class="form-check-label" for="Deal Of The Day">Deal Of The Day</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliate_commission" value="Affiliate Commission">
                                                    <label class="form-check-label" for="affiliate_commission">Affiliate Commission</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="refer_earn" value="Refer & Earn">
                                                    <label class="form-check-label" for="refer_earn">Refer & Earn</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start CMS -->
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="cms" value="CMS">
                                                    <label class="form-check-label" for="cms">CMS</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="terms_condition" value="Terms Condition">
                                                    <label class="form-check-label" for="terms_condition">Terms Condition</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="privacy_policy" value="Privacy Policy">
                                                    <label class="form-check-label" for="privacy_policy">Privacy Policy</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="refund_policy" value="Refund Policy">
                                                    <label class="form-check-label" for="refund_policy">Refund Policy</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="faqs" value="FAQs">
                                                    <label class="form-check-label" for="faqs">FAQs</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini row-checkbox" id="contact_us" value="Contat Us">
                                                    <label class="form-check-label" for="contact_us">Contat Us</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Restro Coupon Offer -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="restro_coupon_offer" value="Restro Coupon Offer">
                                                    <label class="form-check-label" for="restro_coupon_offer">Restro Coupon Offer</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Approve & Reject Post -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="approve_reject" value="Approve & Reject Post">
                                                    <label class="form-check-label" for="approve_reject">Approve & Reject Post</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start QR Management -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="qr_management" value="QR Management">
                                                    <label class="form-check-label" for="qr_management">QR Management</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Affiliate Payment -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="affiliate_payment" value="Affiliate Payment">
                                                    <label class="form-check-label" for="affiliate_payment">Affiliate Payment</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Dynamic Discount -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="dynamic_discount" value="Dynamic Discount">
                                                    <label class="form-check-label" for="dynamic_discount">Dynamic Discount</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Reports -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="reports" value="Reports">
                                                    <label class="form-check-label" for="reports">Reports</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Start Customer Support -->
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="customer_support" value="Customer Support">
                                                    <label class="form-check-label" for="customer_support">Customer Support</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="leader_board" value="Leader Board">
                                                    <label class="form-check-label" for="leader_board">Leader Board</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="UTM_Campaign" value="UTM Campaign">
                                                    <label class="form-check-label" for="UTM_Campaign">UTM Campaign</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="send_gift" value="Send Gift">
                                                    <label class="form-check-label" for="send_gift">Send Gift</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-check">
                                                    <input type="checkbox" name="role_details[]" class="form-check-input input-mini" id="UserSegment" value="User Segment">
                                                    <label class="form-check-label" for="UserSegment">User Segment</label>
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
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                    email: { required: true },
                    mobile: { required: true },
                    role: { required: true },
                    password: { required: true },
                    confirm_password: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
                    email: { required: "Email is required" },
                    mobile: { required: "Mobile is required" },
                    role: { required: "Role Name is required" },
                    password: { required: "Password is required" },
                    confirm_password: { required: "Confirm Password is required" },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var rowCheckboxes = document.querySelectorAll(".row-checkbox");

            rowCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    var row = checkbox.closest("tr");

                    var checkboxesInRow = row.querySelectorAll(
                        "input[type='checkbox']:not(.row-checkbox)");

                    checkboxesInRow.forEach(function(otherCheckbox) {
                        otherCheckbox.checked = checkbox.checked;
                    });
                });
            });
        });
    </script>

@endsection
