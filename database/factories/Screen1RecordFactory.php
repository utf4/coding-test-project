<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Screen1Record;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Screen1Record>
 */
class Screen1RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'notes' => $this->faker->text,
        ];
    }
}
