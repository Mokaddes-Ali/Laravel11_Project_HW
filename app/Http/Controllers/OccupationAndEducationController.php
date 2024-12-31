<?php

namespace App\Http\Controllers;

use App\Models\OccupationAndEducation;
use Illuminate\Http\Request;

class OccupationAndEducationController extends Controller
{
    public function index()
    {
        $data = OccupationAndEducation::all();
        return view('occupation-and-education.index', compact('data'));
    }

    public function create()
    {
        return view('occupation-and-education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'nullable', // Made nullable
            'name' => 'nullable|unique:occupation_and_education', // Made nullable
        ]);

        OccupationAndEducation::create($request->all());
        return redirect()->route('occupation-and-education.index')->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $item = OccupationAndEducation::findOrFail($id);
        return view('occupation-and-education.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = OccupationAndEducation::findOrFail($id);

        $request->validate([
            'type' => 'nullable', // Made nullable
            'name' => 'nullable|unique:occupation_and_education,name,' . $id, // Made nullable
        ]);

        $item->update($request->all());
        return redirect()->route('occupation-and-education.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $item = OccupationAndEducation::findOrFail($id);
        $item->delete();
        return redirect()->route('occupation-and-education.index')->with('success', 'Data deleted successfully.');
    }
}

