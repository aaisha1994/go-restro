@extends('Admin.layouts.master')
@section('title', 'Subscription Create')
@section('css')
<style>
    .ck-editor__editable_inline, .ck-editor__main {
        max-height: 100px;
    }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.restrosubscription.update',[$Subscription->id]) }}" method="POST" id="form">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Edit Subscription</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.restrosubscription.index') }}" type="button"
                                        class="btn btn-sm btn-primary">Back</a>
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
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="plan-name">Plan Name *</label>
                                        <input type="text" class="form-control" id="plan-name" name="name" value="{{ $Subscription->name }}">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="amount">Amount *</label>
                                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $Subscription->amount }}">
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Select Checkboxes</h5>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="1" id="gift-send" name="gift_send" @if($Subscription->gift_send == 1) @checked(true) @endif>
                                                <label class="form-check-label" for="gift-send">Gift Send</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="1" id="compliment-gr-coin" name="compliment_coin" @if($Subscription->compliment_coin == 1) @checked(true) @endif>
                                                <label class="form-check-label" for="compliment-gr-coin">Compliment GR Coin</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Select Checkboxes</h5>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="1" id="event-details" name="event_details" @if($Subscription->event_details == 1) @checked(true) @endif>
                                                <label class="form-check-label" for="event-details">Event Details</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="staff-allocation" name="staff_allocation" @if($Subscription->staff_allocation == 1) @checked(true) @endif>
                                                <label class="form-check-label" for="staff-allocation">Staff Allocation</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4" id="gr-coin-field" @if($Subscription->compliment_coin == 0) style="display: none;" @endif>
                                        <label class="form-label" for="gr-coin">Add GR Coin *</label>
                                        <input type="number" class="form-control" id="gr-coin" name="gr_coin" value="{{ $Subscription->gr_coin }}">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label" for="benefits">Benefits *</label>
                                        <textarea class="form-control" id="benefits" rows="2" name="benefits">{{ $Subscription->benefits }}</textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#benefits'))
        .catch(error => {
            console.error(error);
        });

        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                    amount: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
                    amount: { required: "Amount is required" },
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
        document.addEventListener("DOMContentLoaded", function () {
            var complimentGrCoinCheckbox = document.querySelector("#compliment-gr-coin");
            var grCoinField = document.querySelector("#gr-coin-field");

            complimentGrCoinCheckbox.addEventListener("change", function () {
                grCoinField.style.display = this.checked ? "block" : "none";
            });
        });
    </script>
@endsection
