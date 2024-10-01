@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Affiliate Commission</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
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
                                    <label class="form-label">Type Of Affiliate *</label>
                                    <input type="text" class="form-control" value="Influence" disabled>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Per Download *</label>
                                    <input type="number" class="form-control" value="20" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Per Purchase *</label>
                                    <input type="text" class="form-control" value="25%" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Type Of Affiliate *</label>
                                    <input type="text" class="form-control" value="On Wheels" disabled>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Per Download *</label>
                                    <input type="number" class="form-control" value="20" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Per Purchase *</label>
                                    <input type="text" class="form-control" value="25%" required>
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