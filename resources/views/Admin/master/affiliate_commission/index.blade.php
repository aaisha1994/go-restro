@extends('Admin.layouts.master')
@section('title', 'Affiliate Commission')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.commission.store') }}" method="POST" id="form">
                @csrf
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
                                    @foreach ($AffiliateCommission as $Com)
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Type Of Affiliate *</label>
                                            <input type="text" class="form-control" @if ($Com->type == 1) value="Influence" @else value="On Wheels" @endif disabled>
                                            <input type="hidden" value="{{ $Com->type }}" name="type[]">
                                            <input type="hidden" value="{{ $Com->id }}" name="id[]">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Per Download *</label>
                                            <input type="number" class="form-control" value="{{ $Com->per_download }}" name="per_download[]">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Per Purchase *</label>
                                            <input type="number" class="form-control" value="{{ $Com->per_purchase }}" name="per_purchase[]">
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-md-4 mb-4">
                                        <label class="form-label">Type Of Affiliate *</label>
                                        <input type="text" class="form-control" value="On Wheels" disabled>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Per Download *</label>
                                        <input type="text" class="form-control" value="20">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Per Purchase *</label>
                                        <input type="text" class="form-control" value="25%">
                                    </div> --}}
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
