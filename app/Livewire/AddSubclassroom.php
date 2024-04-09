<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClassRoom;
use App\Models\SchoolLevel;
use App\Models\SubClassroom;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class AddSubclassroom extends Component
{
    use WithPagination;

    public $schoolLevels;
    public $classrooms = [];
    public $schoolLevelId;
    public $classroomId;
    public $newSubclassroom;
    public $successMessage = '';

    protected $rules = [
        'schoolLevelId' => 'required',
        'classroomId' => 'required',
        'newSubclassroom' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.add-subclassroom');
    }

    public function mount()
    {
        $this->schoolLevels = SchoolLevel::with('classrooms')->get();
        $this->classrooms = [];
    }

    public function getClassrooms()
    {
        $this->classrooms = ClassRoom::where('school_level_id', $this->schoolLevelId)->get();
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        // Save the new subclassroom
        SubClassroom::create([
            'name' => $this->newSubclassroom,
            'class_room_id' => $this->classroomId,
        ]);

        // Reset form fields
        $this->reset(['schoolLevelId', 'classroomId', 'newSubclassroom']);

        // Set success message
        toastr()->success('Data has been saved successfully!', 'Congrats');
    }
}
