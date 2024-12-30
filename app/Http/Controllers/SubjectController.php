<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Display a listing of the subjects
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    // Show the form to create a new subject
    public function create()
    {
        return view('subjects.create');
    }

    // Store a newly created subject
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully!');
    }

    // Show the form to edit an existing subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    // Update the subject
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subjects,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }

    // Delete a subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}

