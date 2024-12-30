@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Teacher</h2>
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $teacher->first_name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $teacher->last_name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $teacher->email }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $teacher->phone }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $teacher->address }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option value="male" {{ $teacher->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $teacher->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" class="form-control" name="qualification" id="qualification" value="{{ $teacher->qualification }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" name="department" id="department" value="{{ $teacher->department }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="hire_date" class="form-label">Hire Date</label>
                <input type="date" class="form-control" name="hire_date" id="hire_date" value="{{ $teacher->hire_date }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="active" {{ $teacher->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $teacher->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="bio" class="form-label">Biography</label>
                <textarea class="form-control" name="bio" id="bio">{{ $teacher->bio }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="social_media_links" class="form-label">Social Media Links</label>
                <input type="text" class="form-control" name="social_media_links" id="social_media_links" value="{{ $teacher->social_media_links }}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="subjects" class="form-label">Subjects</label>
                <input type="text" class="form-control" name="subjects" id="subjects" value="{{ $teacher->subjects }}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo">
                @if($teacher->photo)
                    <img src="{{ $teacher->photo }}" alt="Current Photo" class="mt-2" style="width: 100px;">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </form>
</div>
@endsection
