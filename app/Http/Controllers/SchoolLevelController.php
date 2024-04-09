<?php

namespace App\Http\Controllers;

use App\Models\SchoolLevel;
use Illuminate\Http\Request;

class SchoolLevelController extends Controller
{
    public function index()
    {
        $schoolLevels = SchoolLevel::all();
        return view('school.level.index', compact('schoolLevels'));
    }
    public function create()
    {
        return view('school.level.create');
    }
    public function show(SchoolLevel $schoolLevel, $id)
    {
        $schoolLevel = SchoolLevel::with('classrooms')->findOrFail($id);
        return view('school.level.show', compact('schoolLevel'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:school_levels|max:255',
        ]);
        // Create a new school level
        $schoolLevel = SchoolLevel::create([
            'name' => $validated['name'],
        ]);

        // Optionally, you can return a response indicating success
        return redirect(route('levels.index'))->with('success', 'School level created successfully');
    }
    public function edit(SchoolLevel $schoolLevel, $id)
    {
        $schoolLevel = SchoolLevel::findOrFail($id);

        return view('school.level.edit', compact('schoolLevel'));
    }
    public function update(Request $request, SchoolLevel $schoolLevel, $id)
    {
        $schoolLevel = SchoolLevel::findOrFail($id);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other fields if needed
        ]);

        // Update the school level with the new data
        $schoolLevel->update([
            'name' => $request->input('name'),
            // Update other fields as needed
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('levels.index')->with('success', 'School level updated successfully.');
    }
    public function destroy(SchoolLevel $schoolLevel, $id)
    {

        $schoolLevel = SchoolLevel::findOrFail($id);

        $schoolLevel->delete();
        return redirect()->route('levels.index')->with('success', 'School level deleted successfully.');
    }
}
