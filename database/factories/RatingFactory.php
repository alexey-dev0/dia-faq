<?php

namespace Database\Factories;

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
        return [
            'ratingable_type' => $this->faker->word,
            'direction' => $this->faker->randomElement(['up', 'down']),
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
