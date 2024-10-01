@extends('Admin.layouts.master')
@section('title', 'Refer & Earn')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="{{ route('admin.refer.store') }}" method="POST" id="form">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Refer & Earn</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-primary">Clear</button>
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
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Coin Per Referral *</label>
                                    <input type="number" class="form-control" value="{{ $ReferEarn->coin_per_ref ?? '' }}" name="coin_per_ref">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Value Of 1 Coin *</label>
                                    <input type="number" class="form-control" value="{{ $ReferEarn->value_of_coin ?? '' }}" name="value_of_coin">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="description">Terms & Condition *</label>
                                    <textarea class="form-control" rows="5" id="editor" name="terms">{{ $ReferEarn->terms ?? '' }}</textarea>
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
    <script type="text/javascript">
    ClassicEditor.create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        window.addEventListener('load', function() {
            $("#form").validate({
                rules: {
                    coin_per_ref: { required: true },
                    value_of_coin: { required: true },
                },
                messages: {
                    coin_per_ref: { required: "Coin Per Referral is required" },
                    value_of_coin: { required: "Value Of 1 Coin is required" },
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

