@extends('layouts.master')

@section('content')

<div class="container">
    <h1 class="mb-4">Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Row 1: Name and Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control custom-input" value="{{ old('name', $student->name) }}" placeholder="Enter Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control custom-input" value="{{ old('date_of_birth', $student->date_of_birth) }}" placeholder="Select Date">
                @error('date_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 2: Gender and Address -->
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select custom-input">
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control custom-input" value="{{ old('address', $student->address) }}" placeholder="Enter Address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 3: Religion and Nationality -->
            <div class="col-md-6 mb-3">
                <label for="religion" class="form-label">Religion</label>
                <select name="religion" id="religion" class="form-select custom-input">
                    <option value="select" {{ old('religion', $student->religion) == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="muslim" {{ old('religion', $student->religion) == 'muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="hindu" {{ old('religion', $student->religion) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="others" {{ old('religion', $student->religion) == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('religion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <select name="nationality" id="nationality" class="form-select custom-input">
                    <option value="select" {{ old('nationality', $student->nationality) == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="bangladesh" {{ old('nationality', $student->nationality) == 'bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="india" {{ old('nationality', $student->nationality) == 'india' ? 'selected' : '' }}>India</option>
                    <option value="uk" {{ old('nationality', $student->nationality) == 'uk' ? 'selected' : '' }}>UK</option>
                </select>
                @error('nationality')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 4: Email and Phone -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control custom-input" value="{{ old('email', $student->email) }}" placeholder="Enter Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control custom-input" value="{{ old('phone', $student->phone) }}" placeholder="Enter Phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 5: Parents Name and Parents Phone -->
            <div class="col-md-6 mb-3">
                <label for="parents_name" class="form-label">Parents Name</label>
                <input type="text" name="parents_name" id="parents_name" class="form-control custom-input" value="{{ old('parents_name', $student->parents_name) }}" placeholder="Enter Parents Name">
                @error('parents_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="parents_phone" class="form-label">Parents Phone</label>
                <input type="text" name="parents_phone" id="parents_phone" class="form-control custom-input" value="{{ old('parents_phone', $student->parents_phone) }}" placeholder="Enter Parents Phone">
                @error('parents_phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 6: Course, Admission Date, Admission Fee, and Additional Notes -->
            <div class="col-md-6 mb-3">
                <label for="course" class="form-label">Course</label>
                <select name="course" id="course" class="form-select custom-input">
                    <option value="select" {{ old('course', $student->course) == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="webdevelopment" {{ old('course', $student->course) == 'webdevelopment' ? 'selected' : '' }}>Web Development</option>
                    <option value="webdesign" {{ old('course', $student->course) == 'webdesign' ? 'selected' : '' }}>Web Design</option>
                    <option value="webdeveloper" {{ old('course', $student->course) == 'webdeveloper' ? 'selected' : '' }}>Web Developer</option>
                </select>
                @error('course')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="admission_date" class="form-label">Admission Date</label>
                <input type="date" name="admission_date" id="admission_date" class="form-control custom-input" value="{{ old('admission_date', $student->admission_date) }}" placeholder="Select Date">
                @error('admission_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="admission_fee" class="form-label">Admission Fee</label>
                <input type="text" name="admission_fee" id="admission_fee" class="form-control custom-input" value="{{ old('admission_fee', $student->admission_fee) }}" placeholder="Enter Admission Fee">
                @error('admission_fee')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="aditional_note" class="form-label">Additional Notes</label>
                <input type="text" name="aditional_note" id="aditional_note" class="form-control custom-input" value="{{ old('aditional_note', $student->aditional_note) }}" placeholder="Enter Additional Notes">
                @error('aditional_note')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Row 7: Profile Picture -->
            <div class="col-md-6 mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control custom-input">
                @error('profile_picture')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </div>
    </form>
</div>

@endsection
