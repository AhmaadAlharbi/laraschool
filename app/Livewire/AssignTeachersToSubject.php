<?php

namespace App\Livewire;

use App\Models\Teacher;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AssignTeachersToSubject extends Component
{
    public $subject;
    public $teachers;
    public $selectedTeachers = [];
    public function render()
    {

        return view('livewire.assign-teachers-to-subject');
    }
    public function mount()
    {
        $this->teachers = Teacher::where('department_id', $this->subject->department_id)->get();
        $this->loadSelectedTeachers();
    }
    public function loadSelectedTeachers()
    {
        $existingTeachers = DB::table('teacher_subject')
            ->where('subject_id', $this->subject->id)
            ->pluck('teacher_id')
            ->toArray();

        $this->selectedTeachers = $existingTeachers;
    }
    public function assignTeachers()
    {
        // Validate if any teacher is selected
        if (empty($this->selectedTeachers)) {
            $this->addError('selectedTeachers', 'Please select at least one teacher.');
            return;
        }

        // Assuming you have a pivot table named 'teacher_subject' with 'teacher_id' and 'subject_id' columns
        foreach ($this->selectedTeachers as $teacherId) {
            // Check if the teacher-subject relationship already exists
            $existingAssignment = DB::table('teacher_subject')
                ->where('teacher_id', $teacherId)
                ->where('subject_id', $this->subject->id)
                ->exists();

            // If the relationship doesn't exist, create a new one
            if (!$existingAssignment) {
                DB::table('teacher_subject')->insert([
                    'teacher_id' => $teacherId,
                    'subject_id' => $this->subject->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Optionally, you can add a success message
        toastr()->success('Teachers assigned successfully.', 'Congrats');

        // Reset the selected teachers after successful assignment

    }
    public function updatedSelectedTeachers()
    {
        // Remove the unselected teachers
        $unselectedTeachers = array_diff(
            DB::table('teacher_subject')->where('subject_id', $this->subject->id)->pluck('teacher_id')->toArray(),
            $this->selectedTeachers
        );

        DB::table('teacher_subject')
            ->where('subject_id', $this->subject->id)
            ->whereIn('teacher_id', $unselectedTeachers)
            ->delete();
    }
}
