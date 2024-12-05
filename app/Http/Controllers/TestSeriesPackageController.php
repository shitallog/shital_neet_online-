<?php

namespace App\Http\Controllers;

use App\Models\TestSeriesPackage;
use Illuminate\Http\Request;


class TestSeriesPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $packages = TestSeriesPackage::paginate(10);  // Adjust the number for pagination as needed
        return view('Admin.Payment.create', compact('packages'));
        // $test_series_packages = TestSeriesPackage::all();
        // return view('Admin.Payment.create',compact('test_series_packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   // Store a new package
  // Store method in your controller
  public function store(Request $request)
  {
      $request->validate([
          'package_name' => 'required|string|max:255',
          'price' => 'required|numeric|between:0,999999.99', // Updated validation rule for price
          'original_price' => 'nullable|numeric|between:0,999999.99', // Updated validation rule for original_price
          'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Added validation for image
          'year' => 'required|integer',
      ]);
  
      // Initialize an empty input array to store the image path
      $input = $request->all(); // Get all request data
  
      if ($image = $request->file('image')) {
          $destinationPath = 'image/'; // Set the destination path
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension(); // Create a unique image name
  
          $image->move($destinationPath, $profileImage); // Move the image to the destination path
  
          // Store the image path in the input array
          $input['image'] = "$profileImage";
      }
  
      // Create the package using the input array, including the image path
      $packages = TestSeriesPackage::create($input);
      
      return redirect()->route('test_series_packages.index')->with('success', 'Package store successfully.');
  }
  

    
     
     

    /**
     * Display the specified resource.
     */
    public function show(TestSeriesPackage $testSeriesPackage)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = TestSeriesPackage::find($id);
        return view('Admin.Payment.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'valid_until' => 'nullable|date',  // Optional field
            'original_price' => 'nullable|numeric',  // Optional, can be null
            'package_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Find the package by ID
        $package = TestSeriesPackage::findOrFail($id);  // Fails if package not found
    
        // Initialize image name as the existing one (if no new file is uploaded)
        $imageName = $package->package_image;
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('package_image')) {
            // Generate a unique image name using the current timestamp and file extension
            $imageName = time() . '.' . $request->package_image->extension();
            // Move the uploaded file to the "images" directory in public
            $request->package_image->move(public_path('images'), $imageName);
            
          
        }
    
        // Update the package with the form data and the (possibly new) image name
        $package->update([
            'package_name' => $request->input('package_name'),
            'price' => $request->input('price'),
            'original_price' => $request->input('original_price'),
            'valid_until' => $request->input('valid_until'),  // Can be null
            'package_image' => $imageName,  // Store the updated image name or retain the old one
        ]);
    
        // Redirect to the package list with a success message
        return redirect()->route('test_series_packages.index')->with('success', 'Package updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = TestSeriesPackage::find($id);
        $package->delete();
    
        return redirect()->route('test_series_packages.index')->with('success', 'Package deleted successfully.');
    }
}
