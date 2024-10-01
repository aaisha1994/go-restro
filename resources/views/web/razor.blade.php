<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <form action="{{ route('user.webpaymentstore') }}" method="POST" id="form">
        @csrf
        @if ($transaction)
            @php
            $amount = (int)$transaction->amount;
            $total = $amount * 100;
            @endphp
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $razorkey }}"
                data-amount="{{ $total }}" data-buttontext="Pay Now" data-order_id="{{ $orderid }}"
                data-name="Go Restro" data-image="{{asset('web/img/logos/logo.png')}}"
                data-prefill.name="{{ $transaction->name }}" data-prefill.email="{{ $transaction->email }}" data-theme.color="#ED6D55">
            </script>
             <input type="hidden" value="{{ $transaction->order_no }}" name="orderno"/>
             <input type="hidden" value="{{ $subscriptionid }}" name="subscriptionid"/>
             <input type="hidden" value="{{ $restro_id }}" name="restro_id"/>
        @endif

    </form>

    <script>
        $(document).ready(function(e) {
            $('.razorpay-payment-button').trigger('click');
            $('.razorpay-payment-button').hide();
        });
    </script>
</body>

</html>
