<?php

namespace Database\Seeders;

use App\Models\SchoolLevel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolLevels = [
            'Kindergarten',
            'Elementary School',
            'Middle School',
            'High School',
            // Add more levels as needed
        ];
        foreach ($schoolLevels as $level) {
            SchoolLevel::create([
                'name' => $level,
            ]);
        }
    }
}
