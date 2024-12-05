<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     // Constructor to ensure user is authenticated before accessing any methods
  

   public function show(Request $request)
    {
        $user = Auth::user(); // Use the default guard to get the authenticated user
        return view('exam.profile', compact('user'));
    }


    // public function editProfile()
    // {
    //     $student = Auth::guard('student')->user();
    //     return view('student.edit-profile', compact('student'));
    // }
    public function updateProfile(Request $request)
    {
        $student = Auth::guard('student')->user();
    
        if (!$student) {
            return redirect()->route('login')->with('error', 'Please log in to update your profile.');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'password' => 'nullable|string|confirmed|min:8',
        ]);
    
        $student->name = $request->name;
        $student->email = $request->email;
    
        // Update password if provided
        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }
    
        $student->save(); // This line should work if $student is a valid Eloquent model
    
        return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
    }
    
     
}
