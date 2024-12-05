<?php

namespace App\Http\Controllers;
use App\Models\File;
use App\Models\Question;

use Illuminate\Http\Request;

class uplodeControllerName extends Controller
{
   

public function uploadFile(Request $request)
{
    // Upload file logic
    $file = new File();
    $file->name = $request->file('file')->getClientOriginalName();
    $file->path = $request->file('file')->store('pdfs'); // Adjust the path as needed
    $file->uploaded_at = now(); // Store the current timestamp
    $file->save();
}


public function ansEdit($id)
{
    $question = Question::where('id', $id)->firstOrFail();

    return view('Admin.Q&A.ansedit', compact('question'));
}

public function update(Request $request, $id)
{
    // Find the question or fail if not found
    $question = Question::findOrFail($id);

    // Validate the incoming request
    $request->validate([
        'correct_answer' => 'required|string|max:255',
        'solution_text' => 'required|string',
        'math_field_solution' => 'nullable|string', // Optional field
       
    ]);

    // Update the question with validated data
    $question->update($request->all());

    // Redirect to the desired route after update
    return redirect()->route('Admin.Q&A.Ansview')->with('success', 'Question updated successfully.');
}


}
