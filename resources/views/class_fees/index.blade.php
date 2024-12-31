@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Class Fees</h2>
    <a href="{{ route('class_fees.create') }}" class="btn btn-primary mb-3">Add Class Fee</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Admission Fee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classFees as $classFee)
                <tr>
                    <td>{{ $classFee->id }}</td>
                    <td>{{ $classFee->class_name }}</td>
                    <td>{{ $classFee->admission_fee }}</td>
                    <td>
                        <a href="{{ route('class_fees.edit', $classFee) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('class_fees.destroy', $classFee) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
