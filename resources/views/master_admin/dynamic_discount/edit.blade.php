@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Discount</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('dynamic-discount')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height:500px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="discount-name">Discount Name *</label>
                                    <input type="text" class="form-control" id="discount-name" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="discount">Discount % *</label>
                                    <input type="numbar" class="form-control" id="discount"  required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Date Range Selection</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                        <input type="text" class="form-control" name="start" placeholder="Start Date">
                                        <input type="text" class="form-control" name="end" placeholder="End Date">
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
