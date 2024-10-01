@extends('Restro.layouts.master')
@section('title', 'Subscription')
@section('toolbar', 'Subscription')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <div class="card card-default">
                            <div class="card-body text-center" style="display: none">
                                <form action="{{ route('restro.profile.sub.store') }}" method="POST" id="form">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{ $amount * 100 }}"
                                        data-buttontext="Pay {{ $amount }} INR"
                                        data-name="Go Restro"
                                        data-image="{{ asset('restaurant/media/logos/logo1.png') }}"
                                        data-prefill.name="{{ $Restro->name }}"
                                        data-prefill.email="{{ $Restro->email }}"
                                        data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
@section('js')
<script>
    $('#form').submit()
</script>
@endsection
