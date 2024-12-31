<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\OccupationAndEducationController;
use App\Http\Controllers\ClassFeeController;
use App\Http\Controllers\EducationBoardController;

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
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
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
Route::get('class_fees', [ClassFeeController::class, 'index'])->name('class_fees.index');
Route::get('class_fees/create', [ClassFeeController::class, 'create'])->name('class_fees.create');
Route::post('class_fees', [ClassFeeController::class, 'store'])->name('class_fees.store');
Route::get('class_fees/{classFee}/edit', [ClassFeeController::class, 'edit'])->name('class_fees.edit');
Route::put('class_fees/{classFee}', [ClassFeeController::class, 'update'])->name('class_fees.update');
Route::delete('class_fees/{classFee}', [ClassFeeController::class, 'destroy'])->name('class_fees.destroy');
});



Route::middleware('auth')->group(function () {
Route::get('/occupation-and-education', [OccupationAndEducationController::class, 'index'])->name('occupation-and-education.index');
Route::get('/occupation-and-education/create', [OccupationAndEducationController::class, 'create'])->name('occupation-and-education.create');
Route::post('/occupation-and-education', [OccupationAndEducationController::class, 'store'])->name('occupation-and-education.store');
Route::get('/occupation-and-education/{id}/edit', [OccupationAndEducationController::class, 'edit'])->name('occupation-and-education.edit');
Route::put('/occupation-and-education/{id}', [OccupationAndEducationController::class, 'update'])->name('occupation-and-education.update');
Route::delete('/occupation-and-education/{id}', [OccupationAndEducationController::class, 'destroy'])->name('occupation-and-education.destroy');
});

Route::middleware('auth')->group(function () {
Route::get('education-boards', [EducationBoardController::class, 'index'])->name('education-boards.index');
Route::get('education-boards/create', [EducationBoardController::class, 'create'])->name('education-boards.create');
Route::post('education-boards', [EducationBoardController::class, 'store'])->name('education-boards.store');
Route::get('education-boards/{id}/edit', [EducationBoardController::class, 'edit'])->name('education-boards.edit');
Route::put('education-boards/{id}', [EducationBoardController::class, 'update'])->name('education-boards.update');
Route::delete('education-boards/{id}', [EducationBoardController::class, 'destroy'])->name('education-boards.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
