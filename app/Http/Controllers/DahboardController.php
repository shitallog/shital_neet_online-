<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DahboardController extends Controller
{
    public function index()
    {
        return view('exam.index'); // Make sure this view exists
    }


}
