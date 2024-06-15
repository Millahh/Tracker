<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('/auth/login');
})->name('/');


//employer routes
Route::middleware(['auth','verified','role:employer'])->group(function (){
    Route::resource('employer', EmployerController::class);
    Route::get('/tasks',[EmployerController::class,'show'])->name('tasks');
    Route::get('/finished-tasks',[EmployerController::class,'finished_tasks'])->name('finished-tasks');
    Route::get('/download/{file}',[EmployerController::class,'download']);
    // Route::get('/employer/',[EmployerController::class,'show'])->name('employer.edit');
});

//employee routes
Route::middleware(['auth','verified','role:employee'])->group(function () {
    // Route::resource('employee', EmployeeController::class)->except(['edit']);
    Route::get('/dashboard',[EmployeeController::class,'dashboard'])->name('dashboard');
    Route::get('/my-tasks', [EmployeeController::class,'my_tasks'])->name('my-tasks');
    Route::get('/completed-tasks', [EmployeeController::class, 'completed_tasks'])->name('completed-tasks');
    Route::put('/update-attachment/{id}', [EmployeeController::class,'update_attachment'])->name('update-attachment');
    Route::put('/update-progress/{id}', [EmployeeController::class,'update_progress'])->name('update-progress');
    // Route::get('/file-upload', [EmployeeController::class, 'showUploadForm']);
    // Route::post('/file-upload', [EmployeeController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
