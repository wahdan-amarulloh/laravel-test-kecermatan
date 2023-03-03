<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'a' => strtoupper(fake()->randomLetter()),
            'b' => strtoupper(fake()->randomLetter()),
            'c' => strtoupper(fake()->randomLetter()),
            'd' => strtoupper(fake()->randomLetter()),
            'e' => strtoupper(fake()->randomLetter()),
        ];
    }
}
