<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Student;

use App\Models\SolutionFile;
use Illuminate\Http\Request;

class SolutionFileController extends Controller
{
     
    // Display a listing of solution files
     public function index()
     {
         $files = SolutionFile::all();
         return view('Admin.solution_files.index', compact('files'));
     }
 
     // Show the form for uploading a new file
     public function create()
     {
         return view('Admin.solution_files.create');
     }
 
     public function store(Request $request)
     {
         // Validate the incoming request
         $request->validate([
             'name' => 'required|string|max:255',
             'file' => 'required|file|mimes:pdf|max:2048', // Allow only PDF files and limit size to 2MB
         ]);
     
         // Store the file in the correct storage location
         $filePath = $request->file('file')->store('solution_files'); // Save in 'storage/app/public/solution'

         // Save the file information in the database
         SolutionFile::create([
             'name' => $request->input('name'),
             'file_path' => $filePath
         ]);
         
     
         return redirect()->route('Admin.solution_files.index')->with('success', 'File uploaded successfully.');
     }
     
 

     
     // Show a specific solution file
     public function show(SolutionFile $solutionFile)
     {
         return view('Admin.solution_files.show', compact('solutionFile'));
     }
 
     // Display the form to edit a file
     public function edit(SolutionFile $solutionFile)
     {
         return view('Admin.solution_files.edit', compact('solutionFile'));
     }
 
     // Update the file information
     public function update(Request $request, SolutionFile $solutionFile)
     {
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
 
         // Update file details
         $solutionFile->update([
             'name' => $request->input('name'),
             'uploaded_at' => now()
         ]);
 
         return redirect()->route('Admin.solution_files.index')->with('success', 'File details updated successfully.');
     }
 
     // Delete a file
     public function destroy(SolutionFile $solutionFile)
     {
         $solutionFile->delete();
         return redirect()->route('Admin.solution_files.index')->with('success', 'File deleted successfully.');
     }



     public function showPdf($id)
     {
         $file = SolutionFile::find($id);
         
         if (!$file) {
             abort(404, 'File not found.');
         }
     
         $filePath = $file->path;
         Log::info('Requested file path: ' . $filePath); // Log the file path
     
         // Ensure you're checking against the correct storage disk
         if (!Storage::disk('public')->exists($filePath)) {
             Log::error('File does not exist in storage: ' . $filePath);
             abort(404, 'File not found in storage.');
         }
     
         // Get the file content
         $fileContent = Storage::disk('public')->get($filePath);
     
         return response($fileContent, 200)
             ->header('Content-Type', 'application/pdf')
             ->header('Content-Disposition', 'inline; filename="'.basename($filePath).'"');
     }
     
        // Function to display PDF file in new tab
    public function viewPdf($id)
    {
        $file = SolutionFile::findOrFail($id);
        return response()->file(storage_path('app/' . $file->file_path));
    }
}
 

