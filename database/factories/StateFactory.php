<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->state,
            'abbreviation' => strtoupper($this->faker->unique()->lexify('??')),
        ];
    }
}
