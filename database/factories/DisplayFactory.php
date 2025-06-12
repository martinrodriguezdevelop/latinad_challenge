<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Display>
 */
class DisplayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price_per_day' => $this->faker->randomFloat(2, 10, 500),
            'resolution_height' => $this->faker->numberBetween(480, 1080),
            'resolution_width' => $this->faker->numberBetween(640, 1920),
            'type' => $this->faker->randomElement(['indoor', 'outdoor']),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
