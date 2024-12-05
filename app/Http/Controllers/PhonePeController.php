<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Subscription;
use App\Models\ExamPackage;
use Illuminate\Support\Facades\Log; // Import Log Facade
use App\Models\User;

use App\Mail\PaymentSuccessEmail;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PhonePeController extends Controller
{
    
    
     public function index()
    {
        return view('Admin.packages.payment_status'); // Make sure this view exists
    }
    
   
  public function phonePe()
{
    // User data (adjust to actual user)
    $userId = Auth::id(); // Fetch the authenticated user's ID
    
    $subscription = Subscription::create([
        'user_id' => $userId,
        'status' => 'pending',
    ]);

    // Prepare data for the PhonePe payment
    $data = array(
        'merchantId' => 'M22YDXMVXLJUX',
        'merchantTransactionId' => uniqid(),
        'merchantUserId' => 'MUID123',
        'amount' => 1,
        'redirectUrl' => route('response'),
        'redirectMode' => 'POST',
        'callbackUrl' => route('response'),
        'mobileNumber' => '9167474578',
        'paymentInstrument' => array(
            'type' => 'PAY_PAGE',
        ),
    );

    // Encode data for PhonePe API request
    $encode = base64_encode(json_encode($data));

    // Create the X-VERIFY header for secure communication
    $saltKey = 'f25edd43-49ef-46e8-a0e1-a8b9269603d2';
    $saltIndex = 1;
    $string = $encode . '/pg/v1/pay' . $saltKey;
    $sha256 = hash('sha256', $string);
    $finalXHeader = $sha256 . '###' . $saltIndex;

    // PhonePe API URL
    $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";

    // Make the API request to PhonePe
    $response = Curl::to($url)
        ->withHeader('Content-Type:application/json')
        ->withHeader('X-VERIFY:' . $finalXHeader)
        ->withData(json_encode(['request' => $encode]))
        ->post();

    // Decode the response from PhonePe
    $rData = json_decode($response);

    // Check if PhonePe returned the expected redirect URL
    if (isset($rData->data->instrumentResponse->redirectInfo->url)) {

        // Create the transaction record in your database
        Transaction::create([
            'user_id' => $userId,
            'transaction_id' => $data['merchantTransactionId'],  // Use the transaction ID you generated
            'order_id' => $data['merchantTransactionId'],  // You may want to use a different order ID
            'amount' => $data['amount'],
            'status' => 'pending',
        ]);

        // Redirect the user to PhonePe for payment
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    } else {
        // Handle error if the URL is not returned
        return response()->json(['error' => 'Failed to initiate payment.'], 500);
    }
}





    
    
    
public function response(Request $request)
{
    $userId = Auth::id(); // Get the authenticated user's ID

    $request->validate([
        'transactionId' => 'required|string',
        'status' => 'nullable|string|in:pending,completed,failed',
        'merchantId' => 'required|string',
    ]);

    $transactionId = $request->input('transactionId');
    $status = $request->input('status', 'pending');
    $merchantId = $request->input('merchantId');

    // Fetch the transaction from the database
    $transaction = Transaction::where('transaction_id', $transactionId)->first();

    if (!$transaction) {
        return response()->json(['status' => 'failed', 'message' => 'Transaction not found'], 404);
    }

    // If the status is completed, directly update the transaction and subscription
    if ($status === 'completed') {
        // Update transaction status to completed
        $transaction->update([
            'status' => 'completed',
            'transaction_date' => now(),
        ]);

        // Check if the user has a pending subscription
        $subscription = Subscription::where('user_id', $transaction->user_id)
            ->where('status', 'pending')
            ->first();

        if ($subscription) {
            $subscription->update([
                'status' => 'active',
                'start_date' => now(),
                'end_date' => now()->addYear(),
            ]);
        }

        // Update the user's is_paid status to true
        $user = User::find($transaction->user_id);
        $user->update(['is_paid' => true]);

        // Return success response and redirect URL
        return response()->json([
            'status' => 'success',
            'message' => 'Payment confirmed',
            'redirect' => route('exam.starttest', ['userId' => $transaction->user_id])
        ]);
    }

    // If the status is pending, call the PhonePe status API to verify payment
    $saltKey = 'f25edd43-49ef-46e8-a0e1-a8b9269603d2'; // Example saltKey (this should be kept secure)
    $saltIndex = 1; // Index for the salt (specific to your integration)

    // Prepare the string for the X-VERIFY header
    $verificationString = '/pg/v1/status/' . $merchantId . '/' . $transactionId . $saltKey;
    $finalXHeader = hash('sha256', $verificationString) . '###' . $saltIndex;

    try {
        // Send the API request to PhonePe to get the payment status
        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/' . $merchantId . '/' . $transactionId)
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('X-VERIFY: ' . $finalXHeader)
            ->withHeader('X-MERCHANT-ID: ' . $merchantId)
            ->get();

        // Log the response for debugging (optional)
        \Log::info('PhonePe API Response: ' . $response);

        // Decode the response from PhonePe
        $responseData = json_decode($response);
        //  dd($responseData->data->responseCode);
        // Check if the response status is SUCCESS
        if (isset($responseData->data->responseCode) && $responseData->data->responseCode === 'SUCCESS') {
            // Update the transaction status to completed
            $transaction->update([
                'status' => 'completed',
                'transaction_date' => now(),
            ]);

            // Update the subscription status
            $subscription = Subscription::where('user_id', $transaction->user_id)
                ->where('status', 'pending')
                ->first();

            if ($subscription) {
                $subscription->update([
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                ]);
            }

            // Update the user's is_paid status to true
            $user = User::find($transaction->user_id);
            $user->update(['is_paid' => true]);

            // Return success response with the correct redirect URL
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Payment confirmed',
            //     'redirect' => route('exam.starttest', ['userId' => $transaction->user_id]) // Redirect to the exam page
            // ]);
            return redirect()->route('exam.starttest')->with('success', 'Payment confirmed');
            
            
        } elseif (isset($responseData->data->responseCode) && $responseData->data->responseCode === 'PENDING') {
            // Payment is still being processed
            return response()->json(['status' => 'pending', 'message' => 'Payment is still being processed, please try again later']);
        }

        // If response status is not SUCCESS or PENDING
        return response()->json(['status' => 'failed', 'message' => 'Payment verification failed'], 500);
        
    } catch (\Exception $e) {
        // Handle any exception that may occur during the API request
        return response()->json(['status' => 'failed', 'message' => 'API request failed', 'error' => $e->getMessage()], 500);
    }
}














}
