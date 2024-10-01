@extends('Affiliate.layouts.master')
@section('title', 'Invite People')
@section('toolbar', 'Invite People')

@section('content')
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
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-125px">Email</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($InvitePeoples as $InvitePeople)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-gray-600 text-hover-primary mb-1">{{ $InvitePeople->email }}</td>
                                </tr>
                            @endforeach
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

        var KTDatatablesBasicBasic = function() {
            var initDatatable = function() {
                var table = $('#kt_customers_table').DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            };

            return {
                init: function() {
                    initDatatable();
                },
            };
        }();

        $(document).ready(function() {
            KTDatatablesBasicBasic.init();
        });
    </script>
@endsection
