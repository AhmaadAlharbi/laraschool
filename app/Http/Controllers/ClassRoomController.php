<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\SchoolLevel;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        // $classrooms = ClassRoom::with('school_level')->get();
        $classrooms = ClassRoom::with('school_level')
            ->get()
            ->sortBy(function ($classroom) {
                return $classroom->school_level->id;
            });
        return view('school.classrooms.index', compact('classrooms'));
    }
    public function create()
    {
        $schoolLevels = SchoolLevel::all();
        return view('school.classrooms.create', compact('schoolLevels'));
    }
    public function show($id)
    {

        $classrooms = ClassRoom::with('subclassrooms')->findOrFail($id);


        return view('school.classrooms.show', compact('classrooms'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:school_levels|max:255',
            'school_level' => 'required',
        ]);
        // Create a new school level
        $classroom = ClassRoom::create([
            'name' => $validated['name'],
            'school_level_id' => $validated['school_level']
        ]);

        // Optionally, you can return a response indicating success
        return redirect(route('classrooms.index'))->with('success', 'School level created successfully');
    }
    public function edit(ClassRoom $classRoom, $id)
    {
        $schoolLevels = SchoolLevel::all();
        $classroom = ClassRoom::findOrFail($id);

        return view('school.classrooms.edit', compact('classroom', 'schoolLevels'));
    }
    public function update(Request $request, ClassRoom $classRoom, $id)
    {
        $classroom = ClassRoom::findOrFail($id);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'school_level' => 'required',
        ]);

        // Update the school level with the new data
        $classroom->update([
            'name' => $request->input('name'),
            'school_level_id' => $request->input('school_level'),
            // Update other fields as needed
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('classrooms.index')->with('success', 'School level updated successfully.');
    }
    public function destroy(ClassRoom $classRoom, $id)
    {

        $classroom = ClassRoom::findOrFail($id);

        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'School level deleted successfully.');
    }
}
