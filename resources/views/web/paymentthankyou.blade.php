<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Payment</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .thank-you-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        .thank-you-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, #4CAF50, #2196F3, #9C27B0, #FF9800, #4CAF50);
            animation: rotate-background 10s linear infinite;
            opacity: 0.1;
            z-index: -1;
        }
        @keyframes rotate-background {
            100% { transform: rotate(360deg); }
        }
        .check-icon {
            width: 120px;
            height: 120px;
            position: relative;
            border-radius: 50%;
            box-sizing: content-box;
            margin: 0 auto 2rem;
            background: #4CAF50;
            animation: check-animation 0.8s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .check-icon::before,
        .check-icon::after {
            content: '';
            position: absolute;
            background: white;
        }
        .check-icon::before {
            width: 25%;
            height: 10%;
            left: 22%;
            top: 50%;
            transform: rotate(45deg);
        }
        .check-icon::after {
            width: 45%;
            height: 10%;
            right: 22%;
            top: 45%;
            transform: rotate(-45deg);
        }
        @keyframes check-animation {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(3deg); }
        }
        .btn-custom {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-custom::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.6s;
        }
        .btn-custom:hover::before {
            left: 100%;
        }
        .order-details {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8">
                <div class="thank-you-container animate__animated animate__zoomIn">
                    <div class="check-icon floating"></div>
                    <h1 class="text-center mb-4 animate__animated animate__fadeInDown">Thank You for Your Payment!</h1>
                    <p class="text-center mb-4 animate__animated animate__fadeIn animate__delay-1s">Your transaction has been processed successfully. We appreciate your business!</p>
                    <div class="order-details mt-4 animate__animated animate__fadeIn animate__delay-1s" id="orderDetails">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                 Transaction Id
                                <span class="badge bg-primary rounded-pill" id="orderNumber">{{$transaction->transaction_id}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Amount
                                <span class="badge bg-success rounded-pill" id="totalAmount">{{$transaction->amount}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Payment Date
                                <span class="badge bg-info rounded-pill" id="paymentDate">{{ $transaction->created_at->format('j, F Y') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
