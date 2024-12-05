<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{

    public function checkout(Request $request)
    {
        $userId = Auth::id(); // Fetch the authenticated user's ID
    
        // Create a new subscription and set it to pending
        $subscription = Subscription::create([
            'user_id' => $userId,
            'status' => 'pending',
        ]);
    
        // Generate a unique transaction ID and prepare other data
        $transactionId = uniqid('TXN_', true);
        $amount = 1 * 100; // Example amount for a one-year subscription in paisa
    
        // Prepare request payload
        $payload = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'transactionId' => $transactionId,
            'amount' => $amount,
            'merchantOrderId' => 'ORDER' . time(),
            'callbackUrl' => route('subscription.callback'),
            'redirectUrl' => url('/subscription/success'),
            'expiryTime' => time() + 3600,
        ];
    
        // Generate checksum
        $payloadJson = json_encode($payload);
        $checksum = hash_hmac('sha256', $payloadJson, env('PHONEPE_SECRET_KEY'));
        $finalChecksum = $checksum . "###" . env('PHONEPE_SALT_KEY');
    
        // Prepare headers
        $headers = [
            'X-VERIFY' => $finalChecksum,
            'Content-Type' => 'application/json',
            'X-MERCHANT-ID' => env('PHONEPE_MERCHANT_ID'),
        ];
    
        // Send request to PhonePe
        $response = Http::withHeaders($headers)->post(env('PHONEPE_BASE_URL') . '/pg/v1/pay', $payload);
    
        // Log the response for debugging
        if ($response->successful()) {
            // Handle successful response
            Transaction::create([
                'user_id' => $userId,
                'transaction_id' => $transactionId,
                'order_id' => $payload['merchantOrderId'],
                'amount' => $amount,
                'status' => 'pending',
            ]);
            return redirect($response->json()['data']['instrumentResponse']['redirectUrl']);
        } else {
            // Log the entire response for debugging
            Log::error('PhonePe API Error', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);
            return response()->json(['error' => 'Payment initiation failed.', 'details' => $response->json()], 500);
        }
    }
    

    public function callback(Request $request)
    {
        $transactionId = $request->input('transactionId');
        $status = $request->input('status');

        // Update the transaction status
        $transaction = Transaction::where('transaction_id', $transactionId)->first();
        if ($transaction) {
            $transaction->status = $status;
            $transaction->transaction_date = now();
            $transaction->save();

            if ($status == 'completed') {
                $subscription = Subscription::where('user_id', $transaction->user_id)
                    ->where('status', 'pending')
                    ->first();

                if ($subscription) {
                    $subscription->status = 'active';
                    $subscription->start_date = now();
                    $subscription->end_date = now()->addYear();
                    $subscription->save();
                }
            }
        }

        return response()->json(['status' => 'success']);
    }

   
    
    public function successPage(Request $request)
    {
        // You can pass data like transaction ID or subscription details to the view
        $subscriptionId = $request->get('subscription_id');
        $package = $request->get('package_name');
    
        return view('subscription.success', compact('subscriptionId', 'package'));
    }
    
}
