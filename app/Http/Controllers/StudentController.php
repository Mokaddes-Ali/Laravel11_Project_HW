<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flasher\Prime\FlasherInterface;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request, FlasherInterface $flasher)
{
    // Input validation
    $request->validate([
        'name' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'address' => 'required|string|max:255',
        'religion' => 'required|string|max:50',
        'nationality' => 'required|string|max:50',
        'email' => 'required|email|max:255|unique:students',
        'phone' => 'required|regex:/^[0-9]{10,15}$/',
        'parents_name' => 'required|string|max:255',
        'parents_phone' => 'required',
        'course' => 'required|string|max:100',
        'admission_date' => 'required|date',
        'admission_fee' => 'required|numeric|min:0',
        'aditional_note' => 'nullable|string|max:1000',
        'profile_image' =>'required|image|mimes:jpeg,png,gif|max:2048',
    ]);

    $image_rename = '';
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $ext = $image->getClientOriginalExtension();
        $image_rename = time() . '_' . rand(100000, 10000000) . '.' . $ext;
        $image->move(public_path('images'), $image_rename);
    }


    $student = new Student();

    $student->name = $request->name;
    $student->date_of_birth = $request->date_of_birth;
    $student->gender = $request->gender;
    $student->address = $request->address;
    $student->religion = $request->religion;
    $student->nationality = $request->nationality;
    $student->email = $request->email;
    $student->phone = $request->phone;
    $student->parents_name = $request->parents_name;
    $student->parents_phone = $request->parents_phone;
    $student->course = $request->course;
    $student->admission_date = $request->admission_date;
    $student->admission_fee = $request->admission_fee;
    $student->aditional_note = $request->aditional_note;
    $student->profile_image = $image_rename;

    $student->save();

    $flasher->addSuccess('Student added successfully!');

        return redirect()-> route('students.index');


}



    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

     // Update the specified resource in storage.
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'date_of_birth' => 'required|date',
             'gender' => 'required|in:male,female,other',
             'address' => 'required|string|max:255',
             'religion' => 'required|in:select,muslim,hindu,others',
             'nationality' => 'required|in:select,bangladesh,india,uk',
             'email' => 'required|email|max:255',
             'phone' => 'required|string|max:20',
             'parents_name' => 'required|string|max:255',
             'parents_phone' => 'required|string|max:20',
             'course' => 'required|in:select,webdevelopment,webdesign,webdeveloper',
             'admission_date' => 'required|date',
             'admission_fee' => 'required|numeric',
             'aditional_note' => 'nullable|string',
             'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
         ]);

         $student = Student::findOrFail($id);
         $student->name = $request->input('name');
         $student->date_of_birth = $request->input('date_of_birth');
         $student->gender = $request->input('gender');
         $student->address = $request->input('address');
         $student->religion = $request->input('religion');
         $student->nationality = $request->input('nationality');
         $student->email = $request->input('email');
         $student->phone = $request->input('phone');
         $student->parents_name = $request->input('parents_name');
         $student->parents_phone = $request->input('parents_phone');
         $student->course = $request->input('course');
         $student->admission_date = $request->input('admission_date');
         $student->admission_fee = $request->input('admission_fee');
         $student->aditional_note = $request->input('aditional_note');

         if ($request->hasFile('profile_picture')) {
             // Delete old profile picture
             if ($student->profile_picture) {
                 Storage::delete($student->profile_picture);
             }
             // Store new profile picture
             $student->profile_picture = $request->file('profile_picture')->store('profile_pictures');
         }

         $student->save();

         return redirect()->route('students.index')->with('success', 'Student updated successfully.');
     }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        $this->flasher->addSuccess('Student deleted successfully!');
        return redirect()->route('students.index');
    }
}
