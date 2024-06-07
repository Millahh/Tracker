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
    Route::get('/download/{file}',[EmployerController::class,'download']);
    // Route::get('/employer/',[EmployerController::class,'show'])->name('employer.edit');
});

//employee routes
Route::middleware(['auth','verified','role:employee'])->group(function () {
    Route::resource('employee', EmployeeController::class)->except(['edit']);
    Route::get('/dashboard',[EmployeeController::class,'dashboard'])->name('dashboard');
    Route::get('/my-tasks', [EmployeeController::class,'my_tasks'])->name('my-tasks');
    // Route::get('/file-upload', [EmployeeController::class, 'showUploadForm']);
    // Route::post('/file-upload', [EmployeeController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
