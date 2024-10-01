@extends('Restro.layouts.master')
@section('title', 'Users')
@section('toolbar', 'Users')
@section('css')
<style>
    .active1 {
        border-color: #28a745 !important;
        background-color: #f2f2f2;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.18), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .card1 {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15), 0 2px 5px rgba(0, 0, 0, 0.2);
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
    .card1 .card-body {
        padding: 1rem
    }
</style>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-p-5 card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">...</span>
                            <input type="text" data-kt-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Users" />
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
                                <th class="min-w-100px">Purchase Date</th>
                                <th class="min-w-100px">Expired date</th>
                                <th>Call</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($Users as $User)
                                <tr class="odd">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-5 position-relative">
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="https://ui-avatars.com/api/?name={{ $User->name }}&background=random" />
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="mailto:{{ $User->email }}" class="mb-1 text-gray-800 text-hover-primary">{{$User->name}}</a>
                                                <div class="fw-bold fs-6 text-gray-400">{{ $User->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>@if($User->purchase_date != NULL){{ date('d-M-Y', strtotime($User->purchase_date)) }}@endif</td>
                                    <td>@if($User->expire_date > date('Y-m-d')){{ date('d-M-Y', strtotime($User->expire_date)) }}@endif</td>
                                    <td>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-id="{{ $User->id }}" data-bs-target="#kt_modal_view_event" class="btn btn-primary btn-sm sendwhatsapp"><i class="bi bi-whatsapp"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                        data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)"
                                    fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body pt-0 pb-20 px-lg-5 ">
                    @if($Restaurant->gr_coin > 0)
                        <div class="wts1">
                            <form method="POST" action="{{ route('restro.sendwhatsapp') }}">
                                @csrf
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Event Template</span>
                                </label>
                                <input type="hidden" name="id" id="template_id">
                                <div class="card-deck row">
                                    <div class="col-sm-6">
                                        <div id="anniversary-card" class="card card1 mb-4">
                                            <div class="card-body" role="button">
                                                <h5 class="card-title">
                                                    <input id="anniversary" type="radio" name="template" value="anniversary" checked>
                                                    <label for="anniversary">Anniversary</label>
                                                </h5>
                                                <p class="card-text">Happy anniversary to the most amazing couple! ...<br /> Dining with {1}. for Exclusive offers<br />Regards , Go-Restro</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="anniversary_2-card" class="card card1 mb-4">
                                            <div class="card-body" role="button">
                                                <h5 class="card-title">
                                                    <input id="anniversary_2" type="radio" name="template" value="anniversary_2">
                                                    <label for="anniversary_2">Anniversary 2</label>
                                                </h5>
                                                <p class="card-text">{2} Happy Anniversary ,<br />Cheers to love and good food!<br />with {1} ,<br />Privilege offer using Go-Restro app</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="birthday-card" class="card card1 mb-4">
                                            <div class="card-body" role="button">
                                                <h5 class="card-title">
                                                    <input id="birthday" type="radio" name="template" value="birthday">
                                                    <label for="birthday">Birthday</label>
                                                </h5>
                                                <p class="card-text">Dear {1} , <br />*Wishing you the best on your birthday,*<br />Plan for Party or Dinner ?<br />You have Passport of {2},<br />Grab Your Special Discount 🏃<br />Team , Go-Restro</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="birathday_3-card" class="card card1 mb-4">
                                            <div class="card-body" role="button">
                                                <h5 class="card-title">
                                                    <input id="birathday_3" type="radio" name="template" value="birathday_3">
                                                    <label for="birathday_3">Birthday</label>
                                                </h5>
                                                <p class="card-text">Hey {1},<br />Sending you lots of love on your special day !<br />Plan for dine-out ,<br />special discount at {2}<br />Team Go-Restro</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="birthday_week-card" class="card card1 mb-4">
                                            <div class="card-body" role="button">
                                                <h5 class="card-title">
                                                    <input id="birthday_week" type="radio" name="template" value="birthday_week">
                                                    <label for="birthday_week">Birthday</label>
                                                </h5>
                                                <p class="card-text">Hi {1},<br />It`s Your birthday week ! Celebrating and plan party with {2} ,<br />Get *Exclusive Deals On Meals*<br />Team Go-Restro</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button value="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    @endif
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
        var KTDatatablesButtons = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                .format(); // select date from 4th column in table
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
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#kt_datatable_example_1');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesButtons.init();
        });

        $(document).on('click','.sendwhatsapp', function (e) {
            $('#template_id').val($(this).attr('data-id'));
        });

        $(document).ready(function () {
            $('input:radio').change(function () {//Clicking input radio
                var radioClicked = $(this).attr('id');
                $("#" + radioClicked).prop("checked", true);
                $(".card1").removeClass("active1");
                $("#" + radioClicked + "-card").addClass("active1");
            });
            $(".card1").click(function () {//Clicking the card1
                var inputElement = $(this).find('input[type=radio]').attr('id');
                $("#" + inputElement).prop("checked", true);
                $(".card1").removeClass("active1");
                $("#" + inputElement + "-card").addClass("active1");
            });
        });
    </script>
@endsection
