<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // public function sendEmail(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'subject' => 'required',
    //         'message' => 'required',
    //     ]);

    //     $details = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'subject' => $request->subject,
    //         'message' => $request->message,
    //     ];

    //     Mail::to('shitalkatre370@gmail.com')->send(new \App\Mail\ContactMail($details));

    //     return back()->with('success', 'Your message has been sent successfully!');
    // }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Save the form data to the database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Prepare the details for email
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Send the email to the admin
        Mail::to('shitalkatre370@gmail.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
