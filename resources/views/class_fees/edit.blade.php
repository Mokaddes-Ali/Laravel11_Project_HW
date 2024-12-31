@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Edit Class Fee</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('class_fees.update', $classFee) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input type="text" name="class_name" id="class_name" value="{{ $classFee->class_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="admission_fee" class="form-label">Admission Fee</label>
            <input type="number" step="0.01" name="admission_fee" id="admission_fee" value="{{ $classFee->admission_fee }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
