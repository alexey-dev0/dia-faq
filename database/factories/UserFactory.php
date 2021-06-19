<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = User::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        $nickname = $this->faker->unique(true)->optional(0.7)->word;
        if (isset($nickname) && User::where('nickname', $nickname)->exists()) {
            $nickname = null;
        }

        return [
            'nickname' => $nickname,
            'name' => $this->faker->optional(0.4)->firstName,
            'surname' => $this->faker->optional(0.3)->lastName,
            'email' => $this->faker->freeEmail,
            'rating' => $this->faker->randomNumber(2),
            'email_verified_at' => $this->faker->optional(0.1)->dateTime(),
            'password' => bcrypt($this->faker->password),
        ];
    }
}
