<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\SchoolLevel;
use App\Models\Subject;

class AssignSubjectToClassroom extends Component
{
    public $schoolLevels;
    public $classrooms = [];
    public $schoolLevelId;
    public $classroomId;
    public $newSubclassroom;
    public $successMessage = '';
    public $departments;
    public $subjects = [];
    public $selectedSubjects = [];
    public $assignedSubjects;
    public function render()
    {

        return view('livewire.assign-subject-to-classroom');
    }
    public function mount()
    {
        $this->schoolLevels = SchoolLevel::with('classrooms')->get();
        $this->departments = Department::all();
        $this->subjects = Subject::all();
        $this->classrooms = [];
    }
    public function getClassrooms()
    {
        $this->classrooms = ClassRoom::where('school_level_id', $this->schoolLevelId)->get();
    }
    public function checkSelectedSubjects()
    {
        // Fetch assigned subject IDs for each classroom
        $assignedSubjects = [];

        foreach ($this->classrooms as $classroom) {
            $assignedSubjects[$classroom->id] = $classroom->subjects->pluck('id')->toArray();
        }
        $this->selectedSubjects = ClassRoom::findOrFail($this->classroomId)->subjects->pluck('id')->toArray();
        $this->assignedSubjects = $assignedSubjects;
    }
    public function assignSubjectsToClassroom()
    {
        // Perform any validation if needed
        $this->validate([
            'schoolLevelId' => 'required',
            'classroomId' => 'required',
            'selectedSubjects' => 'required|array', // Change 'subjects' to 'selectedSubjects'
        ]);

        // Get the classroom
        $classroom = Classroom::findOrFail($this->classroomId);

        // Loop through selected subjects
        foreach ($this->selectedSubjects as $subjectId) {
            // Check if the subject is already assigned to the classroom
            if ($classroom->subjects->contains($subjectId)) {
                // Subject is assigned, remove it
                $classroom->subjects()->detach($subjectId);
            } else {
                // Subject is not assigned, add it
                $classroom->subjects()->attach($subjectId);
            }
        }

        // Reset form fields
        $this->reset(['schoolLevelId', 'classroomId', 'selectedSubjects']);

        // Show success message or perform any other action
        toastr()->success('Data has been saved successfully!', 'Congrats');
    }
}
