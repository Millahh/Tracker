<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function show(){
        $tasks = Employer::all()
        ->where('user_id', request()->user()->id)
        ->sortBy("created_at");

        // dd($tasks[0]->task_assignments[0]);
        $user_employee = User::all()
        ->where('role', 'employee');
        $tasks_id = array();
        foreach($user_employee as $employee){
            array_push($tasks_id,[$employee->id => $employee->first_name.' '.$employee->last_name]);
        }
        for($loop=0; $loop<count($tasks); $loop++){
            $tasks[$loop]['tasks_id'] = $tasks_id;
        }

        return view('tracker.tracker-employer.tasks',['tasks'=> $tasks]);
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
                if ((substr($keys, 2))==="true" && $employee_loop->user_id == (int)$keys[0]) {
                    $employee_data['tasks_id'] = (array)$employee_loop->tasks_id; 
                    array_push($employee_data['tasks_id'] , $employer->id); 
                }
            }
            $employee_loop->update($employee_data);
        }
        return redirect()->route('tasks', $employer)->with('success','Saved successfully');
    }

    public function edit(Employer $employer){
        // dd($employer);
        // return view('tracker.tracker-employer.tasks', ['task'=> $employer]);
    }

    public function update(Request $request, Employer $employer){
        // dd($employer);
        $data = $request->validate([
            'task_name' => ['required'],
            'task_desc' => ['required'],
            'task_checkpoints' => ['required'],
            'task_due' => ['required'],
            'task_assignments' => ['required'],
        ]);
        $employer->update($data);

        foreach ($employee_loop = Employee::all() as $employee_loop) {
            $employee_data['tasks_id']=[];
            foreach($employer->task_assignments as $keys){
                if ((substr($keys, 2))==="true" && $employee_loop->user_id == (int)$keys[0]) {
                    $employee_data['tasks_id'] = (array)$employee_loop->tasks_id; 
                    array_push($employee_data['tasks_id'] , $employer->id); 
                }
            }
            $employee_loop->update($employee_data);
        }
        return redirect()->route('tasks', $employer)->with('success','Edited successfully');
    }
    public function destroy(Employer $employer){
        $employer->delete();
        return redirect()->route('tasks', $employer)->with('success','Deleted successfully');
    }
}
