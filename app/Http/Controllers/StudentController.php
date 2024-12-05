<?php
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use App\Mail\StudentRegistered; 
use App\Models\Student;
use App\Models\Upload;
use App\Models\class12 ; // Assuming the model is created

use App\Mail\ContactMail; // Make sure this line is correct

use Session;

use App\Models\TestSeriesPackage;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    

    public function frontendindex()
    {
        $packages = TestSeriesPackage::all();  // Corrected syntax
        return view('index', compact('packages'));
    }
    

    public function frontendterms()
    {
        return view('frontend.terms_and_condition');
    }

    public function Privacy_Policy()
    {
        return view('frontend.Privacy_Policy');
    }

    public function Refund()
    {
        return view('frontend.Refund');
    }


    public function frontendcontact()
    {
        return view('frontend.contact');
    }

   

    public function checkout($package_id)
    {
        $package = TestSeriesPackage::find($package_id);
        $user = Auth::user();
    
        if (!$package || !$user) {
            return redirect()->route('exam.index')->withErrors(['message' => 'Invalid package or user not authenticated.']);
        }
    
        return view('frontend.Checkout', compact('package', 'user'));
    }
    



    public function frontendclass12()
    {
        $class12s  = class12::all(); // Fetch paginated uploads (10 per page)
        return view('frontend.class12thpassed', compact('class12s')); // Pass data to the view
    }

    

    public function frontendfreemock()
    {
        return view('frontend.freemock');
    }


    public function frontendclassxifreemock()
    {
        return view('frontend.classxifreemocktest');
    }
    public function frontendclassfullsylabuspaper()
    {
        return view('frontend.classfullsylabuspaper');
    }

    public function frontendsolution()
    {
        return view('frontend.XIISolution');
    }


    public function frontendsolutionXI()
    {
        return view('frontend.XISolution');
    }


    public function frontendclass1()
    {
        $uploads = Upload::all();  // Corrected syntax
        return view('frontend.class12th', compact('uploads'));
    }


   


 public function index()
{
    return view('student.login');
}

public function showForgotPasswordForm()
{
    return view('student.forgot-password');
}


public function showregisterForm()
{
    return view('student.register'); // Ensure 'login' view exists
}

public function login(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Get credentials from the request
        $credentials = $request->only('email', 'password');

        // Check if the student exists
        $student = Student::where('email', $credentials['email'])->first();
        
        if (!$student) {
            return redirect()->back()->withErrors(['error' => 'Email not found!']);
        }

        // Attempt to log in using the student guard
        if (Auth::guard('student')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Redirect to exam dashboard on successful login
            return redirect()->route('exam.index')->with('success', 'You have successfully logged in!');
        }

        // If authentication fails, return with error
        return redirect()->back()->withErrors(['error' => 'Oops! Invalid credentials.']);
    }

// Handle login
// public function login(Request $request)
// {
//     $request->validate([
//         'username' => 'required|string',
//         'password' => 'required|string',
//     ]);

//     // Attempt to log in the user
//     if (Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password])) {
//         return redirect()->intended('exam.index'); // Redirect to the intended route after login
//     }

//     return back()->withErrors(['message' => 'Invalid credentials.']);
// }



public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'dob' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'course' => 'required|in:XI,XII,XII PASS', // Validate course
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'username' => 'required|string|unique:students,username',
        'password' => 'required|string|confirmed|min:8',
        'category' => 'required|in:general,obc,sc,st',
        'reference' => 'nullable|string|max:255',
    ]);

    $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'course' => $request->course,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'username' => $request->username,
        'password' => $request->password, // Hash the password
        'category' => $request->category,
        'reference' => $request->reference,
    ]);

    // Log the student in and redirect to dashboard
    Auth::guard('student')->login($student);
    
    // Send registration email
    Mail::to($student->email)->send(new StudentRegistered($student));

    // Redirect to login page with a success message
    return redirect()->route('student.login')->with([
        'success' => 'Great! You have Successfully loggedin.',
    ]);
}


    // // Handle registration
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:students',
    //         'dob' => 'required|date',
    //         'gender' => 'required|in:male,female,other',
    //         'father_name' => 'required|string|max:255',
    //         'mother_name' => 'required|string|max:255',
    //         'category' => 'required|in:general,obc,sc,st',
    //         'username' => 'required|string|max:255|unique:students',
    //         'password' => 'required|string|min:8|confirmed',
    //         'course' => 'required|in:XI,XII,XII PASS',
    //     ]);

    //     Student::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'dob' => $request->dob,
    //         'gender' => $request->gender,
    //         'father_name' => $request->father_name,
    //         'mother_name' => $request->mother_name,
    //         'category' => $request->category,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'course' => $request->course,
    //     ]);

    //     return redirect()->route('student.login')->with('success', 'Registration successful. Please log in.');
    // }




  public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/login');
    }

   
    public function sendResetLink(Request $request)
{
    // Validate the email address
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:students,email', // Ensure email exists in the students table
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Use the 'students' broker to send the password reset link
    $response = Password::broker('students')->sendResetLink(
        $request->only('email')
    );

    // Check if the link was sent successfully
    if ($response === Password::RESET_LINK_SENT) {
        return back()->with('status', 'Password reset link sent! Please check your email.');
    }

    // If sending fails, return with an error
    return back()->withErrors(['email' => 'Unable to send password reset link.']);
}

    
public function send(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Prepare the data for the email
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
    ];

    // Send the email (you can use a Mailable class for better organization)
    Mail::to('info@monarchinstitute.in')->send(new ContactMail($data));

    // Flash a success message to the session
    return back()->with('success', 'Your message has been sent successfully!');
}
  
}
  

