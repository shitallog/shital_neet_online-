<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Mail\PaymentSuccessMail; 
use Illuminate\Support\Facades\Mail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('Admin.Payment.index', compact('payments'));
    }


    public function confirm_payment()
    {
      
        return view('Admin.Payment.index');
    }

    public function failedPayment()
    {
        return view('frontend.payment-failed')->with('error', 'Payment failed. Please try again.');
    }
    
//    public function submitPayment(Request $request)
//     {
//         // Step 1: Validate the form inputs
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email',
//             'mobile' => 'required|numeric|digits:10', // Ensures 10 digits for mobile
//             'amount' => 'required|numeric|min:1',
//         ], [
//             'name.required' => 'Name is required.',
//             'email.required' => 'Email is required.',
//             'mobile.required' => 'Mobile number is required.',
//             'amount.required' => 'Amount is required.',
//         ]);

//         // Step 2: Capture the inputs
//         $name = $request->input('name');
//         $email = $request->input('email');
//         $mobile = $request->input('mobile');
//         $amount = $request->input('amount');

//         // Step 3: Prepare the payment data for API
//         $merchantId = 'M22YDXMVXLJUX';
//         $apiKey = 'f25edd43-49ef-46e8-a0e1-a8b9269603d2';
//         $redirectUrl = route('frontend.payment_success'); 
//         $order_id = uniqid();  // Generate a unique order ID

//         $transaction_data = [
//             'merchantId' => $merchantId,
//             'merchantTransactionId' => $order_id,
//             'merchantUserId' => $order_id,
//             'amount' => $amount * 100,  // Amount in the smallest currency unit (e.g., paise for INR)
//             'redirectUrl' => $redirectUrl,
//             'redirectMode' => 'POST',
//             'callbackUrl' => $redirectUrl,
//             "paymentMethod" => "UPI",
//             'paymentInstrument' => [
//                 'type' => 'PAY_PAGE',  // Assuming PAY_PAGE is correct for your setup
//             ],
//         ];

//         // Step 4: Encode the transaction data
//         $encode = json_encode($transaction_data);
//         $payloadMain = base64_encode($encode);
//         $salt_index = 1; // Ensure correct key index
//         $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
//         $sha256 = hash("sha256", $payload);
//         $final_x_header = $sha256 . '###' . $salt_index;
//         $request_data = json_encode(['request' => $payloadMain]);

//         // Step 5: Send the request to PhonePe API using cURL
//         $curl = curl_init();

//         curl_setopt_array($curl, [
//             CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",  // Ensure the URL is correct
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => "",
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => "POST",
//             CURLOPT_POSTFIELDS => $request_data,
//             CURLOPT_HTTPHEADER => [
//                 "Content-Type: application/json",
//                 "X-VERIFY: " . $final_x_header,
//                 "accept: application/json"
//             ],
//         ]);

//         $response = curl_exec($curl);
//         $err = curl_error($curl);
//         curl_close($curl);

//         if ($err) {
//             return response()->json(['error' => "cURL Error: " . $err], 500);
//         } else {
//             $res = json_decode($response);
            
//             $userId = Auth::id(); // Get the logged-in user's ID
//             // Step 6: Save the payment details into the database
//             $data = [
//                 'amount' => $amount,
//                 'transaction_id' => $order_id,
//                 'payment_status' => 'PAYMENT_PENDING',
//                 'response_msg' => $response,
//                 'providerReferenceId' => '',
//                 'merchantOrderId' => '',
//                 'checksum' => '',
//                 'user_id' => $userId , // Add user_id here
//                 'payment_method' => 'PhonePe', // Add the payment method here
//             ];
//             Payment::create($data); // Ensure you have the Payment model and it is set up correctly
//             // Step 7: Check if payment initiation was successful
//             if (isset($res->code) && $res->code == 'PAYMENT_INITIATED') {
//                 $payUrl = $res->data->instrumentResponse->redirectInfo->url;
//                 // Step 8: Redirect the user to the payment page
//                 return redirect()->away($payUrl);
//             } else {
//                 // Handle error if payment initiation failed
//                 return redirect()->route('frontend.payment-failed')->withErrors('Payment initiation failed. Please try again.');

//             }
//         }
//     }

//     public function successPayment(Request $request)
//     {
//         Log::info('Payment Success Response:', $request->all());
//         // Get the response from the payment gateway
//         $paymentStatus = $request->input('status'); // Status of the payment (success, failure, etc.)
//         $transactionId = $request->input('transactionId'); // Transaction ID from PhonePe response
//         $orderId = $request->input('merchantOrderId'); // Merchant's order ID
//         $amount = $request->input('amount'); // Amount paid
//         $paymentGatewayResponse = json_encode($request->all()); // The entire response from the payment gateway
        
//         // Validate the received data (ensure all fields are present)
//         if ($paymentStatus != 'success') {
//             return redirect()->route('frontend.payment-failed')->with('error', 'Payment failed. Please try again.');
//         }

//         // Get the current authenticated user
//         $user = Auth::user(); // Fetch the authenticated user's instance
//         if (!$user) {
//         return redirect()->route('login')->withErrors('Please log in to complete the payment.');
//         }


//         // Store payment details in the database
//         $paymentData = [
//             'transaction_id' => $transactionId,
//             'amount' => $amount / 100, // Convert back from paisa to INR
//             'payment_status' => 'PAYMENT_SUCCESS', // Status after successful payment
//             'response_msg' => $paymentGatewayResponse, // Store the entire response from PhonePe
//             'user_id' => $user->id,
//             'payment_method' => 'PhonePe', // Payment method used
//             'payment_gateway' => 'PhonePe', // Gateway name
//             'merchant_order_id' => $orderId,
//         ];

//         // Save to the database
//         $payment = Payment::create($paymentData);

//         // Send email to the user (if needed)
//         Mail::to($user->email)->send(new PaymentSuccessMail($payment));

//         // Return a view to show the success page
//         return view('frontend.payment_success', compact('payment'));
//     }




    public function paymentFailed()
    {
        return view('frontend.payment-failed');
    }


}
