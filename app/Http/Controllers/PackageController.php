<?php

namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('frontend.show', compact('package'));
    }
    
    
    

    public function purchase(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $amount = $package->price;
        
        // Redirect to the PhonePe payment page (integrate PhonePe payment here)
        return redirect()->route('payment.phonepe', ['amount' => $amount, 'package_id' => $id]);
    }


    public function initiatePayment(Request $request)
    {
        $amount = $request->amount;
        $package_id = $request->package_id;
        
        // Prepare PhonePe payment request data here
        $response = $this->sendPhonePeRequest($amount, $package_id);
        
        if ($response['status'] == 'SUCCESS') {
            return redirect()->route('frontend.success', ['package_id' => $package_id]);
        } else {
            return redirect()->route('frontend.failure');
        }
    }

    private function sendPhonePeRequest($amount, $package_id)
{
    $merchantId = 'M22YDXMVXLJUX';
    $apiKey = 'f25edd43-49ef-46e8-a0e1-a8b9269603d2';
    $endpoint = 'https://api.phonepe.com/apis/hermes/payments/v1/initiate';
    $callbackUrl = route('payment.callback', ['package_id' => $package_id]);

    $payload = [
        'merchantId' => $merchantId,
        'transactionId' => 'TXN' . uniqid(),
        'amount' => $amount * 100, // Convert to paise
        'merchantOrderId' => 'ORD' . uniqid(),
        'redirectUrl' => $callbackUrl,
        'redirectMode' => 'POST',
        'callbackUrl' => $callbackUrl
    ];

    // Ensure $apiKey is used properly
    $data = json_encode($payload);
    $hashedPayload = hash('sha256', $data . "/v1/initiate" . $apiKey);

    try {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-VERIFY' => $hashedPayload . '###1', // Append ###1 for checksum version
            'X-MERCHANT-ID' => $merchantId,
        ])->post($endpoint, $payload);

        $responseBody = $response->json();

        if (isset($responseBody['code']) && $responseBody['code'] === 'SUCCESS') {
            return [
                'status' => 'SUCCESS',
                'transaction_id' => $responseBody['data']['transactionId'],
            ];
        } else {
            return [
                'status' => 'FAILED',
                'message' => $responseBody['message'] ?? 'Payment initiation failed',
            ];
        }
    } catch (\Exception $e) {
        return [
            'status' => 'FAILED',
            'message' => 'Error occurred: ' . $e->getMessage(),
        ];
    }
}


    public function paymentSuccess($package_id)
    {
        // Provide access to package tests
        $user = auth()->user();
        $user->packages()->attach($package_id);

        return redirect()->route('exam.starttest')->with('success', 'Payment successful! Access granted.');
    }

 
    
    
         public function paymentFailure()
    {
        return view('frontend.failure'); // Make sure this view exists
    }
    


    public function handleCallback(Request $request, $package_id)
{
    // Log the request for debugging purposes (optional)
    Log::info('Payment callback received', $request->all());

    // Verify the response signature if necessary

    // Extract payment details from the request
    $status = $request->input('status'); // Payment status, e.g., "SUCCESS" or "FAILED"
    $transactionId = $request->input('transactionId');
    $responseMessage = $request->input('message', 'No message provided');

    // Update the payment record in the database based on the transaction status
    $payment = Payment::where('transaction_id', $transactionId)->first();

    if ($payment) {
        $payment->update([
            'payment_status' => $status,
            'response_msg' => $responseMessage,
        ]);

        // Perform any additional actions based on the status, such as sending confirmation emails
        if ($status === 'SUCCESS') {
            // Notify the user or update their subscription/package
        } else {
            // Handle failures or retries if needed
        }

        return response()->json(['message' => 'Callback processed successfully'], 200);
    } else {
        return response()->json(['error' => 'Transaction not found'], 404);
    }
}








public function registerForPackage($package_id)
    {
        $package = Package::findOrFail($package_id);
        
        // Check if the user has already registered for the package
        $existingRegistration = Package::where('user_id', Auth::id())
                                          ->where('package_id', $package_id)
                                          ->first();
        
        if ($existingRegistration) {
            return redirect()->route('checkout', ['package_id' => $package_id]);
        }

        // Register user for the package (save to database)
        Package::create([
            'user_id' => Auth::id(),
            'package_id' => $package_id,
            'status' => 'pending', // or 'registered'
        ]);
        
        // Redirect to checkout page
        return redirect()->route('checkout', ['package_id' => $package_id]);
    }

    // Checkout page
    public function checkout($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('checkout', compact('package'));
    }

    // Handle payment success (integrate payment gateway logic here)
    public function paymentSucces(Request $request)
    {
        $Package = Package::where('user_id', Auth::id())
                                  ->where('package_id', $request->package_id)
                                  ->first();
        
        if ($Package) {
            $Package->status = 'active'; // Mark the package as active
            $Package->save();
        }

        return redirect()->route('exam.started'); // Or wherever you want to redirect after success
    }
















}
