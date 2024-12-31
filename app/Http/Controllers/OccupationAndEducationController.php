<?php

namespace App\Http\Controllers;

use App\Models\OccupationAndEducation;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface; // Import FlasherInterface

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

    public function store(Request $request, FlasherInterface $flasher) // Add FlasherInterface to store method
    {
        $request->validate([
            'type' => 'nullable', // Made nullable
            'name' => 'nullable|unique:occupation_and_education', // Made nullable
        ]);

        OccupationAndEducation::create($request->all());

        // Flasher success message
        $flasher->addSuccess('Data added successfully.');

        return redirect()->route('occupation-and-education.index');
    }

    public function edit($id)
    {
        $item = OccupationAndEducation::findOrFail($id);
        return view('occupation-and-education.edit', compact('item'));
    }

    public function update(Request $request, $id, FlasherInterface $flasher) // Add FlasherInterface to update method
    {
        $item = OccupationAndEducation::findOrFail($id);

        $request->validate([
            'type' => 'nullable', // Made nullable
            'name' => 'nullable|unique:occupation_and_education,name,' . $id, // Made nullable
        ]);

        $item->update($request->all());

        // Flasher success message
        $flasher->addSuccess('Data updated successfully.');

        return redirect()->route('occupation-and-education.index');
    }

    public function destroy($id, FlasherInterface $flasher) // Add FlasherInterface to destroy method
    {
        $item = OccupationAndEducation::findOrFail($id);
        $item->delete();

        // Flasher success message
        $flasher->addSuccess('Data deleted successfully.');

        return redirect()->route('occupation-and-education.index');
    }
}
