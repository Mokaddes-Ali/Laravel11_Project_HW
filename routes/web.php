<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.master');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/student-cv/{id}', [StudentController::class, 'studentshow'])->name('student.cv');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
