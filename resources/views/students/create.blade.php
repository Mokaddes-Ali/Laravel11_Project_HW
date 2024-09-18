@extends('layouts.master')

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
                <select name="religion" id="religion" class="form-select custom-input">
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

