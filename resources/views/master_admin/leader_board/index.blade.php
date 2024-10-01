@extends('master_admin.layouts.master')
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
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#restaurant" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Restaurant</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Affiliate</span>
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content p-3 text-muted">
                     <div class="tab-pane active" id="restaurant" role="tabpanel">
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
                           <div class="col">
                              <div class="d-grid gap-2 d-flex justify-content-end">
                                 <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table id="restaurantDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Restaurant Name</th>
                                    <th>Coupons</th>
                                    <th>Recognition</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>Gold Restro</td>
                                    <td>1500 &#8377;</td>
                                    <td><input type="text" id="range_09"></td>
                                 </tr>
                                 <tr>
                                    <th scope="row">2</th>
                                    <td>Perks Restro</td>
                                    <td>2500 &#8377;</td>
                                    <td><input type="text" id="range_09_02"></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="tab-pane" id="users" role="tabpanel">
                        <div class="row mb-4">
                           <div class="col">
                              <div class="form-inline float-md-start">
                                 <div class="search-box ms-2">
                                    <div class="position-relative">
                                       <input type="search" id="usersSearch" class="form-control rounded" placeholder="Search...">
                                       <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="d-grid gap-2 d-flex justify-content-end">
                                 <a href="javascript:void(0)" class="btn btn-sm btn-primary me-md-2" type="button">Export to Excel</a>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table id="usersDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Recognition</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>Affiliate name</td>
                                    <td>20</td>
                                    <td><input type="text" id="range_09_03"></td>
                                 </tr>
                                 <tr>
                                    <th scope="row">2</th>
                                    <td>Affiliate name</td>
                                    <td>30</td>
                                    <td><input type="text" id="range_09_04"></td>
                                 </tr>
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
</div>
@endsection
@section('js')
   <script>
    $(document).ready(function() {
        // DataTable initialization for the first table
        $('#restaurantDatatable').DataTable({
            // Your DataTable options for the first table
        });

        // DataTable initialization for the second table
        $('#usersDatatable').DataTable({
            // Your DataTable options for the second table
        });

        $('#restaurantSearch').on('input', function () {
            $('#restaurantDatatable').DataTable().search(this.value).draw();
        });

        $('#usersSearch').on('input', function () {
            $('#usersDatatable').DataTable().search(this.value).draw();
        });
    });
</script>

@endsection
