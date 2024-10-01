@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
   Restaurant Offers List
@endsection
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card">
         <div class="card-header border-0 pt-6">
            <div class="card-title">
               <div class="d-flex align-items-center position-relative my-1">
                  <span class="svg-icon svg-icon-1 position-absolute ms-6">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                     </svg>
                  </span>
                  <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-15" placeholder="Search..." />
               </div>
            </div>
            <div class="card-toolbar">
               <div class="d-flex justify-content-end">
                  <a href="{{Route('affiliate-offer-create')}}" class="btn btn-primary">Add Offer</a>
               </div>
            </div>
         </div>
         <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
               <thead>
                  <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                     <th class="w-10px pe-2">#</th>
                     <th class="min-w-125px">Image </th>
                     <th class="min-w-125px">Restro Name</th>
                     <th class="min-w-125px">Offer Name</th>
                     <th class="min-w-125px">Offer Text</th>
                     <th class="min-w-125px">Quantity</th>
                     <th class="text-end min-w-70px">Actions</th>
                  </tr>
               </thead>
               <tbody class="fw-bold text-gray-600">
                  <tr>
                     <td>1</td>
                     <td>
                        <div class="d-flex align-items-center">
                           <a href="javascript:void(0)" class="symbol symbol-50px">
                              <span class="symbol-label" style="background-image:url(restaurant/media/logos/logo1.png);"></span>
                           </a>
                        </div>
                     </td>
                     <td class="text-gray-800 text-hover-primary mb-1">Emma Smith</td>
                     <td class="text-gray-600 text-hover-primary mb-1">Offer Name</td>
                     <td class="text-gray-600 text-hover-primary mb-1">Buy 1 Get 1 free</td>
                     <td>20</td>
                     <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                           <span class="svg-icon svg-icon-5 m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                              </svg>
                           </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                           <div class="menu-item px-3">
                              <a href="{{Route('affiliate-offer-edit')}}" class="menu-link px-3">View</a>
                           </div>
                           <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td>2</td>
                     <td>
                        <div class="d-flex align-items-center">
                           <a href="javascript:void(0)" class="symbol symbol-50px">
                              <span class="symbol-label" style="background-image:url(restaurant/media/logos/logo1.png);"></span>
                           </a>
                        </div>
                     </td>
                     <td class="text-gray-800 text-hover-primary mb-1">Melody Macy</td>
                     <td class="text-gray-600 text-hover-primary mb-1">Offer Name</td>
                     <td class="text-gray-600 text-hover-primary mb-1">Buy 1 Get 1 free</td>
                     <td>30</td>
                     <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                           <span class="svg-icon svg-icon-5 m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                              </svg>
                           </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                           <div class="menu-item px-3">
                              <a href="{{Route('affiliate-offer-edit')}}" class="menu-link px-3">View</a>
                           </div>
                           <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                           </div>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    "use strict";

    var KTDatatablesBasicBasic = function () {
        var initDatatable = function () {
            var table = $('#kt_customers_table').DataTable({
                "info": false,
                'order': [],
                'pageLength': 10,
            });

            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
        };

        return {
            init: function () {
                initDatatable();
            },
        };
    }();

    $(document).ready(function () {
        KTDatatablesBasicBasic.init();
    });
</script>
@endsection
