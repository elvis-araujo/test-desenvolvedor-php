<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    public function definition(): array
    {
        // Aqui usamos uma cidade aleatória, se quiser simular
        return [
            'name' => $this->faker->unique()->city,
            'state_id' => State::factory(),
        ];
    }

    public function forState(State $state): static
    {
        return $this->state(fn (array $attributes) => [
            'state_id' => $state->id,
        ]);
    }
}
