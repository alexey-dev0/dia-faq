<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Article::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'content' => $this->faker->realText(),
            'rating' => choose(0, $this->faker->randomDigit),
        ];
    }
}
