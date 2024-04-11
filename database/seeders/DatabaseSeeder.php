<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\SubClassroomSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Ahmad Zaid',
            'email' => 'ahmaadzaid7@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $this->call(SchoolLevelSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SubClassroomSeeder::class);
        $this->call(DepartmentSeeder::class,);
        $this->call(SubjectSeeder::class,);
    }
}