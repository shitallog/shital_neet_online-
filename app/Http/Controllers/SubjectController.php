<?php

namespace App\Http\Controllers;
use App\Models\Subject; // Make sure to import the Subject model
use App\Models\Exam;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // List all subjects
    public function index()
    {
        // Fetch all subjects from the database
        $subjects = Subject::all(); // or use ->paginate() if you want pagination

        // Pass the subjects to the view
        return view('Admin.subjects.index', compact('subjects'));
    }

    // Show form to create a new subject
    public function create()
    {
        return view('Admin.subjects.create');
    }

    // Store a newly created subject
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name',
           
        ]);

        Subject::create([
            'name' => $request->name,
           
        ]);

        return redirect()->route('Admin.subjects.index')->with('success', 'Subject created successfully.');
    }

     // Method to view a specific subject
     public function view($id)
     {
         $subject = Subject::findOrFail($id);
         return view('Admin.subjects.view', compact('subject')); // Create view file
     }
 
     // Method to edit a specific subject
    

     // Show the form to edit a specific subject
     public function edit($id)
    {
        // Fetch the specific subject by ID
        $subject = Subject::findOrFail($id); // Use findOrFail to handle non-existent subjects

        // Pass the subject to the edit view
        return view('Admin.subjects.edit', compact('subject'));
    }
     // Update a specific subject
     public function update(Request $request, $id)
     {
         $subject = Subject::findOrFail($id);
         
         // Validate the request data
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
     
         // Update the subject
         $subject->name = $request->input('name');
         $subject->save();
     
         return redirect()->route('Admin.subjects.index')->with('success', 'Subject updated successfully.');
     }
     
    // Delete a subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('Admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function  markindex(){


        $exams = Exam::all(); // Fetch all exams
        return view('Admin.Exam.index', compact('exams'));
       

    }

    public function  markcreate(){
        return view('Admin.Exam.create');

    }
     


    // Store a newly created subject
    public function markstore(Request $request)
    {
      $validated = $request->validate([
        'exam_name' => 'required|string|max:255',
        'started_date' => 'nullable|date',
        'finish_date' => 'nullable|date',
        'time_limit' => 'required|string',
        'attempt' => 'required|integer|min:0', // Should be a non-negative integer

    ]);


    $exam = new Exam();
    $exam->exam_name = $validated['exam_name'];
    $exam->started_date = $validated['started_date'] ?? null;
    $exam->finish_date = $validated['finish_date'] ?? null;
    $exam->time_limit = $validated['time_limit'];
    $exam->attempt = $validated['attempt'];

    $exam->save();
        return redirect()->route('Admin.Exam.index')->with('success', 'exam created successfully.');
    }



    public function markedit($id)
    {
        $exam = Exam::findOrFail($id); // Retrieve exam or throw 404
        return view('Admin.Exam.edit', compact('exam')); // Return the view with the exam data
    }
    
    public function markupdate(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'exam_name' => 'required|string|max:255',
            'started_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
            'time_limit' => 'required|string',
            'attempt' => 'required|integer|min:1',
        ]);
    
        // Find the exam by id
        $exam = Exam::findOrFail($id);
    
        // Update the fields directly
        $exam->exam_name = $validated['exam_name'];
        $exam->started_date = $validated['started_date'] ?? null;
        $exam->finish_date = $validated['finish_date'] ?? null;
        $exam->time_limit = $validated['time_limit'];
        $exam->attempt = $validated['attempt'];
    
        // Save the updated exam
        $exam->save();
    
        // Redirect back with a success message
        return redirect()->route('Admin.Exam.index')->with('success', 'Exam updated successfully!');
    }
    
    
public function markdestroy($id)
{
    $exam = Exam::findOrFail($id); // Find the exam by id
    $exam->delete(); // Delete the exam

    // Redirect back with a success message
    return redirect()->route('Admin.Exam.index')->with('success', 'Exam deleted successfully!');
}

public function markview($id)
{
    $exam = Exam::findOrFail($id);
    return view('Admin.Exam.view', compact('exam'));
}



}












