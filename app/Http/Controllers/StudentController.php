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


public function store(Request $request , FlasherInterface $flasher)
{
    // Input validation
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'required|file|mimes:jpeg,png|max:2048',
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
        'father_name' => 'required|string|max:255',
        'father_phone' => 'required',
        'father_education' => 'nullable|string|max:255',
        'father_occupation' => 'nullable|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mother_phone' => 'required',
        'mother_education' => 'nullable|string|max:255',
        'mother_occupation' => 'nullable|string|max:255',
        'family_income' => 'nullable|numeric|min:0',
        'guardian_name' => 'nullable|string|max:255',
        'guardian_relation' => 'nullable|string|max:50',
        'guardian_occupation' => 'nullable|string|max:255',
        'guardian_number' => 'nullable',
        'ssc_roll' => 'nullable|string|max:50',
        'ssc_reg' => 'nullable|string|max:50',
        'ssc_result' => 'nullable|string|max:50',
        'ssc_board' => 'nullable|string|max:50',
        'previous_school' => 'nullable|string|max:255',
        'admission_test_roll' => 'nullable|string|max:50',
        'admission_test_result' => 'nullable|string|max:50',
        'scholarship_info' => 'nullable|string|max:255',
        'teacher_reference' => 'nullable|string|max:255',
        'admite_date' => 'required|date',
        'course' => 'required|string|max:100',
        'admission_fee' => 'required|numeric|min:0',
        'disabilities' => 'nullable|string|max:255',
        'health_insurance' => 'nullable|string|max:255',
        'extra_curriculum' => 'nullable|string|max:255',
    ]);

    $image_rename = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $ext = $image->getClientOriginalExtension();
            $image_rename = time() . '_' . rand(100000, 10000000) . '.' . $ext;
            $image->move(public_path('images'), $image_rename);
        }


    // Create a new student record
    $student = new Student();

    $student->name = $request->name;
    $student->photo = $image_rename;
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
    $student->father_name = $request->father_name;
    $student->father_phone = $request->father_phone;
    $student->father_education = $request->father_education;
    $student->father_occupation = $request->father_occupation;
    $student->mother_name = $request->mother_name;
    $student->mother_phone = $request->mother_phone;
    $student->mother_education = $request->mother_education;
    $student->mother_occupation = $request->mother_occupation;
    $student->family_income = $request->family_income;
    $student->guardian_name = $request->guardian_name;
    $student->guardian_relation = $request->guardian_relation;
    $student->guardian_occupation = $request->guardian_occupation;
    $student->guardian_number = $request->guardian_number;
    $student->ssc_roll = $request->ssc_roll;
    $student->ssc_reg = $request->ssc_reg;
    $student->ssc_result = $request->ssc_result;
    $student->ssc_board = $request->ssc_board;
    $student->previous_school = $request->previous_school;
    $student->admission_test_roll = $request->admission_test_roll;
    $student->admission_test_result = $request->admission_test_result;
    $student->scholarship_info = $request->scholarship_info;
    $student->teacher_reference = $request->teacher_reference;
    $student->admite_date = $request->admite_date;
    $student->course = $request->course;
    $student->admission_fee = $request->admission_fee;
    $student->disabilities = $request->disabilities;
    $student->health_insurance = $request->health_insurance;
    $student->extra_curriculum = $request->extra_curriculum;

    $student->save();

    if ($student) {

    $flasher->addSuccess('Student Added successfully!');
    return redirect()->route('students.index');
} else {
    return back()->with('fail', 'Student Updated failed');
}
}




    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

     // Update the specified resource in storage.
     public function update(Request $request, $id, FlasherInterface $flasher)
     {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|file|mimes:jpeg,png|max:2048',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'nationality' => 'required|string|max:50',
            'religion' => 'required|string|max:50',
            'blood_group' => 'required',
            'national_id' => 'required',
            'permanent_address' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|max:255',
            'emergency_contact' => 'required',
            'marital_status' => 'required|string|max:50',
            'father_name' => 'required|string|max:255',
            'father_phone' => 'required',
            'father_education' => 'nullable|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_phone' => 'required',
            'mother_education' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'family_income' => 'nullable|numeric|min:0',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_relation' => 'nullable|string|max:50',
            'guardian_occupation' => 'nullable|string|max:255',
            'guardian_number' => 'nullable',
            'ssc_roll' => 'nullable|string|max:50',
            'ssc_reg' => 'nullable|string|max:50',
            'ssc_result' => 'nullable|string|max:50',
            'ssc_board' => 'nullable|string|max:50',
            'previous_school' => 'nullable|string|max:255',
            'admission_test_roll' => 'nullable|string|max:50',
            'admission_test_result' => 'nullable|string|max:50',
            'scholarship_info' => 'nullable|string|max:255',
            'teacher_reference' => 'nullable|string|max:255',
            'admite_date' => 'required|date',
            'course' => 'required|string|max:100',
            'admission_fee' => 'required|numeric|min:0',
            'disabilities' => 'nullable|string|max:255',
            'health_insurance' => 'nullable|string|max:255',
            'extra_curriculum' => 'nullable|string|max:255',
        ]);


    $oldimg = Student::findOrFail($id);

    $deleteimg=public_path('images/'.$oldimg['photo']);
    $image_rename = '';

    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $ext = $image->getClientOriginalExtension();

        if(file_exists($deleteimg)){
            unlink($deleteimg);
          }

        $image_rename = time() . '_' . rand(100000, 10000000) . '.' . $ext;
        $image->move(public_path('images'), $image_rename);
        }
        else{
            $image_rename=$oldimg['photo'];
        }

    $student = Student::where('id',$id)->update([
        'name' => $request->name,
        'photo' => $image_rename,
        'dob' => $request->dob,
       'gender'=> $request->gender,
     'nationality' => $request->nationality,
      'religion' => $request->religion,
    'blood_group' => $request->blood_group,
   'national_id' => $request->national_id,
   'permanent_address' => $request->permanent_address,
    'current_address' => $request->current_address,
   'phone' => $request->phone,
   'email' => $request->email,
    'emergency_contact' => $request->emergency_contact,
   'marital_status' => $request->marital_status,
   'father_name' => $request->father_name,
   'father_phone' => $request->father_phone,
   'father_education' => $request->father_education,
  'father_occupation' => $request->father_occupation,
   'mother_name' => $request->mother_name,
   'mother_phone' => $request->mother_phone,
   'mother_education' => $request->mother_education,
   'mother_occupation' => $request->mother_occupation,
   'family_income' => $request->family_income,
    'guardian_name' => $request->guardian_name,
   'guardian_relation' => $request->guardian_relation,
    'guardian_occupation' => $request->guardian_occupation,
    'guardian_number' => $request->guardian_number,
   'ssc_roll' => $request->ssc_roll,
    'ssc_reg' => $request->ssc_reg,
    'ssc_result' => $request->ssc_result,
   'ssc_board' => $request->ssc_board,
    'previous_school' => $request->previous_school,
   'admission_test_roll' => $request->admission_test_roll,
    'admission_test_result' => $request->admission_test_result,
    'scholarship_info' => $request->scholarship_info,
    'teacher_reference' => $request->teacher_reference,
    'admite_date' => $request->admite_date,
    'course' => $request->course,
   'admission_fee' => $request->admission_fee,
   'disabilities' => $request->disabilities,
  'health_insurance' => $request->health_insurance,
   'extra_curriculum' => $request->extra_curriculum,
    ]);

    if ($student) {
        $flasher->addSuccess('Student added successfully!');
        return redirect()->route('students.index');
    } else {
        return back()->with('fail', 'Data update failed');
    }


     }


    public function destroy($id, FlasherInterface $flasher)
    {
        $id=intval($id);

        $student = Student::findOrFail($id);
        if ($student) {
            $imagePath = public_path('images/' . $student->photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        $student->delete();
        $flasher->addSuccess('Student deleted successfully!');
        return redirect()->route('students.index');
        }
    }


    public function studentshow($id)
    {
        $student = Student::findOrFail($id); // Fetch the student data from the database

        return view('students.student_cv', compact('student'));
    }
}
