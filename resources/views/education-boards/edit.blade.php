@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Education Board</h1>
    <form action="{{ route('education-boards.update', $board->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $board->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $board->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email', $board->contact_email) }}">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Contact Phone</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $board->contact_phone) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
