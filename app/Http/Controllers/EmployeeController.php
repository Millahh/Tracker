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

        $display_tasks = Employer::whereIn('id', $tasks_id)->latest("created_at")->first()->get();

        return view('tracker.tracker-employee.dashboard', ['tasks'=> $display_tasks]);
    }

    public function my_tasks(){
        $employees = Employee::all()
        ->where('user_id', request()->user()->id);
        $employee = (object)[];
        foreach($employees as $temp){
            $employee = $temp;
        }

        $display_tasks = Employer::whereIn('id', $employee->tasks_id)->latest()->get();
        
        return view('tracker.tracker-employee.my-tasks', ['tasks'=> $display_tasks, 'employee'=> $employee]);
    }
    public function completed_tasks(){
        $employees = Employee::all()
        ->where('user_id', request()->user()->id);
        $employee = (object)[];
        foreach($employees as $temp){
            $employee = $temp;
        }

        $display_tasks = Employer::whereIn('id', $employee->tasks_id)->where('task_percentage', 100)->latest()->get();
        
        return view('tracker.tracker-employee.completed-tasks', ['tasks'=> $display_tasks, 'employee'=> $employee]);
    }
    public function update_attachment(Request $request, $display_tasks){
        $task = Employer::findOrFail($display_tasks);
        $data = $request->validate([
            'file' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('assets',$fileName);
        $data['file'] = $fileName; 

        if(is_null($task->task_progress)){
            $progress = 1/(count($task->task_checkpoints)+1)*100;
        }else{
            $progress=1;
            foreach ($task->task_progress as $boolean) {
                $boolean == "true" ? $progress+=1 : $progress;
            }
            $progress = ($progress)/(count($task->task_progress))*100;
        }
        $data['task_percentage']=(int)$progress;

        $task->update($data);
        return redirect()->route('my-tasks', $display_tasks);
   	
    }

    public function update_progress(Request $request, $tasks){
        $task = Employer::findOrFail($tasks);

        $data = $request->validate([
            'task_progress' => 'required',
        ]);

        if(is_null($task->file)){
            array_push($data['task_progress'], "false");
        }else{
            array_push($data['task_progress'], "true");
        }

        $progress=0;
        foreach ($data['task_progress'] as $boolean) {
            $boolean == "true" ? $progress+=1 : $progress;
        }
        $progress = ($progress)/(count($data['task_progress']))*100;
        $data['task_percentage']=(int)$progress;
        $task->update($data);

        return redirect()->route('my-tasks', $tasks)->with('success', 'Task Updated Successfully');
    }
}
