<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff0f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .failed-payment-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        .failed-payment-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, #FF6B6B, #FF9999, #FFAAAA, #FF6B6B);
            animation: rotate-background 10s linear infinite;
            opacity: 0.1;
            z-index: -1;
        }
        @keyframes rotate-background {
            100% { transform: rotate(360deg); }
        }
        .error-icon {
            width: 120px;
            height: 120px;
            position: relative;
            border-radius: 50%;
            box-sizing: content-box;
            margin: 0 auto 2rem;
            background: #FF6B6B;
            animation: error-animation 0.8s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .error-icon::before,
        .error-icon::after {
            content: '';
            position: absolute;
            background: white;
            width: 60%;
            height: 10%;
            top: 45%;
            left: 20%;
        }
        .error-icon::before {
            transform: rotate(45deg);
        }
        .error-icon::after {
            transform: rotate(-45deg);
        }
        @keyframes error-animation {
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
        .error-details {
            background-color: #fff0f0;
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
                <div class="failed-payment-container animate__animated animate__zoomIn">
                    <div class="error-icon floating"></div>
                    <h1 class="text-center mb-4 animate__animated animate__fadeInDown">Payment Failed</h1>
                    <p class="text-center mb-4 animate__animated animate__fadeIn animate__delay-1s">We're sorry, but there was an issue processing your payment. Please review the details below and try again.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
