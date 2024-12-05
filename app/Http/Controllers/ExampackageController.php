<?php

namespace App\Http\Controllers;
use App\Models\ExamPackage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ExampackageController extends Controller
{
    // Display all packages
    public function index()
    {
        $packages = ExamPackage::all();
        return view('Admin.packages.index', compact('packages'));
    }


    public function show($id)
{
    // Fetch the package by its ID
    $package = ExamPackage::findOrFail($id);  // Using findOrFail to handle no

    // Return the view with the package data
    return view('Admin.packages.details', compact('package'));
}

    // Show form to create a package
    public function create(Request $request)
    {
        $examId = $request->input('exam_id');
        return view('Admin.packages.create', compact('examId'));
    }


    
    // <!-- <a href="{{ route('Admin.package.details', $package->id) }}">View Details</a>   -->

    // Store a new package
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'exams' => 'required|array',
        'payment_type' => 'required|in:free,paid',
        'amount' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'active' => 'nullable|boolean', // Validate active as a boolean value
    ]);

    $data = $request->all();
    $data['exams'] = json_encode($request->exams);

    // Handle the 'active' field: Convert 'on' to 1 and absence to 0
    $data['active'] = $request->has('active') ? 1 : 0;

    // Handle the image upload if present
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('packages', 'public');
    }

    ExamPackage::create($data);

    return redirect()->route('Admin.packages.index')->with('success', 'Package created successfully.');
}


    // Show form to edit a package
    public function edit(ExamPackage $package)
    {
        return view('Admin.packages.edit', compact('package'));
    }

    // Update an existing package
    public function update(Request $request, ExamPackage $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'exams' => 'required|array',
            'payment_type' => 'required|in:free,paid',
            'amount' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'active' => 'nullable|boolean', // Validate active as a boolean value
        ]);
    
        $data = $request->all();
        $data['exams'] = json_encode($request->exams);
    
        // Handle the 'active' field: Convert 'on' to 1 and absence to 0
        $data['active'] = $request->has('active') ? 1 : 0;
    
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages', 'public');
        }
    
        $package->update($data);
    
        return redirect()->route('Admin.packages.index')->with('success', 'Package updated successfully.');
    }
    


    // Toggle the active status of a package
public function toggleActive(ExamPackage $package)
{
    // Flip the current active status
    $package->active = !$package->active;
    $package->save();

    // Redirect back with a success message
    return redirect()->route('Admin.packages.index')->with('success', 'Package status updated successfully.');
}

    // Delete a package
    public function destroy(ExamPackage $package)
    {
        $package->delete();
        return redirect()->route('Admin.packages.index')->with('success', 'Package deleted successfully.');
    }


    public function showStudentPackages()
    {
        $packages = \App\Models\ExamPackage::where('active', true)->get();  // Retrieve active packages
        return view('exam.index', compact('packages'));  // Pass packages to student view
    }

    // public function initiate($packageId)
    // {
    //     $package = ExamPackage::find($packageId);
    
    //     if ($package) {
    //         // Generate order and payment details
    //         $orderId = 'order_' . uniqid();
    //         $amount = $package->payment_type == 'paid' ? $package->amount : 0;
    
    //         // Payment data to send to PhonePe
    //         $paymentData = [
    //             'merchant_id' => env('PHONEPE_MERCHANT_ID'), // Your PhonePe Merchant ID
    //             'order_id' => $orderId,
    //             'amount' => $amount,
    //             'callback_url' => route('payment.response'), // URL to which PhonePe will send response
    //         ];
    
    //         // Send payment data to PhonePe API
    //         $response = $this->sendToPhonePe($paymentData);
    
    //         if ($response->status == 'success') {
    //             // Redirect to PhonePe's payment gateway
    //             return redirect($response->payment_url);
    //         } else {
    //             // Handle failure
    //             return redirect()->route('Admin.packages.details', $packageId)->with('error', 'Payment initiation failed');
    //         }
    //     } else {
    //         return redirect()->route('Admin.packages.index')->with('error', 'Package not found');
    //     }
    // }
    // private function sendToPhonePe($data)
    // {
    //     // Make HTTP POST request to PhonePe API
    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . env('PHONEPE_API_KEY'), // API Key from .env file
    //         'Content-Type' => 'application/json',
    //     ])->post('https://api.phonepe.com/apis/hermes/pg/v1/pay', $data);
    
    //     // Check if the request was successful
    //     if ($response->successful()) {
    //         $responseData = $response->json(); // Decode the response
    
    //         // Assuming the response has these fields
    //         if ($responseData['status'] == 'success') {
    //             return (object)[
    //                 'status' => 'success',
    //                 'payment_url' => $responseData['payment_url'] // URL to PhonePe's payment page
    //             ];
    //         }
    //     }
    
    //     // Handle failure response from PhonePe API
    //     return (object)[
    //         'status' => 'failure',
    //         'message' => $response->body() // You can log this message for debugging
    //     ];
    // }
 


    // public function response(Request $request)
    // {
    //     // Validate and extract the response from PhonePe
    //     $paymentStatus = $request->input('status');
    //     $transactionId = $request->input('transaction_id');
    //     $orderId = $request->input('order_id');
    
    //     // Check if the payment is successful
    //     if ($paymentStatus == 'success') {
    //         // Process payment success, for example, update the package status
    //         // Example: You can update the package's status to 'paid'
    //         $package= ExamPackage::where('order_id', $orderId)->first();
    //         if ($package) {
    //             $package->update(['payment_status' => 'paid', 'transaction_id' => $transactionId]);
    //         }
    
    //         return redirect()->route('exam.starttest')->with('success', 'Payment successful!');
    //     } else {
    //         // Handle payment failure
    //         return redirect()->route('exam.index')->with('error', 'Payment failed!');
    //     }
    // }
    





    
}
