<?php

namespace App\Http\Controllers;

use App\Models\Class; // Assuming you created a ClassModel for the classes table
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Display a listing of the classes
    public function index()
    {
        $classes = Class::all();  // Retrieve all classes
        return view('classes.index', compact('classes'));
    }

    // Show the form to create a new class
    public function create()
    {
        return view('classes.create');
    }

    // Store a newly created class
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name|max:255',
            'description' => 'nullable|string',
        ]);

        Class::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Class created successfully!');
    }

    // Show the form to edit an existing class
    public function edit($id)
    {
        $class = Class::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    // Update the class
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:classes,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $class = Class::findOrFail($id);
        $class->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }

    // Delete a class
    public function destroy($id)
    {
        $class = Class::findOrFail($id);
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully!');
    }
}

