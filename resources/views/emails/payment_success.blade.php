<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>
<body>
    <h1>Thank You for Your Payment</h1>
    <p>Dear {{ $payment->user->name }},</p>
    <p>Your payment of INR {{ $payment->amount }} has been successfully processed.</p>
    <p>Transaction ID: {{ $payment->transaction_id }}</p>
    <p>Order ID: {{ $payment->merchant_order_id }}</p>
    <p>Payment Status: {{ $payment->payment_status }}</p>

    <p>Thank you for using our service!</p>
</body>
</html>
