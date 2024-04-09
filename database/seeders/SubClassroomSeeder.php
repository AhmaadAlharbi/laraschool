<?php

namespace Database\Seeders;

use App\Models\SubClassroom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubClassroom::factory()->count(10)->create();
    }
}
