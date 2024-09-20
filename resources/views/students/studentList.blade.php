<style>
      .contentButton {
        text-align: right;
        margin-bottom: 10px;
    }
</style>

@extends('layouts.master')

@section('content')
<div class="container">

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <h2 class="my-4">Students List</h2>
    <div class="contentButton">
        <button type="button" class="btn btn-danger"><a class="dropdown-item" href="{{ route('students.create') }}">Add Student </a></button>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th><input type="checkbox" id="selectAll"></th> <!-- Checkbox to select all rows -->
                <th>Name</th>
                <th>Photo</th>
                <th class="py-1">Phone</th>
                <th>Email</th>
                <th>Test Result</th>
                <th>Course</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td><input type="checkbox" name="student_ids[]" value="{{ $student->id }}"></td> <!-- Hidden ID in checkbox -->
                <td>{{ $student->name }}</td>
                <td>
                    <img src="{{ asset('images/'.$student['photo']) }}" alt="img" width="50" height="50">
                </td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td class="py-2">{{ $student->admission_test_result }}</td>
                <td>{{ $student->course }}</td>
                <td>
                <span class="badge bg-success">Active</span>

                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                            <li class="list-inline-item">
                                <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">
                                    <a class="" href="{{ route('student.cv', $student->id) }}">
                                     <i class="fa fa-table"></i>
                                    </a>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <button class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" >
                                <a class="" href="{{ route('students.edit', $student->id) }}">
                                 <i class="fa fa-edit"></i>
                                </a>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    // JavaScript to handle select all checkboxes
    document.getElementById('selectAll').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('input[name="student_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection
