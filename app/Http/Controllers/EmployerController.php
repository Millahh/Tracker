<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function dashboard(){
        return view('tracker.tracker-employer.dashboard');
    }
}
