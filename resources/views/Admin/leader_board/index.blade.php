@extends('Admin.layouts.master')
@section('title', 'Leader Board')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Leader Board</h4>
                    </div>
                </div>
            </div>
            <!-- end title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content p-3 text-muted">
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-inline float-md-start">
                                            <div class="search-box ms-2">
                                                <div class="position-relative">
                                                    <input type="search" id="restaurantSearch" class="form-control rounded" placeholder="Search...">
                                                    <i class="mdi mdi-magnify search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="Datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Restaurant Name</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Restros as $Restro)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $Restro->name }}</td>
                                                    <td>{{ $Restro->rank }}</td>
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
    </div>
@endsection
