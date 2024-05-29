<?php

namespace App\Http\Controllers;
use App\Models\Employer;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function show(){
        $tasks = Employer::all()
        ->where('user_id', request()->user()->id)
        ->sortBy("created_at");
        view('components.task-card',['tasks'=> $tasks]);
        return view('tracker.tracker-employer.tasks',['tasks'=> $tasks]);
        // return view('tracker.tracker-employer.tasks');
    }

    public function create(){
        return view('/');
        // belom bikin bjrot
    }

    public function store(Request $request){
        // gangerti tipe datanya, menyusul yeah, sesuai kebutuhan aj
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
        return view('', ['employer'=> $employer]);
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
