<?php

namespace App\Http\Controllers;

use App\Models\EducationBoard;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface; // Import FlasherInterface

class EducationBoardController extends Controller
{
    public function index()
    {
        $boards = EducationBoard::all();
        return view('education-boards.index', compact('boards'));
    }

    public function create()
    {
        return view('education-boards.create');
    }

    public function store(Request $request, FlasherInterface $flasher) // Add FlasherInterface to store method
    {
        $request->validate([
            'name' => 'required|unique:education_boards',
            'description' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
        ]);

        EducationBoard::create($request->all());

        // Flasher success message
        $flasher->addSuccess('Education Board added successfully.');

        return redirect()->route('education-boards.index');
    }

    public function edit($id)
    {
        $board = EducationBoard::findOrFail($id);
        return view('education-boards.edit', compact('board'));
    }

    public function update(Request $request, $id, FlasherInterface $flasher) // Add FlasherInterface to update method
    {
        $board = EducationBoard::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:education_boards,name,' . $id,
            'description' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
        ]);

        $board->update($request->all());

        // Flasher success message
        $flasher->addSuccess('Education Board updated successfully.');

        return redirect()->route('education-boards.index');
    }

    public function destroy($id, FlasherInterface $flasher) // Add FlasherInterface to destroy method
    {
        $board = EducationBoard::findOrFail($id);
        $board->delete();

        // Flasher success message
        $flasher->addSuccess('Education Board deleted successfully.');

        return redirect()->route('education-boards.index');
    }
}

