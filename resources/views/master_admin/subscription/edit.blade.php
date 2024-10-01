@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Subscription</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('subscription')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="plan-name">Plan Name *</label>
                                    <input type="text" class="form-control" id="plan-name" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="tenure">Tenure *</label>
                                    <input type="text" class="form-control" id="tenure"  required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="amount">Amount *</label>
                                    <input type="number" class="form-control" id="amount" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mb-md-2">Promo Code</h6>
                 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="inputContainer">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label class="form-label" for="promocode">Promo Code *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="redeemed">Redeemed *</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="validity">Validity *</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="discount">Discount *</label>
                                        <input type="number" class="form-control" required>
                                    </div>
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
@endsection
