<?php

namespace App\Http\Controllers;
use App\Models\Employer;
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
        $data = $request->validate([
            'task_name' => ['required'],
            'task_desc' => ['required'],
            'task_checkpoints' => ['required'],
            'task_due' => ['required'],
        ]);
        $data['user_id'] = $request->user()->id;
        $employer = Employer::create($data);
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
