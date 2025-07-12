<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->unique()->numerify('###########'),
            'birth_date' => $this->faker->date('Y-m-d', '2005-01-01'),
            'address' => $this->faker->address,
            'sex' => $this->faker->randomElement(['M', 'F']),
            'city_id' => City::inRandomOrder()->first()?->id ?? City::factory(),
        ];
    }
}
