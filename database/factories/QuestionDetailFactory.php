<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionDetail>
 */
class QuestionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id' => Question::factory(),
            'a' => strtoupper(fake()->randomLetter()),
            'b' => strtoupper(fake()->randomLetter()),
            'c' => strtoupper(fake()->randomLetter()),
            'd' => strtoupper(fake()->randomLetter()),
            'e' => strtoupper(fake()->randomLetter()),
            'answer' => fake()->randomElement([
                'A',
                'B',
                'C',
                'D',
                'E',
            ]),
            // strtoupper(fake()->randomLetter()),
        ];
    }
}
