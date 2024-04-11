<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentIds = Department::pluck('id')->toArray();

        return [
            'name' => $this->faker->unique()->word,
            'department_id' => $this->faker->randomElement($departmentIds)
        ];
    }
}