<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\Computer;
use App\Models\Incidence;
use App\Models\IncidenceHistories;
use App\Models\Peripheral;
use App\Models\ScholarGroup;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use Database\Factories\ClassroomFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Factorias de entidades sin foreigns key
        Classroom::factory(20)->create();
        ScholarGroup::factory(40)->create();
        State::factory(4)->create();
        User::factory(100)->create();

        Computer::factory(400)->create();
        Student::factory(300)->create();
        Peripheral::factory(1000)->create();
        Incidence::factory(10)->create();
        IncidenceHistories::factory(10)->create();
    }
}
