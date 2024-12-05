<?php

namespace App\Http\Controllers;
use App\Models\ExamReview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExamReviewController extends Controller
{
    public function index()
    {
        $examReviews = ExamReview::all();
        return view('Admin.Examreview.index', compact('examReviews'));
    }


    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            // Get original file name and extension
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            // Define allowed file types
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    
            if (!in_array($extension, $allowedExtensions)) {
                return response()->json(['uploaded' => 0, 'error' => ['message' => 'Invalid file type.']]);
            }
    
            // Move the file to the public/media directory
            $request->file('upload')->move(public_path('media'), $fileName);
    
            // Generate the URL for the uploaded file
            $url = asset('media/' . $fileName);
    
            // Save image details in the database
            $image = new Image();
            $image->file_name = $fileName;
            $image->url = $url;
            $image->save();
    
            // Return CKEditor-friendly response
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded.']]);
    }

}
