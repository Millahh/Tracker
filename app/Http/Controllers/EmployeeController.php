<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employer;

class EmployeeController extends Controller
{
    public function dashboard(){
        // $employee = Employee::all()
        // ->where('user_id', request()->user()->id);

        // ($tasks_id = ((array_values(array_values((array)$employee)[0]))[0])->tasks_id);

        // $display_tasks = Employer::whereIn('id', $tasks_id)->get();

        // return view('tracker.tracker-employee.dashboard', ['tasks'=> $display_tasks]);
        return view('tracker.tracker-employee.dashboard');
    }
    
    public function my_tasks(){
        $employee = Employee::all()
        ->where('user_id', request()->user()->id);

        ($tasks_id = ((array_values(array_values((array)$employee)[0]))[0])->tasks_id);

        $display_tasks = Employer::whereIn('id', $tasks_id)->get();

        return view('tracker.tracker-employee.my-tasks', ['tasks'=> $display_tasks]);
    }
}
