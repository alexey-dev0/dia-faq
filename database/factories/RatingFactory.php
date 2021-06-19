<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;

class RatingFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Rating::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        $ratingable = [
            Answer::class,
            Article::class,
            Comment::class,
            Question::class,
        ];
        $ratingable_type = $this->faker->randomElement($ratingable);
        $ratingable_id = Factory::factoryForModel($ratingable_type);

        return [
            'user_id' => User::factory(),
            'ratingable_id' => $ratingable_id,
            'ratingable_type' => $ratingable_type,
            'direction' => $this->faker->randomElement(['up', 'down']),
            'amount' => 1,
        ];
    }
}
