<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentDetailsMail; 
use App\Mail\StudentRegistrationMail; 
use Illuminate\Http\Request;
use App\Models\User;

class studentdashboardController extends Controller
{

    public function index()
    {
        $users = User::all();
        
        return view('Admin.User.index', compact('users'));

    }




    public function showStudentDetails($id)
    {
        $users = User::findOrFail($id);
        return view('Admin.User.student-details', compact('users'));
    }



    public function showRegistrationForm()
    {
        return view('Admin.User.create');
    }

    
    public function  registration_student()
    {
        return view('Admin.User.registration_student');
    }
   


   // public function Studentdashboard()
   // {
        // You can pass data to the view if needed
      //  return view('Admin.User.index');
   // }
    public function create()
    {
        // You can pass data to the view if needed
        return view('Admin.User.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'payment_status' => 'required|in:cash,online',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'payment_status' => $request->payment_status,
            'registration_number' => strtoupper(uniqid('REG_')), // Generating unique registration number
        ]);

       // Sending email
       Mail::to($users->email)->send(new StudentDetailsMail($users));

        return redirect('/register')->with('success', 'Registration successful! Check your email for the registration number.');
    }


    

}
