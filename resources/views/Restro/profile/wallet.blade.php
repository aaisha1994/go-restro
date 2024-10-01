@extends('Restro.layouts.master')
@section('title', 'Wallet')
@section('toolbar', 'Wallet')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Wallet</span>
                    </h3>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
                        <a href="#" class="btn btn-sm btn-primary btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_coin">Add Coin</a>
                    </div>
                </div>
                <div class="card-body border-top p-9">
                    <div class="mb-2">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="fw-bolder text-muted">
                                        <th class="col">#</th>
                                        <th class="col">Coin Purchase</th>
                                        <th class="min-w-100px text-end">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Wallets as $Wallet)
                                        <tr class="text-dark fw-bolder text-hover-primary fs-6">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $Wallet->amount }} Coin Purchase</td>
                                            <td class="text-end">{{ date('d-m-Y', strtotime($Wallet->created_at)) }}</td>
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
    <!--end::Container-->
    <div class="modal fade" tabindex="-1" id="add_coin" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Coin</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>
                <form action="{{ route('restro.profile.wallet.purchase') }}" method="POST" id="form">
                    @csrf
                    <div class="modal-body">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Coin</span>
                        </label>
                        <input type="text" class="form-control form-control-solid name" name="coin" id="totalcoin" placeholder="Enter The Coin Value">
                        <input type="hidden" name="amount" id="totalamount">
                        <div class="mt-4">
                            <span class="text-dark fw-bolder">You Need To Pay INR <span id="payamount">0</span></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="coinvalue" value="{{ $Refer->value_of_coin }}">
@endsection
@section('js')
<script>
    $(document).on('keyup', '#totalcoin', function(e) {
        let totalcoin = $(this).val();
        let coinvalue = $('#coinvalue').val();
        let amount = coinvalue * totalcoin;
        $('#payamount').html(amount);
        $('#totalamount').val(amount);
    });
</script>
@endsection
