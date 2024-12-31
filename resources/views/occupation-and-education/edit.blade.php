@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Edit Occupation or Education</h1>
    <form action="{{ route('occupation-and-education.update', $item->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="occupation" {{ $item->type == 'occupation' ? 'selected' : '' }}>Occupation</option>
                <option value="education" {{ $item->type == 'education' ? 'selected' : '' }}>Education</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control">{{ $item->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
