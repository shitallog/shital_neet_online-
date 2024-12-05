<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Success</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Subscription Successful!</h1>
        <p>Your payment has been processed successfully. Thank you for subscribing!</p>

        <!-- Optionally, you could display some additional details -->
        <p>Subscription ID: {{ $subscriptionId ?? 'N/A' }}</p>
        <p>Package: {{ $package ?? 'Basic Plan' }}</p>

        <!-- You could provide a link to go back to the homepage or dashboard -->
        <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
    </div>
</body>
</html>
