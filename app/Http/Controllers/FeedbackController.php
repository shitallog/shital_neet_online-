<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    
    public function index()
    {
        return view('Admin.Feedback.index');
    }





    
    public function store(Request $request)
    {
       
    }
    
}
