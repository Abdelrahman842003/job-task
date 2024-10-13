<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'content' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'type' => $this->faker->randomElement(['full-time', 'part-time']),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'user_id' => $this->faker->numberBetween(1, 10),
            'experience_requirements' => $this->faker->numberBetween(1, 10),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'salary' => $this->faker->numberBetween(1000, 10000),
            'deadline' => $this->faker->date,
        ];
    }
}
