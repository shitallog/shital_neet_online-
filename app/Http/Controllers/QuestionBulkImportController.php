<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel; // If using Laravel Excel for CSV processing
use Illuminate\Support\Facades\Storage;
use App\Imports\QuestionsImport; // Assuming you create this import class

use Illuminate\Http\Request;

class QuestionBulkImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'csvQuestion' => 'required|file|mimes:csv,txt', // Validate that the file is a CSV
        ]);

        // Store the uploaded file
        $path = $request->file('csvQuestion')->store('uploads');

        // Process the CSV file (you can use Laravel Excel for this)
        Excel::import(new QuestionsImport, storage_path('app/' . $path));

        return redirect()->back()->with('success', 'Questions imported successfully!');
    }
}
