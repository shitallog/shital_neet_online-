<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        // You can pass data to the view if needed
        return view('student.dashboard');
    }
}
