<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Studentdashboard()
    {
        // You can pass data to the view if needed
        return view('Student.Dashboard');
    }
}
