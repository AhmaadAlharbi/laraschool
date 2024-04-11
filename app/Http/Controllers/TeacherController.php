<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('school.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('school.teachers.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|exists:departments,id',
        ]);
        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'department_id' => $request->input('department'),
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats');

        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $departments = Department::all();
        return view('school.subjects.edit', compact('teacher', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|exists:departments,id',
        ]);
        $teacher->update([
            'name' => $request->input('name'),
            'department_id' => $request->input('department'),

        ]);
        toastr()->success('Data has been updated successfully!', 'Congrats');

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->delete()) {
            toastr()->success('Data has been deleted successfully!', 'Congrats');
        } else {
            toastr()->error('Failed to delete data!', 'Error');
        }

        return redirect()->route('teachers.index');
    }
}