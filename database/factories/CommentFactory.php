<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Article;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

class CommentFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Comment::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        $commentable = [
            Answer::class,
            Article::class,
            Comment::class,
            Question::class,
        ];
        $commentable_type = $this->faker->randomElement($commentable);
        $commentable_id = Factory::factoryForModel($commentable_type);


        return [
            'user_id' => User::factory(),
            'commentable_id' => $commentable_id,
            'commentable_type' => $commentable_type,
            'text' => $this->faker->text,
            'rating' => choose(0, $this->faker->randomDigit),
        ];
    }
}
