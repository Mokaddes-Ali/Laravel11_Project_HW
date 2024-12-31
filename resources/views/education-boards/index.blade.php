@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Education Boards</h1>
    <a href="{{ route('education-boards.create') }}" class="btn btn-primary mb-3">Add New Board</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boards as $board)
            <tr>
                <td>{{ $board->id }}</td>
                <td>{{ $board->name }}</td>
                <td>{{ $board->description }}</td>
                <td>{{ $board->contact_email }}</td>
                <td>{{ $board->contact_phone }}</td>
                <td>
                    <a href="{{ route('education-boards.edit', $board->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('education-boards.destroy', $board->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
