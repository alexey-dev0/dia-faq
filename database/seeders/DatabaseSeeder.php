<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            RoleSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            RatingSeeder::class
        ]);
    }
}
