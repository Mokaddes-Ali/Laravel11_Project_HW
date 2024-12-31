@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Add Class Fee</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('class_fees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input type="text" name="class_name" id="class_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="admission_fee" class="form-label">Admission Fee</label>
            <input type="number" step="0.01" name="admission_fee" id="admission_fee" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
