@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Dashboard</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
          <div class="col-xl-8">
              <div class="row">
                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex">
                                  <div class="flex-1 overflow-hidden">
                                      <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                      <h4 class="mb-0">1452</h4>
                                  </div>
                                  <div class="text-primary ms-auto">
                                      <i class="ri-stack-line font-size-24"></i>
                                  </div>
                              </div>
                          </div>

                          <div class="card-body border-top py-3">
                              <div class="text-truncate">
                                  <span class="badge bg-success-subtle text-success  font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                  <span class="text-muted ms-2">From previous period</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex">
                                  <div class="flex-1 overflow-hidden">
                                      <p class="text-truncate font-size-14 mb-2">Total Restro</p>
                                      <h4 class="mb-0">452</h4>
                                  </div>
                                  <div class="text-primary ms-auto">
                                      <i class="ri-store-2-line font-size-24"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body border-top py-3">
                              <div class="text-truncate">
                                  <span class="badge bg-success-subtle text-success  font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                  <span class="text-muted ms-2">From previous period</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex">
                                  <div class="flex-1 overflow-hidden">
                                      <p class="text-truncate font-size-14 mb-2">Affiliate</p>
                                      <h4 class="mb-0">154</h4>
                                  </div>
                                  <div class="text-primary ms-auto">
                                      <i class="ri-briefcase-4-line font-size-24"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body border-top py-3">
                              <div class="text-truncate">
                                  <span class="badge bg-success-subtle text-success  font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                  <span class="text-muted ms-2">From previous period</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- end row -->

              <div class="card">
                  <div class="card-body">
                      <div class="float-end d-none d-md-inline-block">
                          <div class="btn-group mb-2">
                              <button type="button" class="btn btn-sm btn-light">Today</button>
                              <button type="button" class="btn btn-sm btn-light active">Weekly</button>
                              <button type="button" class="btn btn-sm btn-light">Monthly</button>
                          </div>
                      </div>
                      <h4 class="card-title mb-4">Revenue Analytics</h4>
                      <div >
                          <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                      </div>
                  </div>

                  <div class="card-body border-top text-center">
                      <div class="row">
                          <div class="col-sm-4">
                              <div class="d-inline-flex">
                                  <h5 class="me-2">&#8377; 12,253</h5>
                                  <div class="text-success">
                                      <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                  </div>
                              </div>
                              <p class="text-muted text-truncate mb-0">This month</p>
                          </div>

                          <div class="col-sm-4">
                              <div class="mt-4 mt-sm-0">
                                  <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                                  <div class="d-inline-flex">
                                      <h5 class="mb-0 me-2">&#8377; 34,254</h5>
                                      <div class="text-success">
                                          <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="mt-4 mt-sm-0">
                                  <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 me-1"></i> Previous Year :</p>
                                  <div class="d-inline-flex">
                                      <h5 class="mb-0">&#8377; 32,695</h5>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end row -->
          </div>

          <div class="col-xl-4">
              <div class="card">
                  <div class="card-body">
                      <div class="float-end">
                          <select class="form-select form-select-sm">
                              <option selected>Restro Name</option>
                              <option value="1">Restro 1</option>
                              <option value="2">Restro 2</option>
                              <option value="3">Restro 3</option>
                          </select>
                      </div>
                      <h4 class="card-title mb-4">Restro Sales Analytics</h4>

                      <!-- <div id="donut-chart" class="apex-charts"></div> -->
                      <div id="spline_area" class="apex-charts" dir="ltr"></div>

                  </div>
              </div>

              <div class="card">
                  <div class="card-body">
                      <div class="dropdown float-end">
                          <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="mdi mdi-dots-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end">
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item">Action</a>
                          </div>
                      </div>

                      <h4 class="card-title">Discount</h4>
                      <div class="text-center">
                         <figure class="highcharts-figure">
                           <div id="container"></div>
                           <p class="highcharts-description"></p>
                         </figure>
                      </div>
                  </div>
              </div>

          </div>
      </div>
      <!-- end row -->

      <!-- post approval -->
      <div class="row">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <div class="row mb-2">
                        <div class="col">
                            <div class="form-inline float-md-start">
                                <div class="search-box ms-2">
                                    <div class="position-relative">
                                        <h4 class="card-title">Post Approval</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                          <div class="d-grid gap-2 d-flex justify-content-end">
                            <a href="{{Route('approve-reject-post')}}" class="btn btn-sm btn-primary" type="button">View All</a>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead class="table-light">
                                  <tr>
                                      <th>#</th>
                                      <th>Image</th>
                                      <th>Restaurant Name</th>
                                      <th>Request Type</th>
                                      <th>Content</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td><img src="{{asset('assets/images/logo-sm-dark.png')}}" height="35" /></td>
                                      <td>Foraged Fare</td>
                                      <td>Profile Change</td>
                                      <td>{{Str::of('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')->limit(40)}}</td>
                                      <td>
                                          <a href="#" class="btn btn-primary btn-sm">Approve</a>
                                          <a href="#" class="btn btn-secondary btn-sm">Reject</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td><img src="{{asset('assets/images/logo-sm-dark.png')}}" height="35" /></td>
                                      <td>Herbivoria</td>
                                      <td>Profile Change</td>
                                      <td>{{Str::of('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')->limit(40)}}</td>
                                      <td>
                                          <a href="#" class="btn btn-primary btn-sm">Approve</a>
                                          <a href="#" class="btn btn-secondary btn-sm">Reject</a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
           <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title mb-4">User Segment</h4>
                      <a href="{{Route('user-segment')}}">
                        <div id="pie_chart" class="apex-charts" dir="ltr"></div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <!-- end row -->
  </div>
</div>
@endsection
