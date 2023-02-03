<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'num' => $this->faker->unique()->text(6),
            'seatmap' => 'carpeta/de/jsons/' . $this->faker->text(8) .  '.json'
        ];
    }
}
