@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Generate QR</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('qr-management')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <label class="form-label" for="rq">No Of QR *</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" aria-describedby="fileAddon" required>
                                        <button type="submit" class="btn btn-sm btn-primary" id="fileAddon">Generate QR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- QR -->
        <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-md-0">QR Codes</h4>
                <div class=" ">
                    <div class="d-grid gap-2 d-flex justify-content-end">
                        <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary">Export QR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="qr-code">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card card-body text-center">
                        <div class="card-title">
                            <img src="{{asset('assets/images/logo1.png')}}" class="mb-2" width="140">
                        </div>
                        <img src="{{asset('assets/images/rqcode.png')}}" alt="qr-code" class="rounded">
                        <span class="fs-5 mt-3 card-footer border border-secondary border-1">HUQAKIQ12</span>
                        <p class="fs-5 mt-4">Scan This QR</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card card-body text-center">
                        <div class="card-title">
                            <img src="{{asset('assets/images/logo1.png')}}" class="mb-2" width="140">
                        </div>
                        <img src="{{asset('assets/images/rqcode.png')}}" alt="qr-code" class="rounded">
                        <span class="fs-5 mt-3 card-footer border border-secondary border-1">KSJDKIQ12</span>
                        <p class="fs-5 mt-4">Scan This QR</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card card-body text-center">
                        <div class="card-title">
                            <img src="{{asset('assets/images/logo1.png')}}" class="mb-2" width="140">
                        </div>
                        <img src="{{asset('assets/images/rqcode.png')}}" alt="qr-code" class="rounded">
                        <span class="fs-5 mt-3 card-footer border border-secondary border-1">POGWKIQ12</span>
                        <p class="fs-5 mt-4">Scan This QR</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card card-body text-center">
                        <div class="card-title">
                            <img src="{{asset('assets/images/logo1.png')}}" class="mb-2" width="140">
                        </div>
                        <img src="{{asset('assets/images/rqcode.png')}}" alt="qr-code" class="rounded">
                        <span class="fs-5 mt-3 card-footer border border-secondary border-1">MKJIKIQ12</span>
                        <p class="fs-5 mt-4">Scan This QR</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection
