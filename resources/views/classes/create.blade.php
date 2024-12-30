@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Add New Class</h2>
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Class Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Class</button>
    </form>
</div>
@endsection
