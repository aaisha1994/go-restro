@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
   Users
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card card-p-5 card-flush">
         <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
               <!--begin::Search-->
               <div class="d-flex align-items-center position-relative my-1">
                  <span class="svg-icon svg-icon-1 position-absolute ms-4">...</span>
                  <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
               </div>
               <!--end::Search-->
            </div>
         </div>
         <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
               <thead>
                  <!--begin::Table row-->
                  <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                     <th class="min-w-100px">Customer Name</th>
                     <th class="min-w-100px">Mobile Number</th>
                     <th class="min-w-100px">Purchase Date</th>
                     <th class="min-w-100px">Expired date</th>
                     <th>State</th>
                     <th>City</th>
                     <th>Call</th>
                  </tr>
                  <!--end::Table row-->
               </thead>
               <tbody class="fw-bold text-gray-600">
                  <tr class="odd">
                     <td>
                        <div class="d-flex align-items-center">
                           <div class="me-5 position-relative">
                              <div class="symbol symbol-35px symbol-circle">
                                 <img alt="Pic" src="restaurant/media/avatars/300-6.jpg" />
                              </div>
                           </div>
                           <div class="d-flex flex-column justify-content-center">
                              <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Smith</a>
                              <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <a href="#" class="text-dark text-hover-primary">+91 8562362356</a>
                     </td>
                     <td data-order="2022-03-10T14:40:00+05:00">10 Mar 2024</td>
                     <td>30 Mar 2024</td>
                     <td>Gujrat</td>
                     <td>Surat</td>
                     <td>
                        <a href="tel:+91 56235623562" class="btn btn-primary btn-sm"><i class="bi bi-telephone"></i></a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
@endsection
@section('js')
   <script type="text/javascript">
      "use strict";

      // Class definition
      var KTDatatablesButtons = function () {
          // Shared variables
          var table;
          var datatable;

          // Private functions
          var initDatatable = function () {
              // Set date data order
              const tableRows = table.querySelectorAll('tbody tr');

              tableRows.forEach(row => {
                  const dateRow = row.querySelectorAll('td');
                  const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
                  dateRow[3].setAttribute('data-order', realDate);
              });

              // Init datatable --- more info on datatables: https://datatables.net/manual/
              datatable = $(table).DataTable({
                  "info": false,
                  'order': [],
                  'pageLength': 10,
              });
          }

          // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
          var handleSearchDatatable = () => {
              const filterSearch = document.querySelector('[data-kt-filter="search"]');
              filterSearch.addEventListener('keyup', function (e) {
                  datatable.search(e.target.value).draw();
              });
          }

          // Public methods
          return {
              init: function () {
                  table = document.querySelector('#kt_datatable_example_1');

                  if ( !table ) {
                      return;
                  }

                  initDatatable();
                  handleSearchDatatable();
              }
          };
      }();

      // On document ready
      KTUtil.onDOMContentLoaded(function () {
          KTDatatablesButtons.init();
      });
   </script>
@endsection
