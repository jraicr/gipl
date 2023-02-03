<?php

namespace Database\Factories;

use App\Models\Peripheral;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidence>
 */
class IncidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(100),
            'state_id' => State::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'peripheral_id' => Peripheral::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
