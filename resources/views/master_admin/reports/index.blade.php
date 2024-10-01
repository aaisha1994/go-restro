@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0">Reports</h4>
            </div>
         </div>
      </div>
      <!-- end title -->
      <div class="row">
         <div class="col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4">Purchase Report</h4>
                  <canvas id="lineChart" height="300"></canvas>
               </div>
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4">Expense report</h4>
                  <canvas id="bar" height="300"></canvas>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row">
         <div class="col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4">Restro joining</h4>
                  <canvas id="pie" height="260"></canvas>
               </div>
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title mb-4">User joining</h4>
                  <canvas id="doughnut" height="260"></canvas>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
</div>
@endsection
