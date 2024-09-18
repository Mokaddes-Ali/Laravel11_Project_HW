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
        return view('students.studentList', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

//     public function store(Request $request, FlasherInterface $flasher)
// {
//     // Input validation
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'date_of_birth' => 'required|date',
//         'gender' => 'required|in:male,female,other',
//         'address' => 'required|string|max:255',
//         'religion' => 'required|string|max:50',
//         'nationality' => 'required|string|max:50',
//         'email' => 'required|email|max:255|unique:students',
//         'phone' => 'required|regex:/^[0-9]{10,15}$/',
//         'parents_name' => 'required|string|max:255',
//         'parents_phone' => 'required',
//         'course' => 'required|string|max:100',
//         'admission_date' => 'required|date',
//         'admission_fee' => 'required|numeric|min:0',
//         'aditional_note' => 'nullable|string|max:1000',
//         'profile_image' =>'required|image|mimes:jpeg,png,gif|max:2048',
//     ]);

//     $image_rename = '';
//     if ($request->hasFile('profile_image')) {
//         $image = $request->file('profile_image');
//         $ext = $image->getClientOriginalExtension();
//         $image_rename = time() . '_' . rand(100000, 10000000) . '.' . $ext;
//         $image->move(public_path('images'), $image_rename);
//     }


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
//     $student->profile_image = $image_rename;

//     $student->save();

//     $flasher->addSuccess('Student added successfully!');

//         return redirect()-> route('students.index');


// }



public function store(Request $request , FlasherInterface $flasher)
{
    // Input validation
    $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'nationality' => 'required|string|max:50',
        'religion' => 'required|string|max:50',
        'blood_group' => 'required',
        'national_id' => 'required',
        'permanent_address' => 'required|string|max:255',
        'current_address' => 'required|string|max:255',
        'phone' => 'required|regex:/^[0-9]{10,15}$/',
        'email' => 'required|email|max:255|unique:students',
        'emergency_contact' => 'required',
        'marital_status' => 'required|string|max:50',
        'passport_number' => 'nullable|string|max:50',
        'father_name' => 'required|string|max:255',
        'father_phone' => 'required',
        'father_education' => 'nullable|string|max:255',
        'father_occupation' => 'nullable|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mother_phone' => 'required',
        'mother_education' => 'nullable|string|max:255',
        'mother_occupation' => 'nullable|string|max:255',
        'family_income' => 'nullable|numeric|min:0',
        'total_family_members' => 'nullable|integer|min:1',
        'guardian_name' => 'nullable|string|max:255',
        'guardian_relation' => 'nullable|string|max:50',
        'guardian_occupation' => 'nullable|string|max:255',
        'guardian_number' => 'nullable',
        'ssc_roll' => 'nullable|string|max:50',
        'ssc_reg' => 'nullable|string|max:50',
        'ssc_result' => 'nullable|string|max:50',
        'ssc_board' => 'nullable|string|max:50',
        'ssc_testimonial' => 'nullable|file|mimes:pdf|max:2048',
        'ssc_marksheet' => 'nullable|file|mimes:pdf|max:2048',
        'previous_school' => 'nullable|string|max:255',
        'previous_school_address' => 'nullable|string|max:255',
        'admission_test_roll' => 'nullable|string|max:50',
        'admission_test_result' => 'nullable|string|max:50',
        'transfer_certificate' => 'nullable|file|mimes:pdf|max:2048',
        'scholarship_info' => 'nullable|string|max:255',
        'scholarship_proof' => 'nullable|file|mimes:pdf|max:2048',
        'teacher_reference' => 'nullable|string|max:255',
        'admite_date' => 'required|date',
        'course' => 'required|string|max:100',
        'admission_fee' => 'required|numeric|min:0',
        'admission_fee_receipt' => 'nullable|file|mimes:pdf|max:2048',
        'disabilities' => 'nullable|string|max:255',
        'health_insurance' => 'nullable|string|max:255',
        'extra_curriculum' => 'nullable|string|max:255',
        'agreement' => 'nullable|file|mimes:pdf|max:2048',
        'student_signature' => 'nullable|file|mimes:jpeg,png|max:2048',
    ]);

    // Handle file uploads
    $files = [
        'ssc_testimonial' => $request->file('ssc_testimonial'),
        'ssc_marksheet' => $request->file('ssc_marksheet'),
        'transfer_certificate' => $request->file('transfer_certificate'),
        'scholarship_proof' => $request->file('scholarship_proof'),
        'admission_fee_receipt' => $request->file('admission_fee_receipt'),
        'agreement' => $request->file('agreement'),
        'student_signature' => $request->file('student_signature'),
    ];

    foreach ($files as $key => $file) {
        if ($file) {
            $filename = time() . '_' . rand(100000, 10000000) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data[$key] = $filename;
        }
    }

    // Create a new student record
    $student = new Student();

    $student->name = $request->name;
    $student->dob = $request->dob;
    $student->gender = $request->gender;
    $student->nationality = $request->nationality;
    $student->religion = $request->religion;
    $student->blood_group = $request->blood_group;
    $student->national_id = $request->national_id;
    $student->permanent_address = $request->permanent_address;
    $student->current_address = $request->current_address;
    $student->phone = $request->phone;
    $student->email = $request->email;
    $student->emergency_contact = $request->emergency_contact;
    $student->marital_status = $request->marital_status;
    $student->passport_number = $request->passport_number;
    $student->father_name = $request->father_name;
    $student->father_phone = $request->father_phone;
    $student->father_education = $request->father_education;
    $student->father_occupation = $request->father_occupation;
    $student->mother_name = $request->mother_name;
    $student->mother_phone = $request->mother_phone;
    $student->mother_education = $request->mother_education;
    $student->mother_occupation = $request->mother_occupation;
    $student->family_income = $request->family_income;
    $student->total_family_members = $request->total_family_members;
    $student->guardian_name = $request->guardian_name;
    $student->guardian_relation = $request->guardian_relation;
    $student->guardian_occupation = $request->guardian_occupation;
    $student->guardian_number = $request->guardian_number;
    $student->ssc_roll = $request->ssc_roll;
    $student->ssc_reg = $request->ssc_reg;
    $student->ssc_result = $request->ssc_result;
    $student->ssc_board = $request->ssc_board;
    $student->ssc_testimonial = $request->ssc_testimonial;
    $student->ssc_marksheet = $request->ssc_marksheet;
    $student->previous_school = $request->previous_school;
    $student->previous_school_address = $request->previous_school_address;
    $student->admission_test_roll = $request->admission_test_roll;
    $student->admission_test_result = $request->admission_test_result;
    $student->transfer_certificate = $request->transfer_certificate;
    $student->scholarship_info = $request->scholarship_info;
    $student->scholarship_proof = $request->scholarship_proof;
    $student->teacher_reference = $request->teacher_reference;
    $student->admite_date = $request->admite_date;
    $student->course = $request->course;
    $student->admission_fee = $request->admission_fee;
    $student->admission_fee_receipt = $request->admission_fee_receipt;
    $student->disabilities = $request->disabilities;
    $student->health_insurance = $request->health_insurance;
    $student->extra_curriculum = $request->extra_curriculum;
    $student->agreement = $request->agreement;
    $student->student_signature = $request->student_signature;

    $student->save();


    $flasher->addSuccess('Student added successfully!');

    return redirect()->route('students.index');
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
