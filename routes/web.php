<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;

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
// List all teachers
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

// Show form to create a new teacher
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');

// Store a new teacher
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

// Show a specific teacher
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');

// Show form to edit an existing teacher
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

// Update an existing teacher
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');

// Delete a specific teacher
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});



Route::middleware('auth')->group(function () {
Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
});



Route::middleware('auth')->group(function () {
Route::get('classes', [ClassController::class, 'index'])->name('classes.index');

// Show the form to create a new class
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');

// Store a new class
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');

// Show the form to edit an existing class
Route::get('classes/{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');

// Update an existing class
Route::put('classes/{id}', [ClassController::class, 'update'])->name('classes.update');

// Delete a class
Route::delete('classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
