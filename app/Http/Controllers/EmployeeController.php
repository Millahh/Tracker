<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use App\Http\Controllers\File;

class EmployeeController extends Controller
{
    public function dashboard(){
        $employee = Employee::all()
        ->where('user_id', request()->user()->id);

        ($tasks_id = ((array_values(array_values((array)$employee)[0]))[0])->tasks_id);

        $display_tasks = Employer::whereIn('id', $tasks_id)->get();

        return view('tracker.tracker-employee.dashboard', ['tasks'=> $display_tasks]);
        // return view('tracker.tracker-employee.dashboard');
    }

    public function my_tasks(){
        $employees = Employee::all()
        ->where('user_id', request()->user()->id);
        $employee = (object)[];
        foreach($employees as $temp){
            $employee = $temp;
        }

        ($tasks_id = ((array_values(array_values((array)$employees)[0]))[0])->tasks_id);

        $display_tasks = Employer::whereIn('id', $tasks_id)->get();
        
        return view('tracker.tracker-employee.my-tasks', ['tasks'=> $display_tasks, 'employee'=> $employee]);
    }
    public function update(Request $request, $display_tasks){
        $task = Employer::findOrFail($display_tasks);
        $data = $request->validate([
            'file' => 'required|mimes:pdf,jpg,png,jpeg|max:2048', // Example validation rules
        ]);
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        // $fileName = time() . '_' . $file->getClientOriginalExtension();
        $file->move('assets',$fileName);
        $task->update($data);

        return redirect()->route('my-tasks', $display_tasks)->with('success','Edited successfully');
   	
    }
}
