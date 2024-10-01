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
            <form action="{{ route('admin.subscription.store') }}" method="POST" id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Add Subscription</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.subscription.index') }}" type="button"
                                        class="btn btn-sm btn-primary">Back</a>
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
                                        <label class="form-label" for="plan-name">Plan Name *</label>
                                        <input type="text" class="form-control" id="plan-name" name="name">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="tenure">Tenure *</label>
                                        <input type="text" class="form-control" id="tenure" name="tenure">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="amount">Amount *</label>
                                        <input type="number" class="form-control" id="amount" name="amount">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label" for="tenure_day">Tenure (Days) *</label>
                                        <input type="number" class="form-control" id="tenure_day" name="tenure_day">
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <label class="form-label" for="benefits">Benefits *</label>
                                        <textarea class="form-control" id="benefits" rows="2" name="benefits"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-md-2">Promo Code</h6>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-end">
                                    <a class="btn btn-sm btn-primary" id="addButton">Add</a>
                                </div>
                                <div id="inputContainer"></div>
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

        document.getElementById('addButton').addEventListener('click', function() {
            var inputContainer = document.getElementById('inputContainer');
            for (var i = 0; i < 1; i++) {
                var newRow = document.createElement('div');
                newRow.classList.add('row', 'mb-4', 'rm');
                newRow.innerHTML = `<div class="col">
                    <label class="form-label" for="promocode">Promo Code *</label>
                    <input type="text" class="form-control" name="promo_code[]">
                </div>
                <div class="col">
                    <label class="form-label" for="redeemed">Redeemed *</label>
                    <input type="number" class="form-control" name="redeemed[]">
                </div>
                <div class="col">
                    <label class="form-label" for="validity">Validity *</label>
                    <input type="number" class="form-control" name="validity[]">
                </div>
                <div class="col">
                    <label class="form-label" for="discount">Discount *</label>
                    <input type="number" class="form-control" name="discount[]">
                </div>
                <div class="col" style="max-width:60px; margin-top: 32px;">
                    <a class="btn btn-sm btn-primary remove"><i class="mdi mdi-delete font-size-14"></i></a>
                </div>`;
                inputContainer.appendChild(newRow);
            }
        });

        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    name: { required: true },
                    tenure: { required: true },
                    amount: { required: true },
                    tenure_day: { required: true },
                },
                messages: {
                    name: { required: "Name is required" },
                    tenure: { required: "Tenure is required" },
                    amount: { required: "Amount is required" },
                    tenure_day: { required: "Tenure Day is required" },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $('#addButton')[0].click();

        $(document).on('click', '.remove', function(e){
            $(this).parents('.rm').remove();
        });
    </script>
@endsection
