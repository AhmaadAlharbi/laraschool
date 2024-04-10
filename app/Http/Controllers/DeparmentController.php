<?php

namespace App\Http\Controllers;

use App\Models\Deparment;
use App\Models\Department;
use Illuminate\Http\Request;

class DeparmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('school.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:school_levels|max:255',
        ]);
        // Create a new school level
        $department = Department::create([
            'name' => $validated['name'],
        ]);

        // Optionally, you can return a response indicating success
        toastr()->success('Data has been saved successfully!', 'Congrats');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $deparment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('school.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other fields if needed
        ]);
        $department->update([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Data has been updated successfully!', 'Congrats');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $deparment, $id)
    {
        $department = Department::findOrFail($id);

        $department->delete();
        toastr()->success('Data has been deleted successfully!', 'Congrats');
        return redirect()->route('departments.index');
    }
}
