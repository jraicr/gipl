<?php

namespace Database\Factories;

use App\Models\Incidence;
use App\Models\State;
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
            'state_id' => State::all()->random()->id,
            'incidence_id' => Incidence::all()->random()->id
        ];
    }
}
