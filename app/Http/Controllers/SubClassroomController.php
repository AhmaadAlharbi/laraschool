<?php

namespace App\Http\Controllers;

use App\Models\SubClassroom;
use Illuminate\Http\Request;

class SubClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subclassrooms = Subclassroom::all();
        $subclassrooms = Subclassroom::with('classroom')
            ->get()
            ->sortBy(function ($subclassroom) {
                return $subclassroom->classroom->school_level->id;
            });

        return view('school.subclassrooms.index', compact('subclassrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school.subclassrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //in livewire
    }

    /**
     * Display the specified resource.
     */
    public function show(SubClassroom $subClassroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubClassroom $subClassroom, $id)
    {
        $subclassroom = SubClassroom::findOrFail($id);
        return view('school.subclassrooms.edit', compact('subclassroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubClassroom $subClassroom, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $subclassroom = SubClassroom::findOrFail($id);
        $subclassroom->update([
            'name' => $request->input('name'),
        ]);
        toastr()->success('Data has been updated successfully!', 'Congrats');
        return redirect()->route('subclassrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubClassroom $subClassroom, $id)
    {
        $subclassroom = SubClassroom::findOrFail($id);

        $subclassroom->delete();
        toastr()->success('Data has been deleted successfully!', 'Congrats');
        return redirect()->route('subclassrooms.index');
    }
}