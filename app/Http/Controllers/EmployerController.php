<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function show(){
        $tasks = Employer::all()
        ->where('user_id', request()->user()->id)
        ->sortBy("created_at");
        $user_employee = User::all()
        ->where('role', 'employee');
        view('components.task-card',['tasks'=> $tasks]);
        return view('tracker.tracker-employer.tasks',['tasks'=> $tasks, 'user_employee'=> $user_employee]);
    }

    public function store(Request $request){
        $employer_data = $request->validate([
            'task_name' => ['required'],
            'task_desc' => ['required'],
            'task_checkpoints' => ['required'],
            'task_due' => ['required'],
            'task_assignments' => ['required'],
        ]);
        $employer_data['user_id'] = $request->user()->id;
        $employer = Employer::create($employer_data);

        foreach ($employee_loop = Employee::all() as $employee_loop) {
            $employee_data['tasks_id']=[];
            foreach($employer->task_assignments as $keys){
                if ((array_values($keys)[0])==="true" && $employee_loop->user_id == array_keys($keys)[0]) {
                    $employee_data['tasks_id'] = (array)$employee_loop->tasks_id; 
                    array_push($employee_data['tasks_id'] , $employer->id); 
                }
            }
            $employee_loop->update($employee_data);
        }
        return redirect()->route('employer.tasks', $employer)->with('success','Saved successfully');
    }

    public function edit(Employer $employer){
        // dd($employer);
        // return view('tracker.tracker-employer.tasks', ['task'=> $employer]);
    }

    public function update(Request $request, Employer $employer){
        $data = $request->validate([
            'task_name' => ['required'],
            'task_desc' => ['required'],
            'task_checkpoints' => ['required'],
            'task_due' => ['required'],
        ]);
        $employer->update($data);
        return redirect()->route('employer.tasks', $employer)->with('success','Edited successfully');
    }
    public function destroy(Employer $employer){
        $employer->delete();
        return redirect()->route('employer.tasks', $employer)->with('success','Deleted successfully');
    }
}
