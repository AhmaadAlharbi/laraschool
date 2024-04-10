<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departments = [
            'Mathematics',
            'Science',
            'English',
            'History',
            'Computer Science',
            'Art',
            'Arabic',
            // Add more departments as needed
        ];
        return [
            'name' => $this->faker->unique()->randomElement($departments),
        ];
    }
}
