<?php

namespace Database\Factories;

use App\Models\Incidence;
use App\Models\Peripheral;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncidenceHistories>
 */
class IncidenceHistoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'incidence_id' => Incidence::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'peripheral_id' => Peripheral::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'description' => $this->faker->text(100)
        ];
    }
}
