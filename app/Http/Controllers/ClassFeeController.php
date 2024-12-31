<?php

namespace App\Http\Controllers;

use App\Models\ClassFee;
use Illuminate\Http\Request;

class ClassFeeController extends Controller
{
    // Index Method: Show all class fees
    public function index()
    {
        $classFees = ClassFee::all();
        return view('class_fees.index', compact('classFees'));
    }

    // Create Method: Show form to add new class fee
    public function create()
    {
        return view('class_fees.create');
    }

    // Store Method: Save new class fee to database
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:class_fees',
            'admission_fee' => 'required|numeric|min:0',
        ]);

        ClassFee::create($request->all());

        return redirect()->route('class_fees.index')->with('success', 'Class fee added successfully!');
    }

    // Edit Method: Show form to edit existing class fee
    public function edit(ClassFee $classFee)
    {
        return view('class_fees.edit', compact('classFee'));
    }

    // Update Method: Save updated class fee to database
    public function update(Request $request, ClassFee $classFee)
    {
        $request->validate([
            'class_name' => 'required|unique:class_fees,class_name,' . $classFee->id,
            'admission_fee' => 'required|numeric|min:0',
        ]);

        $classFee->update($request->all());

        return redirect()->route('class_fees.index')->with('success', 'Class fee updated successfully!');
    }

    // Delete Method: Remove class fee from database
    public function destroy(ClassFee $classFee)
    {
        $classFee->delete();

        return redirect()->route('class_fees.index')->with('success', 'Class fee deleted successfully!');
    }
}

