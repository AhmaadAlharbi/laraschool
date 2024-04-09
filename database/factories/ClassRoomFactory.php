<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use App\Models\SchoolLevel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassRoom>
 */
class ClassRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // // Get existing school_level_id values
        // $schoolLevelIds = \App\Models\SchoolLevel::pluck('id')->toArray();

        // $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'];
        // $grade = $this->faker->randomElement($grades);

        // // Check if there's an existing classroom with the same name and school level ID
        // $existingClassrooms = ClassRoom::where('name', $grade . ' Classroom')
        //     ->whereIn('school_level_id', $schoolLevelIds)
        //     ->pluck('id')
        //     ->toArray();

        // // If there are existing classrooms, exclude them from the random selection
        // $availableSchoolLevelIds = array_diff($schoolLevelIds, $existingClassrooms);

        // // If there are no available school level IDs, fallback to selecting from all school levels
        // $selectedSchoolLevelId = !empty($availableSchoolLevelIds)
        //     ? $this->faker->randomElement($availableSchoolLevelIds)
        //     : $this->faker->randomElement($schoolLevelIds);

        // return [
        //     'name' => $grade . ' Classroom',
        //     'school_level_id' => $selectedSchoolLevelId,
        // ];
        // Get existing school level IDs
        $schoolLevelIds = SchoolLevel::pluck('id')->toArray();

        // Generate a unique classroom name
        $uniqueName = $this->faker->unique()->numberBetween(1, 10) . ' Classroom';

        return [
            'name' => $uniqueName,
            'school_level_id' => $this->faker->randomElement($schoolLevelIds),
        ];
    }
}