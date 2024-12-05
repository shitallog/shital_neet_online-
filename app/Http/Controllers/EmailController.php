<?php

namespace App\Http\Controllers;
use App\Mail\EmailCustomMail; 
use App\Models\User;

use App\Models\Student;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function index()
    {
        $Emails = Email::all();
        return view('Admin.Email.index', compact('Emails'));
    }

    public function create()
    {
        return view('Admin.Email.create');
    }

     
    
 public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'photo' => 'nullable|image|max:2048',
        'details' => 'required|string',
        
    ]);

    $email = new Email();
    $email->title = $request->title;
    $email->start_date = $request->start_date;
    $email->end_date = $request->end_date;
    $email->details = $request->details;
  

    if ($request->hasFile('photo')) {
        $filePath = $request->file('photo')->store('photos', 'public');
        $email->photo = $filePath;
    }

    $email->save();

   

    return redirect()->route('Admin.Email.index')
    ->with('success', 'Email created successfully.');
}

    
    
    
 
     // Show the form for editing an existing Email
     public function edit(Email $Email)
     {
         return view('Admin.Email.edit', compact('Email'));
     }
 
     // Update an existing Email
     public function update(Request $request, Email $Email)
     {
         $request->validate([
             'title' => 'required',
             'start_date' => 'required|date',
             'end_date' => 'required|date|after_or_equal:start_date',
             'photo' => 'image|mimes:jpeg,png,pdf,jpg,gif,svg|max:2048',
             'details' => 'required',
         ]);
 
         if ($request->hasFile('photo')) {
             // Delete the old photo
             if ($Email->photo) {
                 Storage::disk('public')->delete($Email->photo);
             }
             // Store the new photo
             $photoPath = $request->file('photo')->store('photos', 'public');
         } else {
             $photoPath = $Email->photo;
         }
 
         $Email->update([
             'title' => $request->title,
             'start_date' => $request->start_date,
             'end_date' => $request->end_date,
             'photo' => $photoPath,
             'details' => $request->details,
         ]);
 
         return redirect()->route('Admin.Email.index')
                          ->with('success', 'Email updated successfully.');
     }
 
     // Delete an existing Email
     public function destroy(Email $Email)
     {
         if ($Email->photo) {
             Storage::disk('public')->delete($Email->photo);
         }
         $Email->delete();
         return redirect()->route('Admin.Email.index')
                          ->with('success', 'Email deleted successfully.');
     }


     protected function sendEmailToStudents($email)
     {
        $users = User::all();
     
         foreach ($users as $user) {
             Mail::send('emails.notification', ['email' => $email], function ($message) use ($user, $email) {
                 $message->to($user->email);
                 $message->subject($email->title);
             });
         }
     }


    public function activate($id)
{
    $email = Email::findOrFail($id);
    
    // Toggle status
    $email->status = !$email->status;
    $email->save();

    // If the status is active, send the email to all students
    if ($email->status) {
        $users = user::all(); // Adjust this query as needed

        foreach ($users as $user) {
            Mail::to($user->email)->send(new EmailCustomMail($email));
        }
    }

    return redirect()->route('Admin.Email.index')->with('success', 'Email status updated and emails sent if activated.');
}

}
