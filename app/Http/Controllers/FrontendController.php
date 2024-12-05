<?php

namespace App\Http\Controllers;
use App\Models\Upload; // Assuming the model is created
use App\Models\class12 ; // Assuming the model is created
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function class11index()
    {
        $uploads = Upload::paginate(10); // Fetch paginated uploads (10 per page)
        return view('Admin.frontend.class11', compact('uploads')); // Pass data to the view
    }
    


    public function class12()
    {
        // Fetch paginated uploads (10 per page)
        $class12s = Class12::paginate(10); 
        return view('Admin.frontend.class12', compact('class12s')); // Pass data to the view
    }


    // Class11Controller.php
  // Function to store uploaded files
  public function store(Request $request)
  {
      // Validate the request
      $request->validate([
          'file' => 'required|file|max:2048', // Adjust the max size as needed
      ]);
  
      // Store the uploaded file in the 'public' disk
      $path = $request->file('file')->store('class11', 'public'); 
  
      // Create a new upload record in the database
      $upload = new Upload();
      $upload->file_name = $request->file('file')->getClientOriginalName();
      $upload->file_path = $path; // Save the path to the database
      $upload->file_type = $request->file('file')->getClientMimeType();
      $upload->save();
  
      return redirect()->route('Admin.frontend.class11')->with('success', 'File uploaded successfully.'); // Redirect with success message
  }
  


// Function to view a specific file
public function view($id)
{
    $upload = Upload::findOrFail($id); // Find the upload by ID
    
    // Construct the full file path
    $filePath = storage_path('app/public/' . $upload->file_path);

    
    // Check if the file exists
    if (!file_exists($filePath)) {
        return response()->json(['error' => 'File not found'], 404);
    }

    // Serve the file
    return response()->file($filePath);
}



// Function to delete a file
public function destroy($id)
{
    $upload = Upload::findOrFail($id); // Find the upload by ID

    // Delete the file from storage
    Storage::delete($upload->file_path);

    // Delete the record from the database
    $upload->delete();

    return redirect()->route('Admin.frontend.class11')->with('success', 'File deleted successfully.'); // Redirect with success message
}



  // Method to view a specific PDF file


  


  public function storee(Request $request) // Corrected method name
  {
      // Validate the request
      $request->validate([
          'file' => 'required|file|mimes:pdf|max:2048', // Adjust validation as needed
      ]);
  
      // Store the uploaded file in the 'public' disk
      $path = $request->file('file')->store('class12', 'public'); 
  
      // Create a new upload record in the database
      $class12 = new Class12(); // Change to the correct model
      $class12->file_name = $request->file('file')->getClientOriginalName();
      $class12->file_path = $path; // Save the path to the database
      $class12->file_type = $request->file('file')->getClientMimeType();
      $class12->save();
  
      return redirect()->route('Admin.frontend.class12')->with('success', 'File uploaded successfully.');
  }

  public function viewPdf($id)
  {
      $upload = Upload::findOrFail($id); // Fetch the upload record
  
      // Construct the full path to the file
      $filePath = storage_path('app/public/' . $upload->file_path);
  
      // Check if the file exists
      if (!file_exists($filePath)) {
          abort(404, 'File not found.'); // Return a 404 error if the file doesn't exist
      }
  
      // Serve the file if it exists
      return response()->file($filePath, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
      ]);
  }
  
  // Method to delete a file
  public function destroye($id)
  {
      $class12 = Class12::findOrFail($id);

      // Delete the file from storage
      Storage::delete($class12->file_path);
      
      // Delete the record from the database
      $class12->delete();

      return redirect()->back()->with('success', 'File deleted successfully!');
  }

}
