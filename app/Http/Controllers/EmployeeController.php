<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function dashboard(){
        return view('tracker.tracker-employee.dashboard');
    }
}
