@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Affiliate</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('affiliate-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="name">First Name *</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="name">Last Name *</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="email-address">Email Address *</label>
                                    <input type="email" class="form-control" id="email-address" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="type-of-affiliate" class="form-label">Type of Affiliate *</label>
                                    <select class="form-select" id="type-of-affiliate" title="Type of Affiliate" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Social Influencers</option>
                                        <option>On Wheels</option>
                                        <option>Marketing Agencies</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="form-label" class="form-label">State *</label>
                                    <select class="form-select" title="State" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="billing-city">City *</label>
                                    <input type="text" class="form-control" id="billing-city" required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="zip-code">Zip / Postal code *</label>
                                    <input type="number" class="form-control" id="zip-code" pattern="[0-9]*" inputmode="numeric" required>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-3 mb-2">
                                    <div id="vehicle-number">
                                        <label class="form-label">Vehicle Number *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div id="agency-name">
                                        <label class="form-label">Agency Name *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="affiliate-commission">
                                <h3 class="mb-4 mt-4">Affiliate Commission </h3>
                                <div class="row">
                                    <div class="col-md-3 mb-4 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="formRadios" id="amount" checked="">
                                            <label class="form-check-label" for="amount">Amount</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formRadios" id="percentage">
                                            <label class="form-check-label" for="percentage">Percentage ( % )</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <input type="text" class="form-control" placeholder="Amount & Percentage"  required>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <input type="text" class="form-control" placeholder="GST No.."  required>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <select class="form-select" title="Commission" required>
                                            <option selected="" disabled="" value="">Choose Commission...</option>
                                            <option>One Time</option>
                                            <option>Multiple Times</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mb-4">Banking Details</h3>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="bank_name">Bank name *</label>
                                    <input type="text" class="form-control" id="bank_name"  required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="account-holder-name">Account holder Name *</label>
                                    <input type="text" class="form-control" id="account-holder-name"  required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="account-number">Account Number *</label>
                                    <input type="number" class="form-control" id="account-number"  required>
                                </div>
                                 <div class="col-md-3 mb-4">
                                    <label class="form-label" for="re-account-number">Re-account Number *</label>
                                    <input type="number" class="form-control" id="re-account-number"  required>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label" for="ifsc-code">IFSC code *</label>
                                    <input type="text" class="form-control" id="ifsc-code"  required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var typeOfAffiliateDropdown = document.querySelector("#type-of-affiliate");
    var commissionSection = document.querySelector(".affiliate-commission");

    var vehicleNumberInput = document.querySelector("#vehicle-number");
    var agencyNameInput = document.querySelector("#agency-name");

    vehicleNumberInput.style.display = "none";
    agencyNameInput.style.display = "none";
    commissionSection.style.display = "none"; // Hide commission section by default

    typeOfAffiliateDropdown.addEventListener("change", function () {
        var selectedOption = typeOfAffiliateDropdown.value;

        vehicleNumberInput.style.display = "none";
        agencyNameInput.style.display = "none";

        if (selectedOption === "On Wheels") {
            vehicleNumberInput.style.display = "block";
            commissionSection.style.display = "none"; // Hide commission section
        } else if (selectedOption === "Marketing Agencies") {
            agencyNameInput.style.display = "block";
            commissionSection.style.display = "block"; // Show commission section
        }
    });
});
</script>

@endsection
