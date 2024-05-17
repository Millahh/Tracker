<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('/tracker/tracker-employee/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/my-tasks', function () {
    return view('/tracker/tracker-employee/my-tasks');
})->middleware(['auth', 'verified'])->name('employee.my-tasks');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
