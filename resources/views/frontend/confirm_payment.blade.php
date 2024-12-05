<div class="container">
        <h1>Payment Confirmation</h1>

        @if(isset($paymentStatus) && $paymentStatus == 'SUCCESS')
            <div class="status" style="color: green;">Payment Successful!</div>
            <div class="message">Thank you for your payment. Your transaction ID is: {{ $transactionId }}</div>
        @elseif(isset($paymentStatus) && $paymentStatus == 'FAILED')
            <div class="status" style="color: red;">Payment Failed</div>
            <div class="message">We are sorry, but your payment could not be processed. Please try again later.</div>
        @else
            <div class="status" style="color: orange;">Payment Pending</div>
            <div class="message">Your payment is being processed. Please wait.</div>
        @endif

        <div class="message">
            <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
 </div>