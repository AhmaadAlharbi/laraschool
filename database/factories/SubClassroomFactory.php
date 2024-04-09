<?php

namespace Database\Factories;

use App\Models\SubClassroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubClassroom>
 */
class SubClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $classroomIds = \App\Models\ClassRoom::pluck('id')->toArray();

        // $sections = ['Section A', 'Section B', 'Section C', 'Section D'];
        // $section = $this->faker->randomElement($sections);

        // // Check if there's an existing subclassroom with the same name, classroom ID, and school level ID
        // $existingSubClassrooms = SubClassroom::where('name', $section)
        //     ->whereIn('class_room_id', $classroomIds)
        //     ->pluck('id')
        //     ->toArray();

        // // If there are existing subclassrooms, exclude them from the random selection
        // $availableClassroomIds = array_diff($classroomIds, $existingSubClassrooms);

        // // If there are no available classroom IDs, fallback to selecting from all classrooms
        // $selectedClassroomId = !empty($availableClassroomIds)
        //     ? $this->faker->randomElement($availableClassroomIds)
        //     : $this->faker->randomElement($classroomIds);

        // return [
        //     'name' => $section,
        //     'class_room_id' => $selectedClassroomId,
        // ];
        // Get existing class room IDs
        $classroomIds = \App\Models\ClassRoom::pluck('id')->toArray();

        // Generate a unique sub-classroom name with numbers
        $uniqueName = $this->faker->unique()->numberBetween(1, 30);

        return [
            'name' => $uniqueName,
            'class_room_id' => $this->faker->randomElement($classroomIds),
        ];
    }
}