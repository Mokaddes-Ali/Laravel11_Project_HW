<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'qualification' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'hire_date' => 'nullable|date',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'social_media_links' => 'nullable|string',
            'subjects' => 'nullable|string',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::slug($request->first_name . '-' . $request->last_name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $data['photo'] = $file->storeAs('teachers/photos', $filename, 'public');
        }

        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'qualification' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'hire_date' => 'nullable|date',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'social_media_links' => 'nullable|string',
            'subjects' => 'nullable|string',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($teacher->photo && Storage::exists('public/' . $teacher->photo)) {
                Storage::delete('public/' . $teacher->photo);
            }

            $file = $request->file('photo');
            $filename = Str::slug($request->first_name . '-' . $request->last_name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $data['photo'] = $file->storeAs('teachers/photos', $filename, 'public');
        }

        $teacher->update($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo && Storage::exists('public/' . $teacher->photo)) {
            Storage::delete('public/' . $teacher->photo);
        }

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}

