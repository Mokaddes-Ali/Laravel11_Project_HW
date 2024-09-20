@extends('layouts.master')
@section('content')
<div class="custom-container">
    <h1 class="text-center text-3xl font-bold text-gray-900">Student CV</h1>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary d-flex justify-content-start"><a class="dropdown-item" href="{{ route('students.create') }}">Add Student </a></button>
        <button type="button" class="btn btn-success d-flex justify-content-end"><a class="dropdown-item" href="{{ route('students.index') }}">Show List</a></button>
    </div>
    <div class="custom-profile">
        <img src="{{ asset('images/' .$student->photo) }}" alt="Student Photo" class="custom-photo" width="350" height="200">
        <h1 class="custom-name">{{ $student->name }}</h1>
        <p class="custom-email">{{ $student->email }}</p>
    </div>
    <div class="custom-details">
        <div class="custom-section personal-details">
            <h2 class="custom-section-title">Personal Details</h2>
            <ul class="custom-list">
                <li class="custom-list-item">Date of Birth: {{ $student->dob }}</li>
                <li class="custom-list-item">Gender: {{ $student->gender }}</li>
                <li class="custom-list-item">Nationality: {{ $student->nationality }}</li>
                <li class="custom-list-item">Religion: {{ $student->religion }}</li>
                <li class="custom-list-item">Blood Group: {{ $student->blood_group }}</li>
                <li class="custom-list-item">National ID: {{ $student->national_id }}</li>
            </ul>
        </div>
        <div class="custom-section contact-details">
            <h2 class="custom-section-title">Contact Details</h2>
            <ul class="custom-list">
                <li class="custom-list-item">Permanent Address: {{ $student->permanent_address }}</li>
                <li class="custom-list-item">Current Address: {{ $student->current_address }}</li>
                <li class="custom-list-item">Phone: {{ $student->phone }}</li>
                <li class="custom-list-item">Email: {{ $student->email }}</li>
                <li class="custom-list-item">Emergency Contact: {{ $student->emergency_contact }}</li>
            </ul>
        </div>
        <div class="custom-section family-details">
            <h2 class="custom-section-title">Family Details</h2>
            <ul class="custom-list">
                <li class="custom-list-item">Father's Name: {{ $student->father_name }}</li>
                <li class="custom-list-item">Father's Phone: {{ $student->father_phone }}</li>
                <li class="custom-list-item">Father's Education: {{ $student->father_education }}</li>
                <li class="custom-list-item">Father's Occupation: {{ $student->father_occupation }}</li>
                <li class="custom-list-item">Mother's Name: {{ $student->mother_name }}</li>
                <li class="custom-list-item">Mother's Phone: {{ $student->mother_phone }}</li>
                <li class="custom-list-item">Mother's Education: {{ $student->mother_education }}</li>
                <li class="custom-list-item">Mother's Occupation: {{ $student->mother_occupation }}</li>
                <li class="custom-list-item">Family Income: {{ $student->family_income }}</li>
            </ul>
        </div>
        <div class="custom-section additional-info">
            <h2 class="custom-section-title">Additional Information</h2>
            <ul class="custom-list">
                <li class="custom-list-item">Scholarship Info: {{ $student->scholarship_info }}</li>
                <li class="custom-list-item">Teacher Reference: {{ $student->teacher_reference }}</li>
                <li class="custom-list-item">Admission Date: {{ $student->admite_date }}</li>
                <li class="custom-list-item">Course: {{ $student->course }}</li>
                <li class="custom-list-item">Admission Fee: {{ $student->admission_fee }}</li>
                <li class="custom-list-item">Disabilities: {{ $student->disabilities }}</li>
                <li class="custom-list-item">Health Insurance: {{ $student->health_insurance }}</li>
                <li class="custom-list-item">Extra Curriculum: {{ $student->extra_curriculum }}</li>
            </ul>
        </div>
        <div class="custom-section academic-details">
            <h2 class="custom-section-title">Academic Details</h2>
            <ul class="custom-list">
                <li class="custom-list-item">SSC Roll: {{ $student->ssc_roll }}</li>
                <li class="custom-list-item">SSC Registration: {{ $student->ssc_reg }}</li>
                <li class="custom-list-item">SSC Result: {{ $student->ssc_result }}</li>
                <li class="custom-list-item">SSC Board: {{ $student->ssc_board }}</li>
                <li class="custom-list-item">Previous School: {{ $student->previous_school }}</li>
                <li class="custom-list-item">Admission Test Roll: {{ $student->admission_test_roll }}</li>
                <li class="custom-list-item">Admission Test Result: {{ $student->admission_test_result }}</li>
            </ul>
        </div>

        <div class="custom-section guardian-details">
            <h2 class="custom-section-title">Guardian Details</h2>
            <ul class="custom-list">
                <li class="custom-list-item">Guardian's Name: {{ $student->guardian_name }}</li>
                <li class="custom-list-item">Guardian's Relation: {{ $student->guardian_relation }}</li>
                <li class="custom-list-item">Guardian's Occupation: {{ $student->guardian_occupation }}</li>
                <li class="custom-list-item">Guardian's Number: {{ $student->guardian_number }}</li>
            </ul>
        </div>
    </div>
</div>

<style>
/* Custom styles for Student CV */
.custom-container {
    max-width: 1200px;
    margin: 20px auto;
    background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.custom-profile {
    text-align: center;
    margin-bottom: 20px;
}

.custom-photo {
    border: 5px solid #007bff;
    border-radius: 20%;
}

.custom-name {
    color: #007bff;
    margin-top: 10px;
}

.custom-email {
    color: #333;
    margin-top: 5px;
}

.custom-details {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.custom-section {
    flex: 1 1 calc(50% - 20px); /* Two-column layout */
    box-sizing: border-box;
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
}

.custom-section-title {
    color: #007bff;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
    margin-bottom: 10px;
}

.custom-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.custom-list-item {
    background: #ffffff;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Section-specific colors */
.personal-details .custom-list-item {
    background: #e8f4f8;
}

.contact-details .custom-list-item {
    background: #f4f8e8;
}

.family-details .custom-list-item {
    background: #f8e8e8;
}

.guardian-details .custom-list-item {
    background: #fef8e8;
}

.academic-details .custom-list-item {
    background: #e8f8f4;
}

.additional-info .custom-list-item {
    background: #f8f4e8;
}
</style>
@endsection
