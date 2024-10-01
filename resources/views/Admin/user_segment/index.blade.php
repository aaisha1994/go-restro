@extends('Admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Segment</h4>
                    </div>
                </div>
            </div>
            <!-- end title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-inline float-md-start">
                                        <div class="search-box ms-2">
                                            <div class="position-relative">
                                                <input type="search" id="search" class="form-control rounded" placeholder="Search...">
                                                <i class="mdi mdi-magnify search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Created Date</th>
                                            <th>Purchase Subscription</th>
                                            <th>No Of Passport</th>
                                            <th>C N Redeem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Users as $User)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $User->name }}</td>
                                                <td>{{ $User->email }}</td>
                                                <td>{{ $User->mobile }}</td>
                                                <td>{{ date('d-m-Y', strtotime($User->created_at)) }}</td>
                                                <td>{{ $User->subscription }}</td>
                                                <td>{{ $User->purchse }}</td>
                                                <td>{{ $User->cn }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
