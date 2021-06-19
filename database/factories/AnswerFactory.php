<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;

class AnswerFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Answer::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'question_id' => Question::factory(),
            'content' => $this->faker->text,
            'rating' => choose(0, $this->faker->randomDigit),
        ];
    }
}
