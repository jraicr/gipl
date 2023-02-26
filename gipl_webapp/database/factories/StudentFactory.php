<?php

namespace Database\Factories;

use App\Models\Computer;
use App\Models\ScholarGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'group_num' => $this->faker->numerify('##'),
            'scholar_group_id' => ScholarGroup::all()->random()->id,
            'computer_id' => Computer::all()->random()->id
        ];
    }
}
