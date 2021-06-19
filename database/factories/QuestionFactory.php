<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

class QuestionFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Question::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->words(asText: true),
            'content' => $this->faker->text,
            'rating' => choose(0, $this->faker->randomDigit),
        ];
    }
}
