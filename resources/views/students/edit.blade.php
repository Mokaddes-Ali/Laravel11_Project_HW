{{-- <x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Field 1: Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $student->name) }}">
            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 2: Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $student->email) }}">
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 3: Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('phone', $student->phone) }}">
            @error('phone')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 4: Address -->
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address', $student->address) }}">
            @error('address')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 5: Date of Birth -->
        <div class="mb-4">
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('date_of_birth', $student->date_of_birth) }}">
            @error('date_of_birth')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 6: Gender -->
        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 7: Course -->
        <div class="mb-4">
            <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
            <input type="text" name="course" id="course" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('course', $student->course) }}">
            @error('course')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 8: Year -->
        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input type="text" name="year" id="year" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('year', $student->year) }}">
            @error('year')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 9: Nationality -->
        <div class="mb-4">
            <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nationality', $student->nationality) }}">
            @error('nationality')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 10: Language -->
        <div class="mb-4">
            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
            <input type="text" name="language" id="language" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('language', $student->language) }}">
            @error('language')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 11: Blood Group -->
        <div class="mb-4">
            <label for="blood_group" class="block text-sm font-medium text-gray-700">Blood Group</label>
            <input type="text" name="blood_group" id="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('blood_group', $student->blood_group) }}">
            @error('blood_group')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 12: Religion -->
        <div class="mb-4">
            <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
            <input type="text" name="religion" id="religion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('religion', $student->religion) }}">
            @error('religion')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 13: Hobbies -->
        <div class="mb-4">
            <label for="hobbies" class="block text-sm font-medium text-gray-700">Hobbies</label>
            <input type="text" name="hobbies" id="hobbies" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('hobbies', $student->hobbies) }}">
            @error('hobbies')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 14: Parents Info -->
        <div class="mb-4">
            <label for="parents_info" class="block text-sm font-medium text-gray-700">Parents Info</label>
            <input type="text" name="parents_info" id="parents_info" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('parents_info', $student->parents_info) }}">
            @error('parents_info')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 15: Emergency Contact -->
        <div class="mb-4">
            <label for="emergency_contact" class="block text-sm font-medium text-gray-700">Emergency Contact</label>
            <input type="text" name="emergency_contact" id="emergency_contact" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('emergency_contact', $student->emergency_contact) }}">
            @error('emergency_contact')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 16: Profile Image -->
        <div class="mb-4">
            <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('profile_image')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            @if ($student->profile_image)
                <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" class="mt-2 w-32">
            @endif
        </div>

        <!-- Field 17: Active -->
        <div class="mb-4">
            <label for="is_active" class="inline-flex items-center">
                <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $student->is_active) ? 'checked' : '' }} class="form-checkbox">
                <span class="ml-2">Active</span>
            </label>
        </div>

        <!-- Field 18: Admission Date -->
        <div class="mb-4">
            <label for="admission_date" class="block text-sm font-medium text-gray-700">Admission Date</label>
            <input type="date" name="admission_date" id="admission_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('admission_date', $student->admission_date) }}">
            @error('admission_date')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 19: Graduation Date -->
        <div class="mb-4">
            <label for="graduation_date" class="block text-sm font-medium text-gray-700">Graduation Date</label>
            <input type="date" name="graduation_date" id="graduation_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('graduation_date', $student->graduation_date) }}">
            @error('graduation_date')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 20: Parents Occupation -->
        <div class="mb-4">
            <label for="parents_occupation" class="block text-sm font-medium text-gray-700">Parents Occupation</label>
            <input type="text" name="parents_occupation" id="parents_occupation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('parents_occupation', $student->parents_occupation) }}">
            @error('parents_occupation')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 21: Parents Contact -->
        <div class="mb-4">
            <label for="parents_contact" class="block text-sm font-medium text-gray-700">Parents Contact</label>
            <input type="text" name="parents_contact" id="parents_contact" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('parents_contact', $student->parents_contact) }}">
            @error('parents_contact')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 22: Scholarship Status -->
        <div class="mb-4">
            <label for="scholarship_status" class="block text-sm font-medium text-gray-700">Scholarship Status</label>
            <select name="scholarship_status" id="scholarship_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="none" {{ old('scholarship_status', $student->scholarship_status) == 'none' ? 'selected' : '' }}>None</option>
                <option value="partial" {{ old('scholarship_status', $student->scholarship_status) == 'partial' ? 'selected' : '' }}>Partial</option>
                <option value="full" {{ old('scholarship_status', $student->scholarship_status) == 'full' ? 'selected' : '' }}>Full</option>
            </select>
            @error('scholarship_status')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 23: Transport -->
        <div class="mb-4">
            <label for="transport" class="block text-sm font-medium text-gray-700">Transport</label>
            <input type="text" name="transport" id="transport" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('transport', $student->transport) }}">
            @error('transport')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 24: Hostel -->
        <div class="mb-4">
            <label for="hostel" class="block text-sm font-medium text-gray-700">Hostel</label>
            <input type="text" name="hostel" id="hostel" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('hostel', $student->hostel) }}">
            @error('hostel')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 25: Extra Curricular Activities -->
        <div class="mb-4">
            <label for="extra_curricular_activities" class="block text-sm font-medium text-gray-700">Extra Curricular Activities</label>
            <input type="text" name="extra_curricular_activities" id="extra_curricular_activities" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('extra_curricular_activities', $student->extra_curricular_activities) }}">
            @error('extra_curricular_activities')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 26: Achievements -->
        <div class="mb-4">
            <label for="achievements" class="block text-sm font-medium text-gray-700">Achievements</label>
            <input type="text" name="achievements" id="achievements" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('achievements', $student->achievements) }}">
            @error('achievements')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field 27: Personal Statement -->
        <div class="mb-4">
            <label for="personal_statement" class="block text-sm font-medium text-gray-700">Personal Statement</label>
            <textarea name="personal_statement" id="personal_statement" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('personal_statement', $student->personal_statement) }}</textarea>
            @error('personal_statement')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600">
                Update Student
            </button>
        </div>
    </form>
</x-app-layout> --}}



{{-- @extends('layouts.master')

@section('content') --}}

<x-app-layout>
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
</x-app-layout>
