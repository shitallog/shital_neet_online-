<?php

namespace App\Http\Controllers;
use App\Mail\StudentRegistered; 
use App\Models\Student;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class studentuserController extends Controller
{
  
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Debugging: Check if users are being fetched
        // Uncomment the line below to check the data
        // dd($users);

        // Pass the users to the view
        return view('Admin.User.index', compact('users'));
    }
    
    
    




    // Delete a subject
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Retrieve user by ID
        $user->delete(); // Delete user
        return redirect()->route('Admin.user.index')->with('success', 'User deleted successfully.');
    }
    


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'username' => 'required|string|unique:students,username',
            'password' => 'required|string|confirmed|min:8',
            'category' => 'required|in:general,obc,sc,st',
            'reference' => 'nullable|string|max:255',
            'cash' => 'required|numeric|min:0',
        ]);
    
        $users = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'username' => $request->username,
            'password' => $request->password,
            'category' => $request->category,
            'reference' => $request->reference,
            'cash' => $request->cash,
        ]);
    
         // Send registration email
        Mail::to($users->email)->send(new StudentRegistered($users));
    
       // Redirect to login page with a success message
       return redirect()->route('Admin.User.index')->with([
        'success' => 'Registration successful! Your registration ID is: ' .  $users->id
    ]);
    }
}
