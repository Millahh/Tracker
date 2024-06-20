<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use App\Http\Controllers\File;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function dashboard(){
        $random_quote = ((DB::select('select * from quotes')));
        $random_quote = $random_quote[array_rand($random_quote)]->quote;

        $name = request()->user()->first_name . " " . request()->user()->last_name;

        $employee = Employee::all()
        ->where('user_id', request()->user()->id);

        ($tasks_id = ((array_values(array_values((array)$employee)[0]))[0])->tasks_id);

        $display_tasks = Employer::whereIn('id', $tasks_id)->latest("task_due")->latest()->get();

        //dd($display_tasks);

        return view('tracker.tracker-employee.dashboard', ['tasks'=> $display_tasks, 'random_quote' => $random_quote, 'name'=> $name]);
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
    public function update_attachment(Request $request, $display_tasks): RedirectResponse{
        $task = Employer::findOrFail($display_tasks);
        $data = $request->validate([
            'file' => 'required|mimes:pdf,jpg,png,jpeg',
        ],
        [
            'file.mimes' => 'Upload files with pdf/jpg/png/jpeg extensions only!',
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
