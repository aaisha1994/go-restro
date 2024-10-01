@extends('Affiliate.layouts.master')
@section('title', 'Payment Details')
@section('toolbar', 'Payment Details')

@section('toolbar_buttons')
    <div class="d-flex align-items-center py-3 py-md-1">
        <div class="me-4">
            <a href="#" class="btn btn-bg-white btn-color-primary fw-bolder">Current Balance &#8377; {{ $Affiliate->wallet }}</a>
        </div>
        @if($Affiliate->wallet > 0)
            <a href="#" class="btn btn-bg-white btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#withdrawal">Withdrawal</a>
        @endif
    </div>
@endsection

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
                                <th class="min-w-125px">Request Type</th>
                                <th class="min-w-125px">Type</th>
                                <th class="min-w-125px">Amount</th>
                                <th class="min-w-125px">Created Date</th>
                                <th class="min-w-125px">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($Credits as $Credit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-gray-600 text-hover-primary mb-1">{{ $Credit->type == 1 ? 'Referral Bonus' : 'Withdrawal Request' }}</td>
                                    <td class="text-gray-600 text-hover-primary mb-1">{{ $Credit->type == 1 ? 'Credited' : 'Debited' }}</td>
                                    <td>&#8377; {{ $Credit->amount }}</td>
                                    <td>{{ date('d M Y, h:i A', strtotime($Credit->created_at))  }}</td>
                                    <td>
                                        @if($Credit->status == 1)
                                            <div class="badge py-3 px-4 fs-7 badge-light-success">{{ 'Success' }}</div>
                                        @elseif($Credit->status == 0)
                                            <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ 'Pending' }}</div>
                                        @elseif($Credit->status == 3)
                                            <div class="badge py-3 px-4 fs-7 badge-light-warning">{{ 'In-Progress' }}</div>
                                        @else
                                            <div class="badge py-3 px-4 fs-7 badge-light-danger">{{ 'Reject' }}</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- withdrawal balance modal -->
    <div class="modal fade" tabindex="-1" id="withdrawal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="form" action="{{ route('affiliate.payment.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Withdrawal</h5>
                        <div class="btn btn-icon btn-sm btn-light-primary btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="fv-row">
                            <label class="required fw-bold fs-6 mb-2">Withdrawal Amount</label>
                            <input type="number" name="amount" pattern="[0-9]*" max="{{ $Affiliate->wallet }}" class="form-control form-control-solid mb-3 mb-lg-0" />
                            <p class="mt-3">Withdrawal amount will be credited to the bank within 24 hours.</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Withdrawal</button>
                    </div>
                </form>
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

        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    amount: { required: true },
                },
                messages: {
                    amount: { required: "Withdrawal Amount is required" },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
