<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
})->name('/');

//employer routes
Route::middleware(['auth','verified','role:employer'])->group(function () {
    Route::get('/employer/dashboard',[EmployerController::class,'dashboard']);
});

//employee routes
Route::middleware(['auth','verified','role:employee'])->group(function () {
    Route::get('/employee/dashboard',[EmployeeController::class,'dashboard']);
});

Route::get('/my-tasks', function () {
    return view('/tracker/tracker-employee/my-tasks');
})->middleware(['auth', 'verified'])->name('employee.my-tasks');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
