<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\File;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();

        return view('Admin.Notification.index',compact('notifications'));
    }

    public function activate($id)
    {
        $notification = Notification::findOrFail($id);
        
        // Toggle status
        $notification->status = !$notification->status;
        $notification->save();
    
        return redirect()->route('Admin.Notification.index')->with('success', 'Notification status updated.');
    }
    
    // public function Qution()
    // {
    //     return view('exam.Qution_paper');
    // }

    public function create()
    {
        return view('Admin.Notification.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'notice' => 'required|string',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);
    
        // Create a new Notification instance
        $notification = new Notification();
        $notification->title = $request->input('title');
        $notification->date = $request->input('date');
        $notification->notice = $request->input('notice');
    
        // Handle PDF file upload
        if ($request->hasFile('pdf')) {
            try {
                $file = $request->file('pdf');
                // Debug output to check file details
                Log::info('File details: ', [
                    'name' => $file->getClientOriginalName(),
                    'mime' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ]);
    
                $path = $file->store('pdf', 'public');
                $notification->pdf = $path;
            } catch (\Exception $e) {
                // Log error and return a user-friendly message
                Log::error('File upload error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'There was an error uploading the file.');
            }
        }
    
        // Save the Notification to the database
        $notification->save();
    
        // Redirect with a success message
        return redirect()->route('Admin.Notification.index')
                         ->with('success', 'Notification created successfully.');
    }
    
    public function handleUpload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf')->store('pdf', 'public');
        return 'File uploaded successfully! Path: ' . $path;
    }
      // Show the form for editing an existing notification
      public function edit(Notification $notification)
      {
          return view('Admin.Notification.edit', compact('notification'));
      }
  
      // Update an existing notification
      public function update(Request $request, Notification $notification)
      {
          $request->validate([
              'title' => 'required',
              'date' => 'required|date',
              'notice' => 'required',
          ]);
  
          $notification->update($request->all());
          return redirect()->route('Admin.Notification.index')
                           ->with('success', 'Notification updated successfully.');
      }
  
      // Delete an existing notification
      public function destroy(Notification $notification)
      {
          $notification->delete();
          return redirect()->route('Admin.Notification.index')
                           ->with('success', 'Notification deleted successfully.');
      }

      public function upload(Request $request)
    {
        // Validate the file input
        $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg,pdf|max:2048', // Only allow certain file types and size limit
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Store the file in the public disk (storage/app/public)
        $filePath = $file->store('uploads', 'public');

   

          // Save file info to the database
          $uploadedFile = new File();
          $uploadedFile->name = $file->getClientOriginalName();
          $uploadedFile->path = $filePath;
          $uploadedFile->uploaded_at = now(); // Set custom upload timestamp

          $uploadedFile->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'File uploaded successfully')->with('file', $filePath);
    }

    public function flieuplode()
    {
        $files = File::paginate(10);  // Retrieve the files with pagination
        return view('Admin.Notification.upload', compact('files'));  // Return view with the files data
    }

//     public function show($filename)
// {
//     $path = storage_path('app/public/uploads/' . $filename);
    
//     if (file_exists($path)) {
//         return response()->file($path);
//     }

//     abort(404);
// }
public function download($filename)
{
    // Define the disk and path
    $disk = 'public'; // Or the disk you are using
    $path = 'files/' . $filename; // Adjust the path according to your storage structure

    // Check if file exists
    if (Storage::disk($disk)->exists($path)) {
        // Get the local path to the file
        $localPath = Storage::disk($disk)->path($path);

        // Get file MIME type using finfo
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($localPath);

        // Return the file as a response with appropriate headers
        return response()->stream(
            function () use ($localPath) {
                readfile($localPath);
            },
            Response::HTTP_OK,
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="'. basename($localPath) .'"',
            ]
        );
    } else {
        // Return a 404 response if file not found
        abort(404, 'File not found.');
    }
}


public function delete(Request $request, $filename)
{
    $disk = 'public';
    $path = 'files/' . $filename;

    if (Storage::disk($disk)->exists($path)) {
        Storage::disk($disk)->delete($path);
        return redirect()->back()->with('success', 'File deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'File not found.');
    }
}

}
