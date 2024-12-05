<?php

namespace App\Http\Controllers;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    // Display a listing of the marks.
    public function index()
    {
        $quizResults = QuizResult::all();  // Correct the method call by adding parentheses
        return view('Admin.Mark.index', compact('quizResults'));
    }
    


    // In QuizResultController.php
public function destroy($id)
{
    $result = QuizResult::findOrFail($id); // Find the quiz result by ID
    $result->delete(); // Delete the result

    return redirect()->route('quiz_results.index') // Redirect to the index route
                     ->with('success', 'Quiz result deleted successfully.');
}

    
}
