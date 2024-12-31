<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

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
    public function store(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create($request->all());

        // Flash success message
        $flasher->addSuccess('Subject created successfully!');

        return redirect()->route('subjects.index');
    }

    // Show the form to edit an existing subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    // Update the subject
    public function update(Request $request, $id, FlasherInterface $flasher)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subjects,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        // Flash success message
        $flasher->addSuccess('Subject updated successfully!');

        return redirect()->route('subjects.index');
    }

    // Delete a subject
    public function destroy($id, FlasherInterface $flasher)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        // Flash success message
        $flasher->addSuccess('Subject deleted successfully!');

        return redirect()->route('subjects.index');
    }
}


