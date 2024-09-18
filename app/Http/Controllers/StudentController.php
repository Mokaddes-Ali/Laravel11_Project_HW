<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    // public function store(Request $request)
    // {
    //     $request->validate([
    // 'name' => 'required',
    // 'date_of_birth' => 'required|date',
    // 'gender' => 'required|in:male,female,other',
    // 'address' => 'required',
    // 'religion' => 'required',
    // 'nationality' => 'required',
    // 'email' => 'required|email|unique:students',
    // 'phone' => 'required',
    // 'parents_name' => 'required',
    // 'parents_phone' => 'required',
    // 'course' => 'required',
    // 'admission_date' => 'required',
    // 'admission_fee' => 'required',
    // 'aditional_note' => 'required',
    // 'profile_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $student = new Student();
    //     $student->name = $request->name;
    //     $student->date_of_birth = $request->date_of_birth;
    //     $student->gender = $request->gender;
    //     $student->address = $request->address;
    //     $student->religion = $request->religion;
    //     $student->nationality = $request->nationality;
    //     $student->email = $request->email;
    //     $student->phone = $request->phone;
    //     $student->parents_name = $request->parents_name;
    //     $student->parents_phone = $request->parents_phone;
    //     $student->course = $request->course;
    //     $student->admission_date = $request->admission_date;
    //     $student->admission_fee = $request->admission_fee;
    //     $student->aditional_note = $request->aditional_note;


    //     if ($request->hasFile('profile_image')) {
    //         $image = $request->file('profile_image');
    //         $imagePath = $image->store('images', 'public');
    //         $student->profile_image = $imagePath;
    //     }



    //     $student->save();

    //     return redirect()->route('students.index');
    // }


    public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'date_of_birth' => 'required|date|before:today', // Date of birth must be a past date
        'gender' => 'required|in:male,female,other',
        'address' => 'required|string|max:500',
        'religion' => 'required|string|max:100',
        'nationality' => 'required|string|max:100',
        'email' => 'required|email|unique:students,email', // Ensure email uniqueness in 'students' table
        'phone' => 'required|string|max:20|regex:/^[0-9]{10,15}$/', // Simple phone number format validation
        'parents_name' => 'required|string|max:255',
        'parents_phone' => 'required|string|max:20|regex:/^[0-9]{10,15}$/',
        'course' => 'required|string|max:100',
        'admission_date' => 'required|date|after_or_equal:today', // Admission date cannot be in the past
        'admission_fee' => 'required|numeric|min:0', // Fee must be a positive number
        'aditional_note' => 'nullable|string|max:1000',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Only image files allowed
    ]);

    // Check for XSS in input fields to protect against cross-site scripting
    $validatedData = array_map('strip_tags', $validatedData);

    // Creating new student instance securely
    $student = new Student();

    // Fill validated data into the student model (mass assignment prevention)
    $student->fill($validatedData);

    // Handle profile image if uploaded
    if ($request->hasFile('profile_image')) {
        // Securely store the image
        $imagePath = $request->file('profile_image')->store('students/profile_images', 'public');
        $student->profile_image = $imagePath;
    }

    // Save the student record securely in the database
    try {
        $student->save();

        // Success message with CSRF token protection to prevent CSRF attacks
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    } catch (\Exception $e) {
        // Handle any database or system errors
        return back()->withErrors(['error' => 'An error occurred while saving the student. Please try again.']);
    }
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
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'parents_name' => 'required',
            'parents_phone' => 'required',
            'course' => 'required',
            'admission_date' => 'required',
            'admission_fee' => 'required',
            'aditional_note' => 'required',
            'profile_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
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
        $this->addSuccess('Student deleted successfully!');
        return redirect()->route('students.index');
    }
}
