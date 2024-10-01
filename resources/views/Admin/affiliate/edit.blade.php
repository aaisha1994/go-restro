@extends('Admin.layouts.master')
@section('title', 'Affiliate Update')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.affiliate.update',[$Affiliate->id]) }}" method="POST" id="form">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add New Affiliate</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.affiliate.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="first_name">First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $Affiliate->first_name }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $Affiliate->last_name }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="email">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $Affiliate->email }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="phone">Phone *</label>
                                        <input type="number" class="form-control" id="phone" name="mobile" value="{{ $Affiliate->mobile }}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <label for="type-of-affiliate" class="form-label">Type of Affiliate *</label>
                                        <select class="form-select" id="type-of-affiliate" title="Type of Affiliate" name="affiliate_type" disabled>
                                            <option disabled="" value="">Choose...</option>
                                            <option value="1" @if($Affiliate->affiliate_type == 1) @selected(true) @endif>Social Influencers</option>
                                            <option value="2" @if($Affiliate->affiliate_type == 2) @selected(true) @endif>On Wheels</option>
                                            <option value="3" @if($Affiliate->affiliate_type == 3) @selected(true) @endif>Marketing Agencies</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="form-label" class="form-label">State *</label>
                                        <select class="form-select select2" title="State" name="state_id" id="state_id">
                                            <option value="">Choose...</option>
                                            @foreach ($State as $co)
                                                <option value="{{ $co->id }}" @if($Affiliate->state_id == $co->id) @selected(true) @endif>{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="city">City *</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $Affiliate->city }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="zip-code">Zip / Postal code *</label>
                                        <input type="number" class="form-control" id="zip-code" pattern="[0-9]*" inputmode="numeric" name="zip_code" value="{{ $Affiliate->zip_code }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="address">Address *</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $Affiliate->address }}">
                                    </div>
                                    <div class="col-md-3 mb-2" id="vehicle-number" @if($Affiliate->affiliate_type != 2) style="display: none" @endif>
                                        <label class="form-label" for="vehicle_number">Vehicle Number *</label>
                                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="{{ $Affiliate->vehicle_number }}">
                                    </div>
                                    <div class="col-md-3 mb-2" id="agency-name" @if($Affiliate->affiliate_type != 3) style="display: none" @endif>
                                        <label class="form-label" for="agency_name">Agency Name *</label>
                                        <input type="text" class="form-control" id="agency_name" name="agency_name" value="{{ $Affiliate->agency_name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <h3 class="col-md-12 mb-4 mt-4">Affiliate Commission </h3>
                                    <div class="col-md-3 mb-4 d-flex">
                                        @if($Affiliate->affiliate_type != 3)
                                        <div class="form-check me-3 affiliate-commission1">
                                            <input class="form-check-input" type="radio" name="commission_type" id="amount" value="1" @if($Affiliate->commission_type == 1) @checked(true) @endif>
                                            <label class="form-check-label" for="amount">Download</label>
                                        </div>
                                        @endif
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="commission_type" id="percentage" value="2" @if($Affiliate->commission_type == 2 || $Affiliate->affiliate_type == 3) @checked(true) @endif>
                                            <label class="form-check-label" for="percentage">Purchase </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4 affiliate-commission">
                                        <input type="text" class="form-control" name="amount" id="comm" placeholder="Download & Purchase" value="{{ $Affiliate->amount }}">
                                    </div>
                                    <div class="col-md-3 mb-4 affiliate-commission" @if($Affiliate->affiliate_type != 3) style="display: none" @endif>
                                        <input type="text" class="form-control" placeholder="GST No.." name="gst_no" value="{{ $Affiliate->gst_no }}">
                                    </div>
                                    <div class="col-md-3 mb-4 affiliate-commission" @if($Affiliate->affiliate_type != 3) style="display: none" @endif>
                                        <select class="form-select" title="Commission" name="commission">
                                            <option selected="" disabled="" value="">Choose Commission...</option>
                                            <option value="1" @if($Affiliate->commission == 1) @selected(true) @endif>One Time</option>
                                            <option value="2" @if($Affiliate->commission == 2) @selected(true) @endif>Multiple Times</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3 class="col-sm-12 mb-4">Banking Details</h3>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="bank_name">Bank name *</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $Affiliate->bank_name }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="account-holder-name">Account holder Name *</label>
                                        <input type="text" class="form-control" id="account-holder-name" name="holder_name" value="{{ $Affiliate->holder_name }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="account-number">Account Number *</label>
                                        <input type="number" class="form-control" id="account-number" name="account_number" value="{{ $Affiliate->account_number }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="re-account-number">Re-account Number *</label>
                                        <input type="number" class="form-control" id="re-account-number" name="re_account_number" value="{{ $Affiliate->account_number }}">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label" for="ifsc-code">IFSC code *</label>
                                        <input type="text" class="form-control" id="ifsc-code" name="ifsc_code" value="{{ $Affiliate->ifsc_code }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).on('change','#type-of-affiliate', function(e){
        let type = $(this).val();
        if(type == 1){
            $('#vehicle-number').hide();
            $('#agency-name').hide();
            $('.affiliate-commission').hide();
            $('.affiliate-commission1').show();
        }
        if(type == 2){
            $('#vehicle-number').show();
            $('#agency-name').hide();
            $('.affiliate-commission').hide();
            $('.affiliate-commission1').show();
        }
        if(type == 3){
            $('#vehicle-number').hide();
            $('#agency-name').show();
            $('.affiliate-commission').show();
            $('.affiliate-commission1').hide();
            $('#percentage').attr('checked', true);;
        }
        commission();
    });
    $(document).on('change','.form-check-input', function(e){
        commission();
    });
    function commission() {
        let arr = JSON.parse('{!! $Commission !!}');
        let type = $('#type-of-affiliate').val();
        let commission = document.querySelector('input[name="commission_type"]:checked').value;
        let amount = 0;
        for (let i = 0; i < arr.length; i++) {
            if(arr[i].type == type) {
                if(commission == 1){
                    amount = arr[i].per_download;
                }
                if(commission == 2){
                    amount = arr[i].per_purchase;
                }
            }
        }
        $('#comm').val(amount);
    }
</script>
@if($Affiliate->affiliate_type == 1 || $Affiliate->affiliate_type == 2)
    <script>commission()</script>
@endif
<script>
    window.addEventListener('load', function() {
        $("#form").validate({
            rules: {
                first_name: { required: true },
                last_name: { required: true },
                email: { required: true },
                mobile: { required: true },
                affiliate_type: { required: true },
                state_id: { required: true },
                city: { required: true },
                address: { required: true },
                zip_code: { required: true },
                bank_name: { required: true },
                holder_name: { required: true },
                account_number: { required: true },
                re_account_number: {
                    required: true,
                    equalTo: "#account-number"
                },
                ifsc_code: { required: true },
            },
            messages: {
                first_name: { required: "First Name is required" },
                last_name: { required: "Last Name is required" },
                email: { required: "Email is required" },
                mobile: { required: "Contact No is required" },
                affiliate_type: { required: "Affiliate Type is required" },
                state_id: { required: "State is required" },
                city: { required: "City is required" },
                address: { required: "Address is required" },
                zip_code: { required: "Zip Code is required" },
                bank_name: { required: "Bank Name is required" },
                holder_name: { required: "Holder Name is required" },
                account_number: { required: "Account Number is required" },
                re_account_number: {
                    required: "Re-Account Number is required",
                    equalTo : 'Account and Re Account No does not match'
                },
                ifsc_code: { required: "IFSC Code is required" },
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
@endsection
