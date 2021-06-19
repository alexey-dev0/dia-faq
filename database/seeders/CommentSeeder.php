<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
            ->hasRatings(3)
            ->count(50)
            ->create();
    }
}
