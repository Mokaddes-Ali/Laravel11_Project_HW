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
       background-color: #d7bde2 ;
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
   .backgroundColor {
       background-color: #aed6f1 ;
       padding: 4px;
   }
   .heading {
       text-align: center;
       margin-top: 20px;
       margin-bottom: 20px;
   }
   .herocontent {
       padding: 20px;
       border-radius: 20px;
   }
   .contentButton {
       text-align: right;
   }
</style>
@extends('layouts.master')
@section('content')
<div class="container backgroundColor mt-5">
   <h2 class="heading">Student Admission Form</h2>
   <div class="contentButton">
   <button type="button" class="btn btn-danger"><a class="dropdown-item" href="{{ route('students.index') }}">Show List </a></button>
</div>
   <div class="herocontent">
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
            <!-- Name -->
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo -->
            <div class="form-group col-md-4">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" value="{{ old('photo', $student->photo) }}" class="form-control-file @error('photo') is-invalid @enderror">
                @error('photo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date of Birth -->
            <div class="form-group col-md-4">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="{{ old('dob', $student->dob) }}" class="form-control @error('dob') is-invalid @enderror" required>
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
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
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
                    <option value="bangladeshi" {{ old('nationality', $student->nationality) == 'bangladeshi' ? 'selected' : '' }}>Bangladeshi</option>
                    <option value="indian" {{ old('nationality', $student->nationality) == 'indian' ? 'selected' : '' }}>Indian</option>
                    <option value="pakistani" {{ old('nationality', $student->nationality) == 'pakistani' ? 'selected' : '' }}>Pakistani</option>
                    <option value="other" {{ old('nationality', $student->nationality) == 'other' ? 'selected' : '' }}>Other</option>
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
                    <option value="islam" {{ old('religion', $student->religion) == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="hindu" {{ old('religion', $student->religion) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="christian" {{ old('religion', $student->religion) == 'christian' ? 'selected' : '' }}>Christian</option>
                    <option value="buddhist" {{ old('religion', $student->religion) == 'buddhist' ? 'selected' : '' }}>Buddhist</option>
                    <option value="other" {{ old('religion', $student->religion) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('religion')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Blood Group -->
            <div class="form-group col-md-3">
                <label for="blood_group">Blood Group:</label>
                <select id="blood_group" name="blood_group" class="form-control @error('blood_group') is-invalid @enderror" required>
                    <option value="">Select Blood Group</option>
                    <option value="a_positive" {{ old('blood_group', $student->blood_group) == 'a_positive' ? 'selected' : '' }}>A+</option>
                    <option value="b_positive" {{ old('blood_group', $student->blood_group) == 'b_positive' ? 'selected' : '' }}>B+</option>
                    <option value="ab_positive" {{ old('blood_group', $student->blood_group) == 'ab_positive' ? 'selected' : '' }}>AB+</option>
                    <option value="o_positive" {{ old('blood_group', $student->blood_group) == 'o_positive' ? 'selected' : '' }}>O+</option>
                    <option value="a_negative" {{ old('blood_group', $student->blood_group) == 'a_negative' ? 'selected' : '' }}>A-</option>
                    <option value="b_negative" {{ old('blood_group', $student->blood_group) == 'b_negative' ? 'selected' : '' }}>B-</option>
                    <option value="ab_negative" {{ old('blood_group', $student->blood_group) == 'ab_negative' ? 'selected' : '' }}>AB-</option>
                    <option value="o_negative" {{ old('blood_group', $student->blood_group) == 'o_negative' ? 'selected' : '' }}>O-</option>
                </select>
                @error('blood_group')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- National ID -->
            <div class="form-group col-md-5">
                <label for="national_id">National ID:</label>
                <input type="text" id="national_id" name="national_id" value="{{ old('national_id', $student->national_id) }}" class="form-control @error('national_id') is-invalid @enderror">
                @error('national_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Permanent Address -->
            <div class="form-group col-md-4">
                <label for="permanent_address">Permanent Address:</label>
                <input type="text" id="permanent_address" name="permanent_address" value="{{ old('permanent_address', $student->permanent_address) }}" class="form-control @error('permanent_address') is-invalid @enderror">
                @error('permanent_address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Current Address -->
            <div class="form-group col-md-4">
                <label for="current_address">Current Address:</label>
                <input type="text" id="current_address" name="current_address" value="{{ old('current_address', $student->current_address) }}" class="form-control @error('current_address') is-invalid @enderror">
                @error('current_address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group col-md-4">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Emergency Contact -->
            <div class="form-group col-md-4">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" id="emergency_contact" name="emergency_contact"
                       value="{{ old('emergency_contact', $student->emergency_contact) }}"
                       class="form-control @error('emergency_contact') is-invalid @enderror">
                @error('emergency_contact')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Marital Status -->
            <div class="form-group col-md-5">
                <label for="marital_status">Marital Status:</label>
                <select id="marital_status" name="marital_status"
                        class="form-control @error('marital_status') is-invalid @enderror" required>
                    <option value="">Select Marital Status</option>
                    <option value="single" {{ old('marital_status', $student->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('marital_status', $student->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('marital_status', $student->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="widowed" {{ old('marital_status', $student->marital_status) == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
                @error('marital_status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Father's Name -->
            <div class="form-group col-md-3">
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="father_name"
                       value="{{ old('father_name', $student->father_name) }}"
                       class="form-control @error('father_name') is-invalid @enderror">
                @error('father_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Father's Phone -->
            <div class="form-group col-md-4">
                <label for="father_phone">Father's Phone:</label>
                <input type="text" id="father_phone" name="father_phone"
                       value="{{ old('father_phone', $student->father_phone) }}"
                       class="form-control @error('father_phone') is-invalid @enderror">
                @error('father_phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Father's Education -->
            <div class="form-group col-md-3">
                <label for="father_education">Father's Education:</label>
                <select id="father_education" name="father_education"
                        class="form-control @error('father_education') is-invalid @enderror" required>
                    <option value="">Select Education</option>
                    <option value="none" {{ old('father_education', $student->father_education) == 'none' ? 'selected' : '' }}>None</option>
                    <option value="high_school" {{ old('father_education', $student->father_education) == 'high_school' ? 'selected' : '' }}>High School</option>
                    <option value="bachelor" {{ old('father_education', $student->father_education) == 'bachelor' ? 'selected' : '' }}>Bachelor's</option>
                    <option value="master" {{ old('father_education', $student->father_education) == 'master' ? 'selected' : '' }}>Master's</option>
                    <option value="doctorate" {{ old('father_education', $student->father_education) == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                </select>
                @error('father_education')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Father's Occupation -->
            <div class="form-group col-md-5">
                <label for="father_occupation">Father's Occupation:</label>
                <select id="father_occupation" name="father_occupation"
                        class="form-control @error('father_occupation') is-invalid @enderror" required>
                    <option value="">Select Occupation</option>
                    <option value="teacher" {{ old('father_occupation', $student->father_occupation) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="doctor" {{ old('father_occupation', $student->father_occupation) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="engineer" {{ old('father_occupation', $student->father_occupation) == 'engineer' ? 'selected' : '' }}>Engineer</option>
                    <option value="business" {{ old('father_occupation', $student->father_occupation) == 'business' ? 'selected' : '' }}>Business</option>
                </select>
                @error('father_occupation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>


       <div class="form-row">
        <!-- Mother's Name -->
        <div class="form-group col-md-4">
            <label for="mother_name">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name', $student->mother_name) }}" class="form-control @error('mother_name') is-invalid @enderror">
            @error('mother_name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mother's Phone -->
        <div class="form-group col-md-4">
            <label for="mother_phone">Mother's Phone:</label>
            <input type="text" id="mother_phone" name="mother_phone" value="{{ old('mother_phone', $student->mother_phone) }}" class="form-control @error('mother_phone') is-invalid @enderror">
            @error('mother_phone')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mother's Education -->
        <div class="form-group col-md-4">
            <label for="mother_education">Mother's Education:</label>
            <select id="mother_education" name="mother_education" class="form-control @error('mother_education') is-invalid @enderror" required>
                <option value="">Select Education</option>
                <option value="none" {{ old('mother_education', $student->mother_education) == 'none' ? 'selected' : '' }}>None</option>
                <option value="high_school" {{ old('mother_education', $student->mother_education) == 'high_school' ? 'selected' : '' }}>High School</option>
                <option value="bachelor" {{ old('mother_education', $student->mother_education) == 'bachelor' ? 'selected' : '' }}>Bachelor's</option>
                <option value="master" {{ old('mother_education', $student->mother_education) == 'master' ? 'selected' : '' }}>Master's</option>
                <option value="doctorate" {{ old('mother_education', $student->mother_education) == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
            </select>
            @error('mother_education')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <!-- Mother's Occupation -->
        <div class="form-group col-md-4">
            <label for="mother_occupation">Mother's Occupation:</label>
            <select id="mother_occupation" name="mother_occupation" class="form-control @error('mother_occupation') is-invalid @enderror" required>
                <option value="">Select Occupation</option>
                <option value="teacher" {{ old('mother_occupation', $student->mother_occupation) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="doctor" {{ old('mother_occupation', $student->mother_occupation) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="engineer" {{ old('mother_occupation', $student->mother_occupation) == 'engineer' ? 'selected' : '' }}>Engineer</option>
                <option value="business" {{ old('mother_occupation', $student->mother_occupation) == 'business' ? 'selected' : '' }}>Business</option>
            </select>
            @error('mother_occupation')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Family Income -->
        <div class="form-group col-md-4">
            <label for="family_income">Family Income:</label>
            <input type="text" id="family_income" name="family_income" value="{{ old('family_income', $student->family_income) }}" class="form-control @error('family_income') is-invalid @enderror">
            @error('family_income')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Guardian Name -->
        <div class="form-group col-md-4">
            <label for="guardian_name">Guardian's Name:</label>
            <input type="text" id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name) }}" class="form-control @error('guardian_name') is-invalid @enderror">
            @error('guardian_name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <!-- Guardian Relation -->
        <div class="form-group col-md-4">
            <label for="guardian_relation">Guardian's Relation:</label>
            <select id="guardian_relation" name="guardian_relation" class="form-control @error('guardian_relation') is-invalid @enderror" required>
                <option value="">Select Relation</option>
                <option value="parent" {{ old('guardian_relation', $student->guardian_relation) == 'parent' ? 'selected' : '' }}>Parent</option>
                <option value="relative" {{ old('guardian_relation', $student->guardian_relation) == 'relative' ? 'selected' : '' }}>Relative</option>
                <option value="friend" {{ old('guardian_relation', $student->guardian_relation) == 'friend' ? 'selected' : '' }}>Friend</option>
            </select>
            @error('guardian_relation')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Guardian Occupation -->
        <div class="form-group col-md-4">
            <label for="guardian_occupation">Guardian's Occupation:</label>
            <select id="guardian_occupation" name="guardian_occupation" class="form-control @error('guardian_occupation') is-invalid @enderror" required>
                <option value="">Select Occupation</option>
                <option value="teacher" {{ old('guardian_occupation', $student->guardian_occupation) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="doctor" {{ old('guardian_occupation', $student->guardian_occupation) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="engineer" {{ old('guardian_occupation', $student->guardian_occupation) == 'engineer' ? 'selected' : '' }}>Engineer</option>
                <option value="business" {{ old('guardian_occupation', $student->guardian_occupation) == 'business' ? 'selected' : '' }}>Business</option>
            </select>
            @error('guardian_occupation')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Guardian Number -->
        <div class="form-group col-md-4">
            <label for="guardian_number">Guardian's Number:</label>
            <input type="text" id="guardian_number" name="guardian_number" value="{{ old('guardian_number', $student->guardian_number) }}" class="form-control @error('guardian_number') is-invalid @enderror">
            @error('guardian_number')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <!-- SSC Roll -->
        <div class="form-group col-md-4">
            <label for="ssc_roll">SSC Roll:</label>
            <input type="text" id="ssc_roll" name="ssc_roll"
                   value="{{ old('ssc_roll', $student->ssc_roll) }}"
                   class="form-control @error('ssc_roll') is-invalid @enderror">
            @error('ssc_roll')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- SSC Registration -->
        <div class="form-group col-md-4">
            <label for="ssc_reg">SSC Registration:</label>
            <input type="text" id="ssc_reg" name="ssc_reg"
                   value="{{ old('ssc_reg', $student->ssc_reg) }}"
                   class="form-control @error('ssc_reg') is-invalid @enderror">
            @error('ssc_reg')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- SSC Result -->
        <div class="form-group col-md-4">
            <label for="ssc_result">SSC Result:</label>
            <input type="text" id="ssc_result" name="ssc_result"
                   value="{{ old('ssc_result', $student->ssc_result) }}"
                   class="form-control @error('ssc_result') is-invalid @enderror">
            @error('ssc_result')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-row">
        <!-- SSC Board -->
        <div class="form-group col-md-4">
            <label for="ssc_board">SSC Board:</label>
            <select id="ssc_board" name="ssc_board"
                    class="form-control @error('ssc_board') is-invalid @enderror" required>
                <option value="">Select Board</option>
                <option value="dhaka" {{ old('ssc_board', $student->ssc_board) == 'dhaka' ? 'selected' : '' }}>Dhaka</option>
                <option value="chittagong" {{ old('ssc_board', $student->ssc_board) == 'chittagong' ? 'selected' : '' }}>Chittagong</option>
                <option value="rajshahi" {{ old('ssc_board', $student->ssc_board) == 'rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                <option value="khulna" {{ old('ssc_board', $student->ssc_board) == 'khulna' ? 'selected' : '' }}>Khulna</option>
            </select>
            @error('ssc_board')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Previous School -->
        <div class="form-group col-md-4">
            <label for="previous_school">Previous School:</label>
            <input type="text" id="previous_school" name="previous_school"
                   value="{{ old('previous_school', $student->previous_school) }}"
                   class="form-control @error('previous_school') is-invalid @enderror">
            @error('previous_school')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Admission Test Roll -->
        <div class="form-group col-md-4">
            <label for="admission_test_roll">Admission Test Roll:</label>
            <input type="text" id="admission_test_roll" name="admission_test_roll"
                   value="{{ old('admission_test_roll', $student->admission_test_roll) }}"
                   class="form-control @error('admission_test_roll') is-invalid @enderror">
            @error('admission_test_roll')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>

           <div class="form-row">
            <!-- Admission Test Result -->
            <div class="form-group col-md-4">
                <label for="admission_test_result">Admission Test Result:</label>
                <input type="text" id="admission_test_result" name="admission_test_result" value="{{ old('admission_test_result', $student->admission_test_result) }}" class="form-control @error('admission_test_result') is-invalid @enderror">
                @error('admission_test_result')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Scholarship Info -->
            <div class="form-group col-md-4">
                <label for="scholarship_info">Scholarship Info:</label>
                <input type="text" id="scholarship_info" name="scholarship_info" value="{{ old('scholarship_info', $student->scholarship_info) }}" class="form-control @error('scholarship_info') is-invalid @enderror">
                @error('scholarship_info')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Teacher Reference -->
            <div class="form-group col-md-4">
                <label for="teacher_reference">Teacher Reference:</label>
                <input type="text" id="teacher_reference" name="teacher_reference" value="{{ old('teacher_reference', $student->teacher_reference) }}" class="form-control @error('teacher_reference') is-invalid @enderror">
                @error('teacher_reference')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Admission Date -->
            <div class="mb-3 col-md-3">
                <label for="admite_date" class="form-label">Admission Date</label>
                <input type="date" class="form-control @error('admite_date') is-invalid @enderror" id="admite_date" name="admite_date" value="{{ old('admite_date', $student->admite_date) }}">
                @error('admite_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Course -->
            <div class="mb-4 col-md-4">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" value="{{ old('course', $student->course) }}">
                @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Admission Fee -->
            <div class="mb-5 col-md-5">
                <label for="admission_fee" class="form-label">Admission Fee</label>
                <input type="text" class="form-control @error('admission_fee') is-invalid @enderror" id="admission_fee" name="admission_fee" value="{{ old('admission_fee', $student->admission_fee) }}">
                @error('admission_fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <!-- Disabilities -->
            <div class="mb-3 col-md-4">
                <label for="disabilities" class="form-label">Disabilities</label>
                <input type="text" class="form-control @error('disabilities') is-invalid @enderror" id="disabilities" name="disabilities" value="{{ old('disabilities', $student->disabilities) }}">
                @error('disabilities')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Health Insurance -->
            <div class="mb-3 col-md-3">
                <label for="health_insurance" class="form-label">Health Insurance</label>
                <input type="text" class="form-control @error('health_insurance') is-invalid @enderror" id="health_insurance" name="health_insurance" value="{{ old('health_insurance', $student->health_insurance) }}">
                @error('health_insurance')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Extra Curriculum -->
            <div class="mb-3 col-md-5">
                <label for="extra_curriculum" class="form-label">Extra Curriculum</label>
                <input type="text" class="form-control @error('extra_curriculum') is-invalid @enderror" id="extra_curriculum" name="extra_curriculum" value="{{ old('extra_curriculum', $student->extra_curriculum) }}">
                @error('extra_curriculum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
       <button type="submit" class="btn btn-primary">Update</button>
   </form>
</div>
</div>

@endsection
