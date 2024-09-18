{{-- @extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Row 1: Name and Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control custom-input" value="{{ old('name') }}" placeholder="Enter Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control custom-input" value="{{ old('date_of_birth') }}" placeholder="Select Date">
                @error('date_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 2: Gender and Address -->
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select custom-input">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control custom-input" value="{{ old('address') }}" placeholder="Enter Address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 3: Religion and Nationality -->
            <div class="col-md-6 mb-3">
                <label for="religion" class="form-label">Religion</label>
                <select aname="religion" id="religion" class="form-select custom-input">
                    <option value="select" {{ old('religion') == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="muslim" {{ old('religion') == 'muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="others" {{ old('religion') == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('religion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <select name="nationality" id="nationality" class="form-select custom-input">
                    <option value="select" {{ old('nationality') == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="bangladesh" {{ old('nationality') == 'bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="india" {{ old('nationality') == 'india' ? 'selected' : '' }}>India</option>
                    <option value="uk" {{ old('nationality') == 'uk' ? 'selected' : '' }}>UK</option>
                </select>
                @error('nationality')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 4: Email and Phone -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control custom-input" value="{{ old('email') }}" placeholder="Enter Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control custom-input" value="{{ old('phone') }}" placeholder="Enter Phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 5: Parents Name and Parents Phone -->
            <div class="col-md-6 mb-3">
                <label for="parents_name" class="form-label">Parents Name</label>
                <input type="text" name="parents_name" id="parents_name" class="form-control custom-input" value="{{ old('parents_name') }}" placeholder="Enter Parents Name">
                @error('parents_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="parents_phone" class="form-label">Parents Phone</label>
                <input type="text" name="parents_phone" id="parents_phone" class="form-control custom-input" value="{{ old('parents_phone') }}" placeholder="Enter Parents Phone">
                @error('parents_phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 6: Course, Admission Date, Admission Fee, and Additional Notes -->
            <div class="col-md-6 mb-3">
                <label for="course" class="form-label">Course</label>
                <select name="course" id="course" class="form-select custom-input">
                    <option value="select" {{ old('course') == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="webdevelopment" {{ old('course') == 'webdevelopment' ? 'selected' : '' }}>Web Development</option>
                    <option value="webdesign" {{ old('course') == 'webdesign' ? 'selected' : '' }}>Web Design</option>
                    <option value="webdeveloper" {{ old('course') == 'webdeveloper' ? 'selected' : '' }}>Web Developer</option>
                </select>
                @error('course')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="admission_date" class="form-label">Admission Date</label>
                <input type="date" name="admission_date" id="admission_date" class="form-control custom-input" value="{{ old('admission_date') }}" placeholder="Select Date">
                @error('admission_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="admission_fee" class="form-label">Admission Fee</label>
                <input type="text" name="admission_fee" id="admission_fee" class="form-control custom-input" value="{{ old('admission_fee') }}" placeholder="Enter Admission Fee">
                @error('admission_fee')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="aditional_note" class="form-label">Additional Notes</label>
                <input type="text" name="aditional_note" id="aditional_note" class="form-control custom-input" value="{{ old('aditional_note') }}" placeholder="Enter Additional Notes">
                @error('aditional_note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Row for Profile Image -->
        <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control custom-input">
            @error('profile_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>

<style>
    .custom-input {
        color: #333;
        background-color: #f9f9f9;
        border-color: #ccc;
        border-radius: 0.375rem;
    }
    .custom-input::placeholder {
        color: #6c757d;
    }
    .custom-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection
 --}}

{{--
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <style>
    .form-control {
        transition: border-color 0.3s, background-color 0.3s, color 0.3s;
    }
    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #f8d7da;
        color: #721c24;
    }
    .form-control.is-valid {
        border-color: #28a745;
        background-color: #d4edda;
        color: #155724;
    }
    .error-message {
        color: #dc3545;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-row {
        margin-bottom: 1rem;
    }
</style>
@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Student Admission Form</h2>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <!-- Name -->
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo -->
            <div class="form-group col-md-4">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" value="{{ old('photo') }}" class="form-control-file @error('photo') is-invalid @enderror">
                @error('photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date of Birth -->
            <div class="form-group col-md-4">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror" required>
                @error('dob')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Gender -->
            <div class="form-group col-md-4">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nationality -->
            <div class="form-group col-md-4">
                <label for="nationality">Nationality:</label>
                <select id="nationality" name="nationality" class="form-control @error('nationality') is-invalid @enderror" required>
                    <option value="">Select Nationality</option>
                    <option value="bangladeshi" {{ old('nationality') == 'bangladeshi' ? 'selected' : '' }}>Bangladeshi</option>
                    <option value="indian" {{ old('nationality') == 'indian' ? 'selected' : '' }}>Indian</option>
                    <option value="pakistani" {{ old('nationality') == 'pakistani' ? 'selected' : '' }}>Pakistani</option>
                    <option value="other" {{ old('nationality') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('nationality')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Religion -->
            <div class="form-group col-md-4">
                <label for="religion">Religion:</label>
                <select id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" required>
                    <option value="">Select Religion</option>
                    <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="christian" {{ old('religion') == 'christian' ? 'selected' : '' }}>Christian</option>
                    <option value="buddhist" {{ old('religion') == 'buddhist' ? 'selected' : '' }}>Buddhist</option>
                    <option value="other" {{ old('religion') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('religion')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Blood Group -->
            <div class="form-group col-md-2">
                <label for="blood_group">Blood Group:</label>
                <select id="blood_group" name="blood_group" class="form-control @error('blood_group') is-invalid @enderror" required>
                    <option value="">Select Blood Group</option>
                    <option value="a_positive" {{ old('blood_group') == 'a_positive' ? 'selected' : '' }}>A+</option>
                    <option value="b_positive" {{ old('blood_group') == 'b_positive' ? 'selected' : '' }}>B+</option>
                    <option value="ab_positive" {{ old('blood_group') == 'ab_positive' ? 'selected' : '' }}>AB+</option>
                    <option value="o_positive" {{ old('blood_group') == 'o_positive' ? 'selected' : '' }}>O+</option>
                    <option value="a_negative" {{ old('blood_group') == 'a_negative' ? 'selected' : '' }}>A-</option>
                    <option value="b_negative" {{ old('blood_group') == 'b_negative' ? 'selected' : '' }}>B-</option>
                    <option value="ab_negative" {{ old('blood_group') == 'ab_negative' ? 'selected' : '' }}>AB-</option>
                    <option value="o_negative" {{ old('blood_group') == 'o_negative' ? 'selected' : '' }}>O-</option>
                </select>
                @error('blood_group')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- National ID -->
            <div class="form-group col-md-2">
                <label for="national_id">National ID:</label>
                <input type="text" id="national_id" name="national_id" value="{{ old('national_id') }}" class="form-control @error('national_id') is-invalid @enderror">
                @error('national_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Permanent Address -->
            <div class="form-group col-md-2">
                <label for="permanent_address">Permanent Address:</label>
                <input type="text" id="permanent_address" name="permanent_address" value="{{ old('permanent_address') }}" class="form-control @error('permanent_address') is-invalid @enderror">
                @error('permanent_address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Current Address -->
            <div class="form-group col-md-4">
                <label for="current_address">Current Address:</label>
                <input type="text" id="current_address" name="current_address" value="{{ old('current_address') }}" class="form-control @error('current_address') is-invalid @enderror">
                @error('current_address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group col-md-4">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Emergency Contact -->
            <div class="form-group col-md-4">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" id="emergency_contact" name="emergency_contact" value="{{ old('emergency_contact') }}" class="form-control @error('emergency_contact') is-invalid @enderror">
                @error('emergency_contact')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Marital Status -->
            <div class="form-group col-md-4">
                <label for="marital_status">Marital Status:</label>
                <select id="marital_status" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror" required>
                    <option value="">Select Marital Status</option>
                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
                @error('marital_status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Passport Number -->
            <div class="form-group col-md-4">
                <label for="passport_number">Passport Number:</label>
                <input type="text" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" class="form-control @error('passport_number') is-invalid @enderror">
                @error('passport_number')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Father's Name -->
            <div class="form-group col-md-3">
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" class="form-control @error('father_name') is-invalid @enderror">
                @error('father_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Father's Phone -->
            <div class="form-group col-md-3">
                <label for="father_phone">Father's Phone:</label>
                <input type="text" id="father_phone" name="father_phone" value="{{ old('father_phone') }}" class="form-control @error('father_phone') is-invalid @enderror">
                @error('father_phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Father's Education -->
            <div class="form-group col-md-3">
                <label for="father_education">Father's Education:</label>
                <select id="father_education" name="father_education" class="form-control @error('father_education') is-invalid @enderror" required>
                    <option value="">Select Education</option>
                    <option value="none" {{ old('father_education') == 'none' ? 'selected' : '' }}>None</option>
                    <option value="high_school" {{ old('father_education') == 'high_school' ? 'selected' : '' }}>High School</option>
                    <option value="bachelor" {{ old('father_education') == 'bachelor' ? 'selected' : '' }}>Bachelor's</option>
                    <option value="master" {{ old('father_education') == 'master' ? 'selected' : '' }}>Master's</option>
                    <option value="doctorate" {{ old('father_education') == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                </select>
                @error('father_education')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Father's Occupation -->
            <div class="form-group col-md-4">
                <label for="father_occupation">Father's Occupation:</label>
                <select id="father_occupation" name="father_occupation" class="form-control @error('father_occupation') is-invalid @enderror" required>
                    <option value="">Select Occupation</option>
                    <option value="teacher" {{ old('father_occupation') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="doctor" {{ old('father_occupation') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="engineer" {{ old('father_occupation') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="business" {{ old('father_occupation') == 'business' ? 'selected' : '' }}>Business</option>
                </select>
                @error('father_occupation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mother's Name -->
            <div class="form-group col-md-4">
                <label for="mother_name">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" class="form-control @error('mother_name') is-invalid @enderror">
                @error('mother_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mother's Phone -->
            <div class="form-group col-md-4">
                <label for="mother_phone">Mother's Phone:</label>
                <input type="text" id="mother_phone" name="mother_phone" value="{{ old('mother_phone') }}" class="form-control @error('mother_phone') is-invalid @enderror">
                @error('mother_phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Mother's Education -->
            <div class="form-group col-md-4">
                <label for="mother_education">Mother's Education:</label>
                <select id="mother_education" name="mother_education" class="form-control @error('mother_education') is-invalid @enderror" required>
                    <option value="">Select Education</option>
                    <option value="none" {{ old('mother_education') == 'none' ? 'selected' : '' }}>None</option>
                    <option value="high_school" {{ old('mother_education') == 'high_school' ? 'selected' : '' }}>High School</option>
                    <option value="bachelor" {{ old('mother_education') == 'bachelor' ? 'selected' : '' }}>Bachelor's</option>
                    <option value="master" {{ old('mother_education') == 'master' ? 'selected' : '' }}>Master's</option>
                    <option value="doctorate" {{ old('mother_education') == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                </select>
                @error('mother_education')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mother's Occupation -->
            <div class="form-group col-md-4">
                <label for="mother_occupation">Mother's Occupation:</label>
                <select id="mother_occupation" name="mother_occupation" class="form-control @error('mother_occupation') is-invalid @enderror" required>
                    <option value="">Select Occupation</option>
                    <option value="teacher" {{ old('mother_occupation') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="doctor" {{ old('mother_occupation') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="engineer" {{ old('mother_occupation') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="business" {{ old('mother_occupation') == 'business' ? 'selected' : '' }}>Business</option>
                </select>
                @error('mother_occupation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Family Income -->
            <div class="form-group col-md-4">
                <label for="family_income">Family Income:</label>
                <input type="text" id="family_income" name="family_income" value="{{ old('family_income') }}" class="form-control @error('family_income') is-invalid @enderror">
                @error('family_income')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Total Family Members -->
            <div class="form-group col-md-4">
                <label for="total_family_members">Total Family Members:</label>
                <input type="number" id="total_family_members" name="total_family_members" value="{{ old('total_family_members') }}" class="form-control @error('total_family_members') is-invalid @enderror">
                @error('total_family_members')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Guardian Name -->
            <div class="form-group col-md-4">
                <label for="guardian_name">Guardian's Name:</label>
                <input type="text" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}" class="form-control @error('guardian_name') is-invalid @enderror">
                @error('guardian_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Guardian Relation -->
            <div class="form-group col-md-4">
                <label for="guardian_relation">Guardian's Relation:</label>
                <select id="guardian_relation" name="guardian_relation" class="form-control @error('guardian_relation') is-invalid @enderror" required>
                    <option value="">Select Relation</option>
                    <option value="parent" {{ old('guardian_relation') == 'parent' ? 'selected' : '' }}>Parent</option>
                    <option value="relative" {{ old('guardian_relation') == 'relative' ? 'selected' : '' }}>Relative</option>
                    <option value="friend" {{ old('guardian_relation') == 'friend' ? 'selected' : '' }}>Friend</option>
                </select>
                @error('guardian_relation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Guardian Occupation -->
            <div class="form-group col-md-4">
                <label for="guardian_occupation">Guardian's Occupation:</label>
                <select id="guardian_occupation" name="guardian_occupation" class="form-control @error('guardian_occupation') is-invalid @enderror" required>
                    <option value="">Select Occupation</option>
                    <option value="teacher" {{ old('guardian_occupation') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="doctor" {{ old('guardian_occupation') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="engineer" {{ old('guardian_occupation') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="business" {{ old('guardian_occupation') == 'business' ? 'selected' : '' }}>Business</option>
                </select>
                @error('guardian_occupation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Guardian Number -->
            <div class="form-group col-md-4">
                <label for="guardian_number">Guardian's Number:</label>
                <input type="text" id="guardian_number" name="guardian_number" value="{{ old('guardian_number') }}" class="form-control @error('guardian_number') is-invalid @enderror">
                @error('guardian_number')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- SSC Roll -->
            <div class="form-group col-md-4">
                <label for="ssc_roll">SSC Roll:</label>
                <input type="text" id="ssc_roll" name="ssc_roll" value="{{ old('ssc_roll') }}" class="form-control @error('ssc_roll') is-invalid @enderror">
                @error('ssc_roll')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- SSC Registration -->
            <div class="form-group col-md-4">
                <label for="ssc_reg">SSC Registration:</label>
                <input type="text" id="ssc_reg" name="ssc_reg" value="{{ old('ssc_reg') }}" class="form-control @error('ssc_reg') is-invalid @enderror">
                @error('ssc_reg')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- SSC Result -->
            <div class="form-group col-md-4">
                <label for="ssc_result">SSC Result:</label>
                <input type="text" id="ssc_result" name="ssc_result" value="{{ old('ssc_result') }}" class="form-control @error('ssc_result') is-invalid @enderror">
                @error('ssc_result')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- SSC Board -->
            <div class="form-group col-md-4">
                <label for="ssc_board">SSC Board:</label>
                <select id="ssc_board" name="ssc_board" class="form-control @error('ssc_board') is-invalid @enderror" required>
                    <option value="">Select Board</option>
                    <option value="dhaka" {{ old('ssc_board') == 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                    <option value="chittagong" {{ old('ssc_board') == 'chittagong' ? 'selected' : '' }}>Chittagong</option>
                    <option value="rajshahi" {{ old('ssc_board') == 'rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                    <option value="khulna" {{ old('ssc_board') == 'khulna' ? 'selected' : '' }}>Khulna</option>
                </select>
                @error('ssc_board')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- SSC Testimonial -->
            <div class="form-group col-md-4">
                <label for="ssc_testimonial">SSC Testimonial:</label>
                <input type="file" id="ssc_testimonial" name="ssc_testimonial" class="form-control @error('ssc_testimonial') is-invalid @enderror">
                @error('ssc_testimonial')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- SSC Marksheet -->
            <div class="form-group col-md-4">
                <label for="ssc_marksheet">SSC Marksheet:</label>
                <input type="file" id="ssc_marksheet" name="ssc_marksheet" class="form-control @error('ssc_marksheet') is-invalid @enderror">
                @error('ssc_marksheet')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Previous School -->
            <div class="form-group col-md-4">
                <label for="previous_school">Previous School:</label>
                <input type="text" id="previous_school" name="previous_school" value="{{ old('previous_school') }}" class="form-control @error('previous_school') is-invalid @enderror">
                @error('previous_school')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Previous School Address -->
            <div class="form-group col-md-4">
                <label for="previous_school_address">Previous School Address:</label>
                <input type="text" id="previous_school_address" name="previous_school_address" value="{{ old('previous_school_address') }}" class="form-control @error('previous_school_address') is-invalid @enderror">
                @error('previous_school_address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Admission Test Roll -->
            <div class="form-group col-md-4">
                <label for="admission_test_roll">Admission Test Roll:</label>
                <input type="text" id="admission_test_roll" name="admission_test_roll" value="{{ old('admission_test_roll') }}" class="form-control @error('admission_test_roll') is-invalid @enderror">
                @error('admission_test_roll')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Admission Test Result -->
            <div class="form-group col-md-4">
                <label for="admission_test_result">Admission Test Result:</label>
                <input type="text" id="admission_test_result" name="admission_test_result" value="{{ old('admission_test_result') }}" class="form-control @error('admission_test_result') is-invalid @enderror">
                @error('admission_test_result')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Transfer Certificate -->
            <div class="form-group col-md-4">
                <label for="transfer_certificate">Transfer Certificate:</label>
                <input type="file" id="transfer_certificate" name="transfer_certificate" class="form-control @error('transfer_certificate') is-invalid @enderror">
                @error('transfer_certificate')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Scholarship Info -->
            <div class="form-group col-md-4">
                <label for="scholarship_info">Scholarship Info:</label>
                <input type="text" id="scholarship_info" name="scholarship_info" value="{{ old('scholarship_info') }}" class="form-control @error('scholarship_info') is-invalid @enderror">
                @error('scholarship_info')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Scholarship Proof -->
            <div class="form-group col-md-4">
                <label for="scholarship_proof">Scholarship Proof:</label>
                <input type="file" id="scholarship_proof" name="scholarship_proof" class="form-control @error('scholarship_proof') is-invalid @enderror">
                @error('scholarship_proof')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Teacher Reference -->
            <div class="form-group col-md-4">
                <label for="teacher_reference">Teacher Reference:</label>
                <input type="text" id="teacher_reference" name="teacher_reference" value="{{ old('teacher_reference') }}" class="form-control @error('teacher_reference') is-invalid @enderror">
                @error('teacher_reference')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Reference Number -->
            <div class="form-group col-md-4">
                <label for="reference_number">Reference Number:</label>
                <input type="text" id="reference_number" name="reference_number" value="{{ old('reference_number') }}" class="form-control @error('reference_number') is-invalid @enderror">
                @error('reference_number')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Admission Date -->
            <div class="form-group col-md-4">
                <label for="admission_date">Admission Date:</label>
                <input type="date" id="admission_date" name="admission_date" value="{{ old('admission_date') }}" class="form-control @error('admission_date') is-invalid @enderror">
                @error('admission_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Student Photo -->
            <div class="form-group col-md-4">
                <label for="student_photo">Student Photo:</label>
                <input type="file" id="student_photo" name="student_photo" class="form-control @error('student_photo') is-invalid @enderror">
                @error('student_photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Certificate Photo -->
            <div class="form-group col-md-4">
                <label for="certificate_photo">Certificate Photo:</label>
                <input type="file" id="certificate_photo" name="certificate_photo" class="form-control @error('certificate_photo') is-invalid @enderror">
                @error('certificate_photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Birth Certificate Photo -->
            <div class="form-group col-md-4">
                <label for="birth_certificate_photo">Birth Certificate Photo:</label>
                <input type="file" id="birth_certificate_photo" name="birth_certificate_photo" class="form-control @error('birth_certificate_photo') is-invalid @enderror">
                @error('birth_certificate_photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Form Submit -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection --}}


@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Create Profile</h2>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Personal Information -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
            @error('dob')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}">
            @error('nationality')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="religion" class="form-label">Religion</label>
            <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ old('religion') }}">
            @error('religion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="blood_group" class="form-label">Blood Group</label>
            <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" value="{{ old('blood_group') }}">
            @error('blood_group')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="national_id" class="form-label">National ID</label>
            <input type="text" class="form-control @error('national_id') is-invalid @enderror" id="national_id" name="national_id" value="{{ old('national_id') }}">
            @error('national_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="permanent_address" class="form-label">Permanent Address</label>
            <textarea class="form-control @error('permanent_address') is-invalid @enderror" id="permanent_address" name="permanent_address">{{ old('permanent_address') }}</textarea>
            @error('permanent_address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="current_address" class="form-label">Current Address</label>
            <textarea class="form-control @error('current_address') is-invalid @enderror" id="current_address" name="current_address">{{ old('current_address') }}</textarea>
            @error('current_address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="emergency_contact" class="form-label">Emergency Contact</label>
            <input type="text" class="form-control @error('emergency_contact') is-invalid @enderror" id="emergency_contact" name="emergency_contact" value="{{ old('emergency_contact') }}">
            @error('emergency_contact')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marital_status" class="form-label">Marital Status</label>
            <select class="form-select @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status">
                <option value="">Select Marital Status</option>
                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
            </select>
            @error('marital_status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="passport_number" class="form-label">Passport Number</label>
            <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number') }}">
            @error('passport_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Guardian Information -->
        <div class="mb-3">
            <label for="father_name" class="form-label">Father's Name</label>
            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name') }}">
            @error('father_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="father_phone" class="form-label">Father's Phone</label>
            <input type="text" class="form-control @error('father_phone') is-invalid @enderror" id="father_phone" name="father_phone" value="{{ old('father_phone') }}">
            @error('father_phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="father_education" class="form-label">Father's Education</label>
            <input type="text" class="form-control @error('father_education') is-invalid @enderror" id="father_education" name="father_education" value="{{ old('father_education') }}">
            @error('father_education')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="father_occupation" class="form-label">Father's Occupation</label>
            <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}">
            @error('father_occupation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mother_name" class="form-label">Mother's Name</label>
            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name') }}">
            @error('mother_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mother_phone" class="form-label">Mother's Phone</label>
            <input type="text" class="form-control @error('mother_phone') is-invalid @enderror" id="mother_phone" name="mother_phone" value="{{ old('mother_phone') }}">
            @error('mother_phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mother_education" class="form-label">Mother's Education</label>
            <input type="text" class="form-control @error('mother_education') is-invalid @enderror" id="mother_education" name="mother_education" value="{{ old('mother_education') }}">
            @error('mother_education')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mother_occupation" class="form-label">Mother's Occupation</label>
            <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}">
            @error('mother_occupation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="family_income" class="form-label">Family Income</label>
            <input type="text" class="form-control @error('family_income') is-invalid @enderror" id="family_income" name="family_income" value="{{ old('family_income') }}">
            @error('family_income')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_family_members" class="form-label">Total Family Members</label>
            <input type="number" class="form-control @error('total_family_members') is-invalid @enderror" id="total_family_members" name="total_family_members" value="{{ old('total_family_members') }}">
            @error('total_family_members')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_name" class="form-label">Guardian's Name</label>
            <input type="text" class="form-control @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}">
            @error('guardian_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_relation" class="form-label">Guardian's Relation</label>
            <input type="text" class="form-control @error('guardian_relation') is-invalid @enderror" id="guardian_relation" name="guardian_relation" value="{{ old('guardian_relation') }}">
            @error('guardian_relation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_occupation" class="form-label">Guardian's Occupation</label>
            <input type="text" class="form-control @error('guardian_occupation') is-invalid @enderror" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation') }}">
            @error('guardian_occupation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_number" class="form-label">Guardian's Number</label>
            <input type="text" class="form-control @error('guardian_number') is-invalid @enderror" id="guardian_number" name="guardian_number" value="{{ old('guardian_number') }}">
            @error('guardian_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Educational Information -->
        <div class="mb-3">
            <label for="ssc_roll" class="form-label">SSC Roll</label>
            <input type="text" class="form-control @error('ssc_roll') is-invalid @enderror" id="ssc_roll" name="ssc_roll" value="{{ old('ssc_roll') }}">
            @error('ssc_roll')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ssc_reg" class="form-label">SSC Registration</label>
            <input type="text" class="form-control @error('ssc_reg') is-invalid @enderror" id="ssc_reg" name="ssc_reg" value="{{ old('ssc_reg') }}">
            @error('ssc_reg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ssc_result" class="form-label">SSC Result</label>
            <input type="text" class="form-control @error('ssc_result') is-invalid @enderror" id="ssc_result" name="ssc_result" value="{{ old('ssc_result') }}">
            @error('ssc_result')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ssc_board" class="form-label">SSC Board</label>
            <input type="text" class="form-control @error('ssc_board') is-invalid @enderror" id="ssc_board" name="ssc_board" value="{{ old('ssc_board') }}">
            @error('ssc_board')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ssc_testimonial" class="form-label">SSC Testimonial</label>
            <input type="file" class="form-control @error('ssc_testimonial') is-invalid @enderror" id="ssc_testimonial" name="ssc_testimonial">
            @error('ssc_testimonial')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ssc_marksheet" class="form-label">SSC Marksheet</label>
            <input type="file" class="form-control @error('ssc_marksheet') is-invalid @enderror" id="ssc_marksheet" name="ssc_marksheet">
            @error('ssc_marksheet')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="previous_school" class="form-label">Previous School</label>
            <input type="text" class="form-control @error('previous_school') is-invalid @enderror" id="previous_school" name="previous_school" value="{{ old('previous_school') }}">
            @error('previous_school')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="previous_school_address" class="form-label">Previous School Address</label>
            <textarea class="form-control @error('previous_school_address') is-invalid @enderror" id="previous_school_address" name="previous_school_address">{{ old('previous_school_address') }}</textarea>
            @error('previous_school_address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="admission_test_roll" class="form-label">Admission Test Roll</label>
            <input type="text" class="form-control @error('admission_test_roll') is-invalid @enderror" id="admission_test_roll" name="admission_test_roll" value="{{ old('admission_test_roll') }}">
            @error('admission_test_roll')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="admission_test_result" class="form-label">Admission Test Result</label>
            <input type="text" class="form-control @error('admission_test_result') is-invalid @enderror" id="admission_test_result" name="admission_test_result" value="{{ old('admission_test_result') }}">
            @error('admission_test_result')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="transfer_certificate" class="form-label">Transfer Certificate</label>
            <input type="file" class="form-control @error('transfer_certificate') is-invalid @enderror" id="transfer_certificate" name="transfer_certificate">
            @error('transfer_certificate')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="scholarship_info" class="form-label">Scholarship Information</label>
            <input type="text" class="form-control @error('scholarship_info') is-invalid @enderror" id="scholarship_info" name="scholarship_info" value="{{ old('scholarship_info') }}">
            @error('scholarship_info')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="scholarship_proof" class="form-label">Scholarship Proof</label>
            <input type="file" class="form-control @error('scholarship_proof') is-invalid @enderror" id="scholarship_proof" name="scholarship_proof">
            @error('scholarship_proof')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="teacher_reference" class="form-label">Teacher Reference</label>
            <input type="text" class="form-control @error('teacher_reference') is-invalid @enderror" id="teacher_reference" name="teacher_reference" value="{{ old('teacher_reference') }}">
            @error('teacher_reference')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Admission Information -->
        <div class="mb-3">
            <label for="admite_date" class="form-label">Admission Date</label>
            <input type="date" class="form-control @error('admite_date') is-invalid @enderror" id="admite_date" name="admite_date" value="{{ old('admite_date') }}">
            @error('admite_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" value="{{ old('course') }}">
            @error('course')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="admission_fee" class="form-label">Admission Fee</label>
            <input type="text" class="form-control @error('admission_fee') is-invalid @enderror" id="admission_fee" name="admission_fee" value="{{ old('admission_fee') }}">
            @error('admission_fee')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="admission_fee_receipt" class="form-label">Admission Fee Receipt</label>
            <input type="file" class="form-control @error('admission_fee_receipt') is-invalid @enderror" id="admission_fee_receipt" name="admission_fee_receipt">
            @error('admission_fee_receipt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Other Information -->
        <div class="mb-3">
            <label for="disabilities" class="form-label">Disabilities</label>
            <input type="text" class="form-control @error('disabilities') is-invalid @enderror" id="disabilities" name="disabilities" value="{{ old('disabilities') }}">
            @error('disabilities')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="health_insurance" class="form-label">Health Insurance</label>
            <input type="text" class="form-control @error('health_insurance') is-invalid @enderror" id="health_insurance" name="health_insurance" value="{{ old('health_insurance') }}">
            @error('health_insurance')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="extra_curriculum" class="form-label">Extra Curriculum</label>
            <input type="text" class="form-control @error('extra_curriculum') is-invalid @enderror" id="extra_curriculum" name="extra_curriculum" value="{{ old('extra_curriculum') }}">
            @error('extra_curriculum')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="agreement" class="form-label">Agreement</label>
            <input type="file" class="form-control @error('agreement') is-invalid @enderror" id="agreement" name="agreement">
            @error('agreement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="student_signature" class="form-label">Student's Signature</label>
            <input type="file" class="form-control @error('student_signature') is-invalid @enderror" id="student_signature" name="student_signature">
            @error('student_signature')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
